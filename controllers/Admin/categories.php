<?php

namespace Admin;

class Categories extends \Controller {
	public function index() {
		$categories = new \Category();
		return $this->view($categories->index(), 'admin', 'admin');
	}
}

?>