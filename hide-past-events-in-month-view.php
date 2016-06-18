<?php
/**
 * Plugin Name: The Events Calendar — Hide Past Events in Month View
 * Description: Hides past events in The Events Calendar's month view.
 * Version: 1.0.0
 * Author: Modern Tribe, Inc.
 * Author URI: http://m.tri.be/1x
 * License: GPLv2 or later
 */
defined( 'WPINC' ) or die;

add_action( 'wp_head', 'tribe_hide_past_events_on_month_view' );

function tribe_hide_past_events_on_month_view() {

	if ( ! tribe_is_month() ) {
		return;
	}
?>
	<style>
	.tribe-events-calendar td.tribe-events-past .tribe-events-month-event-title a,
	.tribe-events-calendar td.tribe-events-past .tribe-events-viewmore a,
	.tribe-events-calendar td.tribe-events-past .tribe-events-viewmore {
		display: none;
	}
	
	.events-archive.events-gridview #tribe-events-content table.tribe-events-calendar td.tribe-events-past .type-tribe_events {
		border: none;
		box-shadow: none;
	}
	</style>
<?php
}
