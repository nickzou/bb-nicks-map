<?php
/**
 * Plugin Name: Nick's Modules
 * Plugin URI: https://noid.ea
 * Description: Test Project for Flowpress Interview.
 * Version: 1.0
 * Author: Nick Zou
 * Author URI: https://www.nickzou.com
 */
define( 'NICKS_MODULES_DIR', plugin_dir_path( __FILE__ ) );
define( 'NICKS_MODULES_URL', plugins_url( '/', __FILE__ ) );

function bb_nicks_module() {
    if ( class_exists( 'FLBuilder' ) ) {
        require_once 'bb-nicks-map/bb-nicks-map.php';
    }
}
add_action( 'init', 'bb_nicks_module' );