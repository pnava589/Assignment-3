<?php include 'includes/travel-config.php'; session_start();


        $countryISO = "CA";
           
           
                
                    $db = new CountriesGateway($connection);
                    $result = $db->findById($countryISO);
                    $sql = $db->getCoordinatesofCountry();
                    
                    $location = $db->retrieveRecords($sql,$countryISO);
                    
                   
                                foreach($location as $row)
                                {
                                    $latitude = $row["Latitude"];
                                    $longitude = $row["Longitude"];
                                    
                                }
                                
                                
                                $name = $result['CountryName'];
                                $area = $result['Area'];
                                $capital = $result['Capital'];
                                $population = $result['Population'];
                                $currency = $result['CurrencyName'];
                                $descretpion = utf8_encode($result['CountryDescription']);
                                
                       
                
                $db = null;
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Google Maps APIs</title>

<style>
	body {
	height: 100%;
	margin: 0;
	padding: 0;
          }
    #map {
	height: 100%;
      }
</style>

</head>

<body>
    

	<div id="map"></div>
	<script>
	     var jArray = <?php echo json_encode($location); ?>;
                        for(let i=0;i<jArray.length;i++)
                        {
                            console.log(i+" "+jArray[i].Latitude);
                            console.log(i+" "+jArray[i].Longitude);
                        }
                        
                        
                        
           var map;

            function initMap() {
            	map = new google.maps.Map(document.getElementById('map'), {
            		center: {
            			lat: -34.397,
            			lng: 150.644
            		},
            		zoom: 8
            	});
            }
	</script>

	<script src="script.js"></script>
	<script async defer 
					src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap"></script>
</body>

</html>