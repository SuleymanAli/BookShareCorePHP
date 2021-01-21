<div class="col-md-4 my-3 d-flex align-items-center">
	<form class="d-flex bg-light pt-3 px-3" method="POST" action="<?php $_SERVER['PHP_SELF']?>">
		<div class="form-group">
			<input type="text" class="form-control" name="name" required placeholder="Add Category">
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
				<th scope="col">Category Name</th>
				<th scope="col" class="text-center">Actions</th>
			</tr>
		</thead>
		<tbody>

			<?php foreach ($data as $key => $category): ?>

				<form action="<?php $_SERVER['PHP_SELF']?>" method="POST">
					<tr>
						<td><?php echo $category['id']; ?></td>
						<td>
							<input type="hidden" value="<?php echo $category['id']; ?>" name="id">
							<input type="text" value="<?php echo $category['name']; ?>" name="name">
						</td>
						<td class="d-flex justify-content-center">
							<span>
								<input type="submit" class="mx-3 btn btn-sm btn-secondary" name="edit_category" value="Edit">
							</span>
							<span>
								<input type="submit" class="mx-3 btn btn-sm btn-danger" name="delete_category" value="Delete">
							</span>
						</td>
					</tr>
				</form>

			<?php endforeach?>

		</tbody>
	</table>
</div>