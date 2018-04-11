

 


<?php
session_start(); 
?>

<!DOCTYPE html>

<html lang="en">
    
<head>
    <meta charset="utf-8">
    <title>Print Favorites</title>

   <?php include("includes/stylesheets.php");?>
    
     <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script> 
    
 
</head>

<body>
<main>
  <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">
    Print Favorties
  </button>

  <!-- Modal -->
  <div class="modal fade"  id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
      <form method="post" action="order.php" id ="form">
      <div class="modal-content ">
      
        <!--modal header-->
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Print Favorites</h4>
        </div>
        <!--end modal header-->
      
        <!--modal body-->
        <div class="modal-body row">
    <table class="table">
      <!--headings-->
      <thead>
        <tr>
          <th class="col-md-2"></th>
          <th class="col-md-2">Size</th>
          <th class="col-md-2">Paper</th>
          <th class="col-md-2">Frame</th>
          <th class="col-md-2">Quantity</th>
          <th class="col-md-2">Total</th>
        </tr>
      </thead>
      <!--end headings-->
      
      <tbody id="tab">
      <!--</div>-->
      
        
        <?php
          $ar = array();
          if (isset($_SESSION["favImages"])){
            
            $favImages = $_SESSION["favImages"];
            $count = 0;
            
            foreach($favImages as $key => $value){
              //$index = current($favImages);
            
              $ar[] = $value[0];
        ?>
            
          <tr id="<?php echo $count; ?>" class ='newclass'>
            <!--Image-->
            <td class="col-md-2">
              <input type="hidden" name="path<?php echo $count; ?>" value="<?php echo $value[1] ?>">
              <img id="thmbImage" src="images/square-small/<?php echo $value[1] ?>" alt="<?php echo $value[0] ?>" >
            </td>
            
            <!--Size-->
            <td class="col-md-2">
              <select class="form-control size" name="size<?php echo $count ?>"></select>
            </td>
            
            <!--Paper-->
            <td class="col-md-2">
              <select class="form-control paper" name="paper<?php echo $count ?>"></select>
            </td>
            
            <!--Frame-->
            <td class="col-md-2">
              <select class="form-control frame" name="frame<?php echo $count ?>"></select>
            </td>
            
            <!--Qty-->
            <td class=" col-md-2">
              <input type="text" class="form-control quantity inp" id="qtyItem" value=1 name="qty<?php echo $count ?>">
            </td>
            
            <!--Price-->
            <td class="col-md-2 totalPrice" id="sub<?php echo $count?>">0</td>
            
            
          </tr><!--End table row-->
      </tbody>
           
             
        <?php
            $count ++;
          }
          }
        ?>
        
        <tfoot>
          <tr>
          <td class="md-col-8">
            
          </td>
          <td class="col-md-2 ">
              
          </td>
          <td class="col-md-2">
               
          </td>
            
            <td class="col-md-2">
               
          </td>
          
          <td class="col-md-2" >
               Subtotal
          </td>
          
          <td class="col-md-2" id="subtotal">
               
          </td>
          
          </tr>
          <tr>
             <td class="col-md-2 ">
              
          </td>
          <td class="col-md-2">
               
          </td>
             <form id="radioCheck">
            <td class="col-md-2 ">
              
                <label class="radio-inline" ><input id="shipping0" type="radio"  name="Btn" checked="checked"/><span id="ship0"></span></label>
                
                
          </td>
           <td class="col-md-2">
                 
                <label class="radio-inline"><input id="shipping1" type="radio" name="Btn"/><span id="ship1"></span></label>
               </form> 
                
          </td>
          
          <td class="col-md-2" >
               Shipping
          </td>
          
          <td class="col-md-2" id = "shippingCost">
               $ 0
          </td>
          </tr>
          <tr>
          <td class="md-col-8">
            
          </td>
          <td class="col-md-2 ">
              
          </td>
          <td class="col-md-2">
               
          </td>
            
            <td class="col-md-2">
               
          </td>
          
          <td class="col-md-2" >
               Grand Total
          </td>
          
          <td class="col-md-2" id="grandTotal">
               $ 0
          </td>
          
          </tr>
        </tfoot>
        
    </table>
      
      <!--line of forms goes here !-->
    
    
    
    
      </div>
        <!--end modal body-->
      
        <!--modal footer-->
        <div class=" modal-footer">
        <button type="submit" class="btn btn-primary btn-sm " value="Submit" form="form">Order</button>
      </div>
        <!--end modal footer-->
        
      
      </div><!--end modal content-->
      </form>
    </div><!--end dialog-->
  </div><!--end modal fade-->

  
  
