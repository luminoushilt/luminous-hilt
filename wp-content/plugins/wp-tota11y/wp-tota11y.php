<?php
/*
Plugin Name: WP Tota11y
Plugin URI: http://zenoweb.nl
Description: WP Tota11y is an accessibility visualization toolkit. It can point out many common problems regarding accessibility.
Version: 1.1.1
Author: Marcel Pol
Author URI: http://zenoweb.nl
License: GPLv2 or later
*/

/*  Copyright 2015 - 2016  Marcel Pol      (email: marcel@timelord.nl)

	This program is free software; you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation; either version 2 of the License, or
	(at your option) any later version.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program; if not, write to the Free Software
	Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/


/* Load JavaScript. */
function wp_tota11y_js() {

	if ( current_user_can( 'manage_options' ) ) {

		// Always load jQuery.
		wp_enqueue_script('jquery');

		// Load Tota11y.js
		wp_enqueue_script( 'wp-tota11y-js', plugins_url( '/js/tota11y.min.js', __FILE__ ), 'jquery', '1.1.1', true );

	}

}
// Frontend
add_action('wp_enqueue_scripts', 'wp_tota11y_js');
// Admin
add_action('admin_menu', 'wp_tota11y_js');

