<?php session_start();
	if(isset($_POST['edit'])||isset($_POST['del'])){
		$streams = simplexml_load_file(realpath(__DIR__.'/../../../app/users/'.$_POST['uname'].'/data/streams.xml'));
		if($_POST['pup']=='edit'){
			foreach($streams->stream as $stream){
				if($stream['id'] == $_POST['sid']){
					if($_POST['title']!=''){$stream['title'] = $_POST['title'];}else{$stream['title'] = 'Untitled';}
					$stream->description = $_POST['description'];
					$stream['active'] = $_POST['active'];
					$stream['type'] = $_POST['type'];
					break;
				}
			}
			file_put_contents(realpath(__DIR__.'/../../../app/users/'.$_POST['uname'].'/data/streams.xml'), $streams->asXML());
			$_SESSION['message'] = 'Stream updated.';
			header('location: page_my_sm.php');
		} else {
			$sid = $_POST['sid'];
			$index = 0;
			$i = 0;
			foreach($streams->stream as $stream){
				if($stream['id'] == $sid){
					$index = $i;
					break;
				} $i++;
			}
			unset($streams->stream[$index]);
			file_put_contents(realpath(__DIR__.'/../../../app/users/'.$_POST['uname'].'/data/streams.xml'), $streams->asXML());
			$_SESSION['message'] = 'Stream deleted.';
			header('location: page_my_sm.php');
		}
	} else{
		$_SESSION['message'] = 'Select a stream to edit';
		header('location: page_my_sm.php');
	}
?>