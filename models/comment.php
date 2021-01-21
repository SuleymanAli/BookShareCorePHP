<?php

class Comment extends Model {
	public function index() {
		$this->query('
			SELECT
				comments.id as id,
				comments.content as content,
				comments.created_at as created_at,
				users.full_name as user_name,
				books.name as book_name
			FROM comments
			LEFT JOIN users ON comments.user_id = users.id
			LEFT JOIN books ON comments.book_id = books.id
			');
		return $this->all();
	}

	public function withUser() {
		$this->query('
			SELECT
				comments.id as id,
				comments.content as content,
				comments.created_at as created_at,
				users.full_name as user_name
			FROM comments
			LEFT JOIN users ON comments.user_id = users.id WHERE book_id = :book_id');
		$this->bind(':book_id', $_GET['id']);

		return $this->all();
	}

	public function create() {
		if (isset($_POST['submit']) && !$_POST['content'] == "") {

			// Sanitize Post
			$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

			$this->query('INSERT INTO comments (content, user_id, book_id) VALUES (:content, :user_id, :book_id)');
			$this->bind(':user_id', $_SESSION['user']['id']);
			$this->bind(':book_id', $post['book_id']);
			$this->bind(':content', $post['content']);
			$this->execute();

			// Redirect
			Message::setMessage('success', 'Yorumuz Başarıyla Eklendi');
			header('Location:' . $_SERVER['HTTP_REFERER']);
			exit();
		}

		// Redirect
		Message::setMessage('error', 'Lütfen yorum metnini ekleyin');
		header('Location:' . $_SERVER['HTTP_REFERER']);
		exit();
	}

	public function delete() {
		$this->query('
			DELETE FROM comments WHERE id = :id
		');
		$this->bind(':id', $_GET['id']);
		$this->execute();

		Message::setMessage('success', 'Comment Deleted Successfully');

		header('Location:' . $_SERVER['HTTP_REFERER']);
		exit();
	}
}

?>