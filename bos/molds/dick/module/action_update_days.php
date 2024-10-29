<?php session_start();
	if(isset($_POST['edit'])){
		$days = simplexml_load_file('data/days.xml');
		foreach($days->day as $day){
			if($day['id'] == $_POST['id']){
				if(!empty($_POST['ddate'])){$day['ddate'] = $_POST['ddate'];}else{
					// auto-add 7 days to current date if not set
					$futuredate = date('Y-m-d', strtotime('+7 days', time()));
					$day['ddate'] = $futuredate;
				}
				if($_POST['title']!=''){ $day['title'] = $_POST['title']; } else {$day['title'] = 'Untitled';}
				if(isset($_POST['active'])){$day['active'] = $_POST['active'];}else{$day['active']='false';}
				$day['td'] = $_POST['title_display'];
				
				$day->url = trim($_POST['link']);
				$day->url['target'] = $_POST['target'];
				$day->url['linktext'] = $_POST['linktext'];
				
				$day->media = trim($_POST['murl']);
				$day->media['type'] = $_POST['mtype'];
				$day->media['vidtype'] = $_POST['vidtype'];
				
				$day->media['vvid'] = trim($_POST['vvid']);
				$day->media['ytvid'] = trim($_POST['ytvid']);
				$day->media['dmvid'] = trim($_POST['dmvid']);
				$day->media['bcvid'] = trim($_POST['bcvid']);
				
				$day->design = trim($_POST['cover']);
				$day->design['template'] = $_POST['template'];
				$day->design['skin'] = $_POST['skin'];
				$day->design['pcolor'] = $_POST['pcolor'];
				$day->design['scolor'] = $_POST['scolor'];
				$day->design['tcolor'] = $_POST['tcolor'];
				$day->design['acolor'] = $_POST['acolor'];
				$day->design['ocolor'] = $_POST['ocolor'];
				
				$cdfpath = $_POST['cdpath'];
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
		file_put_contents('data/days.xml', $days->asXML());
		$_SESSION['message'] = '<p class="padded b-s-t">&#10004; Day updated successfully</p>';
		header('location: page_edit_days.php');
	} else{
		$_SESSION['message'] = '<p class="padded b-s-t" style="color: #ff0000;">Select a day to edit</p>';
		header('location: page_edit_days.php');
	}
?>