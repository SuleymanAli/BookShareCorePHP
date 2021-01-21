<?php

class Users extends Controller {
	public function register() {
		$user = new UserModel();
		$this->view($user->register(), 'front', 'front');
	}

	public function login() {
		$user = new UserModel();
		$this->view($user->login(), 'front', 'front');
	}

	public function logout() {
		unset($_SESSION['is_admin_logged_in']);
		unset($_SESSION['user']);
		session_destroy();

		header('Location:' . ROOT_URL);
		exit();
	}
}

?>