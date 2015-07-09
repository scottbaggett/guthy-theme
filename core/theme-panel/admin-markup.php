<?php
/**
 * Theme panel markup
 *
 *
 * @package Milkit
 */

/**
 * Theme panel markup.
 */
function milkit_panel_admin_markup() {

	$options = get_option( 'milkit_template_opt' ); ?>

	<div class="wrap" id="wrap-admin">
		<div id="message-save" class="popup-message">
			<div class="popup-save"><i class="fa fa-check"></i><span><?php _e( 'Options updated', 'milkit' ); ?></span></div>
		</div>
		<div id="message-reset" class="popup-message">
			<div class="popup-reset"><i class="fa fa-check"></i><span><?php _e( 'Options resetted', 'milkit' ); ?></span></div>
		</div>
		<form enctype="multipart/form-data" id="admin-form" action="<?php echo esc_url( admin_url() ); ?>themes.php?page=milkit-theme-panel">
			<div id="header">
				<div id="banner"><h1><i class="fa fa-gear"></i><?php _e( 'Theme Options', 'milkit' ); ?></h1></div>
			</div>
			<?php 
			$return = milkit_panel_admin_cases( $options );
			?>
			<div id="main">
				<div id="admin-nav">
					<ul>
						<?php echo $return[ 1 ]; ?>
					</ul>
				</div>
				<div id="content">
					<?php echo $return[ 0 ]; ?>
				</div>
			</div>
			<div class="admin-footer">
				<input type="submit" value="<?php _e( 'Save All Changes', 'milkit' ); ?>" class="save-button">
			</div>
		</form>
		<form method="post" style="display:inline" id="admin-reset" action="<?php echo esc_url( admin_url() ); ?>themes.php?page=milkit-theme-panel">
			<span class="submit-footer-reset">
				<input name="reset" type="submit" value="<?php _e( 'Reset Options', 'milkit' ); ?>" class="submit-button reset-button" onclick="return confirm('<?php _e( 'Click OK to reset. Any settings will be lost!', 'milkit' ); ?>');">
				<input type="hidden" name="milkit_save_themeoptions" value="reset">
			</span>
		</form>
		<div id="js-admin-warning"><span><?php _e( 'Please enable Javascript to use this panel', 'milkit' ); ?></span></div>
	</div>

	<?php
}

/**
 * Theme panel utility cases (the output of each field).
 */
