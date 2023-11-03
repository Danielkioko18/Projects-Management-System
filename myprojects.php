<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>My Projects</title>
	<link rel="icon" href="gallery/logo.jpg">
	<link rel="stylesheet" type="text/css" href="css/projects.css">
	<script type="text/javascript" src="js/validate.js"></script>
</head>
<body>
	<?php include 'navigation/sidenav.php'; ?>
	<!-- start of users class -->
	<div class="projects">
		<div class="col-md">
			<!-- start of header class -->
			<div class="form-row mt-1">
				<div class="col-7">
					<h2>
						<strong><i class="fa fa-shopping-bag"></i> My Projects</strong>
					</h2>
				</div>
				<div class="col-3">
					<input type="search" class="form-control" placeholder="Search by title">
				</div>
				<div class="col">
					<button type="submit" class="btn btn-success"><i class="fa fa-search"></i>  Search</button>
				</div>
				<hr style="border: 1px solid orange; width: 100%;">
			</div> <!-- end of header class -->

			<!-- start of form class 
				<div class="table-row mb-1">					
					<form method="POST" name="userForm" action="users.php" enctype="multipart/form-data" onsubmit="return validateUser();">
					  <div class="form-row">
					    <div class="col">
					    	<div class="col">
							      <label>Username</label>
							</div>
					      <input type="text" class="form-control" name="username" placeholder="Username" required>

							error class 
					      <code class="text-danger small font-weight-bold float-right" id="userEr" style="display: none;"></code>

					    </div>
					    <div class="col">
					    	<div class="col">
						      <label>Email</label>
						    </div>
					      <input type="email" class="form-control" name="email" placeholder="Email">

					       error class 
					      <code class="text-danger small font-weight-bold float-right" id="emailErr" style="display: none;"></code>

					    </div>
					    <div class="col">
					    	<div class="col">
						      <label>Phone</label>
						    </div>
					      <input type="number" class="form-control" name="phone" placeholder="Phone no" minlength="10" required>

					       error class 
					      <code class="text-danger small font-weight-bold float-right" id="phoneErr" style="display: none;"></code>

					    </div>
					    <div class="col">
					    	<div class="col">
						      <label>ID_NO</label>
						    </div>
					      <input type="number" name="id_no" class="form-control" placeholder="id_no" minlength="8" min="1" required>
					    </div>
					    <div class="col">
					    	<div class="col">
						      <label>Photo</label>
						    </div>
					      <input type="file" name="photo" class="form-control" placeholder="profile_img">
					    </div>
					    <div class="col">
					    	<div class="col">
					      		<label><br></label>
					    	</div>
					      <button class="btn btn-info">Update</button>
					    </div>
					    <div class="col">
					    	<div class="col">
					      		<label><br></label>
					    	</div>
					      <button class="btn btn-primary" name="add"><i class="fa fa-plus"></i></button>
					    </div>
					  </div>
					</form>
					<hr style="border: 1px solid orange;">
				</div>  end of form class -->
					
				<?php 
					include 'php/manage_projects.php'; 
				?>
				<!-- start of user details class -->
				<div class="table-responsive-md">
					<!-- start of user details row class -->
					<div class="row">
						<?php 
							$userid=$_SESSION['user']['id'];
					  		$sn=1;
							$db=mysqli_connect('localhost','root','','projects');
							$fetch="SELECT *  from projects WHERE student_id='$userid' ORDER BY date_uploaded DESC";
							$res=mysqli_query($db,$fetch);

							if (mysqli_num_rows($res)!=0) {
								while($rows=mysqli_fetch_assoc($res)){
									?>
									<!-- start of user cards classes -->
									<div class="col-sm-5 mb-3">
										<div class="card bg-primary border-primary">
												<img class="card-img" src="images/<?php echo $rows['image']; ?>">
											<div class="card-body">
												<div class="row">
													<div class="col-9">
														<h4 class="card-title text-warning text-left"><?php echo $sn,'. ',$rows['title']; ?></h4>
													</div>
													<div class="col">
														<a href="myprojects.php?del=<?php echo $rows['id'] ?>" class="btn btn-danger mr-2">
															<span class="fa fa-trash"></span>
														</a>
													</div>
												</div>
												<div class="row border border-warning">
													<div class="col-2 border border-warning">
														<h5 class="card-title text-lihgt text-left"><span class="fa fa-info-circle ml-1"></span>
														</h5>
													</div>
													<div class="col">
														<h6 class="card-text text-light"><?php echo $rows['description']; ?></h6>
													</div>
												</div>
												<div class="row border border-warning">
													<div class="col-2 border border-warning">
														<h5 class="card-title text-danger text-left"><span class="fa fa-bookmark"></span></h5>
													</div>
													<div class="col border border-warning">
														<a class="btn btn-success text-light" href="documentations/<?php echo $rows['documentation']; ?>"><span class="fa fa-download"></span> Download documendation</a>
													</div>
												</div>
												<div class="row border border-warning card-footer">
														<small class="text-left">Uploaded On: 
															<strong class="text-warning"><?php echo ' ', $rows['date_uploaded']; ?></strong>
														</small>
												</div>								
											</div>
										</div>
									</div><!-- end of user cards classes -->
									<?php
									$sn++;
								}
							}elseif (mysqli_num_rows($res)==0) {
								?>
									<div class="alert alert-danger">Sorry! You have not uploaded any Project yet! Please Upload Your projects from the dashboard.</div>
								<?php
							}
						?>
					</div><!-- end of user details row class -->
					  	
				</div><!-- end of user details class -->		
		</div> <!-- end of users class -->
	</div>
</body>
</html>