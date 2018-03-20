
<?php include 'includes/travel-config.php'; session_start();?>

<!DOCTYPE html>

<html lang="en">
    
    <head>
    <meta charset="utf-8">
    <title>Browse Cities</title>

    <?php include("includes/stylesheets.php");?>
</head>
    
    <body>
        
        <?php include 'includes/header.php' ?>
          
        <main class="container">
            <div class="row">
            <div class="col-md-10">
                
                <div >
                    <div class="panel panel-primary">
                        <div class="panel-heading">Cities </div>
                        <div class="panel-body">
                            
                            <?php 
                            $db = new CitiesGateway($connection);
                            $result = $db->retrieveRecords($db->getDropdownStatement());
                            displayCities($result);
                            $connection = null;
                            ?>
                       
                    </div>
                        
                    </div>
                    
                </div>
             
            </div>
          </div>
        </main>  
        
        <?php include 'includes/footer.php' ?>
        
        <!--Javascript Scripts-->
        <?php include("includes/scripts.php");?>

    </body>
    
</html>