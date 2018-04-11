<?php 
    include 'includes/travel-config.php'; 
    session_start();

    $haystack = $_SERVER['HTTP_REFERER'];
    $needle = 'https://assignment-3-pnava589.c9users.io/single-image.php?';
    if (strstr($haystack, $needle)){//contains the address
        $style="";//remove the style
    }
    else{
        $style='hidden';
    }
    
?>
<!DOCTYPE html>
<html lang="en">



<head>
    <meta charset="utf-8">
    <title>Single Image</title>

    <?php include("includes/stylesheets.php");?>
</head>

<body>
    
 <?php include "includes/header.php" ?>

        <main class="container">
            
            <div class="alert  alert-danger <?php echo $style?>" role="alert" id = "alert-box" >
                <p> Image has been added to favorites!</p>
            </div>
            <div class="row">
                <!--aside-->
                <aside class="col-md-2">
                    <!--continents panel-->
                    <div class="panel panel-primary">
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
                    <!--end continents panel panel-->
                    
                    <!--popular panel-->
                    <div class="panel panel-primary">
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
                     <!--end popular panel-->
                </aside>
                <!--end aside-->
                
                <!--content column-->
                <div class="col-md-10">
                    <!--pic and sidebar row-->
                    <div class="row col-md-12">
                        <!--pic column-->
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
                                  $result = $db->findParamByField(array("CityCode","Path","Title","Description","Latitude","Longitude"),$val,"ImageID" );
                                  foreach ($result as $picture) { 
                            ?>
                                    
                                
                                 <img id="img" class="img-responsive" src="images/medium/<?php echo $picture["Path"] ?>" alt="<?php echo $picture['Title'] ?>" >
                                  <?php }
                                 $lat = $picture["Latitude"];
                                 $long = $picture["Longitude"];
                                 $res = $db->retrieveRecords($db->getRating(),$val);
                                 foreach ($res as $value) {
                                     $rating = $value['avg(Rating)'];
                                 }
                                 
                                 $db = null; ?>
                                 <br>
                        </div>
                        <!--end picture column-->
                                
                            
                            
                        <!--side bar with details-->
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
                                        <li>City: <a href = "single-city.php?id=<?php echo $row['CityCode']?>"><?php echo$row["AsciiName"] ?></a></li>
                                        <li>Rating: <?php echo print_stars(round($rating));?></li>                             
                                    </ul>
                                </div> <!--end panel body-->
                            </div> <!--end panel-->
                            <?php } ?> 
                            <!--end foreach loop-->
                            
                        <!--Button Group-->
                        <div class="btn-group btn-group-justified" role="group" aria-label="...">
                     
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-primary" ><span class="glyphicon glyphicon-heart" aria-hidden="true"></span></button>
                            </div>
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-save" aria-hidden="true"></span></button>
                            </div>
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-print" aria-hidden="true"></span></button>
                            </div>
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span></button>
                            </div>
                        </div>
                        <!--end button group-->
                        <br>
                        
                        <!--view & add to favorite button-->
                        <!--when you click the button- it makes a request to server to store: image title and image path in session-->
                        
                        
                        <div class="btn-group btn-group-justified" role="group" aria-label="...">
                            <div class="btn-group" role="group">
                                <a  href="set-fav.php?type=image&imgPath=<?php echo $picture["Path"] ?>&imgTitle=<?php echo $picture["Title"] ?>&imgId=<?php echo $_GET['id']?>" >
                                    <button type="button" class="btn btn-primary favBtn">Add to Favorites</button>
                                </a>
                            </div>
                        </div><br>
                        <div class="btn-group btn-group-justified" role="group" aria-label="...">
                            <div class="btn-group" role="group">
                                <a href="favorites.php"><button type="button" class="btn btn-primary">View Favorites</button></a>
                            </div>
                        </div><br>
                        <!--end fav btn group-->
                        </div>
                        <!--end sidebar-->
                        
                    </div>
                    <!--end pic and sidebar row-->
                    
                    <!--picture description row !-->
                    <div class="row col-md-12">
                        
                        <!--<div class="col-md-8">-->
                            <hr>
                            <h4><strong>Description</strong></h4>
                            <p class="description"><?php echo $picture['Description'] ?></p><hr>
                        <!--</div>-->
                        <!--end column 5-->
                        
                        <!--map col-->
                        <!--<div class="col-md-4">-->
                            
                            <!--map-->
                        <!--    <div id="map">-->
                        <!--        <script>-->
                        <!--            let lati = <?php echo $lat?>;-->
                        <!--            let long = <?php echo $long?>;-->
                              
                        <!--            function initMap() {-->
                        <!--                var uluru = {lat: lati, lng: long};-->
                               
                        <!--                var map = new google.maps.Map(document.getElementById('map'), {-->
                        <!--                    zoom: 15,-->
                        <!--                    center: uluru-->
                        <!--                });-->
                        <!--                new google.maps.Marker({-->
                        <!--                    position: uluru,-->
                        <!--                    map: map-->
                        <!--                });-->
                        <!--            }-->
                        <!--        </script>-->
                                
                        <!--        <script async defer-->
                        <!--            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBxunrvg-UlRcw2e2TyQ1zH4Yf2N4Cf9GU&callback=initMap">-->
                        <!--        </script>-->
                        <!--    </div> -->
                            <!--end map div-->
                            
                        <!--</div>-->
                        <!--map col-->
                        
                    </div>
                    <!--end pic description-->
                    
                    <!--map row-->
                    <div class="row col-md-12">
                        
                        <!--map col-->
                            
                            <!--map-->
                            <div id="map">
                                <script>
                                    let lati = <?php echo $lat?>;
                                    let long = <?php echo $long?>;
                              
                                    function initMap() {
                                        var uluru = {lat: lati, lng: long};
                               
                                        var map = new google.maps.Map(document.getElementById('map'), {
                                            zoom: 15,
                                            center: uluru
                                        });
                                        new google.maps.Marker({
                                            position: uluru,
                                            map: map
                                        });
                                    }
                                </script>
                                
                                <script async defer
                                    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBxunrvg-UlRcw2e2TyQ1zH4Yf2N4Cf9GU&callback=initMap">
                                </script>
                            </div> 
                            <!--end map div-->
                        <!--map col-->
                        
                    </div>
                    <!--end map row-->
                    
                    
                    
                </div>
                <!--end content column-->
                
            </div>
            <!--</div> end row-->
            


            
            
        </main>
        
       <?php include("includes/scripts.php");?>
        </body>
        <?php include 'includes/footer.php'?>
        <!--Javascript Scripts-->
        
        
        </hmtl>