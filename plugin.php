<?php
/**
 * Plugin Name: The Events Calendar Extension: Hide Past Events in Month View
 * Description: Hides past events in The Events Calendar's month view.
 * Version: 1.0.0
 * Author: Modern Tribe, Inc.
 * Author URI: http://m.tri.be/1971
 * License: GPLv2 or later
 */

defined( 'WPINC' ) or die;

class Tribe__Extension__Hide_Past_Events_in_Month_View {

	/**
	 * The semantic version number of this extension; should always match the plugin header.
	 */
	const VERSION = '1.0.0';

	/**
	 * Each plugin required by this extension
	 *
	 * @var array Plugins are listed in 'main class' => 'minimum version #' format
	 */
	public $plugins_required = array(
		'Tribe__Events__Main' => '4.2'
	);

	/**
     * The constructor; delays initializing the extension until all other plugins are loaded.
     */
	public function __construct() {
		add_action( 'plugins_loaded', array( $this, 'init' ), 100 );
	}

	/**
	 * Extension hooks and initialization; exits if the extension is not authorized by Tribe Common to run.
	 */
	public function init() {

		// Exit early if our framework is saying this extension should not run.
		if ( ! function_exists( 'tribe_register_plugin' ) || ! tribe_register_plugin( __FILE__, __CLASS__, self::VERSION, $this->plugins_required ) ) {
			return;
		}

		add_action( 'wp_head', array( $this, 'tribe_hide_past_events_on_month_view' ) );
	}

	/**
	 * Echo CSS for hiding past events.
	 */
	public function tribe_hide_past_events_on_month_view()  {

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
}

new Tribe__Extension__Hide_Past_Events_in_Month_View();
