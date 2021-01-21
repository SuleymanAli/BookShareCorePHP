<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Admin Panel</title>

	<!-- Bootstrap core CSS -->
	<link href="<?php echo ROOT_URL . 'assets/' ?>css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom styles for this template -->
	<link href="<?php echo ROOT_URL . 'assets/admin/' ?>css/simple-sidebar.css" rel="stylesheet">
</head>
<body>
	<div class="d-flex" id="wrapper">

		<!-- Sidebar -->
		<div class="bg-light border-right" id="sidebar-wrapper">
			<div class="sidebar-heading">
				Admin Panel
				<span>
					<a href="<?php echo ROOT_URL . 'home/'; ?>" class="badge badge-pill" target="_blank">Front Site</a>
				</span>
			</div>
			<div class="list-group list-group-flush">
				<a href="<?php echo ROOT_URL . 'admin/'; ?>" class="list-group-item list-group-item-action bg-light">Dashboard</a>
				<a href="<?php echo ROOT_URL . 'admin/users/index'; ?>" class="list-group-item list-group-item-action bg-light">Users</a>

				<a href="<?php echo ROOT_URL . 'admin/books/index'; ?>" class="list-group-item list-group-item-action bg-light">Books</a>
				<a href="<?php echo ROOT_URL . 'admin/books/favorites'; ?>" class="list-group-item list-group-item-action bg-light">Faverites</a>
				<a href="<?php echo ROOT_URL . 'admin/authors/index'; ?>" class="list-group-item list-group-item-action bg-light">Authors</a>
				<a href="<?php echo ROOT_URL . 'admin/categories/index'; ?>" class="list-group-item list-group-item-action bg-light">Categories</a>
				<a href="<?php echo ROOT_URL . 'admin/comments/index'; ?>" class="list-group-item list-group-item-action bg-light">Comments</a>
				<a href="<?php echo ROOT_URL . 'admin/settings/index'; ?>" class="list-group-item list-group-item-action bg-light">Settings</a>
			</div>
		</div>
		<!-- /#sidebar-wrapper -->

		<!-- Page Content -->
		<div id="page-content-wrapper">

			<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
				<button class="btn btn" id="menu-toggle">
					<span class="navbar-toggler-icon"></span>
				</button>

				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav ml-auto mt-2 mt-lg-0">
						<li class="nav-item active">
							<a class="nav-link" href="<?php echo ROOT_URL . 'admin/users/edit/' . $_SESSION['admin']['id'] ?>"><?php echo $_SESSION['admin']['full_name']; ?> <span class="sr-only">(current)</span></a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?php echo ROOT_URL . 'admin/users/logout' ?>">Logout</a>
						</li>
						<!-- <li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Dropdown
							</a>
							<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="#">Action</a>
								<a class="dropdown-item" href="#">Another action</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="#">Something else here</a>
							</div>
						</li> -->
					</ul>
				</div>
			</nav>

			<div class="container-fluid">
				<div class="row">
					<div class="col-md-8 pt-4 px-3">
						<?php include './views/partials/_message.php';?>
					</div>

					<?php require $view;?>
				</div>
			</div>
		</div>
		<!-- /#page-content-wrapper -->

	</div>
	<!-- /#wrapper -->

	<!-- Bootstrap core JavaScript -->
	<script src="<?php echo ROOT_URL . 'assets/' ?>js/jquery-3.5.1.min.js"></script>
	<script src="<?php echo ROOT_URL . 'assets/' ?>js/bootstrap.min.js"></script>

	<!-- Menu Toggle Script -->
	<script>
		$("#menu-toggle").click(function(e) {
			e.preventDefault();
			$("#wrapper").toggleClass("toggled");
		});
	</script>
</body>
</html>
