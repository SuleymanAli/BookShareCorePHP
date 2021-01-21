<div class="col-md-4 my-3 d-flex align-items-center justify-content-end">
	<a href="<?php echo ROOT_URL . 'admin/users/create' ?>">
		<button class="btn btn-info">
			Create User
		</button>
	</a>
</div>
<div class="col-md-12">
	<table class="table">
	  <thead>
	    <tr>
	      <th scope="col"># ID</th>
	      <th scope="col">Full Name</th>
	      <th scope="col">Email</th>
	      <th scope="col">Role</th>
	      <th scope="col" class="text-center">Actions</th>
	    </tr>
	  </thead>
	  <tbody>

	    <?php foreach ($data as $key => $user): ?>

	    	<tr>
	    	  <td><?php echo $user['id']; ?></td>
	    	  <td><?php echo $user['full_name']; ?></td>
	    	  <td><?php echo $user['email']; ?></td>
	    	  <td><?php echo $user['role'] ? 'Admin' : 'User'; ?></td>
	    	  <td class="d-flex justify-content-center">
	    	  	<span>
	    	  		<a href="<?php echo ROOT_URL . 'admin/users/edit/' . $user['id'] ?>" class="mx-3">
		    	  		<button class="btn btn-sm btn-secondary">
		    	  			Edit
		    	  		</button>
		    	  	</a>
	    	  	</span>
	    	  	<span>
	    	  		<a href="<?php echo ROOT_URL . 'admin/users/delete/' . $user['id'] ?>" class="mx-3">
	    	  			<button class="btn btn-sm btn-danger" <?php echo $user['full_name'] == 'Admin' ? 'disabled' : null; ?>>
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