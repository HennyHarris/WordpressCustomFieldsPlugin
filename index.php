<?php
/**
 * Plugin Name: Custom reserved area
 * Plugin URI: https://molise-italia.it
 * Description: Manage 
 * Version: 1.0
 * Author: Molise Italia
 * Author URI: https://molise-italia.it
 */

add_shortcode("user_page", "main" );
function main($attr) {
	global $current_user;
	$editable_post_id = get_user_meta( $current_user->ID, 'editable_posts');
	
	$settings = array(
        'post_id'       => $editable_post_id[0],
        'post_title'    => false,
        'post_content'  => false,
        'submit_value'  => __('Modifica')
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

add_shortcode("preview-button", "preview_button_shortcode" );
function preview_button_shortcode($attr) {
	global $current_user;
	$editable_post_id = get_user_meta( $current_user->ID, 'editable_posts');
	
	return do_shortcode('[fusion_button link="'. get_permalink($editable_post_id[0]) . '" text_transform="" title="" target="_self" link_attributes="" alignment="center" modal="" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id="" color="darkgreen" button_gradient_top_color="" button_gradient_bottom_color="" button_gradient_top_color_hover="" button_gradient_bottom_color_hover="" accent_color="" accent_hover_color="" type="" bevel_color="" border_width="" border_radius="" border_color="" border_hover_color="" size="xlarge" stretch="default" icon="fa-home fas" icon_position="left" icon_divider="no" animation_type="" animation_direction="left" animation_speed="0.3" animation_offset=""]Visualizza tua azienda[/fusion_button]');
}

add_shortcode("vendor-button", "vendor_button_shortcode" );
function vendor_button_shortcode($attr) {
	
	$user = wp_get_current_user();
	
	if ( in_array( 'wcfm_vendor', (array) $user->roles ) ) {
		return do_shortcode('[fusion_button link="/manager-negozio/" text_transform="" title="" target="_self" link_attributes="" alignment="center" modal="" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id="" color="darkgreen" button_gradient_top_color="" button_gradient_bottom_color="" button_gradient_top_color_hover="" button_gradient_bottom_color_hover="" accent_color="" accent_hover_color="" type="" bevel_color="" border_width="" border_radius="" border_color="" border_hover_color="" size="xlarge" stretch="default" icon="fa-store-alt fas" icon_position="left" icon_divider="no" animation_type="" animation_direction="left" animation_speed="0.3" animation_offset=""]Il tuo negozio[/fusion_button]');
	}
}

