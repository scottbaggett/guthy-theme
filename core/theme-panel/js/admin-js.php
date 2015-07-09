<?php
/**
 * Theme panel JS
 *
 *
 * @package Milkit
 */

function milkit_panel_admin_js() {
	?>
	  
		<script type="text/javascript">
		jQuery( document ).ready( function( $ ) {
			"use strict";

			// admin nav
			$( '.options-group' ).hide();
			$( '.options-group:first' ).fadeIn();

			$( '#admin-nav li:first' ).addClass( 'current' );
			$( '#admin-nav li a' ).click(function( e ) {
			
				$( '#admin-nav li' ).removeClass( 'current' );
				$( this ).parent().addClass( 'current' );
				
				var group_section = $( this ).attr( 'href' );

				$( '.options-group' ).hide();
				
				$( group_section ).fadeIn();

				e.preventDefault();
				
			});

			// sub-sections
			$( '.subsection' ).hide();
			var subsectionHandler = $( '.subsection-handler' ).find( ':checkbox' );

			subsectionHandler.each( function() {
				var subsectionID = $( this ).attr( 'id' );
				var subsection = $( '.subsection-' + subsectionID + '_h' );
				if ( $( this ).is( ':checked' ) ) {
					subsection.slideDown();
				}
			});

			subsectionHandler.on( 'click', function() {
				var subsectionID = $( this ).attr( 'id' );
				var subsection = $( '.subsection-' + subsectionID + '_h' );
				if ( $( this ).is( ':checked' ) ) {
					subsection.slideDown();
				} else {
					subsection.slideUp();
				}
			});

			// radio-images
			$( '.opt-radio-img-img' ).click( function() {
				$( this ).parent().parent().find( '.opt-radio-img-img' ).removeClass( 'opt-radio-img-selected' );
				$( this ).addClass( 'opt-radio-img-selected' );
				
			});
			$( '.opt-radio-img-label' ).hide();
			$( '.opt-radio-img-img' ).show();
			$( '.opt-radio-img-radio' ).hide();

			// file upload button
			$( document ).on( 'click', 'input.upload-button', function( e ) {
				var this_id = $( this ).attr( 'id' );
				var upField = $( this ).prev().prev();
				var wField = $('#' + this_id + '_w');
				var hField = $('#' + this_id + '_h');
				var imgPreview = $( this ).next().next();
				var file_frame;

				e.preventDefault();
		 
				if ( file_frame ) {
					file_frame.open();
					return;
				}
		 
				file_frame = wp.media.frames.file_frame = wp.media({
					title: 'Choose an image',
					library: {
						type: 'image'
					},
					button: {
						text: 'Select this image',
					},
					multiple: false
				});
		 
				file_frame.on( 'select', function() {

					var file_path = '';
					var file_w = '';
					var file_h = '';
					var selection = file_frame.state().get( 'selection' );

					selection.map( function( attachment ) {

						attachment = attachment.toJSON();

						if ( attachment.url )
							file_path = attachment.url

						if ( attachment.width )
							file_w = attachment.width

						if ( attachment.height )
							file_h = attachment.height

						upField.val( file_path );
						wField.val( file_w );
						hField.val( file_h );
						imgPreview.addClass( 'has-image' );
						imgPreview.attr( 'src', file_path );

					} );

				});
		 
				file_frame.open();

			});

			// colorpicker
			$( '.opt-color' ).minicolors();

			// AJAX save
			$( '#admin-form' ).submit(function(){
				/*jshint unused: vars */
				function newValues() {
					var serializedValues = $( "#admin-form" ).serialize();
					return serializedValues;
				}
				$( ':checkbox, :radio' ).click( newValues );
				$( 'select' ).change( newValues );
				var serializedReturn = newValues();
				var ajax_url = '<?php echo esc_url( admin_url( "admin-ajax.php" ) ); ?>';
				var data = {
					<?php if ( isset( $_REQUEST[ 'page' ] ) && $_REQUEST[ 'page' ] == 'milkit-theme-panel' ){ ?>
					type: 'save_options',
					<?php } ?>
					action: 'milkit_save_theme_options',
					data: serializedReturn
				};
				
				$.post( ajax_url, data, function( response ) {
					var success = $( '#message-save' );
					success.fadeIn();
					window.setTimeout(function(){
						success.fadeOut();
					}, 2000 );
				});
				
				return false; 
				
			});

			// reset options
			if ( '<?php if ( isset ($_REQUEST[ 'reset' ] ) ) { echo $_REQUEST[ 'reset' ]; } else { echo 'false'; } ?>' === 'true' ) {
				
				var reset_popup = $( '#message-reset' );
				reset_popup.fadeIn();
				window.setTimeout(function(){
						reset_popup.fadeOut();
					}, 2000 );
			}

		});
		</script>

	<?php
}
