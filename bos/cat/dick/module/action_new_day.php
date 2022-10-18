<?php
	session_start();
	if(isset($_POST['add'])){
		//open xml file
		$days = simplexml_load_file('data/days.xml');
		$day = $days->addChild('day');
		$day->addAttribute('id', $_POST['id']);
		if(!empty($_POST['ddate'])){$day->addAttribute('ddate', $_POST['ddate']);} else {$day->addAttribute('ddate',date('Y-m-d'));}
		if(!empty($_POST['title'])){$day->addAttribute('title', $_POST['title']);} else {$day->addAttribute('title',date('l'));}
		$day->addChild('content', $_POST['content']);
		
		$url = $day->addChild('url', $_POST['link']);
		$url->addAttribute('target', $_POST['target']);
		if(!empty($_POST['linktext'])){$day->addChild('linktext', $_POST['linktext']);}else{$day->addChild('linktext', 'Learn More');}
		
		$day->addChild('dpic', $_POST['dpic']);
		$day->addChild('vtype', $_POST['vtype']);
		$day->addChild('vid', $_POST['vid']);
		
		$colors = $day->addChild('colors');
		$colors->addAttribute('pcolor', $_POST['pcolor']);
		$colors->addAttribute('scolor', $_POST['scolor']);
		$colors->addAttribute('tcolor', $_POST['tcolor']);
		
		if(isset($_POST['active'])){$day->addChild('active', $_POST['active']);}else{$day->addChild('active','true');}
		// Save to file
		//file_put_contents('data/days.xml', $days->asXML());
		// Prettify / Format XML and save
		$dom = new DomDocument();
		$dom->preserveWhiteSpace = false;
		$dom->formatOutput = true;
		$dom->loadXML($days->asXML());
		$dom->save('data/days.xml');
		// Prettify / Format XML and save

		$_SESSION['message'] = 'Day created successfully';
		header('location: page_edit_days.php');
	}
	else{
		$_SESSION['message'] = 'All fields required.';
		header('location: page_edit_days.php');
	}

?>