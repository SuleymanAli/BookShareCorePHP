<?php

class Message {
	public static function setMessage($type, $text) {
		if ($type == "error") {
			$_SESSION['errorMessage'] = $text;
		} else if ($type == "warning") {
			$_SESSION['warningMessage'] = $text;
		} else {
			$_SESSION['successMessage'] = $text;
		}
	}
}

?>