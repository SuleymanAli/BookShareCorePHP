<div class="col-md-4 mx-auto pt-5">
	<p class="lead">Sign Up</p>
	<form action="<?php $_SERVER['PHP_SELF']?>" method="POST">
		<div class="form-group"><input class="form-control" type="text" name="email"></div>
		<div class="form-group"><input class="form-control" type="text" name="full_name"></div>
		<div class="form-group"><input class="form-control" type="password" name="password"></div>
		<div class="form-group"><input class="btn btn-primary btn-block" type="submit" name="submit" value="Sign up"></div>

		<div class="d-flex justify-content-between">
			<span>
				Do You Already Have An Account ?
			</span>
			<span>
				Please
				<a class="text-right" href="<?php echo ROOT_URL . 'users/login' ?>">
					Login
				</a>
			</span>
		</div>
	</form>
</div>