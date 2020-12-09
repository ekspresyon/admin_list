<?php

function user_list_gen(){
//Add admin page under Users in network dashboard

        // Don't show for logged out users or single site mode.
        if ( ! is_user_logged_in() || ! is_multisite() ) {
            return;
        }

        // Bail if user does not have networks or they're not a global admin (Super Admin).
        if ( ! is_global_admin() ) {
            return;
        }
        $parent_slug = 'users.php';
        $page_title = 'User list generator';
        $capability = 'manage_network_users';
        $menu_slug = 'users-list-generator';
        $menu_title = 'Generate list';
        $position = null;
        $function = 'user_list_generator_view';

        add_submenu_page( $parent_slug, $page_title, $menu_title,  $capability, $menu_slug, $function, $position );

}		
add_action('network_admin_menu', 'user_list_gen' );
// add_action('admin_menu', 'user_list_gen' );

/**
 * Enqueue a script in the WordPress admin on edit.php.
 *
 * @param int $hook Hook suffix for the current admin page.
 */
function enqueue_jsontocsv_script( $hook ) {
	// Make sure you fix this! very important!
    // if ( 'users.php?page=users-list-generator' != $hook ) {
    //     return;
    // }
    wp_enqueue_script( 'jsontocsv_script', plugin_dir_url( __FILE__ ) . 'js/jsontocsv.js', array(), '1.0' );
    wp_enqueue_script( 'downloadcsv_script', plugin_dir_url( __FILE__ ) . 'js/downloadcsv.js', array(), '1.0', true );
}
add_action( 'admin_enqueue_scripts', 'enqueue_jsontocsv_script' );


function user_list_generator_view(){

        // Bail if user does not have networks or they're not a global admin (Super Admin).
		if ( ! current_user_can( 'manage_network_users' ) ) {
			wp_die(
				'<h1>' . __( 'You need a higher level of permission.' ) . '</h1>' .
				'<p>' . __( 'Sorry, you are not allowed to list users.' ) . '</p>',
				403
			);
		}

	$wp_list_table = _get_list_table( 'WP_MS_Users_List_Table' );
	$wp_list_table->prepare_items();
	$total_pages = $wp_list_table->get_pagination_arg( 'total_pages' );
	if ( $pagenum > $total_pages && $total_pages > 0 ) {
		wp_redirect( add_query_arg( 'paged', $total_pages ) );
		exit;
	}
	add_screen_option( 'per_page' );

	//call in page view
	require ADMIN_LIST_DIR.'/includes/list_generator_view.php';
}
        
