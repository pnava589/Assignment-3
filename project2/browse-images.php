
<?php include 'includes/travel-config.php';
      
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
    <title>Browse-images</title>

      <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>

    
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/captions.css" />
    <link rel="stylesheet" href="css/bootstrap-theme.css" /> 
    
     <!-- <link rel="stylesheet" href="css/bootstrap.css" /> !-->
</head>
  
  <body>
    <?php include 'includes/header.php' ?>
    
      <main class="container">
        
        <div class="panel panel-default">
          <div class="panel-heading">Filters</div>
          <div class="panel-body">
            <form action="browse-images.php" method="get" class="form-horizontal">
              <div class="form-inline">
              <select name="continent" class="form-control">
                 <option value="0">Select Continent</option>
                
                
               <?php
                   
                   /*Displays dropdown menu of continents */
                   
                      $db =new ContinentsGateway($connection);
                      $result = $db->retrieveRecords($db->getDropdownStatement());
                      foreach ($result as $row) { ?>
                          <option value =<?php echo $row["ContinentCode"] ?>><?php echo  $row["ContinentName"] ?> </option>
                      <?php } $db = null; ?>
                
              </select>     
                
              <select name="country" class="form-control">
                <option value="0">Select Country</option>
                <?php 
                  /*  Dislay dropdown menu of countries */
                      $db =new CountriesGateway($connection);
                      $result = $db->retrieveRecords($db->getDropdownStatement());
                      foreach ($result as $row) { ?>
                          <option value =<?php echo $row["ISO"] ?>><?php  echo  $row["CountryName"] ?></option>
                      <?php } $db = null; ?>
                
                /* display list of cities */ 
                ?>
              </select>   
              <select name="city" class="form-control">
                    <option value="0">Select City</option>
                      <?php 
                      $db =new CitiesGateway($connection);
                      $result = $db->retrieveRecords($db->getDropdownStatement());
                      foreach ($result as $row) { ?>
                            <option value =<?php echo $row["CityCode"]?>><?php echo  $row["AsciiName"] ?></option>
                      <?php } $db = null; ?>
               </select>
               
               <input type="text"  placeholder="Search title" class="form-control" name=title>
              <button type="submit" class="btn btn-primary">Filter</button>
              
             <?php if($clear){ echo '<button type="submit" class="btn btn-success">Clear</button>';}?>
              </div>
            </form>

          </div>
        </div>  
               
               <ul class="caption-style-2">
                 <?php 
                      
                     $result = setDbSearch($_GET["continent"],$_GET["country"],$_GET["city"],$_GET["title"],$connection);
                   
                   foreach($result as $row){ ?>
                          <li>
                          <a href="single-image.php?id=<?php echo$row['ImageID'] ?>"  class="img-responsive">
                          <img src="images/square-medium/<?php echo $row['Path'] ?>" alt="<?php echo$row["Title"] ?>">
                          <div class="caption">
                          <div class="blur"></div>
                          <div class="caption-text">
                          <p><?php echo $row["Title"] ?></p>
                          </div>
                          </div>
                          </a>
                         </li>
                      <?php } ?>
                 
               </ul>

              
         </main>       
        <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
  </body>
  <?php include 'includes/footer.php' ?>
</html>




