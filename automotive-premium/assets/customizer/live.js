( function( $ ) {
	wp.customize( 'blogname', function( value ) {
		value.bind( function( newval ) {
			$( '.site-title a' ).html( newval );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( newval ) {
			$( '.site-description' ).html( newval );
		} );
	} );
	wp.customize( 'logo_text_color', function( value ) {
		value.bind( function( newval ) {
			$('.site-title a,.site-description').css('color', newval );
		} );
	} );
		wp.customize( 'background_color', function( value ) {
		value.bind( function( newval ) {
			$('.container-fluid').css('background-color', newval );
		} );
	} );
	wp.customize( 'widgets_background_color', function( value ) {
		value.bind( function( newval ) {
			$('.arrivals-details').css('background-color', newval );
		} );
	} );
	wp.customize( 'text_color', function( value ) {
		value.bind( function( newval ) {
			$('.side-widget').css('color', newval );
		} );
	} );
	wp.customize( 'text_color', function( value ) {
		value.bind( function( newval ) {
			$('.side-widget a').css('color', newval );
		} );
	} );
	wp.customize( 'text_color', function( value ) {
		value.bind( function( newval ) {
			$('.side-widget ul li a').css('color', newval );
		} );
	} );
	wp.customize( 'text_color', function( value ) {
		value.bind( function( newval ) {
			$('.features-list li').css('color', newval );
		} );
	} );
	wp.customize( 'text_color', function( value ) {
		value.bind( function( newval ) {
			$('.nav.nav-tabs li a').css('color', newval );
		} );
	} );
	wp.customize( 'text_color', function( value ) {
		value.bind( function( newval ) {
			$('.nav.nav-tabs li.active a').css('color', newval );
		} );
	} );
	wp.customize( 'background_color', function( value ) {
		value.bind( function( newval ) {
			$('body').css('background-color', newval );
		} );
	} );
	wp.customize( 'arrivals_background_color', function( value ) {
		value.bind( function( newval ) {
			$('.arrivals-details').css('background-color', newval );
		} );
	} );
	wp.customize( 'find_by_type', function( value ) {
		value.bind( function( newval ) {
			$('.container-fluid-types').css('background-color', newval );
		} );
	} );	
	wp.customize( 'content_header', function( value ) {
		value.bind( function( newval ) {
			$('.container-fluid-header').css('background-color', newval );
		} );
	} );
	wp.customize( 'text_color', function( value ) {
		value.bind( function( newval ) {
			$('.vehicle-name').css('color', newval);
		} );
	} );
	wp.customize( 'text_color', function( value ) {
		value.bind( function( newval ) {
			$('.meta-style').css('color', newval);
		} );
	} );
	wp.customize( 'text_color', function( value ) {
		value.bind( function( newval ) {
			$('.grid-location').css('color', newval);
		} );
	} );
	wp.customize( 'text_color', function( value ) {
		value.bind( function( newval ) {
			$('.cars-list li a').css('color', newval);
		} );
	} );
	wp.customize( 'menu_background', function( value ) {
		value.bind( function( newval ) {
			$('nav#menu').css('background', newval );
		} );
	} );
	wp.customize( 'menu_text_color', function( value ) {
		value.bind( function( newval ) {
			$('.nav.navbar-nav li a').css('color', newval );
		} );
	} );
	wp.customize( 'widgets_color', function( value ) {
		value.bind( function( newval ) {
			$('.find-wrapper').css('background', newval );
		} );
	} );
	wp.customize( 'border_widgets_color', function( value ) {
		value.bind( function( newval ) {
			$('.find-wrapper').css('border-color', newval);
		} );
	} );
		wp.customize( 'widgets_color', function( value ) {
		value.bind( function( newval ) {
			$('.tricol-product-list .item-container').css('background', newval);
		} );
	} );
	wp.customize( 'border_widgets_color', function( value ) {
		value.bind( function( newval ) {
			$('.tricol-product-list .item-container').css('border-color',newval);
		} );
	} );
	wp.customize( 'background_color', function( value ) {
		value.bind( function( newval ) {
			$('.tricol-product-list .item-container:hover').css('background',newval);
		} );
	} );
	wp.customize( 'border_widgets_color', function( value ) {
		value.bind( function( newval ) {
			$('.tricol-product-list .item-container:hover').css('border-color',newval);
		} );
	} );
	wp.customize( 'border_widgets_color', function( value ) {
		value.bind( function( newval ) {
			$('.welcome').css('border-color',newval);
		} );
	} );

		wp.customize( 'headers_color', function( value ) {
		value.bind( function( newval ) {
			$('.container-fluid.footer h3').css('background-color', newval);
		} );
	} );
	wp.customize( 'headers_color', function( value ) {
		value.bind( function( newval ) {
			$('.side-widget h3').css('background', newval);
		} );
	} );
	wp.customize( 'headers_color', function( value ) {
		value.bind( function( newval ) {
			$('#footer h3').css('background-color', newval);
		} );
	} );
	wp.customize( 'headers_text_color', function( value ) {
		value.bind( function( newval ) {
			$('.side-widget h3').css('color', newval );
		} );
	} );
	wp.customize( 'headers_text_color', function( value ) {
		value.bind( function( newval ) {
			$('.side-widget h3 a').css('color', newval );
		} );
	} );
	wp.customize( 'search_text_color', function( value ) {
		value.bind( function( newval ) {
			$('.selectBox-dropdown .selectBox-label').css('color', newval );
		} );
	} );
	wp.customize( 'search_background_color', function( value ) {
		value.bind( function( newval ) {
			$('.selectBox-dropdown').css('background', newval );
		} );
	} );
	wp.customize( 'border_widgets_color', function( value ) {
		value.bind( function( newval ) {
			$('.selectBox-dropdown').css('border-color', newval);
		} );
	} );
	wp.customize( 'border_widgets_color', function( value ) {
		value.bind( function( newval ) {
			$('.selectBox-dropdown .selectBox-arrow').css('border-left-color', newval);
		} );
	} );
	wp.customize( 'text_color', function( value ) {
		value.bind( function( newval ) {
			$('.grid-location').css('color', newval);
		} );
	} );
	wp.customize( 'text_color', function( value ) {
		value.bind( function( newval ) {
			$('.quick-glance li').css('color', newval);
		} );
	} );
	wp.customize( 'text_color', function( value ) {
		value.bind( function( newval ) {
			$('.specs').css('color', newval);
		} );
	} );
	wp.customize( 'text_color', function( value ) {
		value.bind( function( newval ) {
			$('.refine-nav li').css('color', newval);
		} );
	} );
	wp.customize( 'text_color', function( value ) {
		value.bind( function( newval ) {
			$('.refine-nav li p.strong').css('color', newval);
		} );
	} );
	wp.customize( 'text_color', function( value ) {
		value.bind( function( newval ) {
			$('.refine-nav li ul li').css('color', newval);
		} );
	} );
	wp.customize( 'widgets_background_color', function( value ) {
		value.bind( function( newval ) {
			$('.title').css('background-color', newval);
		} );
	} );
	wp.customize( 'widgets_background_color', function( value ) {
		value.bind( function( newval ) {
			$('.quick-list').css('background-color', newval);
		} );
	} );
	wp.customize( 'widgets_background_color', function( value ) {
		value.bind( function( newval ) {
			$('.specs').css('background-color', newval);
		} );
	} );
	wp.customize( 'widgets_background_color', function( value ) {
		value.bind( function( newval ) {
			$('.nav.nav-tabs li a').css('background-color', newval);
		} );
	} );
	wp.customize( 'widgets_background_color', function( value ) {
		value.bind( function( newval ) {
			$('.nav.nav-tabs li.active a').css('background-color', newval);
		} );
	} );
	wp.customize( 'widgets_background_color', function( value ) {
		value.bind( function( newval ) {
			$('.overview').css('background-color', newval);
		} );
	} );
	wp.customize( 'widgets_background_color', function( value ) {
		value.bind( function( newval ) {
			$('.features').css('background-color', newval);
		} );
	} );
	wp.customize( 'widgets_background_color', function( value ) {
		value.bind( function( newval ) {
			$('#video').css('background-color', newval);
		} );
	} );
	wp.customize( 'widgets_background_color', function( value ) {
		value.bind( function( newval ) {
			$('#contact').css('background-color', newval);
		} );
	} );
	wp.customize( 'widgets_background_color', function( value ) {
		value.bind( function( newval ) {
			$('h3.price-single').css('background-color', newval);
		} );
	} );
	wp.customize( 'widgets_background_color', function( value ) {
		value.bind( function( newval ) {
			$('h3.price-single').css('background-color', newval);
		} );
	} );
	wp.customize( 'widgets_background_color', function( value ) {
		value.bind( function( newval ) {
			$('.find-wrapper').css('background-color', newval);
		} );
	} );
	wp.customize( 'buttons_background_color', function( value ) {
		value.bind( function( newval ) {
			$('.form-button').css('background-color', newval);
		} );
	} );
	wp.customize( 'buttons_background_color', function( value ) {
		value.bind( function( newval ) {
			$('.search-button').css('background-color', newval);
		} );
	} );
	wp.customize( 'buttons_background_color', function( value ) {
		value.bind( function( newval ) {
			$('.detail-btn').css('background-color', newval);
		} );
	} );
	wp.customize( 'text_color', function( value ) {
		value.bind( function( newval ) {
			$('.btn-lg.offer').css('color', newval);
		} );
	} );
	wp.customize( 'widgets_background_color', function( value ) {
		value.bind( function( newval ) {
			$('.arrivals-details').css('background', newval );
		} );
	} );
	wp.customize( 'blog_title_color', function( value ) {
		value.bind( function( newval ) {
			$('.blog-post h1 a, a.more-link').css('color', newval );
		} );
	} );
	wp.customize( 'blog_title_color_hover', function( value ) {
		value.bind( function( newval ) {
			$('.blog-post h1 a:hover, a.more-link:hover').css('color', newval );
		} );
	} );
		wp.customize( 'search_color_hover', function( value ) {
		value.bind( function( newval ) {
			$('.selectBox.dropdown .selectBox-label:hover').css('color', newval );
		} );
	} ); 
	wp.customize( 'widgets_background_color', function( value ) {
		value.bind( function( newval ) {
			$('.side-widget').css('background-color', newval );
		} );
	} );
} )( jQuery );
