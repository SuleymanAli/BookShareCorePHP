<?php

abstract class Controller {
	protected $request;
	protected $action;

	public function __construct($action, $request) {
		$this->action = $action;
		$this->request = $request;
	}

	public function executeAction() {
		return $this->{$this->action}();
	}

	protected function view($data, $layout = null, $dir = 'front') {
		$view = 'views/' . ($dir == 'admin' ? get_class($this) : $dir . '/' . get_class($this)) . '/' . $this->action . '.php';

		if ($layout == 'front') {
			require 'views/front/layout/main.php';
		} else if ($layout == 'admin') {
			require 'views/admin/layout/main.php';
		} else {
			require $view;
		}
	}
}

?>