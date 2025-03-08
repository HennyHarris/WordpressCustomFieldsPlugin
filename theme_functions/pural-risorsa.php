<?php
/**
 * Template used for single posts and other post-types
 * that don't have a specific template.
 *
 * @package Avada
 * @subpackage Templates
 */

// Do not allow directly accessing this file.
if (!defined('ABSPATH')) {
    exit('Direct script access denied.');
}
?>
<?php get_header(); ?>

    <section id="content" <?php Avada()->layout->add_style('content_style'); ?>>
        <?php if (fusion_get_option('blog_pn_nav')) : ?>
            <div class="single-navigation clearfix">
                <?php previous_post_link('%link', esc_attr__('Previous', 'Avada')); ?>
                <?php next_post_link('%link', esc_attr__('Next', 'Avada')); ?>
            </div>
        <?php endif; ?>

        <?php while (have_posts()) : ?>
            <?php the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>
                <?php $full_image = ''; ?>
                <?php if ('above' === Avada()->settings->get('blog_post_title')) : ?>
                    <?php if ('below_title' === Avada()->settings->get('blog_post_meta_position')) : ?>
                        <div class="fusion-post-title-meta-wrap">
                    <?php endif; ?>
                    <?php $title_size = (false === avada_is_page_title_bar_enabled($post->ID) ? '1' : '2'); ?>
                    <?php echo avada_render_post_title($post->ID, false, '', $title_size); // phpcs:ignore WordPress.Security.EscapeOutput ?>
                    <?php if ('below_title' === Avada()->settings->get('blog_post_meta_position')) : ?>
                        <?php echo avada_render_post_metadata('single'); // phpcs:ignore WordPress.Security.EscapeOutput ?>
                        </div>
                    <?php endif; ?>
                <?php elseif ('disabled' === Avada()->settings->get('blog_post_title') && Avada()->settings->get('disable_date_rich_snippet_pages') && Avada()->settings->get('disable_rich_snippet_title')) : ?>
                    <span class="entry-title" style="display: none;"><?php the_title(); ?></span>
                <?php endif; ?>

                <?php avada_singular_featured_image(); ?>

                <?php if ('below' === Avada()->settings->get('blog_post_title')) : ?>
                    <?php if ('below_title' === Avada()->settings->get('blog_post_meta_position')) : ?>
                        <div class="fusion-post-title-meta-wrap">
                    <?php endif; ?>
                    <?php $title_size = (false === avada_is_page_title_bar_enabled($post->ID) ? '1' : '2'); ?>
                    <?php echo avada_render_post_title($post->ID, false, '', $title_size); // phpcs:ignore WordPress.Security.EscapeOutput ?>
                    <?php if ('below_title' === Avada()->settings->get('blog_post_meta_position')) : ?>
                        <?php echo avada_render_post_metadata('single'); // phpcs:ignore WordPress.Security.EscapeOutput ?>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
                <div class="post-content">
                    <?php
                    // $categories = get_the_category();

                    $LAT = get_post_meta(get_the_ID(), 'codespacing_progress_map_lat', true);
                    $LONG = get_post_meta(get_the_ID(), 'codespacing_progress_map_lng', true);

                    /*** VARIABILI CAMPI TEMPLATE GENERALE - html_special_chars()   **/
                    $NOME_COMMERCIALE = htmlspecialchars(get_field('NOME_COMMERCIALE')); // Text
                    $TIPOLOGIA = get_field('TIPOLOGIA'); // Tassonomie
                    $CATEGORIA = get_field('CATEGORIA'); // Tassonomie
                    $SOCIETA_ASSOCIAZIONE = htmlspecialchars(get_field('SOCIETA_ASSOCIAZIONE')); // Text
                    $SITO_WEB = htmlspecialchars(get_field('SITO_WEB')); // Text
                    $TELEFONO = htmlspecialchars(get_field('TELEFONO')); // Text
                    $TELEFONO1 = htmlspecialchars(get_field('TELEFONO1')); // Text
                    $EMAIL = htmlspecialchars(get_field('EMAIL')); // Email
                    $EMAIL1 = htmlspecialchars(get_field('EMAIL1')); // Email
                    $PUNTO_VENDITA_SEPARATO = htmlspecialchars(get_field('PUNTO_VENDITA_SEPARATO')); // Button radio
                    $INDIRIZZO = htmlspecialchars(get_field('INDIRIZZO')); // Text
                    $COMUNE = htmlspecialchars(get_field('COMUNE')); // Text
                    $PROVINCIA = htmlspecialchars(get_field('PROVINCIA')); // Button radio
                    $ORARI_APERTURA = htmlspecialchars(get_field('ORARI_APERTURA')); // Text
                    $GIORNO_DI_CHIUSURA = get_field('GIORNO_DI_CHIUSURA'); // Checkbox
                    $INDIRIZZO_PUNTO_VENDITA = htmlspecialchars(get_field('INDIRIZZO_PUNTO_VENDITA')); // Text
                    $COMUNE_PUNTO_VENDITA = htmlspecialchars(get_field('COMUNE_PUNTO_VENDITA')); // Text
                    $PROVINCIA_PUNTO_VENDITA = htmlspecialchars(get_field('PROVINCIA_PUNTO_VENDITA')); // Button radio
                    $ORARI_APERTURA_PUNTO_VENDITA = htmlspecialchars(get_field('ORARI_APERTURA_PUNTO_VENDITA')); // Text
                    $GIORNO_DI_CHIUSURA_PUNTO_VENDITA = get_field('GIORNO_DI_CHIUSURA_PUNTO_VENDITA'); // Checkbox
                    $INDIRIZZO_PRODUZIONE = htmlspecialchars(get_field('INDIRIZZO_PRODUZIONE')); // Text
                    $COMUNE_PRODUZIONE = htmlspecialchars(get_field('COMUNE_PRODUZIONE')); // Text
                    $PROVINCIA_PRODUZIONE = htmlspecialchars(get_field('PROVINCIA_PRODUZIONE')); // Button radio
                    $ORARI_APERTURA_PRODUZIONE = htmlspecialchars(get_field('ORARI_APERTURA_PRODUZIONE')); // Text
                    $GIORNO_DI_CHIUSURA_PRODUZIONE = get_field('GIORNO_DI_CHIUSURA_PRODUZIONE'); // Checkbox
                    $PERIODO_APERTURA = htmlspecialchars(get_field('PERIODO_APERTURA')); // Button radio
                    $DESCRIZIONE = htmlspecialchars(get_field('DESCRIZIONE')); // Text
                    $INFO_AGGIUNTIVE = htmlspecialchars(get_field('INFO_AGGIUNTIVE')); // Text
                    $VISITE_GUIDATE = htmlspecialchars(get_field('VISITE_GUIDATE')); // Button radio
                    $DETTAGLI_VISITE = htmlspecialchars(get_field('DETTAGLI_VISITE')); // Text
                    $COSTO_BIGLIETTO = htmlspecialchars(get_field('COSTO_BIGLIETTO')); // Number
                    $VENDITA_AL_DETTAGLIO = htmlspecialchars(get_field('VENDITA_AL_DETTAGLIO')); // Button radio
                    $DISTANZA = htmlspecialchars(get_field('DISTANZA')); // Number
                    $STATO_CONSERVAZIONE = htmlspecialchars(get_field('STATO_CONSERVAZIONE')); // Button radio
                    $PACCHETTI_OFFERTI = htmlspecialchars(get_field('PACCHETTI_OFFERTI')); // Text
                    $LINK_ALLE_PROPOSTE = htmlspecialchars(get_field('LINK_ALLE_PROPOSTE')); // URL
                    $SERVIZI_OFFERTI = get_field('SERVIZI_OFFERTI'); // Checkbox
                    $ALTRI_SERVIZI = htmlspecialchars(get_field('ALTRO')); // Text
                    $FACEBOOK = htmlspecialchars(get_field('FACEBOOK')); // URL
                    $FLICKR = htmlspecialchars(get_field('FLICKR')); // URL
                    $GOOGLE = htmlspecialchars(get_field('GOOGLE')); // URL
                    $INSTAGRAM = htmlspecialchars(get_field('INSTAGRAM')); // URL
                    $LINKEDIN = htmlspecialchars(get_field('LINKEDIN')); // URL
                    $PINTEREST = htmlspecialchars(get_field('PINTEREST')); // URL
                    $TWITTER = htmlspecialchars(get_field('TWITTER')); // URL
                    $GOOGLE_MAPS = htmlspecialchars(get_field('GOOGLE_MAPS')); // URL
                    $GOOGLE_MAPS_PUNTO_VENDITA = htmlspecialchars(get_field('GOOGLE_MAPS_PUNTO_VENDITA')); // URL
                    $GOOGLE_MAPS_PRODUZIONE = htmlspecialchars(get_field('GOOGLE_MAPS_PRODUZIONE')); // URL
                    $TRIPADVISOR = htmlspecialchars(get_field('TRIPADVISOR')); // URL
                    $YOUTUBE = htmlspecialchars(get_field('YOUTUBE')); // URL
                    $GOOGLE_PLUS = htmlspecialchars(get_field('GOOGLE_PLUS')); // URL
                    $BOOKING = htmlspecialchars(get_field('BOOKING')); // URL
                    $HOTELS_COM = htmlspecialchars(get_field('HOTELS_COM')); // URL
                    $AIRBNB = htmlspecialchars(get_field('AIRBNB')); // URL
                    $TRIVAGO = htmlspecialchars(get_field('TRIVAGO')); // URL

                    $VALUTAZIONI_GOOGLE = htmlspecialchars(get_field('VALUTAZIONI_GOOGLE'));
                    $INFOMOBILITA = htmlspecialchars(get_field('INFOMOBILITA'));

                    /*** IMAGES **/
                    $IMG_LOGO = esc_url(get_field('IMG_LOGO')['url']); // Img
                    $IMG_COVER = esc_url(get_field('IMG_COVER')['url']); // Img
                    $IMG_GALLERIA_1 = esc_url(get_field('IMG_GALLERIA_1')['url']); // Img
                    $IMG_GALLERIA_2 = esc_url(get_field('IMG_GALLERIA_2')['url']); // Img
                    $IMG_GALLERIA_3 = esc_url(get_field('IMG_GALLERIA_3')['url']); // Img
                    $IMG_GALLERIA_4 = esc_url(get_field('IMG_GALLERIA_4')['url']); // Img
                    $IMG_GALLERIA_5 = esc_url(get_field('IMG_GALLERIA_5')['url']); // Img

                    /*** CATEGORY ICONS **/
                    $archeologia_arte_e_storia = "[fusion_image image=\"https://www.molise-italia.it/wp-content/uploads/2019/10/Archeologia_arte_e_storia-e1574194179395.png\" image_id=\"6084|thumbnail\" link=\"\" linktarget=\"_self\" alt=\"\" /]";
                    $vacanze_nella_natura = "[fusion_image image=\"https://www.molise-italia.it/wp-content/uploads/2019/07/Vacanze_nella_natura-e1574193238920.png\" image_id=\"3255|thumbnail\" link=\"\" linktarget=\"_self\" alt=\"\" /]";
                    $paese_e_culture = "[fusion_image image=\"https://www.molise-italia.it/wp-content/uploads/2019/10/Paese_e_culture-e1574194147226.png\" image_id=\"6083|thumbnail\" link=\"\" linktarget=\"_self\" alt=\"\" /]";
                    $le_tradizioni = "[fusion_image image=\"https://www.molise-italia.it/wp-content/uploads/2019/10/Le_tradizioni-150x150.png\" image_id=\"6085|thumbnail\" link=\"\" linktarget=\"_self\" alt=\"\" /]";
                    $i_sapori = "[fusion_image image=\"https://www.molise-italia.it/wp-content/uploads/2019/10/I_sapori-e1574193995857.png\" image_id=\"6078|thumbnail\" link=\"\" linktarget=\"_self\" alt=\"\" /]";
                    $il_mare = "[fusion_image image=\"https://www.molise-italia.it/wp-content/uploads/2019/10/Il_mare-e1574194063851.png\" image_id=\"6079|thumbnail\" link=\"\" linktarget=\"_self\" alt=\"\" /]";
                    $la_montagna = "[fusion_image image=\"https://www.molise-italia.it/wp-content/uploads/2019/10/La_montagna-e1574194096676.png\" image_id=\"6080|thumbnail\" link=\"\" linktarget=\"_self\" alt=\"\" /]";
                    $benessere = "[fusion_image image=\"https://www.molise-italia.it/wp-content/uploads/2019/10/Benessere_30x30.png\" image_id=\"7549|thumbnail\" link=\"\" linktarget=\"_self\" alt=\"\" /]";


                    /*** HEADER DESKTOP **/
                    $header_desktop = '[fusion_builder_container admin_label="Vista iniziale(DESKTOP)" hide_on_mobile="large-visibility" status="published" publish_date="" hundred_percent="yes" hundred_percent_height="yes" hundred_percent_height_scroll="no" hundred_percent_height_center_content="yes" equal_height_columns="yes" menu_anchor="" class="initialview" id="initialview" border_size="" border_color="" border_style="solid" margin_top="" margin_bottom="" padding_top="0px" padding_right="0px" padding_bottom="0px" padding_left="0px" gradient_start_color="" gradient_end_color="" gradient_start_position="0" gradient_end_position="100" gradient_type="linear" radial_direction="center" linear_angle="180" background_color="" background_image="';
                    $header_desktop .= $IMG_COVER;
                    $header_desktop .= '" background_position="center center" background_repeat="no-repeat" fade="no" background_parallax="fixed" enable_mobile="no" parallax_speed="0.3" background_blend_mode="none" video_mp4="" video_webm="" video_ogv="" video_url="" video_aspect_ratio="16:9" video_loop="yes" video_mute="yes" video_preview_image="" filter_hue="0" filter_saturation="100" filter_brightness="100" filter_contrast="100" filter_invert="0" filter_sepia="0" filter_opacity="100" filter_blur="0" filter_hue_hover="0" filter_saturation_hover="100" filter_brightness_hover="100" filter_contrast_hover="100" filter_invert_hover="0" filter_sepia_hover="0" filter_opacity_hover="100" filter_blur_hover="0" admin_toggled="no"]';
                    $header_desktop .= '[fusion_builder_row]';
                    $header_desktop .= '[fusion_builder_column type="1_2" layout="1_2" spacing="" center_content="yes" link="" target="_self" min_height="" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id="" background_image_id="" background_color="" background_image="" background_position="left top" undefined="" background_repeat="no-repeat" hover_type="none" border_size="0" border_color="" border_style="solid" border_position="all" border_radius_top_left="" border_radius_top_right="" border_radius_bottom_left="" border_radius_bottom_right="" box_shadow="no" box_shadow_vertical="" box_shadow_horizontal="" box_shadow_blur="0" box_shadow_spread="0" box_shadow_color="" box_shadow_style="" padding_top="3%" padding_right="-10%" padding_bottom="3%" padding_left="-20%" margin_top="" margin_bottom="" animation_type="fade" animation_direction="left" animation_speed="0.3" animation_offset="" last="no"]';
                    $header_desktop .= '[fusion_title title_type="text" rotation_effect="bounceIn" display_time="1200" highlight_effect="circle" loop_animation="off" highlight_width="9" highlight_top_margin="0" rotation_text="" highlight_text="" after_text="" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id="" before_text="" content_align="center" size="1" font_size="" animated_font_size="" line_height="" letter_spacing="" margin_top="2%" margin_bottom="" margin_top_mobile="2%" margin_bottom_mobile="" text_color="#000000" animated_text_color="" highlight_color="" style_type="none" sep_color=""]';
                    $header_desktop .= $NOME_COMMERCIALE;
                    $header_desktop .= '[/fusion_title]';
                    $header_desktop .= '[fusion_separator style_type="single solid" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id="" sep_color="rgba(0,0,0,0.65)" top_margin="" bottom_margin="30" border_size="4" icon="" icon_circle="" icon_circle_color="" width="45%" alignment="center" /]';
                    $header_desktop .= '[fusion_button link="#storia" text_transform="uppercase" title="" target="_self" link_attributes="" alignment="center" modal="" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id="" color="custom" button_gradient_top_color="" button_gradient_bottom_color="" button_gradient_top_color_hover="" button_gradient_bottom_color_hover="" accent_color="#ffffff" accent_hover_color="#ffffff" type="" bevel_color="" border_width="4" size="" stretch="default" icon="" icon_position="left" icon_divider="no" animation_type="" animation_direction="left" animation_speed="0.3" animation_offset="" border_radius="" border_color="#ffffff" border_hover_color="#ffffff"]SCOPRI DI PIÙ[/fusion_button]';
                    $header_desktop .= '[/fusion_builder_column]';
                    $header_desktop .= '[fusion_builder_column type="1_2" layout="1_2" spacing="" center_content="yes" link="" target="_self" min_height="" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id="" background_image_id="" background_color="" background_image="" background_position="left top" undefined="" background_repeat="no-repeat" hover_type="none" border_size="0" border_color="" border_style="solid" border_position="all" border_radius_top_left="" border_radius_top_right="" border_radius_bottom_left="" border_radius_bottom_right="" box_shadow="no" box_shadow_vertical="" box_shadow_horizontal="" box_shadow_blur="0" box_shadow_spread="0" box_shadow_color="" box_shadow_style="" padding_top="3%" padding_right="-20%" padding_bottom="3%" padding_left="-10%" margin_top="20px" margin_bottom="20px" animation_type="fade" animation_direction="right" animation_speed="0.3" animation_offset="" last="no"]';
                    $header_desktop .= '[fusion_imageframe image_id="4923|full" max_width="" style_type="" blur="" stylecolor="" hover_type="liftup" bordersize="" bordercolor="" borderradius="" align="center" lightbox="no" gallery_id="" lightbox_image="" lightbox_image_id="" alt="" link="" linktarget="_self" hide_on_mobile="small-visibility,medium-visibility,large-visibility" animation_type="" animation_direction="right" animation_speed="0.3" animation_offset="" class="" id="logoImg"]';
                    $header_desktop .= $IMG_LOGO;
                    $header_desktop .= '[/fusion_imageframe]';
                    $header_desktop .= '[/fusion_builder_column][/fusion_builder_row][/fusion_builder_container]';


                    /*** HEADER MOBILE **/
                    $header_mobile = '[fusion_builder_container admin_label="Vista iniziale(TABLET E SMARTPHONE)" hide_on_mobile="small-visibility,medium-visibility" status="published" publish_date="" hundred_percent="yes" hundred_percent_height="yes" hundred_percent_height_scroll="no" hundred_percent_height_center_content="yes" equal_height_columns="yes" menu_anchor="" class="initialview" id="initialview" border_size="" border_color="" border_style="solid" margin_top="" margin_bottom="" padding_top="" padding_right="" padding_bottom="" padding_left="" gradient_start_color="" gradient_end_color="" gradient_start_position="0" gradient_end_position="100" gradient_type="linear" radial_direction="center" linear_angle="180" background_color="" background_image="';
                    $header_mobile .= $IMG_COVER;
                    $header_mobile .= '" background_position="center center" background_repeat="no-repeat" fade="no" background_parallax="none" enable_mobile="no" parallax_speed="0.3" background_blend_mode="none" video_mp4="" video_webm="" video_ogv="" video_url="" video_aspect_ratio="16:9" video_loop="yes" video_mute="yes" video_preview_image="" filter_hue="0" filter_saturation="100" filter_brightness="100" filter_contrast="100" filter_invert="0" filter_sepia="0" filter_opacity="100" filter_blur="0" filter_hue_hover="0" filter_saturation_hover="100" filter_brightness_hover="100" filter_contrast_hover="100" filter_invert_hover="0" filter_sepia_hover="0" filter_opacity_hover="100" filter_blur_hover="0" admin_toggled="yes"]';
                    $header_mobile .= '[fusion_builder_row]';
                    $header_mobile .= '[fusion_builder_column type="1_2" layout="1_2" spacing="" center_content="yes" link="" target="_self" min_height="" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id="" background_image_id="" background_color="" background_image="" background_position="left top" undefined="" background_repeat="no-repeat" hover_type="none" border_size="0" border_color="" border_style="solid" border_position="all" border_radius_top_left="" border_radius_top_right="" border_radius_bottom_left="" border_radius_bottom_right="" box_shadow="no" box_shadow_vertical="" box_shadow_horizontal="" box_shadow_blur="0" box_shadow_spread="0" box_shadow_color="" box_shadow_style="" padding_top="3%" padding_right="-20%" padding_bottom="3%" padding_left="-10%" margin_top="20px" margin_bottom="20px" animation_type="fade" animation_direction="right" animation_speed="0.3" animation_offset="" last="no"]';
                    $header_mobile .= '[fusion_imageframe image_id="4923|full" max_width="" style_type="" blur="" stylecolor="" hover_type="liftup" bordersize="" bordercolor="" borderradius="" align="center" lightbox="no" gallery_id="" lightbox_image="" lightbox_image_id="" alt="" link="" linktarget="_self" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id="logoImg" animation_type="" animation_direction="right" animation_speed="0.3" animation_offset=""]';
                    $header_mobile .= $IMG_LOGO;
                    $header_mobile .= '[/fusion_imageframe]';
                    $header_mobile .= '[/fusion_builder_column]';
                    $header_mobile .= '[fusion_builder_column type="1_2" layout="1_2" spacing="" center_content="yes" link="" target="_self" min_height="" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id="" background_image_id="" background_color="" background_image="" background_position="left top" undefined="" background_repeat="no-repeat" hover_type="none" border_size="0" border_color="" border_style="solid" border_position="all" border_radius_top_left="" border_radius_top_right="" border_radius_bottom_left="" border_radius_bottom_right="" box_shadow="no" box_shadow_vertical="" box_shadow_horizontal="" box_shadow_blur="0" box_shadow_spread="0" box_shadow_color="" box_shadow_style="" padding_top="3%" padding_right="-10%" padding_bottom="3%" padding_left="-20%" margin_top="" margin_bottom="" animation_type="fade" animation_direction="left" animation_speed="0.3" animation_offset="" last="no"][fusion_separator style_type="single solid" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id="" sep_color="rgba(0,0,0,0.4)" top_margin="" bottom_margin="0.5%" border_size="4" icon="" icon_circle="" icon_circle_color="" width="" alignment="center" /]';
                    $header_mobile .= '[fusion_title title_type="text" rotation_effect="bounceIn" display_time="1200" highlight_effect="circle" loop_animation="off" highlight_width="9" highlight_top_margin="0" rotation_text="" highlight_text="" after_text="" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id="" before_text="" content_align="center" size="1" font_size="" animated_font_size="" line_height="" letter_spacing="" margin_top="2%" margin_bottom="" margin_top_mobile="2%" margin_bottom_mobile="" text_color="#000000" animated_text_color="" highlight_color="" style_type="none" sep_color=""]';
                    $header_mobile .= $NOME_COMMERCIALE;
                    $header_mobile .= '[/fusion_title]';
                    $header_mobile .= '[fusion_separator style_type="single solid" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id="" sep_color="rgba(0,0,0,0.65)" top_margin="" bottom_margin="30" border_size="4" icon="" icon_circle="" icon_circle_color="" width="45%" alignment="center" /]';

                    $header_mobile .= '[fusion_button link="#storia" text_transform="uppercase" title="" target="_self" link_attributes="" alignment="center" modal="" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id="" color="custom" button_gradient_top_color="" button_gradient_bottom_color="" button_gradient_top_color_hover="" button_gradient_bottom_color_hover="" accent_color="#ffffff" accent_hover_color="#ffffff" type="" bevel_color="" border_width="4" size="" stretch="default" icon="" icon_position="left" icon_divider="no" animation_type="" animation_direction="left" animation_speed="0.3" animation_offset="" border_radius="" border_color="#ffffff" border_hover_color="#ffffff"]SCOPRI DI PIÙ[/fusion_button]';
                    $header_mobile .= '[/fusion_builder_column][/fusion_builder_row][/fusion_builder_container]';


                    /*** HEADER TYPOLOGY - CATEGORY **/
                    $header_typology_category = '[fusion_builder_container admin_label="Separatore tipologia" hide_on_mobile="small-visibility,medium-visibility,large-visibility" status="published" publish_date="" hundred_percent="yes" hundred_percent_height="no" hundred_percent_height_scroll="no" hundred_percent_height_center_content="yes" equal_height_columns="no" menu_anchor="" class="" id="" border_size="" border_color="" border_style="solid" margin_top="1%" margin_bottom="" padding_top="" padding_right="" padding_bottom="" padding_left="" gradient_start_color="" gradient_end_color="" gradient_start_position="0" gradient_end_position="100" gradient_type="linear" radial_direction="center" linear_angle="180" background_color="" background_image="" background_position="center center" background_repeat="no-repeat" fade="no" background_parallax="none" enable_mobile="no" parallax_speed="0.3" background_blend_mode="none" video_mp4="" video_webm="" video_ogv="" video_url="" video_aspect_ratio="16:9" video_loop="yes" video_mute="yes" video_preview_image="" filter_hue="0" filter_saturation="100" filter_brightness="100" filter_contrast="100" filter_invert="0" filter_sepia="0" filter_opacity="100" filter_blur="0" filter_hue_hover="0" filter_saturation_hover="100" filter_brightness_hover="100" filter_contrast_hover="100" filter_invert_hover="0" filter_sepia_hover="0" filter_opacity_hover="100" filter_blur_hover="0" admin_toggled="no"]';
                    $header_typology_category .= '[fusion_builder_row]';
                    $header_typology_category .= '[fusion_builder_column type="1_1" layout="1_1" link="" target="_self" hide_on_mobile="small-visibility,medium-visibility,large-visibility" background_image_id="" spacing="" center_content="no" min_height="" class="" id="" hover_type="none" border_size="0" border_color="" border_style="solid" border_position="all" border_radius_top_left="" border_radius_top_right="" border_radius_bottom_right="" border_radius_bottom_left="" box_shadow="no" box_shadow_vertical="" box_shadow_horizontal="" box_shadow_blur="0" box_shadow_spread="0" box_shadow_color="" box_shadow_style="" padding_top="" padding_right="" padding_bottom="" padding_left="" margin_top="" margin_bottom="0%" background_type="single" gradient_start_color="" gradient_end_color="" gradient_start_position="0" gradient_end_position="100" gradient_type="linear" radial_direction="center" linear_angle="180" background_color="" background_image="" background_position="left top" background_repeat="no-repeat" background_blend_mode="none" animation_type="" animation_direction="left" animation_speed="0.3" animation_offset="" filter_type="regular" filter_hue="0" filter_saturation="100" filter_brightness="100" filter_contrast="100" filter_invert="0" filter_sepia="0" filter_opacity="100" filter_blur="0" filter_hue_hover="0" filter_saturation_hover="100" filter_brightness_hover="100" filter_contrast_hover="100" filter_invert_hover="0" filter_sepia_hover="0" filter_opacity_hover="100" filter_blur_hover="0" last="no"]';
                    $header_typology_category .= '[fusion_separator style_type="single solid" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id="" sep_color="rgba(0,0,0,0.4)" top_margin="1%" bottom_margin="0.2%" border_size="4" icon="" icon_circle="" icon_circle_color="" width="" alignment="center" /]';
                    $header_typology_category .= '[/fusion_builder_column]';
                    $header_typology_category .= '[fusion_builder_column type="1_4" layout="1_4" link="" target="_self" hide_on_mobile="small-visibility,medium-visibility,large-visibility" background_image_id="" spacing="" center_content="yes" min_height="" class="" id="icone-categorie" hover_type="none" border_size="0" border_color="" border_style="solid" border_position="all" border_radius_top_left="" border_radius_top_right="" border_radius_bottom_right="" border_radius_bottom_left="" box_shadow="no" box_shadow_vertical="" box_shadow_horizontal="" box_shadow_blur="0" box_shadow_spread="0" box_shadow_color="" box_shadow_style="" padding_top="8px" padding_right="" padding_bottom="" padding_left="" margin_top="0px" margin_bottom="0px" background_type="single" gradient_start_color="" gradient_end_color="" gradient_start_position="0" gradient_end_position="100" gradient_type="linear" radial_direction="center" linear_angle="180" background_color="" background_image="" background_position="left top" background_repeat="no-repeat" background_blend_mode="none" animation_type="" animation_direction="left" animation_speed="0.3" animation_offset="" filter_type="regular" filter_hue="0" filter_saturation="100" filter_brightness="100" filter_contrast="100" filter_invert="0" filter_sepia="0" filter_opacity="100" filter_blur="0" filter_hue_hover="0" filter_saturation_hover="100" filter_brightness_hover="100" filter_contrast_hover="100" filter_invert_hover="0" filter_sepia_hover="0" filter_opacity_hover="100" filter_blur_hover="0" last="no"]';

                    if ($TIPOLOGIA != null) {
                        $header_typology_category .= '[fusion_text columns="" column_min_width="" column_spacing="" rule_style="default" rule_size="" rule_color="" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id="" animation_type="" animation_direction="left" animation_speed="0.3" animation_offset=""]';

                        $i = sizeof($TIPOLOGIA) - 1;

                        foreach ($TIPOLOGIA as $field_desktop_typology) {

                            $header_typology_category .= $field_desktop_typology->name;

                            if ($i != 0) {
                                $header_typology_category .= " | ";
                            }

                            $i--;
                        }

                        $header_typology_category .= '[/fusion_text]';
                    }

                    $header_typology_category .= '[/fusion_builder_column]';
                    $header_typology_category .= '[fusion_builder_column type="1_2" layout="1_2" link="" target="_self" hide_on_mobile="small-visibility,medium-visibility,large-visibility" background_image_id="" spacing="" center_content="no" min_height="" class="" id="" hover_type="none" border_size="0" border_color="" border_style="solid" border_position="all" border_radius_top_left="" border_radius_top_right="" border_radius_bottom_right="" border_radius_bottom_left="" box_shadow="no" box_shadow_vertical="" box_shadow_horizontal="" box_shadow_blur="0" box_shadow_spread="0" box_shadow_color="" box_shadow_style="" padding_top="" padding_right="" padding_bottom="" padding_left="" margin_top="0px" margin_bottom="0px" background_type="single" gradient_start_color="" gradient_end_color="" gradient_start_position="0" gradient_end_position="100" gradient_type="linear" radial_direction="center" linear_angle="180" background_color="" background_image="" background_position="left top" background_repeat="no-repeat" background_blend_mode="none" animation_type="" animation_direction="left" animation_speed="0.3" animation_offset="" filter_type="regular" filter_hue="0" filter_saturation="100" filter_brightness="100" filter_contrast="100" filter_invert="0" filter_sepia="0" filter_opacity="100" filter_blur="0" filter_hue_hover="0" filter_saturation_hover="100" filter_brightness_hover="100" filter_contrast_hover="100" filter_invert_hover="0" filter_sepia_hover="0" filter_opacity_hover="100" filter_blur_hover="0" last="no"]';
                    $header_typology_category .= '[/fusion_builder_column]';
                    $header_typology_category .= '[fusion_builder_column type="1_4" layout="1_4" link="" target="_self" hide_on_mobile="small-visibility,medium-visibility,large-visibility" background_image_id="" spacing="" center_content="yes" min_height="" class="" id="icone-categorie" hover_type="none" border_size="0" border_color="" border_style="solid" border_position="all" border_radius_top_left="" border_radius_top_right="" border_radius_bottom_right="" border_radius_bottom_left="" box_shadow="no" box_shadow_vertical="" box_shadow_horizontal="" box_shadow_blur="0" box_shadow_spread="0" box_shadow_color="" box_shadow_style="" padding_top="" padding_right="" padding_bottom="" padding_left="" margin_top="0px" margin_bottom="0px" background_type="single" gradient_start_color="" gradient_end_color="" gradient_start_position="0" gradient_end_position="100" gradient_type="linear" radial_direction="center" linear_angle="180" background_color="" background_image="" background_position="left top" background_repeat="no-repeat" background_blend_mode="none" animation_type="" animation_direction="left" animation_speed="0.3" animation_offset="" filter_type="regular" filter_hue="0" filter_saturation="100" filter_brightness="100" filter_contrast="100" filter_invert="0" filter_sepia="0" filter_opacity="100" filter_blur="0" filter_hue_hover="0" filter_saturation_hover="100" filter_brightness_hover="100" filter_contrast_hover="100" filter_invert_hover="0" filter_sepia_hover="0" filter_opacity_hover="100" filter_blur_hover="0" last="no"]';
                    $header_typology_category .= '[fusion_images picture_size="auto" hover_type="liftup" autoplay="no" columns="6" column_spacing="0" scroll_items="" show_nav="no" mouse_scroll="no" border="no" lightbox="no" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="icone-categorie" id=""] ';

                    if ($CATEGORIA != null) {
                        $array_of_name = [];

                        foreach ($CATEGORIA as $field_to_add) {
                            array_push($array_of_name, $field_to_add->name);
                        }

                        foreach (array_unique($array_of_name) as $field_desktop_categoty) {
                            switch ($field_desktop_categoty) {
                                case "Archeologia arte e storia":
                                    $icon_category = $archeologia_arte_e_storia;
                                    break;

                                case "Benessere":
                                    $icon_category = $benessere;
                                    break;

                                case "I sapori":
                                    $icon_category = $i_sapori;
                                    break;

                                case "Il mare":
                                    $icon_category = $il_mare;
                                    break;

                                case "La montagna":
                                    $icon_category = $la_montagna;
                                    break;

                                case "Le tradizioni":
                                    $icon_category = $le_tradizioni;
                                    break;

                                case "Paesi e culture":
                                    $icon_category = $paese_e_culture;
                                    break;

                                case "Vacanze nella natura":
                                    $icon_category = $vacanze_nella_natura;
                                    break;

                                default:
                                    $icon_category = null;
                            }

                            if ($icon_category != null) {
                                $header_typology_category .= $icon_category;
                            }
                        }
                    }

                    $header_typology_category .= '[/fusion_images]';
                    $header_typology_category .= '[/fusion_builder_column]';
                    $header_typology_category .= '[fusion_builder_column type="1_1" layout="1_1" link="" target="_self" hide_on_mobile="small-visibility,medium-visibility,large-visibility" background_image_id="" spacing="" center_content="no" min_height="" class="" id="" hover_type="none" border_size="0" border_color="" border_style="solid" border_position="all" border_radius_top_left="" border_radius_top_right="" border_radius_bottom_right="" border_radius_bottom_left="" box_shadow="no" box_shadow_vertical="" box_shadow_horizontal="" box_shadow_blur="0" box_shadow_spread="0" box_shadow_color="" box_shadow_style="" padding_top="" padding_right="" padding_bottom="" padding_left="" margin_top="0px" margin_bottom="0px" background_type="single" gradient_start_color="" gradient_end_color="" gradient_start_position="0" gradient_end_position="100" gradient_type="linear" radial_direction="center" linear_angle="180" background_color="" background_image="" background_position="left top" background_repeat="no-repeat" background_blend_mode="none" animation_type="" animation_direction="left" animation_speed="0.3" animation_offset="" filter_type="regular" filter_hue="0" filter_saturation="100" filter_brightness="100" filter_contrast="100" filter_invert="0" filter_sepia="0" filter_opacity="100" filter_blur="0" filter_hue_hover="0" filter_saturation_hover="100" filter_brightness_hover="100" filter_contrast_hover="100" filter_invert_hover="0" filter_sepia_hover="0" filter_opacity_hover="100" filter_blur_hover="0" last="no"]';
                    $header_typology_category .= '[fusion_separator style_type="single solid" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id="" sep_color="rgba(0,0,0,0.4)" top_margin="0.2%" bottom_margin="1%" border_size="4" icon="" icon_circle="" icon_circle_color="" width="" alignment="center" /]';
                    $header_typology_category .= '[/fusion_builder_column][/fusion_builder_row][/fusion_builder_container]';


                    /*** BODY DESKTOP **/
                    $body_desktop = '[fusion_builder_container admin_label="Info(DESKTOP)" hide_on_mobile="large-visibility" status="published" publish_date="" hundred_percent="yes" hundred_percent_height="no" hundred_percent_height_scroll="no" hundred_percent_height_center_content="yes" equal_height_columns="no" menu_anchor="storia" class="" id="" border_size="" border_color="" border_style="solid" margin_top="" margin_bottom="" padding_top="0px" padding_right="4%" padding_bottom="0px" padding_left="4%" gradient_start_color="" gradient_end_color="" gradient_start_position="0" gradient_end_position="100" gradient_type="linear" radial_direction="center" linear_angle="180" background_color="" background_image="" background_position="center center" background_repeat="no-repeat" fade="no" background_parallax="none" enable_mobile="no" parallax_speed="0.3" background_blend_mode="none" video_mp4="" video_webm="" video_ogv="" video_url="" video_aspect_ratio="16:9" video_loop="yes" video_mute="yes" video_preview_image="" filter_hue="0" filter_saturation="100" filter_brightness="100" filter_contrast="100" filter_invert="0" filter_sepia="0" filter_opacity="100" filter_blur="0" filter_hue_hover="0" filter_saturation_hover="100" filter_brightness_hover="100" filter_contrast_hover="100" filter_invert_hover="0" filter_sepia_hover="0" filter_opacity_hover="100" filter_blur_hover="0" admin_toggled="no"]';

                    $body_desktop_info = '[fusion_builder_row]';
                    $body_desktop_info .= '[fusion_builder_column type="1_5" layout="1_4" spacing="" center_content="no" link="" target="_self" min_height="" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id="" background_image_id="" background_color="" background_image="" background_position="left top" undefined="" background_repeat="no-repeat" hover_type="none" border_size="0" border_color="" border_style="solid" border_position="all" border_radius_top_left="" border_radius_top_right="" border_radius_bottom_left="" border_radius_bottom_right="" box_shadow="no" box_shadow_vertical="" box_shadow_horizontal="" box_shadow_blur="0" box_shadow_spread="0" box_shadow_color="" box_shadow_style="" padding_top="" padding_right="" padding_bottom="" padding_left="" margin_top="" margin_bottom="" animation_type="" animation_direction="left" animation_speed="0.3" animation_offset="" last="no"]';
                    $body_desktop_info .= '[fusion_text columns="" column_min_width="" column_spacing="" rule_style="default" rule_size="" rule_color="" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id="infotype"]';
                    $body_desktop_info .= 'Info e contatti';
                    $body_desktop_info .= '[/fusion_text]';
                    $body_desktop_info .= '[fusion_checklist icon="" iconcolor="#000000" circle="no" circlecolor="#ffffff" size="" divider="no" divider_color="" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id=""]';

                    $body_desktop_info .= get_central_body();

                    $body_desktop_info .= '[/fusion_checklist]';

                    $body_desktop_useful_links .= '[fusion_separator style_type="single solid" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id="" sep_color="" top_margin="" bottom_margin="2%" border_size="" icon="" icon_circle="" icon_circle_color="" width="" alignment="center" /]';
                    $body_desktop_useful_links .= '[fusion_text columns="" column_min_width="" column_spacing="" rule_style="default" rule_size="" rule_color="" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id="infotype"]';
                    $body_desktop_useful_links .= 'Link utili';
                    $body_desktop_useful_links .= '[/fusion_text]';
                    $body_desktop_useful_links .= '[fusion_checklist icon="fa-hotel fas" iconcolor="" circle="" circlecolor="#03a9f4" size="" divider="" divider_color="" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id=""]';

                    $body_desktop_useful_links .= get_useful_links_body();

                    $body_desktop_useful_links .= '[/fusion_checklist]';
                    $body_desktop_useful_links .= '[fusion_separator style_type="single solid" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id="" sep_color="" top_margin="" bottom_margin="2%" border_size="" icon="" icon_circle="" icon_circle_color="" width="" alignment="center" /]';

                    $body_desktop_mobile_information = '[fusion_text columns="" column_min_width="" column_spacing="" rule_style="default" rule_size="" rule_color="" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id="infotype"]';
                    $body_desktop_mobile_information .= 'Infomobilità';
                    $body_desktop_mobile_information .= '[/fusion_text]';
                    $body_desktop_mobile_information .= '[fusion_checklist icon="fa-hotel fas" iconcolor="" circle="" circlecolor="#03a9f4" size="" divider="" divider_color="" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id=""]';

                    if ($INFOMOBILITA != null) {
                        $body_desktop_mobile_information .= '[fusion_li_item icon="fa-shuttle-van fas"]';
                        $body_desktop_mobile_information .= $INFOMOBILITA;
                        $body_desktop_mobile_information .= '[/fusion_li_item]';
                    }

                    $body_desktop_mobile_information .= '[fusion_li_item icon="fa-train fas"]';
                    $body_desktop_mobile_information .= '<a href="http://www.rfi.it/rfi/LINEE-STAZIONI-TERRITORIO/Nelle-regioni/Molise">Rete Ferroviaria Italiana</a>';
                    $body_desktop_mobile_information .= '[/fusion_li_item]';
                    $body_desktop_mobile_information .= '[fusion_li_item icon="fa-tachometer-alt fas"]';
                    $body_desktop_mobile_information .= '<a href="https://www.cciss.it/web/cciss/situazione-della-viabilita">Viabilità</a>';
                    $body_desktop_mobile_information .= '[/fusion_li_item]';
                    $body_desktop_mobile_information .= '[/fusion_checklist][/fusion_builder_column]';

                    $body_desktop_central = '[fusion_builder_column type="3_5" layout="1_2" spacing="" center_content="no" link="" target="_self" min_height="" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id="" background_color="" background_image="" background_image_id="" background_position="left top" background_repeat="no-repeat" hover_type="none" border_size="0" border_color="" border_style="solid" border_position="all" border_radius="" box_shadow="no" dimension_box_shadow="" box_shadow_blur="0" box_shadow_spread="0" box_shadow_color="" box_shadow_style="" padding_top="" padding_right="" padding_bottom="" padding_left="" margin_top="" margin_bottom="" animation_type="" animation_direction="left" animation_speed="0.3" animation_offset="" last="no"]';
                    $body_desktop_central .= '[fusion_text columns="" column_min_width="" column_spacing="" rule_style="default" rule_size="" rule_color="" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id="infotype"]';
                    $body_desktop_central .= 'Descrizione';
                    $body_desktop_central .= '[/fusion_text]';
                    $body_desktop_central .= '[fusion_text columns="" column_min_width="" column_spacing="" rule_style="default" rule_size="" rule_color="" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id="" animation_type="" animation_direction="left" animation_speed="0.3" animation_offset=""]';
                    $body_desktop_central .= $DESCRIZIONE;
                    $body_desktop_central .= '[/fusion_text]';
                    $body_desktop_central .= '[fusion_text columns="" column_min_width="" column_spacing="" rule_style="default" rule_size="" rule_color="" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id="" animation_type="" animation_direction="left" animation_speed="0.3" animation_offset=""]';
                    $body_desktop_central .= $INFO_AGGIUNTIVE;
                    $body_desktop_central .= '[/fusion_text]';
                    $body_desktop_central .= '[fusion_separator style_type="single solid" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id="" sep_color="#968caf" top_margin="" bottom_margin="" border_size="" icon="" icon_circle="" icon_circle_color="" width="" alignment="center" /]';
                    $body_desktop_central .= '[fusion_builder_row_inner]';
                    $body_desktop_central .= '[fusion_builder_column_inner type="1_1" layout="1_2" spacing="" center_content="no" hover_type="none" link="" target="_self" min_height="" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id="" border_size="0" border_color="" border_style="solid" border_position="all" border_radius="" box_shadow="no" dimension_box_shadow="" box_shadow_blur="0" box_shadow_spread="0" box_shadow_color="" box_shadow_style="" padding_top="" padding_right="" padding_bottom="" padding_left="" dimension_margin="" background_type="single" background_color="" gradient_start_color="" gradient_end_color="" gradient_start_position="0" gradient_end_position="100" gradient_type="linear" radial_direction="center" linear_angle="180" background_image="" background_position="left top" background_repeat="no-repeat" background_blend_mode="none" animation_type="" animation_direction="left" animation_speed="0.3" animation_offset="" filter_type="regular" filter_hue="0" filter_saturation="100" filter_brightness="100" filter_contrast="100" filter_invert="0" filter_sepia="0" filter_opacity="100" filter_blur="0" filter_hue_hover="0" filter_saturation_hover="100" filter_brightness_hover="100" filter_contrast_hover="100" filter_invert_hover="0" filter_sepia_hover="0" filter_opacity_hover="100" filter_blur_hover="0" last="no"]';
                    $body_desktop_central .= '[fusion_imageframe image_id="6278|full" max_width="" style_type="" blur="" stylecolor="" hover_type="liftup" bordersize="" bordercolor="" borderradius="" align="none" lightbox="no" gallery_id="" lightbox_image="" lightbox_image_id="" alt="" link="" linktarget="_self" hide_on_mobile="small-visibility,medium-visibility,large-visibility" animation_type="" animation_direction="left" animation_speed="0.3" animation_offset="" class="" id=""]';
                    $body_desktop_central .= $IMG_GALLERIA_1;
                    $body_desktop_central .= '[/fusion_imageframe]';
                    $body_desktop_central .= '[/fusion_builder_column_inner]';
                    $body_desktop_central .= '[fusion_builder_column_inner type="1_1" layout="1_2" spacing="" center_content="no" hover_type="none" link="" target="_self" min_height="" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id="" border_size="0" border_color="" border_style="solid" border_position="all" box_shadow="no" box_shadow_blur="0" box_shadow_spread="0" box_shadow_color="" box_shadow_style="" background_type="single" background_color="" gradient_start_position="0" gradient_end_position="100" gradient_type="linear" radial_direction="center" linear_angle="180" background_image="" background_position="left top" background_repeat="no-repeat" background_blend_mode="none" animation_type="" animation_direction="left" animation_speed="0.3" animation_offset="" filter_type="regular" filter_hue="0" filter_saturation="100" filter_brightness="100" filter_contrast="100" filter_invert="0" filter_sepia="0" filter_opacity="100" filter_blur="0" filter_hue_hover="0" filter_saturation_hover="100" filter_brightness_hover="100" filter_contrast_hover="100" filter_invert_hover="0" filter_sepia_hover="0" filter_opacity_hover="100" filter_blur_hover="0" last="no"]';
                    $body_desktop_central .= '[fusion_imageframe image_id="6226|full" max_width="" style_type="" blur="" stylecolor="" hover_type="liftup" bordersize="" bordercolor="" borderradius="" align="none" lightbox="no" gallery_id="" lightbox_image="" lightbox_image_id="" alt="" link="" linktarget="_self" hide_on_mobile="small-visibility,medium-visibility,large-visibility" animation_type="" animation_direction="left" animation_speed="0.3" animation_offset="" class="" id=""]';
                    $body_desktop_central .= $IMG_GALLERIA_2;
                    $body_desktop_central .= '[/fusion_imageframe]';
                    $body_desktop_central .= '[/fusion_builder_column_inner]';
                    $body_desktop_central .= '[fusion_builder_column_inner type="1_1" layout="1_2" spacing="" center_content="no" hover_type="none" link="" target="_self" min_height="" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id="" border_size="0" border_color="" border_style="solid" border_position="all" box_shadow="no" box_shadow_blur="0" box_shadow_spread="0" box_shadow_color="" box_shadow_style="" background_type="single" background_color="" gradient_start_position="0" gradient_end_position="100" gradient_type="linear" radial_direction="center" linear_angle="180" background_image="" background_position="left top" background_repeat="no-repeat" background_blend_mode="none" animation_type="" animation_direction="left" animation_speed="0.3" animation_offset="" filter_type="regular" filter_hue="0" filter_saturation="100" filter_brightness="100" filter_contrast="100" filter_invert="0" filter_sepia="0" filter_opacity="100" filter_blur="0" filter_hue_hover="0" filter_saturation_hover="100" filter_brightness_hover="100" filter_contrast_hover="100" filter_invert_hover="0" filter_sepia_hover="0" filter_opacity_hover="100" filter_blur_hover="0" last="no"]';
                    $body_desktop_central .= '[fusion_imageframe image_id="6201|full" max_width="" style_type="" blur="" stylecolor="" hover_type="liftup" bordersize="" bordercolor="" borderradius="" align="none" lightbox="no" gallery_id="" lightbox_image="" lightbox_image_id="" alt="" link="" linktarget="_self" hide_on_mobile="small-visibility,medium-visibility,large-visibility" animation_type="" animation_direction="left" animation_speed="0.3" animation_offset="" class="" id=""]';
                    $body_desktop_central .= $IMG_GALLERIA_3;
                    $body_desktop_central .= '[/fusion_imageframe]';
                    $body_desktop_central .= '[/fusion_builder_column_inner]';
                    $body_desktop_central .= '[fusion_builder_column_inner type="1_1" layout="1_2" spacing="" center_content="no" hover_type="none" link="" target="_self" min_height="" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id="" border_size="0" border_color="" border_style="solid" border_position="all" box_shadow="no" box_shadow_blur="0" box_shadow_spread="0" box_shadow_color="" box_shadow_style="" background_type="single" background_color="" gradient_start_position="0" gradient_end_position="100" gradient_type="linear" radial_direction="center" linear_angle="180" background_image="" background_position="left top" background_repeat="no-repeat" background_blend_mode="none" animation_type="" animation_direction="left" animation_speed="0.3" animation_offset="" filter_type="regular" filter_hue="0" filter_saturation="100" filter_brightness="100" filter_contrast="100" filter_invert="0" filter_sepia="0" filter_opacity="100" filter_blur="0" filter_hue_hover="0" filter_saturation_hover="100" filter_brightness_hover="100" filter_contrast_hover="100" filter_invert_hover="0" filter_sepia_hover="0" filter_opacity_hover="100" filter_blur_hover="0" last="no"]';
                    $body_desktop_central .= '[fusion_imageframe image_id="5281|full" max_width="" style_type="" blur="" stylecolor="" hover_type="liftup" bordersize="" bordercolor="" borderradius="" align="none" lightbox="no" gallery_id="" lightbox_image="" lightbox_image_id="" alt="" link="" linktarget="_self" hide_on_mobile="small-visibility,medium-visibility,large-visibility" animation_type="" animation_direction="left" animation_speed="0.3" animation_offset="" class="" id=""]';
                    $body_desktop_central .= $IMG_GALLERIA_4;
                    $body_desktop_central .= '[/fusion_imageframe]';
                    $body_desktop_central .= '[/fusion_builder_column_inner]';
                    $body_desktop_central .= '[fusion_builder_column_inner type="1_1" layout="1_1" spacing="" center_content="no" hover_type="none" link="" target="_self" min_height="" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id="" border_size="0" border_color="" border_style="solid" border_position="all" border_radius="" box_shadow="no" dimension_box_shadow="" box_shadow_blur="0" box_shadow_spread="0" box_shadow_color="" box_shadow_style="" padding_top="" padding_right="" padding_bottom="" padding_left="" dimension_margin="" background_type="single" background_color="" gradient_start_color="" gradient_end_color="" gradient_start_position="0" gradient_end_position="100" gradient_type="linear" radial_direction="center" linear_angle="180" background_image="" background_position="left top" background_repeat="no-repeat" background_blend_mode="none" animation_type="" animation_direction="left" animation_speed="0.3" animation_offset="" filter_type="regular" filter_hue="0" filter_saturation="100" filter_brightness="100" filter_contrast="100" filter_invert="0" filter_sepia="0" filter_opacity="100" filter_blur="0" filter_hue_hover="0" filter_saturation_hover="100" filter_brightness_hover="100" filter_contrast_hover="100" filter_invert_hover="0" filter_sepia_hover="0" filter_opacity_hover="100" filter_blur_hover="0" last="no"]';
                    $body_desktop_central .= '[fusion_imageframe image_id="5207|full" max_width="" style_type="" blur="" stylecolor="" hover_type="liftup" bordersize="" bordercolor="" borderradius="" align="none" lightbox="no" gallery_id="" lightbox_image="" lightbox_image_id="" alt="" link="" linktarget="_self" hide_on_mobile="small-visibility,medium-visibility,large-visibility" animation_type="" animation_direction="left" animation_speed="0.3" animation_offset="" class="" id=""]';
                    $body_desktop_central .= $IMG_GALLERIA_5;
                    $body_desktop_central .= '[/fusion_imageframe]';
                    $body_desktop_central .= '[/fusion_builder_column_inner]';
                    $body_desktop_central .= '[/fusion_builder_row_inner]';
                    $body_desktop_central .= '[/fusion_builder_column]';

                    $body_desktop_service = '[fusion_builder_column type="1_5" layout="1_3" spacing="" center_content="no" link="" target="_self" min_height="" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id="" background_color="" background_image="" background_image_id="" background_position="left top" background_repeat="no-repeat" hover_type="none" border_size="0" border_color="" border_style="solid" border_position="all" border_radius="" box_shadow="no" dimension_box_shadow="" box_shadow_blur="0" box_shadow_spread="0" box_shadow_color="" box_shadow_style="" padding_top="" padding_right="" padding_bottom="" padding_left="" margin_top="" margin_bottom="" animation_type="" animation_direction="left" animation_speed="0.3" animation_offset="" last="no"]';

                    $body_desktop_service .= get_services_body();

                    $body_desktop_service .= '[/fusion_checklist][/fusion_builder_column][/fusion_builder_row][/fusion_builder_container]';


                    /*** BODY MOBILE **/
                    $body_mobile = '[fusion_builder_container admin_label="Info(TABLET E SMARTPHONE)" hide_on_mobile="small-visibility,medium-visibility" status="published" publish_date="" hundred_percent="yes" hundred_percent_height="no" hundred_percent_height_scroll="no" hundred_percent_height_center_content="yes" equal_height_columns="no" menu_anchor="storia" class="" id="" border_size="" border_color="" border_style="solid" margin_top="4%" margin_bottom="4%" padding_top="0px" padding_right="4%" padding_bottom="0px" padding_left="4%" gradient_start_color="" gradient_end_color="" gradient_start_position="0" gradient_end_position="100" gradient_type="linear" radial_direction="center" linear_angle="180" background_color="" background_image="" background_position="center center" background_repeat="no-repeat" fade="no" background_parallax="none" enable_mobile="no" parallax_speed="0.3" background_blend_mode="none" video_mp4="" video_webm="" video_ogv="" video_url="" video_aspect_ratio="16:9" video_loop="yes" video_mute="yes" video_preview_image="" filter_hue="0" filter_saturation="100" filter_brightness="100" filter_contrast="100" filter_invert="0" filter_sepia="0" filter_opacity="100" filter_blur="0" filter_hue_hover="0" filter_saturation_hover="100" filter_brightness_hover="100" filter_contrast_hover="100" filter_invert_hover="0" filter_sepia_hover="0" filter_opacity_hover="100" filter_blur_hover="0" admin_toggled="no"]';

                    $body_mobile_central = '[fusion_builder_row]';
                    $body_mobile_central .= '[fusion_builder_column type="1_1" layout="1_1" spacing="" center_content="no" link="" target="_self" min_height="" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id="" background_image_id="" background_color="" background_image="" background_position="left top" undefined="" background_repeat="no-repeat" hover_type="none" border_size="0" border_color="" border_style="solid" border_position="all" border_radius_top_left="" border_radius_top_right="" border_radius_bottom_left="" border_radius_bottom_right="" box_shadow="no" box_shadow_vertical="" box_shadow_horizontal="" box_shadow_blur="" box_shadow_spread="" box_shadow_color="" box_shadow_style="" padding_top="" padding_right="" padding_bottom="" padding_left="" margin_top="" margin_bottom="" animation_type="" animation_direction="left" animation_speed="0.3" animation_offset="" last="no"]';
                    $body_mobile_central .= '[fusion_text columns="" column_min_width="" column_spacing="" rule_style="default" rule_size="" rule_color="" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id="infotype"]';
                    $body_mobile_central .= 'Descrizione';
                    $body_mobile_central .= '[/fusion_text]';
                    $body_mobile_central .= '[fusion_text columns="" column_min_width="" column_spacing="" rule_style="default" rule_size="" rule_color="" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id="" animation_type="" animation_direction="left" animation_speed="0.3" animation_offset=""]';
                    $body_mobile_central .= $DESCRIZIONE;
                    $body_mobile_central .= '[/fusion_text]';
                    $body_mobile_central .= '[fusion_separator style_type="single solid" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id="" sep_color="" top_margin="" bottom_margin="2%" border_size="" icon="" icon_circle="" icon_circle_color="" width="" alignment="center" /]';
                    $body_mobile_central .= '[fusion_text columns="" column_min_width="" column_spacing="" rule_style="default" rule_size="" rule_color="" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id="" animation_type="" animation_direction="left" animation_speed="0.3" animation_offset=""]';
                    $body_mobile_central .= $INFO_AGGIUNTIVE;
                    $body_mobile_central .= '[/fusion_text]';
                    $body_mobile_central .= '[fusion_separator style_type="single solid" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id="" sep_color="" top_margin="" bottom_margin="2%" border_size="" icon="" icon_circle="" icon_circle_color="" width="" alignment="center" /]';

                    $body_mobile_info = '[fusion_text columns="" column_min_width="" column_spacing="" rule_style="default" rule_size="" rule_color="" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id="infotype"]';
                    $body_mobile_info .= 'Info e contatti';
                    $body_mobile_info .= '[/fusion_text]';
                    $body_mobile_info .= '[fusion_checklist icon="" iconcolor="#000000" circle="no" circlecolor="#ffffff" size="" divider="no" divider_color="" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id=""]';

                    $body_mobile_info .= get_central_body();

                    $body_mobile_info .= '[/fusion_checklist]';
                    $body_mobile_info .= '[fusion_separator style_type="single solid" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id="" sep_color="" top_margin="" bottom_margin="2%" border_size="" icon="" icon_circle="" icon_circle_color="" width="" alignment="center" /]';

                    $body_mobile_info .= get_services_body();

                    $body_mobile_service .= '[/fusion_checklist]';

                    $body_mobile_useful_links = '[fusion_text columns="" column_min_width="" column_spacing="" rule_style="default" rule_size="" rule_color="" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id="infotype"]';
                    $body_mobile_useful_links .= 'Link utili';
                    $body_mobile_useful_links .= '[/fusion_text]';
                    $body_mobile_useful_links .= '[fusion_checklist icon="fa-hotel fas" iconcolor="" circle="" circlecolor="#03a9f4" size="" divider="" divider_color="" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id=""]';

                    $body_mobile_useful_links .= get_useful_links_body();

                    $body_mobile_useful_links .= '[/fusion_checklist]';
                    $body_mobile_useful_links .= '[fusion_separator style_type="single solid" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id="" sep_color="" top_margin="" bottom_margin="2%" border_size="" icon="" icon_circle="" icon_circle_color="" width="" alignment="center" /]';

                    $body_mobile_mobile_information = '[fusion_text columns="" column_min_width="" column_spacing="" rule_style="default" rule_size="" rule_color="" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id="infotype"]';
                    $body_mobile_mobile_information .= 'Infomobilità';
                    $body_mobile_mobile_information .= '[/fusion_text]';
                    $body_mobile_mobile_information .= '[fusion_checklist icon="fa-hotel fas" iconcolor="" circle="" circlecolor="#03a9f4" size="" divider="" divider_color="" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id=""]';

                    if ($INFOMOBILITA != null) {
                        $body_mobile_mobile_information .= '[fusion_li_item icon="fa-shuttle-van fas"]';
                        $body_mobile_mobile_information .= $INFOMOBILITA;
                        $body_mobile_mobile_information .= '[/fusion_li_item]';
                    }

                    $body_mobile_mobile_information .= '[fusion_li_item icon="fa-train fas"]';
                    $body_mobile_mobile_information .= '<a href="http://www.rfi.it/rfi/LINEE-STAZIONI-TERRITORIO/Nelle-regioni/Molise">Rete Ferroviaria Italiana</a>';
                    $body_mobile_mobile_information .= '[/fusion_li_item]';
                    $body_mobile_mobile_information .= '[fusion_li_item icon="fa-tachometer-alt fas"]';
                    $body_mobile_mobile_information .= '<a href="https://www.cciss.it/web/cciss/situazione-della-viabilita">Viabilità</a>';
                    $body_mobile_mobile_information .= '[/fusion_li_item]';

                    $body_mobile_mobile_information .= '[fusion_separator style_type="single solid" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id="" sep_color="" top_margin="" bottom_margin="2%" border_size="" icon="" icon_circle="" icon_circle_color="" width="" alignment="center" /]';

                    $body_mobile_mobile_information .= '[fusion_builder_row_inner]';
                    $body_mobile_mobile_information .= '[fusion_builder_column_inner type="1_1" layout="1_2" spacing="" center_content="no" hover_type="none" link="" target="_self" min_height="" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id="" border_size="0" border_color="" border_style="solid" border_position="all" border_radius="" box_shadow="no" dimension_box_shadow="" box_shadow_blur="0" box_shadow_spread="0" box_shadow_color="" box_shadow_style="" padding_top="" padding_right="" padding_bottom="" padding_left="" dimension_margin="" background_type="single" background_color="" gradient_start_color="" gradient_end_color="" gradient_start_position="0" gradient_end_position="100" gradient_type="linear" radial_direction="center" linear_angle="180" background_image="" background_position="left top" background_repeat="no-repeat" background_blend_mode="none" animation_type="" animation_direction="left" animation_speed="0.3" animation_offset="" filter_type="regular" filter_hue="0" filter_saturation="100" filter_brightness="100" filter_contrast="100" filter_invert="0" filter_sepia="0" filter_opacity="100" filter_blur="0" filter_hue_hover="0" filter_saturation_hover="100" filter_brightness_hover="100" filter_contrast_hover="100" filter_invert_hover="0" filter_sepia_hover="0" filter_opacity_hover="100" filter_blur_hover="0" last="no"]';
                    $body_mobile_mobile_information .= '[fusion_imageframe image_id="6278|full" max_width="" style_type="" blur="" stylecolor="" hover_type="liftup" bordersize="" bordercolor="" borderradius="" align="none" lightbox="no" gallery_id="" lightbox_image="" lightbox_image_id="" alt="" link="" linktarget="_self" hide_on_mobile="small-visibility,medium-visibility,large-visibility" animation_type="" animation_direction="left" animation_speed="0.3" animation_offset="" class="" id=""]';
                    $body_mobile_mobile_information .= $IMG_GALLERIA_1;
                    $body_mobile_mobile_information .= '[/fusion_imageframe]';
                    $body_mobile_mobile_information .= '[/fusion_builder_column_inner]';
                    $body_mobile_mobile_information .= '[fusion_builder_column_inner type="1_1" layout="1_2" spacing="" center_content="no" hover_type="none" link="" target="_self" min_height="" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id="" border_size="0" border_color="" border_style="solid" border_position="all" box_shadow="no" box_shadow_blur="0" box_shadow_spread="0" box_shadow_color="" box_shadow_style="" background_type="single" background_color="" gradient_start_position="0" gradient_end_position="100" gradient_type="linear" radial_direction="center" linear_angle="180" background_image="" background_position="left top" background_repeat="no-repeat" background_blend_mode="none" animation_type="" animation_direction="left" animation_speed="0.3" animation_offset="" filter_type="regular" filter_hue="0" filter_saturation="100" filter_brightness="100" filter_contrast="100" filter_invert="0" filter_sepia="0" filter_opacity="100" filter_blur="0" filter_hue_hover="0" filter_saturation_hover="100" filter_brightness_hover="100" filter_contrast_hover="100" filter_invert_hover="0" filter_sepia_hover="0" filter_opacity_hover="100" filter_blur_hover="0" last="no"]';
                    $body_mobile_mobile_information .= '[fusion_imageframe image_id="6226|full" max_width="" style_type="" blur="" stylecolor="" hover_type="liftup" bordersize="" bordercolor="" borderradius="" align="none" lightbox="no" gallery_id="" lightbox_image="" lightbox_image_id="" alt="" link="" linktarget="_self" hide_on_mobile="small-visibility,medium-visibility,large-visibility" animation_type="" animation_direction="left" animation_speed="0.3" animation_offset="" class="" id=""]';
                    $body_mobile_mobile_information .= $IMG_GALLERIA_2;
                    $body_mobile_mobile_information .= '[/fusion_imageframe]';
                    $body_mobile_mobile_information .= '[/fusion_builder_column_inner]';
                    $body_mobile_mobile_information .= '[fusion_builder_column_inner type="1_1" layout="1_2" spacing="" center_content="no" hover_type="none" link="" target="_self" min_height="" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id="" border_size="0" border_color="" border_style="solid" border_position="all" box_shadow="no" box_shadow_blur="0" box_shadow_spread="0" box_shadow_color="" box_shadow_style="" background_type="single" background_color="" gradient_start_position="0" gradient_end_position="100" gradient_type="linear" radial_direction="center" linear_angle="180" background_image="" background_position="left top" background_repeat="no-repeat" background_blend_mode="none" animation_type="" animation_direction="left" animation_speed="0.3" animation_offset="" filter_type="regular" filter_hue="0" filter_saturation="100" filter_brightness="100" filter_contrast="100" filter_invert="0" filter_sepia="0" filter_opacity="100" filter_blur="0" filter_hue_hover="0" filter_saturation_hover="100" filter_brightness_hover="100" filter_contrast_hover="100" filter_invert_hover="0" filter_sepia_hover="0" filter_opacity_hover="100" filter_blur_hover="0" last="no"]';
                    $body_mobile_mobile_information .= '[fusion_imageframe image_id="6201|full" max_width="" style_type="" blur="" stylecolor="" hover_type="liftup" bordersize="" bordercolor="" borderradius="" align="none" lightbox="no" gallery_id="" lightbox_image="" lightbox_image_id="" alt="" link="" linktarget="_self" hide_on_mobile="small-visibility,medium-visibility,large-visibility" animation_type="" animation_direction="left" animation_speed="0.3" animation_offset="" class="" id=""]';
                    $body_mobile_mobile_information .= $IMG_GALLERIA_3;
                    $body_mobile_mobile_information .= '[/fusion_imageframe]';
                    $body_mobile_mobile_information .= '[/fusion_builder_column_inner]';
                    $body_mobile_mobile_information .= '[fusion_builder_column_inner type="1_1" layout="1_2" spacing="" center_content="no" hover_type="none" link="" target="_self" min_height="" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id="" border_size="0" border_color="" border_style="solid" border_position="all" box_shadow="no" box_shadow_blur="0" box_shadow_spread="0" box_shadow_color="" box_shadow_style="" background_type="single" background_color="" gradient_start_position="0" gradient_end_position="100" gradient_type="linear" radial_direction="center" linear_angle="180" background_image="" background_position="left top" background_repeat="no-repeat" background_blend_mode="none" animation_type="" animation_direction="left" animation_speed="0.3" animation_offset="" filter_type="regular" filter_hue="0" filter_saturation="100" filter_brightness="100" filter_contrast="100" filter_invert="0" filter_sepia="0" filter_opacity="100" filter_blur="0" filter_hue_hover="0" filter_saturation_hover="100" filter_brightness_hover="100" filter_contrast_hover="100" filter_invert_hover="0" filter_sepia_hover="0" filter_opacity_hover="100" filter_blur_hover="0" last="no"]';
                    $body_mobile_mobile_information .= '[fusion_imageframe image_id="5281|full" max_width="" style_type="" blur="" stylecolor="" hover_type="liftup" bordersize="" bordercolor="" borderradius="" align="none" lightbox="no" gallery_id="" lightbox_image="" lightbox_image_id="" alt="" link="" linktarget="_self" hide_on_mobile="small-visibility,medium-visibility,large-visibility" animation_type="" animation_direction="left" animation_speed="0.3" animation_offset="" class="" id=""]';
                    $body_mobile_mobile_information .= $IMG_GALLERIA_4;
                    $body_mobile_mobile_information .= '[/fusion_imageframe]';
                    $body_mobile_mobile_information .= '[/fusion_builder_column_inner]';
                    $body_mobile_mobile_information .= '[fusion_builder_column_inner type="1_1" layout="1_1" spacing="" center_content="no" hover_type="none" link="" target="_self" min_height="" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id="" border_size="0" border_color="" border_style="solid" border_position="all" border_radius="" box_shadow="no" dimension_box_shadow="" box_shadow_blur="0" box_shadow_spread="0" box_shadow_color="" box_shadow_style="" padding_top="" padding_right="" padding_bottom="" padding_left="" dimension_margin="" background_type="single" background_color="" gradient_start_color="" gradient_end_color="" gradient_start_position="0" gradient_end_position="100" gradient_type="linear" radial_direction="center" linear_angle="180" background_image="" background_position="left top" background_repeat="no-repeat" background_blend_mode="none" animation_type="" animation_direction="left" animation_speed="0.3" animation_offset="" filter_type="regular" filter_hue="0" filter_saturation="100" filter_brightness="100" filter_contrast="100" filter_invert="0" filter_sepia="0" filter_opacity="100" filter_blur="0" filter_hue_hover="0" filter_saturation_hover="100" filter_brightness_hover="100" filter_contrast_hover="100" filter_invert_hover="0" filter_sepia_hover="0" filter_opacity_hover="100" filter_blur_hover="0" last="no"]';
                    $body_mobile_mobile_information .= '[fusion_imageframe image_id="5207|full" max_width="" style_type="" blur="" stylecolor="" hover_type="liftup" bordersize="" bordercolor="" borderradius="" align="none" lightbox="no" gallery_id="" lightbox_image="" lightbox_image_id="" alt="" link="" linktarget="_self" hide_on_mobile="small-visibility,medium-visibility,large-visibility" animation_type="" animation_direction="left" animation_speed="0.3" animation_offset="" class="" id=""]';
                    $body_mobile_mobile_information .= $IMG_GALLERIA_5;
                    $body_mobile_mobile_information .= '[/fusion_imageframe]';
                    $body_mobile_mobile_information .= '[/fusion_builder_column_inner]';
                    $body_mobile_mobile_information .= '[/fusion_builder_row_inner]';

                    $body_mobile_mobile_information .= '[/fusion_checklist][/fusion_builder_column][/fusion_builder_row][/fusion_builder_container]';

                    $all = $header_desktop . $header_mobile . $header_typology_category . $body_desktop . $body_desktop_info . $body_desktop_useful_links . $body_desktop_mobile_information . $body_desktop_central . $body_desktop_service . $body_mobile . $body_mobile_central . $body_mobile_info . $body_mobile_service . $body_mobile_useful_links . $body_mobile_mobile_information;

                    echo do_shortcode($all);
                    ?>
                    <?php fusion_link_pages(); ?>
                </div>

                <?php if (!post_password_required($post->ID)) : ?>
                    <?php if ('' === Avada()->settings->get('blog_post_meta_position') || 'below_article' === Avada()->settings->get('blog_post_meta_position') || 'disabled' === Avada()->settings->get('blog_post_title')) : ?>
                        <?php echo avada_render_post_metadata('single'); // phpcs:ignore WordPress.Security.EscapeOutput ?>
                    <?php endif; ?>
                    <?php do_action('avada_before_additional_post_content'); ?>
                    <?php avada_render_social_sharing(); ?>
                    <?php $author_info = get_post_meta($post->ID, 'pyre_author_info', true); ?>
                    <?php if ((Avada()->settings->get('author_info') && 'no' !== $author_info) || (!Avada()->settings->get('author_info') && 'yes' === $author_info)) : ?>
                        <section class="about-author">
                            <?php ob_start(); ?>
                            <?php the_author_posts_link(); ?>
                            <?php /* translators: The link. */ ?>
                            <?php $title = sprintf(__('About the Author: %s', 'Avada'), ob_get_clean()); // phpcs:ignore WordPress.WP.GlobalVariablesOverride ?>
                            <?php $title_size = (false === avada_is_page_title_bar_enabled($post->ID) ? '2' : '3'); ?>
                            <?php Avada()->template->title_template($title, $title_size); ?>
                            <div class="about-author-container">
                                <div class="avatar">
                                    <?php echo get_avatar(get_the_author_meta('email'), '72'); ?>
                                </div>
                                <div class="description">
                                    <?php the_author_meta('description'); ?>
                                </div>
                            </div>
                        </section>
                    <?php endif; ?>
                    <?php avada_render_related_posts(get_post_type()); // Render Related Posts. ?>

                    <?php $post_comments = get_post_meta($post->ID, 'pyre_post_comments', true); ?>
                    <?php if ((Avada()->settings->get('blog_comments') && 'no' !== $post_comments) || (!Avada()->settings->get('blog_comments') && 'yes' === $post_comments)) : ?>
                        <?php comments_template(); ?>
                    <?php endif; ?>
                    <?php do_action('avada_after_additional_post_content'); ?>
                <?php endif; ?>
            </article>
        <?php endwhile; ?>
    </section>
