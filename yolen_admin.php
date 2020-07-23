<?php
/*
Plugin Name: Yolen Admin Theme
Plugin URI: https://yolen.cn
Description: 仪表板主题，几乎不影响响应速度。
Author: Yolen
Version: 1.7
Author URI: https://yolen.cn
*/

function my_admin_theme_style() {
wp_enqueue_style('my-admin-theme', plugins_url('style.css', __FILE__));
}
add_action('admin_enqueue_scripts', 'my_admin_theme_style');
add_action('login_enqueue_scripts', 'my_admin_theme_style');

function custom_admin_js() {
    $url_index = plugin_dir_url(__FILE__ ) . '';
	$url_jquery = plugin_dir_url(__FILE__ ) . '';
    echo '"<script type="text/javascript" src="'. $url_index . '"></script>"';
	echo '"<script type="text/javascript" src="'. $url_jquery . '"></script>"';
}
add_action('admin_footer', 'custom_admin_js');





function custom_adminbar_menu( $meta = TRUE ) {  
    global $wp_admin_bar;  
        if ( !is_user_logged_in() ) { return; }  
        if ( !is_super_admin() || !is_admin_bar_showing() ) { return; }  
    $wp_admin_bar->add_menu( array(  
        'id' => 'custom_menu',  
        'title' => __( '' ),  
        'href' => 'index.php',  
        'meta'  => array( target => '' ) )  
    );  
}  
add_action( 'admin_bar_menu', 'custom_adminbar_menu', 10 );  

function wps_login_error() {
        remove_action('login_head', 'wp_shake_js', 12);
}
add_action('login_head', 'wps_login_error');

function custom_loginlogo_url($url) {
return '/';
}
add_filter( 'login_headerurl', 'custom_loginlogo_url' );


add_filter('login_headertitle', create_function(false,"return get_bloginfo('name');"));




