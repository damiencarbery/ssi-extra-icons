<?php
/*
Plugin Name: Simple Social Icons - Extra Icons
Plugin URI: https://github.com/damiencarbery/ssi-extra-icons
GitHub Plugin URI: https://github.com/damiencarbery/ssi-extra-icons
Description: Add extra icons to Simple Social Icons list.
Author: Damien Carbery
Author URI: https://www.damiencarbery.com
Version: 0.2
*/

add_filter( 'simple_social_default_profiles', 'dcwd_add_social_profiles' );
function dcwd_add_social_profiles( $profiles ) {
	// Add icons. Icon path can be within a svg file or a standalone svg file.
	// Based on config.php in https://github.com/nickcernis/ssi-custom-icons
	$new_icons =  array(
		[
			'label'        => 'AppStore',
			'widget_label' => 'App Store URI',
			'short_name'   => 'appstore',
			'path'         => esc_url( plugin_dir_url( __FILE__ ) . 'ssi-extra-icons.svg#social-app-store' ),
			'default'      => '',
		],
		[
			'label'        => 'PlayStore',
			'widget_label' => 'Play Store URI',
			'short_name'   => 'playstore',
			'path'         => esc_url( plugin_dir_url( __FILE__ ) . 'ssi-extra-icons.svg#social-play-store' ),
			'default'      => '',
		],
		[
			'label'        => 'TripAdvisor',
			'widget_label' => 'TripAdvisor URI',
			'short_name'   => 'tripadvisor',
			'path'         => esc_url( plugin_dir_url( __FILE__ ) . 'ssi-extra-icons.svg#social-tripadvisor' ),
			'default'      => '',
		],
		[
			'label'        => 'WhatsApp',
			'widget_label' => 'WhatsApp URI',
			'short_name'   => 'whatsapp',
			'path'         => esc_url( plugin_dir_url( __FILE__ ) . 'ssi-extra-icons.svg#social-whatsapp' ),
			'default'      => '',
		],
		[
			'label'        => 'Google My Business',
			'widget_label' => 'Google My Business URI',
			'short_name'   => 'googlemybusiness',
			'path'         => esc_url( plugin_dir_url( __FILE__ ) . 'ssi-extra-icons.svg#social-google-my-business' ),
			'default'      => '',
		],
		// Example that uses a standalone SVG file.
		/*[
			'label'        => 'User friendly name',
			'widget_label' => 'Widget label in Dashboard',
			'short_name'   => 'shortname',
			'path'         => esc_url( plugin_dir_url( __FILE__ ) . 'filename.svg' ),
			'default'      => '',
		],*/
	);

	foreach ( $new_icons as $icon ) {
		$profiles[ $icon['short_name'] ] = [
			'label'   => $icon['widget_label'],
			'pattern' => '<li class="social-' . $icon['short_name'] . '"><a href="%s" %s><svg role="img" class="social-' . $icon['short_name'] . '-svg" aria-labelledby="social-' . $icon['short_name'] . '"><title id="social-' . $icon['short_name'] . '-{WIDGET_INSTANCE_ID}">' . $icon['label'] . '</title><use xlink:href="' . $icon['path'] . '"></use></svg></a></li>',
		];
		
		// If the path is a file rather than an index within a file (file.svg#index) then the svg markup is quite different.
		if ( false == strpos( $icon['path'], '.svg#' ) ) {
			$profiles[ $icon['short_name'] ]['pattern'] = '<li class="social-' . $icon['short_name'] . '"><a href="%s" %s><img title="'. $icon['label'] .'" class="social-' . $icon['short_name'] . '-svg" src="' . $icon['path'] . '" /></a></li>';
		}
	}

	return $profiles;
}
