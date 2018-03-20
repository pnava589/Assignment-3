
<?php include 'includes/travel-config.php'; session_start();
             
        
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

    <?php include("includes/stylesheets.php");?>
</head>
   
    <body>
        
       <?php include 'includes/header.php' ?>
        
        <!-- end of header  -->
        
        <main class = "container">
             <div class = "row bg-alter col-md-6">
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
                <!--<div class = "row"> !-->
                   <!-- <div id ="esketit"></div>!-->
                    <div class= "bottom-container col-md-6">
                        <div class= "panel panel-primary">
                            <div class ="panel-heading"> Images By <?php echo $name ?> </div>
                            <div class="panel-body">
                            
                            <?php
                            $db = new ImageDetailsGateway($connection);
                            $result = $db->findParamByField(array('Path','ImageID','Title'), $UserID, 'UserID');
                            printSmall($result,'single-image.php?id=', 'ImageID');
                            ?>
                            </div>
                        </div>
                        </div>
                    
                <!--</div> !-->
                </main>

         
        
        </body>
                <?php include 'includes/footer.php' ?>
                <!--Javascript Scripts-->
        <?php include("includes/scripts.php");?>
        
        </html>