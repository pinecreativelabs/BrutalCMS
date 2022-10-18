<?php
	session_start();
	if(isset($_POST['edit'])){
		$days = simplexml_load_file('data/days.xml');
		foreach($days->day as $day){
			if($day['id'] == $_POST['id']){
				$day['ddate'] = $_POST['date'];
				$day['title'] = $_POST['title'];
				$day->content = $_POST['content'];
				$day->url = $_POST['link'];
				$day->linktext = $_POST['linktext'];
				$day->url['target'] = $_POST['target'];
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
		file_put_contents('data/days.xml', $days->asXML());
		$_SESSION['message'] = 'Weekdays updated successfully';
		header('location: page_edit_days.php');
	}
	else{
		$_SESSION['message'] = 'Select weekday to edit';
		header('location: page_edit_days.php');
	}

?>