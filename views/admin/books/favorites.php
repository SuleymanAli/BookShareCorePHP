<table class="table">
	<thead>
		<tr>
			<th scope="col"># ID</th>
			<th scope="col">User Name</th>
			<th scope="col">Book Name</th>
		</tr>
	</thead>
	<tbody>

		<?php foreach ($data as $key => $favotite): ?>

			<tr>
				<td><?php echo $favotite['id']; ?></td>

				<td><?php echo $favotite['user_name']; ?></td>
				<td><?php echo $favotite['book_name']; ?></td>
			</tr>

		<?php endforeach?>

	</tbody>
</table>