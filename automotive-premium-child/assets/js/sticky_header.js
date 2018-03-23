$(window).scroll(function() {

// alert($('#header_home_sticky').offsetTop);
if ($(this).scrollTop() >  $('#home_slider').outerHeight(true)){
    $height_offset= $('#header_home_sticky').outerHeight(true);
    document.getElementById("home_slider").style.marginTop = $height_offset+"px";

    $('#header_home_sticky').addClass("sticky-header");
    $('#header_home_sticky').addClass("sticky");


    // $sticky_width= $('#header_home_sticky').outerWidth(true);
    // $window_width=window.innerWidth;
    // $marging_left=($window_width-$sticky_width)/2;
    // document.getElementById("header_home_sticky").style.marginLeft = $marging_left+"px";
}
else{
    if  ($(this).scrollTop() <  ($('#home_slider').outerHeight(true)-$('#header_home_sticky').outerHeight(true))){
        $('#header_home_sticky').removeClass("sticky-header");
        $('#header_home_sticky').removeClass("sticky");
        document.getElementById("home_slider").style.marginTop = "0px";
    }
}
});
