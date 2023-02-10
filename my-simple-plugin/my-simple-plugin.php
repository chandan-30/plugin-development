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
 require_once dirname(__FILE__).'/include/callbacks.php';
 
 /**
  * creates a table name
  *
  * @since 0.0.1
  *
  * @param none
  *
  * @return String
  */
 function msp_get_table_name() {
    global $wpdb;
    return $wpdb->base_prefix . 'msp_custom_table';
 }
/**
  * Fetaches a row
  *
  * @since 0.0.1
  *
  * @param Int $post_id fetch row with this value
  *
  * @return Object
  */
 function msp_fetch_rows($post_id) {
    global $wpdb;
    $table_name = msp_get_table_name();
   return $wpdb->get_row("SELECT * from $table_name WHERE post_id = ". intval( $post_id ) );
 }
/**
  * creates a DB table if doesn't exist or fetches a row
  *
  * @since 0.0.1
  *
  * @param none
  *
  * @return void
  */
 function create_custom_db_table() {
    global $wpdb;
    //gets the table name to be created
    $table_name = msp_get_table_name();
    $query = $wpdb->prepare( 'SHOW TABLES LIKE %s', $wpdb->esc_like( $table_name ) );
    //check if table exists
    if ( ! $wpdb->get_var( $query ) == $table_name ) {
        $charset = $wpdb->get_charset_collate();
        //SQL Query for table creation
        $sql = "CREATE TABLE $table_name (
            id int(11) NOT NULL AUTO_INCREMENT,
            post_id int(11) NOT NULL,
            post_title TEXT NOT NULL,
            PRIMARY KEY (id)
            ) $charset;";
    
        require_once( ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta( $sql );
    } else {
        //fetches a row
        $res = msp_fetch_rows(163);
    }
 }

 /**
  * calls a function to create a DB table
  *
  * @since 0.0.1
  *
  * @param none
  *
  * @return void
  */
 function msp_insert_post_on_activation() {
        create_custom_db_table();
}

//runs callback on activation
register_activation_hook(__FILE__, 'msp_insert_post_on_activation');
  


?>


 



