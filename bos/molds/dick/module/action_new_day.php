<?php
	session_start();
	if(isset($_POST['add'])){
		//open xml file
		$days = simplexml_load_file('data/days.xml');
		if(($_POST['ddate']!='')||(!empty($_POST['ddate']))){$newddate = $_POST['ddate'];} else {$newddate=date('Y-m-d');}
		$newdays=array();
		foreach($days->day as $day){
			if($day['ddate']==$newddate){
				$newdays[] = $day['ddate'];
			}
		}
		if(count($newdays)>=1){$addnewday=false;} else {$addnewday=true;}
		if($addnewday==false){
			$_SESSION['message'] = '<p class="padded b-s-t" style="color: #ff0000;">That day is already set! Try another day.</p>';
			header('location: page_edit_days.php');
		} else {
		
			$day = $days->addChild('day');
			$day->addAttribute('id', $_POST['id']);
			$day->addAttribute('ddate', $newddate);
			if(!empty($_POST['title'])){$day->addAttribute('title', $_POST['title']);} else {$day->addAttribute('title','Untitled');}
			$day->addAttribute('active', $_POST['active']);
			$day->addAttribute('td', $_POST['title_display']);
		
			$url = $day->addChild('url', trim($_POST['link']));
			$url->addAttribute('target', $_POST['target']);
			if(!empty($_POST['linktext'])){$url->addAttribute('linktext', $_POST['linktext']);}else{$url->addAttribute('linktext', 'Learn More');}
		
			$media = $day->addChild('media', trim($_POST['murl']));
			if(isset($_POST['mtype'])){$media->addAttribute('type', $_POST['mtype']);}else{$media->addAttribute('type','image');}
			$media->addAttribute('vidtype', $_POST['vidtype']);
		
			$media->addAttribute('vid', $_POST['vid']);
			if($_POST['vidtype']=='vimeo'){
				$media->addAttribute('bcvid', '');
				$media->addAttribute('dmvid', '');
				$media->addAttribute('vvid', $_POST['vid']);
				$media->addAttribute('ytvid', '');
			}elseif($_POST['vidtype']=='yt'){
				$media->addAttribute('bcvid', '');
				$media->addAttribute('dmvid', '');
				$media->addAttribute('vvid', '');
				$media->addAttribute('ytvid', $_POST['vid']);
			}elseif($_POST['vidtype']=='dm'){
				$media->addAttribute('bcvid', '');
				$media->addAttribute('dmvid', $_POST['vid']);
				$media->addAttribute('vvid', '');
				$media->addAttribute('ytvid', '');
			} elseif($_POST['vidtype']=='bc'){
				$media->addAttribute('bcvid', $_POST['vid']);
				$media->addAttribute('dmvid', '');
				$media->addAttribute('vvid', '');
				$media->addAttribute('ytvid', '');
			} else {
				$media->addAttribute('bcvid', '');
				$media->addAttribute('dmvid', '');
				$media->addAttribute('vvid', '');
				$media->addAttribute('ytvid', $_POST['vid']);
			}
			$design = $day->addChild('design',trim($_POST['cover']));
			$design->addAttribute('template', $_POST['template']);
			$design->addAttribute('skin', $_POST['skin']);
			$design->addAttribute('pcolor', $_POST['pcolor']);
			$design->addAttribute('scolor', $_POST['scolor']);
			$design->addAttribute('tcolor', $_POST['tcolor']);
			$design->addAttribute('acolor', $_POST['acolor']);
			$design->addAttribute('ocolor', $_POST['ocolor']);
			
			$newdaycontent = $_POST['content'];
			$new_day_content_filepath = $_POST['cdpath'].$_POST['id'].'.txt';
			$new_day_content_file = fopen($new_day_content_filepath,"a+");
			fwrite($new_day_content_file, $newdaycontent);
			fclose($new_day_content_file);
			$content = $day->addChild('content', $new_day_content_filepath);
		
			// Save to file
			// Prettify / Format XML and save
			$dom = new DomDocument();
			$dom->preserveWhiteSpace = false;
			$dom->formatOutput = true;
			$dom->loadXML($days->asXML());
			$dom->save('data/days.xml');
			$_SESSION['message'] = '<p class="padded b-s-t">&#10004; Day created successfully</p>';
			header('location: page_edit_days.php');
		}
	}else{
		$_SESSION['message'] = '<p class="padded b-s-t" style="color: #ff0000;">All fields required.</p>';
		header('location: page_edit_days.php');
	}
?>