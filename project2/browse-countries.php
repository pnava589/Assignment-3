
<?php include "functions.php" ;
$pdo = getPDO()?>

<!DOCTYPE html>

<html lang="en">
    
    <head>
        
        <meta charset="utf-8">
         <title>Browse Countries</title>
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
        
        <?php include 'includes/header.php' ?>
          
        <main class="container">
            <div class="row">
            <div class="col-md-10">
                
                <div >
                    <div class="panel panel-info">
                        <div class="panel-heading">Countries with images </div>
                        <div class="panel-body">
                            
                            <?php displayLinks($pdo);?>
                       
                    </div>
                        
                    </div>
                    
                </div>
             
            </div>
          </div>
        </main>  
        
        <?php include 'includes/footer.php' ?>
        
         <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
          
        
    </body>
    
</html>