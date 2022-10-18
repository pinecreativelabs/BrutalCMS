<?php
	session_start();
	if(isset($_POST['edit'])){
		$weekdays = simplexml_load_file('data/weekdays.xml');
		foreach($weekdays->day as $day){
			if($day->id == $_POST['id']){
				$day->title = $_POST['title'];
				$day->content = $_POST['content'];
				$day->link = $_POST['link'];
				$day->target = $_POST['target'];
				if(!empty($_POST['linktext'])){$day->linktext = $_POST['linktext'];}else{$day->linktext = 'Learn More';}
				$day->dpic = $_POST['dpic'];
				$day->vid = $_POST['vid'];
				$day->vtype = $_POST['vtype'];
				$day->colors['pcolor'] = $_POST['pcolor'];
				$day->colors['scolor'] = $_POST['scolor'];
				$day->colors['tcolor'] = $_POST['tcolor'];
				$day->active = $_POST['active'];
				break;
			}
		}
		file_put_contents('data/weekdays.xml', $weekdays->asXML());
		$_SESSION['message'] = 'Weekdays updated successfully';
		header('location: page_edit_weekdays.php');
	}
	else{
		$_SESSION['message'] = 'Select weekday to edit';
		header('location: page_edit_weekdays.php');
	}

?>