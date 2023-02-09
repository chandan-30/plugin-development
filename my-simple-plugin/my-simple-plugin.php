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
 
 //Runs after wordpress is loaded
 add_action('init', 'msp_init_func');

 /**
 * Hooks a callback to an action hook
 *
 * @param none
 *
 * @return void
 */
 function msp_init_func(){
    add_action('add_meta_boxes', 'msp_add_meta_boxes');
 }

 /**
 * Adds a metabox for the 'news' post
 *
 * @param none
 *
 * @return void
 */
 function msp_add_meta_boxes(){
    add_meta_box(
        'msp_meta',                 // Unique ID
        'msp Meta Box',      // Box title
        'msp_custom_box_html',  // Content callback
        'news',                            // Post type
    );
 }

/**
 * This callback function provides the html content to 'add_meta_box' function
 *
 * @param Object    $post   The object of post of type news which is being edited    
 *
 * @return void
 */
 function msp_custom_box_html( $post ) {
    
	?>
	<label for="msp_field">Description for this field</label>
	<select name="msp_field" id="msp_field" class="postbox">
		<option value="">Select something...</option>
		<option value="something">Something</option>
		<option value="else">Else</option>
	</select>
	<?php
}
?>

