<?php

if ( function_exists( 'add_theme_support' ) ) {
  // add_image_size( 'resource-thumbnail', 218, 160 );
  add_image_size( 'resource-thumbnail', 200, 150 );
}

function get_all_categories(){
  $all_classes = array();
  foreach((get_the_category()) as $category) {
    $cats = explode('###', get_category_parents( $category, false, '###', true));
    foreach ($cats as $cat) {
      if($cat)
        $all_classes[$cat] = true;
    }
  }
  
  return implode(' ', array_keys($all_classes));
}

/* Create custom post type */
add_action('init', 'resourcesregister');
function resourcesregister() {
  $labels = array(
    'name' => _x('Downloads', 'resources'),
    'singular_name' => _x('Download', 'resources'),
    'add_new' => _x('Adicionar novo download', 'resources'),
    'add_new_item' => __('Adicionar novo download'),
    'edit_item' => __('Editar download'),
    'new_item' => __('Adicionar novo download'),
    'view_item' => __('Ver novo download'),
    'search_items' => __('Procurar material para download'),
    'not_found' =>  __('Nenhum material para download encontrado'),
    'not_found_in_trash' => __('Nenhum material para download na lixeira'),
    'parent_item_colon' => ''
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'hierarchical' => false,
    'menu_position' => null,
    'show_in_nav_menus' => true,
    'supports' => array('title','excerpt','thumbnail','revisions'),
    'taxonomies' => array('category', 'post_tag')
  ); 
  register_post_type( 'resources' , $args );
}

add_action( 'load-post.php', '_post_meta_boxes_for_link_setup' );
add_action( 'load-post-new.php', '_post_meta_boxes_for_link_setup' );

function _post_meta_boxes_for_link_setup() {
  add_action( 'add_meta_boxes', '_add_post_resourcelink_meta_boxes' );
  add_action( 'save_post', '_save_post_resourcelink_meta', 10, 2 );
}

function _add_post_resourcelink_meta_boxes() {
  add_meta_box(
    'post-material-link',               // Unique ID
    esc_html__( 'Link', 'example' ),    // Title
    '_post_resourcelink_meta_box',      // Callback function
    'resources',                        // Admin page (or post type)
    'advanced',                         // Context
    'default'                           // Priority
  );
}

function _post_resourcelink_meta_box( $object, $box ) {
?>
  <p>
    <input class="widefat" type="text" name="_resource_link" value="<?php echo esc_attr( get_post_meta($object->ID,'_resource_link', true) ); ?>"/>
  </p>
<?php }

function _save_post_resourcelink_meta( $post_id, $post ) {
  $new_meta_value = ( isset( $_POST['_resource_link'] ) ? $_POST['_resource_link'] : '' );
  $meta_key = '_resource_link';
  $meta_value = get_post_meta( $post_id, $meta_key, true );
  if ( $new_meta_value && '' == $meta_value )
    add_post_meta( $post_id, $meta_key, $new_meta_value, true );
  elseif ( $new_meta_value && $new_meta_value != $meta_value )
    update_post_meta( $post_id, $meta_key, $new_meta_value );
  elseif ( '' == $new_meta_value && $meta_value )
    delete_post_meta( $post_id, $meta_key, $meta_value );
}

