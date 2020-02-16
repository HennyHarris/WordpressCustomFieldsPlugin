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
                    $CAMPO_SERVIZI_OFFERTI = htmlspecialchars(get_field('CAMPO_SERVIZI_OFFERTI'));
                    $CAMPO_BOOKING = htmlspecialchars(get_field('CAMPO_BOOKING'));
                    $CAMPO_TRIVAGO = htmlspecialchars(get_field('CAMPO_TRIVAGO'));

                    /*** IMAGES **/
                    $LINK_IMMAGINE_COPERTINA = esc_url(get_field('LINK_IMMAGINE_COPERTINA')['url']);
                    $LINK_IMMAGINE_LOGO = esc_url(get_field('LINK_IMMAGINE_LOGO')['url']);
                    $IMMAGINE_GALLERIA_1 = esc_url(get_field('IMMAGINE_GALLERIA_1')['url']);
                    $IMMAGINE_GALLERIA_2 = esc_url(get_field('IMMAGINE_GALLERIA_2')['url']);
                    $IMMAGINE_GALLERIA_3 = esc_url(get_field('IMMAGINE_GALLERIA_3')['url']);
                    $IMMAGINE_GALLERIA_4 = esc_url(get_field('IMMAGINE_GALLERIA_4')['url']);


                    /*** HEADER DESKTOP **/
                    $post = '[fusion_builder_container admin_label="Vista iniziale(DESKTOP)" hide_on_mobile="large-visibility" status="published" publish_date="" hundred_percent="yes" hundred_percent_height="yes" hundred_percent_height_scroll="no" hundred_percent_height_center_content="yes" equal_height_columns="yes" menu_anchor="" class="initialview" id="initialview" border_size="" border_color="" border_style="solid" margin_top="" margin_bottom="" padding_top="0px" padding_right="0px" padding_bottom="0px" padding_left="0px" gradient_start_color="" gradient_end_color="" gradient_start_position="0" gradient_end_position="100" gradient_type="linear" radial_direction="center" linear_angle="180" background_color="" background_image="' . $LINK_IMMAGINE_COPERTINA . '" background_position="center center" background_repeat="no-repeat" fade="no" background_parallax="fixed" enable_mobile="no" parallax_speed="0.3" background_blend_mode="none" video_mp4="" video_webm="" video_ogv="" video_url="" video_aspect_ratio="16:9" video_loop="yes" video_mute="yes" video_preview_image="" filter_hue="0" filter_saturation="100" filter_brightness="100" filter_contrast="100" filter_invert="0" filter_sepia="0" filter_opacity="100" filter_blur="0" filter_hue_hover="0" filter_saturation_hover="100" filter_brightness_hover="100" filter_contrast_hover="100" filter_invert_hover="0" filter_sepia_hover="0" filter_opacity_hover="100" filter_blur_hover="0" admin_toggled="no"]';
                    $post .= '[fusion_builder_row]';
                    $post .= '[fusion_builder_column type="1_2" layout="1_2" spacing="" center_content="yes" link="" target="_self" min_height="" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id="" background_image_id="" background_color="" background_image="" background_position="left top" undefined="" background_repeat="no-repeat" hover_type="none" border_size="0" border_color="" border_style="solid" border_position="all" border_radius_top_left="" border_radius_top_right="" border_radius_bottom_left="" border_radius_bottom_right="" box_shadow="no" box_shadow_vertical="" box_shadow_horizontal="" box_shadow_blur="0" box_shadow_spread="0" box_shadow_color="" box_shadow_style="" padding_top="3%" padding_right="-10%" padding_bottom="3%" padding_left="-20%" margin_top="" margin_bottom="" animation_type="fade" animation_direction="left" animation_speed="0.3" animation_offset="" last="no"]';
                    $post .= '[fusion_title title_type="text" rotation_effect="bounceIn" display_time="1200" highlight_effect="circle" loop_animation="off" highlight_width="9" highlight_top_margin="0" rotation_text="" highlight_text="" after_text="" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id="" before_text="" content_align="center" size="1" font_size="" animated_font_size="" line_height="" letter_spacing="" margin_top="2%" margin_bottom="" margin_top_mobile="2%" margin_bottom_mobile="" text_color="#000000" animated_text_color="" highlight_color="" style_type="none" sep_color=""]<p style="text-align: center; color: white;">' . $CAMPO_NOME_COMMERCIALE . '</p>[/fusion_title]';
                    $post .= '[fusion_separator style_type="single solid" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id="" sep_color="rgba(0,0,0,0.65)" top_margin="" bottom_margin="30" border_size="4" icon="" icon_circle="" icon_circle_color="" width="45%" alignment="center" /]';
                    $post .= '[fusion_button link="#storia" text_transform="uppercase" title="" target="_self" link_attributes="" alignment="center" modal="" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id="" color="custom" button_gradient_top_color="" button_gradient_bottom_color="" button_gradient_top_color_hover="" button_gradient_bottom_color_hover="" accent_color="#ffffff" accent_hover_color="#ffffff" type="" bevel_color="" border_width="4" size="" stretch="default" icon="" icon_position="left" icon_divider="no" animation_type="" animation_direction="left" animation_speed="0.3" animation_offset="" border_radius="" border_color="#ffffff" border_hover_color="#ffffff"]SCOPRI DI PIÙ[/fusion_button]';
                    $post .= '[/fusion_builder_column]';
                    $post .= '[fusion_builder_column type="1_2" layout="1_2" spacing="" center_content="yes" link="" target="_self" min_height="" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id="" background_image_id="" background_color="" background_image="" background_position="left top" undefined="" background_repeat="no-repeat" hover_type="none" border_size="0" border_color="" border_style="solid" border_position="all" border_radius_top_left="" border_radius_top_right="" border_radius_bottom_left="" border_radius_bottom_right="" box_shadow="no" box_shadow_vertical="" box_shadow_horizontal="" box_shadow_blur="0" box_shadow_spread="0" box_shadow_color="" box_shadow_style="" padding_top="3%" padding_right="-20%" padding_bottom="3%" padding_left="-10%" margin_top="20px" margin_bottom="20px" animation_type="fade" animation_direction="right" animation_speed="0.3" animation_offset="" last="no"]';
                    $post .= '[fusion_imageframe image_id="4923|full" max_width="" style_type="" blur="" stylecolor="" hover_type="liftup" bordersize="" bordercolor="" borderradius="" align="center" lightbox="no" gallery_id="" lightbox_image="" lightbox_image_id="" alt="" link="" linktarget="_self" hide_on_mobile="small-visibility,medium-visibility,large-visibility" animation_type="" animation_direction="right" animation_speed="0.3" animation_offset="" class="" id="logoImg"]' . $LINK_IMMAGINE_LOGO . '[/fusion_imageframe]';
                    $post .= '[/fusion_builder_column]';
                    $post .= '[/fusion_builder_row]';
                    $post .= '[/fusion_builder_container]';


                    /*** HEADER MOBILE **/
                    $post .= '[fusion_builder_container admin_label="Vista iniziale(TABLET E SMARTPHONE)" hide_on_mobile="small-visibility,medium-visibility" status="published" publish_date="" hundred_percent="yes" hundred_percent_height="yes" hundred_percent_height_scroll="no" hundred_percent_height_center_content="yes" equal_height_columns="yes" menu_anchor="" class="initialview" id="initialview" border_size="" border_color="" border_style="solid" margin_top="" margin_bottom="" padding_top="" padding_right="" padding_bottom="" padding_left="" gradient_start_color="" gradient_end_color="" gradient_start_position="0" gradient_end_position="100" gradient_type="linear" radial_direction="center" linear_angle="180" background_color="" background_image="' . $LINK_IMMAGINE_COPERTINA . '" background_position="center center" background_repeat="no-repeat" fade="no" background_parallax="none" enable_mobile="no" parallax_speed="0.3" background_blend_mode="none" video_mp4="" video_webm="" video_ogv="" video_url="" video_aspect_ratio="16:9" video_loop="yes" video_mute="yes" video_preview_image="" filter_hue="0" filter_saturation="100" filter_brightness="100" filter_contrast="100" filter_invert="0" filter_sepia="0" filter_opacity="100" filter_blur="0" filter_hue_hover="0" filter_saturation_hover="100" filter_brightness_hover="100" filter_contrast_hover="100" filter_invert_hover="0" filter_sepia_hover="0" filter_opacity_hover="100" filter_blur_hover="0" admin_toggled="yes"]';
                    $post .= '[fusion_builder_row]';
                    $post .= '[fusion_builder_column type="1_2" layout="1_2" spacing="" center_content="yes" link="" target="_self" min_height="" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id="" background_image_id="" background_color="" background_image="" background_position="left top" undefined="" background_repeat="no-repeat" hover_type="none" border_size="0" border_color="" border_style="solid" border_position="all" border_radius_top_left="" border_radius_top_right="" border_radius_bottom_left="" border_radius_bottom_right="" box_shadow="no" box_shadow_vertical="" box_shadow_horizontal="" box_shadow_blur="0" box_shadow_spread="0" box_shadow_color="" box_shadow_style="" padding_top="3%" padding_right="-20%" padding_bottom="3%" padding_left="-10%" margin_top="20px" margin_bottom="20px" animation_type="fade" animation_direction="right" animation_speed="0.3" animation_offset="" last="no"]';
                    $post .= '[fusion_imageframe image_id="4923|full" max_width="" style_type="" blur="" stylecolor="" hover_type="liftup" bordersize="" bordercolor="" borderradius="" align="center" lightbox="no" gallery_id="" lightbox_image="" lightbox_image_id="" alt="" link="" linktarget="_self" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id="logoImg" animation_type="" animation_direction="right" animation_speed="0.3" animation_offset=""]' . $LINK_IMMAGINE_LOGO . '[/fusion_imageframe]';
                    $post .= '[/fusion_builder_column]';
                    $post .= '[fusion_builder_column type="1_2" layout="1_2" spacing="" center_content="yes" link="" target="_self" min_height="" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id="" background_image_id="" background_color="" background_image="" background_position="left top" undefined="" background_repeat="no-repeat" hover_type="none" border_size="0" border_color="" border_style="solid" border_position="all" border_radius_top_left="" border_radius_top_right="" border_radius_bottom_left="" border_radius_bottom_right="" box_shadow="no" box_shadow_vertical="" box_shadow_horizontal="" box_shadow_blur="0" box_shadow_spread="0" box_shadow_color="" box_shadow_style="" padding_top="3%" padding_right="-10%" padding_bottom="3%" padding_left="-20%" margin_top="" margin_bottom="" animation_type="fade" animation_direction="left" animation_speed="0.3" animation_offset="" last="no"]';
                    $post .= '[fusion_separator style_type="single solid" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id="" sep_color="rgba(0,0,0,0.4)" top_margin="" bottom_margin="0.5%" border_size="4" icon="" icon_circle="" icon_circle_color="" width="" alignment="center" /]';
                    $post .= '[fusion_title title_type="text" rotation_effect="bounceIn" display_time="1200" highlight_effect="circle" loop_animation="off" highlight_width="9" highlight_top_margin="0" rotation_text="" highlight_text="" after_text="" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id="" before_text="" content_align="center" size="1" font_size="" animated_font_size="" line_height="" letter_spacing="" margin_top="2%" margin_bottom="" margin_top_mobile="2%" margin_bottom_mobile="" text_color="#000000" animated_text_color="" highlight_color="" style_type="none" sep_color=""]<p style="text-align: center; color: white;">' . $CAMPO_NOME_COMMERCIALE . '</p>[/fusion_title]';
                    $post .= '[fusion_separator style_type="single solid" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id="" sep_color="rgba(0,0,0,0.65)" top_margin="" bottom_margin="30" border_size="4" icon="" icon_circle="" icon_circle_color="" width="45%" alignment="center" /]';
                    $post .= '[fusion_text columns="" column_min_width="" column_spacing="" rule_style="default" rule_size="" rule_color="" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id="" animation_type="" animation_direction="left" animation_speed="0.3" animation_offset=""]' . '<p style="text-align: center; color: white;">CAMPO_TIPOLOGIA</p>' . '[/fusion_text]';
                    $post .= '[fusion_button link="#storia" text_transform="uppercase" title="" target="_self" link_attributes="" alignment="center" modal="" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id="" color="custom" button_gradient_top_color="" button_gradient_bottom_color="" button_gradient_top_color_hover="" button_gradient_bottom_color_hover="" accent_color="#ffffff" accent_hover_color="#ffffff" type="" bevel_color="" border_width="4" size="" stretch="default" icon="" icon_position="left" icon_divider="no" animation_type="" animation_direction="left" animation_speed="0.3" animation_offset="" border_radius="" border_color="#ffffff" border_hover_color="#ffffff"]SCOPRI DI PIÙ[/fusion_button]';
                    $post .= '[/fusion_builder_column]';
                    $post .= '[/fusion_builder_row]';
                    $post .= '[/fusion_builder_container]';

                    $contatti = '[fusion_checklist icon="" iconcolor="#000000" circle="no" circlecolor="#ffffff" size="" divider="no" divider_color="" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id=""]';
                    $contatti .= '[fusion_li_item icon="fa-globe fas"]' . 'Società/Associazione: CAMPO_SOCIETA_ASSOCIAZIONE' . '[/fusion_li_item]';
                    $contatti .= '[fusion_li_item icon="fa-globe fas"]' . '<a href="http://' . $CAMPO_SITO_WEB . '">' . $CAMPO_SITO_WEB . '</a>' . '[/fusion_li_item]';
                    $contatti .= '[fusion_li_item icon="fa-phone fas"]' . '<a href="tel:' . $CAMPO_TELEFONO . '">' . $CAMPO_TELEFONO . '</a>' . '<br>' . '<a href="tel:' . $CAMPO_TELEFONO1 . '">' . $CAMPO_TELEFONO1 . '</a>' . '[/fusion_li_item]';
                    $contatti .= '[fusion_li_item icon="fa-envelope far"]' . '<a href="mailto:' . $CAMPO_EMAIL . '">' . $CAMPO_EMAIL . '</a>' . '<br>' . '<a href="mailto:' . $CAMPO_EMAIL1 . '">' . $CAMPO_EMAIL1 . '</a>' . '[/fusion_li_item]';
                    $contatti .= '[fusion_li_item icon="fa-map-marker-alt fas"]' . $CAMPO_INDIRIZZO . '<br>' . $CAMPO_COMUNE . '(' . $CAMPO_PROVINCIA . ')' . '[/fusion_li_item]';
                    $contatti .= '[fusion_li_item icon="fa-store fas"]' . 'Punto vendita: ' . $CAMPO_INDIRIZZO_PUNTO_VENDITA . '<br>' . $CAMPO_COMUNE_PUNTO_VENDITA . '(' . $CAMPO_PROVINCIA_PUNTO_VENDITA . ')' . '[/fusion_li_item]';
                    $contatti .= '[fusion_li_item icon="fa-store fas"]' . 'Produzione: ' . $CAMPO_INDIRIZZO_PRODUZIONE . '<br>' . $CAMPO_COMUNE_PRODUZIONE . '(' . $CAMPO_PROVINCIA_PRODUZIONE . ')' . '[/fusion_li_item]';
                    $contatti .= '[fusion_li_item icon="fa-clock far"]' . 'Orario: ' . $CAMPO_ORARI_APERTURA . '[/fusion_li_item]';
                    $contatti .= '[fusion_li_item icon="fa-clock far"]' . 'Orario punto vendita: ' . $CAMPO_ORARI_APERTURA_PUNTO_VENDITA . '[/fusion_li_item]';
                    $contatti .= '[fusion_li_item icon="fa-calendar-alt far"]' . 'Periodo di apertura: ' . $CAMPO_PERIODO_APERTURA . '[/fusion_li_item]';
                    $contatti .= '[fusion_li_item icon="fa-calendar-alt far"]' . 'Giorno di chiusura: ' . $CAMPO_GIORNO_DI_CHIUSURA . '[/fusion_li_item]';
                    $contatti .= '[fusion_li_item icon="fa-calendar-alt far"]' . 'Giorno di chiusura produzione: ' . $CAMPO_GIORNO_DI_CHIUSURA_PRODUZIONE . '[/fusion_li_item]';
                    $contatti .= '[fusion_li_item icon="fa-calendar-alt far"]' . 'Giorno di chiusura punto vendita: ' . $CAMPO_GIORNO_DI_CHIUSURA_PUNTO_VENDITA . '[/fusion_li_item]';
                    $contatti .= '[/fusion_checklist]';

                    echo do_shortcode($post);
                    echo do_shortcode($contatti);
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
