<?php
/**
 * Plugin Name: Custom reserved area
 * Plugin URI: https://molise-italia.it
 * Description: Manage 
 * Version: 1.0
 * Author: Molise Italia
 * Author URI: https://molise-italia.it
 */

add_shortcode("user_page", "ciao" );

function ciao($attr) {
	global $current_user;
	
	
	$editable_post_id = get_user_meta( $current_user->ID, 'editable_posts');
	
	$settings = array(
        'post_id'       => $editable_post_id[0],
        'post_title'    => false,
        'post_content'  => false,
        'submit_value'  => __('Update meta')
    );
	
	echo '<div id="primary" class="content-area">
    <div id="content" class="site-content" role="main">';
	
    acf_form_head();
    get_header();
    acf_form($settings);
    
    get_footer();
	
	echo '
    </div><!-- #content -->
</div><!-- #primary -->';
}



