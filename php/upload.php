<?php 
	// database connection
	$db = mysqli_connect('localhost', 'root', '', 'projects');

	//calling function
	//this is the functionality for adding buses to the database
	if (isset($_POST['upload'])) {
		uploadProject();
	}

	//the function
	function uploadProject()
	{
		global $db;
		$title    		=  e($_POST['title']);
		$description    =  e($_POST['description']);

		$image 			=  $_FILES['image']['name'];
		$tempname		=  $_FILES['image']['tmp_name'];
		$folder			=  "images/".$image;

		$documentation 	=  $_FILES['doc']['name'];
		$docname		=  $_FILES['doc']['tmp_name'];
		$folder1		=  "documentations/".$documentation;

		$userid=$_SESSION['user']['id'];

		$check="SELECT * FROM projects WHERE title='$title'";
		$results=mysqli_query($db, $check);
		$rows=mysqli_num_rows($results);
		if ($rows>0) {
			?>
				<div class="alert alert-danger alert-dismissible fade show" role="alert">
					<strong>Sorry!! You are adding a duplicate project</strong>
					<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button>
				</div>
			<?php
		}
		elseif($rows==0){
			$sql="INSERT INTO projects(student_id,title,description,documentation,image) VALUES('$userid','$title','$description ','$documentation','$image' )";
			$results=mysqli_query($db, $sql);

			if (move_uploaded_file($tempname, $folder) && move_uploaded_file($docname, $folder1)) {
				if ($results) {
					?>
					<div class="alert alert-success alert-dismissible fade show">
						<strong>Project uploaded successfully.</strong>
						<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button>
					</div>
					<?php
				}
				else{
					?>
					<div class="alert alert-danger alert-dismissible fade show" role="alert">
						<strong>Sorry!! You cannot do a project that has already be done before</strong>
						<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button>
					</div>
					<?php
				}
			}else{
				?>
					<div class="alert alert-danger alert-dismissible fade show" role="alert">
						<strong>Sorry!! Upload failed</strong>
						<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button>
					</div>
				<?php
			}

			}		
	}

	//functionality for deleting bus record from the database records
	if (isset($_GET['del'])) {
		deleteBus();
	}

	// function for deleting the record
	function deleteBus()
	{
		global $db;
		$id=$_GET['del'];
		$delQuery="DELETE FROM buses WHERE id=$id";
		$result=mysqli_query($db, $delQuery);
		if ($result) {
			?>
			<!-- Message to display on deleting the record -->
			<div class="alert alert-danger alert-dismissible fade show">
				<strong>Record Deleted!</strong>
				<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button>
			</div>
			<?php
		}
	}

	//functionality for update key
	$id = "";
	$bus_no = "";
	$seats  = "";
	$driver = "";
	if (isset($_GET['edit'])) {
		editBus();
	}

	//function for edit functionality
	function editBus()
	{
		global $db, $id, $bus_no, $seats, $driver;

		$id=$_GET['edit'];
		$selQuery="SELECT * FROM buses WHERE id=$id";
		$result=mysqli_query($db,$selQuery);
		if (mysqli_num_rows($result)==1) {
			$rows   = mysqli_fetch_assoc($result);
			$bus_no = $rows['bus_no'];
			$seats  = $rows['seats'];
			$driver = $rows['driver'];
		}
	}

	//update functionality
	if (isset($_POST['update'])) {
		updateBus();
	}
	//updating function
	function updateBus()
	{
		global $db;
		$id     = $_POST['id'];
		$bus_no = e($_POST['bus_no']);
		$seats  = e($_POST['seats']);
		$driver = e($_POST['driver']);

		//update statement
		$update = "UPDATE buses SET bus_no='$bus_no', seats='$seats', driver='$driver' WHERE id='$id'";
		$result = mysqli_query($db,$update);
		if ($result) {
			?>
			<!-- Message to display on deleting the record -->
			<div class="alert alert-success alert-dismissible fade show">
				<strong>Record Updated Successfully!!</strong>
				<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button>
			</div>
			<?php
		}

	}


 ?>