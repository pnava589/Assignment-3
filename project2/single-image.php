<?php include 'includes/travel-config.php';?>
<!DOCTYPE html>
<html lang="en">



<head>
    <meta charset="utf-8">
    <title>Single Image</title>

      <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/bootstrap-theme.css" />
     <link rel="stylesheet" href="css/assignement-01.css" />
     <!-- <link rel="stylesheet" href="css/bootstrap.css" /> !-->
</head>

<body>
    
 <?php include "includes/header.php" ?>
        
        <main class="container">
            
            <div class="row">
                <aside class="col-md-2">
                <div class="panel panel-info">
                    <div class="panel-heading">Continents</div>
                    <ul class="list-group">
                        
                            <?php 
                                $db = new ContinentsGateway($connection);
                                $result = $db->retrieveRecords($db->getLeftNavStatement());
                                foreach($result as $row){?>
                                    <li class="list-group-item">
                                    <a href = "browse-images.php?continent=<?php echo $row["ContinentCode"]?>"> <?php echo $row["ContinentName"] ?></a></li>
                            <?php } $db = null;?>
                        
                    </ul>
                </div>
                    <div class="panel panel-info">
                        <div class="panel-heading">Popular</div>
                            <ul class="list-group">
                                <?php
                                    $db = new CountriesGateway($connection);
                                    $result = $db->retrieveRecords($db->getLeftNavStatement());
                                    foreach($result as $row){
                                    ?>
                                        <li class="list-group-item">
                                        <a href = "single-country.php?id=<?php echo $row["ISO"]?>"> <?php echo $row["CountryName"] ?></a></li>
                                <?php } $db = null;?>
                                
                            </ul>
                        
                        
                     </div>
                    </aside>
                
                
                <div class="col-md-10">
                    <div class="row col-md-12">
                        <div class="col-md-8">
                            <?php 
                            if(queryStringExists($_GET["id"]) )
                            {
                                $val = $_GET['id'];
                                
                            }
                            
                            
                            else {
                                echo '<h1>ID NOT FOUND</h1>';
                                $val = '19';
                            }
                           
                                  $db = new ImageDetailsGateway($connection);
                                  $result = $db->findParamByField(array("Path","Title","Description","Latitude","Longitude"),$val,"ImageID" );
                                  foreach ($result as $picture) { 
                            ?>
                                    
                            
                                 <img class="img-responsive" src="images/medium/<?php echo $picture["Path"] ?>" alt="<?php echo $picture['Title'] ?>" >
                                 <p class="description"><?php echo $picture['Description'] ?></p> <?php }
                                 $lat = $picture["Latitude"];
                                 $long = $picture["Longitude"];
                                 $db = null; ?>
                                 </div>
                                
                            
                            
                        
                        <div class="col-md-4">
                            <?php 
                                    $db = new ImageDetailsGateway($connection);
                                    $result = $db->retrieveRecords($db->getRightDetails(),$val);
                                    foreach($result as $row){
                                    ?>
                                    <h2><?php echo $row["Title"] ?></h2>
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <ul class="details-list">
                                                
                                             <li>By: <a href="single-user.php?user=<?php echo $row["UserID"] ?>"><?php echo $row["FirstName"].' '.$row["LastName"] ?></a></li>
                                             <li>Country: <a href="single-country.php?id=<?php echo$row["ISO"] ?>"><?php echo$row["CountryName"] ?></a></li>
                                             <li>City: <?php echo$row["AsciiName"] ?></li>
                                                                            
                                            </ul>
                                        </div>
                                    </div> <?php } ?>
                            
                            
                           <div class="btn-group btn-group-justified" role="group" aria-label="...">
                     
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-heart" aria-hidden="true"></span></button>
                            </div>
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-save" aria-hidden="true"></span></button>
                            </div>
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-print" aria-hidden="true"></span></button>
                            </div>
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span></button>
                            </div>
                        </div> 
                        <!-- markup extracted from lab 2 !-->
                        
                        
                                   
                        </div>
                        
                    </div>
                    <div class="row col-md-12">
                        <div class="col-md-8">
                          <div id="map"></div>
                            <script>
                            let lati = <?php echo $lat?>;
                            let long = <?php echo $long?>;
                              function initMap() {
                                var uluru = {lat: lati, lng: long};
                                var map = new google.maps.Map(document.getElementById('map'), {
                                  zoom: 4,
                                  center: uluru
                                });
                                var marker = new google.maps.Marker({
                                  position: uluru,
                                  map: map
                                });
                              }
                            </script>
                            <script async defer
                            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBxunrvg-UlRcw2e2TyQ1zH4Yf2N4Cf9GU&callback=initMap">
                            </script>
                        </div>
                        
                    </div>
                    </div>
                </div>
            </div>
            
                   
            
        </main>
        
       
         <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        </body>
        <?php include 'includes/footer.php'?>
        </hmtl>