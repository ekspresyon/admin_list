<?php
// Custom route for admin emai request
function bu_reqst_admin_emails(){
    
    /* User authentication and permission check */    
    // Don't show for logged out users or single site mode.
    // if ( ! is_user_logged_in() || ! is_multisite() ) {
    //     $data = "Sorry, snitches get stiches!";
    //     return $data;
    // }
    // // Bail if user does not have networks or they're not a global admin (Super Admin).
    // if ( ! is_global_admin() ) {
    //     $data = "Sorry, this is above you!";
    //     return $data;;
    // }

    // Query the users.
    $args = (array('role' => 'Administrator'));
    $user_query = new WP_User_Query( $args );

    // // Get the results
    $foundUsers = $user_query->get_results();
     
    // // Check for results
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
            
    // } else {
    //     return 'No users found';
    }
}










// 	$data = [];
// 	$emailList = [];
	
//   	$i = 0;
// 	$users = get_users( 'role=administrator' );
// 	foreach($users as $user){

// 		// Get the necessary data
// 		$theuser= get_userdata ($user->ID);
// 		$login = $theuser->user_login;
//         $firstName = $theuser->first_name;
//         $lastName = $theuser->last_name;
//         $email = $theuser->user_email;
//         $role = $theuser->roles;

//         // Push the data to array
//         $data[$i]['login_name'] = $login;
//         $data[$i]['name'] = $firstName;
//         $data[$i]['email'] = $email;
//         $data[$i]['role'] = $role;

//         // Push all emails into an array
//         array_push($emailList,$email);

//         // next user
//         $i++;


//     }
//     $alldata = array ( //$emailList,
//                         $data
//                  );
// 	return $data;   
// }        

add_action( 'rest_api_init', function () {
  register_rest_route( 'admincheck/v1', 'all', array(
		    'methods' => 'GET',
		    'callback' => 'bu_reqst_admin_emails',
  ) );
} );