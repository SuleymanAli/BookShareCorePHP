<?php

namespace admin;

class Users extends \Controller {

	public function index() {
		$user = new \AdminModel;

		$this->view($user->index(), 'admin', 'admin');
	}

	public function create() {
		$user = new \AdminModel;

		$this->view($user->create(), 'admin', 'admin');
	}

	public function edit() {
		$user = new \AdminModel();

		$this->view($user->edit(), 'admin', 'admin');
	}

	public function delete() {
		$user = new \AdminModel();

		$this->view($user->delete(), 'admin', 'admin');
	}

	public function login() {
		$user = new \AdminModel();
		$this->view($user->login(), null, 'admin');
	}

	public function logout() {
		unset($_SESSION['is_admin_logged_in']);
		unset($_SESSION['user']);
		session_destroy();

		header('Location:' . ROOT_URL . 'admin/users/login');
		exit();
	}
}

?>