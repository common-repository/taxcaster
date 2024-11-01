<?php
/*
Plugin Name: TaxCaster
Plugin URI: http://webdevstudios.com
Description: Provides the TaxCaster Lite tax calculator application on any post or page in WordPress
Version: 2.0
Author: Turbo Tax
Author URI: http://turbotax.intuit.com
License: GPLv2
*/

/*  Copyright 2012  Brad Williams  (email : contact@webdevstudios.com)

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

//initialize the tc menu
add_action( 'admin_menu', 'tc_intuit_create_menu' );

function tc_intuit_create_menu() {

	//create custom top-level menu
	add_options_page( 'TaxCaster Settings', 'TaxCaster', 'manage_options', 'tax-caster-plugin', 'tc_intuit_settings_page' );

}

//main settings page for TaxCaster
function tc_intuit_settings_page() {
    ?>
    <div class="wrap">
	<div id="icon-plugins" class="icon32"></div>
	<h2><?php _e( 'TaxCaster Settings', 'taxcaster' ); ?></h2>
	<p>Usage: Simply add <strong>[taxcaster]</strong> to any post or page in WordPress to embed the TaxCaster application on your website.</p>
    </div>
    <?php
}

//add shortcode support for [taxcaster]
add_shortcode( 'taxcaster', 'tc_intuit_display_app' );

//display the taxcaster app
function tc_intuit_display_app() {

    //generate the URL to the TaxCaster app
    $tc_swf_url = esc_url( plugins_url( 'includes/EightQuestionRefundEstimator.swf', __FILE__ ) );

    $tc_return = '<object width="450" height="550">
	    <param name="movie" value="' .$tc_swf_url. '">
	    <embed src="' .$tc_swf_url. '" width="450" height="550">
	    </embed>
	</object>';
    $tc_return .= '<p>Powered by <a href="http://turbotax.intuit.com/tax-tools/calculators/taxcaster/">Taxcaster Tax Refund Calculator</a></p>';

    return $tc_return;

}

?>