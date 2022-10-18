<?php
	$gen_mode = $_POST['gen_mode'];
	$pgs_dir = $_POST['pgs_dir'];
	$pgspermission = $_POST['pgspermission'];
	$inc_metadata = $_POST['inc_metadata'];

	$cfile = fopen('data/config.csv', 'w+');
	$fdata = array('gen_mode'=>$gen_mode,'pgs_dir'=>$pgs_dir,'pgspermission'=>$pgspermission,'inc_metadata'=>$inc_metadata);
	$saved = fputcsv($cfile, $fdata);
	fclose($cfile);
	if($saved){ echo "<p class=\"padded success courier bold flow-text\">PAGES configuration updated.</p>";}
	else{echo "<p class=\"padded alert courier bold flow-text\">Failed to save data</p>";}
?>