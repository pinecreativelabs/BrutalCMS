<?php
function clean_text($string){
	$string = trim($string);
	$string = stripslashes($string);
	$string = htmlspecialchars($string);
	return $string;
}
	$mmode= $_POST['mmode'];
	$mmtext = clean_text($_POST['mmtext']);
	$cfile = fopen('data/mmode.csv', 'w+');
	$fdata = array('mmode'=>$mmode,'mmtext'=>$mmtext);
	$saved = fputcsv($cfile, $fdata);
	fclose($cfile);
	if($saved){ echo "<p class=\"padded success courier bold flow-text\">Maintenance Mode updated.</p>";}
	else{echo "<p class=\"padded alert courier bold flow-text\">Failed to save data!</p>";}
?>