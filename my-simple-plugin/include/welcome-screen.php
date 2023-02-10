<?php 
if( ! defined('MSP_CONSTANT') ) {
    die('Direct access not allowed');
}
/**
  * Adds a welcome page to dashboard
  *
  * @param none
  * 
  * @return void
  */
function msp_welcome_screen_page() {
    add_dashboard_page('Welcome', 'Welcome', 'read', 'msp-plugin-welcome', 'msp_display_welcome_page');
}

//hooking callback to action hook
add_action('admin_menu', 'msp_welcome_screen_page');

/**
  * Includes the template file with html content
  *
  * @param none
  * 
  * @return void
  */
function msp_display_welcome_page() {
    include dirname(__FILE__).'/templates/welcome-screen.php';
}

/**
  * Remove welcome page accessibility from submenu
  *
  * @param none
  * 
  * @return void
  */
function msp_remove_welcome_page_menu(){
    remove_submenu_page('index.php', 'msp-plugin-welcome');
}
//hooking callback to action hook
add_action('admin_head', 'msp_remove_welcome_page_menu');



?>