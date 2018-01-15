<?php

function beevyco_register_remove_actions() {
	if ( function_exists( 'rcpga_group_accounts' ) ) {
		remove_action( 'rcp_form_errors', array( rcpga_group_accounts()->actions, 'require_group_name' ) );
	}
}
add_action( 'init', 'beevyco_register_remove_actions' );

function beevyco_create_group( $status, $user_id, $old_status, $member ) {
	// make sure this user does not already own a group
	if ( rcpga_group_accounts()->members->is_group_owner() ) {
		return;
	}

	if( ! in_array( $status, array( 'active', 'free' ) ) ) {
		return;
	}

	$member = new RCP_Member( $user_id );
	$args   = array(
		'owner_id'      => $user_id,
		'name'          => $member->first_name . ' ' . $member->last_name . "'s Group",
		'seats'         => rcpga_get_level_group_seats_allowed( $member->get_subscription_id() ),
		'member_count'  => 0,
		'date_created'  => current_time( 'mysql' ),
	);

	rcpga_group_accounts()->groups->add( $args );
}
add_action( 'rcp_set_status', 'beevyco_create_group', 10, 4 );