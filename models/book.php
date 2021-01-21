<?php

class Book extends Model {
	public function index() {

		$this->query('SELECT * FROM books ORDER BY id DESC ');

		return $this->all();
	}

	public function create() {

		if (isset($_POST['submit'])) {

			// Sanitize Post
			$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

			if (!empty($_FILES["image"]["name"])) {
				// Get file info
				$fileName = basename($_FILES["image"]["name"]);
				$fileType = pathinfo($fileName, PATHINFO_EXTENSION);

				// Allow certain file formats
				$allowTypes = array('jpg', 'png', 'jpeg', 'gif');
				if (in_array($fileType, $allowTypes)) {
					$image = $_FILES['image']['tmp_name'];
				} else {
					$statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.';

					Message::setMessage('error', $statusMsg);

					header('Location:' . ROOT_URL . 'admin/books/create');
					exit();
				}

				// File Size
				if ($_FILES['image']['size'] > 4000000) {
					$statusMsg = 'Please Select Only Under 4MB File Sizes.';

					Message::setMessage('error', $statusMsg);

					header('Location:' . ROOT_URL . 'admin/books/create');
					exit();
				}

				// Upload
				if (!move_uploaded_file($image, 'assets/images/' . $fileName)) {
					$statusMsg = 'Image Upload Failed';

					Message::setMessage('error', $statusMsg);

					header('Location:' . ROOT_URL . 'admin/books/create');
					exit();
				}
			} else {
				$statusMsg = 'Please select an image file to upload.';

				Message::setMessage('error', $statusMsg);

				header('Location:' . ROOT_URL . 'admin/books/create');
				exit();
			}

			$this->query('INSERT INTO books (name, description, image, featured, rating, user_id, category_id) VALUES (:name, :description, :image, :featured, :rating, :user_id, :category_id)');

			$this->bind('name', $post['name']);
			$this->bind('description', $post['description']);
			$this->bind('image', 'assets/images/' . $fileName);
			$this->bind('featured', $post['featured']);
			$this->bind('rating', $post['rating']);
			$this->bind('category_id', $post['category_id']);

			if (isset($_GET['admin'])) {
				$this->bind('user_id', $_SESSION['admin']['id']);
			} else {
				$this->bind('user_id', $_SESSION['user']['id']);
			}

			$this->execute();

			$bookId = $this->lastInsertId();

			if ($bookId) {
				foreach ($post['author'] as $author) {
					$this->query('INSERT INTO author_books (author_id, book_id) VALUES (:author_id, :book_id)');
					$this->bind('book_id', $bookId);
					$this->bind('author_id', $author);
					$this->execute();
				}
			}

			Message::setMessage('success', 'Books Added Successfully');

			if (isset($_GET['admin'])) {
				header('Location:' . ROOT_URL . 'admin/books/index');
				exit();
			} else {
				header('Location:' . ROOT_URL . 'books/index');
				exit();
			}
		}
	}

