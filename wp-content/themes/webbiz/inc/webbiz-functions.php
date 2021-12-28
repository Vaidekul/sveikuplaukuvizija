<?php

// ACF Custom Options Page
if ( function_exists( 'acf_add_options_page' ) ) {

	acf_add_options_page( array(
			'page_title'  => 'Theme General Settings',
			'menu_title' => 'Theme Settings',
			'menu_slug'  => 'theme-general-settings',
			'capability' => 'edit_posts',
			'redirect'  => false
		) );
}

// Gmaps
add_filter('acf/settings/google_api_key', function () {
    return 'AIzaSyDparAxZ__7dpnl13CiXya5GmGUDefjgO0';
});

// Counts Columns for Flexible row and column layouts
function acf_column_count($field_name) {
	$columns = get_sub_field($field_name);
	$count = count($columns);
	return $count;
}

// Custom Exerpts
function wb_excerpt_limit($limit) {
      $excerpt = explode(' ', get_the_excerpt(), $limit);
      if (count($excerpt)>=$limit) {
        array_pop($excerpt);
        $excerpt = implode(" ",$excerpt).'...';
      } else {
        $excerpt = implode(" ",$excerpt);
      } 
      $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
      return $excerpt;
}

// Custom Content
function wb_content_limit($limit) {
      $excerpt = explode(' ', get_the_content(), $limit);
      if (count($excerpt)>=$limit) {
        array_pop($excerpt);
        $excerpt = implode(" ",$excerpt).'...';
      } else {
        $excerpt = implode(" ",$excerpt);
      } 
      $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
      return $excerpt;
}

// Custom Text
function wb_excerpt_limit_text($text, $limit) {
  $excerpt = explode(' ', $text, $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  } 
  $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
  return $excerpt;
}

// Custom Title
function wb_title_limit($limit) {
      $excerpt = explode(' ', get_the_title(), $limit);
      if (count($excerpt)>=$limit) {
        array_pop($excerpt);
        $excerpt = implode(" ",$excerpt).'...';
      } else {
        $excerpt = implode(" ",$excerpt);
      } 
      $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
      return $excerpt;
}

// Social Function
function webbiz_social_function() {
  // get values
  $fb = get_field('facebook', 'option');
  $gplus = get_field('google_plus', 'option');
  $tw = get_field('twitter', 'option');
  $in = get_field('linkedin', 'option');
  $pin = get_field('pinterest', 'option');
  $insta = get_field('instagram', 'option');
  $yt = get_field('youtube', 'option');
    
    
  // check if any values are present
  if( $fb || $pin || $tw || $in || $insta || $gplus || $yt ) {
      echo "<div class='webbiz-social-function'>";

    if( $fb ) {
      echo "<a target='_blank' class='fab fa-facebook-square' href='" . $fb . "'>" . "</a>";
    }

    if( $gplus ) {
      echo "<a target='_blank' class='fab fa-google-plus-square' href='" . $gplus . "'>" . "</a>";
    }

    if( $in ) {
      echo "<a target='_blank' class='fab fa-linkedin' href='" . $in . "'>" . "</a>";
    }

    if( $tw ) {
      echo "<a target='_blank' class='fab fa-twitter-square' href='" . $tw . "'>" . "</a>";
    }

    if( $pin ) {
      echo "<a target='_blank' class='fab fa-pinterest-square' href='" . $pin . "'>" . "</a>";
    }

    if( $insta ) {
      echo "<a target='_blank' class='fab fa-instagram' href='" . $insta . "'>" . "</a>";
    }

    if( $yt ) {
      echo "<a target='_blank' class='fab fa-youtube' href='" . $yt . "'>" . "</a>";
    }
          
    echo "</div>";
  }
}

// allow .svg upload
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}

// Padding
function wb_get_padding($padding, $margin = false) {
  switch ($padding) {
    case 'padding-min':
      return $margin ? 'pt-1 pb-1 mt-1 mb-1' : 'pt-1 pb-1';
      break;
    case 'padding-med':
      return $margin ? 'pt-3 pb-3 mt-3 mb-3' : 'pt-3 pb-3';
      break;
    case 'padding-max':
      return $margin ? 'pt-5 pb-5 mt-5 mb-5' : 'pt-5 pb-5';
      break;
    default:
      return '';
      break;
  }
}

// Gravity Forms anchor - disable auto scrolling of forms
//add_filter("gform_confirmation_anchor", create_function("","return false;"));

require get_template_directory() . '/inc/prepare-rest.php';
require get_template_directory() . '/inc/cpt/cta.php';
require get_template_directory() . '/inc/cpt/cpt-komanda.php';
require get_template_directory() . '/inc/cpt/cpt-prices.php';
require get_template_directory() . '/inc/cpt/cpt-prekiuzenklai.php';
require get_template_directory() . '/template-parts/components/shortcode-btn-cta.php';
