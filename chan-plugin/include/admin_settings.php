<?php 
    class CP_admin { //class block for admin setting creation for news
        function __construct(){
            add_action('admin_menu', array($this, 'reg_settings_menu_page')); //hooking our function to admin_menu action 
        }

        function reg_settings_menu_page() {
            add_submenu_page('edit.php?post_type=news','News Settings', 'Settings','manage_options','news-settings', array($this,'render_settings_page') );
        }
        function render_settings_page(){ //including a simple template page
            require_once dirname(__FILE__).'/templates/admin_settings.php';
        }
    }

    $cpa = new CP_admin(); // creating instance of the class
?>