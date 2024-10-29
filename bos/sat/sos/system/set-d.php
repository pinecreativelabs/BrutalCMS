<?php
function clean_text($string){
	$string = trim($string);
	$string = stripslashes($string);
	$string = htmlspecialchars($string);
	return $string;
}
	$sitename = clean_text($_POST['sitename']);
	$mailto = clean_text($_POST['mailto']);
	$ddf = $_POST['ddf'];
	$dtf = $_POST['dtf'];
	$theme = $_POST['theme'];
	$fam_curl_mode = $_POST['fam_curl_mode'];
	$cfile = fopen('data/defaults.csv', 'w+');
	$fdata = array('sitename'=>$sitename,'mailto'=>$mailto,'ddf'=>$ddf,'dtf'=>$dtf,'theme'=>$theme,'fam_curl_mode'=>$fam_curl_mode);
	$saved = fputcsv($cfile, $fdata);
	fclose($cfile);
	if($saved){ echo "<p class=\"padded success courier bold flow-text\">Default data saved</p>";}
	else{echo "<p class=\"padded alert courier bold flow-text\">Failed to save data</p>";}
?>