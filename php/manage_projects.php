<?php 
	if (isset($_GET['del'])) {
		deleteUser();
	}

	// function for deleting the record
	function deleteUser()
	{
		global $db;
		$id=$_GET['del'];
		$delQuery="DELETE FROM projects WHERE id=$id";
		$result=mysqli_query($db, $delQuery);
		if ($result) {
			?>
			<!-- Message to display on deleting the record -->
			<div class="alert alert-danger alert-dismissible fade show mt-0">
				<strong>The Project has Been Deleted!</strong>
				<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button>
			</div>
			<?php
		}
	}
	
 ?>

	