$(window).scroll(function() {

//Transform the header into sticky when it is at the top of the screen.
//Undo the transformation when the user scrolls above the initial position of the header
if ($(this).scrollTop() >  $('#home_slider').outerHeight(true)){
    //All the rest has to be moved when the header becomes sticky.
    //Otherwize it gives impression that all the website goes up.
    $height_offset= $('#header_home_sticky').outerHeight(true);
    document.getElementById("home_slider").style.marginTop = $height_offset+"px";

    $('#header_home_sticky').addClass("sticky-header");
    $('#header_home_sticky').addClass("sticky");

}
else{
    if  ($(this).scrollTop() <  ($('#home_slider').outerHeight(true)-$('#header_home_sticky').outerHeight(true))){
        $('#header_home_sticky').removeClass("sticky-header");
        $('#header_home_sticky').removeClass("sticky");
        document.getElementById("home_slider").style.marginTop = "0px";
    }
}
});
