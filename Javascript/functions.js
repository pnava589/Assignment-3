



function submitFunction(content) {

    if (content.value) {
        content.form.submit();
    }

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
window.addEventListener('load',function(e){

     var el = document.querySelector('.alert');
     setTimeout(function(){el.classList.add('hidden');}, 2000);
     
})


    
    

