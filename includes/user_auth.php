<?php

function admin_list_user_auth(){
 /* User authentication and permission check */    
    // Don't show for logged out users or single site mode.
    if ( ! is_user_logged_in() || ! is_multisite() ) {
        $data = "Sorry, snitches get stiches!";
        return $data;
    }
    // Bail if user does not have networks or they're not a global admin (Super Admin).
    if ( ! is_global_admin() ) {
        $data = "Sorry, this is above you!";
        return $data;;
    }
}