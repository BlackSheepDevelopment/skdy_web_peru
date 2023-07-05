<?php

/**
 * Registers the `mood` post type.
 */
function mood_init() {
	register_post_type( 'mood', array(
		'labels'                => array(
			'name'                  => __( 'Moods', 'skullcandy' ),
			'singular_name'         => __( 'Mood', 'skullcandy' ),
			'all_items'             => __( 'All Moods', 'skullcandy' ),
			'archives'              => __( 'Mood Archives', 'skullcandy' ),
			'attributes'            => __( 'Mood Attributes', 'skullcandy' ),
			'insert_into_item'      => __( 'Insert into Mood', 'skullcandy' ),
			'uploaded_to_this_item' => __( 'Uploaded to this Mood', 'skullcandy' ),
			'featured_image'        => _x( 'Featured Image', 'mood', 'skullcandy' ),
			'set_featured_image'    => _x( 'Set featured image', 'mood', 'skullcandy' ),
			'remove_featured_image' => _x( 'Remove featured image', 'mood', 'skullcandy' ),
			'use_featured_image'    => _x( 'Use as featured image', 'mood', 'skullcandy' ),
			'filter_items_list'     => __( 'Filter Moods list', 'skullcandy' ),
			'items_list_navigation' => __( 'Moods list navigation', 'skullcandy' ),
			'items_list'            => __( 'Moods list', 'skullcandy' ),
			'new_item'              => __( 'New Mood', 'skullcandy' ),
			'add_new'               => __( 'Add New', 'skullcandy' ),
			'add_new_item'          => __( 'Add New Mood', 'skullcandy' ),
			'edit_item'             => __( 'Edit Mood', 'skullcandy' ),
			'view_item'             => __( 'View Mood', 'skullcandy' ),
			'view_items'            => __( 'View Moods', 'skullcandy' ),
			'search_items'          => __( 'Search Moods', 'skullcandy' ),
			'not_found'             => __( 'No Moods found', 'skullcandy' ),
			'not_found_in_trash'    => __( 'No Moods found in trash', 'skullcandy' ),
			'parent_item_colon'     => __( 'Parent Mood:', 'skullcandy' ),
			'menu_name'             => __( 'Moods', 'skullcandy' ),
		),
		'public'                => true,
		'hierarchical'          => false,
		'show_ui'               => true,
		'show_in_nav_menus'     => true,
		'supports'              => array( 'title', 'editor' ),
		'has_archive'           => true,
		'rewrite'               => true,
		'query_var'             => true,
		'menu_position'         => null,
		'menu_icon'             => 'dashicons-palmtree',
		'show_in_rest'          => true,
		'rest_base'             => 'mood',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
	) );

}
add_action( 'init', 'mood_init' );

/**
 * Sets the post updated messages for the `mood` post type.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `mood` post type.
 */
function mood_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['mood'] = array(
		0  => '', // Unused. Messages start at index 1.
		/* translators: %s: post permalink */
		1  => sprintf( __( 'Mood updated. <a target="_blank" href="%s">View Mood</a>', 'skullcandy' ), esc_url( $permalink ) ),
		2  => __( 'Custom field updated.', 'skullcandy' ),
		3  => __( 'Custom field deleted.', 'skullcandy' ),
		4  => __( 'Mood updated.', 'skullcandy' ),
		/* translators: %s: date and time of the revision */
		5  => isset( $_GET['revision'] ) ? sprintf( __( 'Mood restored to revision from %s', 'skullcandy' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		/* translators: %s: post permalink */
		6  => sprintf( __( 'Mood published. <a href="%s">View Mood</a>', 'skullcandy' ), esc_url( $permalink ) ),
		7  => __( 'Mood saved.', 'skullcandy' ),
		/* translators: %s: post permalink */
		8  => sprintf( __( 'Mood submitted. <a target="_blank" href="%s">Preview Mood</a>', 'skullcandy' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		/* translators: 1: Publish box date format, see https://secure.php.net/date 2: Post permalink */
		9  => sprintf( __( 'Mood scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Mood</a>', 'skullcandy' ),
		date_i18n( __( 'M j, Y @ G:i', 'skullcandy' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		/* translators: %s: post permalink */
		10 => sprintf( __( 'Mood draft updated. <a target="_blank" href="%s">Preview Mood</a>', 'skullcandy' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'mood_updated_messages' );
