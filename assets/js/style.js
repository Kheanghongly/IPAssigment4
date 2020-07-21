$(function () {
    $(".item_product").slice(0, 6).show();
    $("#load").on('click', function (e) {
        e.preventDefault();
        $(".item_product:hidden").slice(0, 6).slideDown();
        if ($(".item_product:hidden").length == 0) {
            $("#load").fadeOut('slow');
            
        }

    });

});
$(document).ready(function(){
    $("#input_text").keyup(function(){
        var Value = $(this).val();
        console.log(Value)
        $("#search_product").empty();
        // $("#search_product").append(Value);
        $.ajax({
            type: "POST",
            url: "include/products.php",
            data: {Input:Value},
            success: function(text){
                $("#search_product").empty();
                $("#search_product").append(text);
            }
        });
    })
})
$(document).ready(function(){
    $("#input_text_").keyup(function(){
        var Value = $(this).val();
        console.log(Value)
        $.ajax({
            type: "POST",
            url: "include/products.php",
            data: {Input:Value},
            success: function(text){

                $("#search-item").empty();
                $("#search-item").append(text);

            },
            
        });
    })
})


