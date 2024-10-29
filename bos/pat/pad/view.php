<?php 
$userdatapath = 'bos/pat/pad/module/data/userlist.csv';
$userlist = '<ul>';
$userlist_details .= '<div class="userlist">';
$row = 0;
$skip_row_number = array("1");
if (($handleusers = fopen($userdatapath, "r")) !== FALSE) {
	while (($pdata = fgetcsv($handleusers, 1000, ",")) !== FALSE) {
		$row++;
		if (in_array($row, $skip_row_number)){continue;} else {
			$uid = $pdata[0];
			$username = $pdata[1];
			$email = $pdata[3];
			$active = $pdata[4];
			$get_group = $pdata[5];
			if($get_group=='1'){$group='Administrator';}elseif($get_group=='2'){$group='Editor';}elseif($get_group=='3'){$group='Member';}else{$group = 'BOS Admin';}
			if($active=='true'){
				$userlist .= '<li>'.$username.'</li>';
			}
			$userlist_details .= '<details><summary>'.$username.'</summary>'.PHP_EOL;
			$userlist_details .= '<p><strong>UID:</strong> '.$uid.'<br />'.PHP_EOL;
			if($active=='true'){
				$userlist_details .= '<strong>Status:</strong> Active<br />'.PHP_EOL;
			} else {$userlist_details .= '<strong>Status:</strong> Inactive<br />'.PHP_EOL;}
			$userlist_details .= '<strong>Group:</strong> '.$group.'<br />'.PHP_EOL.'</p>';
			$userlist_details .= '</details>';
		}
	} fclose($handleusers);
}
$userlist .= '</ul>';
$userlist_details .= '</div>';
?>