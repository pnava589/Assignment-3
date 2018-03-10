
<?php include 'includes/travel-config.php';


        $countryISO = $_GET['id'];
            if(!queryStringExists($countryISO))
                {
                    redirect() ;
                }
            else
                {
                    $db = new CountriesGateway($connection);
                    $result = $db->findById($countryISO);
                    
                    if(emptyset($result))
                    {
                        redirect() ;
                    }
                    
                       
                                
                                $name = $result['CountryName'];
                                $area = $result['Area'];
                                $capital = $result['Capital'];
                                $population = $result['Population'];
                                $currency = $result['CurrencyName'];
                                $descretpion = utf8_encode($result['CountryDescription']);
                       
                }
                $db = null;
?>


<!DOCTYPE html>

<html lang="en">
    
    <head>
        
        <meta charset="utf-8">
         <title>Single Country</title>
        <meta name="viewport" content="width=device-width, initial-scale=1"> 
       
      
        
         <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
         <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
         
         <link rel="stylesheet" href="css/bootstrap.min.css" />
         <link rel="stylesheet" href="css/bootstrap-theme.css" />
         <link rel="stylesheet" href="css/pedro.css" />

         
    </head>
    
    <body>
        
        <?php include 'includes/header.php' ?>
        
<main class ="container">
            
            <div class = "row bg-alter">
                <div class="col-md-12">
                    <div class="col-md-12">
                        <h2><?php echo $name ?></h2>
                    </div>
                    
                    <div class="col-md-12">
                        <p> Capital:  <b><?php echo $capital ?></b><p>
                    </div>
                    <div class="col-md-12">
                        <p> Area: <b><?php echo $area ?></b> sq km.<p>
                    </div>
                    
                    <div class="col-md-12">
                        <p> Population: <b><?php echo $population ?></b><p>
                    </div>
                    <div class="col-md-12">
                        <p> Currency Name: <b><?php echo $currency ?></b><p>
                    </div>
                    <div class="col-md-12">
                        <p><?php echo $descretpion ?> </p>
                    </div>
                    
                </div>
            </div>
            <br>
            <div class = "row">
                <div class= "bottom-container">
                    <div class= "panel panel-info">
                        <div class ="panel-heading"> Images from <?php echo $name ?> </div>
                        <div class ="panel-body">
                        
                        <?php
                            $db = new ImageDetailsGateway($connection);
                            
                            $result = $db->findParamByField(array('Path','ImageID'), $countryISO, 'CountryCodeISO');
                            printSmall($result,'single-image.php?id=', 'ImageID');
                        ?>
                       
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