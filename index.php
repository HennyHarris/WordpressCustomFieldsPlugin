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
	
	//Text to show at the beginning of the form
	echo do_shortcode('[fusion_builder_container hundred_percent="no" hundred_percent_height="no" hundred_percent_height_scroll="no" hundred_percent_height_center_content="yes" equal_height_columns="no" menu_anchor="" hide_on_mobile="small-visibility,medium-visibility,large-visibility" status="published" publish_date="" class="" id="" border_size="" border_color="" border_style="solid" margin_top="" margin_bottom="" padding_top="" padding_right="" padding_bottom="" padding_left="" gradient_start_color="" gradient_end_color="" gradient_start_position="0" gradient_end_position="100" gradient_type="linear" radial_direction="center" linear_angle="180" background_color="" background_image="" background_position="center center" background_repeat="no-repeat" fade="no" background_parallax="none" enable_mobile="no" parallax_speed="0.3" background_blend_mode="none" video_mp4="" video_webm="" video_ogv="" video_url="" video_aspect_ratio="16:9" video_loop="yes" video_mute="yes" video_preview_image="" filter_hue="0" filter_saturation="100" filter_brightness="100" filter_contrast="100" filter_invert="0" filter_sepia="0" filter_opacity="100" filter_blur="0" filter_hue_hover="0" filter_saturation_hover="100" filter_brightness_hover="100" filter_contrast_hover="100" filter_invert_hover="0" filter_sepia_hover="0" filter_opacity_hover="100" filter_blur_hover="0"][fusion_builder_row][fusion_builder_column type="1_1" link="" target="_self" hide_on_mobile="small-visibility,medium-visibility,large-visibility" background_image_id="" spacing="" center_content="yes" min_height="" class="" id="" hover_type="none" border_size="0" border_color="" border_style="solid" border_position="all" border_radius_top_left="" border_radius_top_right="" border_radius_bottom_right="" border_radius_bottom_left="" box_shadow="no" box_shadow_vertical="" box_shadow_horizontal="" box_shadow_blur="0" box_shadow_spread="0" box_shadow_color="" box_shadow_style="" padding_top="" padding_right="" padding_bottom="" padding_left="" margin_top="8%" margin_bottom="2%" background_type="single" gradient_start_color="" gradient_end_color="" gradient_start_position="0" gradient_end_position="100" gradient_type="linear" radial_direction="center" linear_angle="180" background_color="" background_image="" background_position="left top" background_repeat="no-repeat" background_blend_mode="none" animation_type="" animation_direction="left" animation_speed="0.3" animation_offset="" filter_type="regular" filter_hue="0" filter_saturation="100" filter_brightness="100" filter_contrast="100" filter_invert="0" filter_sepia="0" filter_opacity="100" filter_blur="0" filter_hue_hover="0" filter_saturation_hover="100" filter_brightness_hover="100" filter_contrast_hover="100" filter_invert_hover="0" filter_sepia_hover="0" filter_opacity_hover="100" filter_blur_hover="0" last="no"][fusion_text columns="" column_min_width="" column_spacing="" rule_style="default" rule_size="" rule_color="" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id="" animation_type="" animation_direction="left" animation_speed="0.3" animation_offset=""]
<h4 style="text-align: center;">Modifica i dati della tua attività compilando il form sottostante.</h4>
[/fusion_text][/fusion_builder_column][/fusion_builder_row][/fusion_builder_container]');
	
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

