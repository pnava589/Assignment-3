/* ------------------------------------Update order page id's -------------------------------------------------------------------*/

function updateOrders() {

    let childCount = $(".h").length;


    $.get("print-services.php", function(data) {

        for (let i = 0; i < childCount; i++) {
            let orderRow = $(".order #" + i + "");
            let paper = orderRow.find("#paper").html();
            let size = orderRow.find("#size").html();
            let frame = orderRow.find("#frame").html();

            orderRow.find("#size").html(data.sizes[size].name).remove;
            orderRow.find("#paper").html(data.stock[paper].name);
            orderRow.find("#frame").html(data.frame[frame].name);

            orderRow.removeClass("h");
        }
    }); //end get




}
updateOrders();
