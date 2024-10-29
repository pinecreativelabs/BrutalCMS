<?php session_start();
	$id = $_GET['id'];
	$boards = simplexml_load_file('data/boards.xml');
	$index = 0;
	$i = 0;
	foreach($boards->board as $board){
		if($board['id'] == $id){
			$index = $i;
			break;
		} $i++;
	}
	unset($boards->board[$index]);
	file_put_contents('data/boards.xml', $boards->asXML());
	$_SESSION['message'] = '<p class="padded b-s-t">&#10004; Board deleted</p>';
	header('location: page_edit_boards.php');
?>