=== LeagueManager ===
Contributors: Kolja Schleich, LaMonte Forthun
Donate link: 
Tags: sport, widget, basketball, football, hockey, league, soccer, volleyball, gymnastics, tennis, baseball, rugby
Requires at least: 2.7
Tested up to: 3.9
Stable tag: 3.8.9

Plugin to manage and present Sports Leagues

== Description ==

This Plugin is designed to manage sports leagues and display them on your blog.

**Features**

* easy adding of teams and matches
* add team logo (wp-content directory needs to be writable by the server)
* numerous point-rules implemented to also support special rules (e.g. Hockey, Pool, Baseball, Cornhole)
* weekly-based ordering of matches with bulk editing mechanism
* automatic or manual saving of standings table
* automatic or drag & drop ranking of teams
* link posts with specific match for match reports
* unlimited number of widgets
* modular setup for easy implementation of sport types
* separate capability to control access and compatibility with Role Manager
* dynamic match statistics
* Championship mode with preliminary and k/o rounds


**Translations**

* German
* Dutch
* Swedish
* Polish
* Spanish
* French by Mamadou Dogue
* Czech
* Italian
* Arabian

== Installation ==

To install the plugin to the following steps

1. Unzip the zip-file and upload the content to your Wordpress Plugin directory.
2. Activiate the plugin via the admin plugin page.


== Frequently Asked Questions ==
**I want to implement player registration. Is that possible?**

