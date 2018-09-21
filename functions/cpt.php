<?php 

//Add Custom Post Types and Custom Taxonomies

// function wp1482371_custom_post_type_args( $args, $post_type ) {
//     if ( $post_type == "post" ) {
//         $args['rewrite'] = array(
//             'public'             => true,
// 			'publicly_queryable' => true,
// 			'query_var'          => true
//         );
//     }

//     return $args;
// }
// add_filter( 'register_post_type_args', 'wp1482371_custom_post_type_args', 10, 2 );

// Register Film CPT
function film_post_type() {

	$labels = array(
		'name'                  => _x( 'Films', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Film', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Films', 'text_domain' ),
		'name_admin_bar'        => __( 'Films', 'text_domain' ),
		'archives'              => __( 'Item Archives', 'text_domain' ),
		'attributes'            => __( 'Item Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
		'all_items'             => __( 'All Items', 'text_domain' ),
		'add_new_item'          => __( 'Add New Film', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_item'              => __( 'New Film', 'text_domain' ),
		'edit_item'             => __( 'Edit Film', 'text_domain' ),
		'update_item'           => __( 'Update Film', 'text_domain' ),
		'view_item'             => __( 'View Film', 'text_domain' ),
		'view_items'            => __( 'View Films', 'text_domain' ),
		'search_items'          => __( 'Search Films', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
		'items_list'            => __( 'Items list', 'text_domain' ),
		'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Film', 'text_domain' ),
		'description'           => __( 'Post Type Description', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'thumbnail' ),
		'taxonomies'            => array('post_tag', 'film_type', 'film_topic' ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_icon'             => 'dashicons-video-alt2',
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'films', $args );

}
add_action( 'init', 'film_post_type', 0 );

// Add Film Type taxonomy to films
function film_type_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Film Types', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Film Type', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Film Type', 'text_domain' ),
		'all_items'                  => __( 'All Film Types', 'text_domain' ),
		'parent_item'                => __( 'Parent Item', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
		'new_item_name'              => __( 'New Film Type', 'text_domain' ),
		'add_new_item'               => __( 'Add New Film Type', 'text_domain' ),
		'edit_item'                  => __( 'Edit Film Type', 'text_domain' ),
		'update_item'                => __( 'Update Film Type', 'text_domain' ),
		'view_item'                  => __( 'View Film Type', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Items', 'text_domain' ),
		'search_items'               => __( 'Search Film Types', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No items', 'text_domain' ),
		'items_list'                 => __( 'Items list', 'text_domain' ),
		'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'show_in_rest'               => true,
	);
	register_taxonomy( 'film_type', array( 'films' ), $args );

}
add_action( 'init', 'film_type_taxonomy', 0 );

// Register Film Topic Taxonomy
function film_topic_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Film Topics', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Film Topic', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Film Topic', 'text_domain' ),
		'all_items'                  => __( 'All Film Topic', 'text_domain' ),
		'parent_item'                => __( 'Parent Item', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
		'new_item_name'              => __( 'New Film Topic', 'text_domain' ),
		'add_new_item'               => __( 'Add New Film Topic', 'text_domain' ),
		'edit_item'                  => __( 'Edit Film Topic', 'text_domain' ),
		'update_item'                => __( 'Update Film Topic', 'text_domain' ),
		'view_item'                  => __( 'View Film Topic', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Items', 'text_domain' ),
		'search_items'               => __( 'Search Film Topic', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No items', 'text_domain' ),
		'items_list'                 => __( 'Items list', 'text_domain' ),
		'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'show_in_rest'               => true,
	);
	register_taxonomy( 'film_topic', array( 'films' ), $args );

}
add_action( 'init', 'film_topic_taxonomy', 0 );

// Register Event CPT
function event_post_type() {

	$labels = array(
		'name'                  => _x( 'Events', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Event', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Event', 'text_domain' ),
		'name_admin_bar'        => __( 'Event', 'text_domain' ),
		'archives'              => __( 'Event Archives', 'text_domain' ),
		'attributes'            => __( 'Item Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
		'all_items'             => __( 'All Events', 'text_domain' ),
		'add_new_item'          => __( 'Add New Event', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_item'              => __( 'New Event', 'text_domain' ),
		'edit_item'             => __( 'Edit Event', 'text_domain' ),
		'update_item'           => __( 'Update Event', 'text_domain' ),
		'view_item'             => __( 'View Event', 'text_domain' ),
		'view_items'            => __( 'View Events', 'text_domain' ),
		'search_items'          => __( 'Search Events', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
		'items_list'            => __( 'Items list', 'text_domain' ),
		'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Event', 'text_domain' ),
		'description'           => __( 'Post Type Description', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor' ),
		'taxonomies'            => array( 'post_tag', 'event_type', 'event_organizer' ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-calendar-alt',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'show_in_rest'          => true,
	);
	register_post_type( 'events', $args );

}
add_action( 'init', 'event_post_type', 0 );

// Register Custom Taxonomy
function event_topic_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Event Topics', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Event Topic', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Event Topic', 'text_domain' ),
		'all_items'                  => __( 'All Event Topics', 'text_domain' ),
		'parent_item'                => __( 'Parent Item', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
		'new_item_name'              => __( 'New Event Topic', 'text_domain' ),
		'add_new_item'               => __( 'Add New Event Topic', 'text_domain' ),
		'edit_item'                  => __( 'Edit Event Topic', 'text_domain' ),
		'update_item'                => __( 'Update Event Topic', 'text_domain' ),
		'view_item'                  => __( 'View Event Topic', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Items', 'text_domain' ),
		'search_items'               => __( 'Search Event Topic', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No items', 'text_domain' ),
		'items_list'                 => __( 'Items list', 'text_domain' ),
		'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'show_in_rest'               => true,
	);
	register_taxonomy( 'event_topic', array( 'events' ), $args );

}
add_action( 'init', 'event_topic_taxonomy', 0 );

// Register Custom Taxonomy
function event_location_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Event Locations', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Event Location', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Event Location', 'text_domain' ),
		'all_items'                  => __( 'All Event Location', 'text_domain' ),
		'parent_item'                => __( 'Parent Item', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
		'new_item_name'              => __( 'New Event Location', 'text_domain' ),
		'add_new_item'               => __( 'Add New Event Location', 'text_domain' ),
		'edit_item'                  => __( 'Edit Event Location', 'text_domain' ),
		'update_item'                => __( 'Update Event Location', 'text_domain' ),
		'view_item'                  => __( 'View Event Location', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Items', 'text_domain' ),
		'search_items'               => __( 'Search Event Topic', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No items', 'text_domain' ),
		'items_list'                 => __( 'Items list', 'text_domain' ),
		'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'show_in_rest'               => true,
	);
	register_taxonomy( 'event_location', array( 'events' ), $args );

}
add_action( 'init', 'event_location_taxonomy', 0 );

// Register Custom Post Type
function resources_post_type() {

	$labels = array(
		'name'                  => _x( 'Resources', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Resource', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Resources', 'text_domain' ),
		'name_admin_bar'        => __( 'Resources', 'text_domain' ),
		'archives'              => __( 'Resources Archives', 'text_domain' ),
		'attributes'            => __( 'Item Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
		'all_items'             => __( 'All Resources', 'text_domain' ),
		'add_new_item'          => __( 'Add New Resource', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_item'              => __( 'New Resource', 'text_domain' ),
		'edit_item'             => __( 'Edit Resource', 'text_domain' ),
		'update_item'           => __( 'Update Resource', 'text_domain' ),
		'view_item'             => __( 'View Resource', 'text_domain' ),
		'view_items'            => __( 'View Resource', 'text_domain' ),
		'search_items'          => __( 'Search Resource', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
		'items_list'            => __( 'Items list', 'text_domain' ),
		'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Resource', 'text_domain' ),
		'description'           => __( 'Post Type Description', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title' ),
		'taxonomies'            => array( 'post_tag', ' media_type', 'media_topic' ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-media-default',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'show_in_rest'          => true,
	);
	register_post_type( 'resources', $args );

}
add_action( 'init', 'resources_post_type', 0 );

// Register Custom Taxonomy
function media_type_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Media Type', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Media Type', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Media Type', 'text_domain' ),
		'all_items'                  => __( 'All Media Types', 'text_domain' ),
		'parent_item'                => __( 'Parent Item', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
		'new_item_name'              => __( 'New Media Type', 'text_domain' ),
		'add_new_item'               => __( 'Add New Media Type', 'text_domain' ),
		'edit_item'                  => __( 'Edit Media Type', 'text_domain' ),
		'update_item'                => __( 'Update Media Type', 'text_domain' ),
		'view_item'                  => __( 'View Media Type', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Items', 'text_domain' ),
		'search_items'               => __( 'Search Media Type', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No items', 'text_domain' ),
		'items_list'                 => __( 'Items list', 'text_domain' ),
		'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'show_in_rest'               => true,
	);
	register_taxonomy( 'media_type', array( 'resources' ), $args );

}
add_action( 'init', 'media_type_taxonomy', 0 );

// Register Custom Taxonomy
function media_topic_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Media Topics', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Media Topic', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Media Topic', 'text_domain' ),
		'all_items'                  => __( 'All Media Topics', 'text_domain' ),
		'parent_item'                => __( 'Parent Item', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
		'new_item_name'              => __( 'New Media Topic', 'text_domain' ),
		'add_new_item'               => __( 'Add New Media Topic', 'text_domain' ),
		'edit_item'                  => __( 'Edit Media Topic', 'text_domain' ),
		'update_item'                => __( 'Update Media Topic', 'text_domain' ),
		'view_item'                  => __( 'View Media Topic', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Items', 'text_domain' ),
		'search_items'               => __( 'Search Media Topic', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No items', 'text_domain' ),
		'items_list'                 => __( 'Items list', 'text_domain' ),
		'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'show_in_rest'               => true,
	);
	register_taxonomy( 'media_topic', array( 'resources' ), $args );

}
add_action( 'init', 'media_topic_taxonomy', 0 );

// Register Custom Post Type
function community_post_type() {

	$labels = array(
		'name'                  => _x( 'Community Members', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Communty Member', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Community Members', 'text_domain' ),
		'name_admin_bar'        => __( 'Community Members', 'text_domain' ),
		'archives'              => __( 'Community Member Archives', 'text_domain' ),
		'attributes'            => __( 'Item Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
		'all_items'             => __( 'All Resources', 'text_domain' ),
		'add_new_item'          => __( 'Add New Community Member', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_item'              => __( 'New Community Member', 'text_domain' ),
		'edit_item'             => __( 'Edit Community Member', 'text_domain' ),
		'update_item'           => __( 'Update Community Member', 'text_domain' ),
		'view_item'             => __( 'View Community Member', 'text_domain' ),
		'view_items'            => __( 'View Community Member', 'text_domain' ),
		'search_items'          => __( 'Search Community Member', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
		'items_list'            => __( 'Items list', 'text_domain' ),
		'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Communty Member', 'text_domain' ),
		'description'           => __( 'Post Type Description', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'taxonomies'            => array( 'member_location' ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-groups',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'show_in_rest'          => true,
	);
	register_post_type( 'community', $args );

}
add_action( 'init', 'community_post_type', 0 );

// Register Custom Taxonomy
function community_member_location_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Community Member Locations', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Community Member Location', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Community Member Location', 'text_domain' ),
		'all_items'                  => __( 'All Locations', 'text_domain' ),
		'parent_item'                => __( 'Parent Item', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
		'new_item_name'              => __( 'New Location', 'text_domain' ),
		'add_new_item'               => __( 'Add New Location', 'text_domain' ),
		'edit_item'                  => __( 'Edit Location', 'text_domain' ),
		'update_item'                => __( 'Update Location', 'text_domain' ),
		'view_item'                  => __( 'View Location', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Items', 'text_domain' ),
		'search_items'               => __( 'Search Topic', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No items', 'text_domain' ),
		'items_list'                 => __( 'Items list', 'text_domain' ),
		'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'show_in_rest'               => true,
	);
	register_taxonomy( 'member_location', array( 'community' ), $args );

}
add_action( 'init', 'community_member_location_taxonomy', 0 );

?>