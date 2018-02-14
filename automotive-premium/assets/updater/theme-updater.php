<?php
if ( !class_exists( 'EDD_Theme_Updater_Admin' ) ) {
	include( dirname( __FILE__ ) . '/theme-updater-admin.php' );
}
$updater = new EDD_Theme_Updater_Admin(
	$config = array(
		'remote_api_url' => 'https://gorillathemes.com',
		'item_id' => '4758',
		'theme_slug' => 'automotive-premium',
		'version' => '3.5.3',
		'author' => 'Gorilla Themes',
		'download_id' => '',
		'renew_url' => ''
	),

	$strings = array(
		'theme-license' => __( 'Theme License', 'language' ),
		'enter-key' => __( 'Enter your theme license key.', 'language' ),
		'license-key' => __( 'License Key', 'language' ),
		'license-action' => __( 'License Action', 'language' ),
		'deactivate-license' => __( 'Deactivate License', 'language' ),
		'activate-license' => __( 'Activate License', 'language' ),
		'status-unknown' => __( 'License status is unknown.', 'language' ),
		'renew' => __( 'Renew?', 'language' ),
		'unlimited' => __( 'unlimited', 'language' ),
		'license-key-is-active' => __( 'License key is active.', 'language' ),
		'expires%s' => __( 'Expires %s.', 'language' ),
		'%1$s/%2$-sites' => __( 'You have %1$s / %2$s sites activated.', 'language' ),
		'license-key-expired-%s' => __( 'License key expired %s.', 'language' ),
		'license-key-expired' => __( 'License key has expired.', 'language' ),
		'license-keys-do-not-match' => __( 'License keys do not match.', 'language' ),
		'license-is-inactive' => __( 'License is inactive.', 'language' ),
		'license-key-is-disabled' => __( 'License key is disabled.', 'language' ),
		'site-is-inactive' => __( 'Site is inactive.', 'language' ),
		'license-status-unknown' => __( 'License status is unknown.', 'language' ),
		'update-notice' => __( "Updating this theme will lose any customizations you have made. 'Cancel' to stop, 'OK' to update.", 'language' ),
		'update-available' => __('<strong>%1$s %2$s</strong> is available. <a href="%3$s" class="thickbox" title="%4s">Check out what\'s new</a> or <a href="%5$s"%6$s>update now</a>.', 'language' )
	)

);