<?php
/**
 * Plugin Name: News
 * Plugin URI: https://www.pluswebb.com/
 * Description: Plugin de Noticias
 * Version: 1.0
 * Author: Miguel Henrique
 * Author URI: http://pluswebb.com/
 */

function get_news() {
    /** @var array|WP_Error $response */
$response = wp_remote_get( 'https://newsapi.org/v2/everything?q=${brasil}&apiKey=c6595ed7516847f4a77b8fc01f2f9e6f' );
 
if ( is_array( $response ) && ! is_wp_error( $response ) ) {
    $headers = $response['headers']; // array of http header lines
    $body    = $response['body']; // use the content

    echo "<pre>";
    print_r( $body );
}
}
add_action('wp_head', 'get_news' );