window.onload = function() {
    $(".nav_item").each(function (i, obj) {
        if($(obj).data("id") == $("h6").html()) {
            $(obj).addClass("active");
        }
    })
}