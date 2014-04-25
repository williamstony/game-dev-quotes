<?php   
    /* 
    Plugin Name: Game Dev Quotes
    Plugin URI: http://www.tonyw.io/game-dev-quotes
    Description: A simple way to style game developer quotes as they are on the developers site.
    Author: TonyW
    Version: 1.4.0
    Author URI: http://www.tonyw.io
    
    */

// Bring in our styles from "quotestyle.css" so everything gets formatted correctly.
function nwxGameDevQuotesStyles(){
    wp_register_style ( 'game-dev-quotes-css',  plugins_url('quotestyle.css', __FILE__));

    wp_enqueue_style ( 'game-dev-quotes-css', plugins_url('quotestyle.css', __FILE__));
}

add_action( 'wp_enqueue_scripts', 'nwxGameDevQuotesStyles');
//process our "bluepost" shortcode
function nwxBluepost( $atts, $content = null ){
    if ( $atts['url'] != "" ) {
        $nwxgdqsrc = ' (<a href="' . $atts['url'] . '">source</a>)';
    }else {
        $nwxgdqsrc = "";
    }
    // Wrap everything in the colors we want. Pull out the "Name" attributed to the post and the content then display it.
    return '<div class="bluepost"><span style="color: #ffffff; font-weight: bold;">' . $atts['name'] . $nwxgdqsrc . '</span><span style="position: absolute; top:0; right:0; "><img src=" ' . plugins_url('imgs/blizz.gif', __FILE__) .'"></span> <p> ' . $content . '</p></div>';
}

add_shortcode('bluepost', 'nwxBluepost');

function nwxTorpost( $atts, $content = null ){
    if ( $atts['url'] != "" ) {
        $nwxgdqsrc = ' (<a href="' . $atts['url'] . '">source</a>)';
    }else {
        $nwxgdqsrc = "";
    }
    // Wrap everything in the colors we want. Pull out the "Name" attributed to the post and the content then display it.
    return '<div class="torpost"><span style="color:white; font-weight: bold;">' . $atts['name'] . $nwxgdqsrc . '</span><span style="position: absolute; top:0; right:0;"><img src=" ' . plugins_url('imgs/tordev.png', __FILE__) . '"></span> <p> ' . $content . '</p></div>';
}

add_shortcode('torpost', 'nwxTorpost');

function nwxPs2post( $atts, $content = null ){
    if ( $atts['url'] != "" ) {
        $nwxgdqsrc = ' (<a href="' . $atts['url'] . '">source</a>)';
    }else {
        $nwxgdqsrc = "";
    }
    // Wrap everything in the colors we want. Pull out the "Name" attributed to the post and the content then display it.
    return '<div class="ps2post"><span style="color:red; font-weight: bold;">' . $atts['name'] . $nwxgdqsrc . '</span><span style="position: absolute; top:0; right:0;"><img src=" ' . plugins_url('imgs/ps2dev.png', __FILE__) . '"></span> <p> ' . $content . '</p></div>';
}

add_shortcode('ps2post', 'nwxPs2post');

function nwxValvepost( $atts, $content = null ){
    if ( $atts['url'] != "" ) {
        $nwxgdqsrc = ' (<a href="' . $atts['url'] . '">source</a>)';
    }else {
        $nwxgdqsrc = "";
    }
    // Wrap everything in the colors we want. Pull out the "Name" attributed to the post and the content then display it.
    return '<div class="valvepost"><span style="color: #aedd08; font-weight: bold;">' . $atts['name'] . $nwxgdqsrc . '</span><span style="position: absolute; top:0; right:0;"><img src=" ' . plugins_url('imgs/valvedev.png', __FILE__) .'"></span> <p> ' . $content . '</p></div>';
}

add_shortcode('valvepost', 'nwxValvepost');

/* Adding support for TinyMCE button */
/*----------------------------*/

function nwxgdq_register_button( $buttons ) {
    // inserting a seperator between existing buttons and our new one
    array_push( $buttons, "|", "nwxgdq_button" );
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
        add_filter( "mce_external_plugins", "add_nwxgdq_plugin" );
        add_filter( 'mce_buttons', 'nwxgdq_register_button' );
    }
}

// init button control
add_action( 'init', 'nwxgdq_button' );

// adding our button to the bar
function add_nwxgdq_plugin( $nwxgdq_plugin_array ) {
    $nwxgdq_plugin_array[ 'nwxgdq_button' ] = plugins_url('nwxgdq_button.js', __FILE__);
    return $nwxgdq_plugin_array;
}