<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">



<head>
    <meta charset="utf-8">
    <title>Index</title>

    <?php include("includes/stylesheets.php");?>
</head>

 <?php include 'includes/header.php' ?>

<body>
        
        <main class="container">
            
            <div class="container">
                <div class="row">
                    <!-- first card !-->
                    <div class="col-xs-12 col-sm-4">
                        <div class="card">
                            <a class="img-card" href="browse-countries.php">
                                <img src="images/misc/home_countries.jpg" />
                            </a>
                            <br />
                            <div class="card-content">
                                <h4 class="card-title">
                                    <a href="browse-countries.php">
                                        Countries
                                    </a>
                                </h4>
                                <div class="">
                                    See all countries for which we have images.
                                </div>
                            </div><!--end content-->
                            <div class="card-read-more">
                                <a class="btn btn-link btn-block" href="browse-countries.php">
                                    View Countries
                                </a>
                            </div><!--end read more-->
                        </div><!--end card-->
                    </div> <!--end column-->
                    
                    <!-- second card !-->
                    <div class="col-xs-12 col-sm-4">
                        <div class="card">
                            <a class="img-card" href="browse-images.php">
                                <img src="images/misc/home_images.jpg" />
                            </a>
                            <br />
                            <div class="card-content">
                                <h4 class="card-title">
                                    <a href="browse-images.php">
                                        Images
                                    </a>
                                </h4>
                                <div class="">
                                    See all our travel images.<br><br>
                                </div>
                            </div><!--end content-->
                            <div class="card-read-more">
                                <a class="btn btn-link btn-block" href="browse-images.php">
                                    View Images
                                </a>
                            </div><!--end read more-->
                        </div><!--end card-->
                    </div> <!--end column-->
                    
                    <!-- third card !-->
                    <div class="col-xs-12 col-sm-4">
                        <div class="card">
                            <a class="img-card" href="browse-users.php">
                                <img src="images/misc/home_users.jpg" />
                            </a>
                            <br />
                            <div class="card-content">
                                <h4 class="card-title">
                                    <a href="browse-users.php">
                                        Users
                                    </a>
                                </h4>
                                <div class="">
                                    See information about our contributing users.
                                </div>
                            </div><!--end content-->
                            <div class="card-read-more">
                                <a class="btn btn-link btn-block" href="browse-users.php">
                                    View Users
                                </a>
                            </div><!--end read more-->
                        </div><!--end card-->
                    </div> <!--end column-->
                    
                </div><!--end row-->
            </div><!--end container-->

         </main>
         
</body>
        
<?php include 'includes/footer.php' ?>
           
          
<!--Javascript Scripts-->
        <?php include("includes/scripts.php");?>       
        
        
</html>