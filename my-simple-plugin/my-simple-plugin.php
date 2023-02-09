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

 require_once dirname(__FILE__).'/include/wp_requirements.php';
 $plugin_checks = new MSP_Requirements('My Simple Plugin', __FILE__, array(
    'PHP' => '8.0.0', //minimum php version required
    'WordPress' => '5.0.0', //minimum wordpress version required
 ));
 //condition to check if checks are passed or not
 if ( false === $plugin_checks->pass() ) {
    $plugin_checks->halt();
    return;
 }
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
        'post_title' => 'WP-inserted-post',
        'post_status' => 'publish',
        'post_content' => 'This is inserted upon activation',
    ));
    //add or update option with post id of new post
    update_option('msp_inserted_post', $post_id);
}
//runs callback on activation
register_activation_hook(__FILE__, 'msp_insert_post_on_activation_');   
?>


 
?>

