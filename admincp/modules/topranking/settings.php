<?php
/**
 * Top Ranking
 * https://webenginecms.org/
 * 
 * @version 1.1.0
 * @author Lautaro Angelico <http://lautaroangelico.com/>
 * @copyright (c) 2013-2019 Lautaro Angelico, All Rights Reserved
 * @build w641ba01901cb0925ec50f543e59acbd
 */

function saveChanges() {
    global $_POST;
	
    $xmlPath = __PATH_TOPRANKING_ROOT__.'config.xml';
    $xml = simplexml_load_file($xmlPath);
	
	if(!is_writable($xmlPath)) throw new Exception('The configuration file is not writable.');
	
	if(!Validator::UnsignedNumber($_POST['setting_1'])) throw new Exception('Submitted setting is not valid (results_limit)');
	$xml->results_limit = $_POST['setting_1'];
	
	if(!Validator::UnsignedNumber($_POST['setting_2'])) throw new Exception('Submitted setting is not valid (resets_based)');
	if(!in_array($_POST['setting_2'], array(1, 0))) throw new Exception('Submitted setting is not valid (resets_based)');
	$xml->resets_based = $_POST['setting_2'];
	
	if(!check_value($_POST['setting_3'])) throw new Exception('Submitted setting is not valid (class_avatar_dir)');
	$xml->class_avatar_dir = $_POST['setting_3'];
	
	if(!Validator::UnsignedNumber($_POST['setting_8'])) throw new Exception('Submitted setting is not valid (class_avatar_size)');
	$xml->class_avatar_size = $_POST['setting_8'];
	
	if(!Validator::UnsignedNumber($_POST['setting_9'])) throw new Exception('Submitted setting is not valid (gens_image_size)');
	$xml->gens_image_size = $_POST['setting_9'];
	
	if(!Validator::UnsignedNumber($_POST['setting_10'])) throw new Exception('Submitted setting is not valid (show_class)');
	if(!in_array($_POST['setting_10'], array(1, 0))) throw new Exception('Submitted setting is not valid (show_class)');
	$xml->show_class = $_POST['setting_10'];
	
	if(!Validator::UnsignedNumber($_POST['setting_11'])) throw new Exception('Submitted setting is not valid (show_kills)');
	if(!in_array($_POST['setting_11'], array(1, 0))) throw new Exception('Submitted setting is not valid (show_kills)');
	$xml->show_kills = $_POST['setting_11'];
	
	if(!Validator::UnsignedNumber($_POST['setting_12'])) throw new Exception('Submitted setting is not valid (show_duels)');
	if(!in_array($_POST['setting_12'], array(1, 0))) throw new Exception('Submitted setting is not valid (show_duels)');
	$xml->show_duels = $_POST['setting_12'];
	
	if(!Validator::UnsignedNumber($_POST['setting_13'])) throw new Exception('Submitted setting is not valid (show_gens)');
	if(!in_array($_POST['setting_13'], array(1, 0))) throw new Exception('Submitted setting is not valid (show_gens)');
	$xml->show_gens = $_POST['setting_13'];
	
	if(!Validator::UnsignedNumber($_POST['setting_14'])) throw new Exception('Submitted setting is not valid (show_guild)');
	if(!in_array($_POST['setting_14'], array(1, 0))) throw new Exception('Submitted setting is not valid (show_guild)');
	$xml->show_guild = $_POST['setting_14'];
	
	if(!Validator::UnsignedNumber($_POST['setting_15'])) throw new Exception('Submitted setting is not valid (show_online)');
	if(!in_array($_POST['setting_15'], array(1, 0))) throw new Exception('Submitted setting is not valid (show_online)');
	$xml->show_online = $_POST['setting_15'];
	
	if(!Validator::UnsignedNumber($_POST['setting_16'])) throw new Exception('Submitted setting is not valid (live_ranking)');
	if(!in_array($_POST['setting_16'], array(1, 0))) throw new Exception('Submitted setting is not valid (live_ranking)');
	$xml->live_ranking = $_POST['setting_16'];
	
	$xml->excluded_players = $_POST['setting_17'];
	
	if(!Validator::UnsignedNumber($_POST['setting_18'])) throw new Exception('Submitted setting is not valid (show_resets)');
	if(!in_array($_POST['setting_18'], array(1, 0))) throw new Exception('Submitted setting is not valid (show_resets)');
	$xml->show_resets = $_POST['setting_18'];
	
    $save = @$xml->asXML($xmlPath);
	if(!$save) throw new Exception('There has been an error while saving changes.');
}

