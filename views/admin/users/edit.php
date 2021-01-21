<div class="col-md-6">
	<form class="form pt-2 px-3" method="POST" action="<?php $_SERVER['PHP_SELF']?>">
		<div class="form-group">
			<input type="hidden" class="form-control" name="id" value="<?php echo $data['id'] ?>">
		</div>
		<div class="form-group">
			<label for="">User Full Name (Or Simply Name)</label>
			<input type="text" class="form-control" name="full_name" value="<?php echo $data['full_name'] ?>">
		</div>
		<div class="form-group">
			<label for="">User Email</label>
			<input type="email" class="form-control" name="email" value="<?php echo $data['email'] ?>">
		</div>
		<div class="form-group">
			<label for="">User Role</label>
			<select name="role" class="form-control">
				<option value="0" <?php echo $data['role'] ? null : 'selected'; ?> >
					User
				</option>
				<option value="1" <?php echo $data['role'] ? 'selected' : null; ?> >
					Admin
				</option>
			</select>
		</div>
		<div class="form-group">
			<label for="">User Password</label>
			<input type="password" class="form-control" name="password">
		</div>
		<div class="form-group">
			<input type="submit" class="btn btn-success" name="submit" value="Update User">
		</div>
	</form>
</div>
