<?php
function clean_text($string){
	$string = trim($string);
	$string = stripslashes($string);
	$string = htmlspecialchars($string);
	return $string;
}
	$errmode = $_POST['errmode'];
	$error403 = clean_text($_POST['error403']);
	$error404 = clean_text($_POST['error404']);
	$error405 = clean_text($_POST['error405']);
	$error408 = clean_text($_POST['error408']);
	$error500 = clean_text($_POST['error500']);
	$error502 = clean_text($_POST['error502']);
	$error504 = clean_text($_POST['error504']);
	$cfile = fopen('data/errors.csv', 'w+');
	$fdata = array('errmode'=>$errmode,'error403'=>$error403,'error404'=>$error404,'error405'=>$error405,'error408'=>$error408,'error500'=>$error500,'error502'=>$error502,'error504'=>$error504);
	$saved = fputcsv($cfile, $fdata);
	fclose($cfile);
	if($saved){ echo "<p class=\"padded success courier bold flow-text\">Data saved</p>";}
	else{echo "<p class=\"padded alert courier bold flow-text\">Failed to save data</p>";}
?>