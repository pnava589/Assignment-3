<!DOCTYPE>
<hmtl lang="en">
    
<head>
    <meta charset="utf-8">
    <title>Index</title>

    <?php include("includes/stylesheets.php");?>
</head>
    
    <body>
        
         <?php include "includes/header.php" ?>   
          
        <main class="container">
            <div class="jumbotron">
            <h1>Ooops!</h1>
            <p></br>Missing or non-integer querystring!</br> What would you like to do? <i class="material-icons">tag_faces</i></p>
            <p></br>
                <a class="btn btn-info btn-lg" href="browse-countries.php" role="button">Browse Countries</a>
                <a class="btn btn-info btn-lg" href="browse-images.php" role="button">Browse Images</a>
                <a class="btn btn-info btn-lg" href="browse-users.php" role="button">Browse Users</a>
            </p>
        </div>
        </main> 
           
            
    </body>
    
    
    
    <!--Javascript Scripts-->
        <?php 
            include("includes/footer.php");
            include("includes/scripts.php");
        ?>
    
</html>