<?php do_action('avada_after_content'); ?>
<?php get_footer(); ?>

<?php
function name_split($name)
{
    return substr($name, strlen($name) - 3, 2);
}

function get_central_body()
{
    $body = "";

    if ($GLOBALS["SOCIETA_ASSOCIAZIONE"] != null) {
        $body .= '[fusion_li_item icon="fa-globe fas"]';
        $body .= 'Società/Associazione: ' . $GLOBALS["SOCIETA_ASSOCIAZIONE"];
        $body .= '[/fusion_li_item]';
    }

    if ($GLOBALS["SITO_WEB"] != null) {
        $body .= '[fusion_li_item icon="fa-globe fas"]';
        $body .= '<a href="' . $GLOBALS["SITO_WEB"] . '">' . $GLOBALS["SITO_WEB"] . '</a>';
        $body .= '[/fusion_li_item]';
    }

    if ($GLOBALS["TELEFONO"] != null) {
        $body .= '[fusion_li_item icon="fa-phone fas"]';
        $body .= '<a href="tel://' . $GLOBALS["TELEFONO"] . '">' . $GLOBALS["TELEFONO"] . '</a>';

        if ($GLOBALS["TELEFONO1"] != null) {
            $body .= '<br><a href="tel://' . $GLOBALS["TELEFONO1"] . '">' . $GLOBALS["TELEFONO1"] . '</a>';
        }

        $body .= '[/fusion_li_item]';
    }

    if ($GLOBALS["EMAIL"] != null) {
        $body .= '[fusion_li_item icon="fa-envelope far"]';
        $body .= '<a href=mailto://' . $GLOBALS["EMAIL"] . '">' . $GLOBALS["EMAIL"] . '</a>';

        if ($GLOBALS["EMAIL1"] != null) {
            $body .= '<br><a href="mailto://' . $GLOBALS["EMAIL1"] . '">' . $GLOBALS["EMAIL1"] . '</a>';
        }

        $body .= '[/fusion_li_item]';
    }

    if (($GLOBALS["INDIRIZZO"] != null) && ($GLOBALS["COMUNE"] != null) && ($GLOBALS["PROVINCIA"] != null)) {
        $body .= '[fusion_li_item icon="fa-map-marker-alt fas"]';
        $body .= $GLOBALS["INDIRIZZO"];
        $body .= '<br>' . $GLOBALS["COMUNE"] . ' (' . name_split($GLOBALS["PROVINCIA"]) . ')';
        $body .= '[/fusion_li_item]';
    }

    if ($GLOBALS["ORARI_APERTURA"] != null) {
        $body .= '[fusion_li_item icon="fa-clock far"]';
        $body .= 'Orario: ' . $GLOBALS["ORARI_APERTURA"];
        $body .= '[/fusion_li_item]';
    }

    if ($GLOBALS["GIORNO_DI_CHIUSURA"] != null) {
        $body .= '[fusion_li_item icon="fa-calendar-alt far"]';
        $body .= 'Giorno di chiusura: ';

        $i = sizeof($GLOBALS["GIORNO_DI_CHIUSURA"]) - 1;

        foreach ($GLOBALS["GIORNO_DI_CHIUSURA"] as $field_desktop_giorni_chiusura) {
            $body .= $field_desktop_giorni_chiusura;

            if ($i > 1) {
                $body .= ", ";
            } elseif ($i == 1) {
                $body .= " e ";
            }

            $i--;
        }

        $body .= '[/fusion_li_item]';
    }

    if ($GLOBALS["PERIODO_APERTURA"] != null) {
        $body .= '[fusion_li_item icon="fa-calendar-alt far"]';
        $body .= 'Periodo di apertura: ' . $GLOBALS["PERIODO_APERTURA"];
        $body .= '[/fusion_li_item]';
    }

    return $body;
}

