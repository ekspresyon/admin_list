<?php
/**
Plugin Name: Admin list generator - Demo
Plugin URI: 
Description: This wordpress plugin used to help generate a manageable list of site admins emails
Author: BU - IS&T
Version: Theta 0.0.1
*/

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

define( 'ADMIN_LIST', __FILE__ );
define( 'ADMIN_LIST_DIR', untrailingslashit( dirname( ADMIN_LIST ) ) );

//call in Custom API routes
require ADMIN_LIST_DIR.'/includes/api_custom_route.php';


//call in custom admin page
require ADMIN_LIST_DIR.'/includes/user_list_gen.php';
