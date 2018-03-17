<!DOCTYPE>
<hmtl lang="en">
  <head>
        
        <meta charset="utf-8">
         <title> Error!</title>
        <meta name="viewport" content="width=device-width, initial-scale=1"> 
       
      
        
         <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
         <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
         <?php 
          echo '<link rel="stylesheet" href="css/bootstrap-theme.css?t='.time(). '"/>'; 
         ?>
         
         <link rel="stylesheet" href="css/bootstrap.min.css" />
         <link rel="stylesheet" href="css/bootstrap-theme.css" />
         <link rel="stylesheet" href="css/assignement-01.css" />

         
    </head>
    
    <body>
        
         <?php include "includes/header.php" ?>   
          
        <main class="container">
            <div class="jumbotron">
            <h1><i class="em-svg em-hushed"></i>  Ooops!</h1>
            <p></br>Missing or non-integer querystring!</br> What would you like to do?</p>
            <p></br>
                <a class="btn btn-info btn-lg" href="browse-countries.php" role="button">Browse Countries</a>
                <a class="btn btn-info btn-lg" href="browse-images.php" role="button">Browse Images</a>
                <a class="btn btn-info btn-lg" href="browse-users.php" role="button">Browse Users</a>
            </p>
        </div>
        </main> 
           
            
    </body>
</html>