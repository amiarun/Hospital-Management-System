$("form").attr('autocomplete', 'off');

$(".item").click(function() {
    if($(this).data("originalTitle") == "Edit") {
        var row = $(this).parent().parent().parent().children();
        populate(row);
        $('html,body').animate({ scrollTop: 0 }, 'slow');
    }

    else if($(this).data("originalTitle") == "Delete") {
        var row = $(this).parent().parent().parent().children();
        toDeleteUser(row);

    }
})



//  Function to populate values from table to form
function populate(row) {
    $("input#hidden").val(row.eq(0).html());
    $("select#department").val(row.eq(1).html());
    $("input#username").val(row.eq(2).html());
    $("input#password").val(row.eq(3).html());
    

    $("button#register").html("Update");
    $("button#register").attr('name', 'update');

    $("button#register").removeClass("btn-primary");
    $("button#register").addClass("btn-success");
}

function toDeleteUser(row) {
    if(confirm("Are you sure you want to delete this user?")){
        $("input#hidden").val(row.eq(0).html());
        $("#deleter").click();
    }
}
