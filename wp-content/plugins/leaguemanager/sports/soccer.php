<?php
/**
 * Soccer Class
 *
 * @author 	Kolja Schleich
 * @package	LeagueManager
 * @copyright 	Copyright 2008-2014
*/
class LeagueManagerSoccer extends LeagueManager
{

	/**
	 * sports key
	 *
	 * @var string
	 */
	var $key = 'soccer';


	/**
	 * load specific settings
	 *
	 * @param none
	 * @return void
	 */
	function __construct()
	{
		add_filter( 'leaguemanager_sports', array(&$this, 'sports') );
		add_filter( 'rank_teams_'.$this->key, array(&$this, 'rankTeams') );
		add_filter( 'team_points2_'.$this->key, array(&$this, 'calculateGoalStatistics') );

		add_filter( 'leaguemanager_export_matches_header_'.$this->key, array(&$this, 'exportMatchesHeader') );
		add_filter( 'leaguemanager_export_matches_data_'.$this->key, array(&$this, 'exportMatchesData'), 10, 2 );
		add_filter( 'leaguemanager_import_matches_'.$this->key, array(&$this, 'importMatches'), 10, 3 );

		add_action( 'matchtable_header_'.$this->key, array(&$this, 'displayMatchesHeader'), 10, 0);
		add_action( 'matchtable_columns_'.$this->key, array(&$this, 'displayMatchesColumns') );
		add_action( 'leaguemanager_standings_header_'.$this->key, array(&$this, 'displayStandingsHeader') );
		add_action( 'leaguemanager_standings_columns_'.$this->key, array(&$this, 'displayStandingsColumns'), 10, 2 );

	}
	function LeagueManagerSoccer()
	{
		$this->__construct();
	}


	/**
	 * add sports to list
	 *
	 * @param array $sports
	 * @return array
	 */
	function sports( $sports )
	{
		$sports[$this->key] = __( 'Soccer', 'leaguemanager' );
		return $sports;
	}


	/**
	 * rank Teams
	 *
	 * @param array $teams
	 * @return array of teams
	 */
	function rankTeams( $teams )
	{
		foreach ( $teams AS $key => $row ) {
			$points[$key] = $row->points['plus']+$row->add_points;
			$diff[$key] = $row->diff;
			$goals[$key] = $row->points2['plus'];
			$done[$key] = $row->done_matches;
		}
		array_multisort( $points, SORT_DESC, $done, SORT_ASC, $diff, SORT_DESC, $goals, SORT_DESC, $teams );
		return $teams;
	}


	/**
	 * extend header for Standings Table
	 *
	 * @param none
	 * @return void
	 */
	function displayStandingsHeader()
	{
		echo '<th class="num">'._x( 'Goals', 'leaguemanager' ).'</th><th style="text-align: center;">'.__( 'Diff', 'leaguemanager').'</th>';
	}


	/**
	 * extend columns for Standings Table
	 *
	 * @param object $team
	 * @param string $rule
	 * @return void
	 */
	function displayStandingsColumns( $team, $rule )
	{
		global $leaguemanager;
		$league = $leaguemanager->getCurrentLeague();

		echo '<td class="num">';
		if ( is_admin() && $rule == 'manual' )
			echo '<input type="text" size="2" name="custom['.$team->id.'][points2][plus]" value="'.$team->points2_plus.'" /> : <input type="text" size="2" name="custom['.$team->id.'][points2][minus]" value="'.$team->points2_minus.'" />';
		else
			printf($league->point_format2, $team->points2_plus, $team->points2_minus);

		echo '</td>';
		echo '<td class="num">'.$team->diff.'</td>';
	}


	/**
	 * display Table Header for Match Administration
	 *
	 * @param none
	 * @return void
	 */
	function displayMatchesHeader()
	{
		echo '<th style="text-align: center;">'.__( 'Halftime', 'leaguemanager' ).'</th><th style="text-align: center;">'.__( 'Overtime', 'leaguemanager' ).'</th><th style="text-align: center;">'.__( 'Penalty', 'leaguemanager' ).'</th>';
	}


