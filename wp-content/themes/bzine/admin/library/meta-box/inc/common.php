<?php
// Prevent loading this file directly
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'RWMB_Common' ) )
{
	/**
	 * Common functions for the plugin
	 * Independent from meta box/field classes
	 */
	class RWMB_Common
	{
		/**
		 * Do actions when class is loaded
		 *
		 * @return void
		 */
		static function on_load()
		{
			/* self::load_theme_textdomain(); */
		}

		/**
		 * Load plugin translation
		 *
		 * @return void
		 */
		static function load_theme_textdomain()
		{
			// l18n translation files
			/* $locale = get_locale();
			$dir    = trailingslashit( RWMB_DIR . 'lang' );
			$mofile = "{$dir}{$locale}.mo";

			// In themes/plugins/mu-plugins directory
			load_theme_textdomain( 'rwmb', $mofile ); */
		}
	}

	RWMB_Common::on_load();
}