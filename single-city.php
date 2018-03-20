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
   
    <?php include("includes/stylesheets.php");?>
</head>
    
    <body>
        
        <?php include 'includes/header.php' ?>
        
<main class ="container">
           
            <div class = "row ">
                <div class="col-md-6 ">
                    <div class="col-md-12">
                        <h2><?php echo $name ?></h2>
                    </div>
                    
                    <div class="col-md-12">
                        <p> Population:  <b><?php echo number_format($population) ?></b><p>
                    </div>
                    <div class="col-md-12">
                        <p> Elevation: <b><?php echo $elevation ?></b> sq km.<p>
                    </div>
                    
                    <div class="col-md-12">
                        <p> Time Zone: <b><?php echo $timezone ?></b><p>
                    </div>
                    
                    
                </div>
                <div class="col-md-6">
                    <div class= "panel panel-primary">
                        <div class ="panel-heading"> Images from <?php echo $name ?> </div>
                        <div class ="panel-body">
                         <div id ="juan">
                        
                        </div>
                        <?php
                            $db = new ImageDetailsGateway($connection);
                            
                            $result = $db->findParamByField(array('Path','ImageID','Latitude','Longitude','Title'), $CityCode, 'CityCode');
                            printSmall($result,'single-image.php?id=', 'ImageID');
                            printHidden($result,'single-image.php?id=', 'ImageID');
                        ?>
                       
                        </div>
                    </div>
                </div>
 
            </div>
            <br>
            <div class = "row">
                <div class= "bottom-container">
                    <div id="mapwrap">
                    
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
                        console.log(uluru);
                      }
                    </script>
                    <script async defer
                    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBzwnnF6X4FmkD4cFo4lswpAWJcACGSNgM&callback=initMap">
                    </script>
                </div>
            </div>
            
        </main>

        
        <?php include 'includes/footer.php' ?>
        
        <!--Javascript Scripts-->
        <?php include("includes/scripts.php");?>
       
        </body>
         
      </html>