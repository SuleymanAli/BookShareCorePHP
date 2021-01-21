<?php

if (isset($_GET['admin']) && !($_GET['controller'] == 'users' && $_GET['action'] == 'login')) {
	if ($_SESSION['is_admin_logged_in'] == true) {
		return;
	} else {
		Message::setMessage('warning', 'Insufficient Permission');
		header('Location:' . ROOT_URL . 'admin/users/login');
		exit();
	}
}

?>