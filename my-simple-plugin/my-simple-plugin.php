<?php /**
 * Plugin Name: My Simple Plugin
 * Plugin URI: ''
 * Author: Chandan
 * Author URI: ''
 * Version: 0.0.1
 * Description: A new Plugin
 * Text Domain: 'my-simple-plugin'
 * *
 * 
 */

 define('MSP_CONSTANT', true); //Constant with a boolean value
 require_once dirname(__FILE__).'/include/admin_settings.php';
 require_once dirname(__FILE__).'/include/shortcode.php';
 require_once dirname(__FILE__).'/include/insert-ad-post.php';
 
 /**
  * Inserts a post upon plugin activation
  *
  * @since 0.0.1
  *
  * @param none
  *
  * @return void
  */
 function msp_insert_post_on_activation_() {
    //check if option exists
    if( get_option('msp_inserted_post') ){
        return;
    }
    //function to insert post 
    $post_id = wp_insert_post(array(
        'post_title' => __('WP-inserted-post', 'my-simple-plugin'),
        'post_status' => __('publish', 'my-simple-plugin'),
        'post_content' => __('This is inserted upon activation', 'my-simple-plugin'),
    ));
    //add or update option with post id of new post
    update_option('msp_inserted_post', $post_id);
}
//runs callback on activation
register_activation_hook(__FILE__, 'msp_insert_post_on_activation_');   
?>


 
?>

