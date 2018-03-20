<?php session_start();?>
<!DOCTYPE html>
<html lang="en">



<head>
    <meta charset="utf-8">
    <title>Log In</title>

    <?php include("includes/stylesheets.php");?>
</head>

<body>
    
    <?php include 'includes/header.php'; if(isset($_SESSION['Username']) && !empty($_SESSION['Username'])) { $username = $_SESSION['Username']; }?>
    
 
        
        <main class="container">
            
               
                <div class = "row">
                    
                        <br>
                        <?php if ($_GET['id'] == 'no'){ echo '<div class="alert alert-danger" role="alert"> Incorrect username or password </div>'; } ?>
                        <form action='/profile.php' method='post' role='form' >
                        <div class="panel panel-primary form-rounded">
                          <div class="panel-heading">
                            <h3 class="panel-title text-center">Login</h3>
                          </div>
                          <div class="panel-body">
                                <label for='username'><h3>Username</h3></label>
                              <input type='text' name='username' class='form-control form-rounded' value = "<?php echo $username ?>" />
                          </div>
                          <div class="panel-body">
                                <label for='pword'><h3>Password</h3></label>
                              <input type='password' name='pword' class='form-control form-rounded'/>
                          </div>
                          <div class="panel-body"><input type='submit' value='Login' class=' form-control form-rounded' /></div>
                        </div>
                        </form>
                    
                </div>
        </main>
        
        
        <?php include 'includes/footer.php' ?>
        
        
        
        <!--Javascript Scripts-->
        <?php include("includes/scripts.php");?>
       
       </body>
    </html>