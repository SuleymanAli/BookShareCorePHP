<div class="col-md-4 my-3 d-flex align-items-center justify-content-end">
	<a href="<?php echo ROOT_URL . 'admin/books/create' ?>">
		<button class="btn btn-info">
			Create Book
		</button>
	</a>
</div>
<div class="col-md-12">
	<table class="table">
		<thead>
			<tr>
				<th scope="col"># ID</th>
				<th scope="col">Book Name</th>
				<th scope="col" class="text-center">Featured</th>
				<th scope="col" class="text-center">Views</th>
				<th scope="col" class="text-center">Liked</th>
				<th scope="col" class="text-center">Rating</th>
				<th scope="col" class="text-center">Actions</th>
			</tr>
		</thead>
		<tbody>

			<?php foreach ($data as $key => $book): ?>

				<tr>
					<td><?php echo $book['id']; ?></td>

					<td>
						<!-- Book Name -->
						<?php echo $book['name']; ?>
					</td>

					<td class="text-center">
						<!-- Book Featured -->
							<?php if ($book['featured']): ?>
							<div class="badge badge-success">Featured</div>
						<?php else: ?>
							<div class="badge badge-info">Normal</div>
						<?php endif?>
					</td>

					<td class="text-center">
						<!-- Book Views -->
						<?php echo $book['views']; ?>
					</td>

					<td class="text-center">
						<!-- Book Liked -->
						<?php echo $book['liked']; ?>
					</td>

					<td class="text-center">
						<!-- Book Rating -->
						<?php echo $book['rating']; ?>
					</td>

					<!-- Actions -->
					<td class="d-flex justify-content-center">
						<!-- Show Book -->
						<span>
							<a href="<?php echo ROOT_URL . 'admin/books/show/' . $book['id'] ?>" class="mx-3" name="show_book">
								<button class="btn btn-sm btn-info">
									Show
								</button>
							</a>
						</span>
						<!-- Update Book -->
						<span>
							<a href="<?php echo ROOT_URL . 'admin/books/edit/' . $book['id'] ?>" class="mx-3" name="edit_book">
								<button class="btn btn-sm btn-secondary">
									Edit
								</button>
							</a>
						</span>
						<!-- Delete Book -->
						<span>
							<a href="<?php echo ROOT_URL . 'admin/books/delete/' . $book['id'] ?>" class="mx-3">
								<button class="btn btn-sm btn-danger">
									Delete
								</button>
							</a>
						</span>
					</td>
				</tr>

			<?php endforeach?>

		</tbody>
	</table>
</div>