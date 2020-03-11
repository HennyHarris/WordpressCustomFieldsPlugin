<?php

function theme_enqueue_styles() {
    wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array( 'avada-stylesheet' ) );
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );

function avada_lang_setup() {
	$lang = get_stylesheet_directory() . '/languages';
	load_child_theme_textdomain( 'Avada', $lang );
}
add_action( 'after_setup_theme', 'avada_lang_setup' );

/*** Custom Modify **/
function mysite_custom_define() {
  $custom_meta_fields = array();
  $custom_meta_fields['editable_posts'] = 'Post modificabili';
  return $custom_meta_fields;
}

function mysite_columns($defaults) {
  $meta_number = 0;
  $custom_meta_fields = mysite_custom_define();
  foreach ($custom_meta_fields as $meta_field_name => $meta_disp_name) {
    $meta_number++;
    $defaults[('mysite-usercolumn-' . $meta_number . '')] = __($meta_disp_name, 'user-column');
  }
  return $defaults;
}

function mysite_custom_columns($value, $column_name, $id) {
  $meta_number = 0;
  $custom_meta_fields = mysite_custom_define();
  foreach ($custom_meta_fields as $meta_field_name => $meta_disp_name) {
    $meta_number++;
    if( $column_name == ('mysite-usercolumn-' . $meta_number . '') ) {
      return get_the_author_meta($meta_field_name, $id );
    }
  }
}

function mysite_show_extra_profile_fields($user) {
  print('<h3>Extra profile information</h3>');

  print('<table class="form-table">');

  $meta_number = 0;
  $custom_meta_fields = mysite_custom_define();
  foreach ($custom_meta_fields as $meta_field_name => $meta_disp_name) {
    $meta_number++;
    print('<tr>');
    print('<th><label for="' . $meta_field_name . '">' . $meta_disp_name . '</label></th>');
    print('<td>');
    print('<input type="text" name="' . $meta_field_name . '" id="' . $meta_field_name . '" value="' . esc_attr( get_the_author_meta($meta_field_name, $user->ID ) ) . '" class="regular-text" /><br />');
    print('<span class="description"></span>');
    print('</td>');
    print('</tr>');
  }
  print('</table>');
}

function mysite_save_extra_profile_fields($user_id) {

  if (!current_user_can('edit_user', $user_id))
    return false;

  $meta_number = 0;
  $custom_meta_fields = mysite_custom_define();
  foreach ($custom_meta_fields as $meta_field_name => $meta_disp_name) {
    $meta_number++;
    update_user_meta( $user_id, $meta_field_name, $_POST[$meta_field_name] );
  }
}

add_action('show_user_profile', 'mysite_show_extra_profile_fields');
add_action('edit_user_profile', 'mysite_show_extra_profile_fields');
add_action('personal_options_update', 'mysite_save_extra_profile_fields');
add_action('edit_user_profile_update', 'mysite_save_extra_profile_fields');
add_action('manage_users_custom_column', 'mysite_custom_columns', 15, 3);
add_filter('manage_users_columns', 'mysite_columns', 15, 1);

function update_custom_field_post($post_id) {
    $post_type = get_post_type( $post_id );

    if ($post_type == 'post' || $post_type == 'risorsa') {

        $new_post = array(
            'ID' => $post_id,
            'post_title'   => get_field("NOME_COMMERCIALE"),
            'post_excerpt' => get_field("DESCRIZIONE"),
        );
        wp_update_post( $new_post );

        add_post_meta($post_id, '_thumbnail_id', get_field('IMG_COVER'));
    }
}
add_action('acf/save_post', 'update_custom_field_post', 20);
