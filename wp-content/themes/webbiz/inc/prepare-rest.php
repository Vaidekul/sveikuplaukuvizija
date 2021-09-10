<?php 

// modify post rest response
function prepare_rest($data, $post, $request) {
  $_data = $data->data;

  // get data
  $title_trimmed = wb_title_limit(5);
  // $thumbnail = get_field('featured_image', $post->ID);
  // $thumbnail = $thumbnail['url'];  
  $thumbnail = get_the_post_thumbnail_url( $post );
  $date_formated = get_the_time('d M Y');
  $terms = [];

  $_terms = get_the_terms($post, 'category');
  if($_terms) :
    foreach($_terms as $term) : 
      $link = get_term_link($term->term_id);
      $name = $term->name;
      $term_item = [
        'term_name'  => $name,
        'term_link'  => $link
      ];
      array_push($terms, $term_item);
    endforeach;
  endif;

  // add data
  $_data['title_trimmed'] = $title_trimmed;
  $_data['thumbnail'] = $thumbnail;
  $_data['date_formated'] = $date_formated;
  $_data['term_items'] = $terms;

  $data->data = $_data;

  return $data;
}

add_filter( 'rest_prepare_post', 'prepare_rest', 10, 3 );