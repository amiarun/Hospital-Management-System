$("form").attr('autocomplete', 'off');

$(".item").click(function() {
    if($(this).data("originalTitle") == "Edit") {
        var row = $(this).parent().parent().parent().children();
        populate(row);
        $('html,body').animate({ scrollTop: 0 }, 'slow');
    }
    else if($(this).data("originalTitle") == "Delete") {
        var row = $(this).parent().parent().parent().children();
        toDeleteHall(row);

    }
    else {  
    }
})



//  Function to populate values from table to form
function populate(row) {
    $("input#hidden").val(row.eq(0).html());
    $("input#roomno").val(row.eq(1).html());
    $("input#block").val(row.eq(2).html());
    $("input#floor").val(row.eq(3).html());
    $("input#benches").val(row.eq(4).html());

    $("button#register").html("Update");
    $("button#register").attr('name', 'update');

    $("button#register").removeClass("btn-primary");
    $("button#register").addClass("btn-success");
}

function toDeleteHall(row) {
    if(confirm("Are you sure you want to delete this hall?")){
        $("input#hidden").val(row.eq(0).html());
        console.log("Deleting...");
        $("#deleter").click();
    }
}
