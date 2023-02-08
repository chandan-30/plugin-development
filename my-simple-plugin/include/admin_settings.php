<?php 
/**
 * A class to add a settings page to the custom post type 'news'
 */
    class MSP_admin { 
        public function __construct(){
            add_action('admin_menu', array($this, 'reg_settings_menu_page')); //hooking our function to admin_menu action 
        }
        /**
         * Adds a submenu page under news CPT
         */
        public function reg_settings_menu_page() {
            add_submenu_page('edit.php?post_type=news','News Settings', 'Settings','manage_options','news-settings', array($this,'render_settings_page') );
        }

        /**
         * Includes and renders a admin setting template file
         */
        public function render_settings_page(){ 
            require_once dirname(__FILE__).'/templates/admin_settings.php';
        }
    }

    $cpa = new MSP_admin(); // creating instance of the class
?>