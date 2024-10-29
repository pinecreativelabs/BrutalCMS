<?php
function clean_text($string){
	$string = trim($string);
	$string = stripslashes($string);
	$string = htmlspecialchars($string);
	return $string;
}
	$tid = $_POST['tid'];
	$topic = clean_text($_POST['topic']);

	$cfile = fopen('data/topics.csv', 'a+');
	$fdata = array('tid'=>$tid,'topic'=>$topic);
	$saved = fputcsv($cfile, $fdata);
	fclose($cfile);
	if($saved){ echo "<p class=\"padded success courier bold flow-text\">Topic added</p>";}
	else{echo "<p class=\"padded alert courier bold flow-text\">Failed to add topic</p>";}
?>