<div class="col-md-4 mx-auto pt-5">
	<p class="lead">Login In</p>
	<form action="<?php $_SERVER['PHP_SELF']?>" method="POST">
		<div class="form-group">
			<input class="form-control" type="text" name="email">
		</div>
		<div class="form-group">
			<input class="form-control" type="password" name="password">
		</div>
		<div class="form-group">
			<input class="btn btn-primary btn-block" type="submit" value="LogIn" name="submit">
		</div>
		<div class="d-flex justify-content-between">
			<span>
				Don`t You Have An Account ?
			</span>
			<span>
				Please
				<a class="text-right" href="<?php echo ROOT_URL . 'users/register' ?>">
					Register
				</a>
			</span>
		</div>
	</form>
</div>