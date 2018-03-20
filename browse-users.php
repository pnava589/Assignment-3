
<?php include 'includes/travel-config.php'; session_start();?>

<!DOCTYPE html>

<html lang="en">
    
<head>
    <meta charset="utf-8">
    <title>Browse Users</title>

    <?php include("includes/stylesheets.php");?>
</head>
    
    <body>
        
        <?php include 'includes/header.php' ?>
        
        <main class="container">
            
            <div class="panel panel-primary">
                <div class="panel-heading">Users </div>
                <div class="panel-body">
                    <?php 
                    $db = new UsersGateway($connection);
                    $result = $db->findParamSorted(array('Firstname','Lastname','UserID'));
                    displayUsers($result) ?>
                </div>
                    
                </div>
                
            </div>
            
        </main>
        
        <!--<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script> !-->
        
        </body>
        <?php include 'includes/footer.php' ?>
        
        <!--Javascript Scripts-->
        <?php include("includes/scripts.php");?>
        
        </html>