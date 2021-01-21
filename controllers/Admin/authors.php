<?php

namespace Admin;

class Authors extends \Controller {
	public function index() {
		$authors = new \Author();
		return $this->view($authors->index(), 'admin', 'admin');
	}
}

?>