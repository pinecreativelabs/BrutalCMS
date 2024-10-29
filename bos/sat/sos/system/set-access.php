<?php
	$registration = $_POST['registration'];
	$set_group = $_POST['set_group'];
	$req_login = $_POST['req_login'];
	$age_restrict = $_POST['age_restrict'];
	$age = $_POST['age'];
	$pglock = $_POST['pglock'];
	$cfile = fopen('data/access.csv', 'w+');
	$fdata = array('registration'=>$registration,'set_group'=>$set_group,'req_login'=>$req_login,'age_restrict'=>$age_restrict,'age'=>$age,'pglock'=>$pglock);
	$saved = fputcsv($cfile, $fdata);
	fclose($cfile);
	if($saved){ echo "<p class=\"padded success courier bold flow-text\">Data saved</p>";}
	else{echo "<p class=\"padded alert courier bold flow-text\">Failed to save data</p>";}
?>