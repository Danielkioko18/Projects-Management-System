<?php 

	// database connection
	$db = mysqli_connect('localhost', 'root', '', 'booking');
	//calling function
	if (isset($_POST['add_Route'])) {
	addRoute();
	}

	function addRoute()
	{
		global $db;
		$name    =  e($_POST['name']);
		$bus_no  =  e($_POST['bus_no']);
		$seats   =  e($_POST['seats']);
		$date    =  e($_POST['date']);
		$time    =  e($_POST['time']);
		$cost    =  e($_POST['cost']);
		$userid=$_SESSION['user']['id'];

		//inserting into the table
		$sql="INSERT INTO routes(route_name,bus_no,seats,dept_date,dept_time,cost) VALUES('$name','$bus_no','$seats ','$date','$time','$cost')";

		$results=mysqli_query($db, $sql);
		
		if ($results) {
			?>
			<div class="alert alert-success alert-dismissible fade show">
				<strong>New Route added successfully.</strong>
				<button type="button" class="close" data-dismiss="alert">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<?php
		}
		else{
			?>
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Sorry!! You are adding a duplicate route</strong>
				<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button>
			</div>
			<?php
		}
	}

	//functionality for deleting driver record from the database records
	if (isset($_GET['del'])) {
		deleteRoute();
	}

	// function for deleting the record
	function deleteRoute()
	{
		global $db;
		$id=$_GET['del'];
		$delQ="DELETE FROM routes WHERE id=$id";
		$result=mysqli_query($db, $delQ);
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
	$id     = "";
	$name   =  "";
	$bus_no =  "";
	$seats  =  "";
	$date   =  "";
	$time   =  "";
	$cost   =  "";
	if (isset($_GET['edit'])) {
		editRoute();
	}

	//function for edit functionality
	function editRoute()
	{
		global $db, $id, $name, $bus_no, $seats, $date, $time, $cost;

		$id=$_GET['edit'];
		$selQuery="SELECT * FROM routes WHERE id=$id";
		$result=mysqli_query($db,$selQuery);
		if (mysqli_num_rows($result)==1) {
			$rows  = mysqli_fetch_assoc($result);
			$name  = $rows['route_name'];
			$seats = $rows['seats'];
			$date  = $rows['dept_date'];
			$time  = $rows['dept_time'];
			$cost  = $rows['cost'];
		}
	}

	//update function
	if (isset($_POST['update'])) {
		updateRoute();
	}
	//updating function
	function updateRoute()
	{
		global $db;
		$id     = $_POST['id'];
		$name    =  e($_POST['name']);
		$bus_no  =  e($_POST['bus_no']);
		$seats   =  e($_POST['seats']);
		$date    =  e($_POST['date']);
		$time    =  e($_POST['time']);
		$cost    =  e($_POST['cost']);

		//update statement
		$update = "UPDATE routes SET route_name='$name',bus_no='$bus_no',seats='$seats',dept_date='$date ',dept_time='$time',cost='$cost' WHERE id='$id'";

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
	$sql = "CREATE EVENT `status` ON SCHEDULE EVERY 1 MINUTE STARTS \'2022-11-18 17:23:52.000000\' ON COMPLETION NOT PRESERVE ENABLE DO \n"

    . "UPDATE routes SET status=\'expired\' WHERE dept_date<now();";

 ?>