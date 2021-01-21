<?php

class Bootstrap {
	private $controller;
	private $actions;
	private $request;

	public function __construct($request) {
		$this->request = $request;

		if (isset($this->request['admin']) && $this->request['admin'] == "admin") {
			/* Go To Admin Panel ex: sitename.com/admin */
			if ($this->request['controller'] == "") {
				$this->controller = '\admin\home';
			} else {
				/* If Admin Controller Entered ex: sitename.com/admin/user go to the controller */
				$this->controller = '\admin\\' . $this->request['controller'];
			}
		} else if ($this->request['controller'] == "") {
			/* Go To Site Url ex: sitename.com */
			$this->controller = 'home';
		} else {
			/* If Site Controller Entered ex: sitename.com/user go to the controller */
			$this->controller = $this->request['controller'];
		}

		if ($this->request['action'] == "") {
			$this->actions = 'index';
		} else {
			$this->actions = $this->request['action'];
		}
	}

	public function createController() {
		// Class Exits
		if (class_exists($this->controller)) {
			$parents = class_parents($this->controller);
			// Check Extent
			if (in_array("Controller", $parents)) {
				if (method_exists($this->controller, $this->actions)) {
					return new $this->controller($this->actions, $this->request);
				} else {
					// Method Does Not Exist
					echo "Method Does Not Exist";
					return;
				}
			} else {
				// Base Cotroller Does Not Exist
				echo "Base Cotroller Does Not Exist";
				return;
			}
		} else {
			// Controller Class Does Not Exist
			echo "Controller Class Does Not Exist";
			return;
		}
	}
}

?>