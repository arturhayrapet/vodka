$(document).ready(function () {

    $(".img").on({
        click: function() {
            $(".img").removeClass("borderSelected");
            $(this).addClass( "borderSelected" );
            if($('#post-picture')) $("#post-picture").val($(this).data('id'));
            if($('#product-image')) $("#product-image").val($(this).data('id'));
        },
        dblclick: function() {
            if($('#product-image')) $("#product-image").val($(this).data('id'));
            if($('#post-picture')) $("#post-picture").val($(this).data('id'));
            $("#closeButton").click();
        }
    });

});
