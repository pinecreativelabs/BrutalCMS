<?php 
$trackdatapath = 'data/tracking.csv';
$row = 0;
if (($handletrkr = fopen($trackdatapath, "r")) !== FALSE) {
	while (($pdata = fgetcsv($handletrkr, 1000, ",")) !== FALSE) {
		$row++;
		$get_track = $pdata[0];
		$get_tc_position = $pdata[1];
	}
	fclose($handletrkr);
}	
$tracking = $get_track;
$tc_position = $get_tc_position;

/*
echo '<p>tracking mode: '.$tracking.'<br />Position: '.$tc_position.'</p>';

if($tracking=='ga'){include 'tracking/ga.php';}
elseif($tracking=='tp'){include 'tracking/tp.php';}
elseif($tracking=='all'){include 'tracking/ga.php'; include 'tracking/tp.php';}
else{}
*/
?>