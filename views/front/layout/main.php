<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>📚 Find Your Dream Books</title>

	<!-- Bootstrap core CSS -->
	<link href="<?php echo ROOT_URL . 'assets/' ?>css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom styles for this template -->
	<link href="<?php echo ROOT_URL . 'assets/admin/' ?>css/simple-sidebar.css" rel="stylesheet">

	<!-- Custom styles -->
	<link href="<?php echo ROOT_URL . 'assets/' ?>css/front-main.css" rel="stylesheet">

</head>

<body>
	<nav class="navbar navbar-expand-md navbar-dark bg-dark">
		<a class="navbar-brand" href="<?php echo ROOT_URL ?>">Books Store</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarsExampleDefault">
			<ul class="navbar-nav mr-auto">
				<!-- <li class="nav-item active">
					<a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
				</li> -->
				<!-- <li class="nav-item">
					<a class="nav-link" href="#">Link</a>
				</li>
				<li class="nav-item">
					<a class="nav-link disabled" href="#">Disabled</a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="https://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
					<div class="dropdown-menu" aria-labelledby="dropdown01">
						<a class="dropdown-item" href="#">Action</a>
						<a class="dropdown-item" href="#">Another action</a>
						<a class="dropdown-item" href="#">Something else here</a>
					</div>
				</li> -->
			</ul>
			<!-- <form class="form-inline my-2 my-lg-0">
				<input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
				<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
			</form> -->
			<div class="mx-4">
				<?php if (isset($_SESSION['is_user_logged_in'])): ?>
					<div class="dropdown text-light d-inline-block">
						<a class="nav-link dropdown-toggle text-light" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<?php echo $_SESSION['user']['full_name']; ?>
						</a>
						<div class="dropdown-menu" aria-labelledby="dropdown01">
							<a class="dropdown-item" href="<?php echo ROOT_URL . 'books/create' ?>">Kitap Ekle</a>
							<a class="dropdown-item" href="<?php echo ROOT_URL . 'books/index' ?>">Eklediğin Kitaplar</a>
							<a class="dropdown-item" href="<?php echo ROOT_URL . 'books/showFavoritesByUser' ?>">Favori Kitapların</a>
						</div>
					</div>
					<a class="text-light px-2" href="<?php echo ROOT_URL . 'users/logout' ?>">
						Logout
					</a>
				<?php else: ?>
					<a class="text-info px-2" href="<?php echo ROOT_URL . 'users/register' ?>">
						Sign Up
					</a>
					<a class="text-success px-2" href="<?php echo ROOT_URL . 'users/login' ?>">
						Log In
					</a>
				<?php endif?>
			</div>
		</div>
	</nav>

	<main role="main" class="container">

		<div class="row">
			<div class="col-md-6 mx-auto mt-4">
				<?php include './views/partials/_message.php';?>
			</div>
		</div>

		<div class="row">
			<?php require $view;?>
		</div>

	</main><!-- /.container -->

	<!-- Footer -->
	<footer class="footer pb-4">
		<div class="container">
			<span class="text-muted">
				<?php if (isset($data['setting'])): ?>
					<a href="//<?php echo $data['setting'][0]['facebook_url']; ?>" class="pr-2">Facebook</a>
					<a href="//<?php echo $data['setting'][0]['instagram_url']; ?>">Instagram</a>
				<?php endif?>
			</span>
		</div>
	</footer>

	<!-- Bootstrap core JavaScript -->
	<script src="<?php echo ROOT_URL . 'assets/' ?>js/jquery-3.5.1.min.js"></script>
	<script src="<?php echo ROOT_URL . 'assets/' ?>js/bootstrap.min.js"></script>
</body>

</html>
