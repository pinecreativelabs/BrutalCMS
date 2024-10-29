<?php
function clean_text($string){
	$string = trim($string);
	$string = stripslashes($string);
	$string = htmlspecialchars($string);
	return $string;
}
	$dick_tz = clean_text($_POST['dick_tz']);
	$dick_template = $_POST['dick_template'];
	$dick_dispmode = $_POST['dick_dispmode'];
	$dick_fbtext = clean_text($_POST['dick_fbtext']);
	$dick_pic = clean_text($_POST['dick_pic']);
	$dick_link = clean_text($_POST['dick_link']);
	$linktext = clean_text($_POST['linktext']);
	$dick_target = $_POST['dick_target'];
	$dm01 = $_POST['dm01'];
	$dm02 = $_POST['dm02'];
	$dm03 = $_POST['dm03'];
	$dm04 = $_POST['dm04'];
	$dm05 = $_POST['dm05'];
	$dm06 = $_POST['dm06'];
	$dm07 = $_POST['dm07'];
	$dm08 = $_POST['dm08'];
	$dm09 = $_POST['dm09'];
	$dm10 = $_POST['dm10'];
	$dm11 = $_POST['dm11'];
	$dm12 = $_POST['dm12'];
	$dick_spring = $_POST['dick_spring'];
	$dick_summer = $_POST['dick_summer'];
	$dick_fall = $_POST['dick_fall'];
	$dick_winter = $_POST['dick_winter'];
	$pcolor = $_POST['pcolor'];
	$scolor = $_POST['scolor'];
	$tcolor = $_POST['tcolor'];
	$cfile = fopen('data/defaults.csv', 'w+');
	$fdata = array('dick_tz'=>$dick_tz,'dick_template'=>$dick_template,'dick_dispmode'=>$dick_dispmode,'dm01'=>$dm01,'dm02'=>$dm02,'dm03'=>$dm03,'dm04'=>$dm04,'dm05'=>$dm05,'dm06'=>$dm06,'dm07'=>$dm07,'dm08'=>$dm08,'dm09'=>$dm09,'dm10'=>$dm10,'dm11'=>$dm11,'dm12'=>$dm12,'dick_spring'=>$dick_spring,'dick_summer'=>$dick_summer,'dick_fall'=>$dick_fall,'dick_winter'=>$dick_winter,'dick_fbtext'=>$dick_fbtext,'dick_pic'=>$dick_pic,'dick_link'=>$dick_link,'linktext'=>$linktext,'dick_target'=>$dick_target,'pcolor'=>$pcolor,'scolor'=>$scolor,'tcolor'=>$tcolor);
	$saved = fputcsv($cfile, $fdata);
	fclose($cfile);
	if($saved){ echo "<p class=\"padded success courier bold flow-text\">Default data saved</p>";}
	else{echo "<p class=\"padded alert courier bold flow-text\">Failed to save data</p>";}
?>