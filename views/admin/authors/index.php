<div class="col-md-4 my-3 d-flex align-items-center">
	<form class="d-flex bg-light pt-3 px-3" method="POST" action="<?php $_SERVER['PHP_SELF']?>">
		<div class="form-group">
			<input type="text" class="form-control" name="full_name" required placeholder="Add Author Full Name">
		</div>
		<div class="pl-4 form-group">
			<input type="submit" class="btn btn-success" name="submit" value="Create">
		</div>
	</form>
</div>

<div class="col-md-12">
	<table class="table">
		<thead>
			<tr>
				<th scope="col"># ID</th>
				<th scope="col">Full Name</th>
				<th scope="col" class="text-center">Actions</th>
			</tr>
		</thead>
		<tbody>

			<?php foreach ($data as $key => $author): ?>

				<form action="<?php $_SERVER['PHP_SELF']?>" method="POST">
					<tr>
						<td><?php echo $author['id']; ?></td>
						<td>
							<input type="hidden" value="<?php echo $author['id']; ?>" name="id">
							<input type="text" value="<?php echo $author['full_name']; ?>" name="full_name">
						</td>
						<td class="d-flex justify-content-center">
							<span>
								<!-- <a href="<?php echo ROOT_URL . 'admin/authors/edit/' . $author['id'] ?>" class="mx-3" name="edit_author">
									<button class="btn btn-sm btn-secondary">
										Edit
									</button>
								</a> -->
								<input type="submit" class="mx-3 btn btn-sm btn-secondary" name="edit_author" value="Edit">
							</span>
							<span>
								<!-- <a href="<?php echo ROOT_URL . 'admin/authors/delete/' . $author['id'] ?>" class="mx-3">
									<button class="btn btn-sm btn-danger" <?php echo $author['full_name'] == 'Admin' ? 'disabled' : null; ?>>
										Delete
									</button>
								</a> -->
								<input type="submit" class="mx-3 btn btn-sm btn-danger" name="delete_author" value="Delete">
							</span>
						</td>
					</tr>
				</form>

			<?php endforeach?>

		</tbody>
	</table>
</div>