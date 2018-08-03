/**
 * Created by Levon on 23/01/2018.
 */

$(document).on('click','.gallery', function (e) {

    var current = $('#gallery_attachments').val();
    var id = $(this).attr('id');
    var curentArray = []
    if (current != '') {
         curentArray = current.split(',');
        if (!$(this).hasClass('choosed-gal')) {
            curentArray.push($(this).attr('id'));
            $(this).addClass('choosed-gal');
        } else {
            $(this).removeClass('choosed-gal');
            var index = curentArray.indexOf(id);
            console.log(index)
            if(index > -1)
            curentArray.splice(index,1);
        }
    }else{
        $(this).addClass('choosed-gal');
        curentArray = [id];
    }
    curentArray.join(',');
    $('#gallery_attachments').val(curentArray);

})
$(document).on('click','.delete-attached-file', function (e) {

    var current = $('#gallery_attachments').val();
    var id = $(this).attr('data-id');

    var curentArray =  current.split(',');

    curentArray.join(',');
    curentArray = $.grep(curentArray, function(value) {
        return value != id;
    });

    $('#gallery_attachments').val(curentArray);
    $(this).closest('.attached-image').parent().remove();
})