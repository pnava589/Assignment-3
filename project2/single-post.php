<?php include 'includes/travel-config.php'; session_start();
             
        
            $PostID = $_GET['id'];
            if( !queryStringExists($PostID))
                {
                    redirect() ;
                }
            else
                {
                    $db = new PostsGateway($connection);
                    $result = $db->retrieveRecords($db->getPostDataStatement(),$PostID);
                    if( emptyset($result))
                        {
                         redirect();
                        }
                        
                    foreach($result as $row){
                          $user = $row['FirstName'].' '.$row['LastName'];
                          $main = $row['MainPostImage'];
                          $post = $row['PostID'];
                          $title = $row['Title'];
                         $message = $row['Message'];
                         $time = $row['PostTime'];
                         $path = $row['Path'];
                    }
                   
                    
                }
                $db = null;
?>
<!DOCTYPE html>

<html lang="en">
    
    <head>
        
        <meta charset="utf-8">
         <title>Single Post</title>
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
                            <h2><?php echo $title ?></h2>
                        </div>
                        
                        <div class="col-md-12">
                            <div class = "col-md-4">
                                <img class ="img-responsive" src = "/project2/images/medium/<?php echo $path ?>">
                            </div>
                            <div class = "col-md-8">
                                <div class = "col-md-12">
                                   <b>BY:</b> <?php echo $user ?>
                                </div>
                                <br>
                                <div class = "col-md-12">
                                    <b>POSTED ON:</b> <?php echo $time ?>
                                </div>
                                
                                <div class = "col-md-12">
                                    <br>
                                    <?php echo $message ?>
                                </div>
                            </div>
                        </div>
                        
                        
                    </div>
                </div>
                <br>
                <div class = "row">
                    
                    <div class= "bottom-container">
                        <div class= "panel panel-info">
                            <div class ="panel-heading"> Related Images </div>
                            <div class="panel-body">
                            
                            <?php
                            $db = new PostsGateway($connection);
                            $result = $db->retrieveRecords($db->getRelatedPicStatement(), $PostID);
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