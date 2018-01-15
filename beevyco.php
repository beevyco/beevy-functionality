<?php
if ( !defined( 'BEEVY_CO_PLUGIN_DIR' ) ) {
	define( 'BEEVY_CO_PLUGIN_DIR', trailingslashit( plugin_dir_path( __FILE__ ) . 'beevyco' ) );
}

if ( !defined( 'BEEVY_CO_PLUGIN_FILE' ) ) {
	define( 'BEEVY_CO_PLUGIN_FILE', __FILE__ );
}

if ( !defined( 'BEEVY_CO_VERSION' ) ) {
	define( 'BEEVY_CO_VERSION', '1.0' );
}


function beevyco_includes() {
	require_once BEEVY_CO_PLUGIN_DIR . 'rcp-mods.php';
	require_once BEEVY_CO_PLUGIN_DIR . 'woocommerce-wizard-mods.php';
}
add_action( 'plugins_loaded', 'beevyco_includes', 9999 );