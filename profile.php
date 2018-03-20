<?php include 'includes/travel-config.php';
session_start();
if(!isset($_SESSION['UserID']) || $_SESSION['UserID'] == null){
    $_SESSION['Username'] = $_POST['username'];
    $_SESSION['Password'] = $_POST['pword'];
}
if(!isset($_SESSION['Username']) || $_SESSION['Password'] == null){

    header("Location: /login.php?");
    
}
else if(!isset($_SESSION['UserID']) || $_SESSION['UserID'] == null){
        	

            $db = new UserLoginGateway($connection);
			$statement = $db->retrieveRecords( $db->getUsernameCheck(),$_POST['username']);
		
			foreach($statement as $result){
			$str = $_SESSION['Password'].$result['Salt'];
		
			}
			$pass = md5($str);
			$statement = $db->retrieveRecords($db->getUserLoginCheck(), array(':user'=>$_POST['username'], ':pass'=>md5($str)));
			
			if(count($statement) > 0){
					foreach($statement as $row){
					$_SESSION['UserID'] = $row['UserID'];
					}
			}
			else{
			   header("Location: /login.php?id=no");
			}
}
$db = new UsersGateway($connection);
$result = $db->findById($_SESSION['UserID']);
						  $name = $result['FirstName'].' '.$result['LastName'];
                          $adress = $result['Address'];
                          $rest = $result['City'].' '.$result['Region'].' '.$result['Country'].' '.$result['Postal'];
                          $phone = $result['Phone'];
                          $email = $result['Email'];
?>
<!DOCTYPE html>

<html lang="en">
    
<head>
    <meta charset="utf-8">
    <title>Profile</title>

    <?php include("includes/stylesheets.php");?>
</head>
    
    <body>
        
       <?php include 'includes/header.php' ?>
        
        <!-- end of header  -->
        
        <main class = "container">
             <div class = "row bg-alter col-md-6">
                    <div class="col-md-12">
                        <div class="col-md-12">
                            <h2><b>Name:</b> <?php echo $name ?></h2>
                        </div>
                        
                        <div class="col-md-12">
                            <p><b>Saved Adress:</b> <?php echo $adress ?><p>
                        </div>
                        <div class="col-md-12">
                            <p> <b>City: </b><?php echo  $result['City'] ?> Region:<?php echo  $result['Region'] ?> Country:<?php echo  $result['Country'] ?> Postal <?php echo  $result['Postal'] ?><p>
                        </div>
                        <div class="col-md-12">
                            <p> <b>Phone number:</b> <?php echo $phone ?><p>
                        </div>
                        <div class="col-md-12">
                            <p><b>Email:</b> <?php echo $email ?><p>
                        </div>
                        
                    </div>
                </div>
                <br>
                 <div class= "bottom-container col-md-6">
                    
                    
                        <div class= "panel panel-primary">
                            <div class ="panel-heading"> Your Images Uploads</div>
                            <div class="panel-body">
                            
                            <?php
                            $db = new ImageDetailsGateway($connection);
                            $result = $db->findParamByField(array('Path','ImageID'), $_SESSION['UserID'], 'UserID');
                            printSmall($result,'single-image.php?id=', 'ImageID');
                            ?>
                            </div>
                        </div>
                        
                    
                </div>
                </main>

        
        </body>
        <?php include 'includes/footer.php' ?>
        
        <!--Javascript Scripts-->
        <?php include("includes/scripts.php");?>
        
        </html>