function get_services_body()
{
    $body = "";

    if (($GLOBALS["DISTANZA"] != null) || ($GLOBALS["COSTO_BIGLIETTO"] != null) || ($GLOBALS["PACCHETTI_OFFERTI"] != null) || ($GLOBALS["LINK_ALLE_PROPOSTE"] != null) || (strstr($GLOBALS["VISITE_GUIDATE"], "Si")) || (!strstr($GLOBALS["STATO_CONSERVAZIONE"], "Non ci sono")) || ($GLOBALS["SERVIZI_OFFERTI"] != null) || ($GLOBALS["ALTRI_SERVIZI"] != null)) {
        $body .= '[fusion_text columns="" column_min_width="" column_spacing="" rule_style="default" rule_size="" rule_color="" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id="infotype"]';
        $body .= 'Servizi';
        $body .= '[/fusion_text]';
    }

    $body .= '[fusion_checklist icon="fa-check fas" iconcolor="" circle="" circlecolor="#03a9f4" size="" divider="yes" divider_color="" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id=""]';

    if ($GLOBALS["DISTANZA"] != null) {
        $body .= '[fusion_li_item icon="fa-arrows-alt-h fas"]';
        $body .= 'Distanza: ' . $GLOBALS["DISTANZA"] . ' km';
        $body .= '[/fusion_li_item]';
    }

    if ($GLOBALS["COSTO_BIGLIETTO"] != null) {
        $body .= '[fusion_li_item icon="fa-ticket-alt fas"]';
        $body .= 'Biglietti: €' . $GLOBALS["COSTO_BIGLIETTO"];
        $body .= '[/fusion_li_item]';
    }

    if ($GLOBALS["PACCHETTI_OFFERTI"] != null) {
        $body .= '[fusion_li_item icon="fa-shuttle-van fas"]';
        $body .= 'Proposte vacanze in Molise: ' . $GLOBALS["PACCHETTI_OFFERTI"];
        $body .= '[/fusion_li_item]';
    }

    if ($GLOBALS["LINK_ALLE_PROPOSTE"] != null) {
        $body .= '[fusion_li_item icon="fa-shuttle-van fas"]';
        $body .= 'Link alle proposte: ' . $GLOBALS["LINK_ALLE_PROPOSTE"];
        $body .= '[/fusion_li_item]';
    }

    if (strstr($GLOBALS["VISITE_GUIDATE"], "Si")) {
        $body .= '[fusion_li_item icon="fa-university fas"]';
        $body .= 'Visite Guidate';
        $body .= '[/fusion_li_item]';
    }

    if (strstr($GLOBALS["VISITE_GUIDATE"], "Si")) {
        $body .= '[fusion_li_item icon="fa-university fas"]';
        $body .= 'Descrizione visite guidate: ' . $GLOBALS["VISITE_GUIDATE"];
        $body .= '[/fusion_li_item]';
    }

    if (strstr($GLOBALS["VENDITA_AL_DETTAGLIO"], "Si")) {
        $body .= '[fusion_li_item icon="fa-store fas"]';
        $body .= 'Vendita al dettaglio';
        $body .= '[/fusion_li_item]';
    }

    if (!strstr($GLOBALS["STATO_CONSERVAZIONE"], "Non ci sono")) {
        $body .= '[fusion_li_item icon="fa-store fas"]';
        $body .= 'Stato conservazione: ' . $GLOBALS["STATO_CONSERVAZIONE"];
        $body .= '[/fusion_li_item]';
    }

    if ($GLOBALS["SERVIZI_OFFERTI"] != null) {
        foreach ($GLOBALS["SERVIZI_OFFERTI"] as $field_value) {
            $service_icon = get_service_icons($field_value);

            $body .= '[fusion_li_item icon="' . $service_icon . '"]';
            $body .= $field_value;
            $body .= '[/fusion_li_item]';
        }
    }

    if ($GLOBALS["ALTRI_SERVIZI"] != null) {
        $body .= get_other_service($GLOBALS["ALTRI_SERVIZI"]);
    }

    return $body;
}

