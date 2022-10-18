<?php
	$ccmode= $_POST['ccmode'];
	$ccdur= $_POST['ccdur'];
	$cctextcolor= $_POST['cctextcolor'];
	$ccbgcolor= $_POST['ccbgcolor'];
	$ccbtntextcolor= $_POST['ccbtntextcolor'];
	$ccbtnbgcolor= $_POST['ccbtnbgcolor'];
	$cfile = fopen('data/cc.csv', 'w+');
	$fdata = array('ccmode'=>$ccmode,'ccdur'=>$ccdur,'cctextcolor'=>$cctextcolor,'ccbgcolor'=>$ccbgcolor,'ccbtntextcolor'=>$ccbtntextcolor,'ccbtnbgcolor'=>$ccbtnbgcolor);
	$saved = fputcsv($cfile, $fdata);
	fclose($cfile);
	if($saved){ echo "<p class=\"padded success courier bold flow-text\">Cookie Consent data saved.</p>";}
	else{echo "<p class=\"padded alert courier bold flow-text\">Failed to save data!</p>";}
?>