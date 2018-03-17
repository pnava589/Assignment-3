<?php 
    session_start(); 
    include("functions.php");
?>
<!DOCTYPE html>
<html lang="en">



<head>
    <meta charset="utf-8">
    <title>Index</title>

      <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/bootstrap-theme.css" />
     <link rel="stylesheet" href="css/assignement-01.css" />
     <!-- <link rel="stylesheet" href="css/bootstrap.css" /> !-->
</head>

<body>
    
  <?php include 'includes/header.php' ?>
        
        <main class="container">

                <h1>Favorites</h1>
                
                <!--fav panel-->
                <div class="panel panel-info">
                    
                    <!--fav post-->
                    <div class="panel-heading">
                        <h3 class="panel-title">Favorite Posts</h3>
                    </div>
                    <div class="panel-body">
                        <ul>
                            <li>display small square image and post title</li>
                            <?php
                                displayFav(post);
                            ?>
                        </ul>
                        
                        
                    </div>
                    
                    <!--fav images-->
                    <div class="panel-heading">
                        <h3 class="panel-title">Favorite Images</h3>
                    </div>
                    
                    <div class="panel-body">
                        <li>display small square image and image title</li>
                        <?php
                            displayFav(image);
                        ?>
                        
                    </div>
                    
                </div>
                <!--end panel-->
                
         </main>
         
         
         <?php include 'includes/footer.php' ?>
           
           
          
        <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        
        </body>
        
        </html>