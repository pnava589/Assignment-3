
<?php include 'includes/travel-config.php'; session_start();
      
      $cont = $_GET["continent"];
      $countri = $_GET["country"];
      $tit = $_GET["title"];
      $city = $_GET['city'];
      $clear = false;
        if( queryStringExists($cont)|| queryStringExists($countri) || queryStringExists($tit) || queryStringExists($city)){
            $clear = true;
            }
           
?>
<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="utf-8">
    <title>Browse Images</title>

    <?php include("includes/stylesheets.php");?>
</head>
  
  <body>
    <?php include 'includes/header.php' ?>
    
      <main class="container">
        
        <!--filter panel-->
        <div class="panel panel-primary">
          <div class="panel-heading">Filters</div>
          <div class="panel-body">
            
            <!--form-->
            <form action="browse-images.php" method="get" class="form-horizontal" id="selection">
              <div class="form-inline">
                <!--select cntinent-->
                <select name="continent" class="form-control submitClass"  >
                 <option value="0">Select Continent</option>
                
               <?php
                   
                   /*Displays dropdown menu of continents */
                   
                      $db =new ContinentsGateway($connection);
                      $result = $db->retrieveRecords($db->getDropdownStatement());
                      foreach ($result as $row) { ?>
                          <option value =<?php echo $row["ContinentCode"] ?>><?php echo  $row["ContinentName"] ?> </option>
                      <?php } $db = null; ?>
                
              </select>     
                <!--select country-->
                <select name="country" class="form-control submitClass" id="selection" >
                <option value="0">Select Country</option>
                <?php 
                  /*Display dropdown menu of countries */
                      $db =new CountriesGateway($connection);
                      $result = $db->retrieveRecords($db->getDropdownStatement());
                      foreach ($result as $row) { ?>
                          <option value =<?php echo $row["ISO"] ?>><?php  echo  $row["CountryName"] ?></option>
                      <?php } $db = null; ?>
                
                /* display list of cities */ 
                ?>
              </select>   
                <!--select city-->
                <select name="city" class="form-control submitClass" >
                    <option value="0">Select City</option>
                      <?php 
                      $db =new CitiesGateway($connection);
                      $result = $db->retrieveRecords($db->getDropdownStatement());
                      foreach ($result as $row) { ?>
                            <option value =<?php echo $row["CityCode"]?>><?php echo  $row["AsciiName"] ?></option>
                      <?php } $db = null; ?>
               </select>
                <!--text search--> 
                <input type="text"  placeholder="Search title" class="form-control submitClass" name=title >
                <!--clear button-->
                <?php if($clear){ echo '<button type="submit" class="btn btn-success">Clear</button>';}?>
              </div>
              <!--end inline form-->
            </form>
            <!--end form-->
            
            <script>
             //window.onload(submitFunction(content));
            </script>
          </div>
          <!--end panel body-->
        </div>  
        <!--end filter panel-->
        
        <!--Images Panel-->
        <div class="panel panel-primary">
          <div class="panel-heading">Images </div><!--End Panel Heading-->
        
          <div class="panel-body">
          <!--Image list-->
              <ul class="caption-style-2">
                <?php 
                      if(isset($_GET['search'])){
                        $result = searchBox($connection,$_GET['search']);
                      }
                      else{
                          $result = setDbSearch($_GET["continent"],$_GET["country"],$_GET["city"],$_GET["title"],$connection);
                      }
                      
                   foreach($result as $row){ ?>
                          <li>
                            <a href='single-image.php?id=<?php echo$row['ImageID'] ?>' >
                              <img src="images/square-medium/<?php echo $row['Path'] ?>" alt="<?php echo$row["Title"] ?>" class="img-responsive">
                              <div class="caption">
                                <div class="blur"></div>
                                <div class="caption-text">
                                  <p><?php echo $row["Title"] ?></p>
                                </div><!--end caption text-->
                              </div><!--end caption-->
                            </a>
                         </li>
                <?php } ?>
                 
              </ul>
          </div>
          <!--end panel body-->
        </div>
        <!--end image panel-->
      </main>  
      
      <?php include("includes/scripts.php");?>
       
  </body>
  
  <?php include 'includes/footer.php' ?>
  
  <!--Javascript Scripts-->
        
  
</html>




