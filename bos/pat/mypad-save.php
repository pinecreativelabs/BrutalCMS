<?php require_once('pad/module/common.php');
checkUser();
$savetouser = $_SESSION['userName'];
$savetouserpath = 'users/'.$savetouser.'/data/profile.csv';
/* save MY PAD data to user profile data file */
function clean_text($string){
	$string = trim($string);
	$string = stripslashes($string);
	$string = htmlspecialchars($string);
	return $string;
}

	$up_visibility = clean_text($_POST['up_visibility']);
	$up_status = clean_text($_POST['up_status']);
	$up_fname = clean_text($_POST['up_fname']);
	$up_lname = clean_text($_POST['up_lname']);
	$up_sex = clean_text($_POST['up_sex']);
	$up_bday = clean_text($_POST['up_bday']);
	$up_email = clean_text($_POST['up_email']);
	$up_phone = clean_text($_POST['up_phone']);
	$up_url = clean_text($_POST['up_url']);
	$up_bio = clean_text($_POST['up_bio']);

	$cfile = fopen($savetouserpath, 'w+');
	$fdata = array('up_visibility'=>$up_visibility,'up_status'=>$up_status,'up_fname'=>$up_fname,'up_lname'=>$up_lname,'up_sex'=>$up_sex,'up_bday'=>$up_bday,'up_email'=>$up_email,'up_phone'=>$up_phone,'up_url'=>$up_url,'up_bio'=>$up_bio);
	$saved = fputcsv($cfile, $fdata);
	fclose($cfile);
	if($saved){ echo "<p class=\"padded success courier bold flow-text\">Profile data saved</p>";}
	else{echo "<p class=\"padded alert courier bold flow-text\">Failed to save profile data</p>";}

/*
echo $savetouser.'<br />';
echo 'data will save to: <strong>'.$savetouserpath.'</strong>';
*/
?>