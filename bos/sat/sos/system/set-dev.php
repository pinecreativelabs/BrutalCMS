<?php
	$dmode= $_POST['dmode'];
	$set_jq= $_POST['set_jq'];
	$jqver= $_POST['jqver'];
	$icon_lib= $_POST['icon_lib'];
	$cfile = fopen('data/dev.csv', 'w+');
	$fdata = array('dmode'=>$dmode,'set_jq'=>$set_jq,'jqver'=>$jqver,'icon_lib'=>$icon_lib);
	$saved = fputcsv($cfile, $fdata);
	fclose($cfile);
	if($saved){ echo "<p class=\"padded success courier bold flow-text\">Data saved</p>";}
	else{echo "<p class=\"padded alert courier bold flow-text\">Failed to save data</p>";}
?>