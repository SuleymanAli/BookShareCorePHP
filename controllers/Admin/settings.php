<?php

namespace Admin;

class Settings extends \Controller {
	public function index() {
		$setting = new \Setting();
		return $this->view($setting->index(), 'admin', 'admin');
	}
}

?>