function get_service_icons($field)
{
    switch ($field) {
        case "Parcheggio":
        case "Parcheggio gratuito":
        case "Parcheggio in strada":
        case "Parcheggio custodito":
        case "Parcheggio coperto":
            return "fa-parking fas";
            break;

        case "Servizi di noleggio":
            return "fa-hiking fas";
            break;

        case "Accessibile ai disabili":
            return "fa-wheelchair fas";
            break;

        case "Menù vegetariano":
        case "Menù carne":
        case "Menù pesce":
        case "Menù celiaci":
        case "Menù vegano":
        case "Cucina internazionale":
        case "Cucina locale":
        case "Degustazioni in loco":
        case "Forno a legna":
            return "fa-fish fas";
            break;

        case "Pagamento con carta":
            return "fa-credit-card far";
            break;

        case "Posto auto":
            return "fa-car-side fas";
            break;

        case "Posto bici":
        case "Sentieri escursionistici":
            return "fa-bicycle fas";
            break;

        case "Servizi spiaggia":
            return "fa-umbrella-beach fas";
            break;

        case "Piscina":
            return "fa-swimmer fas";
            break;

        case "Animali ammessi":
            return "fa-paw fas";
            break;

        case "Maneggio":
            return "fa-horse fas";
            break;

        case "Beauty farm":
            return "fa-smile-beam fas";
            break;

        case "Free WIFI":
            return "fa-wifi fas";
            break;

        case "Servizio in camera":
            return "fa-toilet-paper fas";
            break;

        case "Per famiglie con bambini":
            return "fa-baby fas";
            break;

        case "Noleggio pedalò/attrezzature marine":
            return "fa-water fas";
            break;

        case "Area camper":
            return "fa-bus fas";
            break;

        case "Area picnic":
        case "Ristorante":
            return "fa-drumstick-bite fas";
            break;

        case "Bar":
            return "fa-cocktail fas";
            break;

        case "Palestra":
            return "fa-dumbbell fas";
            break;

        default:
            return "";
            break;
    }
}

