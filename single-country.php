
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
                    $sql =$db-> getCitiesWithImages();
                    $location = $db->retrieveRecords($sql,$countryISO);
                    
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

    <?php include("includes/stylesheets.php");?>
</head>
    
    <body>
        <!--header-->
        <?php include 'includes/header.php' ?>
        
        <!--main section-->
        <main class ="container">
            
            <!--row-->
            <div class = "row">
                
                <!--map and country details-->
                <div class="col-md-8">
                    <!--country description-->
                    <!--<div class="col-md-5 ">-->
                        <div class="col-md-12">
                            <h2><?php echo $name ?></h2>
                        </div>
                    
                        <div class="col-md-12">
                            <p> Capital:  <b><?php echo $capital ?></b><p>
                        </div>
                        <div class="col-md-12">
                            <p> Area: <b><?php echo number_format($area) ?></b> sq km.<p>
                        </div>
                    
                        <div class="col-md-12">
                            <p> Population: <b><?php echo number_format($population) ?></b><p>
                        </div>
                        <div class="col-md-12">
                            <p> Currency Name: <b><?php echo $currency ?></b><p>
                        </div>
                        <div class="col-md-12">
                            <p><?php echo $descretpion ?> </p>
                        </div>
                        <br>
                    <!--end country description-->
                     <div class = "col-md-12" id ="esketit">
                        
                    </div>
                    
                    <!--map -->
                    <br>
                    <div id="map"></div>
                    
                    <script>
                        var loc = <?php echo json_encode($location); ?>;
                        var extension = <?php echo $area ?>;
                        var vision;
                        if(extension > 900000)
                        {
                           vision = 3; 
                        }
                        
                        else{
                            vision = 4.5;
                        }
                        
                              function initMap() {
                               
                                
                                /*var uluru2 = '{lat: '+ loc[0].Latitude+', lng: '+ loc[0].Longitude+'}';*/
                                let mapIsSet=false;
                                for(let i=0; i<loc.length; i++)
                                {
                                var uluru = {lat: parseFloat(loc[i].Latitude), lng: parseFloat(loc[i].Longitude)};
                                 
                                 if(!mapIsSet)
                                 {
                                  var map = new google.maps.Map(document.getElementById('map'), {
                                  zoom: vision,
                                  center: uluru
                                });
                                  mapIsSet=true;
                                 }
                                 
                                 new google.maps.Marker({
                                  position: uluru,
                                  map: map
                                  
                                  
                                });
                    
                                
                                
                              }
                                
                              }
                                  
                    </script>
                    <script async defer
                            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBxunrvg-UlRcw2e2TyQ1zH4Yf2N4Cf9GU&callback=initMap">
                    </script>
                    
                </div>
                <!--end column 8-->
                
                <!--country images-->
                <div class="col-md-4">
                    <div class= "panel panel-primary">
                    <div class ="panel-heading"> Images from <?php echo $name ?> </div>
                    <div class ="panel-body">
                        
                    <?php
                        $db = new ImageDetailsGateway($connection);
                            
                        $result = $db->findParamByField(array('Path','ImageID','Latitude','Longitude','Title'), $countryISO, 'CountryCodeISO');
                        printSmall($result,'single-image.php?id=', 'ImageID');
                            
                    ?>
                       
                    </div>
                    <!--end panel body-->
                </div>
                <!--end panel-->
                    
                </div>
                <!--end country images-->
                
            </div>
            <!--end row-->
            
        </main>

        
        <?php include 'includes/footer.php' ?>
        
        <!--Javascript Scripts-->
        <?php include("includes/scripts.php");?>
        </body>
        
</html>