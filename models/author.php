<?php

class Author Extends Model {
	public function index() {

		if (isset($_POST['submit'])) {

			// Sanitize Post
			$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

			$this->query('INSERT INTO authors (full_name) VALUES (:full_name)');

			$this->bind('full_name', $post['full_name']);
			$this->execute();

			Message::setMessage('success', 'Author Added Successfully');

			header('Location:' . ROOT_URL . 'admin/authors/index');
			exit();
		}

		if (isset($_POST['edit_author'])) {

			// Sanitize Post
			$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

			$this->query('UPDATE authors SET full_name = :full_name WHERE id = :id');

			$this->bind('full_name', $post['full_name']);
			$this->bind('id', $post['id']);
			$this->execute();

			Message::setMessage('success', 'Author Info Changed Successfully');
		}

		if (isset($_POST['delete_author'])) {
			$this->query('DELETE FROM authors WHERE id = :id');
			$this->bind(':id', $_POST['id']);
			$this->execute();

			// Delete Author Id On The Book
			$this->query('DELETE FROM author_books WHERE author_id = :id');
			$this->bind(':id', $_POST['id']);
			$this->execute();

			Message::setMessage('success', 'Author Deleted Successfully');

			header('Location:' . $_SERVER['HTTP_REFERER']);
			exit();
		}

		$this->query('SELECT * FROM authors');

		return $this->all();
	}
}

?>