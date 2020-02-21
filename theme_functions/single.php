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
                    $CAMPO_ORARI_APERTURA_PRODUZIONE = htmlspecialchars(get_field('CAMPO_ORARI_APERTURA_PRODUZIONE'));
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
                    $CAMPO_SERVIZI_OFFERTI = /*htmlspecialchars(*/
                        get_field('CAMPO_SERVIZI_OFFERTI')/*)*/
                    ;
                    $CAMPO_BOOKING = htmlspecialchars(get_field('CAMPO_BOOKING'));
                    $CAMPO_TRIVAGO = htmlspecialchars(get_field('CAMPO_TRIVAGO'));
                    $CAMPO_PACCHETTI_OFFERTI = htmlspecialchars(get_field('CAMPO_PACCHETTI_OFFERTI'));
                    $CAMPO_STATO_CONSERVAZIONE = htmlspecialchars(get_field('CAMPO_STATO_CONSERVAZIONE'));
                    $ACCESSIBILE_AI_DISABILI = htmlspecialchars(get_field('CAMPO_ACCESSIBILE_AI_DISABILI'));
                    $CAMPO_ALTRO = htmlspecialchars(get_field('CAMPO_ALTRO'));
                    $CAMPO_LINK_ALLE_PROPOSTE = htmlspecialchars(get_field('CAMPO_LINK_ALLE_PROPOSTE'));
                    $CAMPO_LABORATORI_DIDATTICI = htmlspecialchars(get_field('CAMPO_LABORATORI_DIDATTICI'));
                    $CAMPO_RISTORANTE = htmlspecialchars(get_field('CAMPO_RISTORANTE'));
                    $CAMPO_BAR = htmlspecialchars(get_field('CAMPO_BAR'));
                    $CAMPO_INFORMAZIONI_CRONOLOGICHE = htmlspecialchars(get_field('CAMPO_INFORMAZIONI_CRONOLOGICHE'));
                    $CAMPO_LUOGO = htmlspecialchars(get_field('CAMPO_LUOGO'));
                    $CAMPO_ORGANIZZATORE = htmlspecialchars(get_field('CAMPO_ORGANIZZATORE'));
                    $CAMPO_VENDITA_AL_DETTAGLIO = htmlspecialchars(get_field('CAMPO_VENDITA_AL_DETTAGLIO'));
                    $CAMPO_DETTAGLI_VISITE = htmlspecialchars(get_field('CAMPO_DETTAGLI_VISITE'));
                    $CAMPO_AREA_PICNIC = htmlspecialchars(get_field('CAMPO_AREA_PICNIC'));
                    $CAMPO_AREA_CAMPER = htmlspecialchars(get_field('CAMPO_AREA_CAMPER'));
                    $CAMPO_SENTIERI_ESCURSIONISTICI = htmlspecialchars(get_field('CAMPO_SENTIERI_ESCURSIONISTICI'));
                    $CAMPO_NOLEGGIO_PEDALO_ATTREZZATURE_MARINE = htmlspecialchars(get_field('CAMPO_NOLEGGIO_PEDALO_ATTREZZATURE_MARINE'));
                    $CAMPO_DEGUSTAZIONI_IN_LOCO = htmlspecialchars(get_field('CAMPO_DEGUSTAZIONI_IN_LOCO'));
                    $CAMPO_PER_FAMIGLIE_CON_BAMBINI = htmlspecialchars(get_field('CAMPO_PER_FAMIGLIE_CON_BAMBINI'));
                    $CAMPO_STELLE = htmlspecialchars(get_field('CAMPO_STELLE'));
                    $CAMPO_SERVIZIO_IN_CAMERA = htmlspecialchars(get_field('CAMPO_SERVIZIO_IN_CAMERA'));
                    $CAMPO_FREE_WIFI = htmlspecialchars(get_field('CAMPO_FREE_WIFI'));
                    $CAMPO_BEAUTY_FARM = htmlspecialchars(get_field('CAMPO_BEAUTY_FARM'));
                    $CAMPO_MANEGGIO = htmlspecialchars(get_field('CAMPO_MANEGGIO'));
                    $CAMPO_PALESTRA = htmlspecialchars(get_field('CAMPO_PALESTRA'));
                    $CAMPO_ANIMALI_AMMESSI = htmlspecialchars(get_field('CAMPO_ANIMALI_AMMESSI'));
                    $CAMPO_PISCINA = htmlspecialchars(get_field('CAMPO_PISCINA'));
                    $CAMPO_SERVIZI_SPIAGGIA = htmlspecialchars(get_field('CAMPO_SERVIZI_SPIAGGIA'));
                    $CAMPO_POSTO_BICI = htmlspecialchars(get_field('CAMPO_POSTO_BICI'));
                    $CAMPO_POSTO_AUTO = htmlspecialchars(get_field('CAMPO_POSTO_AUTO'));
                    $CAMPO_PAGAMENTO_CON_CARTA = htmlspecialchars(get_field('CAMPO_PAGAMENTO_CON_CARTA'));
                    $CAMPO_MENU_CELIACI = htmlspecialchars(get_field('CAMPO_MENU_CELIACI'));
                    $CAMPO_MENU_PESCE = htmlspecialchars(get_field('CAMPO_MENU_PESCE'));
                    $CAMPO_MENU_VEGETARIANO = htmlspecialchars(get_field('CAMPO_MENU_VEGETARIANO'));
                    $CAMPO_PERIODO = htmlspecialchars(get_field('CAMPO_PERIODO'));
                    $CAMPO_CATEGORIA = htmlspecialchars(get_field('CAMPO_CATEGORIA'));

                    /*** IMAGES **/
                    $LINK_IMMAGINE_COPERTINA = esc_url(get_field('LINK_IMMAGINE_COPERTINA')['url']);
                    $LINK_IMMAGINE_LOGO = esc_url(get_field('LINK_IMMAGINE_LOGO')['url']);
                    $IMMAGINE_GALLERIA_1 = esc_url(get_field('IMMAGINE_GALLERIA_1')['url']);
                    $IMMAGINE_GALLERIA_2 = esc_url(get_field('IMMAGINE_GALLERIA_2')['url']);
                    $IMMAGINE_GALLERIA_3 = esc_url(get_field('IMMAGINE_GALLERIA_3')['url']);
                    $IMMAGINE_GALLERIA_4 = esc_url(get_field('IMMAGINE_GALLERIA_4')['url']);
                    $IMMAGINE_GALLERIA_5 = esc_url(get_field('IMMAGINE_GALLERIA_5')['url']);

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
                    $header_mobile .= $LINK_IMMAGINE_COPERTINA;
                    $header_mobile .= '" background_position="center center" background_repeat="no-repeat" fade="no" background_parallax="none" enable_mobile="no" parallax_speed="0.3" background_blend_mode="none" video_mp4="" video_webm="" video_ogv="" video_url="" video_aspect_ratio="16:9" video_loop="yes" video_mute="yes" video_preview_image="" filter_hue="0" filter_saturation="100" filter_brightness="100" filter_contrast="100" filter_invert="0" filter_sepia="0" filter_opacity="100" filter_blur="0" filter_hue_hover="0" filter_saturation_hover="100" filter_brightness_hover="100" filter_contrast_hover="100" filter_invert_hover="0" filter_sepia_hover="0" filter_opacity_hover="100" filter_blur_hover="0" admin_toggled="yes"]';
                    $header_mobile .= '[fusion_builder_row]';
                    $header_mobile .= '[fusion_builder_column type="1_2" layout="1_2" spacing="" center_content="yes" link="" target="_self" min_height="" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id="" background_image_id="" background_color="" background_image="" background_position="left top" undefined="" background_repeat="no-repeat" hover_type="none" border_size="0" border_color="" border_style="solid" border_position="all" border_radius_top_left="" border_radius_top_right="" border_radius_bottom_left="" border_radius_bottom_right="" box_shadow="no" box_shadow_vertical="" box_shadow_horizontal="" box_shadow_blur="0" box_shadow_spread="0" box_shadow_color="" box_shadow_style="" padding_top="3%" padding_right="-20%" padding_bottom="3%" padding_left="-10%" margin_top="20px" margin_bottom="20px" animation_type="fade" animation_direction="right" animation_speed="0.3" animation_offset="" last="no"]';
                    $header_mobile .= '[fusion_imageframe image_id="4923|full" max_width="" style_type="" blur="" stylecolor="" hover_type="liftup" bordersize="" bordercolor="" borderradius="" align="center" lightbox="no" gallery_id="" lightbox_image="" lightbox_image_id="" alt="" link="" linktarget="_self" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id="logoImg" animation_type="" animation_direction="right" animation_speed="0.3" animation_offset=""]';
                    $header_mobile .= $LINK_IMMAGINE_LOGO;
                    $header_mobile .= '[/fusion_imageframe]';
                    $header_mobile .= '[/fusion_builder_column]';
                    $header_mobile .= '[fusion_builder_column type="1_2" layout="1_2" spacing="" center_content="yes" link="" target="_self" min_height="" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id="" background_image_id="" background_color="" background_image="" background_position="left top" undefined="" background_repeat="no-repeat" hover_type="none" border_size="0" border_color="" border_style="solid" border_position="all" border_radius_top_left="" border_radius_top_right="" border_radius_bottom_left="" border_radius_bottom_right="" box_shadow="no" box_shadow_vertical="" box_shadow_horizontal="" box_shadow_blur="0" box_shadow_spread="0" box_shadow_color="" box_shadow_style="" padding_top="3%" padding_right="-10%" padding_bottom="3%" padding_left="-20%" margin_top="" margin_bottom="" animation_type="fade" animation_direction="left" animation_speed="0.3" animation_offset="" last="no"][fusion_separator style_type="single solid" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id="" sep_color="rgba(0,0,0,0.4)" top_margin="" bottom_margin="0.5%" border_size="4" icon="" icon_circle="" icon_circle_color="" width="" alignment="center" /]';
                    $header_mobile .= '[fusion_title title_type="text" rotation_effect="bounceIn" display_time="1200" highlight_effect="circle" loop_animation="off" highlight_width="9" highlight_top_margin="0" rotation_text="" highlight_text="" after_text="" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id="" before_text="" content_align="center" size="1" font_size="" animated_font_size="" line_height="" letter_spacing="" margin_top="2%" margin_bottom="" margin_top_mobile="2%" margin_bottom_mobile="" text_color="#000000" animated_text_color="" highlight_color="" style_type="none" sep_color=""]';
                    $header_mobile .= $CAMPO_NOME_COMMERCIALE;
                    $header_mobile .= '[/fusion_title]';
                    $header_mobile .= '[fusion_separator style_type="single solid" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id="" sep_color="rgba(0,0,0,0.65)" top_margin="" bottom_margin="30" border_size="4" icon="" icon_circle="" icon_circle_color="" width="45%" alignment="center" /]';

                    if ($CAMPO_TIPOLOGIA != null) {
                        $header_mobile .= '[fusion_text columns="" column_min_width="" column_spacing="" rule_style="default" rule_size="" rule_color="" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id="" animation_type="" animation_direction="left" animation_speed="0.3" animation_offset=""]';
                        $header_mobile .= $CAMPO_TIPOLOGIA;

                        if ($CAMPO_ALTRA_TIPOLOGIA != null) {
                            $header_mobile .= ' | ' . $CAMPO_ALTRA_TIPOLOGIA;
                        }

                        $header_mobile .= '[/fusion_text]';
                    }

                    $header_mobile .= '[fusion_button link="#storia" text_transform="uppercase" title="" target="_self" link_attributes="" alignment="center" modal="" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id="" color="custom" button_gradient_top_color="" button_gradient_bottom_color="" button_gradient_top_color_hover="" button_gradient_bottom_color_hover="" accent_color="#ffffff" accent_hover_color="#ffffff" type="" bevel_color="" border_width="4" size="" stretch="default" icon="" icon_position="left" icon_divider="no" animation_type="" animation_direction="left" animation_speed="0.3" animation_offset="" border_radius="" border_color="#ffffff" border_hover_color="#ffffff"]SCOPRI DI PIÙ[/fusion_button]';
                    $header_mobile .= '[/fusion_builder_column][/fusion_builder_row][/fusion_builder_container]';


                    /*** HEADER TYPOLOGY - CATEGORY **/
                    $header_typology_category = '[fusion_builder_container admin_label="Separatore tipologia" hide_on_mobile="small-visibility,medium-visibility,large-visibility" status="published" publish_date="" hundred_percent="yes" hundred_percent_height="no" hundred_percent_height_scroll="no" hundred_percent_height_center_content="yes" equal_height_columns="no" menu_anchor="" class="" id="" border_size="" border_color="" border_style="solid" margin_top="1%" margin_bottom="" padding_top="" padding_right="" padding_bottom="" padding_left="" gradient_start_color="" gradient_end_color="" gradient_start_position="0" gradient_end_position="100" gradient_type="linear" radial_direction="center" linear_angle="180" background_color="" background_image="" background_position="center center" background_repeat="no-repeat" fade="no" background_parallax="none" enable_mobile="no" parallax_speed="0.3" background_blend_mode="none" video_mp4="" video_webm="" video_ogv="" video_url="" video_aspect_ratio="16:9" video_loop="yes" video_mute="yes" video_preview_image="" filter_hue="0" filter_saturation="100" filter_brightness="100" filter_contrast="100" filter_invert="0" filter_sepia="0" filter_opacity="100" filter_blur="0" filter_hue_hover="0" filter_saturation_hover="100" filter_brightness_hover="100" filter_contrast_hover="100" filter_invert_hover="0" filter_sepia_hover="0" filter_opacity_hover="100" filter_blur_hover="0" admin_toggled="no"]';
                    $header_typology_category .= '[fusion_builder_row]';
                    $header_typology_category .= '[fusion_builder_column type="1_1" layout="1_1" link="" target="_self" hide_on_mobile="small-visibility,medium-visibility,large-visibility" background_image_id="" spacing="" center_content="no" min_height="" class="" id="" hover_type="none" border_size="0" border_color="" border_style="solid" border_position="all" border_radius_top_left="" border_radius_top_right="" border_radius_bottom_right="" border_radius_bottom_left="" box_shadow="no" box_shadow_vertical="" box_shadow_horizontal="" box_shadow_blur="0" box_shadow_spread="0" box_shadow_color="" box_shadow_style="" padding_top="" padding_right="" padding_bottom="" padding_left="" margin_top="" margin_bottom="0%" background_type="single" gradient_start_color="" gradient_end_color="" gradient_start_position="0" gradient_end_position="100" gradient_type="linear" radial_direction="center" linear_angle="180" background_color="" background_image="" background_position="left top" background_repeat="no-repeat" background_blend_mode="none" animation_type="" animation_direction="left" animation_speed="0.3" animation_offset="" filter_type="regular" filter_hue="0" filter_saturation="100" filter_brightness="100" filter_contrast="100" filter_invert="0" filter_sepia="0" filter_opacity="100" filter_blur="0" filter_hue_hover="0" filter_saturation_hover="100" filter_brightness_hover="100" filter_contrast_hover="100" filter_invert_hover="0" filter_sepia_hover="0" filter_opacity_hover="100" filter_blur_hover="0" last="no"]';
                    $header_typology_category .= '[fusion_separator style_type="single solid" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id="" sep_color="rgba(0,0,0,0.4)" top_margin="1%" bottom_margin="0.2%" border_size="4" icon="" icon_circle="" icon_circle_color="" width="" alignment="center" /]';
                    $header_typology_category .= '[/fusion_builder_column]';
                    $header_typology_category .= '[fusion_builder_column type="1_4" layout="1_4" link="" target="_self" hide_on_mobile="small-visibility,medium-visibility,large-visibility" background_image_id="" spacing="" center_content="yes" min_height="" class="" id="icone-categorie" hover_type="none" border_size="0" border_color="" border_style="solid" border_position="all" border_radius_top_left="" border_radius_top_right="" border_radius_bottom_right="" border_radius_bottom_left="" box_shadow="no" box_shadow_vertical="" box_shadow_horizontal="" box_shadow_blur="0" box_shadow_spread="0" box_shadow_color="" box_shadow_style="" padding_top="8px" padding_right="" padding_bottom="" padding_left="" margin_top="0px" margin_bottom="0px" background_type="single" gradient_start_color="" gradient_end_color="" gradient_start_position="0" gradient_end_position="100" gradient_type="linear" radial_direction="center" linear_angle="180" background_color="" background_image="" background_position="left top" background_repeat="no-repeat" background_blend_mode="none" animation_type="" animation_direction="left" animation_speed="0.3" animation_offset="" filter_type="regular" filter_hue="0" filter_saturation="100" filter_brightness="100" filter_contrast="100" filter_invert="0" filter_sepia="0" filter_opacity="100" filter_blur="0" filter_hue_hover="0" filter_saturation_hover="100" filter_brightness_hover="100" filter_contrast_hover="100" filter_invert_hover="0" filter_sepia_hover="0" filter_opacity_hover="100" filter_blur_hover="0" last="no"]';

                    // TODO: Controllare cosa restituisce
                    if ($CAMPO_TIPOLOGIA != null) {
                        $header_typology_category .= '[fusion_text columns="" column_min_width="" column_spacing="" rule_style="default" rule_size="" rule_color="" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id="" animation_type="" animation_direction="left" animation_speed="0.3" animation_offset=""]';
                        $header_typology_category .= $CAMPO_TIPOLOGIA;

                        if ($CAMPO_ALTRA_TIPOLOGIA != null) {
                            $header_typology_category .= ' | ' . $CAMPO_ALTRA_TIPOLOGIA;
                        }

                        $header_typology_category .= '[/fusion_text]';
                    }

                    $header_typology_category .= '[/fusion_builder_column]';
                    $header_typology_category .= '[fusion_builder_column type="1_2" layout="1_2" link="" target="_self" hide_on_mobile="small-visibility,medium-visibility,large-visibility" background_image_id="" spacing="" center_content="no" min_height="" class="" id="" hover_type="none" border_size="0" border_color="" border_style="solid" border_position="all" border_radius_top_left="" border_radius_top_right="" border_radius_bottom_right="" border_radius_bottom_left="" box_shadow="no" box_shadow_vertical="" box_shadow_horizontal="" box_shadow_blur="0" box_shadow_spread="0" box_shadow_color="" box_shadow_style="" padding_top="" padding_right="" padding_bottom="" padding_left="" margin_top="0px" margin_bottom="0px" background_type="single" gradient_start_color="" gradient_end_color="" gradient_start_position="0" gradient_end_position="100" gradient_type="linear" radial_direction="center" linear_angle="180" background_color="" background_image="" background_position="left top" background_repeat="no-repeat" background_blend_mode="none" animation_type="" animation_direction="left" animation_speed="0.3" animation_offset="" filter_type="regular" filter_hue="0" filter_saturation="100" filter_brightness="100" filter_contrast="100" filter_invert="0" filter_sepia="0" filter_opacity="100" filter_blur="0" filter_hue_hover="0" filter_saturation_hover="100" filter_brightness_hover="100" filter_contrast_hover="100" filter_invert_hover="0" filter_sepia_hover="0" filter_opacity_hover="100" filter_blur_hover="0" last="no"]';
                    $header_typology_category .= '[/fusion_builder_column]';
                    $header_typology_category .= '[fusion_builder_column type="1_4" layout="1_4" link="" target="_self" hide_on_mobile="small-visibility,medium-visibility,large-visibility" background_image_id="" spacing="" center_content="yes" min_height="" class="" id="icone-categorie" hover_type="none" border_size="0" border_color="" border_style="solid" border_position="all" border_radius_top_left="" border_radius_top_right="" border_radius_bottom_right="" border_radius_bottom_left="" box_shadow="no" box_shadow_vertical="" box_shadow_horizontal="" box_shadow_blur="0" box_shadow_spread="0" box_shadow_color="" box_shadow_style="" padding_top="" padding_right="" padding_bottom="" padding_left="" margin_top="0px" margin_bottom="0px" background_type="single" gradient_start_color="" gradient_end_color="" gradient_start_position="0" gradient_end_position="100" gradient_type="linear" radial_direction="center" linear_angle="180" background_color="" background_image="" background_position="left top" background_repeat="no-repeat" background_blend_mode="none" animation_type="" animation_direction="left" animation_speed="0.3" animation_offset="" filter_type="regular" filter_hue="0" filter_saturation="100" filter_brightness="100" filter_contrast="100" filter_invert="0" filter_sepia="0" filter_opacity="100" filter_blur="0" filter_hue_hover="0" filter_saturation_hover="100" filter_brightness_hover="100" filter_contrast_hover="100" filter_invert_hover="0" filter_sepia_hover="0" filter_opacity_hover="100" filter_blur_hover="0" last="no"]';
                    $header_typology_category .= '[fusion_images picture_size="auto" hover_type="liftup" autoplay="no" columns="6" column_spacing="0" scroll_items="" show_nav="no" mouse_scroll="no" border="no" lightbox="no" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="icone-categorie" id=""] ';

                    // TODO: Far stampare le categorie con il foreach e in un altro punto perché qui ci vanno le immagini
                    if ($CAMPO_CATEGORIA != null) {
                        if ($CAMPO_CATEGORIA == "Prova") {
                            $header_typology_category .= $archeologia_arte_e_storia;
                        } else {
                            $header_typology_category .= 'CAMPO_ICON_CATEGORY';
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

                    if ($CAMPO_SOCIETA_ASSOCIAZIONE != null) {
                        $body_desktop_info .= '[fusion_li_item icon="fa-globe fas"]';
                        $body_desktop_info .= 'Società/Associazione: ' . $CAMPO_SOCIETA_ASSOCIAZIONE;
                        $body_desktop_info .= '[/fusion_li_item]';
                    }

                    if ($CAMPO_SITO_WEB != null) {
                        $body_desktop_info .= '[fusion_li_item icon="fa-globe fas"]';
                        $body_desktop_info .= '<a href="' . $CAMPO_SITO_WEB . '">' . $CAMPO_SITO_WEB . '</a>';
                        $body_desktop_info .= '[/fusion_li_item]';
                    }

                    if ($CAMPO_TELEFONO != null) {
                        $body_desktop_info .= '[fusion_li_item icon="fa-phone fas"]';
                        $body_desktop_info .= '<a href="tel://' . $CAMPO_TELEFONO . '">' . $CAMPO_TELEFONO . '</a>';

                        if ($CAMPO_TELEFONO1 != null) {
                            $body_desktop_info .= '<br><a href="tel://' . $CAMPO_TELEFONO1 . '">' . $CAMPO_TELEFONO1 . '</a>';
                        }

                        $body_desktop_info .= '[/fusion_li_item]';
                    }

                    if ($CAMPO_EMAIL != null) {
                        $body_desktop_info .= '[fusion_li_item icon="fa-envelope far"]';
                        $body_desktop_info .= '<a href=mailto://' . $CAMPO_EMAIL . '">' . $CAMPO_EMAIL . '</a>';

                        if ($CAMPO_EMAIL1 != null) {
                            $body_desktop_info .= '<br><a href="mailto://' . $CAMPO_EMAIL1 . '">' . $CAMPO_EMAIL1 . '</a>';
                        }

                        $body_desktop_info .= '[/fusion_li_item]';
                    }

                    if (($CAMPO_INDIRIZZO != null) && ($CAMPO_COMUNE != null) && ($CAMPO_PROVINCIA != null)) {
                        $body_desktop_info .= '[fusion_li_item icon="fa-map-marker-alt fas"]';
                        $body_desktop_info .= $CAMPO_INDIRIZZO;
                        $body_desktop_info .= $CAMPO_COMUNE . ' (' . $CAMPO_PROVINCIA . ')';
                        $body_desktop_info .= '[/fusion_li_item]';
                    }

                    if (($CAMPO_INDIRIZZO_PUNTO_VENDITA != null) && ($CAMPO_COMUNE_PUNTO_VENDITA != null) && ($CAMPO_PROVINCIA_PUNTO_VENDITA != null)) {
                        $body_desktop_info .= '[fusion_li_item icon="fa-store fas"]';
                        $body_desktop_info .= 'Punto vendita: ' . $CAMPO_INDIRIZZO_PUNTO_VENDITA;
                        $body_desktop_info .= $CAMPO_COMUNE_PUNTO_VENDITA . ' (' . $CAMPO_PROVINCIA_PUNTO_VENDITA . ')';
                        $body_desktop_info .= '[/fusion_li_item]';
                    }

                    if (($CAMPO_INDIRIZZO_PRODUZIONE != null) && ($CAMPO_COMUNE_PRODUZIONE != null) && ($CAMPO_PROVINCIA_PRODUZIONE != null)) {
                        $body_desktop_info .= '[fusion_li_item icon="fa-store fas"]';
                        $body_desktop_info .= 'Produzione: ' . $CAMPO_INDIRIZZO_PRODUZIONE;
                        $body_desktop_info .= $CAMPO_COMUNE_PRODUZIONE . ' (' . $CAMPO_PROVINCIA_PRODUZIONE . ')';
                        $body_desktop_info .= '[/fusion_li_item]';
                    }

                    if ($CAMPO_ORARI_APERTURA != null) {
                        $body_desktop_info .= '[fusion_li_item icon="fa-clock far"]';
                        $body_desktop_info .= 'Orario: ' . $CAMPO_ORARI_APERTURA;
                        $body_desktop_info .= '[/fusion_li_item]';
                    }

                    if ($CAMPO_ORARI_APERTURA_PUNTO_VENDITA != null) {
                        $body_desktop_info .= '[fusion_li_item icon="fa-clock far"]';
                        $body_desktop_info .= 'Orario punto vendita: ' . $CAMPO_ORARI_APERTURA_PUNTO_VENDITA;
                        $body_desktop_info .= '[/fusion_li_item]';
                    }

                    // TODO: Controllare cosa restituisce
                    if ($CAMPO_PERIODO_APERTURA != null) {
                        $body_desktop_info .= '[fusion_li_item icon="fa-calendar-alt far"]';
                        $body_desktop_info .= 'Periodo di apertura: ' . $CAMPO_PERIODO_APERTURA;
                        $body_desktop_info .= '[/fusion_li_item]';
                    }

                    // TODO: Giorno di chiusura restituisce un array
                    if ($CAMPO_GIORNO_DI_CHIUSURA != null) {
                        $body_desktop_info .= '[fusion_li_item icon="fa-calendar-alt far"]';
                        $body_desktop_info .= 'Giorno di chiusura: ' . $CAMPO_GIORNO_DI_CHIUSURA;
                        $body_desktop_info .= '[/fusion_li_item]';
                    }

                    if ($CAMPO_GIORNO_DI_CHIUSURA_PRODUZIONE != null) {
                        $body_desktop_info .= '[fusion_li_item icon="fa-calendar-alt far"]';
                        $body_desktop_info .= 'Giorno di chiusura produzione: ' . $CAMPO_GIORNO_DI_CHIUSURA_PRODUZIONE;
                        $body_desktop_info .= '[/fusion_li_item]';
                    }

                    if ($CAMPO_GIORNO_DI_CHIUSURA_PUNTO_VENDITA != null) {
                        $body_desktop_info .= '[fusion_li_item icon="fa-calendar-alt far"]';
                        $body_desktop_info .= 'Giorno di chiusura punto vendita: ' . $CAMPO_GIORNO_DI_CHIUSURA_PUNTO_VENDITA;
                        $body_desktop_info .= '[/fusion_li_item]';
                    }

                    $body_desktop_info .= '[/fusion_checklist]';
                    $body_desktop_info .= '[fusion_separator style_type="single solid" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id="" sep_color="" top_margin="" bottom_margin="2%" border_size="" icon="" icon_circle="" icon_circle_color="" width="" alignment="center" /]';

                    $body_desktop_useful_links .= '[fusion_social_links icons_boxed="yes" icons_boxed_radius="" color_type="brand" icon_colors="" box_colors="" tooltip_placement="" blogger="';

                    if ($CAMPO_SITO_WEB != null) {
                        $body_desktop_useful_links .= $CAMPO_SITO_WEB;
                    }

                    $body_desktop_useful_links .= '" deviantart="" digg="" dribbble="" dropbox="" facebook="';

                    if ($CAMPO_FACEBOOK != null) {
                        $body_desktop_useful_links .= $CAMPO_FACEBOOK;
                    }

                    $body_desktop_useful_links .= '" flickr="';

                    if ($CAMPO_FLICKR != null) {
                        $body_desktop_useful_links .= $CAMPO_FLICKR;
                    }

                    $body_desktop_useful_links .= '" forrst="" instagram="';

                    if ($CAMPO_INSTAGRAM != null) {
                        $body_desktop_useful_links .= $CAMPO_INSTAGRAM;
                    }

                    $body_desktop_useful_links .= '" linkedin="';

                    if ($CAMPO_LINKEDIN != null) {
                        $body_desktop_useful_links .= $CAMPO_LINKEDIN;
                    }

                    $body_desktop_useful_links .= '" myspace="" paypal="" pinterest="';

                    if ($CAMPO_PINTEREST != null) {
                        $body_desktop_useful_links .= $CAMPO_PINTEREST;
                    }

                    $body_desktop_useful_links .= '" reddit="" rss="" skype="" soundcloud="" spotify="" tumblr="" twitter="';

                    if ($CAMPO_TWITTER != null) {
                        $body_desktop_useful_links .= $CAMPO_TWITTER;
                    }

                    $body_desktop_useful_links .= '" vimeo="" vk="" whatsapp="" xing="" yahoo="" yelp="" youtube="';

                    if ($CAMPO_YOUTUBE != null) {
                        $body_desktop_useful_links .= $CAMPO_YOUTUBE;
                    }

                    $body_desktop_useful_links .= '" email="';

                    if ($CAMPO_EMAIL != null) {
                        $body_desktop_useful_links .= $CAMPO_EMAIL;
                    }

                    $body_desktop_useful_links .= '" show_custom="no" alignment="center" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id="" /]';
                    $body_desktop_useful_links .= '[fusion_separator style_type="single solid" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id="" sep_color="" top_margin="" bottom_margin="2%" border_size="" icon="" icon_circle="" icon_circle_color="" width="" alignment="center" /]';
                    $body_desktop_useful_links .= '[fusion_text columns="" column_min_width="" column_spacing="" rule_style="default" rule_size="" rule_color="" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id="infotype"]';
                    $body_desktop_useful_links .= 'Link utili';
                    $body_desktop_useful_links .= '[/fusion_text]';
                    $body_desktop_useful_links .= '[fusion_checklist icon="fa-hotel fas" iconcolor="" circle="" circlecolor="#03a9f4" size="" divider="" divider_color="" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id=""]';

                    if ($CAMPO_GOOGLE_MAPS != null) {
                        $body_desktop_useful_links .= '[fusion_li_item icon="fa-location-arrow fas"]';
                        $body_desktop_useful_links .= '<a href="' . $CAMPO_GOOGLE_MAPS . '">GOOGLE MAPS</a>';
                        $body_desktop_useful_links .= '[/fusion_li_item]';
                    }

                    if ($CAMPO_GOOGLE_MAPS_VENDITA != null) {
                        $body_desktop_useful_links .= '[fusion_li_item icon="fa-location-arrow fas"]';
                        $body_desktop_useful_links .= '<a href="' . $CAMPO_GOOGLE_MAPS_VENDITA . '">GOOGLE MAPS (PUNTO VENDkITA)</a>';
                        $body_desktop_useful_links .= '[/fusion_li_item]';
                    }

                    if ($CAMPO_GOOGLE_MAPS_PRODUZIONE != null) {
                        $body_desktop_useful_links .= '[fusion_li_item icon="fa-location-arrow fas"]';
                        $body_desktop_useful_links .= '<a href="' . $CAMPO_GOOGLE_MAPS_PRODUZIONE . '">GOOGLE MAPS (PUNTO PRODUZIONE)</a>';
                        $body_desktop_useful_links .= '[/fusion_li_item]';
                    }

                    if ($CAMPO_TRIPADVISOR != null) {
                        $body_desktop_useful_links .= '[fusion_li_item icon="fa-tripadvisor fab"]';
                        $body_desktop_useful_links .= '<a href="' . $CAMPO_TRIPADVISOR . '">TRIPADVISOR</a>';
                        $body_desktop_useful_links .= '[/fusion_li_item]';
                    }

                    if ($CAMPO_BOOKING != null) {
                        $body_desktop_useful_links .= '[fusion_li_item icon="fa-book fas"]';
                        $body_desktop_useful_links .= '<a href="' . $CAMPO_BOOKING . '">BOOKING</a>';
                        $body_desktop_useful_links .= '[/fusion_li_item]';
                    }

                    if ($CAMPO_HOTELS_COM != null) {
                        $body_desktop_useful_links .= '[fusion_li_item icon="fa-hotel fas"]';
                        $body_desktop_useful_links .= '<a href="' . $CAMPO_HOTELS_COM . '">HOTELS.COM</a>';
                        $body_desktop_useful_links .= '[/fusion_li_item]';
                    }

                    if ($CAMPO_AIRBNB != null) {
                        $body_desktop_useful_links .= '[fusion_li_item icon="fa-airbnb fab"]';
                        $body_desktop_useful_links .= '<a href="' . $CAMPO_AIRBNB . '">AIRBNB</a>';
                        $body_desktop_useful_links .= '[/fusion_li_item]';
                    }

                    if ($CAMPO_FACEBOOK != null) {
                        $body_desktop_useful_links .= '[fusion_li_item icon="fa-map-signs fas"]';
                        $body_desktop_useful_links .= '<a href="' . $CAMPO_FACEBOOK . '">FACEBOOK</a>';
                        $body_desktop_useful_links .= '[/fusion_li_item]';
                    }

                    if ($CAMPO_FLICKR != null) {
                        $body_desktop_useful_links .= '[fusion_li_item icon="fa-map-signs fas"]';
                        $body_desktop_useful_links .= '<a href="' . $CAMPO_FLICKR . '">FLICKR</a>';
                        $body_desktop_useful_links .= '[/fusion_li_item]';
                    }

                    if ($CAMPO_GOOGLE != null) {
                        $body_desktop_useful_links .= '[fusion_li_item icon="fa-map-signs fas"]';
                        $body_desktop_useful_links .= '<a href="' . $CAMPO_GOOGLE . '">GOOGLE</a>';
                        $body_desktop_useful_links .= '[/fusion_li_item]';
                    }

                    if ($CAMPO_GOOGLE_PLUS != null) {
                        $body_desktop_useful_links .= '[fusion_li_item icon="fa-map-signs fas"]';
                        $body_desktop_useful_links .= '<a href="' . $CAMPO_GOOGLE_PLUS . '">GOOGLE PLUS</a>';
                        $body_desktop_useful_links .= '[/fusion_li_item]';
                    }

                    if ($CAMPO_INSTAGRAM != null) {
                        $body_desktop_useful_links .= '[fusion_li_item icon="fa-map-signs fas"]';
                        $body_desktop_useful_links .= '<a href="' . $CAMPO_INSTAGRAM . '">INSTAGRAM</a>';
                        $body_desktop_useful_links .= '[/fusion_li_item]';
                    }

                    if ($CAMPO_LINKEDIN != null) {
                        $body_desktop_useful_links .= '[fusion_li_item icon=""]';
                        $body_desktop_useful_links .= '<a href="' . $CAMPO_LINKEDIN . '">LINKEDIN</a>';
                        $body_desktop_useful_links .= '[/fusion_li_item]';
                    }

                    if ($CAMPO_PINTEREST != null) {
                        $body_desktop_useful_links .= '[fusion_li_item icon=""]';
                        $body_desktop_useful_links .= '<a href="' . $CAMPO_PINTEREST . '">PINTEREST</a>';
                        $body_desktop_useful_links .= '[/fusion_li_item]';
                    }

                    if ($CAMPO_TWITTER != null) {
                        $body_desktop_useful_links .= '[fusion_li_item icon=""]';
                        $body_desktop_useful_links .= '<a href="' . $CAMPO_TWITTER . '">TWITTER</a>';
                        $body_desktop_useful_links .= '[/fusion_li_item]';
                    }

                    if ($CAMPO_YOUTUBE != null) {
                        $body_desktop_useful_links .= '[fusion_li_item icon=""]';
                        $body_desktop_useful_links .= '<a href="' . $CAMPO_YOUTUBE . '">YOUTUBE<a>';
                        $body_desktop_useful_links .= '[/fusion_li_item]';
                    }

                    if ($CAMPO_TRIPADVISOR != null) {
                        $body_desktop_useful_links .= '[fusion_li_item icon=""]';
                        $body_desktop_useful_links .= '<a href="' . $CAMPO_TRIPADVISOR . '">TRIPADVISOR</a>';
                        $body_desktop_useful_links .= '[/fusion_li_item]';
                    }

                    if ($CAMPO_VALUTAZIONI_GOOGLE != null) {
                        $body_desktop_useful_links .= '[fusion_li_item icon="fa-google fab"]';
                        $body_desktop_useful_links .= '<a href="' . $CAMPO_VALUTAZIONI_GOOGLE . '">VALUTAZIONI GOOGLE</a>';
                        $body_desktop_useful_links .= '[/fusion_li_item]';
                    }

                    $body_desktop_useful_links .= '[/fusion_checklist]';
                    $body_desktop_useful_links .= '[fusion_separator style_type="single solid" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id="" sep_color="" top_margin="" bottom_margin="2%" border_size="" icon="" icon_circle="" icon_circle_color="" width="" alignment="center" /]';

                    $body_desktop_mobile_information = '[fusion_text columns="" column_min_width="" column_spacing="" rule_style="default" rule_size="" rule_color="" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id="infotype"]';
                    $body_desktop_mobile_information .= 'Infomobilità';
                    $body_desktop_mobile_information .= '[/fusion_text]';
                    $body_desktop_mobile_information .= '[fusion_checklist icon="fa-hotel fas" iconcolor="" circle="" circlecolor="#03a9f4" size="" divider="" divider_color="" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id=""]';

                    if ($CAMPO_INFOMOBILITA != null) {
                        $body_desktop_mobile_information .= '[fusion_li_item icon="fa-shuttle-van fas"]';
                        $body_desktop_mobile_information .= $CAMPO_INFOMOBILITA;
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
                    $body_desktop_central .= $CAMPO_DESCRIZIONE;
                    $body_desktop_central .= '[/fusion_text]';
                    $body_desktop_central .= '[fusion_text columns="" column_min_width="" column_spacing="" rule_style="default" rule_size="" rule_color="" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id="" animation_type="" animation_direction="left" animation_speed="0.3" animation_offset=""]';
                    $body_desktop_central .= $CAMPO_INFO_AGGIUNTIVE;
                    $body_desktop_central .= '[/fusion_text]';
                    $body_desktop_central .= '[fusion_separator style_type="single solid" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id="" sep_color="#968caf" top_margin="" bottom_margin="" border_size="" icon="" icon_circle="" icon_circle_color="" width="" alignment="center" /]';
                    $body_desktop_central .= '[fusion_builder_row_inner]';
                    $body_desktop_central .= '[fusion_builder_column_inner type="1_1" layout="1_2" spacing="" center_content="no" hover_type="none" link="" target="_self" min_height="" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id="" border_size="0" border_color="" border_style="solid" border_position="all" border_radius="" box_shadow="no" dimension_box_shadow="" box_shadow_blur="0" box_shadow_spread="0" box_shadow_color="" box_shadow_style="" padding_top="" padding_right="" padding_bottom="" padding_left="" dimension_margin="" background_type="single" background_color="" gradient_start_color="" gradient_end_color="" gradient_start_position="0" gradient_end_position="100" gradient_type="linear" radial_direction="center" linear_angle="180" background_image="" background_position="left top" background_repeat="no-repeat" background_blend_mode="none" animation_type="" animation_direction="left" animation_speed="0.3" animation_offset="" filter_type="regular" filter_hue="0" filter_saturation="100" filter_brightness="100" filter_contrast="100" filter_invert="0" filter_sepia="0" filter_opacity="100" filter_blur="0" filter_hue_hover="0" filter_saturation_hover="100" filter_brightness_hover="100" filter_contrast_hover="100" filter_invert_hover="0" filter_sepia_hover="0" filter_opacity_hover="100" filter_blur_hover="0" last="no"]';
                    $body_desktop_central .= '[fusion_imageframe image_id="6278|full" max_width="" style_type="" blur="" stylecolor="" hover_type="liftup" bordersize="" bordercolor="" borderradius="" align="none" lightbox="no" gallery_id="" lightbox_image="" lightbox_image_id="" alt="" link="" linktarget="_self" hide_on_mobile="small-visibility,medium-visibility,large-visibility" animation_type="" animation_direction="left" animation_speed="0.3" animation_offset="" class="" id=""]';
                    $body_desktop_central .= $IMMAGINE_GALLERIA_1;
                    $body_desktop_central .= '[/fusion_imageframe]';
                    $body_desktop_central .= '[/fusion_builder_column_inner]';
                    $body_desktop_central .= '[fusion_builder_column_inner type="1_1" layout="1_2" spacing="" center_content="no" hover_type="none" link="" target="_self" min_height="" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id="" border_size="0" border_color="" border_style="solid" border_position="all" box_shadow="no" box_shadow_blur="0" box_shadow_spread="0" box_shadow_color="" box_shadow_style="" background_type="single" background_color="" gradient_start_position="0" gradient_end_position="100" gradient_type="linear" radial_direction="center" linear_angle="180" background_image="" background_position="left top" background_repeat="no-repeat" background_blend_mode="none" animation_type="" animation_direction="left" animation_speed="0.3" animation_offset="" filter_type="regular" filter_hue="0" filter_saturation="100" filter_brightness="100" filter_contrast="100" filter_invert="0" filter_sepia="0" filter_opacity="100" filter_blur="0" filter_hue_hover="0" filter_saturation_hover="100" filter_brightness_hover="100" filter_contrast_hover="100" filter_invert_hover="0" filter_sepia_hover="0" filter_opacity_hover="100" filter_blur_hover="0" last="no"]';
                    $body_desktop_central .= '[fusion_imageframe image_id="6226|full" max_width="" style_type="" blur="" stylecolor="" hover_type="liftup" bordersize="" bordercolor="" borderradius="" align="none" lightbox="no" gallery_id="" lightbox_image="" lightbox_image_id="" alt="" link="" linktarget="_self" hide_on_mobile="small-visibility,medium-visibility,large-visibility" animation_type="" animation_direction="left" animation_speed="0.3" animation_offset="" class="" id=""]';
                    $body_desktop_central .= $IMMAGINE_GALLERIA_2;
                    $body_desktop_central .= '[/fusion_imageframe]';
                    $body_desktop_central .= '[/fusion_builder_column_inner]';
                    $body_desktop_central .= '[fusion_builder_column_inner type="1_1" layout="1_2" spacing="" center_content="no" hover_type="none" link="" target="_self" min_height="" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id="" border_size="0" border_color="" border_style="solid" border_position="all" box_shadow="no" box_shadow_blur="0" box_shadow_spread="0" box_shadow_color="" box_shadow_style="" background_type="single" background_color="" gradient_start_position="0" gradient_end_position="100" gradient_type="linear" radial_direction="center" linear_angle="180" background_image="" background_position="left top" background_repeat="no-repeat" background_blend_mode="none" animation_type="" animation_direction="left" animation_speed="0.3" animation_offset="" filter_type="regular" filter_hue="0" filter_saturation="100" filter_brightness="100" filter_contrast="100" filter_invert="0" filter_sepia="0" filter_opacity="100" filter_blur="0" filter_hue_hover="0" filter_saturation_hover="100" filter_brightness_hover="100" filter_contrast_hover="100" filter_invert_hover="0" filter_sepia_hover="0" filter_opacity_hover="100" filter_blur_hover="0" last="no"]';
                    $body_desktop_central .= '[fusion_imageframe image_id="6201|full" max_width="" style_type="" blur="" stylecolor="" hover_type="liftup" bordersize="" bordercolor="" borderradius="" align="none" lightbox="no" gallery_id="" lightbox_image="" lightbox_image_id="" alt="" link="" linktarget="_self" hide_on_mobile="small-visibility,medium-visibility,large-visibility" animation_type="" animation_direction="left" animation_speed="0.3" animation_offset="" class="" id=""]';
                    $body_desktop_central .= $IMMAGINE_GALLERIA_3;
                    $body_desktop_central .= '[/fusion_imageframe]';
                    $body_desktop_central .= '[/fusion_builder_column_inner]';
                    $body_desktop_central .= '[fusion_builder_column_inner type="1_1" layout="1_2" spacing="" center_content="no" hover_type="none" link="" target="_self" min_height="" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id="" border_size="0" border_color="" border_style="solid" border_position="all" box_shadow="no" box_shadow_blur="0" box_shadow_spread="0" box_shadow_color="" box_shadow_style="" background_type="single" background_color="" gradient_start_position="0" gradient_end_position="100" gradient_type="linear" radial_direction="center" linear_angle="180" background_image="" background_position="left top" background_repeat="no-repeat" background_blend_mode="none" animation_type="" animation_direction="left" animation_speed="0.3" animation_offset="" filter_type="regular" filter_hue="0" filter_saturation="100" filter_brightness="100" filter_contrast="100" filter_invert="0" filter_sepia="0" filter_opacity="100" filter_blur="0" filter_hue_hover="0" filter_saturation_hover="100" filter_brightness_hover="100" filter_contrast_hover="100" filter_invert_hover="0" filter_sepia_hover="0" filter_opacity_hover="100" filter_blur_hover="0" last="no"]';
                    $body_desktop_central .= '[fusion_imageframe image_id="5281|full" max_width="" style_type="" blur="" stylecolor="" hover_type="liftup" bordersize="" bordercolor="" borderradius="" align="none" lightbox="no" gallery_id="" lightbox_image="" lightbox_image_id="" alt="" link="" linktarget="_self" hide_on_mobile="small-visibility,medium-visibility,large-visibility" animation_type="" animation_direction="left" animation_speed="0.3" animation_offset="" class="" id=""]';
                    $body_desktop_central .= $IMMAGINE_GALLERIA_4;
                    $body_desktop_central .= '[/fusion_imageframe]';
                    $body_desktop_central .= '[/fusion_builder_column_inner]';
                    $body_desktop_central .= '[fusion_builder_column_inner type="1_1" layout="1_1" spacing="" center_content="no" hover_type="none" link="" target="_self" min_height="" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id="" border_size="0" border_color="" border_style="solid" border_position="all" border_radius="" box_shadow="no" dimension_box_shadow="" box_shadow_blur="0" box_shadow_spread="0" box_shadow_color="" box_shadow_style="" padding_top="" padding_right="" padding_bottom="" padding_left="" dimension_margin="" background_type="single" background_color="" gradient_start_color="" gradient_end_color="" gradient_start_position="0" gradient_end_position="100" gradient_type="linear" radial_direction="center" linear_angle="180" background_image="" background_position="left top" background_repeat="no-repeat" background_blend_mode="none" animation_type="" animation_direction="left" animation_speed="0.3" animation_offset="" filter_type="regular" filter_hue="0" filter_saturation="100" filter_brightness="100" filter_contrast="100" filter_invert="0" filter_sepia="0" filter_opacity="100" filter_blur="0" filter_hue_hover="0" filter_saturation_hover="100" filter_brightness_hover="100" filter_contrast_hover="100" filter_invert_hover="0" filter_sepia_hover="0" filter_opacity_hover="100" filter_blur_hover="0" last="no"]';
                    $body_desktop_central .= '[fusion_imageframe image_id="5207|full" max_width="" style_type="" blur="" stylecolor="" hover_type="liftup" bordersize="" bordercolor="" borderradius="" align="none" lightbox="no" gallery_id="" lightbox_image="" lightbox_image_id="" alt="" link="" linktarget="_self" hide_on_mobile="small-visibility,medium-visibility,large-visibility" animation_type="" animation_direction="left" animation_speed="0.3" animation_offset="" class="" id=""]';
                    $body_desktop_central .= $IMMAGINE_GALLERIA_5;
                    $body_desktop_central .= '[/fusion_imageframe]';
                    $body_desktop_central .= '[/fusion_builder_column_inner]';
                    $body_desktop_central .= '[/fusion_builder_row_inner]';
                    $body_desktop_central .= '[/fusion_builder_column]';

                    $body_desktop_service = '[fusion_builder_column type="1_5" layout="1_3" spacing="" center_content="no" link="" target="_self" min_height="" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id="" background_color="" background_image="" background_image_id="" background_position="left top" background_repeat="no-repeat" hover_type="none" border_size="0" border_color="" border_style="solid" border_position="all" border_radius="" box_shadow="no" dimension_box_shadow="" box_shadow_blur="0" box_shadow_spread="0" box_shadow_color="" box_shadow_style="" padding_top="" padding_right="" padding_bottom="" padding_left="" margin_top="" margin_bottom="" animation_type="" animation_direction="left" animation_speed="0.3" animation_offset="" last="no"]';
                    $body_desktop_service .= '[fusion_text columns="" column_min_width="" column_spacing="" rule_style="default" rule_size="" rule_color="" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id="infotype"]';
                    $body_desktop_service .= 'Servizi';
                    $body_desktop_service .= '[/fusion_text]';
                    $body_desktop_service .= '[fusion_checklist icon="fa-check fas" iconcolor="" circle="" circlecolor="#03a9f4" size="" divider="yes" divider_color="" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id=""]';

//                    if ($CAMPO_DISTANZA != null) {
//                        $body_desktop_service .= '[fusion_li_item icon="fa-arrows-alt-h fas"]';
//                        $body_desktop_service .= 'Distanza: ' . $CAMPO_DISTANZA;
//                        $body_desktop_service .= '[/fusion_li_item]';
//                    }

                    if ($CAMPO_COSTO_BIGLIETTO != null) {
                        $body_desktop_service .= '[fusion_li_item icon="fa-ticket-alt fas"]';
                        $body_desktop_service .= 'Biglietti: €' . $CAMPO_COSTO_BIGLIETTO;
                        $body_desktop_service .= '[/fusion_li_item]';
                    }

//                    if ($CAMPO_PARCHEGGIO != null) {
//                        $body_desktop_service .= '[fusion_li_item icon="fa-parking fas"]';
//                        $body_desktop_service .= 'Parcheggio: ' . $CAMPO_PARCHEGGIO;
//                        $body_desktop_service .= '[/fusion_li_item]';
//                    }

//                    if ($CAMPO_PARCHEGGIO_GRATUITO != null) {
//                        $body_desktop_service .= '[fusion_li_item icon="fa-parking fas"]';
//                        $body_desktop_service .= 'Parcheggio gratuito: ' . $CAMPO_PARCHEGGIO_GRATUITO;
//                        $body_desktop_service .= '[/fusion_li_item]';
//                    }

//                    if ($CAMPO_PARCHEGGIO_IN_STRADA != null) {
//                        $body_desktop_service .= '[fusion_li_item icon="fa-parking fas"]';
//                        $body_desktop_service .= 'Parcheggio in strada: ' . $CAMPO_PARCHEGGIO_IN_STRADA;
//                        $body_desktop_service .= '[/fusion_li_item]';
//                    }

//                    if ($CAMPO_PARCHEGGIO_CUSTODITO != null) {
//                        $body_desktop_service .= '[fusion_li_item icon="fa-parking fas"]';
//                        $body_desktop_service .= 'Parcheggio custodito: ' . $CAMPO_PARCHEGGIO_CUSTODITO;
//                        $body_desktop_service .= '[/fusion_li_item]';
//                    }

//                    if ($CAMPO_SERVIZI_DI_NOLEGGIO != null) {
//                        $body_desktop_service .= '[fusion_li_item icon="fa-hiking fas"]';
//                        $body_desktop_service .= 'Servizi di noleggio: ' . $CAMPO_SERVIZI_DI_NOLEGGIO;
//                        $body_desktop_service .= '[/fusion_li_item]';
//                    }

                    if ($CAMPO_PROPOSTE_VACANZE_IN_MOLISE != null) {
                        $body_desktop_service .= '[fusion_li_item icon="fa-shuttle-van fas"]';
                        $body_desktop_service .= 'Proposte vacanze in Molise: ' . $CAMPO_PROPOSTE_VACANZE_IN_MOLISE;
                        $body_desktop_service .= '[/fusion_li_item]';
                    }

//                    if ($CAMPO_VISITE_GUIDATE != null) {
//                        $body_desktop_service .= '[fusion_li_item icon="fa-university fas"]';
//                        $body_desktop_service .= 'Visite guidate: ' . $CAMPO_VISITE_GUIDATE;
//                        $body_desktop_service .= '[/fusion_li_item]';
//                    }

//                    if ($ACCESSIBILE_AI_DISABILI != null) {
//                        $body_desktop_service .= '[fusion_li_item icon="fa-wheelchair fas"]';
//                        $body_desktop_service .= 'Accessibile ai disabili: ' . $ACCESSIBILE_AI_DISABILI;
//                        $body_desktop_service .= '[/fusion_li_item]';
//                    }

//                    if ($CAMPO_MENU_VEGETARIANO != null) {
//                        $body_desktop_service .= '[fusion_li_item icon="fa-fish fas"]';
//                        $body_desktop_service .= 'Menù per vegetariani: ' . $CAMPO_MENU_VEGETARIANO;
//                        $body_desktop_service .= '[/fusion_li_item]';
//                    }

//                    if ($CAMPO_MENU_CARNE != null) {
//                        $body_desktop_service .= '[fusion_li_item icon="fa-fish fas"]';
//                        $body_desktop_service .= 'Menù carne: ' . $CAMPO_MENU_CARNE;
//                        $body_desktop_service .= '[/fusion_li_item]';
//                    }

//                    if ($CAMPO_MENU_PESCE != null) {
//                        $body_desktop_service .= '[fusion_li_item icon="fa-fish fas"]';
//                        $body_desktop_service .= 'Menù pesce: ' . $CAMPO_MENU_PESCE;
//                        $body_desktop_service .= '[/fusion_li_item]';
//                    }

//                    if ($CAMPO_MENU_CELIACI != null) {
//                        $body_desktop_service .= '[fusion_li_item icon="fa-fish fas"]';
//                        $body_desktop_service .= 'Menù per celiaci: ' . $CAMPO_MENU_CELIACI;
//                        $body_desktop_service .= '[/fusion_li_item]';
//                    }

//                    if ($CAMPO_MENU_VEGANO != null) {
//                        $body_desktop_service .= '[fusion_li_item icon="fa-fish fas"]';
//                        $body_desktop_service .= 'Menù vegano: ' . $CAMPO_MENU_VEGANO;
//                        $body_desktop_service .= '[/fusion_li_item]';
//                    }

//                    if ($CAMPO_CUCINA_INTERNAZIONALE != null) {
//                        $body_desktop_service .= '[fusion_li_item icon="fa-fish fas"]';
//                        $body_desktop_service .= 'Cucina internazionale: ' . $CAMPO_CUCINA_INTERNAZIONALE;
//                        $body_desktop_service .= '[/fusion_li_item]';
//                    }

//                    if ($CAMPO_PAGAMENTO_CON_CARTA != null) {
//                        $body_desktop_service .= '[fusion_li_item icon="fa-credit-card far"]';
//                        $body_desktop_service .= 'Pagamento con carta: ' . $CAMPO_PAGAMENTO_CON_CARTA;
//                        $body_desktop_service .= '[/fusion_li_item]';
//                    }

//                    if ($CAMPO_POSTO_AUTO != null) {
//                        $body_desktop_service .= '[fusion_li_item icon="fa-car-side fas"]';
//                        $body_desktop_service .= 'Posto auto: ' . $CAMPO_POSTO_AUTO;
//                        $body_desktop_service .= '[/fusion_li_item]';
//                    }

//                    if ($CAMPO_POSTO_BICI != null) {
//                        $body_desktop_service .= '[fusion_li_item icon="fa-bicycle fas"]';
//                        $body_desktop_service .= 'Posto bici: ' . $CAMPO_POSTO_BICI;
//                        $body_desktop_service .= '[/fusion_li_item]';
//                    }

//                    if ($CAMPO_SERVIZI_SPIAGGIA != null) {
//                        $body_desktop_service .= '[fusion_li_item icon="fa-umbrella-beach fas"]';
//                        $body_desktop_service .= 'Servizi spiaggia: ' . $CAMPO_SERVIZI_SPIAGGIA;
//                        $body_desktop_service .= '[/fusion_li_item]';
//                    }

//                    if ($CAMPO_PISCINA != null) {
//                        $body_desktop_service .= '[fusion_li_item icon="fa-swimmer fas"]';
//                        $body_desktop_service .= 'Piscina: ' . $CAMPO_PISCINA;
//                        $body_desktop_service .= '[/fusion_li_item]';
//                    }

//                    if ($CAMPO_ANIMALI_AMMESSI != null) {
//                        $body_desktop_service .= '[fusion_li_item icon="fa-paw fas"]';
//                        $body_desktop_service .= 'Animali ammessi: ' . $CAMPO_ANIMALI_AMMESSI;
//                        $body_desktop_service .= '[/fusion_li_item]';
//                    }

                    // TODO: Sistemare icone
                    if ($CAMPO_SERVIZI_OFFERTI != null) {
                        foreach ($CAMPO_SERVIZI_OFFERTI as $field_value) {
                            switch ($field_value) {
                                case "Distanza":
                                    $service_icon = "fa-arrows-alt-h fas";
                                    break;

                                case "Parcheggio":
                                case "Parcheggio gratuito":
                                case "Parcheggio in strada":
                                case "Parcheggio custodito":
                                    $service_icon = "fa-parking fas";
                                    break;

                                case "Servizi di noleggio":
                                    $service_icon = "fa-hiking fas";
                                    break;

                                case "Visite guidate":
                                    $service_icon = "fa-university fas";
                                    break;

                                case "Accessibile ai disabili":
                                    $service_icon = "fa-wheelchair fas";
                                    break;

                                case "Menù vegetariano":
                                case "Menù carne":
                                case "Menù pesce":
                                case "Menù celiaci":
                                case "Menù vegano":
                                case "Cucina internazionale":
                                case "Degustazioni in loco":
                                    $service_icon = "fa-fish fas";
                                    break;

                                case "Pagamento con carta":
                                    $service_icon = "fa-credit-card far";
                                    break;

                                case "Posto auto":
                                    $service_icon = "fa-car-side fas";
                                    break;

                                case "Posto bici":
                                case "Sentieri escursionistici":
                                    $service_icon = "fa-bicycle fas";
                                    break;

                                case "Servizi spiaggia":
                                    $service_icon = "fa-umbrella-beach fas";
                                    break;

                                case "Piscina":
                                    $service_icon = "fa-swimmer fas";
                                    break;

                                case "Animali ammessi":
                                    $service_icon = "fa-paw fas";
                                    break;

                                case "Maneggio":
                                    $service_icon = "fa-horse fas";
                                    break;

                                case "Beauty farm":
                                    $service_icon = "fa-smile-beam fas";
                                    break;

                                case "Free WIFI":
                                    $service_icon = "fa-wifi fas";
                                    break;

                                case "Servizio in camera":
                                    $service_icon = "fa-toilet-paper fas";
                                    break;

                                case "Per famiglie con bambini":
                                    $service_icon = "fa-baby fas";
                                    break;

                                case "Noleggio pedalò/attrezzature marine":
                                    $service_icon = "fa-water fas";
                                    break;

                                case "Area camper":
                                    $service_icon = "fa-bus fas";
                                    break;

                                case "Area picnic":
                                case "Ristorante":
                                    $service_icon = "fa-drumstick-bite fas";
                                    break;

                                case "Bar":
                                    $service_icon = "fa-cocktail fas";
                                    break;

                                case "Palestra":
                                    $service_icon = "fa-dumbbell fas";
                                    break;

                                default:
                                    $service_icon = "";
                                    break;
                            }

                            $body_desktop_service .= '[fusion_li_item icon="' . $service_icon . '"]';
                            $body_desktop_service .= $field_value . ': si';
                            $body_desktop_service .= '[/fusion_li_item]';
                        }
                    }

//                    if ($CAMPO_MANEGGIO != null) {
//                        $body_desktop_service .= '[fusion_li_item icon="fa-horse fas"]';
//                        $body_desktop_service .= 'Maneggio: ' . $CAMPO_MANEGGIO;
//                        $body_desktop_service .= '[/fusion_li_item]';
//                    }

//                    if ($CAMPO_BEAUTY_FARM != null) {
//                        $body_desktop_service .= '[fusion_li_item icon="fa-smile-beam fas"]';
//                        $body_desktop_service .= 'Beauty farm: ' . $CAMPO_BEAUTY_FARM;
//                        $body_desktop_service .= '[/fusion_li_item]';
//                    }

//                    if ($CAMPO_FREE_WIFI != null) {
//                        $body_desktop_service .= '[fusion_li_item icon="fa-wifi fas"]';
//                        $body_desktop_service .= 'Free WiFi: ' . $CAMPO_FREE_WIFI;
//                        $body_desktop_service .= '[/fusion_li_item]';
//                    }

//                    if ($CAMPO_SERVIZIO_IN_CAMERA != null) {
//                        $body_desktop_service .= '[fusion_li_item icon="fa-toilet-paper fas"]';
//                        $body_desktop_service .= 'Servizio in camera: ' . $CAMPO_SERVIZIO_IN_CAMERA;
//                        $body_desktop_service .= '[/fusion_li_item]';
//                    }

                    if ($CAMPO_PACCHETTI_OFFERTI != null) {
                        $body_desktop_service .= '[fusion_li_item icon="fa-box-open fas"]';
                        $body_desktop_service .= 'Pacchetti offerti: ' . $CAMPO_PACCHETTI_OFFERTI;
                        $body_desktop_service .= '[/fusion_li_item]';
                    }

                    if ($CAMPO_STELLE != null) {
                        $body_desktop_service .= '[fusion_li_item icon="fa-star far"]';
                        $body_desktop_service .= 'Stelle: ' . $CAMPO_STELLE;
                        $body_desktop_service .= '[/fusion_li_item]';
                    }

//                    if ($CAMPO_PER_FAMIGLIE_CON_BAMBINI != null) {
//                        $body_desktop_service .= '[fusion_li_item icon="fa-baby fas"]';
//                        $body_desktop_service .= 'Per famiglie con bambini: ' . $CAMPO_PER_FAMIGLIE_CON_BAMBINI;
//                        $body_desktop_service .= '[/fusion_li_item]';
//                    }

//                    if ($CAMPO_DEGUSTAZIONI_IN_LOCO != null) {
//                        $body_desktop_service .= '[fusion_li_item icon="fa-fish fas"]';
//                        $body_desktop_service .= 'Degustazioni in loco: ' . $CAMPO_DEGUSTAZIONI_IN_LOCO;
//                        $body_desktop_service .= '[/fusion_li_item]';
//                    }

//                    if ($CAMPO_NOLEGGIO_PEDALO_ATTREZZATURE_MARINE != null) {
//                        $body_desktop_service .= '[fusion_li_item icon="fa-water fas"]';
//                        $body_desktop_service .= 'Noleggio pedalò/Attrezzature marine: ' . $CAMPO_NOLEGGIO_PEDALO_ATTREZZATURE_MARINE;
//                        $body_desktop_service .= '[/fusion_li_item]';
//                    }

//                    if ($CAMPO_SENTIERI_ESCURSIONISTICI != null) {
//                        $body_desktop_service .= '[fusion_li_item icon="fa-bicycle fas"]';
//                        $body_desktop_service .= 'Sentieri escursionistici: ' . $CAMPO_SENTIERI_ESCURSIONISTICI;
//                        $body_desktop_service .= '[/fusion_li_item]';
//                    }

//                    if ($CAMPO_AREA_CAMPER != null) {
//                        $body_desktop_service .= '[fusion_li_item icon="fa-bus fas"]';
//                        $body_desktop_service .= 'Area camper: ' . $CAMPO_AREA_CAMPER;
//                        $body_desktop_service .= '[/fusion_li_item]';
//                    }

//                    if ($CAMPO_AREA_PICNIC != null) {
//                        $body_desktop_service .= '[fusion_li_item icon="fa-drumstick-bite fas"]';
//                        $body_desktop_service .= 'Area picnic: ' . $CAMPO_AREA_PICNIC;
//                        $body_desktop_service .= '[/fusion_li_item]';
//                    }

                    if ($CAMPO_DETTAGLI_VISITE != null) {
                        $body_desktop_service .= '[fusion_li_item icon="fa-align-left fas"]';
                        $body_desktop_service .= 'Dettagli visite: ' . $CAMPO_DETTAGLI_VISITE;
                        $body_desktop_service .= '[/fusion_li_item]';
                    }

                    if ($CAMPO_STATO_CONSERVAZIONE != null) {
                        $body_desktop_service .= '[fusion_li_item icon="fa-mosque fas"]';
                        $body_desktop_service .= 'Stato conservazione: ' . $CAMPO_STATO_CONSERVAZIONE;
                        $body_desktop_service .= '[/fusion_li_item]';
                    }

                    if ($CAMPO_VENDITA_AL_DETTAGLIO != null) {
                        $body_desktop_service .= '[fusion_li_item icon="fa-money-bill-alt fas"]';
                        $body_desktop_service .= 'Vendita al dettaglio: ' . $CAMPO_VENDITA_AL_DETTAGLIO;
                        $body_desktop_service .= '[/fusion_li_item]';
                    }

                    if ($CAMPO_ORGANIZZATORE != null) {
                        $body_desktop_service .= '[fusion_li_item icon="fa-address-book fas"]';
                        $body_desktop_service .= 'Organizzatore: ' . $CAMPO_ORGANIZZATORE;
                        $body_desktop_service .= '[/fusion_li_item]';
                    }

                    if ($CAMPO_LUOGO != null) {
                        $body_desktop_service .= '[fusion_li_item icon="fa-archway fas"]';
                        $body_desktop_service .= 'Luogo: ' . $CAMPO_LUOGO;
                        $body_desktop_service .= '[/fusion_li_item]';
                    }

                    if ($CAMPO_PERIODO != null) {
                        $body_desktop_service .= '[fusion_li_item icon="fa-sun fas"]';
                        $body_desktop_service .= 'Periodo: ' . $CAMPO_PERIODO;
                        $body_desktop_service .= '[/fusion_li_item]';
                    }

                    if ($CAMPO_INFORMAZIONI_CRONOLOGICHE != null) {
                        $body_desktop_service .= '[fusion_li_item icon="fa-clock fas"]';
                        $body_desktop_service .= 'Informazioni cronologiche: ' . $CAMPO_INFORMAZIONI_CRONOLOGICHE;
                        $body_desktop_service .= '[/fusion_li_item]';
                    }

//                    if ($CAMPO_BAR != null) {
//                        $body_desktop_service .= '[fusion_li_item icon="fa-cocktail fas"]';
//                        $body_desktop_service .= 'Bar: ' . $CAMPO_BAR;
//                        $body_desktop_service .= '[/fusion_li_item]';
//                    }

//                    if ($CAMPO_RISTORANTE != null) {
//                        $body_desktop_service .= '[fusion_li_item icon="fa-drumstick-bite fas"]';
//                        $body_desktop_service .= 'Ristorante: ' . $CAMPO_RISTORANTE;
//                        $body_desktop_service .= '[/fusion_li_item]';
//                    }

                    if ($CAMPO_LABORATORI_DIDATTICI != null) {
                        $body_desktop_service .= '[fusion_li_item icon="fa-allergies fas"]';
                        $body_desktop_service .= 'Laboratori didattici: ' . $CAMPO_LABORATORI_DIDATTICI;
                        $body_desktop_service .= '[/fusion_li_item]';
                    }

                    if ($CAMPO_LINK_ALLE_PROPOSTE != null) {
                        $body_desktop_service .= '[fusion_li_item icon="fa-forward fas"]';
                        $body_desktop_service .= 'Link alle proposte: ' . $CAMPO_LINK_ALLE_PROPOSTE;
                        $body_desktop_service .= '[/fusion_li_item]';
                    }

                    if ($CAMPO_ALTRO != null) {
                        $body_desktop_service .= '[fusion_li_item icon="fa-align-justify fas"]';
                        $body_desktop_service .= 'Altro: ' . $CAMPO_ALTRO;
                        $body_desktop_service .= '[/fusion_li_item]';
                    }

                    $body_desktop_service .= '[/fusion_checklist][/fusion_builder_column][/fusion_builder_row][/fusion_builder_container]';


                    /*** BODY MOBILE **/
                    $body_mobile = '[fusion_builder_container admin_label="Info(TABLET E SMARTPHONE)" hide_on_mobile="small-visibility,medium-visibility" status="published" publish_date="" hundred_percent="yes" hundred_percent_height="no" hundred_percent_height_scroll="no" hundred_percent_height_center_content="yes" equal_height_columns="no" menu_anchor="storia" class="" id="" border_size="" border_color="" border_style="solid" margin_top="4%" margin_bottom="4%" padding_top="0px" padding_right="4%" padding_bottom="0px" padding_left="4%" gradient_start_color="" gradient_end_color="" gradient_start_position="0" gradient_end_position="100" gradient_type="linear" radial_direction="center" linear_angle="180" background_color="" background_image="" background_position="center center" background_repeat="no-repeat" fade="no" background_parallax="none" enable_mobile="no" parallax_speed="0.3" background_blend_mode="none" video_mp4="" video_webm="" video_ogv="" video_url="" video_aspect_ratio="16:9" video_loop="yes" video_mute="yes" video_preview_image="" filter_hue="0" filter_saturation="100" filter_brightness="100" filter_contrast="100" filter_invert="0" filter_sepia="0" filter_opacity="100" filter_blur="0" filter_hue_hover="0" filter_saturation_hover="100" filter_brightness_hover="100" filter_contrast_hover="100" filter_invert_hover="0" filter_sepia_hover="0" filter_opacity_hover="100" filter_blur_hover="0" admin_toggled="no"]';

                    $body_mobile_central = '[fusion_builder_row]';
                    $body_mobile_central .= '[fusion_builder_column type="1_1" layout="1_1" spacing="" center_content="no" link="" target="_self" min_height="" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id="" background_image_id="" background_color="" background_image="" background_position="left top" undefined="" background_repeat="no-repeat" hover_type="none" border_size="0" border_color="" border_style="solid" border_position="all" border_radius_top_left="" border_radius_top_right="" border_radius_bottom_left="" border_radius_bottom_right="" box_shadow="no" box_shadow_vertical="" box_shadow_horizontal="" box_shadow_blur="" box_shadow_spread="" box_shadow_color="" box_shadow_style="" padding_top="" padding_right="" padding_bottom="" padding_left="" margin_top="" margin_bottom="" animation_type="" animation_direction="left" animation_speed="0.3" animation_offset="" last="no"]';
                    $body_mobile_central .= '[fusion_text columns="" column_min_width="" column_spacing="" rule_style="default" rule_size="" rule_color="" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id="infotype"]';
                    $body_mobile_central .= 'Descrizione';
                    $body_mobile_central .= '[/fusion_text]';
                    $body_mobile_central .= '[fusion_text columns="" column_min_width="" column_spacing="" rule_style="default" rule_size="" rule_color="" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id="" animation_type="" animation_direction="left" animation_speed="0.3" animation_offset=""]';
                    $body_mobile_central .= $CAMPO_DESCRIZIONE;
                    $body_mobile_central .= '[/fusion_text]';
                    $body_mobile_central .= '[fusion_separator style_type="single solid" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id="" sep_color="" top_margin="" bottom_margin="2%" border_size="" icon="" icon_circle="" icon_circle_color="" width="" alignment="center" /]';
                    $body_mobile_central .= '[fusion_text columns="" column_min_width="" column_spacing="" rule_style="default" rule_size="" rule_color="" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id="" animation_type="" animation_direction="left" animation_speed="0.3" animation_offset=""]';
                    $body_mobile_central .= $CAMPO_INFO_AGGIUNTIVE;
                    $body_mobile_central .= '[/fusion_text]';
                    $body_mobile_central .= '[fusion_separator style_type="single solid" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id="" sep_color="" top_margin="" bottom_margin="2%" border_size="" icon="" icon_circle="" icon_circle_color="" width="" alignment="center" /]';

                    $body_mobile_info = '[fusion_text columns="" column_min_width="" column_spacing="" rule_style="default" rule_size="" rule_color="" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id="infotype"]';
                    $body_mobile_info .= 'Info e contatti';
                    $body_mobile_info .= '[/fusion_text]';
                    $body_mobile_info .= '[fusion_checklist icon="" iconcolor="#000000" circle="no" circlecolor="#ffffff" size="" divider="no" divider_color="" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id=""]';

                    if ($CAMPO_SOCIETA_ASSOCIAZIONE != null) {
                        $body_mobile_info .= '[fusion_li_item icon="fa-globe fas"]';
                        $body_mobile_info .= 'Società/Associazione: ' . $CAMPO_SOCIETA_ASSOCIAZIONE;
                        $body_mobile_info .= '[/fusion_li_item]';
                    }

                    if ($CAMPO_SITO_WEB != null) {
                        $body_mobile_info .= '[fusion_li_item icon="fa-globe fas"]';
                        $body_mobile_info .= $CAMPO_SITO_WEB;
                        $body_mobile_info .= '[/fusion_li_item]';
                    }

                    if ($CAMPO_TELEFONO != null) {
                        $body_mobile_info .= '[fusion_li_item icon="fa-phone fas"]';
                        $body_mobile_info .= $CAMPO_TELEFONO;

                        if ($CAMPO_TELEFONO1 != null)
                            $body_mobile_info .= $CAMPO_TELEFONO1;

                        $body_mobile_info .= '[/fusion_li_item]';
                    }

                    if ($CAMPO_EMAIL != null) {
                        $body_mobile_info .= '[fusion_li_item icon="fa-envelope far"]';
                        $body_mobile_info .= $CAMPO_EMAIL;

                        if ($CAMPO_EMAIL1 != null) {
                            $body_mobile_info .= $CAMPO_EMAIL1;
                        }

                        $body_mobile_info .= '[/fusion_li_item]';
                    }

                    if (($CAMPO_INDIRIZZO != null) && ($CAMPO_COMUNE != null) && ($CAMPO_PROVINCIA != null)) {
                        $body_mobile_info .= '[fusion_li_item icon="fa-map-marker-alt fas"]';
                        $body_mobile_info .= $CAMPO_INDIRIZZO;
                        $body_mobile_info .= $CAMPO_COMUNE . ' (' . $CAMPO_PROVINCIA . ')';
                        $body_mobile_info .= '[/fusion_li_item]';
                    }

                    if (($CAMPO_INDIRIZZO_PUNTO_VENDITA != null) && ($CAMPO_COMUNE_PUNTO_VENDITA != null) && ($CAMPO_PROVINCIA_PUNTO_VENDITA != null)) {
                        $body_mobile_info .= '[fusion_li_item icon="fa-store fas"]';
                        $body_mobile_info .= $CAMPO_INDIRIZZO_PUNTO_VENDITA;
                        $body_mobile_info .= $CAMPO_COMUNE_PUNTO_VENDITA . ' (' . $CAMPO_PROVINCIA_PUNTO_VENDITA . ')';
                        $body_mobile_info .= '[/fusion_li_item]';
                    }

                    if (($CAMPO_INDIRIZZO_PRODUZIONE != null) && ($CAMPO_COMUNE_PRODUZIONE != null) && ($CAMPO_PROVINCIA_PRODUZIONE != null)) {
                        $body_mobile_info .= '[fusion_li_item icon="fa-store fas"]';
                        $body_mobile_info .= $CAMPO_INDIRIZZO_PRODUZIONE;
                        $body_mobile_info .= $CAMPO_COMUNE_PRODUZIONE . ' (' . $CAMPO_PROVINCIA_PRODUZIONE . ')';
                        $body_mobile_info .= '[/fusion_li_item]';
                    }

                    if ($CAMPO_ORARI_APERTURA != null) {
                        $body_mobile_info .= '[fusion_li_item icon="fa-clock far"]';
                        $body_mobile_info .= $CAMPO_ORARI_APERTURA;
                        $body_mobile_info .= '[/fusion_li_item]';
                    }

                    if ($CAMPO_ORARI_APERTURA_PUNTO_VENDITA != null) {
                        $body_mobile_info .= '[fusion_li_item icon="fa-clock far"]';
                        $body_mobile_info .= $CAMPO_ORARI_APERTURA_PUNTO_VENDITA;
                        $body_mobile_info .= '[/fusion_li_item]';
                    }

                    if ($CAMPO_ORARI_APERTURA_PRODUZIONE != null) {
                        $body_mobile_info .= '[fusion_li_item icon="fa-clock far"]';
                        $body_mobile_info .= $CAMPO_ORARI_APERTURA_PRODUZIONE;
                        $body_mobile_info .= '[/fusion_li_item]';
                    }

                    if ($CAMPO_PERIODO_APERTURA != null) {
                        $body_mobile_info .= '[fusion_li_item icon="fa-calendar-alt far"]';
                        $body_mobile_info .= $CAMPO_PERIODO_APERTURA;
                        $body_mobile_info .= '[/fusion_li_item]';
                    }

                    if ($CAMPO_GIORNO_DI_CHIUSURA != null) {
                        $body_mobile_info .= '[fusion_li_item icon="fa-calendar-alt far"]';
                        $body_mobile_info .= $CAMPO_GIORNO_DI_CHIUSURA;
                        $body_mobile_info .= '[/fusion_li_item]';
                    }

                    if ($CAMPO_GIORNO_DI_CHIUSURA_PRODUZIONE != null) {
                        $body_mobile_info .= '[fusion_li_item icon="fa-calendar-alt far"]';
                        $body_mobile_info .= $CAMPO_GIORNO_DI_CHIUSURA_PRODUZIONE;
                        $body_mobile_info .= '[/fusion_li_item]';
                    }

                    if ($CAMPO_GIORNO_DI_CHIUSURA_PUNTO_VENDITA != null) {
                        $body_mobile_info .= '[fusion_li_item icon="fa-calendar-alt far"]';
                        $body_mobile_info .= $CAMPO_GIORNO_DI_CHIUSURA_PUNTO_VENDITA;
                        $body_mobile_info .= '[/fusion_li_item]';
                    }

                    $body_mobile_info .= '[/fusion_checklist]';
                    $body_mobile_info .= '[fusion_separator style_type="single solid" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id="" sep_color="" top_margin="" bottom_margin="2%" border_size="" icon="" icon_circle="" icon_circle_color="" width="" alignment="center" /]';

                    $body_mobile_service = '[fusion_social_links icons_boxed="yes" icons_boxed_radius="" color_type="brand" icon_colors="" box_colors="" tooltip_placement="" blogger="';

                    if ($CAMPO_SITO_WEB != null) {
                        $body_mobile_service .= $CAMPO_SITO_WEB;
                    }

                    $body_mobile_service .= '" deviantart="" digg="" dribbble="" dropbox="" facebook="';

                    if ($CAMPO_FACEBOOK != null) {
                        $body_mobile_service .= $CAMPO_FACEBOOK;
                    }

                    $body_mobile_service .= '" flickr="';

                    if ($CAMPO_FLICKR != null) {
                        $body_mobile_service .= $CAMPO_FLICKR;
                    }

                    $body_mobile_service .= '" forrst="" instagram="';

                    if ($CAMPO_INSTAGRAM != null) {
                        $body_mobile_service .= $CAMPO_INSTAGRAM;
                    }

                    $body_mobile_service .= '" linkedin="';

                    if ($CAMPO_LINKEDIN != null) {
                        $body_mobile_service .= $CAMPO_LINKEDIN;
                    }

                    $body_mobile_service .= '" myspace="" paypal="" pinterest="';

                    if ($CAMPO_PINTEREST != null) {
                        $body_mobile_service .= $CAMPO_PINTEREST;
                    }

                    $body_mobile_service .= '" reddit="" rss="" skype="" soundcloud="" spotify="" tumblr="" twitter="';

                    if ($CAMPO_TWITTER != null) {
                        $body_mobile_service .= $CAMPO_TWITTER;
                    }

                    $body_mobile_service .= '" vimeo="" vk="" whatsapp="" xing="" yahoo="" yelp="" youtube="';

                    if ($CAMPO_YOUTUBE != null) {
                        $body_mobile_service .= $CAMPO_YOUTUBE;
                    }

                    $body_mobile_service .= '" email="';

                    if ($CAMPO_EMAIL != null) {
                        $body_mobile_service .= $CAMPO_EMAIL;
                    }

                    $body_mobile_service .= '" show_custom="no" alignment="center" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id="" /]';
                    $body_mobile_service .= '[fusion_separator style_type="single solid" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id="" sep_color="" top_margin="" bottom_margin="2%" border_size="" icon="" icon_circle="" icon_circle_color="" width="" alignment="center" /]';
                    $body_mobile_service .= '[fusion_text columns="" column_min_width="" column_spacing="" rule_style="default" rule_size="" rule_color="" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id="infotype"]';
                    $body_mobile_service .= 'Servizi';
                    $body_mobile_service .= '[/fusion_text]';
                    $body_mobile_service .= '[fusion_checklist icon="fa-check fas" iconcolor="" circle="" circlecolor="#03a9f4" size="" divider="yes" divider_color="" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id=""]';

                    if ($CAMPO_DISTANZA != null) {
                        $body_mobile_service .= '[fusion_li_item icon="fa-arrows-alt-h fas"]';
                        $body_mobile_service .= 'Distanza: ' . $CAMPO_DISTANZA;
                        $body_mobile_service .= '[/fusion_li_item]';
                    }

                    if ($CAMPO_COSTO_BIGLIETTO != null) {
                        $body_mobile_service .= '[fusion_li_item icon="fa-ticket-alt fas"]';
                        $body_mobile_service .= 'Biglietti: ' . $CAMPO_COSTO_BIGLIETTO;
                        $body_mobile_service .= '[/fusion_li_item]';
                    }

                    if ($CAMPO_PARCHEGGIO != null) {
                        $body_mobile_service .= '[fusion_li_item icon="fa-parking fas"]';
                        $body_mobile_service .= 'Parcheggio: ' . $CAMPO_PARCHEGGIO;
                        $body_mobile_service .= '[/fusion_li_item]';
                    }

                    if ($CAMPO_PARCHEGGIO_GRATUITO != null) {
                        $body_mobile_service .= '[fusion_li_item icon="fa-parking fas"]';
                        $body_mobile_service .= 'Parcheggio gratuito: ' . $CAMPO_PARCHEGGIO_GRATUITO;
                        $body_mobile_service .= '[/fusion_li_item]';
                    }

                    if ($CAMPO_PARCHEGGIO_IN_STRADA != null) {
                        $body_mobile_service .= '[fusion_li_item icon="fa-parking fas"]';
                        $body_mobile_service .= 'Parcheggio in strada: ' . $CAMPO_PARCHEGGIO_IN_STRADA;
                        $body_mobile_service .= '[/fusion_li_item]';
                    }

                    if ($CAMPO_PARCHEGGIO_CUSTODITO != null) {
                        $body_mobile_service .= '[fusion_li_item icon="fa-parking fas"]';
                        $body_mobile_service .= 'Parcheggio custodito: ' . $CAMPO_PARCHEGGIO_CUSTODITO;
                        $body_mobile_service .= '[/fusion_li_item]';
                    }

                    if ($CAMPO_SERVIZI_DI_NOLEGGIO != null) {
                        $body_mobile_service .= '[fusion_li_item icon="fa-hiking fas"]';
                        $body_mobile_service .= 'Servizi di noleggio: ' . $CAMPO_SERVIZI_DI_NOLEGGIO;
                        $body_mobile_service .= '[/fusion_li_item]';
                    }

                    if ($CAMPO_PROPOSTE_VACANZE_IN_MOLISE != null) {
                        $body_mobile_service .= '[fusion_li_item icon="fa-shuttle-van fas"]';
                        $body_mobile_service .= 'Proposte vacanze in Molise: ' . $CAMPO_PROPOSTE_VACANZE_IN_MOLISE;
                        $body_mobile_service .= '[/fusion_li_item]';
                    }

                    if ($CAMPO_VISITE_GUIDATE != null) {
                        $body_mobile_service .= '[fusion_li_item icon="fa-university fas"]';
                        $body_mobile_service .= 'Visite guidate: ' . $CAMPO_VISITE_GUIDATE;
                        $body_mobile_service .= '[/fusion_li_item]';
                    }

                    if ($ACCESSIBILE_AI_DISABILI != null) {
                        $body_mobile_service .= '[fusion_li_item icon="fa-wheelchair fas"]';
                        $body_mobile_service .= 'Accessibile ai disabili: ' . $ACCESSIBILE_AI_DISABILI;
                        $body_mobile_service .= '[/fusion_li_item]';
                    }

                    if ($CAMPO_MENU_VEGETARIANO != null) {
                        $body_mobile_service .= '[fusion_li_item icon="fa-fish fas"]';
                        $body_mobile_service .= 'Menù per vegetariani: ' . $CAMPO_MENU_VEGETARIANO;
                        $body_mobile_service .= '[/fusion_li_item]';
                    }

                    if ($CAMPO_MENU_CARNE != null) {
                        $body_mobile_service .= '[fusion_li_item icon="fa-fish fas"]';
                        $body_mobile_service .= 'Menù carne: ' . $CAMPO_MENU_CARNE;
                        $body_mobile_service .= '[/fusion_li_item]';
                    }

                    if ($CAMPO_MENU_PESCE != null) {
                        $body_mobile_service .= '[fusion_li_item icon="fa-fish fas"]';
                        $body_mobile_service .= 'Menù pesce: ' . $CAMPO_MENU_PESCE;
                        $body_mobile_service .= '[/fusion_li_item]';
                    }

                    if ($CAMPO_MENU_CELIACI != null) {
                        $body_mobile_service .= '[fusion_li_item icon="fa-fish fas"]';
                        $body_mobile_service .= 'Menù per celiaci: ' . $CAMPO_MENU_CELIACI;
                        $body_mobile_service .= '[/fusion_li_item]';
                    }

                    if ($CAMPO_MENU_VEGANO != null) {
                        $body_mobile_service .= '[fusion_li_item icon="fa-fish fas"]';
                        $body_mobile_service .= 'Menù vegano: ' . $CAMPO_MENU_VEGANO;
                        $body_mobile_service .= '[/fusion_li_item]';
                    }

                    if ($CAMPO_PAGAMENTO_CON_CARTA != null) {
                        $body_mobile_service .= '[fusion_li_item icon="fa-credit-card far"]';
                        $body_mobile_service .= 'Pagamento con carta: ' . $CAMPO_PAGAMENTO_CON_CARTA;
                        $body_mobile_service .= '[/fusion_li_item]';
                    }

                    if ($CAMPO_POSTO_BICI != null) {
                        $body_mobile_service .= '[fusion_li_item icon="fa-bicycle fas"]';
                        $body_mobile_service .= 'Posto bici: ' . $CAMPO_POSTO_BICI;
                        $body_mobile_service .= '[/fusion_li_item]';
                    }

                    if ($CAMPO_SERVIZI_SPIAGGIA != null) {
                        $body_mobile_service .= '[fusion_li_item icon="fa-umbrella-beach fas"]';
                        $body_mobile_service .= 'Servizi spiaggia: ' . $CAMPO_SERVIZI_SPIAGGIA;
                        $body_mobile_service .= '[/fusion_li_item]';
                    }

                    if ($CAMPO_PISCINA != null) {
                        $body_mobile_service .= '[fusion_li_item icon="fa-swimmer fas"]';
                        $body_mobile_service .= 'Piscina: ' . $CAMPO_PISCINA;
                        $body_mobile_service .= '[/fusion_li_item]';
                    }

                    if ($CAMPO_ANIMALI_AMMESSI != null) {
                        $body_mobile_service .= '[fusion_li_item icon="fa-paw fas"]';
                        $body_mobile_service .= 'Animali ammessi: ' . $CAMPO_ANIMALI_AMMESSI;
                        $body_mobile_service .= '[/fusion_li_item]';
                    }

                    if ($CAMPO_PALESTRA != null) {
                        $body_mobile_service .= '[fusion_li_item icon="fa-dumbbell fas"]';
                        $body_mobile_service .= 'Palestra: ' . $CAMPO_PALESTRA;
                        $body_mobile_service .= '[/fusion_li_item]';
                    }

                    if ($CAMPO_MANEGGIO != null) {
                        $body_mobile_service .= '[fusion_li_item icon="fa-horse fas"]';
                        $body_mobile_service .= 'Maneggio: ' . $CAMPO_MANEGGIO;
                        $body_mobile_service .= '[/fusion_li_item]';
                    }

                    if ($CAMPO_BEAUTY_FARM != null) {
                        $body_mobile_service .= '[fusion_li_item icon="fa-smile-beam fas"]';
                        $body_mobile_service .= 'Beauty farm: ' . $CAMPO_BEAUTY_FARM;
                        $body_mobile_service .= '[/fusion_li_item]';
                    }

                    if ($CAMPO_FREE_WIFI != null) {
                        $body_mobile_service .= '[fusion_li_item icon="fa-wifi fas"]';
                        $body_mobile_service .= 'Free WiFi: ' . $CAMPO_FREE_WIFI;
                        $body_mobile_service .= '[/fusion_li_item]';
                    }

                    if ($CAMPO_SERVIZIO_IN_CAMERA != null) {
                        $body_mobile_service .= '[fusion_li_item icon="fa-toilet-paper fas"]';
                        $body_mobile_service .= 'Servizio in camera: ' . $CAMPO_SERVIZIO_IN_CAMERA;
                        $body_mobile_service .= '[/fusion_li_item]';
                    }

                    if ($CAMPO_PACCHETTI_OFFERTI != null) {
                        $body_mobile_service .= '[fusion_li_item icon="fa-box-open fas"]';
                        $body_mobile_service .= 'Pacchetti offerti: ' . $CAMPO_PACCHETTI_OFFERTI;
                        $body_mobile_service .= '[/fusion_li_item]';
                    }

                    if ($CAMPO_STELLE != null) {
                        $body_mobile_service .= '[fusion_li_item icon="fa-box-open fas"]';
                        $body_mobile_service .= 'Stelle: ' . $CAMPO_STELLE;
                        $body_mobile_service .= '[/fusion_li_item]';
                    }

                    if ($CAMPO_CUCINA_INTERNAZIONALE != null) {
                        $body_mobile_service .= '[fusion_li_item icon="fa-box-open fas"]';
                        $body_mobile_service .= 'Cucina internazionale: ' . $CAMPO_CUCINA_INTERNAZIONALE;
                        $body_mobile_service .= '[/fusion_li_item]';
                    }

                    if ($CAMPO_PER_FAMIGLIE_CON_BAMBINI != null) {
                        $body_mobile_service .= '[fusion_li_item icon="fa-box-open fas"]';
                        $body_mobile_service .= 'Per famiglie con bambini: ' . $CAMPO_PER_FAMIGLIE_CON_BAMBINI;
                        $body_mobile_service .= '[/fusion_li_item]';
                    }

                    if ($CAMPO_DEGUSTAZIONI_IN_LOCO != null) {
                        $body_mobile_service .= '[fusion_li_item icon="fa-box-open fas"]';
                        $body_mobile_service .= 'Degustazioni in loco: ' . $CAMPO_DEGUSTAZIONI_IN_LOCO;
                        $body_mobile_service .= '[/fusion_li_item]';
                    }

                    if ($CAMPO_NOLEGGIO_PEDALO_ATTREZZATURE_MARINE != null) {
                        $body_mobile_service .= '[fusion_li_item icon="fa-box-open fas"]';
                        $body_mobile_service .= 'Noleggio pedalò/Attrezzature marine: ' . $CAMPO_NOLEGGIO_PEDALO_ATTREZZATURE_MARINE;
                        $body_mobile_service .= '[/fusion_li_item]';
                    }

                    if ($CAMPO_SENTIERI_ESCURSIONISTICI != null) {
                        $body_mobile_service .= '[fusion_li_item icon="fa-box-open fas"]';
                        $body_mobile_service .= 'Sentieri escursionistici: ' . $CAMPO_SENTIERI_ESCURSIONISTICI;
                        $body_mobile_service .= '[/fusion_li_item]';
                    }

                    if ($CAMPO_AREA_CAMPER != null) {
                        $body_mobile_service .= '[fusion_li_item icon="fa-box-open fas"]';
                        $body_mobile_service .= 'Area camper: ' . $CAMPO_AREA_CAMPER;
                        $body_mobile_service .= '[/fusion_li_item]';
                    }

                    if ($CAMPO_AREA_PICNIC != null) {
                        $body_mobile_service .= '[fusion_li_item icon="fa-box-open fas"]';
                        $body_mobile_service .= 'Area picnic: ' . $CAMPO_AREA_PICNIC;
                        $body_mobile_service .= '[/fusion_li_item]';
                    }

                    if ($CAMPO_DETTAGLI_VISITE != null) {
                        $body_mobile_service .= '[fusion_li_item icon="fa-box-open fas"]';
                        $body_mobile_service .= 'Dettagli visite: ' . $CAMPO_DETTAGLI_VISITE;
                        $body_mobile_service .= '[/fusion_li_item]';
                    }

                    if ($CAMPO_STATO_CONSERVAZIONE != null) {
                        $body_mobile_service .= '[fusion_li_item icon="fa-box-open fas"]';
                        $body_mobile_service .= 'Stato conservazione: ' . $CAMPO_STATO_CONSERVAZIONE;
                        $body_mobile_service .= '[/fusion_li_item]';
                    }

                    if ($CAMPO_VENDITA_AL_DETTAGLIO != null) {
                        $body_mobile_service .= '[fusion_li_item icon="fa-box-open fas"]';
                        $body_mobile_service .= 'Vendita al dettaglio: ' . $CAMPO_VENDITA_AL_DETTAGLIO;
                        $body_mobile_service .= '[/fusion_li_item]';
                    }

                    if ($CAMPO_LUOGO != null) {
                        $body_mobile_service .= '[fusion_li_item icon="fa-box-open fas"]';
                        $body_mobile_service .= 'Posto auto: ' . $CAMPO_POSTO_AUTO;
                        $body_mobile_service .= '[/fusion_li_item]';
                    }

                    if ($CAMPO_LUOGO != null) {
                        $body_mobile_service .= '[fusion_li_item icon="fa-box-open fas"]';
                        $body_mobile_service .= 'Organizzatore: ' . $CAMPO_ORGANIZZATORE;
                        $body_mobile_service .= '[/fusion_li_item]';
                    }

                    if ($CAMPO_LUOGO != null) {
                        $body_mobile_service .= '[fusion_li_item icon="fa-box-open fas"]';
                        $body_mobile_service .= 'Luogo: ' . $CAMPO_LUOGO;
                        $body_mobile_service .= '[/fusion_li_item]';
                    }

                    if ($CAMPO_PERIODO != null) {
                        $body_mobile_service .= '[fusion_li_item icon="fa-box-open fas"]';
                        $body_mobile_service .= 'Periodo: ' . $CAMPO_PERIODO;
                        $body_mobile_service .= '[/fusion_li_item]';
                    }

                    if ($CAMPO_INFORMAZIONI_CRONOLOGICHE != null) {
                        $body_mobile_service .= '[fusion_li_item icon="fa-box-open fas"]';
                        $body_mobile_service .= 'Informazioni cronologiche: ' . $CAMPO_INFORMAZIONI_CRONOLOGICHE;
                        $body_mobile_service .= '[/fusion_li_item]';
                    }

                    if ($CAMPO_BAR != null) {
                        $body_mobile_service .= '[fusion_li_item icon="fa-box-open fas"]';
                        $body_mobile_service .= 'Bar: ' . $CAMPO_BAR;
                        $body_mobile_service .= '[/fusion_li_item]';
                    }

                    if ($CAMPO_RISTORANTE != null) {
                        $body_mobile_service .= '[fusion_li_item icon="fa-box-open fas"]';
                        $body_mobile_service .= 'Ristorante: ' . $CAMPO_RISTORANTE;
                        $body_mobile_service .= '[/fusion_li_item]';
                    }

                    if ($CAMPO_LABORATORI_DIDATTICI != null) {
                        $body_mobile_service .= '[fusion_li_item icon="fa-box-open fas"]';
                        $body_mobile_service .= 'Laboratori didattici: ' . $CAMPO_LABORATORI_DIDATTICI;
                        $body_mobile_service .= '[/fusion_li_item]';
                    }

                    if ($CAMPO_ALTRO != null) {
                        $body_mobile_service .= '[fusion_li_item icon="fa-angle-double-right fas"]';
                        $body_mobile_service .= 'Altro: ' . $CAMPO_ALTRO;
                        $body_mobile_service .= '[/fusion_li_item]';
                    }

                    if ($CAMPO_LINK_ALLE_PROPOSTE != null) {
                        $body_mobile_service .= '[fusion_li_item icon="fa-shuttle-van fas"]';
                        $body_mobile_service .= 'Link alle proposte: ' . $CAMPO_LINK_ALLE_PROPOSTE;
                        $body_mobile_service .= '[/fusion_li_item]';
                    }

                    $body_mobile_service .= '[/fusion_checklist]';
                    $body_mobile_service .= '[fusion_separator style_type="single solid" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id="" sep_color="" top_margin="" bottom_margin="2%" border_size="" icon="" icon_circle="" icon_circle_color="" width="" alignment="center" /]';

                    $body_mobile_useful_links = '[fusion_text columns="" column_min_width="" column_spacing="" rule_style="default" rule_size="" rule_color="" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id="infotype"]';
                    $body_mobile_useful_links .= 'Link utili';
                    $body_mobile_useful_links .= '[/fusion_text]';
                    $body_mobile_useful_links .= '[fusion_checklist icon="fa-hotel fas" iconcolor="" circle="" circlecolor="#03a9f4" size="" divider="" divider_color="" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id=""]';

                    if ($CAMPO_GOOGLE_MAPS != null) {
                        $body_mobile_useful_links .= '[fusion_li_item icon="fa-location-arrow fas"]';
                        $body_mobile_useful_links .= 'GOOGLE MAPS';
                        $body_mobile_useful_links .= '[/fusion_li_item]';
                    }

                    if ($CAMPO_GOOGLE_MAPS_VENDITA != null) {
                        $body_mobile_useful_links .= '[fusion_li_item icon="fa-location-arrow fas"]';
                        $body_mobile_useful_links .= 'GOOGLE MAPS (PUNTO VENDITA)';
                        $body_mobile_useful_links .= '[/fusion_li_item]';
                    }

                    if ($CAMPO_GOOGLE_MAPS_PRODUZIONE != null)
                        $body_mobile_useful_links .= '[fusion_li_item icon="fa-location-arrow fas"]';
                    $body_mobile_useful_links .= 'GOOGLE MAPS (PUNTO PRODUZIONE)';
                    $body_mobile_useful_links .= '[/fusion_li_item]';

                    if ($CAMPO_TRIPADVISOR != null) {
                        $body_mobile_useful_links .= '[fusion_li_item icon="fa-tripadvisor fab"]';
                        $body_mobile_useful_links .= 'TRIPADVISOR';
                        $body_mobile_useful_links .= '[/fusion_li_item]';
                    }

                    if ($CAMPO_BOOKING != null) {
                        $body_mobile_useful_links .= '[fusion_li_item icon="fa-book fas"]';
                        $body_mobile_useful_links .= 'BOOKING';
                        $body_mobile_useful_links .= '[/fusion_li_item]';
                    }

                    if ($CAMPO_HOTELS_COM != null) {
                        $body_mobile_useful_links .= '[fusion_li_item icon="fa-hotel fas"]';
                        $body_mobile_useful_links .= 'HOTELS.COM';
                        $body_mobile_useful_links .= '[/fusion_li_item]';
                    }

                    if ($CAMPO_AIRBNB != null) {
                        $body_mobile_useful_links .= '[fusion_li_item icon="fa-airbnb fab"]';
                        $body_mobile_useful_links .= 'AIRBNB';
                        $body_mobile_useful_links .= '[/fusion_li_item]';
                    }

                    if ($CAMPO_FACEBOOK != null) {
                        $body_mobile_useful_links .= '[fusion_li_item icon="fa-map-signs fas"]';
                        $body_mobile_useful_links .= 'FACEBOOK';
                        $body_mobile_useful_links .= '[/fusion_li_item]';
                    }

                    if ($CAMPO_FLICKR != null) {
                        $body_mobile_useful_links .= '[fusion_li_item icon="fa-map-signs fas"]';
                        $body_mobile_useful_links .= 'FLICKR';
                        $body_mobile_useful_links .= '[/fusion_li_item]';
                    }

                    if ($CAMPO_GOOGLE != null) {
                        $body_mobile_useful_links .= '[fusion_li_item icon="fa-map-signs fas"]';
                        $body_mobile_useful_links .= 'GOOGLE';
                        $body_mobile_useful_links .= '[/fusion_li_item]';
                    }

                    if ($CAMPO_GOOGLE_PLUS != null) {
                        $body_mobile_useful_links .= '[fusion_li_item icon="fa-map-signs fas"]';
                        $body_mobile_useful_links .= 'GOOGLE PLUS';
                        $body_mobile_useful_links .= '[/fusion_li_item]';
                    }

                    if ($CAMPO_INSTAGRAM != null) {
                        $body_mobile_useful_links .= '[fusion_li_item icon="fa-map-signs fas"]';
                        $body_mobile_useful_links .= 'INSTAGRAM';
                        $body_mobile_useful_links .= '[/fusion_li_item]';
                    }

                    if ($CAMPO_LINKEDIN != null) {
                        $body_mobile_useful_links .= '[fusion_li_item icon=""]';
                        $body_mobile_useful_links .= 'LINKEDIN';
                        $body_mobile_useful_links .= '[/fusion_li_item]';
                    }

                    if ($CAMPO_PINTEREST != null) {
                        $body_mobile_useful_links .= '[fusion_li_item icon=""]';
                        $body_mobile_useful_links .= 'PINTEREST';
                        $body_mobile_useful_links .= '[/fusion_li_item]';
                    }

                    if ($CAMPO_TWITTER != null) {
                        $body_mobile_useful_links .= '[fusion_li_item icon=""]';
                        $body_mobile_useful_links .= 'TWITTER';
                        $body_mobile_useful_links .= '[/fusion_li_item]';
                    }

                    if ($CAMPO_YOUTUBE != null) {
                        $body_mobile_useful_links .= '[fusion_li_item icon=""]';
                        $body_mobile_useful_links .= 'YOUTUBE';
                        $body_mobile_useful_links .= '[/fusion_li_item]';
                    }

                    if ($CAMPO_TRIPADVISOR != null) {
                        $body_mobile_useful_links .= '[fusion_li_item icon=""]';
                        $body_mobile_useful_links .= 'TRIPADVISOR';
                        $body_mobile_useful_links .= '[/fusion_li_item]';
                    }

                    if ($CAMPO_VALUTAZIONI_GOOGLE != null) {
                        $body_mobile_useful_links .= '[fusion_li_item icon="fa-google fab"]';
                        $body_mobile_useful_links .= 'VALUTAZIONI GOOGLE';
                        $body_mobile_useful_links .= '[/fusion_li_item]';
                    }

                    $body_mobile_useful_links .= '[/fusion_checklist]';
                    $body_mobile_useful_links .= '[fusion_separator style_type="single solid" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id="" sep_color="" top_margin="" bottom_margin="2%" border_size="" icon="" icon_circle="" icon_circle_color="" width="" alignment="center" /]';

                    $body_mobile_mobile_information = '[fusion_text columns="" column_min_width="" column_spacing="" rule_style="default" rule_size="" rule_color="" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id="infotype"]';
                    $body_mobile_mobile_information .= 'Infomobilità';
                    $body_mobile_mobile_information .= '[/fusion_text]';
                    $body_mobile_mobile_information .= '[fusion_checklist icon="fa-hotel fas" iconcolor="" circle="" circlecolor="#03a9f4" size="" divider="" divider_color="" hide_on_mobile="small-visibility,medium-visibility,large-visibility" class="" id=""]';

                    if ($CAMPO_INFOMOBILITA != null) {
                        $body_mobile_mobile_information .= '[fusion_li_item icon="fa-shuttle-van fas"]';
                        $body_mobile_mobile_information .= $CAMPO_INFOMOBILITA;
                        $body_mobile_mobile_information .= '[/fusion_li_item]';
                    }

                    $body_mobile_mobile_information .= '[fusion_li_item icon="fa-train fas"]';
                    $body_mobile_mobile_information .= 'Rete Ferroviaria Italiana';
                    $body_mobile_mobile_information .= '[/fusion_li_item]';
                    $body_mobile_mobile_information .= '[fusion_li_item icon="fa-tachometer-alt fas"]';
                    $body_mobile_mobile_information .= 'Viabilità';
                    $body_mobile_mobile_information .= '[/fusion_li_item]';

                    $body_mobile_mobile_information .= '[/fusion_checklist][/fusion_builder_column][/fusion_builder_row][/fusion_builder_container]';

                    $all = $header_desktop . $header_mobile . $header_typology_category . $body_desktop . $body_desktop_info . $body_desktop_useful_links . $body_desktop_mobile_information . $body_desktop_central . $body_desktop_service . $body_mobile . $body_mobile_central . $body_mobile_info . $body_mobile_service . $body_mobile_useful_links . $body_mobile_mobile_information;

//                    echo do_shortcode($header_desktop);
//                    echo do_shortcode($header_mobile);
//                    echo do_shortcode($header_typology_category);
//
//                    echo do_shortcode($body_desktop);
//                    echo do_shortcode($body_desktop_info);
//                    echo do_shortcode($body_desktop_useful_links);
//                    echo do_shortcode($body_desktop_mobile_information);
//                    echo do_shortcode($body_desktop_central);
//                    echo do_shortcode($body_desktop_service);
//
//                    echo do_shortcode($body_mobile);
//                    echo do_shortcode($body_mobile_central);
//                    echo do_shortcode($body_mobile_info);
//                    echo do_shortcode($body_mobile_service);
//                    echo do_shortcode($body_mobile_useful_links);
//                    echo do_shortcode($body_mobile_mobile_information);

                    echo do_shortcode($all);


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
