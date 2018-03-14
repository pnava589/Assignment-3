
<?php include 'includes/travel-config.php';
             
        
            $UserID = $_GET['user'];
            if( !queryStringExists($UserID))
                {
                    redirect() ;
                }
            else
                {
                    $db = new UsersGateway($connection);
                    $result = $db->findById($UserID);
                    if( emptyset($result))
                        {
                         redirect();
                        }
                        
                    
                          $name = $result['FirstName'].' '.$result['LastName'];
                          $adress = $result['Address'];
                          $rest = $result['City'].' '.$result['Region'].' '.$result['Country'].' '.$result['Postal'];
                          $phone = $result['Phone'];
                          $email = $result['Email'];
                   
                   
                    
                }
                $db = null;
?>


<!DOCTYPE html>

<html lang="en">
    
    <head>
        
        <meta charset="utf-8">
         <title>Single User</title>
        <meta name="viewport" content="width=device-width, initial-scale=1"> 
       
      
        
         <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
         <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
         
         <link rel="stylesheet" href="css/bootstrap.min.css" />
         <link rel="stylesheet" href="css/bootstrap-theme.css" />
         <link rel="stylesheet" href="css/pedro.css" />

         
    </head>
    
    <body>
        
       <?php include 'includes/header.php' ?>
        
        <!-- end of header  -->
        
        <main class = "container">
             <div class = "row bg-alter">
                    <div class="col-md-12">
                        <div class="col-md-12">
                            <h2><?php echo $name ?></h2>
                        </div>
                        
                        <div class="col-md-12">
                            <p> <?php echo $adress ?><p>
                        </div>
                        <div class="col-md-12">
                            <p> <?php echo $rest ?><p>
                        </div>
                        <div class="col-md-12">
                            <p> <?php echo $phone ?><p>
                        </div>
                        <div class="col-md-12">
                            <p> <?php echo $email ?><p>
                        </div>
                        
                    </div>
                </div>
                <br>
                <div class = "row">
                    
                    <div class= "bottom-container">
                        <div class= "panel panel-info">
                            <div class ="panel-heading"> Images By <?php echo $name ?> </div>
                            <div class="panel-body">
                            
                            <?php
                            $db = new ImageDetailsGateway($connection);
                            $result = $db->findParamByField(array('Path','ImageID'), $UserID, 'UserID');
                            printSmall($result,'single-image.php?id=', 'ImageID');
                            ?>
                            </div>
                        </div>
                        </div>
                    
                </div>
                </main>

         <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
       
        
        </body>
                <?php include 'includes/footer.php' ?>
        
        </html>