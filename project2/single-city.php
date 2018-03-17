<?php include 'includes/travel-config.php'; session_start();


        $CityCode = $_GET['id'];
            if(!queryStringExists($CityCode))
                {
                    redirect() ;
                }
            else
                {
                    $db = new CitiesGateway($connection);
                    $result = $db->findById($CityCode);
                    $sql= $db-> getCityLocation();
                    $location = $db->retrieveRecords($sql,$CityCode);
                    
                    
                    if(emptyset($result))
                    {
                        redirect() ;
                    }
                               
                                
                                
                                $name = $result['AsciiName'];
                                $population = $result['Population'];
                                $elevation = $result['Elevation'];
                                $timezone = $result['TimeZone'];
                                
                       
                }
                $db = null;
?>


<!DOCTYPE html>

<html lang="en">
    
    <head>
        
        <meta charset="utf-8">
         <title>Single City</title>
        <meta name="viewport" content="width=device-width, initial-scale=1"> 
       
      
        
         <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
         <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
         
         <link rel="stylesheet" href="css/bootstrap.min.css" />
         <link rel="stylesheet" href="css/bootstrap-theme.css" />
         <link rel="stylesheet" href="css/pedro.css" />
         <link rel="stylesheet" href="css/assignement-01.css" />

         
    </head>
    
    <body>
        
        <?php include 'includes/header.php' ?>
        
<main class ="container">
            
            <div class = "row ">
                <div class="col-md-5 bg-alter">
                    <div class="col-md-12">
                        <h2><?php echo $name ?></h2>
                        <?php
                       
                        
                        
                        
                         ?>
                    </div>
                    
                    <div class="col-md-12">
                        <p> Population:  <b><?php echo $population ?></b><p>
                    </div>
                    <div class="col-md-12">
                        <p> Elevation: <b><?php echo $elevation ?></b> sq km.<p>
                    </div>
                    
                    <div class="col-md-12">
                        <p> Time Zone: <b><?php echo $timezone ?></b><p>
                    </div>
                    
                    
                </div>
                <div class="col-md-7" id="mapwrap">
                    
                <div id="map"></div>
                </div>
                <?php foreach($location as $row)
                {
                    $latitude = $row["Latitude"];
                    $longitude = $row["Longitude"];
                }
                ?>
                    <script>
                     
                      function initMap() {
                          
                          let lati = <?php echo  $latitude ?>;
                            let long = <?php echo $longitude ?>;
                        var uluru = {lat: lati, lng: long};
                        var map = new google.maps.Map(document.getElementById('map'), {
                          zoom: 9,
                          center: uluru
                        });
                        new google.maps.Marker({
                          position: uluru,
                          map: map
                        });
                        
                      }
                    </script>
                    <script async defer
                    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBzwnnF6X4FmkD4cFo4lswpAWJcACGSNgM&callback=initMap">
                    </script>
                
                
            </div>
            <br>
            <div class = "row">
                <div class= "bottom-container">
                    <div class= "panel panel-info">
                        <div class ="panel-heading"> Images from <?php echo $name ?> </div>
                        <div class ="panel-body">
                        
                        <?php
                            $db = new ImageDetailsGateway($connection);
                            
                            $result = $db->findParamByField(array('Path','ImageID','Latitude','Longitude'), $CityCode, 'CityCode');
                            
                            printSmall($result,'single-image.php?id=', 'ImageID');
                            
                            printHidden($result,'single-image.php?id=', 'ImageID');
                        ?>
                       
                        </div>
                    </div>
                </div>
            </div>
            
            
        </main>

        
        <?php include 'includes/footer.php' ?>
        
        <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        <script src="Javascript/functions.js"></script>  
            
        </body>
        
      </html>