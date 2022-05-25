<?php

/*
	Plugin Name:  affiliatewp-customization
	Version:  1.0
	Description:  針對affiliatewp外掛進行部分調整
	Author:  websec.one
	Author URI:  https://websec.one
	License: GPLv2 or later
*/
add_role( 'affiliatewp_member', __( '聯盟行銷夥伴' ), array( 'read'=> true ) ); 


function check_user_affiliatewp_member() {
		global $current_user;
		if( $current_user->roles[0] !== 'affiliatewp_member' ) {
			echo '<style>.woocommerce-MyAccount-navigation-link--affiliate-area, .affiliate-area-link{display:none;}</style>';
		}
}
add_action( 'init', 'check_user_affiliatewp_member' );

function check_logined() {
	if ($_SERVER['REQUEST_URI'] == '/affiliatewp/' && !is_user_logged_in()) {
		header("Location:".'https://'.$_SERVER['HTTP_HOST'].'/my-account/'); 
		exit;
	}
}
add_action( 'init', 'check_logined' );