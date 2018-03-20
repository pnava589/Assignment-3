
<?php include 'includes/travel-config.php'; session_start();?>

<!DOCTYPE html>

<html lang="en">
    
<head>
    <meta charset="utf-8">
    <title>Browse Countries</title>

    <?php include("includes/stylesheets.php");?>
</head>
    
    <body>
        
        <?php include 'includes/header.php' ?>
          
        <main class="container">
            <div class="row">
            <div class="col-md-10">
                
                <div >
                    <div class="panel panel-primary">
                        <div class="panel-heading">Countries with images </div>
                        <div class="panel-body">
                            
                            <?php //displayLinks($pdo);
                            $db = new CountriesGateway($connection);
                            $result = $db->retrieveRecords($db->getBrowseCountriesStatement());
                            displayLinks($result);
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