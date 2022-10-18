<?php session_start();
	$id = $_GET['id'];
	$days = simplexml_load_file('data/days.xml');
	//we're are going to create iterator to assign to each day
	$index = 0;
	$i = 0;

	foreach($days->day as $day){
		if($day['id'] == $id){
			$index = $i;
			break;
		}
		$i++;
	}

	unset($days->day[$index]);
	file_put_contents('data/days.xml', $days->asXML());
	$_SESSION['message'] = 'Day deleted';
	header('location: page_edit_days.php');
?>