	/**
	 * display Table columns for Match Administration
	 *
	 * @param object $match
	 * @return void
	 */
	function displayMatchesColumns( $match )
	{
		$match_id = ( isset($match->id) ? $match->id : '' );
		echo '<td style="text-align: center;"><input class="points" style="text-align: center;" type="text" size="2" id="halftime_plus_'.$match_id.'" name="custom['.$match_id.'][halftime][plus]" value="'. ( isset($match->halftime['plus']) ? $match->halftime['plus'] : 0 ) .'" /> : <input class="points" style="text-align: center;" type="text" size="2" id="halftime_minus_'.$match_id.'" name="custom['.$match_id.'][halftime][minus]" value="'. ( isset($match->halftime['minus']) ? $match->halftime['minus'] : 0 ) .'" /></td>';
		echo '<td style="text-align: center;"><input class="points" style="text-align: center;" type="text" size="2" id="overtime_home_'.$match_id.'" name="custom['.$match_id.'][overtime][home]" value="'. ( isset($match->overtime['home']) ? $match->overtime['home'] : 0 ) .'" /> : <input class="points" style="text-align: center;" type="text" size="2" id="overtime_away_'.$match_id.'" name="custom['.$match_id.'][overtime][away]" value="'. ( isset($match->overtime['away']) ? $match->overtime['away'] : 0 ) .'" /></td>';
		echo '<td style="text-align: center;"><input class="points" style="text-align: center;" type="text" size="2" id="penalty_home_'.$match_id.'" name="custom['.$match_id.'][penalty][home]" value="'. ( isset($match->penalty['home']) ? $match->penalty['home'] : 0 ) .'" /> : <input class="points" style="text-align: center;" type="text" size="2" id="penalty_away_'.$match_id.'" name="custom['.$match_id.'][penalty][away]" value="'. ( isset($match->penalty['away']) ? $match->penalty['away'] : 0 ) .'" /></td>';
	}


	/**
	 * export matches header
	 *
	 * @param string $content
	 * @return the content
	 */
	function exportMatchesHeader( $content )
	{
		$content .= "\t".__( 'Halftime', 'leaguemanager' )."\t".__('Overtime', 'leaguemanager')."\t".__('Penalty', 'leaguemanager');
		return $content;
	}


	/**
	 * export matches data
	 *
	 * @param string $content
	 * @param object $match
	 * @return the content
	 */
	function exportMatchesData( $content, $match )
	{
		if ( isset($match->halftime) )
			$content .= "\t".sprintf("%d-%d", $match->halftime['plus'], $match->halftime['minus'])."\t".sprintf("%d-%d", $match->overtime['home'], $match->overtime['away'])."\t".sprintf("%d-%d", $match->penalty['home'], $match->penalty['away']);
		else
			$content .= "\t\t\t";

		return $content;
	}


	/**
	 * import matches
	 *
	 * @param array $custom
	 * @param array $line elements start at index 8
	 * @param int $match_id
	 * @return array
	 */
	function importMatches( $custom, $line, $match_id )
	{
		$halftime = explode("-", $line[8]);
		$overtime = explode("-", $line[9]);
		$penalty = explode("-", $line[10]);
		$custom[$match_id]['halftime'] = array( 'plus' => $halftime[0], 'minus' => $halftime[1] );
		$custom[$match_id]['overtime'] = array( 'home' => $overtime[0], 'away' => $overtime[1] );
		$custom[$match_id]['penalty'] = array( 'home' => $penalty[0], 'away' => $penalty[1] );

		return $custom;
	}


	/**
	 * calculate goals. Penalty is not counted in statistics
	 *
	 * @param int $team_id
	 * @param string $option
	 * @return int
	 */
	function calculateGoalStatistics( $team_id )
	{
		global $wpdb, $leaguemanager;

		$goals = array( 'plus' => 0, 'minus' => 0 );

		$matches = $wpdb->get_results( "SELECT `home_points`, `away_points`, `custom` FROM {$wpdb->leaguemanager_matches} WHERE `home_team` = '".$team_id."'" );
		if ( $matches ) {
			foreach ( $matches AS $match ) {
				$custom = maybe_unserialize($match->custom);
				if ( !empty($custom['overtime']['home']) && !empty($custom['overtime']['away']) ) {
					$home_goals = $custom['overtime']['home'];
					$away_goals = $custom['overtime']['away'];
				} else {
					$home_goals = $match->home_points;
					$away_goals = $match->away_points;
				}

				$goals['plus'] += $home_goals;
				$goals['minus'] += $away_goals;
			}
		}

		$matches = $wpdb->get_results( "SELECT `home_points`, `away_points`, `custom` FROM {$wpdb->leaguemanager_matches} WHERE `away_team` = '".$team_id."'" );
		if ( $matches ) {
			foreach ( $matches AS $match ) {
				$custom = maybe_unserialize($match->custom);
				if ( !empty($custom['overtime']['home']) && !empty($custom['overtime']['away']) ) {
					$home_goals = $custom['overtime']['home'];
					$away_goals = $custom['overtime']['away'];
				} else {
					$home_goals = $match->home_points;
					$away_goals = $match->away_points;
				}

				$goals['plus'] += $away_goals;
				$goals['minus'] += $home_goals;
			}
		}

		return $goals;
	}
}

$soccer = new LeagueManagerSoccer();
?>
