<!Doctype html>
<html lang="en">
  <head>
    <title>Chuka University Projects Mnagement</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="gallery/logo.jpg">
    <!-- css styling -->
    <link rel="stylesheet" href="css/styling.css" type="text/css">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-12">
          <!-- header starts -->
          <div class="header bg-primary">
            <a href="index.php" class="logo"><img src="gallery/logo.jpg" height="50px" width="80px" style="margin-left: 80px;"></a>
            <nav class="navbar">
              <a href="index.php"><span class="fa fa-home"></span> home</a>
              <a href="about.html"><span class="fa fa-info-circle"></span> about</a>
              <a href="members.html"><span class="fa fa-users"></span> group members</a>
              <a href="login.php"><span class="fa fa-sign-in"></span> login</a>
              <a href="register.php">sign up</a>
              <!--<input type="search" placeholder="Search by title" name="search">-->
            </nav>
          </div>
          <!-- header ends -->

          <!-- projects -->
          <div class="projects">
            <h1>Uploaded Projects</h1>
            <!-- start of projects class -->
          <div class="table-md">
          <!-- start of projects row class -->
          <div class="row">
            <?php             

              $db=mysqli_connect('localhost','root','','projects');
              $fetch="SELECT *  from projects ORDER BY date_uploaded DESC";
              $res=mysqli_query($db,$fetch);

              if (mysqli_num_rows($res)!=0) {
                while($rows=mysqli_fetch_assoc($res)){
                  //getting the the developer of the project
                  $by=$rows['student_id'];
                  $user="SELECT *  from users WHERE id='$by'";
                  $result=mysqli_query($db,$user);
                  $row=mysqli_fetch_assoc($result)
                ?>
                <div class=" col-md-4">
                <div class="card">
                  <img class="card-img" src="images/<?php echo $rows['image']; ?>" alt="">
                  <div class="card-header">
                    <h5><strong><?php echo $rows['title']; ?></strong></h5>
                  </div>
                  <div class="card-body">
                    <p><b>by <strong class="text-info"><?php echo $row['name']; ?></strong></b></p>
                    <h6 class="text-danger"><u>Project Description</u></h6>
                    <p><?php echo $rows['description']; ?></p>
                    <a class="btn btn-success text-light" href="documentations/<?php echo $rows['documentation']; ?>"><span class="fa fa-download"></span> Download documentation</a>
                  </div>
                  <div class="card-footer">
                    <h6 class="text-left">Uploaded On: 
                      <strong class="text-primary"><?php echo ' ', $rows['date_uploaded']; ?></strong>
                    </h6>
                  </div>
                </div>
              </div>
                  <?php
                }
              }elseif (mysqli_num_rows($res)==0) {
                ?>
                  <div class="alert alert-danger">There are no Projects uploaded yet. Projects will appear here when uploaded.</div>
                <?php
              }
            ?>
          </div><!-- end of user details row class -->
              
        </div><!-- end of user details class -->
            <div class="row">
            </div><br>
          </div>

          <!-- footer starts -->
          <div class="footer">
            <div class="row">
              <div class="col-md-3">
                <h5>quick links</h5>
                <a href="login.php"><i class="fa fa-angle-double-right" ></i> login</a><br>
                <a href="register.php"><i class="fa fa-angle-double-right"></i> sign up</a><br>
                <a href="index.php"><i class="fa fa-angle-double-right" ></i> home</a><br>
              </div>
              <div class="col-md-3">
                <h5>about</h5>
                <a href="#"><i class="fa fa-angle-double-right"></i> about us</a><br>
                <a href="#"><i class="fa fa-angle-double-right"></i> FaQ</a><br>
                <a href="#"><i class="fa fa-angle-double-right"></i> terms and conditions</a><br>
                <a href="#"><i class="fa fa-angle-double-right"></i> services</a><br>
              </div>
              <div class="col-md-3">
                <h5>contact us</h5>
                <a href="#"><i class="fa fa-phone"></i> +254734567895</a><br>
                <a href="#"><i class="fa fa-phone"></i> +254734567890</a><br>
                <a href="#"><i class="fa fa-envelope"></i> projectmanager@gmail.com</a><br>
                <a href="#"><i class="fa fa-envelope"></i> projectmanager.co.ke</a><br>
              </div>
              <div class="col-md-3">
                <h5>social media</h5>
                <a href="#"><i class="fa fa-facebook"></i> facebook</a><br>
                <a href="#"><i class="fa fa-twitter" ></i> twitter</a><br>
                <a href="#"><i class="fa fa-pinterest"></i> pinterest</a><br>
                <a href="#"><i class="fa fa-linkedin"></i> linkedin</a><br>
              </div>
            </div>
            <div class="reserved">
              <p><b>© 2022 all rights reserved ||created by <span>group 10</span></b></p>
            </div>
          </div>
          <!-- footer ends -->
        </div>
    </div>
  </div>

  </body>
</html>