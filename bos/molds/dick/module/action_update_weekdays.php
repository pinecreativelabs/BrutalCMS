<?php
	session_start();
	if(isset($_POST['edit'])){
		$weekdays = simplexml_load_file('data/weekdays.xml');
		foreach($weekdays->day as $day){
			if($day['id'] == $_POST['id']){
				if($_POST['title']!=''){ $day['title'] = $_POST['title']; } else {$day['title'] = 'Untitled';}
				$day['td'] = $_POST['title_display'];
				if(isset($_POST['active'])){$day['active'] = $_POST['active'];}else{$day['active']='false';}
				
				$day->url = trim($_POST['link']);
				$day->url['target'] = $_POST['target'];
				$day->url['linktext'] = $_POST['linktext'];
				if(!empty($_POST['linktext'])){$day->url['linktext'] = $_POST['linktext'];}else{$day->url['linktext'] = 'Learn More';}
				
				$day->media = trim($_POST['murl']);
				$day->media['type'] = $_POST['mtype'];
				$day->media['vidtype'] = $_POST['vidtype'];
				$day->media['vvid'] = $_POST['vvid'];
				$day->media['ytvid'] = $_POST['ytvid'];
				$day->media['dmvid'] = $_POST['dmvid'];
				$day->media['bcvid'] = $_POST['bcvid'];
				
				$day->design = trim($_POST['cover']);
				$day->design['template'] = $_POST['template'];
				$day->design['skin'] = $_POST['skin'];
				$day->design['pcolor'] = $_POST['pcolor'];
				$day->design['scolor'] = $_POST['scolor'];
				$day->design['tcolor'] = $_POST['tcolor'];
				$day->design['acolor'] = $_POST['acolor'];
				$day->design['ocolor'] = $_POST['ocolor'];
				
				$cdfpath = $_POST['cdfpath'];
				$day->content = $cdfpath;
				$editdaycontent = $_POST['content'];
				
				if(file_exists($cdfpath)){
					$day_content_file = fopen($cdfpath,"w+");
					fwrite($day_content_file, $editdaycontent);
					fclose($day_content_file);
				}else{
					$day_content_file = fopen($cdfpath,"a+");
					fwrite($day_content_file, $editdaycontent);
					fclose($day_content_file);
				}
				break;
			}
		}
		file_put_contents('data/weekdays.xml', $weekdays->asXML());
		$_SESSION['message'] = '<p class="padded b-s-t">&#10004; Day updated successfully</p>';
		header('location: page_edit_weekdays.php');
	} else{
		$_SESSION['message'] = '<p class="padded b-s-t" style="color: #ff0000;">Select a day to edit</p>';
		header('location: page_edit_weekdays.php');
	}
?>