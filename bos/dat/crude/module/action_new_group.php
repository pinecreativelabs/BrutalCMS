<?php session_start();
	if(isset($_POST['add'])){
		//open xml file
		$datagroups = simplexml_load_file('data/groups.xml');
		$datagroup = $datagroups->addChild('datagroup');
		$datagroup->addAttribute('id', $_POST['id']);
		if(!empty($_POST['title'])){$datagroup->addAttribute('title', $_POST['title']);}else{$datagroup->addAttribute('title','[untitled]');}
		if(!empty($_POST['desc'])){$datagroup->addAttribute('description', $_POST['desc']);}else{$datagroup->addAttribute('description','Untitled data group.');}
		$datagroup->addAttribute('type', $_POST['datatype']);
		// Save to file
		//file_put_contents('data/groups.xml', $groups->asXML());
		// Prettify / Format XML and save
		$dom = new DomDocument();
		$dom->preserveWhiteSpace = false;
		$dom->formatOutput = true;
		$dom->loadXML($datagroups->asXML());
		$dom->save('data/groups.xml');
		$_SESSION['message'] = 'Data group created successfully';
		header('location: page_edit_groups.php');
	}
	else{
		$_SESSION['message'] = 'All fields required.';
		header('location: page_edit_groups.php');
	}
?>