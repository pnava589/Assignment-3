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

                            $len =(count($_POST))/5;
                            for($i=0; $i<$len; $i++){
                        ?>
                        <div class="row h" id=<?php echo "$i";?> >
                              
                                          <div class ="col-md-2 ">
                                              <?php echo "<img src='images/square-small/".$_POST["path${i}"]."'/>"; ?> 
                                          </div>
                                          <div class ="col-md-2 ">
                                              <?php echo "<p id='size'>".$_POST["size${i}"]."</p>"; ?>
                                          </div>
                                          <div class ="col-md-2 ">
                                              <?php echo "<p id='paper'>".$_POST["paper${i}"]."</p>"; ?>
                                          </div>
                                          <div class ="col-md-2 ">
                                              <?php echo "<p id='frame'>".$_POST["frame${i}"]."</p>"; ?>
                                          </div>
                                          <div class ="col-md-2 ">
                                              <?php echo "<p>".$_POST["qty${i}"]."</p>"; ?>
                                          </div>
                                      
                            
                           
                            
                        </div>
                        <?php } ?>
                        
                        <!-- shipping Row-->
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-2"></div>
                            <div class="col-md-3"><strong><?php $id = $_POST['Btn']; if($id == 0){ echo "<p>Standard Shipping</p>"; } else { echo "<p>Express Shipping</p>" ;} ?></strong></div>
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