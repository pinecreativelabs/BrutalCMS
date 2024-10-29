<?php session_start();
	$id = $_GET['id'];
	$days = simplexml_load_file('data/days.xml');
	// we're are going to create iterator to assign to each day
	$index = 0;
	$i = 0;
	foreach($days->day as $day){
		if($id==$day['id']){$cdf=$day->content['filepath'];}
		if($day['id'] == $id){
			$cdf=$day->content;
			$index = $i;
			break;
		} $i++;
	}
	unlink($cdf);
	unset($days->day[$index]);
	file_put_contents('data/days.xml', $days->asXML());
	$_SESSION['message'] = '<p class="padded b-s-t">&#10004; Day deleted</p>';
	header('location: page_edit_days.php');
?>