<?php

class UserModel extends Model {
	public function register() {

		// Sanitize Post
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

		// Encrypt Password
		$password = md5($post['password']);

		if (isset($post['submit'])) {
			$this->query('INSERT INTO users (full_name, email, password) VALUES(:full_name, :email, :password)');
			$this->bind(':full_name', $_POST['full_name']);
			$this->bind(':email', $_POST['email']);
			$this->bind(':password', $password);
			$this->execute();
			// Verify
			if ($this->lastInsertId()) {
				// Message
				Message::setMessage('success', 'Your User Registration Completed Succesfully. Please Login');
				// Redirect
				header('Location: ' . ROOT_URL . 'users/login');
				exit();
			}
		}
		return;

	}

	public function login() {
		// Sanitize Post
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

		// Encrypt Password
		$password = md5($post['password']);

		if (isset($post['submit'])) {
			$this->query('SELECT * FROM users WHERE email = :email AND password = :password');
			$this->bind(':email', $_POST['email']);
			$this->bind(':password', $password);

			$row = $this->first();

			if ($row) {
				$_SESSION['is_user_logged_in'] = true;
				$_SESSION['user'] = [
					'id' => $row['id'],
					'full_name' => $row['full_name'],
					'email' => $row['email'],
				];

				Message::setMessage('success', 'You Entered Successfully');

				header('Location: ' . ROOT_URL . '/');
				exit();
			} else {
				Message::setMessage('error', 'Your Email And/Or Password Is Wrong!');
			}
		}
	}

	public function logout() {
		unset($_SESSION['is_user_logged_in']);
		unset($_SESSION['user']);
		session_destroy();
		// Redirect
		header('Location:' . ROOT_URL . '/');
		exit();
	}
}

?>