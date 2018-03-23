jQuery(document).ready(function(){
$(window).resize(function() {
    if ($(window).width() < 768) {
      $(".dropdown-toggle").attr('data-toggle', 'dropdown');
    } else {
      $(".dropdown-toggle").removeAttr('data-toggle dropdown');
    }
  });
$('a.item').colorbox({ opacity:0.7 , rel:'gal1' ,maxWidth:'85%', maxHeight:'85%'});
		if (window.matchMedia) {
			width700Check = window.matchMedia("(max-width: 700px)");
			if (width700Check.matches){
				$.colorbox.remove();
				$("a.item").removeAttr("href");
				$('span[class^="lupa"]').remove();
			}
    }
$('form[data-async]').on('submit', function(event) {
        var $form = $(this);
        var $target = $($form.attr('data-target'));

        $.ajax({
            type: $form.attr('method'),
            url: $form.attr('action'),
            data: $form.serialize(),

            success: function(data, status) {
                $target.modal('hide');
            }
        });

        event.preventDefault();
    });	

$(function(){
    $('.navbar .navbar-collapse').on('show.bs.collapse', function(e) {
        $('.navbar .navbar-collapse').not(this).collapse('hide');
    });
});
$("#form_nor").prependTo('.navbar-search');
$(checkWidth);
$(window).resize(checkWidth).trigger('resize');

function checkWidth()
{
    var window_width = $(window).width();

    if(window_width > 768)
    {
	 $(".info-single").prependTo('.single-sidebar');
	
	
    } 
    else 
    {
         // $("#form_nor").prependTo('#searchbar');
         $(".info-single").prependTo('#myTabs-accordion');
    }
    
    
}

	$('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
		localStorage.setItem('activeTab', $(e.target).attr('href'));
	});
	var activeTab = localStorage.getItem('activeTab');
	if(activeTab){
		$('#myTabs a[href="' + activeTab + '"]').tab('show');
	}

	
$('#myCarousel').bcSwipe({ threshold: 50 });
	

	$('#myTabs').tabCollapse();
	 $("#my-thumbs-list").mThumbnailScroller({
              axis:"x",
              type:"hover-80"
            });
	$("#contactForm").validate();
	$('.refine-nav>li.first').addClass('active');
	$('.refine-nav>li.second ul').slideUp(1000);
	$('.refine-nav>li.third ul').slideUp(1000);
	$('.refine-nav>li.fourth ul').slideUp(1000);
	$('.refine-nav>li span').click(function(){
		var parent = $(this).parent('li');
		if(parent.hasClass('active'))
		{
			if(parent.find('ul').hasClass('expanded')) 
			{
				parent.find('ul').slideUp(500).removeClass('expanded');
				parent.removeClass('active');
			}
			else
			{
				parent.find('ul').slideDown(500).addClass('expanded');
			}
		}
		else
		{	
	  		$('.refine-nav li.active').find('ul').slideUp(500).removeClass('expanded');
			$('.refine-nav li.active').removeClass('active');
	  		parent.addClass('active');
	  		parent.find('ul').slideDown(500).addClass('expanded');
		}
	});
	$('img').each(function(){ 
		$(this).removeAttr('width')
		$(this).removeAttr('height');
	});	
	
 	$(".advSearch select").selectBox();
 	$("#g295-condition").selectBox();
 	$("#g295-year").selectBox();
 	$("#g295-purchasetype").selectBox();
    $(".carousel-indicators li:first").addClass("active");
    $(".carousel-inner .item:first").addClass("active");
    $('#monitor').html($(window).width());

$(window).resize(function() {
    var viewportWidth = $(window).width();
    $('#monitor').html(viewportWidth);
});
$(window).resize(function() {
    var viewportHeight = $(window).height();
    $('#monitorh').html(viewportHeight);
});
});
