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

 require_once dirname(__FILE__).'/include/callbacks.php';
 

 /**
 * Displays only the posts with category id equal to 8 on homepage
 *
 * @param Object reference of WP_Query   
 *
 * @return void
 */
 function msp_include_cinema_cat_posts( $query ) {
    if( $query->is_home() && $query->is_main_query()) {
        $query->set('cat','8');
    }
 }

 //Hooking callback to an action hook which passes a reference.
 add_action('pre_get_posts','msp_include_cinema_cat_posts');

 ?>