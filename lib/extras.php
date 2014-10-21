<?php
/**
 * Clean up the_excerpt()
 */
function roots_excerpt_more($more) {
  return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'roots') . '</a>';
}
add_filter('excerpt_more', 'roots_excerpt_more');

/**
 * Manage output of wp_title()
 */
function roots_wp_title($title) {
  if (is_feed()) {
    return $title;
  }

  $title .= get_bloginfo('name');

  return $title;
}
add_filter('wp_title', 'roots_wp_title', 10);

/**
 * Add copyright function
 */
function comicpress_copyright() {
  global $wpdb;
  $copyright_dates = $wpdb->get_results("
    SELECT
    YEAR(min(post_date_gmt)) AS firstdate,
    YEAR(max(post_date_gmt)) AS lastdate
    FROM
      $wpdb->posts
    WHERE
      post_status = 'publish'
  ");
  $output = '';
  if($copyright_dates) {
    $copyright = "&copy; " . $copyright_dates[0]->firstdate;
  if($copyright_dates[0]->firstdate != $copyright_dates[0]->lastdate) {
    $copyright .= '-' . $copyright_dates[0]->lastdate;
  }
    $output = $copyright;
  }
  return $output;
}

/**
 * Testimonials
 */
function testimonials_register() {

     $testimonials_labels = array(
        'name' => __( 'testimonials', 'taxonomy general name', 'roots'),
        'singular_name' => __( 'Testimonial', 'roots'),
        'search_items' =>  __( 'Testimonials', 'roots'),
        'all_items' => __( 'Tutti i testimonials', 'roots'),
        'parent_item' => __( 'Parent Testimonial', 'roots'),
        'edit_item' => __( 'Edit Testimonial', 'roots'),
        'update_item' => __( 'Update Testimonial', 'roots'),
        'add_new_item' => __( 'Add New Testimonial', 'roots')
     );

     $args = array(
            'labels' => $testimonials_labels,
            'singular_label' => __('Testimonial', 'roots'),
            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'hierarchical' => false,
            'menu_position' => 6,
            'menu_icon' => 'dashicons-format-quote',
            'supports' => array('title')
       );

    register_post_type( 'testimonials' , $args );
}
add_action('init', 'testimonials_register');
