<?php 
    session_start(); 
    include("functions.php");
    
?>

<!DOCTYPE html>
<html lang="en">
    
<?php session_start();?>
<!DOCTYPE html>
<html lang="en">



<head>
    <meta charset="utf-8">
    <title>Order</title>

    <?php include("includes/stylesheets.php");?>
</head>

<body>
    
    <?php include 'includes/header.php' ?>
    
 
        
        <main class="container-fluid">
            
            <div id="row">
                
                <div class="panel panel-primary">
                    
                    <div class="panel-heading">Order Summary</div> <!--end panel heading-->
                    
                    <div class="panel-body order">
                        
                        <!--Heading Row-->
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-2"><p><strong>Size</strong></p></div>
                            <div class="col-md-2"><p><strong>Paper</strong></p></div>
                            <div class="col-md-2"><p><strong>Frame</strong></p></div>
                            <div class="col-md-2"><p><strong>Quantity</strong></p></div>
                        </div>

                            
                        <!--Content Row-->
                       
                        
                        <?php 

                            $len =5;
                            for($i=0; $i<$len; $i++){
                        ?>
                        <div class="row" id=<?php echo "$i";?> >
                          <table class = "table">
                            <tbody>
                              <tr>
                                <td> <?php echo "<img src='images/square-medium/222222.jpg'/>"; ?></td>
                                 <td><p id='size'>Matte</p> </td>
                                  <td><div class="col-md-2"> <p id='size'>Matte</p> </div></td>
                                   <td><div class="col-md-2"> <p id='size'>Matte</p> </div></td>
                              </tr>
                            </tbody>   
                            </table>
                            
                            
                        </div><br>
                        <?php } ?>
                        
                        <!--Express shipping Row-->
                        <div class="row">
                            <div class="col-md-6"></div>
                            <div class="col-md-6"><strong><?php $id = $_POST['Btn']; if($id == 0){ echo "Standard Shipping"; } else { echo "Express Shipping" ;} ?></strong></div>
                        </div>
                        
                    </div><!--end panel body-->
                
                </div><!--end panel-->
            
            </div><!--end row-->
            
        </main>
        
        
        <?php include 'includes/footer.php' ?>
        
        <!--Javascript Scripts-->
        <?php include("includes/scripts.php");?>
        <script src="Javascript/order-functions.js"></script>
        
       
       </body>
    </html>