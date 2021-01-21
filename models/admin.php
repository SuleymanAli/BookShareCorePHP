<?php

class AdminModel extends Model {
	public function index() {
		$this->query('SELECT * FROM users');
		$users = $this->all();

		return $users;
	}

	public function create() {
		if (isset($_POST['submit'])) {

			// Sanitize Post
			$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

			// Encrypt Password
			$password = md5($post['password']);

			$this->query('INSERT INTO users (full_name, email, password, role) VALUES (:full_name, :email, :password, :role)');

			$this->bind('full_name', $post['full_name']);
			$this->bind('email', $post['email']);
			$this->bind('role', $post['role']);
			$this->bind('password', $password);
			$this->execute();

			Message::setMessage('success', 'User Added Successfully');

			header('Location:' . ROOT_URL . 'admin/users/index');
			exit();
		}
	}

	public function show() {
		$id = $_GET['id'];
		$this->query('SELECT * FROM users WHERE id = :id');
		$this->bind(':id', $id);
		return $this->first();
	}

	public function edit() {
		if (isset($_POST['submit'])) {

			// Sanitize Post
			$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

			// Encrypt Password
			if (isset($post['password'])) {
				$password = md5($post['password']);
				$this->query('UPDATE users SET full_name = :full_name, email = :email, role = :role, password = :password WHERE id = :id');
				$this->bind('password', $password);
			} else {
				$this->query('UPDATE users SET full_name = :full_name, email = :email, role = :role WHERE id = :id');
			}

			$this->bind('full_name', $post['full_name']);
			$this->bind('email', $post['email']);
			$this->bind('role', $post['role']);
			$this->bind('id', $post['id']);
			$this->execute();

			Message::setMessage('success', 'User Info Changed Successfully');
		}

		return $this->show();
	}

	public function delete() {
		$id = $_GET['id'];
		$this->query('DELETE FROM users WHERE id = :id');
		$this->bind(':id', $id);
		$this->execute();

		Message::setMessage('success', 'User Deleted Successfully');

		header('Location:' . $_SERVER['HTTP_REFERER']);
		exit();
	}

	public function login() {
		// Sanitize Post
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

		// Encrypt Password
		$password = md5($post['password']);

		if (isset($post['submit'])) {
			$this->query('SELECT * FROM users WHERE email = :email AND password = :password AND role = 1');
			$this->bind(':email', $_POST['email']);
			$this->bind(':password', $password);

			$row = $this->first();

			if ($row) {
				$_SESSION['is_admin_logged_in'] = true;
				$_SESSION['admin'] = [
					'id' => $row['id'],
					'full_name' => $row['full_name'],
					'email' => $row['email'],
				];

				// Message
				Message::setMessage('success', 'You Enter To The Admin Panel Successfully');

				// Redirect
				header('Location:' . ROOT_URL . 'admin/');
				exit();
			} else {
				Message::setMessage('error', 'Your Email And/Or Password Is Wrong!');
			}
		}
	}
}

?>