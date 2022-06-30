<?php
/**
 * Plugin Name: News
 * Plugin URI: https://www.pluswebb.com/
 * Description: Plugin de Noticias
 * Version: 1.0
 * Author: Miguel Henrique
 * Author URI: http://pluswebb.com/
 */


echo "<div>";

$content = file_get_contents('style.css');
header("Content-type: text/css");
echo $content;


function get_news() {
    /** @var array|WP_Error $response */
$response = wp_remote_get( 'https://newsapi.org/v2/top-headlines?country=br&apiKey=c6595ed7516847f4a77b8fc01f2f9e6f', array(
    'timeout' => 20,
    'user-agent' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.8; rv:20.0) Gecko/20100101 Firefox/20.0'
  ) );
 
if ( is_array( $response ) && ! is_wp_error( $response ) ) {
    $headers = $response['headers']; // array of http header lines
    $body    = $response['body']; // use the content


    /* echo "<pre>";
    print_r($body); */


    $data = json_decode($body);
    $news_data = $data->articles;

    foreach ( $news_data as $news )
    {
    echo "<section>";
    echo "<h1> $news->title</h1>";
    echo "<p> $news->description</p>";
    echo '<img src="' . $news->urlToImage . '"/>';
    echo "</section>";

    }

}

}

add_shortcode('news', 'get_news' );