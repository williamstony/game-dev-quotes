<?php
/*
Plugin Name: Game Dev Quotes
Plugin URI: http://www.tonyw.io/game-dev-quotes
Description: A simple way to style game developer quotes as they are on the developers site.
Author: TonyW
Version: 1.6.0
Author URI: http://www.tonyw.io

*/

// Bring in our styles from "quotestyle.css" so everything gets formatted correctly.
function nwxgdq_styles() {
	wp_register_style( 'game-dev-quotes-css', plugins_url( 'assets/css/quotestyle.min.css', __FILE__ ) );

	wp_enqueue_style( 'game-dev-quotes-css', plugins_url( 'assets/css/quotestyle.min.css', __FILE__ ) );
}

add_action( 'wp_enqueue_scripts', 'nwxgdq_styles' );

//process our "bluepost" shortcode
function nwx_blue_post( $atts, $content = null ) {

	// Check for source URL. If filled out insert correct code, if not leave source link out.
	if ( isset( $atts['url'] ) && $atts['url'] != '' ) {

		if ( substr( $atts['url'], 0, 4 ) == 'http' ) {
			$nwxgdqsrc = ' - (<a href="' . $atts['url'] . '">source</a>)';
		} else {
			$nwxgdqsrc = ' - (<a href="http://' . $atts['url'] . '">source</a>)';
		}
	} else {

		$nwxgdqsrc = '';

	}

	// Wrap everything in the colors we want. Pull out the "Name" attributed to the post and the content then display it.
	return '<div class="bluepost"><span style="color: #ffffff; font-weight: bold;">' . $atts['name'] . $nwxgdqsrc . '</span><span style="position: absolute; top:0; right:0; "><img src=" ' . plugins_url( 'assets/img/blizz.gif', __FILE__ ) . '"></span> <p> ' . $content . '</p></div>';
}

add_shortcode( 'bluepost', 'nwx_blue_post' );

// Process our "torpost" shortcode
function nwx_tor_post( $atts, $content = null ) {

	// Check for source URL. If filled out insert correct code, if not leave source link out.
	if ( isset( $atts['url'] ) && $atts['url'] != '' ) {

		if ( substr( $atts['url'], 0, 4 ) == 'http' ) {
			$nwxgdqsrc = ' - (<a href="' . $atts['url'] . '">source</a>)';
		} else {
			$nwxgdqsrc = ' - (<a href="http://' . $atts['url'] . '">source</a>)';
		}
	} else {

		$nwxgdqsrc = '';

	}

	// Wrap everything in the colors we want. Pull out the "Name" attributed to the post and the content then display it.
	return '<div class="torpost"><span style="color:white; font-weight: bold;">' . $atts['name'] . $nwxgdqsrc . '</span><span style="position: absolute; top:0; right:0;"><img src=" ' . plugins_url( 'assets/img/tordev.png', __FILE__ ) . '"></span> <p> ' . $content . '</p></div>';
}

add_shortcode( 'torpost', 'nwx_tor_post' );

//Process our "ps2post" shortcode
function nwx_ps2_post( $atts, $content = null ) {

	// Check for source URL. If filled out insert correct code, if not leave source link out.
	if ( isset( $atts['url'] ) && $atts['url'] != '' ) {

		if ( substr( $atts['url'], 0, 4 ) == 'http' ) {
			$nwxgdqsrc = ' - (<a href="' . $atts['url'] . '">source</a>)';
		} else {
			$nwxgdqsrc = ' - (<a href="http://' . $atts['url'] . '">source</a>)';
		}
	} else {

		$nwxgdqsrc = '';

	}

	// Wrap everything in the colors we want. Pull out the "Name" attributed to the post and the content then display it.
	return '<div class="ps2post"><span style="color:red; font-weight: bold;">' . $atts['name'] . $nwxgdqsrc . '</span><span style="position: absolute; top:0; right:0;"><img src=" ' . plugins_url( 'assets/img/ps2dev.png', __FILE__ ) . '"></span> <p> ' . $content . '</p></div>';
}

