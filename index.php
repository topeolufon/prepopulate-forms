<?php
/**
* Plugin Name: X Prepop
* Description: Prepopulate fields with pre collected data.
* Version: 1.0.0
* Author: Tope Olufon
* Author URI: https://topeolufon.com
* License: MIT
*/
function plugin_scripts() {
    wp_enqueue_script( 'cookie',  plugins_url('js.cookie.js',__FILE__ ));
    wp_enqueue_script( 'main',  plugins_url('main.js',__FILE__ ), array('jquery'), true );
}
add_action( 'wp_enqueue_scripts', 'plugin_scripts' );

function prepop_submit() {
    return 'data-prepop="submit"';
}

add_shortcode('prepop_submit', 'prepop_submit');

function prepop_source() {
    return 'data-prepop="source"';
}
add_shortcode('prepop_source', 'prepop_source');

function prepop_destination() {
    return 'data-prepop="destination"';
}
add_shortcode('prepop_destination', 'prepop_destination');

add_action('admin_menu', 'create_menu');
function create_menu(){
        add_menu_page( 'Prepop Fields', 'Prepop Plugin', 'manage_options', 'prepop-fields', 'prepop_help' );
}

function  prepop_help() {
    echo "<h1>Help Page</h1>";
?>
<div>
    <p>Put this shortcode after the input tag for source fields: [prepop_source]</p>
    <p>Put this shortcode after the button/input for source submit button: [prepop_submit]</p>
    <p>Put this shortcode after the input tag for destination auto prepop fields: [prepop_destination]</p>
</div>   

<?php
}
