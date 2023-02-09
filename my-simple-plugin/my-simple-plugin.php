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
 
 //activation hook
 register_activation_hook(__FILE__, 'activate_func');
 //deactivation hook
 register_deactivation_hook(__FILE__, 'deactivate_func');

 /**
 * adds option on plugin activation
 *
 * @param none
 *
 * @return void
 */
 function activate_func(){
    add_option('updateTitle','Sai Chandan');
 }

/**
 * delete option on plugin deactivation
 *
 * @param none
 *
 * @return void
 */
 function deactivate_func(){
    delete_option('updateTitle');
 }
?>

