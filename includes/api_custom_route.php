<?php

//call in user authentication !!!!fix and implement before release!!!
//require ADMIN_LIST_DIR.'/includes/user_auth.php';

// Custom route for admin emai request
function bu_reqst_admin_emails(){
    
    // Query the users.
    $args = (array('role' => 'Administrator'));
    $user_query = new WP_User_Query( $args );

    // // Get the results
    $foundUsers = $user_query->get_results();

    // Check for results
    if (!empty($foundUsers)) {

        $data = [];
        $i = 0;

        // loop through each user
        foreach ($foundUsers as $foundUser){
        //     // get all the user's data
            $user_info = get_userdata($foundUser->ID);
            $user_fullName= $user_info->first_name . ' ' . $user_info->last_name;
            $login = $user_info->user_login;
            $email = $user_info->user_email;
            $role = $user_info->roles;

            // Push the data to array
            $data[$i]['login_name'] = $login;
            $data[$i]['name'] = $user_fullName;
            $data[$i]['email'] = $email;
            $data[$i]['role'] = $role;

            // next user
            $i++;

        }
    return $data;
            
    } else {
        return 'No users found';
    }
}
       
// Register Custom API Route.
add_action( 'rest_api_init', function () {
  register_rest_route( 'admincheck/v1', 'all', array(
		    'methods' => 'GET',
		    'callback' => 'bu_reqst_admin_emails',
  ) );
} );