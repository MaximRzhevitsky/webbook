jQuery(function($) {

    $(".products").on('mouseenter',".img-wrap", function(){
        var url = $(this).attr("id");
        var price = $(this).attr("data-price");
                $("#image-modal").attr("src", url);
                $("#price_out").html(price);
                $("#myModal").show();
   });

    $(".close_cursor").on("click", function () {
        $("#myModal").hide();
    });

});