	public function show() {
		$id = $_GET['id'];

		// Get Book With Own User And Category
		$this->query('
			SELECT
			books.*,
			users.full_name as user_name,
			categories.name as category_name
			FROM books

			LEFT JOIN users ON books.user_id = users.id
			LEFT JOIN categories ON books.category_id = categories.id

			Where books.id = :id
			');

		$this->bind(':id', $id);
		$book = $this->first();

		// Get Book Authors
		$this->query('
			SELECT author_books.author_id as id, authors.full_name FROM books
			LEFT JOIN author_books ON books.id = author_books.book_id
			LEFT JOIN authors ON author_books.author_id = authors.id
			Where books.id = :id
			');

		$this->bind(':id', $id);
		$authors = $this->all();

		$book['authors'] = $authors;

		return $book;
	}

	public function edit() {

		if (isset($_POST['submit'])) {

			// Sanitize Post
			$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

			$this->query('SELECT image FROM books WHERE id = :id');
			$this->bind(':id', $post['id']);
			$bookImage = $this->first();

			// Update Image
			if (!empty($_FILES["image"]["name"])) {
				// Delete Old Image
				unlink($bookImage['image']);

				// Get file info
				$fileName = basename($_FILES["image"]["name"]);
				$fileType = pathinfo($fileName, PATHINFO_EXTENSION);

				// Allow certain file formats
				$allowTypes = array('jpg', 'png', 'jpeg', 'gif');
				if (in_array($fileType, $allowTypes)) {
					$image = $_FILES['image']['tmp_name'];
				} else {
					$statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.';

					Message::setMessage('error', $statusMsg);

					header('Location:' . ROOT_URL . 'admin/books/edit');
					exit();
				}

				// File Size
				if ($_FILES['image']['size'] > 4000000) {
					$statusMsg = 'Please Select Only Under 4MB File Sizes.';

					Message::setMessage('error', $statusMsg);

					header('Location:' . ROOT_URL . 'admin/books/edit');
					exit();
				}

				// Upload
				if (!move_uploaded_file($image, 'assets/images/' . $fileName)) {
					$statusMsg = 'Image Upload Failed';

					Message::setMessage('error', $statusMsg);

					header('Location:' . ROOT_URL . 'admin/books/edit');
					exit();
				}

				// Update Book
				$this->query('
					UPDATE books
					SET
					name = :name,
					description = :description,
					image = :image,
					featured = :featured,
					rating = :rating,
					category_id = :category_id

					WHERE id = :id');

				$this->bind('name', $post['name']);
				$this->bind('description', $post['description']);
				$this->bind('image', 'assets/images/' . $fileName);
				$this->bind('featured', $post['featured']);
				$this->bind('rating', $post['rating']);
				$this->bind('category_id', $post['category_id']);
				$this->bind('id', $post['id']);
				$this->execute();
			}

			// Update Book
			$this->query('
				UPDATE books
				SET
				name = :name,
				description = :description,
				featured = :featured,
				rating = :rating,
				category_id = :category_id

				WHERE id = :id');

			$this->bind('name', $post['name']);
			$this->bind('description', $post['description']);
			$this->bind('featured', $post['featured']);
			$this->bind('rating', $post['rating']);
			$this->bind('category_id', $post['category_id']);
			$this->bind('id', $post['id']);
			$this->execute();

			// Update Author
			$this->query('DELETE FROM author_books WHERE book_id = :id');
			$this->bind(':id', $post['id']);
			$this->execute();

			foreach ($post['author'] as $authorId) {
				$this->query('INSERT INTO author_books (author_id, book_id) VALUES (:author_id, :book_id)');
				$this->bind('book_id', $post['id']);
				$this->bind('author_id', $authorId);
				$this->execute();
			}

			Message::setMessage('success', 'Book Info Changed Successfully');

			if (isset($_GET['admin'])) {
				header('Location:' . ROOT_URL . 'admin/books/index');
				exit();
			} else {
				header('Location:' . ROOT_URL . 'books/index');
				exit();
			}
		}

		return $this->show();
	}

	public function delete() {
		$id = $_GET['id'];

		// Get Book For Fetching Image Name
		$this->query('SELECT image FROM books WHERE id = :id');
		$this->bind(':id', $id);
		$bookImage = $this->first();

		// Delete Image
		unlink($bookImage['image']);

		// Delete Book Image And Other Infos From Database
		$this->query('DELETE FROM books WHERE id = :id');
		$this->bind(':id', $id);
		$this->execute();

		// Delete Author Of Book
		$this->query('DELETE FROM author_books WHERE book_id = :id');
		$this->bind(':id', $id);
		$this->execute();

		// Message
		Message::setMessage('success', 'Book Deleted Successfully');

		// Redirect
		if (isset($_GET['admin'])) {
			header('Location:' . ROOT_URL . 'admin/books/index');
			exit();
		} else {
			header('Location:' . ROOT_URL . 'books/index');
			exit();
		}
	}

	public function byUser() {
		$this->query('SELECT * FROM books WHERE user_id = :user_id ORDER BY id DESC');
		$this->bind(':user_id', $_SESSION['user']['id']);

		return $this->all();
	}

	public function increaseViewCount() {
		$this->query('
			UPDATE books SET views = views + 1 WHERE id = :id
		');
		$this->bind(':id', $_GET['id']);

		return $this->first();
	}

	public function showByViewed() {
		$this->query('SELECT * FROM books ORDER BY views DESC LIMIT 10');
		return $this->all();
	}

	public function showByRating() {
		$this->query('SELECT * FROM books ORDER BY rating DESC LIMIT 10');
		return $this->all();
	}
}

?>