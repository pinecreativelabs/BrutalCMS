<?php session_start();
	if(isset($_POST['add'])){
		$streams = simplexml_load_file(realpath(__DIR__.'/../../../app/users/'.$_POST['uname'].'/data/streams.xml'));
		$stream = $streams->addChild('stream');
		$stream->addAttribute('id', $_POST['sid']);
		if($_POST['title']!=''){$stream->addAttribute('title', $_POST['title']);}else{$stream->addAttribute('title','Untitled');}
		$stream->addAttribute('type', $_POST['type']);
		$stream->addAttribute('active', $_POST['active']);
		$description = $stream->addChild('description',$_POST['description']);
		
		// Save to file
		$dom = new DomDocument();
		$dom->preserveWhiteSpace = false;
		$dom->formatOutput = true;
		$dom->loadXML($streams->asXML());
		$dom->save(realpath(__DIR__.'/../../../app/users/'.$_POST['uname'].'/data/streams.xml'));

		$_SESSION['message'] = 'Stream created successfully';
		header('location: page_my_sm.php');
	}else{
		$_SESSION['message'] = '<strong>Stream not created.</strong>.';
		header('location: page_my_sm.php');
	}
?>