(function( $, sr ){
	"use strict";
	/*global jQuery */
	
	// smartresize function from Paul Irish
	// http://www.paulirish.com/2009/throttled-smartresize-jquery-event-handler/
	// debouncing function from John Hann
	// http://unscriptable.com/index.php/2009/03/20/debouncing-javascript-methods/
	var debounce = function ( func, threshold, execAsap ) {
	   var timeout;

	   return function debounced () {
			var obj = this, args = arguments;
			function delayed () {
				if ( !execAsap )
					func.apply( obj, args );
				timeout = null;
			}

			if ( timeout )
				clearTimeout( timeout );
			else if ( execAsap )
				func.apply( obj, args );

			timeout = setTimeout( delayed, threshold || 100 );
	   };
	};
	// smartresize 
	jQuery.fn[ sr ] = function( fn ){  return fn ? this.bind( 'resize', debounce( fn ) ) : this.trigger( sr ); };

})( jQuery, 'smartresize' );



(function( $ ) {

	"use strict";
	/*global jQuery */
	/*jslint bitwise: true */

	var MILKIT =  MILKIT || {};

	MILKIT.body = $( document.documentElement );

	/*---------------------------------------------*/
	/*	Window width/height check
	/*---------------------------------------------*/

	MILKIT.viewport = function() {

		var e = window,
		a = 'inner';
		if ( ! ( 'innerWidth' in window ) ) {
			a = 'client';
			e = document.documentElement || document.body;
		}
		return { width : e[ a + 'Width' ] , height : e[ a + 'Height' ] };
	};

	/*---------------------------------------------*/
	/*	Firefox check
	/*---------------------------------------------*/

	MILKIT.firefoxCheck = function() {

		var is_firefox = navigator.userAgent.toLowerCase().indexOf( 'firefox' ) > -1;
		if ( is_firefox ) {
			if ( document.documentElement.classList ) {
				document.documentElement.classList.add( 'firefox' );
			}
		}
	};

	/*---------------------------------------------*/
	/*	Logo Retina
	/*---------------------------------------------*/

	MILKIT.retina = function() {
		if ( $( '#retina-logo' ).length > 0 ) {
			var pixelRatio = !!window.devicePixelRatio ? window.devicePixelRatio : 1,
				desktopLogo = $( '#desktop-logo' ),
				retinaLogo = $( '#retina-logo' ),
				logoWidth = desktopLogo.width(),
				logoHeight = desktopLogo.height();
			if ( pixelRatio > 1 ) {
				retinaLogo.attr({ height: logoHeight, width: logoWidth });
				retinaLogo.css( 'display', 'inline-block' );
				desktopLogo.hide();
			}
		}
	};

	/*---------------------------------------------*/
	/*	Navigation Menu
	/*---------------------------------------------*/

	MILKIT.navigation = function() {

		var menu = $( document.getElementById( 'site-navigation' ) ),
			mobile_menu_toggle = $( document.getElementById( 'site-mobile-navigation-toggle' ) ),
			mobile_open = false,
			needsSuperfish = true;

		function initSuperfish() {
			menu.show();
			menu.find( '.megamenu' ).find( 'ul' ).addClass( 'sub-mega' );
			menu.find( '.sf-menu' ).superfish({
				popUpSelector: 'ul, .sf-mega, .megamenu',
				autoArrows: true,
				delay: 500,
				speed: 200,
				speedOut: 200,
				useClick: false
			});
			needsSuperfish = false;
		}

		function destroySuperfish() {
			menu.find( '.sf-menu' ).superfish( 'destroy' );
			needsSuperfish = true;
			menu.hide();
			mobile_open = false;
			mobile_menu_toggle[ 0 ].innerHTML = mobile_menu_toggle.data( 'open-text' );
		}

		mobile_menu_toggle.on( 'click', function( e ) {
			e.preventDefault();
			if ( mobile_open === false ) {
				menu.show();
				mobile_open = true;
				mobile_menu_toggle[ 0 ].innerHTML = mobile_menu_toggle.data( 'close-text' );
			} else {
				menu.hide();
				mobile_open = false;
				mobile_menu_toggle[ 0 ].innerHTML = mobile_menu_toggle.data( 'open-text' );
			}
		});

		if ( needsSuperfish && ( MILKIT.viewport().width >= 992 || MILKIT.body.hasClass( 'no-responsive' ) ) ) {
			initSuperfish();
		}

		$( window ).smartresize( function() {
			if ( needsSuperfish && ( MILKIT.viewport().width >= 992 || MILKIT.body.hasClass( 'no-responsive' ) ) ) {
				initSuperfish();
			} else if ( ! needsSuperfish && ( MILKIT.viewport().width < 992 ) ) {
				destroySuperfish();
			}
		});
	};

	/*---------------------------------------------*/
	/*	Mega Menu
	/*---------------------------------------------*/

	MILKIT.megaMenu = function() {

		var needsMega = true;

		function loadMegaMenuImages() {
			$( '.sf-menu' ).on( 'hover', '.megamenu-parent', function() {
				var wrap = $( this ).find( '.megamenu' );
				if ( ! wrap.hasClass( 'megamenu-loader' ) ) {
					var images = wrap.find( 'img' );
					wrap.addClass( 'megamenu-loader' );
					images.each( function() {
						var img = $( this ),
							src = img.data( 'src' ),
							width = img.data( 'width' ),
							height = img.data( 'height' );
						img.attr({
							src: src,
							width: width,
							height: height
						});
					});
				}
			});
			needsMega = false;
		}

		if ( needsMega && ( MILKIT.viewport().width >= 992 || MILKIT.body.hasClass( 'no-responsive' ) ) ) {
			loadMegaMenuImages();
		}

		$( window ).smartresize( function() {
			if ( needsMega && ( MILKIT.viewport().width >= 992 || MILKIT.body.hasClass( 'no-responsive' ) ) ) {
				loadMegaMenuImages();
			}
		});
	};

	/*---------------------------------------------*/
	/*	Sticky header
	/*---------------------------------------------*/

	MILKIT.sticky = function() {
		var header = $( document.getElementById( 'masthead' ) ),
			nav_height = $( document.getElementById( 'site-navigation' ) ),
			t = header.outerHeight() - nav_height.outerHeight();

		function addStickyClass() {
			if ( MILKIT.viewport().width >= 992 || MILKIT.body.hasClass( 'no-responsive' ) ) {
				var st = $( window ).scrollTop();
				if ( st > t ) {
					MILKIT.body.addClass( 'fixed-yes' );
				} else {
					MILKIT.body.removeClass( 'fixed-yes' );
				}
			} else {
				MILKIT.body.removeClass( 'fixed-yes' );
			}
		}

		addStickyClass();
		$( window ).scroll( addStickyClass );
		$( window ).smartresize( function() {
			addStickyClass();
		});
	};

	/*---------------------------------------------*/
	/* Init Functions
	/*---------------------------------------------*/

	$( document ).ready( function() {
		MILKIT.firefoxCheck();
		MILKIT.navigation();
		MILKIT.megaMenu();
		if ( MILKIT.body.hasClass( 'milkit-sticky-header-yes' ) ) {
			MILKIT.sticky();
		}
	});

	$( window ).load( function() {
		MILKIT.retina();
	});

})( jQuery );
