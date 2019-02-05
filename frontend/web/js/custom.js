
$(function(){

    let ww,lw,sl,uw,i,slLength,yy;
    let imgCaunt = $(".slide_li").length ;
    ww = $("#gallery_slider_wrp").width();


    if ( $(window).width() < 800 ) {
        lw = ww - 80;
        sl = 1;
        i = 0;
        slLength=imgCaunt;
        yy = ( $("#gallery_slider_wrp").width() -  lw ) / 2 + 2 ;
        uw=imgCaunt*(lw + yy*2+2);
    }
    else {
        lw = ww/3-80 ;
        sl=3;
        i=0;
        yy = ( $("#gallery_slider_wrp").width() - 3* lw ) / 6  ;
        // if ( imgCaunt > 6 ) {
        //     slLength = Math.ceil(imgCaunt / 2);
        //     uw = (Math.ceil(imgCaunt / 2)) * (lw + yy * 2 + 2);
        // }else {
            slLength = imgCaunt ;
            uw = imgCaunt  * (lw + yy * 2 + 2);
        // }


    }
    $(".slide_li").width(lw);
    $(".slide_li").css({
        "margin-left" : yy + 'px' ,
        "margin-right" : yy + 'px',
        "margin-bottom" : yy/2 + 'px',
        "margin-top" : yy/2 + 'px'
});
    $(".slide_li").height(lw*2/3);
    $(".slide_ul").width(uw);
    $(".slide_li img").width(lw);
    $(".slide_li img").height($(".slide_li").height());

    if (i == 0 ) $(".gal_btn_prev").stop(true,true).fadeOut();

    $(".gal_btn_next").click(function(){

        if( i < slLength - sl){
            $(".slide_ul").animate({"left": '-='+(lw + yy*2 + 1) +''});
            i+=1;
            if ( i > 0 ) $(".gal_btn_prev").stop(true,true).fadeIn();
            if ( i == slLength- sl) $(".gal_btn_next").stop(true,true).fadeOut();
        }
    });

    $(".gal_btn_prev").click(function(){
        if( i > 0 ){
            $(".slide_ul").animate({"left": '+='+(lw + yy*2 + 1) +''});
            i-=1;
            if (i == 0 ) $(".gal_btn_prev").stop(true,true).fadeOut();
            if (i < slLength- sl) $(".gal_btn_next").stop(true,true).fadeIn();
        }
    })
});