<?php

namespace Admin;

class Comments extends \Controller {
	public function index() {
		$comments = new \Comment();
		return $this->view($comments->index(), 'admin', 'admin');
	}

	public function delete() {
		$comments = new \Comment();
		return $comments->delete();
	}
}

?>