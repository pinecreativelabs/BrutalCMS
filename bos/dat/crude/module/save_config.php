<?php
	$new_records = $_POST['new_records'];
	$del_records = $_POST['del_records'];
	$read_only = $_POST['read_only'];

	$cfile = fopen('data/config.csv', 'w+');
	$fdata = array('new_records'=>$new_records,'del_records'=>$del_records,'read_only'=>$read_only);
	$saved = fputcsv($cfile, $fdata);
	fclose($cfile);
	if($saved){ echo "<p class=\"padded success courier bold flow-text\">CRUDE configuration updated.</p>";}
	else{echo "<p class=\"padded alert courier bold flow-text\">Failed to save data</p>";}
?>