add_shortcode( 'ps2post', 'nwx_ps2_post' );

//Process our "valvepost" shortcode
function nwx_valve_post( $atts, $content = null ) {

	// Check for source URL. If filled out insert correct code, if not leave source link out.
	if ( isset( $atts['url'] ) && $atts['url'] != '' ) {

		if ( substr( $atts['url'], 0, 4 ) == 'http' ) {
			$nwxgdqsrc = ' - (<a href="' . $atts['url'] . '">source</a>)';
		} else {
			$nwxgdqsrc = ' - (<a href="http://' . $atts['url'] . '">source</a>)';
		}
	} else {

		$nwxgdqsrc = '';

	}

	// Wrap everything in the colors we want. Pull out the "Name" attributed to the post and the content then display it.
	return '<div class="valvepost"><span style="color: #aedd08; font-weight: bold;">' . $atts['name'] . $nwxgdqsrc . '</span><span style="position: absolute; top:0; right:0;"><img src=" ' . plugins_url( 'assets/img/valvedev.png', __FILE__ ) . '"></span> <p> ' . $content . '</p></div>';
}

add_shortcode( 'valvepost', 'nwx_valve_post' );

//Process our "aapost" shortcode
function gdq_aa_post( $atts, $content = null ) {


	// Check for source URL. If filled out insert correct code, if not leave source link out.
	if ( isset( $atts['url'] ) && $atts['url'] != '' ) {

		if ( substr( $atts['url'], 0, 4 ) == 'http' ) {
			$nwxgdqsrc = ' - (<a href="' . $atts['url'] . '">source</a>)';
		} else {
			$nwxgdqsrc = ' - (<a href="http://' . $atts['url'] . '">source</a>)';
		}
	} else {

		$nwxgdqsrc = '';

	}

	// Wrap everything in the colors we want. Pull out the "Name" attributed to the post and the content then display it.
	return '<div class="aapost"><span style="color: #FFF; font-weight: bold; padding-right: 30px; border-bottom: 1px solid #15911D; padding-bottom: 2px;">' . $atts['name'] . $nwxgdqsrc . '</span><span style="position: absolute; top:2px; right:2px; width:35px; height:35px;"><img src=" ' . plugins_url( 'assets/img/aalogo.png', __FILE__ ) . '"></span> <p> ' . $content . ' </p></div>';

}

add_shortcode( 'aapost', 'gdq_aa_post' );

/* Adding support for TinyMCE button */
/*----------------------------*/

function nwxgdq_register_button( $buttons ) {
	// inserting a seperator between existing buttons and our new one
	array_push( $buttons, '|', 'nwxgdq_button' );
	return $buttons;
}

/* Add our button to tinyMCE */
/*----------------------*/

function nwxgdq_button() {
	// Skip if user doesn't have permission
	if ( ! current_user_can( 'edit_posts' ) && ! current_user_can( 'edit_pages' ) ){
		return;
	}

	// Add in rich editor mode
	if ( get_user_option( 'rich_editing' ) == 'true' ) {
		add_filter( 'mce_external_plugins', 'add_nwxgdq_plugin' );
		add_filter( 'mce_buttons', 'nwxgdq_register_button' );
	}
}

// init button control
add_action( 'init', 'nwxgdq_button' );

// adding our button to the bar
function add_nwxgdq_plugin( $nwxgdq_plugin_array ) { ?>
	<script type="text/javascript">
		var plugins_url = '<?php echo esc_html( plugins_url() ); ?>';
	</script>
	<?php
	$nwxgdq_plugin_array[ 'nwxgdq_button' ] = plugins_url( 'assets/js/nwxgdq_button.min.js', __FILE__ );
	return $nwxgdq_plugin_array;
}