if(check_value($_POST['submit_changes'])) {
	try {
		
		saveChanges();
		message('success', 'Settings successfully saved.');
		
	} catch (Exception $ex) {
		message('error', $ex->getMessage());
	}
}


// load configs
$pluginConfig = simplexml_load_file(__PATH_TOPRANKING_ROOT__.'config.xml');
if(!$pluginConfig) throw new Exception('Error loading config file.');

?>
<h2>Top Ranking Settings</h2>

<h4>Ranking Home</h4>
<p><?php echo '<a href="'.__TOPRANKING_HOME__.'" target="_blank">'.__TOPRANKING_HOME__.'</a>'; ?></p>
<form action="" method="post">

	<table class="table table-striped table-bordered table-hover module_config_tables">
        <tr>
            <th>Results Limit<br/><span>Number of players to show in the ranking.</span></th>
            <td>
				<input class="form-control" type="text" name="setting_1" value="<?php echo $pluginConfig->results_limit; ?>"/>
            </td>
        </tr>
        <tr>
            <th>Resets Based Ranking<br/><span>Enable this option if you would like the player resets to be the main value used to order the ranking results.</span></th>
            <td>
				<?php enabledisableCheckboxes('setting_2', $pluginConfig->resets_based, 'Enabled', 'Disabled'); ?>
            </td>
        </tr>
        <tr>
            <th>Player Class Avatars Image Directory<br/><span>Player class avatars images directory (template)</span></th>
            <td>
				<input class="form-control" type="text" name="setting_3" value="<?php echo $pluginConfig->class_avatar_dir; ?>"/>
            </td>
        </tr>
        <tr>
            <th>Class Avatar Height<br/><span></span></th>
            <td>
				<div class="input-group">
					<input class="form-control" type="text" name="setting_8" value="<?php echo $pluginConfig->class_avatar_size; ?>"/>
					<div class="input-group-addon">px</div>
				</div>
            </td>
        </tr>
        <tr>
            <th>Gens Image Height<br/><span></span></th>
            <td>
				<div class="input-group">
					<input class="form-control" type="text" name="setting_9" value="<?php echo $pluginConfig->gens_image_size; ?>"/>
					<div class="input-group-addon">px</div>
				</div>
            </td>
        </tr>
        <tr>
            <th>Show Player Resets<br/><span></span></th>
            <td>
				<?php enabledisableCheckboxes('setting_18', $pluginConfig->show_resets, 'Enabled', 'Disabled'); ?>
            </td>
        </tr>
        <tr>
            <th>Show Player Class<br/><span></span></th>
            <td>
				<?php enabledisableCheckboxes('setting_10', $pluginConfig->show_class, 'Enabled', 'Disabled'); ?>
            </td>
        </tr>
        <tr>
            <th>Show Player Kills<br/><span></span></th>
            <td>
				<?php enabledisableCheckboxes('setting_11', $pluginConfig->show_kills, 'Enabled', 'Disabled'); ?>
            </td>
        </tr>
        <tr>
            <th>Show Player Duels<br/><span></span></th>
            <td>
				<?php enabledisableCheckboxes('setting_12', $pluginConfig->show_duels, 'Enabled', 'Disabled'); ?>
            </td>
        </tr>
        <tr>
            <th>Show Player Gens<br/><span></span></th>
            <td>
				<?php enabledisableCheckboxes('setting_13', $pluginConfig->show_gens, 'Enabled', 'Disabled'); ?>
            </td>
        </tr>
        <tr>
            <th>Show Player Guild<br/><span></span></th>
            <td>
				<?php enabledisableCheckboxes('setting_14', $pluginConfig->show_guild, 'Enabled', 'Disabled'); ?>
            </td>
        </tr>
        <tr>
            <th>Show Player Online Status<br/><span></span></th>
            <td>
				<?php enabledisableCheckboxes('setting_15', $pluginConfig->show_online, 'Enabled', 'Disabled'); ?>
            </td>
        </tr>
        <tr>
            <th>Enable Live Ranking Data<br/><span>If enabled, cache will not be used and ranking data will be loaded directly from the database on each request.</span></th>
            <td>
				<?php enabledisableCheckboxes('setting_16', $pluginConfig->live_ranking, 'Enabled', 'Disabled'); ?>
            </td>
        </tr>
        <tr>
            <th>Excluded Players<br/><span>Separated by comma.<br /><br />Example:<br />player1,player2,player3</span></th>
            <td>
				<input class="form-control" type="text" name="setting_17" value="<?php echo $pluginConfig->excluded_players; ?>"/>
            </td>
        </tr>
		
		<tr>
            <td colspan="2"><input type="submit" name="submit_changes" value="Save Changes" class="btn btn-success"/></td>
        </tr>
    </table>
</form>