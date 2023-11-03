 <!DOCTYPE html>
 <html>
 <head>
     <meta charset="utf-8">
     <title>Dashboard</title>
     <link rel="icon" href="gallery/logo.jpg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/homestyle.css">
 </head>
 <!-- side navigation of admin -->
    <?php include 'navigation/sidenav.php'; ?>
    <div class="dashboard">
        <div class="col-md">
         <div class="form-row">
            <div class="col-4">
                <div class="col">
                <h2 class="ml-2"><i class="fa fa-home"></i>  Upload Projects</h2>
                </div>
            </div>
            <div class="col">
                <p class="mt-2 text-info">
                    Hello, 
                    <strong><i><?php echo $_SESSION['user']['name']; ?></i></strong> Welcome back
                </p>                
            </div>
            <div class="col">
                <?php  if (isset($_SESSION['user'])) : ?>
                        <a class="btn btn-danger" href="index.php?logout='1'">Logout</a>

                <?php endif ?>
            </div>
              <hr style="border: 1px solid blue; width: 100%;">          
        </div>

            <?php 
                include 'php/upload.php'; 
            ?>
        <div class="form bg-success justify-content-center d-flex">
            <form method="POST" action="dashboard.php" enctype="multipart/form-data" name="uploadForm">
                <h3 class="text-dark ml-5">Project Details</h3>
                <hr style="border: 1px solid blue; width: 100%;"> 
                <div class="form-group">
                    <label>Project Title</label>
                    <input class="form-control"  type="text" name="title" placeholder="Enter Project Title" required style="height: 50px;">
                </div>
                <div class="form-group">
                    <label>Project Description</label>
                    <textarea class="form-control"  type="text" name="description" placeholder="Describe Your Project" maxlength="500" required></textarea>

                    <code class="text-warning">Maxmum of 500 Characters</code>
                </div>
                <div class="custom-file">
                    <label class="custom-file-label" for="Doc">Project Documentatioin....</label>
                    <input type="file" class="custom-file-input" id="Doc" name="doc" required>
                </div>
                <br><br>
                <div class="custom-file">
                    <input type="file" class="form-control-file" class="custom-file-input" id="img" name="image" required>
                    <label class="custom-file-label" for="img">Project Image....</label><br>
                </div>
                
                <div>
                    <button class="btn btn-primary" name="upload">Upload</button>
                </div>
                <div>
                    <br>
                </div>
                    
            </form>
        </div>
        </div>
        </div>
    </div>
    </body>
 </html>