=== Personal Livescore ===
Contributors: Ciprian Popescu
Tags: livescore, match, score, goal, goalscorer
License: GPLv3
Requires at least: 3.8
Tested up to: 3.9.2
Stable tag: 2.4.1

== Description ==

This plugin allows the administrator to run and maintain a livescore system without the need to sign up for various web services or feeds. The plugin is completely standalone.

== Installation ==

1. Upload the 'personal-livescore' folder to your '/wp-content/plugins/' directory
2. Activate the plugin via the Plugins menu in WordPress
3. Create and publish a new page/post and add this shortcode: [livescore]
4. A new Livescore menu will appear in WordPress with options and general help

== Changelog ==

= 2.4.1 =
* Fixed wrong package

= 2.4 =
* Fixed $wpdb queries
* Fixed weird paragraph issues when PHP code added a line break
* Added single ID parameter for shortcode
* Updated WordPress compatibility
* Updated HTML5 code for the embeddable version

= 2.3 =
* Added goal scorers and goal times for each match

= 2.2 =
* Added new status - 3 - for upcoming, but hidden, matches

= 2.1 =
* Added date and time picker for older browsers
* Added contextual help (legend)
* Added removal option for archived matches/games

= 2.0 =
* First public release
