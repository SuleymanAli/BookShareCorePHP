<form class="col-12 pt-2 px-3" method="POST" action="<?php $_SERVER['PHP_SELF']?>" enctype="multipart/form-data">
	<div class="row">
		<div class="col-md-6">
			<!-- Id -->
			<input type="hidden" name="id" value="<?php echo $data['book']['id']; ?>">
			<!-- Name -->
			<div class="form-group">
				<label for="">Book Name</label>
				<input type="text" class="form-control" name="name" required value="<?php echo $data['book']['name']; ?>">
			</div>

			<!-- Featured -->
			<div class="form-group">
				<label for="">Book Status</label>
				<select name="featured" class="form-control">
					<option value="0" <?php echo $data['book']['featured'] ? null : 'selected'; ?> >Normal</option>
					<option value="1" <?php echo $data['book']['featured'] ? 'selected' : null; ?> >Featured</option>
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
				<input type="number" step="0.10" max="10" class="form-control" name="rating" required value="<?php echo $data['book']['rating']; ?>">
			</div>
			<!-- Categories -->
			<div class="form-group">
				<label for="">Book Categories</label>
				<select name="category_id" class="form-control">
					<option value="0" selected>Kategori Yok</option>
					<?php foreach ($data['categories'] as $category): ?>
						<?php if ($data['book']['category_id'] == $category['id']): ?>
							<option value="<?php echo $category['id']; ?>" selected><?php echo $category['name']; ?></option>
						<?php else: ?>
							<option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
						<?php endif?>
					<?php endforeach?>
				</select>
			</div>
			<!-- Authors -->
			<div class="form-group">
				<label for="">Book Authors</label>
				<select class="js-example-basic-multiple form-control" name="author[]" multiple="multiple">
					<?php foreach ($data['authors'] as $author): ?>
						<?php if (in_array($author, $data['book']['authors'])): ?>
							<option value="<?php echo $author['id']; ?>" selected><?php echo $author['full_name']; ?></option>
						<?php else: ?>
							<option value="<?php echo $author['id']; ?>"><?php echo $author['full_name']; ?></option>
						<?php endif?>
					<?php endforeach?>
				</select>
			</div>
			<div class="form-group">
				<input type="submit" class="btn btn-success" name="submit" value="Update Book">
			</div>
		</div>
		<div class="col-md-6">
			<!-- Selected Image -->
			<div class="mb-3">
				<img src="<?php echo ROOT_URL . $data['book']['image']; ?>" class="img-fluid" alt="<?php echo $data['book']['name'] ?>">
			</div>
			<!-- Description -->
			<div class="form-group">
				<label for="">Book About</label>
				<textarea name="description" id="" cols="20" rows="4" class="form-control"><?php echo $data['book']['description']; ?></textarea>
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
