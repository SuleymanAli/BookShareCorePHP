<?php

namespace admin;

class Home extends \Controller {
	public function index() {
		$home = new \HomeModel();
		return $this->view($home->index(), 'admin', 'admin');
	}
}

?>