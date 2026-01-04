<?php
/*======================/Create post type - Start /=============================*/
function prefix_register_all() {

	/* ========================================================================= */
	$name = "Couple Card Post";
	$singular_name = "Couple Card Post";
	$menu_name = "Couple Card Post";
	$name_admin_bar = "Couple Card Post";
	$all_items = "All Items";
	$add_new = "Add New";
	$add_new_item = "Add New Item";
	$edit_item = "Edit Item";
	$new_item = "New Item";
	$view_item = "View Item";
	$search_items = "Search Items";
	$not_found = "No items found.";
	$not_found_in_trash = "No items found in Trash.";
	$parent_item_colon = "Parent Items:";

	register_post_type(
		'couple_card',
		array(
			'labels' => array(
					'name' => __( $name, 'text_domain' ),
					'singular_name' => __( $singular_name, 'text_domain' ),
					'menu_name' => __( $menu_name, 'text_domain' ),
					'name_admin_bar' => __( $name_admin_bar, 'text_domain' ),
					'all_items' => __( $all_items, 'text_domain' ),
					'add_new' => _x( $add_new, 'couple_card', 'text_domain' ),
					'add_new_item' => __( $add_new_item, 'text_domain' ),
					'edit_item' => __( $edit_item, 'text_domain' ),
					'new_item' => __( $new_item, 'text_domain' ),
					'view_item' => __( $view_item, 'text_domain' ),
					'search_items' => __( $search_items, 'text_domain' ),
					'not_found' => __( $not_found, 'text_domain' ),
					'not_found_in_trash' => __( $not_found_in_trash, 'text_domain' ),
					'parent_item_colon' => __( $parent_item_colon, 'text_domain' )
				),
			'public' => true,
			'menu_position' => 20,
			'show_in_rest' => true,
			'supports' => array(
				'title',
				'editor',
				'thumbnail',
				'revisions'
			),
			'taxonomies' => array(
				'couple_cate',
				'couple_counterdays',
				'couple_message',
				'couple_mp3',
				'couple_albums',
				'couple_background_album',
			),
			'has_archive' => true,
			'menu_icon' => 'dashicons-welcome-write-blog'
		)
	);

	// FOR BACKGROUND
	$tax_name = "Category";
	$tax_singular_name = "Category";
	$tax_menu_name = "Category";
	$tax_all_items = "All Category";
	$tax_edit_item = "Edit Category";
	$tax_view_item = "View Category";
	$tax_update_item = "Update Category";
	$tax_add_new_item = "Add New Category";
	$tax_parent_item = "Parent Category";
	$tax_parent_item_colon = "Parent Category:";
	$tax_search_items = "Search Category";

	register_taxonomy(
		'couple_cate',
		array(
			'couple_card'
		),
		array(
			'labels'            => array(
				'name'              => _x($tax_name, 'couple_card', 'text_domain'),
				'singular_name'     => _x($tax_singular_name, 'couple_card', 'text_domain'),
				'menu_name'         => __($tax_menu_name, 'text_domain'),
				'all_items'         => __($tax_all_items, 'text_domain'),
				'edit_item'         => __($tax_edit_item, 'text_domain'),
				'view_item'         => __($tax_view_item, 'text_domain'),
				'update_item'       => __($tax_update_item, 'text_domain'),
				'add_new_item'      => __($tax_add_new_item, 'text_domain'),
				'parent_item'       => __($tax_parent_item, 'text_domain'),
				'parent_item_colon' => __($tax_parent_item_colon, 'text_domain'),
				'search_items'      => __($tax_search_items, 'text_domain')
			),
			'show_admin_column' => true,
			'hierarchical'      => true,
			'show_in_rest'=> true
		)
	);

	// FOR COUNTER DAYS
	$tax_name = "Counter Days";
	$tax_singular_name = "Counter Days";
	$tax_menu_name = "Counter Days";
	$tax_all_items = "All Counter Days";
	$tax_edit_item = "Edit Counter Days";
	$tax_view_item = "View Counter Days";
	$tax_update_item = "Update Counter Days";
	$tax_add_new_item = "Add New Counter Days";
	$tax_parent_item = "Parent Category";
	$tax_parent_item_colon = "Parent Category:";
	$tax_search_items = "Search Counter Days";

	register_taxonomy(
		'couple_counterdays',
		array(
			'couple_card'
		),
		array(
			'labels'            => array(
				'name'              => _x($tax_name, 'couple_card', 'text_domain'),
				'singular_name'     => _x($tax_singular_name, 'couple_card', 'text_domain'),
				'menu_name'         => __($tax_menu_name, 'text_domain'),
				'all_items'         => __($tax_all_items, 'text_domain'),
				'edit_item'         => __($tax_edit_item, 'text_domain'),
				'view_item'         => __($tax_view_item, 'text_domain'),
				'update_item'       => __($tax_update_item, 'text_domain'),
				'add_new_item'      => __($tax_add_new_item, 'text_domain'),
				'parent_item'       => __($tax_parent_item, 'text_domain'),
				'parent_item_colon' => __($tax_parent_item_colon, 'text_domain'),
				'search_items'      => __($tax_search_items, 'text_domain')
			),
			'show_admin_column' => true,
			'hierarchical'      => true,
			'show_in_rest'=> true
		)
	);

	// FOR ALBUMS
	$tax_name = "Albums";
	$tax_singular_name = "Albums";
	$tax_menu_name = "Albums";
	$tax_all_items = "All Albums";
	$tax_edit_item = "Edit Albums";
	$tax_view_item = "View Albums";
	$tax_update_item = "Update Albums";
	$tax_add_new_item = "Add New Albums";
	$tax_parent_item = "Parent Category";
	$tax_parent_item_colon = "Parent Category:";
	$tax_search_items = "Search Albums";

	register_taxonomy(
		'couple_albums',
		array(
			'couple_card'
		),
		array(
			'labels'            => array(
				'name'              => _x($tax_name, 'couple_card', 'text_domain'),
				'singular_name'     => _x($tax_singular_name, 'couple_card', 'text_domain'),
				'menu_name'         => __($tax_menu_name, 'text_domain'),
				'all_items'         => __($tax_all_items, 'text_domain'),
				'edit_item'         => __($tax_edit_item, 'text_domain'),
				'view_item'         => __($tax_view_item, 'text_domain'),
				'update_item'       => __($tax_update_item, 'text_domain'),
				'add_new_item'      => __($tax_add_new_item, 'text_domain'),
				'parent_item'       => __($tax_parent_item, 'text_domain'),
				'parent_item_colon' => __($tax_parent_item_colon, 'text_domain'),
				'search_items'      => __($tax_search_items, 'text_domain')
			),
			'show_admin_column' => true,
			'hierarchical'      => true,
			'show_in_rest'=> true
		)
	);

	// FOR MESSAGE
	$tax_name = "Message";
	$tax_singular_name = "Message";
	$tax_menu_name = "Message";
	$tax_all_items = "All Message";
	$tax_edit_item = "Edit Message";
	$tax_view_item = "View Message";
	$tax_update_item = "Update Message";
	$tax_add_new_item = "Add New Message";
	$tax_parent_item = "Parent Category";
	$tax_parent_item_colon = "Parent Category:";
	$tax_search_items = "Search Message";

	register_taxonomy(
		'couple_message',
		array(
			'couple_card'
		),
		array(
			'labels'            => array(
				'name'              => _x($tax_name, 'couple_card', 'text_domain'),
				'singular_name'     => _x($tax_singular_name, 'couple_card', 'text_domain'),
				'menu_name'         => __($tax_menu_name, 'text_domain'),
				'all_items'         => __($tax_all_items, 'text_domain'),
				'edit_item'         => __($tax_edit_item, 'text_domain'),
				'view_item'         => __($tax_view_item, 'text_domain'),
				'update_item'       => __($tax_update_item, 'text_domain'),
				'add_new_item'      => __($tax_add_new_item, 'text_domain'),
				'parent_item'       => __($tax_parent_item, 'text_domain'),
				'parent_item_colon' => __($tax_parent_item_colon, 'text_domain'),
				'search_items'      => __($tax_search_items, 'text_domain')
			),
			'show_admin_column' => true,
			'hierarchical'      => true,
			'show_in_rest'=> true
		)
	);

	// FOR BACKGROUND ALBUM
	$tax_name = "Background Album";
	$tax_singular_name = "Background Album";
	$tax_menu_name = "Background Album";
	$tax_all_items = "All Background Album";
	$tax_edit_item = "Edit Background Album";
	$tax_view_item = "View Background Album";
	$tax_update_item = "Update Background Album";
	$tax_add_new_item = "Add New Background Album";
	$tax_parent_item = "Parent Category";
	$tax_parent_item_colon = "Parent Category:";
	$tax_search_items = "Search Background Album";

	register_taxonomy(
		'couple_background_album',
		array(
			'couple_card'
		),
		array(
			'labels'            => array(
				'name'              => _x($tax_name, 'couple_card', 'text_domain'),
				'singular_name'     => _x($tax_singular_name, 'couple_card', 'text_domain'),
				'menu_name'         => __($tax_menu_name, 'text_domain'),
				'all_items'         => __($tax_all_items, 'text_domain'),
				'edit_item'         => __($tax_edit_item, 'text_domain'),
				'view_item'         => __($tax_view_item, 'text_domain'),
				'update_item'       => __($tax_update_item, 'text_domain'),
				'add_new_item'      => __($tax_add_new_item, 'text_domain'),
				'parent_item'       => __($tax_parent_item, 'text_domain'),
				'parent_item_colon' => __($tax_parent_item_colon, 'text_domain'),
				'search_items'      => __($tax_search_items, 'text_domain')
			),
			'show_admin_column' => true,
			'hierarchical'      => true,
			'show_in_rest'=> true
		)
	);
}

add_action( 'init', 'prefix_register_all', 0 );
function prefix_flush_rewrite_rules() {
	flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'prefix_flush_rewrite_rules' );


/* change color for icon menu admin */
function replace_admin_menu_icons_css() { ?>
	<style>
		/* #adminmenu #menu-posts, */
		#adminmenu #menu-posts,
		#adminmenu #menu-comments,
		#adminmenu #menu-posts-featured_item,
		#wp-admin-bar-comments,
		#wp-admin-bar-new-post {
			display: none;
		}
	</style>
<?php }
add_action( 'admin_head', 'replace_admin_menu_icons_css' );
/*======================/Create post type - end /=============================*/
?>