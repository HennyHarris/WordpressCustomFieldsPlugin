<?php

// Enqueue child theme styles
function theme_enqueue_styles() {
    wp_enqueue_style('child-style', get_stylesheet_directory_uri() . '/style.css', array('avada-stylesheet'));
}
add_action('wp_enqueue_scripts', 'theme_enqueue_styles');

// Load child theme text domain
function avada_lang_setup() {
    $lang = get_stylesheet_directory() . '/languages';
    load_child_theme_textdomain('Avada', $lang);
}
add_action('after_setup_theme', 'avada_lang_setup');

/*** Custom Modify ***/
function mysite_custom_define() {
    return array(
        'editable_posts' => 'Post modificabili',
    );
}

// Add custom columns to the users table
function mysite_columns($defaults) {
    $custom_meta_fields = mysite_custom_define();
    foreach ($custom_meta_fields as $meta_field_name => $meta_disp_name) {
        $defaults['mysite-usercolumn-' . $meta_field_name] = esc_html__($meta_disp_name, 'user-column');
    }
    return $defaults;
}

// Display custom column values in the users table
function mysite_custom_columns($value, $column_name, $user_id) {
    $custom_meta_fields = mysite_custom_define();
    foreach ($custom_meta_fields as $meta_field_name => $meta_disp_name) {
        if ($column_name === 'mysite-usercolumn-' . $meta_field_name) {
            return esc_html(get_the_author_meta($meta_field_name, $user_id));
        }
    }
    return $value;
}

// Display extra profile fields in the user profile
function mysite_show_extra_profile_fields($user) {
    ?>
    <h3><?php esc_html_e('Extra profile information', 'text-domain'); ?></h3>
    <table class="form-table">
        <?php
        $custom_meta_fields = mysite_custom_define();
        foreach ($custom_meta_fields as $meta_field_name => $meta_disp_name) {
            ?>
            <tr>
                <th><label for="<?php echo esc_attr($meta_field_name); ?>"><?php echo esc_html($meta_disp_name); ?></label></th>
                <td>
                    <input type="text" name="<?php echo esc_attr($meta_field_name); ?>" id="<?php echo esc_attr($meta_field_name); ?>" value="<?php echo esc_attr(get_the_author_meta($meta_field_name, $user->ID)); ?>" class="regular-text" /><br />
                    <span class="description"></span>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>
    <?php
}

// Save extra profile fields
function mysite_save_extra_profile_fields($user_id) {
    if (!current_user_can('edit_user', $user_id)) {
        return false;
    }

    $custom_meta_fields = mysite_custom_define();
    foreach ($custom_meta_fields as $meta_field_name => $meta_disp_name) {
        if (isset($_POST[$meta_field_name])) {
            update_user_meta($user_id, $meta_field_name, sanitize_text_field($_POST[$meta_field_name]));
        }
    }
}

// Hook into user profile actions
add_action('show_user_profile', 'mysite_show_extra_profile_fields');
add_action('edit_user_profile', 'mysite_show_extra_profile_fields');
add_action('personal_options_update', 'mysite_save_extra_profile_fields');
add_action('edit_user_profile_update', 'mysite_save_extra_profile_fields');
add_filter('manage_users_columns', 'mysite_columns', 15, 1);
add_action('manage_users_custom_column', 'mysite_custom_columns', 15, 3);

// Update custom fields for posts
function update_custom_field_post($post_id) {
    $post_type = get_post_type($post_id);

    if ($post_type === 'post' || $post_type === 'risorsa') {
        $nome_commerciale = get_field('NOME_COMMERCIALE', $post_id);
        $descrizione = get_field('DESCRIZIONE', $post_id);
        $img_cover = get_field('IMG_COVER', $post_id);

        if ($nome_commerciale || $descrizione) {
            $new_post = array(
                'ID' => $post_id,
                'post_title'   => sanitize_text_field($nome_commerciale),
                'post_excerpt' => sanitize_text_field($descrizione),
            );
            wp_update_post($new_post);
        }

        if ($img_cover) {
            update_post_meta($post_id, '_thumbnail_id', absint($img_cover));
        }
    }
}
add_action('acf/save_post', 'update_custom_field_post', 20);

add_action('acf/export_post', 'export_custom_field_post', 20);
add_action('acf/import_post', 'import_custom_field_post', 20);