function milkit_panel_admin_cases( $options ) {

   $counter = 0;
	$menu = '';
	$output = '';
	foreach ( $options as $value ) {
	   
		$counter++;
		$val = '';

		if ( $value[ 'type' ] == 'section-description' ) {
			$output .= '<div class="section section-' . esc_attr( $value[ 'type' ] ) . '">' . "\n";
			$output .= '<div class="option">' . "\n" . '<div class="command">' . "\n";
		} elseif ( $value[ 'type' ] == 'subsection-open' ) {
			$output .= '<div class="subsection subsection-' . esc_attr( $value[ 'id' ] ) . '">' . "\n";
		} elseif ( $value[ 'type' ] == 'subsection-close' ) {
			$output .= '</div>' . "\n";
		} elseif ( $value[ 'type' ] != 'heading' ) {
		 	$class = ''; 

		 	if ( isset ( $value[ 'class' ] ) ) {
		 		$class = $value[ 'class' ];
		 	}

			$output .= '<div class="section section-' . esc_attr( $value[ 'type' ] ) . ' ' . esc_attr( $class ) . '">' . "\n";
			$output .= '<h3 class="heading">' . esc_html( $value[ 'name' ] ) . '</h3>' . "\n";
			$output .= '<div class="option">' . "\n" . '<div class="command">' . "\n";
		}

		$select_value = ''; 

		switch ( $value [ 'type' ] ) {

			case 'section-description':
			
				$output .= '<div class="section-description"><p><i class="fa fa-caret-down"></i>' . esc_html( $value[ 'message' ] ) . '</p></div>';
				
				break;
			
			case 'text':
				$val = $value[ 'std' ];
				$std = get_option( $value[ 'id' ] );

				if ( $std != "" ) { 
					$val = $std; 
				}

				$output .= '<input class="opt-input" name="' . esc_attr( $value[ 'id' ] ) . '" id="' . esc_attr( $value[ 'id' ] ) . '" type="' . esc_attr( $value[ 'type' ] ) . '" value="' . stripslashes( htmlspecialchars( $val ) ) . '">';		
				break;

			case 'hidden':
				$val = $value[ 'std' ];
				$std = get_option( $value[ 'id' ] );

				if ( $std != "" ) { 
					$val = $std; 
				}

				$output .= '<input class="opt-input" name="' . esc_attr( $value[ 'id' ] ) . '" id="' . esc_attr( $value[ 'id' ] ) . '" type="' . esc_attr( $value[ 'type' ] ) . '" value="' . stripslashes( htmlspecialchars( $val ) ) . '">';		
				break;

			case 'textarea':
				
				$textarea_value = '';
				
				if ( isset ( $value[ 'std' ] ) ) {
					$textarea_value = $value[ 'std' ]; 
				}

				$std = get_option( $value[ 'id' ] );
				
				if ( $std != "" ) { 
					$textarea_value = stripslashes( $std ); 
				}

				$output .= '<textarea class="opt-input" name="' . esc_attr( $value[ 'id' ] ) . '" id="' . esc_attr( $value[ 'id' ] ) . '" cols="46" rows="10">' . $textarea_value . '</textarea>';
				
				break;

			case 'textarea-css':
				
				$textarea_value = '';
				
				if ( isset( $value[ 'std' ] ) ) {
					$textarea_value = $value[ 'std' ]; 
				}

				$std = get_option( $value[ 'id' ] );
				
				if ( $std != "" ) { 
					$textarea_value = stripslashes( $std ); 
				}

				$output .= '<textarea class="opt-input" name="' . esc_attr( $value[ 'id' ] ) . '" id="' . esc_attr( $value[ 'id' ] ) . '" cols="46" rows="20">' . stripslashes( htmlspecialchars( $textarea_value ) ) . '</textarea>';
				
				break;
			
			case 'select':

				$output .= '<select class="opt-input" name="' . esc_attr( $value[ 'id' ] ) . '" id="' . esc_attr( $value[ 'id' ] ) . '">';
				$select_value = get_option( $value[ 'id' ] );
				 
				foreach ( $value[ 'options' ] as $option ) {
					
					$selected = '';
					
					if ( $select_value != '' ) {
						if ( $select_value == $option ) { 
							$selected = ' selected="selected"';
						} 
				   } else {
						if ( isset( $value[ 'std' ] ) ) {
							if ( $value[ 'std' ] == $option ) {
								$selected = ' selected="selected"';
							}
						}
					}
					  
					$output .= '<option' . $selected . '>';
					$output .= $option;
					$output .= '</option>';
				 
				} 
				$output .= '</select>';
		
				break;

			case 'font-select':

				$output .= '<select class="opt-input" name="' . esc_attr( $value[ 'id' ] ) . '" id="' . esc_attr( $value[ 'id' ] ) . '">';
				$output .= '<option disabled>Standard Fonts</option>';
				$select_value = get_option( $value[ 'id' ] );
				 
				foreach ( $value[ 'options-web' ] as $option ) {
					
					$selected = '';
					
					if ( $select_value != '' ) {
						if ( $select_value == $option ) { 
							$selected = ' selected="selected"';
						} 
					} else {
						if ( isset( $value[ 'std' ] ) ) {
							if ( $value[ 'std' ] == $option ) { 
						 		$selected = ' selected="selected"'; 
						 	}
						}
					}

					$output .= '<option' . $selected . '>';
					$output .= $option;
					$output .= '</option>';
				 
				} 

				$output .= '<option disabled>Google Fonts</option>';

				foreach ( $value[ 'options-google' ] as $option ) {
					
					$selected = '';
					
					if ( $select_value != '' ) {
						if ( $select_value == $option ) { 
							$selected = ' selected="selected"';
						} 
				   } else {
						if ( isset ( $value[ 'std' ] ) ) {
							if ( $value[ 'std' ] == $option ) { 
								$selected = ' selected="selected"'; 
							}
						}
					}
					  
					$output .= '<option' . $selected . '>';
					$output .= $option;
					$output .= '</option>';
				 
				}

				$output .= '</select>';

				break;

			case 'radio-images':

				$i = 0;
				$select_value = get_option( $value[ 'id' ] );
					   
				foreach ( $value[ 'options' ] as $key => $option ) { 

				 	$i++;

					$checked = '';
					$selected = '';

					if ( $select_value != '' ) {
						if ( $select_value == $key ) { 
							$checked = ' checked';
							$selected = 'opt-radio-img-selected'; 
						} 
					} 

					else {
						if ( $value[ 'std' ] == $key ) { 
							$checked = ' checked'; 
							$selected = 'opt-radio-img-selected'; 
						}
						elseif ( $i == 1  && ! isset ( $select_value ) ) { 
							$checked = ' checked'; 
							$selected = 'opt-radio-img-selected'; 
						}
						elseif ( $i == 1  && $value[ 'std' ] == '' ) { 
							$checked = ' checked'; 
							$selected = 'opt-radio-img-selected'; 
						}
						else { 
							$checked = ''; 
						}
					}	
					
					$output .= '<div class="opt-radio-images-wrap">';
					$output .= '<input type="radio" id="opt-radio-img-' . esc_attr( $value[ 'id' ] ) . esc_attr( $i ) . '" class="checkbox opt-radio-img-radio" value="' . esc_attr( $key ) . '" name="' . esc_attr( $value[ 'id' ] ) . '" ' . esc_attr( $checked ) . '>';
					$output .= '<div class="opt-radio-img-label">' . esc_html( $key ) . '</div>';
					$output .= '<img src="' . esc_url( $option ) . '" alt="" class="opt-radio-img-img ' . esc_attr( $selected ) . '" onClick="document.getElementById(\'opt-radio-img-' . esc_attr( $value[ 'id' ] ) . esc_attr( $i ) . '\').checked = true;">';
					$output .= '</div>';
					
				}

				break;

			case 'radio':
				
				$select_value = get_option( $value[ 'id' ] );
					   
				foreach ( $value[ 'options' ] as $key => $option ) { 

					$checked = '';

					if ( $select_value != '' ) {
						if ( $select_value == $key ) { 
							$checked = ' checked'; 
						} 
					} else {
						if ( $value[ 'std' ] == $key ) { 
							$checked = ' checked'; 
						}
					}

					$output .= '<input class="opt-input opt-radio" type="radio" name="' . esc_attr( $value[ 'id' ] ) . '" value="' . esc_attr( $key ) . '" ' . esc_attr( $checked ) . '>' . esc_html( $option ) . '<br>';
				}
				 
				break;

			case 'checkbox': 
			
				$std = $value[ 'std' ];  
			   
				$saved_std = get_option( $value[ 'id' ] );
			   
				$checked = '';
				
				if ( ! empty ( $saved_std ) ) {
					if ( $saved_std == 'true' ) {
						$checked = 'checked="checked"';
					} else {
					   $checked = '';
					}
				} elseif ( $std == 'true' ) {
				   $checked = 'checked="checked"';
				} else {
					$checked = '';
				}

				$output .= '<input type="checkbox" class="checkbox opt-input" name="' . esc_attr( $value[ 'id' ] ) . '" id="' . esc_attr( $value[ 'id' ] ) . '" value="true" ' . esc_attr( $checked ) . '>';

				break;

			case 'upload':
				
				$val = $value[ 'std' ];
				$std = get_option( $value[ 'id' ] );

				if ( $std != "" ) { 
					$val = $std; 
				}

				$output .= '<input class="opt-input" name="' . esc_attr( $value[ 'id' ] ) . '" id="' . esc_attr( $value[ 'id' ] ) . '" type="text" value="' . esc_attr( $val ) . '">';

				$output .= '<div class="clear"></div>' . "\n";

				$output .= '<input type="button" class="upload-button" name="' . esc_attr( $value[ 'id' ] ) . '" id="' . esc_attr( $value[ 'id' ] ) . '"value="Upload">';

				$output .= '<div class="clear"></div>' . "\n";

				$output .= '<img class="opt-option-image" id="image_' . esc_attr( $value[ 'id' ] ) . '" src="' . esc_url( $val ) . '" alt="">';	
				
				break;

			case 'color':

				$val = $value[ 'std' ];
				$stored  = get_option( $value[ 'id' ] );
				
				if ( $stored != "" ) { 
					$val = $stored; 
				}

				$output .= '<input class="opt-color" name="' . esc_attr( $value[ 'id' ] ) . '" id="' . esc_attr( $value[ 'id' ] ) . '" type="text" value="' . esc_attr( $val ) . '">';

				break;                                     
			
			case 'heading':
				
				if ( $counter >= 2 ) {
				   $output .= '</div>' . "\n";
				}

				$jquery_click_hook = preg_replace( "/[^A-Za-z0-9]/", "", strtolower( $value[ 'name' ] ) );
				$jquery_click_hook = "opt-option-" . $jquery_click_hook;
				$menu .= '<li><a title="' . esc_attr( $value[ 'name' ] ) . '" href="#' . esc_attr( $jquery_click_hook ) .'"><i class="' . esc_attr( $value[ 'icon' ] ) . '"></i><span>' . esc_attr( $value[ 'name' ] ) . '</span></a></li>';
				$output .= '<div class="options-group" id="' . esc_attr( $jquery_click_hook ) . '"><h2><i class="' . esc_attr( $value[ 'icon' ] ) . '"></i>' . esc_attr( $value[ 'name' ] ) . '</h2>' . "\n";

				break;                                  
		} 

		if ( $value[ 'type' ] != 'heading' && $value[ 'type' ] != 'subsection-open' && $value[ 'type' ] != 'subsection-close' ) { 
			if ( $value[ 'type' ] != 'checkbox' ) { 
				$output .= '<br>';
			}
			if ( ! isset ( $value[ 'desc' ] ) ) { 
				$explain_value = ''; 
			} else { 
				$explain_value = $value[ 'desc' ]; 
			}

			$output .= '</div><div class="explain">' . $explain_value . '</div>' . "\n";
			$output .= '</div></div>' . "\n";
		}
	   
	}

	$output .= '</div>';
	return array( $output, $menu );

}
