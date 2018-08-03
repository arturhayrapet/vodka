$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });



    $(document).on('click', '.modal-cover', function(){
        if($(this).hasClass('tour-cover')){
            $('.tour-cover').removeClass('bordered');
        }
        if($(this).hasClass('tour-banner')){
            $('.tour-banner').removeClass('bordered');
        }
        $(this).toggleClass('bordered')
        var data = '';
        $('.tour-attachments.bordered').each(function () {
            data+=$(this).data('id')+',';
        })

        $('#banner-class').val($('.tour-banner.bordered').data('id'))
        $('#cover-class').val($('.tour-cover.bordered').data('id'))
        $('#attachments-class').val(data)
    });

    $(document).on('change', '#menu-types', function(){
        var val = $(this).val();
        var container = $('#menu-type');
        var data = {'category': ''};

        if(val === 'page'){
            data.category = val;
            $.ajax({
                'url': 'get-category',
                'type': 'post',
                'data': data,
                success: function(response){
                    container.html(response);
                }
            });
        }else if(val === 'post'){
            data.category = val;
            $.ajax({
                'url': 'get-category',
                'type': 'post',
                'data': data,
                success: function(response){
                    container.html(response);
                }
            });
        }else if(val === 'category'){
            data.category = val;
            $.ajax({
                'url': 'get-category',
                'type': 'post',
                'data': data,
                success: function(response){
                    container.html(response);
                }
            });
        }
    });


    // $('#tour-form').yiiActiveForm('validateAttribute', 'price');
});