function get_other_service($list)
{
    $body = "";

    $array = explode("|", $list);

    foreach ($array as $element) {
        $body .= '[fusion_li_item icon=""]';
        $body .= trim($element);
        $body .= '[/fusion_li_item]';
    }

    return $body;
}

function get_useful_links_body()
{
    $body = "";

    if ($GLOBALS["GOOGLE_MAPS"] != null) {
        $body .= '[fusion_li_item icon="fa-location-arrow fas"]';
        $body .= '<a href="http://maps.google.com/maps?q=' . $GLOBALS["LAT"] . ',' . $GLOBALS["LONG"] . '">GOOGLE MAPS</a>';
        $body .= '[/fusion_li_item]';
    }

    if ($GLOBALS["GOOGLE_MAPS_PUNTO_VENDITA"] != null) {
        $body .= '[fusion_li_item icon="fa-location-arrow fas"]';
        $body .= '<a href="' . $GLOBALS["GOOGLE_MAPS_PUNTO_VENDITA"] . '">GOOGLE MAPS (PUNTO VENDITA)</a>';
        $body .= '[/fusion_li_item]';
    }

    if ($GLOBALS["GOOGLE_MAPS_PRODUZIONE"] != null) {
        $body .= '[fusion_li_item icon="fa-location-arrow fas"]';
        $body .= '<a href="' . $GLOBALS["GOOGLE_MAPS_PRODUZIONE"] . '">GOOGLE MAPS (PUNTO PRODUZIONE)</a>';
        $body .= '[/fusion_li_item]';
    }

    if ($GLOBALS["TRIPADVISOR"] != null) {
        $body .= '[fusion_li_item icon="fa-tripadvisor fab"]';
        $body .= '<a href="' . $GLOBALS["TRIPADVISOR"] . '">TRIPADVISOR</a>';
        $body .= '[/fusion_li_item]';
    }

    if ($GLOBALS["BOOKING"] != null) {
        $body .= '[fusion_li_item icon="fa-book fas"]';
        $body .= '<a href="' . $GLOBALS["BOOKING"] . '">BOOKING</a>';
        $body .= '[/fusion_li_item]';
    }

    if ($GLOBALS["HOTELS_COM"] != null) {
        $body .= '[fusion_li_item icon="fa-hotel fas"]';
        $body .= '<a href="' . $GLOBALS["HOTELS_COM"] . '">HOTELS.COM</a>';
        $body .= '[/fusion_li_item]';
    }

    if ($GLOBALS["AIRBNB"] != null) {
        $body .= '[fusion_li_item icon="fa-airbnb fab"]';
        $body .= '<a href="' . $GLOBALS["AIRBNB"] . '">AIRBNB</a>';
        $body .= '[/fusion_li_item]';
    }

    if ($GLOBALS["FACEBOOK"] != null) {
        $body .= '[fusion_li_item icon="fa-map-signs fas"]';
        $body .= '<a href="' . $GLOBALS["FACEBOOK"] . '">FACEBOOK</a>';
        $body .= '[/fusion_li_item]';
    }

    if ($GLOBALS["FLICKR"] != null) {
        $body .= '[fusion_li_item icon="fa-map-signs fas"]';
        $body .= '<a href="' . $GLOBALS["FLICKR"] . '">FLICKR</a>';
        $body .= '[/fusion_li_item]';
    }

    if ($GLOBALS["GOOGLE"] != null) {
        $body .= '[fusion_li_item icon="fa-map-signs fas"]';
        $body .= '<a href="' . $GLOBALS["GOOGLE"] . '">GOOGLE</a>';
        $body .= '[/fusion_li_item]';
    }

    if ($GLOBALS["GOOGLE_PLUS"] != null) {
        $body .= '[fusion_li_item icon="fa-map-signs fas"]';
        $body .= '<a href="' . $GLOBALS["GOOGLE_PLUS"] . '">GOOGLE PLUS</a>';
        $body .= '[/fusion_li_item]';
    }

    if ($GLOBALS["INSTAGRAM"] != null) {
        $body .= '[fusion_li_item icon="fa-map-signs fas"]';
        $body .= '<a href="' . $GLOBALS["INSTAGRAM"] . '">INSTAGRAM</a>';
        $body .= '[/fusion_li_item]';
    }

    if ($GLOBALS["LINKEDIN"] != null) {
        $body .= '[fusion_li_item icon=""]';
        $body .= '<a href="' . $GLOBALS["LINKEDIN"] . '">LINKEDIN</a>';
        $body .= '[/fusion_li_item]';
    }

    if ($GLOBALS["PINTEREST"] != null) {
        $body .= '[fusion_li_item icon=""]';
        $body .= '<a href="' . $GLOBALS["PINTEREST"] . '">PINTEREST</a>';
        $body .= '[/fusion_li_item]';
    }

    if ($GLOBALS["TWITTER"] != null) {
        $body .= '[fusion_li_item icon=""]';
        $body .= '<a href="' . $GLOBALS["TWITTER"] . '">TWITTER</a>';
        $body .= '[/fusion_li_item]';
    }

    if ($GLOBALS["YOUTUBE"] != null) {
        $body .= '[fusion_li_item icon=""]';
        $body .= '<a href="' . $GLOBALS["YOUTUBE"] . '">YOUTUBE<a>';
        $body .= '[/fusion_li_item]';
    }

    if ($GLOBALS["TRIPADVISOR"] != null) {
        $body .= '[fusion_li_item icon=""]';
        $body .= '<a href="' . $GLOBALS["TRIPADVISOR"] . '">TRIPADVISOR</a>';
        $body .= '[/fusion_li_item]';
    }

    if ($GLOBALS["VALUTAZIONI_GOOGLE"] != null) {
        $body .= '[fusion_li_item icon="fa-google fab"]';
        $body .= '<a href="' . $GLOBALS["VALUTAZIONI_GOOGLE"] . '">VALUTAZIONI GOOGLE</a>';
        $body .= '[/fusion_li_item]';
    }

    return $body;
}

?>