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

    $haystack = $_SERVER['HTTP_REFERER'];
    $needle = 'https://assignment-3-pnava589.c9users.io/single-post.php?';
    if (strstr($haystack, $needle)){
        $style="";
    }
    else{
        $style='hidden';
    }
    

?>
<!DOCTYPE html>

<html lang="en">
    
<head>
    <meta charset="utf-8">
    <title>Single Post</title>

    <?php include("includes/stylesheets.php");?>
</head>
    
    <body>
        
       <?php include 'includes/header.php' ?>
        
        <!-- end of header  -->
        
        <main class = "container">
            <div class="alert  alert-danger <?php echo $style?>" role="alert" id = "alert-box" >
                <p> Post has been added to favorites!</p>
            </div>
             <div class = "row bg-alter">
                    <div class="col-md-12">
                        <div class="col-md-12">
                            <h2><?php echo $title ?></h2>
                        </div>
                        
                        <div class="col-md-12">
                            
                            <div class = "col-md-4">
                                <img class ="img-responsive" src = "/images/medium/<?php echo $path ?>">
                                <br>
                                <!--view & add to favorite button-->
                                <div class="btn-group btn-group-justified" role="group" aria-label="...">
                                    <div class="btn-group" role="group">
                                        <a href="set-fav.php?type=post&pstPath=<?php echo $row["Path"] ?>&pstTitle=<?php echo $row['Title'] ?>&pstId=<?php echo $_GET['id']?>">
                                            <button type="button" class="btn btn-primary favBtn">Add to Favorites</button>
                                        </a>
                                    </div>
                                </div><br>
                                <div class="btn-group btn-group-justified" role="group" aria-label="...">
                                    <div class="btn-group" role="group">
                                        <a href="favorites.php">
                                            <button type="button" class="btn btn-primary">View Favorites</button>
                                        </a>
                                    </div>
                                </div><br>
                                <!--end fav btn group-->
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
                        <div class= "panel panel-primary">
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

      
       
        
        </body>
                <?php include 'includes/footer.php' ?>
                <!--Javascript Scripts-->
        <?php include("includes/scripts.php");?>
        
        </html>