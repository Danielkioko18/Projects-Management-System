<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>My Profile</title>
	<link rel="icon" href="gallery/logo.jpg">
	<link rel="stylesheet" type="text/css" href="css/myprofile.css">
	<script type="text/javascript" src="js/validate.js"></script>
</head>
<body>
	<?php include 'navigation/sidenav.php'; ?>
	<!-- start of users class -->
	<div class="profile">
		<div class="col-md">
			<!-- start of header class -->
			<div class="form-row mt-1">
				<div class="col-7">
					<h2>
						<strong><i class="fa fa-user"></i> My Profile</strong>
					</h2>
				</div>
				<hr style="border: 1px solid orange; width: 100%;">
			</div> <!-- end of header class -->
					
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
							$fetch="SELECT *  from users WHERE id='$userid'";
							$res=mysqli_query($db,$fetch);

							if (mysqli_num_rows($res)!=0) {
								while($rows=mysqli_fetch_assoc($res)){
									?>
									<!-- start of user cards classes -->
									<div class="col-sm-5 mb-3">
										<div class="card bg-primary border-primary">
												<img class="card-img-top" src="gallery/profile.png">
											<div class="card-body">
												<div class="row">
													<div class="col-9">
														<h4 class="card-title text-warning text-left"><?php echo $rows['name']; ?></h4>
													</div>
													<div class="col">
														<a href="myprojects.php?del=<?php echo $rows['id'] ?>" class="btn btn-success mr-2">
															<span class="fa fa-edit"></span>
														</a>
													</div>
												</div>
												<div class="row border border-warning">
													<div class="col-2 border border-warning">
														<h5 class="card-title text-lihgt text-left"><span class="fa fa-info-circle ml-1"></span>
														</h5>
													</div>
													<div class="col">
														<h6 class="card-text text-light"><?php echo $rows['reg_no']; ?></h6>
													</div>
												</div>
												<div class="row border border-warning">
													<div class="col-2 border border-warning">
														<h5 class="card-title text-danger text-left"><span class="fa fa-envelope"></span></h5>
													</div>
													<div class="col border border-warning">
														<h5 class="text-light"><?php echo $rows['email']; ?></h5>
													</div>
												</div>
												<div class="row border border-warning card-footer">
														<small class="text-left">Created on:
															<strong class="text-warning"><?php echo ' ', $rows['date_added']; ?></strong>
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