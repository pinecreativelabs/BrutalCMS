<?php session_start();
	if(isset($_POST['add'])){
		//open xml file
		$pagegroups = simplexml_load_file('data/groups.xml');
		$pagegroup = $pagegroups->addChild('pagegroup');
		$pagegroup->addAttribute('id', $_POST['id']);
		if(!empty($_POST['title'])){$pagegroup->addAttribute('title', $_POST['title']);}else{$pagegroup->addAttribute('title','[untitled]');}
		if(!empty($_POST['desc'])){$pagegroup->addAttribute('description', $_POST['desc']);}else{$pagegroup->addAttribute('description','Untitled data group.');}
		$pagegroup->addAttribute('type', $_POST['pagetype']);
		// Save to file
		//file_put_contents('data/groups.xml', $groups->asXML());
		// Prettify / Format XML and save
		$dom = new DomDocument();
		$dom->preserveWhiteSpace = false;
		$dom->formatOutput = true;
		$dom->loadXML($pagegroups->asXML());
		$dom->save('data/groups.xml');
		$_SESSION['message'] = 'Page group created successfully';
		header('location: page_edit_groups.php');
	}
	else{
		$_SESSION['message'] = 'All fields required.';
		header('location: page_edit_groups.php');
	}
?>