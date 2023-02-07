<?php /**
 * Plugin Name: chan-plugin
 * Plugin URI: ''
 * Author: Chandan
 * Author URI: ''
 * Version: 2.3.5
 * Description: 'A new Plugin'
 * Text Domain: 'xyz'
 * *
 * 
 */

 //Function to handle a shortcode

function handle_shortcode( $attr, $content='' ){
    global $post;       //global post variable

    $attr = shortcode_atts( array(      //default attribute values
        'title' => 'Default title',
        'color' => 'red' 
    ), $attr);
    ob_start();     //using ouput buffer
    ?>

    <div style="color:<?php echo $attr['color']?>">
    <?php echo $content.' '.$attr['title']?>
    <?php echo $post->ID;?>
    </div>
    <?php
    return ob_get_clean(); //output buffer ends
}
// Hooking function to test shortcode hook
add_shortcode("test-shortcode",'handle_shortcode');

function add_content_bottom($content){
    return $content." My content at bottom"; //modifying the original content
}
add_filter('the_content', 'add_content_bottom'); //the_content hook to add custom content

function inject_ad( $posts) { //A function to add a ad post
    if ( is_home() && is_main_query() ){
        $page = get_page_by_title('Advertisement', OBJECT, 'post');
        array_splice($posts, 1,0,array($page));
    }
    return $posts;
}

add_filter('the_posts', 'inject_ad'); //filter hook
 ?>

