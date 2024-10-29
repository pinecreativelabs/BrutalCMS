<?php
function clean_text($string){
	$string = trim($string);
	$string = stripslashes($string);
	$string = htmlspecialchars($string);
	return $string;
}
	$meta_title = clean_text($_POST['meta_title']);
	$meta_desc = clean_text($_POST['meta_desc']);
	$twcard = $_POST['twcard'];
	$tw_handle = clean_text($_POST['tw_handle']);
	$tw_img = clean_text($_POST['tw_img']);
	$ogdata = $_POST['ogdata'];
	$og_img = clean_text($_POST['og_img']);
	$cfile = fopen('data/meta.csv', 'w+');
	$fdata = array('meta_title'=>$meta_title,'meta_desc'=>$meta_desc,'twcard'=>$twcard,'tw_handle'=>$tw_handle,'tw_img'=>$tw_img,'ogdata'=>$ogdata,'og_img'=>$og_img);
	$saved = fputcsv($cfile, $fdata);
	fclose($cfile);
	if($saved){ echo "<p class=\"padded success courier bold flow-text\">Meta data saved</p>";}
	else{echo "<p class=\"padded alert courier bold flow-text\">Failed to save data</p>";}
?>