<?php
function clean_text($string){
	$string = trim($string);
	$string = stripslashes($string);
	$string = htmlspecialchars($string);
	return $string;
}
	$cs_redir = $_POST['cs_redir'];
	$cs_template = $_POST['cs_template'];
	$cs_header = clean_text($_POST['cs_header']);
	$cs_text = clean_text($_POST['cs_text']);
	$cfile = fopen('data/comingsoon.csv', 'w+');
	$fdata = array('cs_redir'=>$cs_redir,'cs_template'=>$cs_template,'cs_header'=>$cs_header,'cs_text'=>$cs_text);
	$saved = fputcsv($cfile, $fdata);
	fclose($cfile);
	if($saved){ echo "<p class=\"padded success courier bold flow-text\">Coming Soon data saved.</p>";}
	else{echo "<p class=\"padded alert courier bold flow-text\">Failed to save data!</p>";}
?>