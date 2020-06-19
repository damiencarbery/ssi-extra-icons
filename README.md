# ssi-extra-icons - Simple Social Icons - Extra Icons
Adds extra icons to the StudioPress [Simple Social Icons plugin](https://wordpress.org/plugins/simple-social-icons/).

The code is based on wiki article [Add an additional icon in version 2.0](https://github.com/studiopress/simple-social-icons/wiki/Add-an-additional-icon-in-version-2.0) and [example code](https://github.com/nickcernis/ssi-custom-icons).

Icons are from [Font Awesome SVG repository](https://github.com/encharm/Font-Awesome-SVG-PNG/tree/master/black/svg) and [Noun Project](https://thenounproject.com/). Free icons can also be sourced from [Simple Icons](https://simpleicons.org/).

## Reorder SSI icons
To change the display order of the icons use the '*simple_social_default_profiles*' filter. You can also use this to remove icons that you don't need.

The code below can be added to the theme's `functions.php` file (Remove the `<?php` line and the comment) or as a separate plugin.

```php
<?php
/*
Plugin Name: SSI Extra Icons - Reorder and Omit
Plugin URI: https://www.damiencarbery.com
Description: Change SSI icon order and omit unused icons.
Author: Damien Carbery
Version: 0.1
*/

add_filter( 'simple_social_default_profiles', 'sei_reorder_simple_icons', 50 );

function sei_reorder_simple_icons( $icons ) {

	// Set your new order here
	$sei_icon_order = array(
		'googlemybusiness' => '',
		'facebook'    => '',
		'tripadvisor' => '',
		'instagram'   => '',
		'youtube'     => '',

		'whatsapp'    => '',
		'phone'       => '',
		'email'       => '',

		'twitter'     => '',

		// Disable the rest for this example.
		/*'linkedin'    => '',
		'behance'     => '',
		'bloglovin'   => '',
		'dribbble'    => '',
		'flickr'      => '',
		'github'      => '',
		'gplus'       => '',
		'medium'      => '',
		'periscope'   => '',
		'pinterest'   => '',
		'rss'         => '',
		'snapchat'    => '',
		'stumbleupon' => '',
		'tumblr'      => '',
		'vimeo'       => '',
		'xing'        => '',
		'appstore'    => '',
		'playstore'   => '',*/
	);

	foreach( $sei_icon_order as $icon => $icon_info ) {
		$sei_icon_order[ $icon ] = $icons[ $icon ];
	}

	return $sei_icon_order;
}
```