</main>
                
                <script>
                //variable for getting json data
                var jdata;//DO NOT TOUCH THIS!!
                var cost = 0 ;
                var totals = {frame:0, quantity:0};
                
                 $.get('/print-services.php')
                  .done(function(data){
                      jData = data;//DO NOT TOUCH THIS!!
                      
                    
                      for(let i = 0; i < data.sizes.length ; i++){
                        $('.size').append('<option value ="'+ data.sizes[i].id +'">'+data.sizes[i].name+'</option>');
                         
                      }
                      for(let i = 0; i < data.stock.length ; i++){
                        $('.paper').append('<option value ="'+data.stock[i].id+'">'+data.stock[i].name+'</option>');
                        //var paperPrice = calcPaper(data.stock[i]);
                      }
                      for(let i = 0; i < data.frame.length ; i++){
                        $('.frame').append('<option value ='+data.frame[i].id+'>'+data.frame[i].name+'</option>');
                      }
                      var total = 0;
                     
                     for(let i = 0; i < data.shipping.length; i++){
                       
                       $('#ship'+i).html(data.shipping[i].name);
                       $('#shipping'+i).val(data.shipping[i].id);
                       
                     }
                      
                   
                    
                  })
                  .fail(function(data){
                    alert("data could not be loaded");
                  })
                  .always(function(data){
                  runCostLoop();
                  
                  
                  var favorites = "<?php echo $count ?>";
                  favorites.parseInt;
                  var numFrames = 0;
                 for(var i = 0 ; i < favorites ; i++)
                 {
                     
                  $(".totalPrice").html(getDefaultPrice()); // sets .05 as the default total price for all of the favorites   
                 
                 
                  $('#'+i).change(function(event){
                      var subtotal = 0;
                      var total = 0;
                      var size = parseFloat($(this).find('.size').val());
                      var price = getPrice(size);
                      var paper = parseFloat($(this).find('.paper').val());
                      var paperPrice = getPaperPrice(size,paper);
                      var frame = parseFloat($(this).find('.frame').val());
                      var frameCost =  framePrice(size,frame);
                      var quant = parseFloat($(this).find('.quantity').val());
                      var type = $('#radioCheck');
                      //var totFrames = calcquantity(quant,frame);
                      //console.log("total frames"+totFrames);
                      var total = (price+paperPrice+frameCost)*quant;
                      
                     
                     
                    $(this).find('.totalPrice').html(total);
                    
                   // var subtotalValue =  $(this).find('.totalPrice').html(total);
                     
                     for(let j = 0; j < favorites; j++)
                      {
                        
                         subtotal += parseFloat($("#sub"+j).text());
                        
                         $('#subtotal').text("$ "+subtotal);
                         
                      }
                   
                    
                  });
                 }
                 
                 $('label').on('click',function(){
                   
                   
                  
                  //$(this).find('input').val($(this).find('span').html());
                 
                   
                  
                 
                 });
                
               
               function getPrice(value){
                let data = jData;
                return data.sizes[value].cost;
                      
                  
                  
                  
    }
    
    function calculateShipping(type)
    {
     
      var total = parseFloat($('#subtotal').html().replace('$ ',''))
      var quantity = getQuant();
      var shipping = 0;
      var shippingObject = data.shipping[type];
      var freeThreshold = getFreeThreshold(shippingObject.name);
      
      console.log(freeThreshold);
      console.log(quantity);
      if(total >= freeThreshold){
        cost = 0;
      }
      else{
        if(quantity == 0){
          cost = shippingObject.rules.none;
        }
        else if (quantity < 10){
          cost = shippingObject.rules.under10;
        }
        else{
          cost = shippingObject.rules.over10;
        }
      }
      $('#shippingCost').html('$ '+cost);
    }
    
    function getFreeThreshold(name){
      var total = 0;
      for(let k = 0; k < data.freeThresholds.length; k++){
        if(data.freeThresholds[k].name.toLowerCase() == name.toLowerCase()){
          total = data.freeThresholds[k].amount;
          return total;
        }
      }
    }
    
    function getQuant(){
      var quant =0;
      $('.newclass').each(function(e){
        
       if($(this).find('.frame').val() != 0){
        quant += parseFloat($(this).find('.quantity').val());
        
       }
      });
      return quant;
    }
    //this function is called to calculate the costs
    function runCostLoop(){
      var type;
      var subtotal = getSubTotal();
      //this calculates the shipping cost on the first load
      $(window).ready(function(e){
        
        $('#subtotal').html(subtotal);
        
        $('.radio-inline input').each(function(e){
          if($(this).is(':checked')){type = $(this).val();}
        })
        
        calculateShipping(type);
        $('#grandTotal').html('$ '+getGrandTotal());
      })
      
      // this calculates the shipping cost after changes are made using event delegation
      $('.modal').on('change',function(e){
        $('.radio-inline input').each(function(e){
          if($(this).is(':checked')){type = $(this).val();}
        })
        calculateShipping(type);
        
        $('#grandTotal').html('$ '+getGrandTotal());
      })
    }
    
    function getGrandTotal(){
      var total;
      total = parseFloat($('#subtotal').html().replace('$ ',''))+parseFloat($('#shippingCost').html().replace('$ ',''));
      return total;
      //$('grandTotal').html('$ '+total);
    }
    
    function getDefaultPrice()
    {
      let data = jData;
      var defaultPrice = data.sizes[0].cost + data.stock[0].small_cost + data.frame[0].costs[0] ; 
      
      return defaultPrice;
    }
    
     function getPaperPrice(sizeID,paperID)
     {
      let data = jData;
      var addition;
      
        if(sizeID < 2){
           addition =  data.stock[paperID].small_cost; //if sizeID<2
        }
          
        else
        {
          addition =  data.stock[paperID].large_cost;// if sizeID >2
        }
        
        return addition;
    
    }
    function getSubTotal(){
      var subtotal = ($(".newclass").length)*getDefaultPrice();
      
      $(window).ready(function(e){
        
        $('.totalPrice').each(function(e){
        
            subtotal += parseFloat($(this).html());
            
        })
      })
        return subtotal;
    }


  function framePrice (sizeID,frameID)
    {
      let data = jData;
      
      var frameCost = data.frame[frameID].costs[sizeID];
      numFrames++;
      return frameCost;
    }
    
    
           
                
  });
                
             
                
                </script>
                
</body>






































