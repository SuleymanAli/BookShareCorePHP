<div class="col-md-7">
	<div class="card-group">
		<div class="card">
			<div class="card-title pt-4 pl-4">
				Book Details
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-3">
						<p>ID:</p>
						<p>Name:</p>
						<p>Featured:</p>
						<p>Rating:</p>
						<p>Views:</p>
						<p>Liked:</p>
						<p>Added User:</p>
						<p>Category:</p>
						<p>Authors:</p>
						<p>Added:</p>
					</div>
					<div class="col-9">
						<p># <?php echo $data['id'] ?></p>
						<p><?php echo $data['name'] ?></p>
						<p><?php echo $data['featured'] ? 'Yes' : 'No'; ?></p>
						<p><?php echo $data['rating'] ?></p>
						<p><?php echo $data['views'] ?></p>
						<p><?php echo $data['liked'] ?></p>
						<p><?php echo $data['user_name'] ?></p>
						<p><?php echo $data['category_name'] ?></p>
						<p>
							<?php foreach ($data['authors'] as $author): ?>
								<?php echo $author['full_name']; ?>
							<?php endforeach?>
						</p>
						<p><?php echo date('d M Y', strtotime($data['created_at'])); ?></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="col-md-5">
	<div class="card-group">
		<div class="card">
			<div class="card-title pt-4 pl-4 pr-4 d-flex">
				<div class="align-self-center">
					Book About
				</div>
				<!-- Update Book -->
				<span class="ml-auto">
					<a href="<?php echo ROOT_URL . 'admin/books/edit/' . $data['id'] ?>" class="" name="edit_book">
						<button class="btn btn-sm btn-secondary">
							Edit
						</button>
					</a>
				</span>
				<!-- Delete Book -->
				<span class="ml-3">
					<a href="<?php echo ROOT_URL . 'admin/books/delete/' . $data['id'] ?>" class="">
						<button class="btn btn-sm btn-danger">
							Delete
						</button>
					</a>
				</span>
			</div>
			<div class="card-body">
				<div>
					<p><?php echo $data['description'] ?></p>
				</div>
			</div>
		</div>
	</div>
</div>