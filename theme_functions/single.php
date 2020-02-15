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
                $categories = get_the_category();
                if ($categories[0]->slug != 'prova') {
                    the_content();
                } else {
                    /*** VARIABILI CAMPI TEMPLATE GENERALE - html_special_chars()   **/
                    $CAMPO_NOME_COMMERCIALE = htmlspecialchars(get_field('CAMPO_NOME_COMMERCIALE'));
                    $CAMPO_TIPOLOGIA = htmlspecialchars(get_field('CAMPO_TIPOLOGIA'));
                    $CAMPO_ALTRA_TIPOLOGIA = htmlspecialchars(get_field('CAMPO_ALTRA_TIPOLOGIA'));
                    $CAMPO_SOCIETA_ASSOCIAZIONE = htmlspecialchars(get_field('CAMPO_SOCIETA_ASSOCIAZIONE'));
                    $CAMPO_SITO_WEB = htmlspecialchars(get_field('CAMPO_SITO_WEB'));
                    $CAMPO_TELEFONO = htmlspecialchars(get_field('CAMPO_TELEFONO'));
                    $CAMPO_TELEFONO1 = htmlspecialchars(get_field('CAMPO_TELEFONO1'));
                    $CAMPO_EMAIL = htmlspecialchars(get_field('CAMPO_EMAIL'));
                    $CAMPO_EMAIL1 = htmlspecialchars(get_field('CAMPO_EMAIL1'));
                    $CAMPO_INDIRIZZO = htmlspecialchars(get_field('CAMPO_INDIRIZZO'));
                    $CAMPO_COMUNE = htmlspecialchars(get_field('CAMPO_COMUNE'));
                    $CAMPO_PROVINCIA = htmlspecialchars(get_field('CAMPO_PROVINCIA'));
                    $CAMPO_INDIRIZZO_PUNTO_VENDITA = htmlspecialchars(get_field('CAMPO_INDIRIZZO_PUNTO_VENDITA'));
                    $CAMPO_COMUNE_PUNTO_VENDITA = htmlspecialchars(get_field('CAMPO_COMUNE_PUNTO_VENDITA'));
                    $CAMPO_PROVINCIA_PUNTO_VENDITA = htmlspecialchars(get_field('CAMPO_PROVINCIA_PUNTO_VENDITA'));
                    $CAMPO_INDIRIZZO_PRODUZIONE = htmlspecialchars(get_field('CAMPO_INDIRIZZO_PRODUZIONE'));
                    $CAMPO_COMUNE_PRODUZIONE = htmlspecialchars(get_field('CAMPO_COMUNE_PRODUZIONE'));
                    $CAMPO_PROVINCIA_PRODUZIONE = htmlspecialchars(get_field('CAMPO_PROVINCIA_PRODUZIONE'));
                    $CAMPO_ORARI_APERTURA = htmlspecialchars(get_field('CAMPO_ORARI_APERTURA'));
                    $CAMPO_ORARI_APERTURA_PUNTO_VENDITA = htmlspecialchars(get_field('CAMPO_ORARI_APERTURA_PUNTO_VENDITA'));
                    $CAMPO_PERIODO_APERTURA = htmlspecialchars(get_field('$CAMPO_PERIODO_APERTURA'));
                    $CAMPO_GIORNO_DI_CHIUSURA = htmlspecialchars(get_field('CAMPO_GIORNO_DI_CHIUSURA'));
                    $CAMPO_GIORNO_DI_CHIUSURA_PRODUZIONE = htmlspecialchars(get_field('CAMPO_GIORNO_DI_CHIUSURA_PRODUZIONE'));
                    $CAMPO_GIORNO_DI_CHIUSURA_PUNTO_VENDITA = htmlspecialchars(get_field('CAMPO_GIORNO_DI_CHIUSURA_PUNTO_VENDITA'));
                    $CAMPO_DESCRIZIONE = htmlspecialchars(get_field('CAMPO_DESCRIZIONE'));
                    $CAMPO_INFO_AGGIUNTIVE = htmlspecialchars(get_field('CAMPO_INFO_AGGIUNTIVE'));
                    $CAMPO_DISTANZA = htmlspecialchars(get_field('CAMPO_DISTANZA'));
                    $CAMPO_COSTO_BIGLIETTO = htmlspecialchars(get_field('CAMPO_COSTO_BIGLIETTO'));
                    $CAMPO_PARCHEGGIO = htmlspecialchars(get_field('CAMPO_PARCHEGGIO'));
                    $CAMPO_PARCHEGGIO_GRATUITO = htmlspecialchars(get_field('CAMPO_PARCHEGGIO_GRATUITO'));
                    $CAMPO_PARCHEGGIO_IN_STRADA = htmlspecialchars(get_field('CAMPO_PARCHEGGIO_IN_STRADA'));
                    $CAMPO_PARCHEGGIO_CUSTODITO = htmlspecialchars(get_field('CAMPO_PARCHEGGIO_CUSTODITO'));
                    $CAMPO_SERVIZI_DI_NOLEGGIO = htmlspecialchars(get_field('CAMPO_SERVIZI_DI_NOLEGGIO'));
                    $CAMPO_PROPOSTE_VACANZE_IN_MOLISE = htmlspecialchars(get_field('CAMPO_PROPOSTE_VACANZE_IN_MOLISE'));
                    $CAMPO_VISITE_GUIDATE = htmlspecialchars(get_field('CAMPO_VISITE_GUIDATE'));
                    $CAMPO_MENU_CARNE = htmlspecialchars(get_field('CAMPO_MENU_CARNE'));
                    $CAMPO_MENU_VEGANO = htmlspecialchars(get_field('CAMPO_MENU_VEGANO'));
                    $CAMPO_CUCINA_INTERNAZIONALE = htmlspecialchars(get_field('CAMPO_CUCINA_INTERNAZIONALE'));
                    $CAMPO_GOOGLE_MAPS = htmlspecialchars(get_field('CAMPO_GOOGLE_MAPS'));
                    $CAMPO_GOOGLE_MAPS_VENDITA = htmlspecialchars(get_field('CAMPO_GOOGLE_MAPS_VENDITA'));
                    $CAMPO_GOOGLE_MAPS_PRODUZIONE = htmlspecialchars(get_field('CAMPO_GOOGLE_MAPS_PRODUZIONE'));
                    $CAMPO_TRIPADVISOR = htmlspecialchars(get_field('CAMPO_TRIPADVISOR'));
                    $CAMPO_HOTELS_COM = htmlspecialchars(get_field('CAMPO_HOTELS_COM'));
                    $CAMPO_AIRBNB = htmlspecialchars(get_field('CAMPO_AIRBNB'));
                    $CAMPO_FACEBOOK = htmlspecialchars(get_field('CAMPO_FACEBOOK'));
                    $CAMPO_FLICKR = htmlspecialchars(get_field('CAMPO_FLICKR'));
                    $CAMPO_GOOGLE = htmlspecialchars(get_field('CAMPO_GOOGLE'));
                    $CAMPO_GOOGLE_PLUS = htmlspecialchars(get_field('CAMPO_GOOGLE_PLUS'));
                    $CAMPO_INSTAGRAM = htmlspecialchars(get_field('CAMPO_INSTAGRAM'));
                    $CAMPO_LINKEDIN = htmlspecialchars(get_field('CAMPO_LINKEDIN'));
                    $CAMPO_PINTEREST = htmlspecialchars(get_field('CAMPO_PINTEREST'));
                    $CAMPO_TWITTER = htmlspecialchars(get_field('CAMPO_TWITTER'));
                    $CAMPO_YOUTUBE = htmlspecialchars(get_field('CAMPO_YOUTUBE'));
                    $CAMPO_YOUTUBE = htmlspecialchars(get_field('CAMPO_YOUTUBE'));
                    $CAMPO_TRIPADVISOR = htmlspecialchars(get_field('CAMPO_TRIPADVISOR'));
                    $CAMPO_VALUTAZIONI_GOOGLE = htmlspecialchars(get_field('CAMPO_VALUTAZIONI_GOOGLE'));
                    $CAMPO_INFOMOBILITA = htmlspecialchars(get_field('CAMPO_INFOMOBILITA'));

                    /*** IMAGES **/
                    $LINK_IMMAGINE_COPERTINA = esc_url(get_field('LINK_IMMAGINE_COPERTINA')['url']);
                    $LINK_IMMAGINE_LOGO = esc_url(get_field('LINK_IMMAGINE_LOGO')['url']);
                    $IMMAGINE_GALLERIA_1 = esc_url(get_field('IMMAGINE_GALLERIA_1')['url']);
                    $IMMAGINE_GALLERIA_2 = esc_url(get_field('IMMAGINE_GALLERIA_2')['url']);
                    $IMMAGINE_GALLERIA_3 = esc_url(get_field('IMMAGINE_GALLERIA_3')['url']);
                    $IMMAGINE_GALLERIA_4 = esc_url(get_field('IMMAGINE_GALLERIA_4')['url']);


                    /*** HEADER DESKTOP **/

                    $header_desktop = '[fusion_builder_container admin_label="Vista iniziale(DESKTOP)" hide_on_mobile="large-visibility" status="published" publish_date="" hundred_percent="yes" hundred_percent_height="yes" hundred_percent_height_scroll="no" hundred_percent_height_center_content="yes" equal_height_columns="yes" menu_anchor="" class="initialview" id="initialview" border_size="" border_color="" border_style="solid" margin_top="" margin_bottom="" padding_top="0px" padding_right="0px" padding_bottom="0px" padding_left="0px" gradient_start_color="" gradient_end_color="" gradient_start_position="0" gradient_end_position="100" gradient_type="linear" radial_direction="center" linear_angle="180" background_color="" background_image="';
                    $header_desktop .= $LINK_IMMAGINE_COPERTINA;
                    $header_desktop .= '" background_position="center center" background_repeat="no-repeat" fade="no" background_parallax="fixed" enable_mobile="no" parallax_speed="0.3" background_blend_mode="none" video_mp4="" video_webm="" video_ogv="" video_url="" video_aspect_ratio="16:9" video_loop="yes" video_mute="yes" video_preview_image="" filter_hue="0" filter_saturation="100" filter_brightness="100" filter_contrast="100" filter_invert="0" filter_sepia="0" filter_opacity="100" filter_blur="0" filter_hue_hover="0" filter_saturation_hover="100" filter_brightness_hover="100" filter_contrast_hover="100" filter_invert_hover="0" filter_sepia_hover="0" filter_opacity_hover="100" filter_blur_hover="0" admin_toggled="no"]';
                    $header_desktop .= '[fusion_builder_row]';
                    $header_desktop .= '[fusion_builder_column type="1_2" layout="1_2" spacing="" center_content="yes" link="" target="_self" min_height="" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id="" background_image_id="" background_color="" background_image="" background_position="left top" undefined="" background_repeat="no-repeat" hover_type="none" border_size="0" border_color="" border_style="solid" border_position="all" border_radius_top_left="" border_radius_top_right="" border_radius_bottom_left="" border_radius_bottom_right="" box_shadow="no" box_shadow_vertical="" box_shadow_horizontal="" box_shadow_blur="0" box_shadow_spread="0" box_shadow_color="" box_shadow_style="" padding_top="3%" padding_right="-10%" padding_bottom="3%" padding_left="-20%" margin_top="" margin_bottom="" animation_type="fade" animation_direction="left" animation_speed="0.3" animation_offset="" last="no"]';
                    $header_desktop .= '[fusion_title title_type="text" rotation_effect="bounceIn" display_time="1200" highlight_effect="circle" loop_animation="off" highlight_width="9" highlight_top_margin="0" rotation_text="" highlight_text="" after_text="" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id="" before_text="" content_align="center" size="1" font_size="" animated_font_size="" line_height="" letter_spacing="" margin_top="2%" margin_bottom="" margin_top_mobile="2%" margin_bottom_mobile="" text_color="#000000" animated_text_color="" highlight_color="" style_type="none" sep_color=""]';
                    $header_desktop .= $CAMPO_NOME_COMMERCIALE;
                    $header_desktop .= '[/fusion_title]';
                    $header_desktop .= '[fusion_separator style_type="single solid" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id="" sep_color="rgba(0,0,0,0.65)" top_margin="" bottom_margin="30" border_size="4" icon="" icon_circle="" icon_circle_color="" width="45%" alignment="center" /]';
                    $header_desktop .= '[fusion_button link="#storia" text_transform="uppercase" title="" target="_self" link_attributes="" alignment="center" modal="" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id="" color="custom" button_gradient_top_color="" button_gradient_bottom_color="" button_gradient_top_color_hover="" button_gradient_bottom_color_hover="" accent_color="#ffffff" accent_hover_color="#ffffff" type="" bevel_color="" border_width="4" size="" stretch="default" icon="" icon_position="left" icon_divider="no" animation_type="" animation_direction="left" animation_speed="0.3" animation_offset="" border_radius="" border_color="#ffffff" border_hover_color="#ffffff"]SCOPRI DI PIÙ[/fusion_button]';
                    $header_desktop .= '[/fusion_builder_column]';
                    $header_desktop .= '[fusion_builder_column type="1_2" layout="1_2" spacing="" center_content="yes" link="" target="_self" min_height="" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id="" background_image_id="" background_color="" background_image="" background_position="left top" undefined="" background_repeat="no-repeat" hover_type="none" border_size="0" border_color="" border_style="solid" border_position="all" border_radius_top_left="" border_radius_top_right="" border_radius_bottom_left="" border_radius_bottom_right="" box_shadow="no" box_shadow_vertical="" box_shadow_horizontal="" box_shadow_blur="0" box_shadow_spread="0" box_shadow_color="" box_shadow_style="" padding_top="3%" padding_right="-20%" padding_bottom="3%" padding_left="-10%" margin_top="20px" margin_bottom="20px" animation_type="fade" animation_direction="right" animation_speed="0.3" animation_offset="" last="no"]';
                    $header_desktop .= '[fusion_imageframe image_id="4923|full" max_width="" style_type="" blur="" stylecolor="" hover_type="liftup" bordersize="" bordercolor="" borderradius="" align="center" lightbox="no" gallery_id="" lightbox_image="" lightbox_image_id="" alt="" link="" linktarget="_self" hide_on_mobile="small-visibility,medium-visibility,large-visibility" animation_type="" animation_direction="right" animation_speed="0.3" animation_offset="" class="" id="logoImg"]';
                    $header_desktop .= $LINK_IMMAGINE_LOGO;
                    $header_desktop .= '[/fusion_imageframe]';
                    $header_desktop .= '[/fusion_builder_column][/fusion_builder_row][/fusion_builder_container]';


                    /*** HEADER MOBILE **/
                    $header_mobile = '[fusion_builder_container admin_label="Vista iniziale(TABLET E SMARTPHONE)" hide_on_mobile="small-visibility,medium-visibility" status="published" publish_date="" hundred_percent="yes" hundred_percent_height="yes" hundred_percent_height_scroll="no" hundred_percent_height_center_content="yes" equal_height_columns="yes" menu_anchor="" class="initialview" id="initialview" border_size="" border_color="" border_style="solid" margin_top="" margin_bottom="" padding_top="" padding_right="" padding_bottom="" padding_left="" gradient_start_color="" gradient_end_color="" gradient_start_position="0" gradient_end_position="100" gradient_type="linear" radial_direction="center" linear_angle="180" background_color="" background_image="';
                    $header_mobile .= 'CAMPO_IMAGE_COPERTINA';
                    $header_mobile .= '" background_position="center center" background_repeat="no-repeat" fade="no" background_parallax="none" enable_mobile="no" parallax_speed="0.3" background_blend_mode="none" video_mp4="" video_webm="" video_ogv="" video_url="" video_aspect_ratio="16:9" video_loop="yes" video_mute="yes" video_preview_image="" filter_hue="0" filter_saturation="100" filter_brightness="100" filter_contrast="100" filter_invert="0" filter_sepia="0" filter_opacity="100" filter_blur="0" filter_hue_hover="0" filter_saturation_hover="100" filter_brightness_hover="100" filter_contrast_hover="100" filter_invert_hover="0" filter_sepia_hover="0" filter_opacity_hover="100" filter_blur_hover="0" admin_toggled="yes"]';
                    $header_mobile .= '[fusion_builder_row]';
                    $header_mobile .= '[fusion_builder_column type="1_2" layout="1_2" spacing="" center_content="yes" link="" target="_self" min_height="" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id="" background_image_id="" background_color="" background_image="" background_position="left top" undefined="" background_repeat="no-repeat" hover_type="none" border_size="0" border_color="" border_style="solid" border_position="all" border_radius_top_left="" border_radius_top_right="" border_radius_bottom_left="" border_radius_bottom_right="" box_shadow="no" box_shadow_vertical="" box_shadow_horizontal="" box_shadow_blur="0" box_shadow_spread="0" box_shadow_color="" box_shadow_style="" padding_top="3%" padding_right="-20%" padding_bottom="3%" padding_left="-10%" margin_top="20px" margin_bottom="20px" animation_type="fade" animation_direction="right" animation_speed="0.3" animation_offset="" last="no"]';
                    $header_mobile .= '[fusion_imageframe image_id="4923|full" max_width="" style_type="" blur="" stylecolor="" hover_type="liftup" bordersize="" bordercolor="" borderradius="" align="center" lightbox="no" gallery_id="" lightbox_image="" lightbox_image_id="" alt="" link="" linktarget="_self" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id="logoImg" animation_type="" animation_direction="right" animation_speed="0.3" animation_offset=""]';
                    $header_mobile .= 'CAMPO_IMAGE_LOGO';
                    $header_mobile .= '[/fusion_imageframe]';
                    $header_mobile .= '[/fusion_builder_column]';
                    $header_mobile .= '[fusion_builder_column type="1_2" layout="1_2" spacing="" center_content="yes" link="" target="_self" min_height="" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id="" background_image_id="" background_color="" background_image="" background_position="left top" undefined="" background_repeat="no-repeat" hover_type="none" border_size="0" border_color="" border_style="solid" border_position="all" border_radius_top_left="" border_radius_top_right="" border_radius_bottom_left="" border_radius_bottom_right="" box_shadow="no" box_shadow_vertical="" box_shadow_horizontal="" box_shadow_blur="0" box_shadow_spread="0" box_shadow_color="" box_shadow_style="" padding_top="3%" padding_right="-10%" padding_bottom="3%" padding_left="-20%" margin_top="" margin_bottom="" animation_type="fade" animation_direction="left" animation_speed="0.3" animation_offset="" last="no"][fusion_separator style_type="single solid" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id="" sep_color="rgba(0,0,0,0.4)" top_margin="" bottom_margin="0.5%" border_size="4" icon="" icon_circle="" icon_circle_color="" width="" alignment="center" /]';
                    $header_mobile .= '[fusion_title title_type="text" rotation_effect="bounceIn" display_time="1200" highlight_effect="circle" loop_animation="off" highlight_width="9" highlight_top_margin="0" rotation_text="" highlight_text="" after_text="" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id="" before_text="" content_align="center" size="1" font_size="" animated_font_size="" line_height="" letter_spacing="" margin_top="2%" margin_bottom="" margin_top_mobile="2%" margin_bottom_mobile="" text_color="#000000" animated_text_color="" highlight_color="" style_type="none" sep_color=""]';
                    $header_mobile .= 'CAMPO_NOME_COMMERCIALE';
                    $header_mobile .= '[/fusion_title]';
                    $header_mobile .= '[fusion_separator style_type="single solid" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id="" sep_color="rgba(0,0,0,0.65)" top_margin="" bottom_margin="30" border_size="4" icon="" icon_circle="" icon_circle_color="" width="45%" alignment="center" /]';
                    $header_mobile .= '[fusion_text columns="" column_min_width="" column_spacing="" rule_style="default" rule_size="" rule_color="" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id="" animation_type="" animation_direction="left" animation_speed="0.3" animation_offset=""]';
                    $header_mobile .= 'CAMPO_TIPOLOGIA';
                    $header_mobile .= '[/fusion_text]';
                    $header_mobile .= '[fusion_button link="#storia" text_transform="uppercase" title="" target="_self" link_attributes="" alignment="center" modal="" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id="" color="custom" button_gradient_top_color="" button_gradient_bottom_color="" button_gradient_top_color_hover="" button_gradient_bottom_color_hover="" accent_color="#ffffff" accent_hover_color="#ffffff" type="" bevel_color="" border_width="4" size="" stretch="default" icon="" icon_position="left" icon_divider="no" animation_type="" animation_direction="left" animation_speed="0.3" animation_offset="" border_radius="" border_color="#ffffff" border_hover_color="#ffffff"]SCOPRI DI PIÙ[/fusion_button]';
                    $header_mobile .= '[/fusion_builder_column][/fusion_builder_row][/fusion_builder_container]';


                    /*** HEADER TYPOLOGY - CATEGORY **/
                    $header_typology_category = '[fusion_builder_container admin_label="Separatore tipologia" hide_on_mobile="small-visibility,medium-visibility,large-visibility" status="published" publish_date="" hundred_percent="yes" hundred_percent_height="no" hundred_percent_height_scroll="no" hundred_percent_height_center_content="yes" equal_height_columns="no" menu_anchor="" class="" id="" border_size="" border_color="" border_style="solid" margin_top="1%" margin_bottom="" padding_top="" padding_right="" padding_bottom="" padding_left="" gradient_start_color="" gradient_end_color="" gradient_start_position="0" gradient_end_position="100" gradient_type="linear" radial_direction="center" linear_angle="180" background_color="" background_image="" background_position="center center" background_repeat="no-repeat" fade="no" background_parallax="none" enable_mobile="no" parallax_speed="0.3" background_blend_mode="none" video_mp4="" video_webm="" video_ogv="" video_url="" video_aspect_ratio="16:9" video_loop="yes" video_mute="yes" video_preview_image="" filter_hue="0" filter_saturation="100" filter_brightness="100" filter_contrast="100" filter_invert="0" filter_sepia="0" filter_opacity="100" filter_blur="0" filter_hue_hover="0" filter_saturation_hover="100" filter_brightness_hover="100" filter_contrast_hover="100" filter_invert_hover="0" filter_sepia_hover="0" filter_opacity_hover="100" filter_blur_hover="0" admin_toggled="no"]';
                    $header_typology_category .= '[fusion_builder_row]';
                    $header_typology_category .= '[fusion_builder_column type="1_1" layout="1_1" link="" target="_self" hide_on_mobile="small-visibility,medium-visibility,large-visibility" background_image_id="" spacing="" center_content="no" min_height="" class="" id="" hover_type="none" border_size="0" border_color="" border_style="solid" border_position="all" border_radius_top_left="" border_radius_top_right="" border_radius_bottom_right="" border_radius_bottom_left="" box_shadow="no" box_shadow_vertical="" box_shadow_horizontal="" box_shadow_blur="0" box_shadow_spread="0" box_shadow_color="" box_shadow_style="" padding_top="" padding_right="" padding_bottom="" padding_left="" margin_top="" margin_bottom="0%" background_type="single" gradient_start_color="" gradient_end_color="" gradient_start_position="0" gradient_end_position="100" gradient_type="linear" radial_direction="center" linear_angle="180" background_color="" background_image="" background_position="left top" background_repeat="no-repeat" background_blend_mode="none" animation_type="" animation_direction="left" animation_speed="0.3" animation_offset="" filter_type="regular" filter_hue="0" filter_saturation="100" filter_brightness="100" filter_contrast="100" filter_invert="0" filter_sepia="0" filter_opacity="100" filter_blur="0" filter_hue_hover="0" filter_saturation_hover="100" filter_brightness_hover="100" filter_contrast_hover="100" filter_invert_hover="0" filter_sepia_hover="0" filter_opacity_hover="100" filter_blur_hover="0" last="no"]';
                    $header_typology_category .= '[fusion_separator style_type="single solid" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id="" sep_color="rgba(0,0,0,0.4)" top_margin="1%" bottom_margin="0.2%" border_size="4" icon="" icon_circle="" icon_circle_color="" width="" alignment="center" /]';
                    $header_typology_category .= '[/fusion_builder_column]';
                    $header_typology_category .= '[fusion_builder_column type="1_4" layout="1_4" link="" target="_self" hide_on_mobile="small-visibility,medium-visibility,large-visibility" background_image_id="" spacing="" center_content="yes" min_height="" class="" id="icone-categorie" hover_type="none" border_size="0" border_color="" border_style="solid" border_position="all" border_radius_top_left="" border_radius_top_right="" border_radius_bottom_right="" border_radius_bottom_left="" box_shadow="no" box_shadow_vertical="" box_shadow_horizontal="" box_shadow_blur="0" box_shadow_spread="0" box_shadow_color="" box_shadow_style="" padding_top="8px" padding_right="" padding_bottom="" padding_left="" margin_top="0px" margin_bottom="0px" background_type="single" gradient_start_color="" gradient_end_color="" gradient_start_position="0" gradient_end_position="100" gradient_type="linear" radial_direction="center" linear_angle="180" background_color="" background_image="" background_position="left top" background_repeat="no-repeat" background_blend_mode="none" animation_type="" animation_direction="left" animation_speed="0.3" animation_offset="" filter_type="regular" filter_hue="0" filter_saturation="100" filter_brightness="100" filter_contrast="100" filter_invert="0" filter_sepia="0" filter_opacity="100" filter_blur="0" filter_hue_hover="0" filter_saturation_hover="100" filter_brightness_hover="100" filter_contrast_hover="100" filter_invert_hover="0" filter_sepia_hover="0" filter_opacity_hover="100" filter_blur_hover="0" last="no"]';
                    $header_typology_category .= '[fusion_text columns="" column_min_width="" column_spacing="" rule_style="default" rule_size="" rule_color="" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id="" animation_type="" animation_direction="left" animation_speed="0.3" animation_offset=""]';
                    $header_typology_category .= 'CAMPO_TIPOLOGIA | CAMPO_ALTRA_TIPOLOGIA';
                    $header_typology_category .= '[/fusion_text]';
                    $header_typology_category .= '[/fusion_builder_column]';
                    $header_typology_category .= '[fusion_builder_column type="1_2" layout="1_2" link="" target="_self" hide_on_mobile="small-visibility,medium-visibility,large-visibility" background_image_id="" spacing="" center_content="no" min_height="" class="" id="" hover_type="none" border_size="0" border_color="" border_style="solid" border_position="all" border_radius_top_left="" border_radius_top_right="" border_radius_bottom_right="" border_radius_bottom_left="" box_shadow="no" box_shadow_vertical="" box_shadow_horizontal="" box_shadow_blur="0" box_shadow_spread="0" box_shadow_color="" box_shadow_style="" padding_top="" padding_right="" padding_bottom="" padding_left="" margin_top="0px" margin_bottom="0px" background_type="single" gradient_start_color="" gradient_end_color="" gradient_start_position="0" gradient_end_position="100" gradient_type="linear" radial_direction="center" linear_angle="180" background_color="" background_image="" background_position="left top" background_repeat="no-repeat" background_blend_mode="none" animation_type="" animation_direction="left" animation_speed="0.3" animation_offset="" filter_type="regular" filter_hue="0" filter_saturation="100" filter_brightness="100" filter_contrast="100" filter_invert="0" filter_sepia="0" filter_opacity="100" filter_blur="0" filter_hue_hover="0" filter_saturation_hover="100" filter_brightness_hover="100" filter_contrast_hover="100" filter_invert_hover="0" filter_sepia_hover="0" filter_opacity_hover="100" filter_blur_hover="0" last="no"]';
                    $header_typology_category .= '[/fusion_builder_column]';
                    $header_typology_category .= '[fusion_builder_column type="1_4" layout="1_4" link="" target="_self" hide_on_mobile="small-visibility,medium-visibility,large-visibility" background_image_id="" spacing="" center_content="yes" min_height="" class="" id="icone-categorie" hover_type="none" border_size="0" border_color="" border_style="solid" border_position="all" border_radius_top_left="" border_radius_top_right="" border_radius_bottom_right="" border_radius_bottom_left="" box_shadow="no" box_shadow_vertical="" box_shadow_horizontal="" box_shadow_blur="0" box_shadow_spread="0" box_shadow_color="" box_shadow_style="" padding_top="" padding_right="" padding_bottom="" padding_left="" margin_top="0px" margin_bottom="0px" background_type="single" gradient_start_color="" gradient_end_color="" gradient_start_position="0" gradient_end_position="100" gradient_type="linear" radial_direction="center" linear_angle="180" background_color="" background_image="" background_position="left top" background_repeat="no-repeat" background_blend_mode="none" animation_type="" animation_direction="left" animation_speed="0.3" animation_offset="" filter_type="regular" filter_hue="0" filter_saturation="100" filter_brightness="100" filter_contrast="100" filter_invert="0" filter_sepia="0" filter_opacity="100" filter_blur="0" filter_hue_hover="0" filter_saturation_hover="100" filter_brightness_hover="100" filter_contrast_hover="100" filter_invert_hover="0" filter_sepia_hover="0" filter_opacity_hover="100" filter_blur_hover="0" last="no"]';
                    $header_typology_category .= '[fusion_images picture_size="auto" hover_type="liftup" autoplay="no" columns="6" column_spacing="0" scroll_items="" show_nav="no" mouse_scroll="no" border="no" lightbox="no" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="icone-categorie" id=""] ';
                    $header_typology_category .= 'CAMPO_ICON_CATEGORY';
                    $header_typology_category .= '[/fusion_images]';
                    $header_typology_category .= '[/fusion_builder_column]';
                    $header_typology_category .= '[fusion_builder_column type="1_1" layout="1_1" link="" target="_self" hide_on_mobile="small-visibility,medium-visibility,large-visibility" background_image_id="" spacing="" center_content="no" min_height="" class="" id="" hover_type="none" border_size="0" border_color="" border_style="solid" border_position="all" border_radius_top_left="" border_radius_top_right="" border_radius_bottom_right="" border_radius_bottom_left="" box_shadow="no" box_shadow_vertical="" box_shadow_horizontal="" box_shadow_blur="0" box_shadow_spread="0" box_shadow_color="" box_shadow_style="" padding_top="" padding_right="" padding_bottom="" padding_left="" margin_top="0px" margin_bottom="0px" background_type="single" gradient_start_color="" gradient_end_color="" gradient_start_position="0" gradient_end_position="100" gradient_type="linear" radial_direction="center" linear_angle="180" background_color="" background_image="" background_position="left top" background_repeat="no-repeat" background_blend_mode="none" animation_type="" animation_direction="left" animation_speed="0.3" animation_offset="" filter_type="regular" filter_hue="0" filter_saturation="100" filter_brightness="100" filter_contrast="100" filter_invert="0" filter_sepia="0" filter_opacity="100" filter_blur="0" filter_hue_hover="0" filter_saturation_hover="100" filter_brightness_hover="100" filter_contrast_hover="100" filter_invert_hover="0" filter_sepia_hover="0" filter_opacity_hover="100" filter_blur_hover="0" last="no"]';
                    $header_typology_category .= '[fusion_separator style_type="single solid" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id="" sep_color="rgba(0,0,0,0.4)" top_margin="0.2%" bottom_margin="1%" border_size="4" icon="" icon_circle="" icon_circle_color="" width="" alignment="center" /]';
                    $header_typology_category .= '[/fusion_builder_column][/fusion_builder_row][/fusion_builder_container]';



                    echo do_shortcode($header_desktop);
                    echo do_shortcode($header_mobile);
                    echo do_shortcode($header_typology_category);
                }
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
