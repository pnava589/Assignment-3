/*dinamuically submits the filters in the browse-image site*/
var selection = document.querySelectorAll('.submitClass');
for (let i = 0; i < selection.length; i++) {
    selection[i].addEventListener('change', function(e) {
        e.target.form.submit();
    });
}



window.addEventListener('load', function() {
    var esk = document.querySelectorAll('.singleCountryImg img');
    var node = document.querySelectorAll('#juan');
    var hid = document.querySelectorAll('.single-image');
    var pedro = document.querySelector('.container');

    for (let i = 0; i < hid.length; i++) {


        var test = document.createElement('div');
        var img = document.createElement('img');
        hid[i].addEventListener('mouseover', function(e) {
            var juan = "/images/square-medium/" + e.target.name;

            img.src = juan;
            var title = e.target.alt;
            test.innerHTML = '<p id = "ped">' + e.target.alt + '</p>';
            test.appendChild(img);


            console.log(e.target.src);

            pedro.appendChild(test);




        });
        esk[i].addEventListener('mousemove', function(e) {
            var x = e.clientX + 1;
            var y = e.clientY + 1;



            test.style.position = "fixed";
            test.style.top = y + 'px';
            test.style.left = x + 'px';
            test.style.color = 'black';
            test.style.zIndex = +5;



        });

        hid[i].addEventListener('mouseout', function(e) {
            //e.target.src = original;
            //esk[i].classList.remove("bigger");
            while (test.hasChildNodes()) {
                test.removeChild(test.firstChild);



            }



        });

    }
});







/* ----------------------------------ALERT TIMEOUT FUNCTION------------------------------------ */
//set event handler for favorite button
window.addEventListener('load', function(e) {

    var el = document.querySelector('.alert');
    setTimeout(function() {
        if (el) { el.classList.add('hidden'); }
    }, 2000);

});

/* ----------------------------------END ALERT TIMEOUT FUNCTION------------------------------------ */










/* ----------------------------------FRAME PREVIEW FUNCTION------------------------------------ */

$(function() { //Run after DOM is loaded



    var thumbnailImage = $("td #thmbImage"); // thumbnail image selector

    //when mouse is over image
    thumbnailImage.on("mouseenter", function(e) {

        //get details of image path and alt
        var src = $(this).attr('src');
        var alt = $(this).attr('alt');

        //create div with frame preview
        var preview = $('<div id="preview"></div>');
        var image = $('<img src="' + src + '"/>');
        var caption = $('<p></p>').html(alt);
        var parentId = e.target.parentElement.parentElement.id;
        var frameId = $("#" + parentId + " .frame").val();
        var details = frameDetail(jData, frameId); /////////////>> Figure out how to get the id of the image
        console.log(frameId + " " + details[0] + " " + details[1]);
        console.log(frameId);

        //add the elements to the preview
        preview.append(image);
        //preview.append(caption);
        preview.css("border-color", details[0]);
        preview.css("border-width", details[1]);
        $('.modal-content').append(preview);

        //fade preview	in
        $("#preview").fadeIn(350);

        var imagePath = src.slice(20);
        // images/square-small/6592317633.jpg
    });


    //move frame with the mouse
    thumbnailImage.on("mousemove", function(e) {
        //position the preview based on the mouse mov't
        $("#preview")
            .css("top", (e.pageY - 10))


            .css("left", (e.pageX - 180))
        //.css("position", "left");
    });

    //remove frame when the mouse leaves the image
    thumbnailImage.on('mouseleave', function(e) {
        //remove the div element
        $("#preview").remove();
    });


});


/* ----------------------------------Gets Frame color and border------------------------------------ */
var frameDetail = function(data, id) {
    if (id >= 0 && id < 5) return [data.frame[id].color, data.frame[id].border];
};
