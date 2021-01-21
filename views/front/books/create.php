<form class="col-12 pt-2 px-3" method="POST" action="<?php $_SERVER['PHP_SELF']?>" enctype="multipart/form-data">
	<div class="row">
		<div class="col-md-6">
			<!-- Name -->
			<div class="form-group">
				<label for="">Book Name</label>
				<input type="text" class="form-control" name="name" required>
			</div>

			<!-- Featured -->
			<div class="form-group">
				<label for="">Book Status</label>
				<select name="featured" class="form-control">
					<option value="0">Normal</option>
					<option value="1">Featured</option>
				</select>
			</div>
			<!-- Image -->
			<div class="form-group">
				<label for="">Select Image</label>
				<input type="file" class="form-control" name="image">
			</div>
			<!-- Rating -->
			<div class="form-group">
				<label for="">Book Rating</label>
				<input type="number" step="0.10" max="10" class="form-control" name="rating" required>
			</div>
			<div class="form-group">
				<input type="submit" class="btn btn-success" name="submit" value="Create Book">
			</div>
		</div>
		<div class="col-md-6">
			<!-- Description -->
			<div class="form-group">
				<label for="">Book About</label>
				<textarea name="description" id="" cols="20" rows="4" class="form-control"></textarea>
			</div>
			<!-- Categories -->
			<div class="form-group">
				<label for="">Book Categories</label>
				<select name="category_id" class="form-control">
					<?php foreach ($data['categories'] as $category): ?>
						<option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
					<?php endforeach?>
				</select>
			</div>
			<!-- Authors -->
			<div class="form-group">
				<label for="">Book Authors</label>
				<select class="js-example-basic-multiple form-control" name="author[]" multiple="multiple">
					<?php foreach ($data['authors'] as $author): ?>
						<option value="<?php echo $author['id']; ?>"><?php echo $author['full_name']; ?></option>
					<?php endforeach?>
				</select>
			</div>
		</div>
	</div>
</form>

<link href="<?php echo ROOT_URL . 'assets/' ?>css/select2.min.css" rel="stylesheet" />
<script src="<?php echo ROOT_URL . 'assets/' ?>js/select2.min.js" defer></script>
<script type="module">
	$(document).ready(function() {
		$('.js-example-basic-multiple').select2();
	});
</script>
