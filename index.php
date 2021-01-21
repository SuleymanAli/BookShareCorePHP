<?php

// Session
session_start();
ob_start();

// Config
require 'config.php';

// Packages
require __DIR__ . '/vendor/autoload.php';

// Classes
require 'classes/Bootstrap.php';
require 'classes/Controller.php';
require 'classes/Model.php';
require 'classes/Message.php';
// Middleware
require 'classes/middleware.php';

// Controller
require 'controllers/home.php';
require 'controllers/users.php';
require 'controllers/books.php';
require 'controllers/comments.php';
// Controller (Admin)
require 'controllers/admin/users.php';
require 'controllers/admin/home.php';
require 'controllers/admin/authors.php';
require 'controllers/admin/categories.php';
require 'controllers/admin/settings.php';
require 'controllers/admin/books.php';
require 'controllers/admin/comments.php';

// Model
require 'models/home.php';
require 'models/user.php';
require 'models/admin.php';
require 'models/author.php';
require 'models/category.php';
require 'models/setting.php';
require 'models/book.php';
require 'models/comment.php';
require 'models/favorite.php';

$bootstrap = new Bootstrap($_GET);

$controller = $bootstrap->createController();

if ($controller) {
	$controller->executeAction();
}

?>