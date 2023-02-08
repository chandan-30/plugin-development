<?php /**
 * Plugin Name: My Simple Plugin
 * Plugin URI: ''
 * Author: Chandan
 * Author URI: ''
 * Version: 2.3.5
 * Description: A new Plugin
 * Text Domain: 'My-Simple-Plugin'
 * *
 * 
 */

 
 /**
  * Handles a shortcode on posts
  *
  * @since 8.1.9
  *
  * @return HTML snippet which includes shortcode default attributes if user haven't provided any attributes.
  */

 function handle_shortcode( $attr, $content='' ){
    //global post variable
    global $post;       

    //default attribute values
    $attr = shortcode_atts( array(      
        'title' => __('Default title', 'my-text-domain'),
        'color' => __('red', 'my-text-domain'), 
    ), $attr);
    //using ouput buffer
    ob_start();     
    ?>

    <div style="color:<?php echo $attr['color']?>">
    <?php echo $content.' '.$attr['title']?>
    <?php echo $post->ID;?>
    </div>
    <?php
    //output buffer ends
    return ob_get_clean(); 
}
// Hooking function to test shortcode hook
add_shortcode("test-shortcode",'handle_shortcode');



 /**
  * Modifies the original content
  *
  * @since 8.1.9
  *
  * @return shortcode content with modifications
  */

function add_content_bottom($content){
    
    //modifying the original content
    return $content." My content at bottom"; 
}
//the_content hook to add custom content
add_filter('the_content', 'add_content_bottom'); 


/**
  * Add a new post 'Advertisement' to list of posts'
  *
  * @since 8.1.9
  *
  * @return array list with new post addition
  */

function inject_ad( $posts) {
    if ( is_home() && is_main_query() ){
        $page = get_page_by_title('Advertisement', OBJECT, 'post');
        array_splice($posts, 1,0,array($page));
    }
    
    return $posts;
}
//filter hook
add_filter('the_posts', 'inject_ad'); 
 
?>

