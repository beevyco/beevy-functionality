<?php
function beevyco_remove_extras( $steps ) {
	unset( $steps['extras'] );
	unset( $steps['activate'] );

	return $steps;
}
add_filter( 'woocommerce_setup_wizard_steps', 'beevyco_remove_extras', 10, 1 );