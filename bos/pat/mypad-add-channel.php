<?php require_once('pad/module/common.php');
checkUser();
$savetouser = $_SESSION['userName'];
$savetouserpath = 'users/'.$savetouser.'/data/channels.csv';
/* save MY PAD data to user profile data file */
function clean_text($string){
	$string = trim($string);
	$string = stripslashes($string);
	$string = htmlspecialchars($string);
	return $string;
}

	$cid = $_POST['cid'];
	$channel_title = clean_text($_POST['channel_title']);
	$channel_desc = clean_text($_POST['channel_desc']);

	$cfile = fopen($savetouserpath, 'a+');
	$fdata = array('cid'=>$cid,'channel_title'=>$channel_title,'channel_desc'=>$channel_desc);
	$saved = fputcsv($cfile, $fdata);
	fclose($cfile);
	if($saved){ echo "<p class=\"padded success courier bold flow-text\">Channel added.</p>";}
	else{echo "<p class=\"padded alert courier bold flow-text\">Failed to add new channel.</p>";}

/*
echo $savetouser.'<br />';
echo 'data will save to: <strong>'.$savetouserpath.'</strong>';
*/
?>