<?php session_start();
	$ugid = $_GET['id'];
	$ugroups = simplexml_load_file('data/ugroups.xml');
	$index = 0;
	$i = 0;
	foreach($ugroups->ugroup as $ugroup){
		if($ugroup['id'] == $ugid){
			$index = $i;
			break;
		} $i++;
	}
	unset($ugroups->ugroup[$index]);
	file_put_contents('data/ugroups.xml', $ugroups->asXML());
	$_SESSION['message'] = 'User group deleted';
	header('location: page_user_groups.php');
?>