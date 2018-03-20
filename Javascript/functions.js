



function submitFunction(content) {

    if (content.value) {
        content.form.submit();
    }

}
/*
//function for hover using JavaScript
function hover(element,id) {
    
    element.classList.add("hidden");
    document.getElementById("big-"+id).classList.remove("hidden");
    document.getElementById("big-"+id).style.position = "static";
// it does not know what todo cause the big div is fighting to remove or add the hidden class 
}


function OnMouseOut(element,id) {
   
   document.getElementById("big-"+id).classList.add("hidden");
   //document.getElementById("big-"+id).style.display = "none";
  element.classList.remove("hidden");
   

}



///
function hov(element,id) {
    document.getElementById("big-"+id).classList.remove("hidden");
    element.classList.add("hidden");
    //let x= document.getElementById("hide")
    //x.style.display = "block";

}


function mout(element,id){
    document.getElementById("big-"+id).classList.add("hidden");
    //document.getElementById("hide").style.display = "none";
}





/* ---------------------------------------------------------------------- */


window.addEventListener('load',function()
{
    var esk = document.querySelectorAll('.singleCountryImg img');
    var node = document.querySelectorAll('#juan');
    var hid = document.querySelectorAll('.single-image');
    var pedro = document.querySelector('.container');
    //console.log(hid);
    for(let i=0; i<hid.length; i++)
    {
        
        
                    var test = document.createElement('div');
                    var img = document.createElement('img');
                   hid[i].addEventListener('mouseover',function(e){
                  var juan = "/images/square-medium/"+e.target.name;
                    
                    img.src = juan;
                    var title = e.target.alt;
                    test.innerHTML = '<p id = "ped">'+e.target.alt+'</p>';
                    test.appendChild(img);
               
                
               console.log(e.target.src);
               
               pedro.appendChild(test);
          
            
            
             
        });
        esk[i].addEventListener('mousemove', function(e){
            var x = e.clientX+1;
            var y = e.clientY+1;
          
         
           
            test.style.position = "fixed";
            test.style.top = y + 'px';
            test.style.left = x + 'px';
           test.style.color = 'black';
            test.style.zIndex = +5;
            
           
           
        });
         
         hid[i].addEventListener('mouseout', function(e){
             //e.target.src = original;
            //esk[i].classList.remove("bigger");
            while(test.hasChildNodes())
            {
             test.removeChild(test.firstChild);
              
             
             
            }
            
             
            
        });
         
    }});
    
  

    



/* ----------------------------------ALERT TIMEOUT FUNCTION------------------------------------ */
//set event handler for favorite button
/*window.addEventListener('load',function(e){
   
     var a = document.querySelector(".favBtn");
     
     a.addEventListener('click',function(e){
         console.log(a);
        setTimeout(function() {document.querySelector("#alert-box").classList.remove('hidden') }, 2000) ;
         
     })
     
     
   
})*/


    
    