Yes it is, however not with this plugin, but with [ProjectManager](http://wordpress.org/extend/plugins/projectmanager/). It is designed to manage any recurrent datasets, such as player profiles. It is also possible to set a hook in the user profile. Any user with the capability *project_user_profile* is able to use this feature. You would also need the [Role Manager](http://www.im-web-gefunden.de/wordpress-plugins/role-manager/) for access control. Further the plugin has a template engine implemented that makes it easy to design your own templates.


**How can I display the widget statically**

Put the following code where you want to display the widget

`<?php leaguemanager_display_widget( league_ID ); ?>`

Replace *league_ID* with the ID of the league you want to display. This will display the widget in a list with css class *leaguemanager_widget*.


== Screenshots ==
1. Main page for selected League
2. League Preferences
3. Adding of up to 15 matches simultaneously for one date
4. Easy insertion of tags via TinyMCE Button
5. Widget control panel
6. Example of 'Last 5' (shows 'Last 3') Functionality


== Credits ==
The LeagueManager icon is taken from the Fugue Icons of http://www.pinvoke.com/.

== Changelog ==

* NOTICE - WORDPRESS 3.9 INCLUDES AN UPDATE TO TINYMCE THAT BREAKS THE LeagueManager BUTTON ON THE POST EDITOR. I APOLOGIZE FOR NOT HAVING THIS FIXED WHEN 3.9 WAS RELEASED, BUT AM WORKING ON A FIX AND WILL UPDATE AS SOON AS IT'S FINISHED.

* TO-DO - There are a few fixes left with LeagueManager's Championship mode. As the plugins documentation mentions, it was written for soccer (football) and has some limitations. It's being worked on and will be updated gradually with some new features and fixes.
* TO-DO - The Match Day (Fixtures) filter on the admin standings page isn't currently working. I'm aware of the issue and importances to those using the Match Day filter to get around the PHP variable limit. I hope to have this resolved shortly.
* TO-DO - Updating the translation code to remove the deprecated code has broken some translations due to a change in how WordPress handles multiple options. The translations files need some attention, so do the sport files...
* Coming soon - Players, pagination for leagues, teams, matches, and players. New admin dashboard. New sport files.

= 3.8.9
* UPDATE: Numerous files have been worked on to remove PHP Strict Mode warnings. These warnings didn't affect LeagueManager use, but if your WordPress installation had debugging mode turned on there were many, many warnings being thrown at you. There are no doubt more that will need to be fixed, but a conservative guess is that over 100 fixes have been applied.
* BUGFIX: Fixed the error with the Widget not changing
* BUGFIX: Permissions error on documenation page
* UPDATE: Added completed games to soccer ranking
* UPDATE: Numerous areas with deprecated code
* UPDATE: Started to get into the sport files to get a consistent look to the output, centering headings over input fields, centering input fields in the space allocated and centering the text in the input fields.
* UPDATE: Started work on the Championship mode, fixed a few none working areas, much work left to do, let me know if you've got suggestions...
* ADDED:  Ability to allow for matches between groups (out of group/division games)
* BUGFIX: Fixed issue with sport files throwing error regarding a not-found function (I hope! I can't duplicate it, let me know if there are still issues)
* UPDATE: Removed all traces of dropdowns for date, replaced with Datepicker
* UPDATE: Fixed a number of areas to keep the user in the same group when adding or updating teams or matches. If you are working in one group and add a team the group knows where you came from and when you click submit you go back to the group you started from (your welcome!)

= 3.8.8.5
* BUGFIX: Fix standings numbers
* BUGFIX: Fix widget issues after adding groups
* ADDED:  US Football Sport file

= 3.8.8.4 =
* BUGFIX: Wrong numbers on standing positions

= 3.8.8.3 =
* BUGFIX: Permission error
* UPDATE: Changed some internal code from 'leagues' to 'leaguemanager'
* ADDED: Dashboard Widget

= 3.8.8.2 =
* ADDED: Code for Widget to show/hide logos and limit to group
* BUGFIX: "Clas=" in a number of sport files, changed to "Class="
* ADDED: JQuery tooltip for 'Last 5' to show date, score and teams of a game in the standings
* ADDED: Ability to change color of Widget title in 'style.css'
* ADDED: Limited code to set up out of group matches
* Code clean up, removed extra whitespace in a number of files, replaced deprecated _c tag with _x or _e.

= 3.8.8.1 =
* TEST: Test version to add 'Last 5' function to standings. Only update to this version if you're willing to test.
use this shortcode to test:
[standings league_id=1 template=last5] or
[standings league_id=1 group=A template=last5 logo=true]
(group and logo are optional)

If you test and find that the icons at the end of each line in the standings are moving to a second line it means you don't have enough room on your template for five past results. You can then change to a lesser number in the template, named 'standings-last5.php' in the 'admin/templates' folder. Go to 43:

	<th width="100" class="last5"><?php _e( 'Last 5', 'leaguemanager' ) ?></th>

change the 'Last 5' text to 'Last 3' if you're going to use three past results, or whatever you choose. Then go to line 93:

    $results = get_latest_results($team->id, 5);

Change the '5' at the end to '3' if you want three past results.

The final version will probably have this as a preference option.

= 3.8.8 =
* BUGFIX: add matches in championship mode not working.

= 3.8.7 =
* BUGFIX: various
* ADDED: Shortcode additions for: option of using website link on standings, standings and crosstables by group.
* ADDED: when adding a team from db, bring the stadium info into the form with the rest of the information.

= 3.8.6 =
* BUGFIX: standings

= 3.8.5 =
*** IF YOU'VE DONE ANY MANUAL MODIFICATIONS, DOWNLOAD THIS AND CHECK THAT YOU AREN'T GOING TO LOSE THEM WHEN YOU UPDATE (INSTEAD OF DOING AN AUTO UPDATE). THIS UPDATE TOUCHES A NUMBER OF FILES (17). IF YOU HAVE QUESTIONS BEFORE UPDATING, LEAVE A MESSAGE ON THE SUPPORT FORUM ON WORDPRESS.ORG. A LIST OF ALL FILES UPDATED IS LISTED IN A POST THERE. ***

http://wordpress.org/support/topic/leaguemanager-385-changes-info

* CHANGED: 'championchip' to 'championship' throughout the plugin
* BUGFIX: fixed missing '>' in core.php that was causing white screen after adding or editing matches.
* BUGFIX: fixed date format in widget.php so date shows.

= 3.8.4 =
* BUGFIX: export function

= 3.8.3 =
* BUGFIX: export function

= 3.8.2 =
* BUGFIX: Undefined function in leaguemanager.php upon export

= 3.8.1 =
* BUGFIX: Fixed security vulnerability of SQL Injection. Added security check current_user_can('manage_leagues') and cast $_POST['league_id'] as (int)

= 3.8 =
* BUGFIX: Fixed reported XSS Vulnerabilities

= 3.7 =
* BUGFIX: decimals for add points field

= 3.6.9 =
* BUGFIX: upgrade process

= 3.6.8 =
* BUGFIX: Language
* BUGFIX: Team names with ' or similar

= 3.6.7 =
* BUGFIX: upgrade

= 3.6.6 =
* BUGFIX: changed DATEDIFF to TIMEDIFF in lib/widget.php
* BUGFIX: season update. also update teams and matches

= 3.6.5 =
* NEW: allow half points in match scores
* CHANGED: score after penalty is calculated by the plugin as "penalty score + overtime score"

= 3.6.4 =
* NEW: user defined point rule with win/loose overtime points. only works with certain sport types
* BUGFIX: team ranking for pool first by points
* BUGFIX: javascript problems

= 3.6.3 =
* CHANGED: change database field for team points to float to support half points
* BUGFIX: user defined point rule

= 3.6.2 =
* NEW: Score Point-Rule. Teams get one point according to the game score
* BUGFIX: only load javascript files on leaguemanager pages to avoid malfunction of WP image editor
* BUGFIX: Widget option

= 3.6.1 =
* NEW: don't remove logo if other teams are using the same one
* CHANGED: sort teams in alphabetical order in match list on frontend
* BUGFIX: problem of displaying matches on same date
* BUGFIX: drag & drop sorting of teams

= 3.6 =
* NEW: documentation
* NEW: add stadium for teams and automatically add location for matches when choosing team
* NEW: Arabian translation
* CHANGED: add 15 matches at once independent of team number
* BUGFIX: Link to match report in widget
* BUGFIX: Championship advancement to finals
* UPDATED: French translation

= 3.5.6 =
* NEW: limit number of matches in shortcode [matches] with limit=X

= 3.5.5 =
* CHANGED: use first group if none is selected to add matches in championship preliminary rounds

= 3.5.4 =
* BUGFIX: stripslashes for team name to allow ' and "

= 3.5.3 =
* UPDATED: swedish translation

= 3.5.2 =
* BUGFIX: last match on single team page was not correct

= 3.5.1 =
* NEW: css class "relegation" for teams that need to go into relegation
* NEW: settings for number of teams that ascend, descend or need to go into relegation
* NEW: set background colors for teams that ascend, descend or need to go into relegation
* BUGFIX: row colors for ascending/descending teams

= 3.5 =
* NEW: cut down standings to home teams with surrounding teams. Attribute home=X where X is an integer controlling the number of surrounding teams up and down
* BUGFIX: teams tied only when they have same points, point difference and goals
* BUGFIX: championship mode
* NEW: css class "ascend" and "descend" for first and last two teams. class "homeTeam" for home team row. Table rows (tr)
* CHANGED: ranking of teams in soccer by points, goal difference and shot goals

= 3.4.2 =
* BUGFIX: crosstable popup
* BUGFIX: improved time attribute for matches shortcode
* BUGFIX: crosstable with home and away match

= 3.4.1 =
* BUGFIX: team website in next match box of widget
* BUGFIX: get matches of current match day in matches shortcode

= 3.4 =
* NEW: shortcode attribute 'match_day' for matches
* NEW: shortcode attribute 'group' for matches
* NEW: shortcode attribute 'time' ("prev" or "next") for matches to display upcoming or past matches
* NEW: shortcode attribute 'group' for standings
* BUGFIX: widget AJAX match navigation
* BUGFIX: scores with 0 possible in Rugby

= 3.4-RC3 =
* NEW: template tags for next and previous match boxes of widget
* UPDATED: template tag for single team to display individual team member information
* BUGFIX: match scrambling
* BUGFIX: ranking in soccer
* BUGFIX: plus/minus points affects ranking (reload of page necessary)
* BUGFIX: widget prev match does not show latest match

= 3.4-RC2 =
* NEW: improved administration of championship
* NEW: template tag for championship
* NEW: updated championship template and archive template
* NEW: display team roster if present on team info page (requires ProjectManager 2.8+)
* CHANGED: Widget design upgrade
* CHANGED: single match template layout
* CHANGED: updated template tags


* NEW: group teams and individual ranking in groups
* NEW: full championship mode
* NEW: mach with unspecific date N/A
* NEW: Widget with 2.8 API

= 3.3.1 =
* BUGFIX: empty query when adding League
* BUGFIX: 0-0 score if game not played changed to -:-

= 3.3 =
* NEW: double matches for tennis with individual standings

= 3.2.2 =
* BUGIFX: parse error

= 3.2.1 =
* BUGFIX: no default value for longtext fields

= 3.2 =
* NEW: options to display played, won, tie and lost games in standings table
* BUGIFX: Tennis scoring

= 3.2-RC1 =
* NEW: Tennis, Rugby and Volleyball Rules and Scoring
* NEW: set logo upload directory
* NEW: set default start time for matches
* BUGFIX: chmod of logos

= 3.1.9 =
* BUGFIX: spacer between teams in widget

= 3.1.8 =
* BUGFIX: widget match JQuery Navigation

= 3.1.7 =
* I hate bugfixing

= 3.1.6 =
* BUGFIX: team logos

= 3.1.5 =
* BUGFIX: fixed permission for upload directory

= 3.1.4 =
* BUGFIX: match stats and results saving data loss (IMPORTANT)

= 3.1.3 =
* BUGFIX: add teams from previous season with season as string
* BUGIFIX: export matches
* BUGFIX: create new thumbnails upon upgrade

= 3.1.2 =
* BUGFIX: load Thickbox stylesheet
* BUGFIX: edit of match day
* BUGFIX: created new thumbnail

= 3.1.1 =
* NEW: add Logo from url (for WPMU)
* BUGFIX: call-time pass-by-reference deprecated
* BUGFIX: match import

= 3.1 =
* NEW: supercool dynamic match statistics
* NEW: edit season
* BUGFIX: match days in frontend

= 3.0.4 =
* CHANGED: moved AJAX functions to own class
* BUGFIX: shortcode display with season as string, e.g. 08/09
* BUGFIX: Team Roster

= 3.0.3 =
* BUGFIX: archive template
* BUGFIX: leaguemanager_matches function
* BUGFIX: team display in matches template

= 3.0.2 =
* CHANGED: static function for display

= 3.0.1 =
* BUGIFX: database table creation

= 3.0 =
* NEW: Team Roster for each team if ProjectManager is installed
* NEW: Basic support for racing
* NEW: standings actions in Frontend templates
* CHANGED: restructured settings in one database longtext field
* BUGFIX: crosstable score

= 2.9.3 =
* BUGFIX: match days in matches shortcode

= 2.9.2 =
* NEW: upgrade page to set seasons for teams and matches
* BUGFIX: Add old teams upon adding of new season
* BUGFIX: match edit
* BUGFIX: matches display shortcode

= 2.9.1 =
* NEW: added games behind for baseball
* NEW: TinyMCE Button for Teamlist and Team page
* NEW: AJAX adding team from database
* BUGFIX: display of goals, ap etc.
* BUGFIX: added hidden fields to team edit page where necessary to avoid loss of data
* BUGFIX: unsetting of widget options if deleted
* BUGFIX: TinyMCE Button

= 2.9 =
* NEW: modular setup of plugin
* NEW: actions and filters for specific sport types
* NEW: shortcodes to display list of teams and team info
* NEW: three drop-down menus for leagues, seasons and matches on post page
* NEW: track status of team ranking compared to last standing
* NEW: several new sports
* NEW: Match Statistics with Team Roster from ProjectManager
* CHANGED: changed shortcodes, deleted convert function

= 2.9-RC2 =
* BUGFIX: adding matches with seasons like 2008/2009

= 2.9-RC1 =
* NEW: seasons support
* NEW: League Archive and single match view

= 2.8 =
* NEW: add Team data from database
* NEW: Option to insert standings manually on admin page
* NEW: import and export of teams/matches (experimental)
* NEW: option to manually save standings in admin panel
* NEW: manually rank teams via drag & drop if needed
* NEW: field to add/subtract points (useful, e.g. for Rugby)
* NEW: option to show/hide logos in match widget
* BUGFIX: display of next match in widget
* BUGFIX: no update of diff if saving standings manually
* CHANGED: Update logo name in database if image already exists on server
* CHANGED: included updated dutch translation
* CHANGED: added some descriptions to translation

= 2.7.1 =
* BUGFIX: plugin installation missed `coach` field for teams

= 2.7 =
* NEW: predefined point rules
* NEW: support for Hockey and Basketball leagues to insert points of thirds and quarters respectively
* NEW: set point format
* NEW: short documentation on league types and point rules
* NEW: add website and coach for each team
* NEW: remove logo directory upon plugin uninstallation
* NEW: global option to set language file
* NEW: add separate results for overtime and penalty
* NEW: template system
* BUGFIX: Logo upload and thumbnail creation
* BUGFIX: upgrade
* CHANGED: New Widget with jQuery Sliding of matches
* CHANGED: simplified frontend templates

= 2.6.3 =
* BUGFIX: database upgrade

= 2.6.2 =
* BUGFIX: database upgrade

= 2.6.1 =
* BUGFIX: TinyMCE Button
* BUGFIG: PHP4 compatibility
* CHANGED: don't show match day drop-down if number of match days is 0
* CHANGED: warning message if number of match days is 0

= 2.6 =
* NEW: nicer upgrade method
* NEW: enter halftime results for ballgame leagues
* NEW: meta box on post writing screen to write match reports
* NEW: insert standings manually with simple constant switch
* NEW: templates for each shortcode to make customization easy
* CHANGED: major restructuring of plugin structure
* CHANGED: using shortcodes from Wordpress API
* CHANGED: new icon for menu and TinyMCE Button

= 2.5.2 =
* BUGFIX: match display in widget

= 2.5.1 =
* NEW: separate Date and Time Format for widget
* NEW: display of match start time in widget

= 2.5 =
* NEW: weekly based match ordering
* NEW: bulk editing of weekly matches
* NEW: date based grouping of matches in widget
* BUGFIX: crosstable popup
* CHANGED: css styling
* CHANGED: moved logo directory to wp-content/uploads
* REMOVED: match display of specific dates

= 2.4.1 =
* BUGFIX: database bug

= 2.4 =
* NEW: logo support
* NEW: change color scheme for frontend tables via admin interface
* NEW: display of matches for specific dates
* NEW: dividers in standings table

= 2.3.1 =
* BUGFIX: database collation

= 2.3 =
* NEW: optional display of crosstable in popup window

= 2.2 =
* NEW: implemented crosstable for easy overview of all match results
* NEW: TinyMCE Button
* BUGFIX: secondary ranking of teams by goal difference if not gymnastics league
* CHANGED: css styling

= 2.1 =
* NEW: adding of up to 15 matches simultaneously for one date
* NEW: using date and time formats from Wordpress settings
* BUGFIX: results determination if score was 0:0

= 2.0 =
* NEW: automatic point calculation
* REMOVED: dynamic table columns

= 1.5 =
* NEW: design standings table display in widget

= 1.4.2 =
* BUGFIX: check_admin_referer for WP 2.3.x

= 1.4.1 =
* BUGFIX: saving of standings table

= 1.4 =
* NEW: wp_nonce_field for higher security
* NEW: separate capability to control access
* BUGFIX: some minor bugfixes

= 1.3 =
* NEW: activation/deactivation switch
* NEW: widget for every active league
* NEW: use of short title for widget

= 1.2.2 =
* BUGFIX: Javascript for adding table columns

= 1.2.1 =
* BUGFIX: database creation

= 1.2 =
* BUGFIX: teams sorting in widget
* CHANGED: load javascript only on Leaguemanager admin pages
* CHANGED: remodeling of the plugin structure

= 1.1 =
* NEW: deletion of multiple leagues, teams or competitions
* NEW: display widget statically
* NEW: uninstallation method
* BUGFIX: table structure settings and deleting leagues, teams or competitions

= 1.0 =
* initial release
