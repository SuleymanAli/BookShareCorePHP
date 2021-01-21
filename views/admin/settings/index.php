<div class="col-md-12">

	<form action="<?php $_SERVER['PHP_SELF']?>" method="POST">

		<!-- Site Title -->
		<div class="row">
			<div class="col-md-4">
				Site Title
			</div>
			<div class="col-md-8">
				<div class="form-group">
					<input type="text" class="form-control" name="site_title" value="<?php echo $data[0]['site_title'] ?>">
				</div>
			</div>
		</div>

		<!-- Showcase Title -->
		<div class="row">
			<div class="col-md-4">
				Showcase Title
			</div>
			<div class="col-md-8">
				<div class="form-group">
					<input type="text" class="form-control" name="showcase_title" value="<?php echo $data[0]['showcase_title'] ?>">
				</div>
			</div>
		</div>

		<!-- Showcase Content -->
		<div class="row">
			<div class="col-md-4">
				Showcase Content
			</div>
			<div class="col-md-8">
				<div class="form-group">
					<textarea type="text" cols="30" rows="10" class="form-control" name="showcase_content"><?php echo $data[0]['showcase_content'] ?></textarea>
				</div>
			</div>
		</div>

		<!-- Facebook -->
		<div class="row">
			<div class="col-md-4">
				FaceBook
			</div>
			<div class="col-md-8">
				<div class="form-group">
					<input type="text" class="form-control" name="facebook_url" value="<?php echo $data[0]['facebook_url'] ?>">
				</div>
			</div>
		</div>

		<!-- Instagram -->
		<div class="row">
			<div class="col-md-4">
				Instagram
			</div>
			<div class="col-md-8">
				<div class="form-group">
					<input type="text" class="form-control" name="instagram_url" value="<?php echo $data[0]['instagram_url'] ?>">
				</div>
			</div>
		</div>


		<button type="submit" name="update_setting" class="btn btn-success">Update</button>
	</form>

</div>