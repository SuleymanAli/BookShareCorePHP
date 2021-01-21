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
	<style>
		html,
		body {
			height: 100%;
		}

		body {
			display: -ms-flexbox;
			display: -webkit-box;
			display: flex;
			-ms-flex-align: center;
			-ms-flex-pack: center;
			-webkit-box-align: center;
			align-items: center;
			-webkit-box-pack: center;
			justify-content: center;
			padding-top: 40px;
			padding-bottom: 40px;
			background-color: #f5f5f5;
		}

		.form-signin {
			width: 100%;
			max-width: 330px;
			padding: 15px;
			margin: 0 auto;
		}
		.form-signin .checkbox {
			font-weight: 400;
		}
		.form-signin .form-control {
			position: relative;
			box-sizing: border-box;
			height: auto;
			padding: 10px;
			font-size: 16px;
		}
		.form-signin .form-control:focus {
			z-index: 2;
		}
		.form-signin input[type="email"] {
			margin-bottom: -1px;
			border-bottom-right-radius: 0;
			border-bottom-left-radius: 0;
		}
		.form-signin input[type="password"] {
			margin-bottom: 10px;
			border-top-left-radius: 0;
			border-top-right-radius: 0;
		}

	</style>
</head>
<body class="text-center">
	<form class="form-signin" method="POST" action="<?php $_SERVER['PHP_SELF']?>">
		<!-- <img class="mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72"> -->
		<?php include './views/partials/_message.php';?>
		<h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
		<label for="inputEmail" class="sr-only">Email address</label>
		<!-- Email -->
		<input type="email" id="inputEmail" class="form-control" placeholder="Email address" required="" autofocus="" name="email">
		<label for="inputPassword" class="sr-only">Password</label>
		<!-- PASS -->
		<input type="password" id="inputPassword" class="form-control" placeholder="Password" required="" name="password">
		<!-- <div class="checkbox mb-3">
			<label>
				<input type="checkbox" value="remember-me"> Remember me
			</label>
		</div> -->
		<button class="btn btn-lg btn-primary btn-block mt-4" type="submit" name="submit">Sign in</button>
		<p class="mt-5 mb-3 text-muted">© 2020-2021</p>
	</form>

	<!-- Bootstrap core JavaScript -->
	<script src="<?php echo ROOT_URL . 'assets/' ?>js/jquery-3.5.1.min.js"></script>
	<script src="<?php echo ROOT_URL . 'assets/' ?>js/bootstrap.min.js"></script>
</body>
</html>