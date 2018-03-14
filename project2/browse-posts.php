<?php include 'includes/travel-config.php';?>

<!DOCTYPE html>

<html lang="en">
    
    <head>
        
        <meta charset="utf-8">
         <title>Browse Posts</title>
        <meta name="viewport" content="width=device-width, initial-scale=1"> 
       
      
        
         <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
         <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
         
         <link rel="stylesheet" href="css/bootstrap.min.css" />
         <link rel="stylesheet" href="css/bootstrap-theme.css" />
         <link rel="stylesheet" href="css/assignement-01.css" />

         
    </head>
    
    <body>
        
        <?php include 'includes/header.php' ?>
        
        <main class="container">
            <div class = "row">
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
                    <div class = "col-md-10">
                        <div class="jumbotron" id="postJumbo">
                            <h1>Posts</h1>
                            <p>Read other travellers' posts ... or create your own.</p>
                            <p><a class="btn btn-warning btn-lg" href = "aboutus.php">Learn more &raquo;</a></p>
                        </div>
                        <div class = "postlist">
                            <?php
                                    $db = new PostsGateway($connection);
                                    $result = $db->retrieveRecords($db->getBrowsePostsStatement());
                                    foreach($result as $row){
                            ?>
                                    <div class ="row">
                                        <div class = "col-md-4"> 
                                            <img src = "/project2/images/medium/<?php echo $row['Path'] ?>" alt = "<?php echo $row['Title'] ?>" class = "img-responsive">
                                        </div>
                                        <div class = "col-md-8">
                                            <h2><?php echo $row['Title'] ?></h2>
                                            <div class = "details">
                                                Posted By <a href = "single-user.php?user=<?php echo $row['UserID'] ?>"><?php echo $row['FirstName'].' '.$row['LastName'] ?></a>
                                                <span class = "pull-right"><?php echo $row['PostTime'] ?></span>
                                            </div>
                                            <p class = "excerpt"> <?php echo substr($row['Message'],0,200) ?>...</p>
                                            <p class = "pull-right"><a href = "single-post.php?id=<?php echo $row['PostID'] ?>" class = "btn btn-primary btn-sm">Read More</a></p>
                                        </div>
                                    </div>
                                    <hr> 
                            <?php } $db = null; ?>
                        </div>
                    </div>
            </div>
            
            
        </main>
        
        <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        
        </body>
        <?php include 'includes/footer.php' ?>
        </html>