<?php session_start();?>
<!DOCTYPE html>
<html lang="en">



<head>
    <meta charset="utf-8">
    <title>Login</title>

      <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/bootstrap-theme.css" />
    <link rel="stylesheet" href="css/pedro.css" />
     <!-- <link rel="stylesheet" href="css/bootstrap.css" /> !-->
</head>

<body>
    
    <?php include 'includes/header.php'; if(isset($_SESSION['Username']) && !empty($_SESSION['Username'])) { $username = $_SESSION['Username']; }?>
    
 
        
        <main class="container">
            
               
                <div class = "row">
                    
                        <br>
                        <?php if ($_GET['id'] == 'no'){ echo '<div class="alert alert-danger" role="alert"> Incorrect username or password </div>'; } ?>
                        <form action='/project2/profile.php' method='post' role='form'>
                        <div class="panel panel-default form-rounded">
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
        
        
        
         <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
       
       
       
       </body>
    </html>