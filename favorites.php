<!--    
    This page will retrieve the favorites list from the session and display them.
    Functionalities included:
        - display the favourite images and posts
        - remove single post
        - remove all posts
-->

<?php 
    session_start(); 
    include("functions.php");
    
?>

<!DOCTYPE html>
<html lang="en">
    
<!--head-->
<head>
    <meta charset="utf-8">
    <title>Favorites</title>

    <?php include("includes/stylesheets.php");?>
</head>

<body>
    <!--header-->
    <?php include 'includes/header.php' ?>
        
    <!--main body-->
    <main class="container">

        <h1>Favorites</h1><a href="set-fav.php?rmAll"><p>Remove all</p></a>
                
        <!--fav panel-->
        <div class="panel panel-primary">
                    
            <!--fav post -->
            <div class="panel-heading">
                <h3 class="panel-title">Favorite Posts</h3>
            </div><!-- end panel heading -->
            
            <div class="panel-body">
                <?php
                    displayFav(post);
                ?>
            </div> <!-- end panel body -->
                    
            <!--fav images-->
            <div class="panel-heading">
                <h3 class="panel-title">Favorite Images</h3>
            </div>
                    
            <div class="panel-body">
                <?php
                    displayFav(image);
                ?>
                
            </div>
            
                    
        </div><!--end panel-->
                
    </main>
         
    <!--footer-->
    <?php include 'includes/footer.php' ?>
           
           
          
    <!--Javascript Scripts-->
        <?php include("includes/scripts.php");?> 
</body>
        
</html>