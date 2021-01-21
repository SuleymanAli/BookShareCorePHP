<div class="col-md-12">
	<table class="table">
		<thead>
			<tr>
				<th scope="col"># ID</th>
				<th scope="col">Book Name</th>
				<th scope="col">User</th>
				<th scope="col">Comment</th>
				<th scope="col">Date</th>
				<th scope="col" class="text-center">Action</th>
			</tr>
		</thead>
		<tbody>

			<?php foreach ($data as $key => $comment): ?>

					<tr>
						<td><?php echo $comment['id']; ?></td>
						<td>
							<?php echo $comment['book_name']; ?>
						</td>
						<td>
							<?php echo $comment['user_name']; ?>
						</td>
						<td>
							<?php echo $comment['content']; ?>
						</td>
						<td>
							<?php echo $comment['created_at']; ?>
						</td>
						<td class="d-flex justify-content-center">
							<!-- <span>
								<input type="submit" class="mx-3 btn btn-sm btn-secondary" name="edit_comment" value="Edit">
							</span> -->
							<span>
								<a href="<?php echo ROOT_URL . 'admin/comments/delete/' . $comment['id'] ?>" class="mx-3 btn btn-sm btn-danger">
									Delete
								</a>
							</span>
						</td>
					</tr>

			<?php endforeach?>

		</tbody>
	</table>
</div>