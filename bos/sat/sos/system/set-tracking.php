<?php
	$tracking = $_POST['tracking'];
	$tc_position = $_POST['tc_position'];
	$cfile = fopen('data/tracking.csv', 'w+');
	$fdata = array('tracking'=>$tracking,'tc_position'=>$tc_position);
	$saved = fputcsv($cfile, $fdata);
	fclose($cfile);
	if($saved){ echo "<p class=\"padded success courier bold flow-text\">Tracking Code data saved.</p>";}
	else{echo "<p class=\"padded alert courier bold flow-text\">Failed to save data!</p>";}
?>