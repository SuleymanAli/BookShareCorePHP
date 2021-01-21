<?php

class Category extends Model {
	public function index() {

		if (isset($_POST['submit'])) {

			// Sanitize Post
			$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

			$this->query('INSERT INTO categories (name) VALUES (:name)');

			$this->bind('name', $post['name']);
			$this->execute();

			Message::setMessage('success', 'Category Added Successfully');

			header('Location:' . ROOT_URL . 'admin/categories/index');
			exit();
		}

		if (isset($_POST['edit_category'])) {

			// Sanitize Post
			$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

			$this->query('UPDATE categories SET name = :name WHERE id = :id');

			$this->bind('name', $post['name']);
			$this->bind('id', $post['id']);
			$this->execute();

			Message::setMessage('success', 'Category Changed Successfully');
		}

		if (isset($_POST['delete_category'])) {
			$this->query('DELETE FROM categories WHERE id = :id');
			$this->bind(':id', $_POST['id']);
			$this->execute();

			// Delete Author Of Book
			$this->query('UPDATE books SET category_id = 0 WHERE category_id = :category_id');
			$this->bind(':category_id', $_POST['id']);
			$this->execute();

			Message::setMessage('success', 'Category Deleted Successfully');

			header('Location:' . $_SERVER['HTTP_REFERER']);
			exit();
		}

		$this->query('SELECT * FROM categories');

		return $this->all();
	}
}

?>