<?php
	session_start();
	if(isset($_POST['add'])){
		$ugroups = simplexml_load_file('data/ugroups.xml');
		$ugroup = $ugroups->addChild('ugroup');
		$ugroup->addAttribute('id', $_POST['ugid']);
		if($_POST['title']!=''){$ugroup->addAttribute('title', $_POST['title']);}else{$ugroup->addAttribute('title','Untitled');}
		if($_POST['pal']=='0'){ 
			$ugroup->addAttribute('type','guests');
		} elseif($_POST['pal']=='1'){
			$ugroup->addAttribute('type','editors');
		} else { $ugroup->addAttribute('type','admins');}
		$ugroup->addAttribute('pal', $_POST['pal']);
		$ugroup->addAttribute('active', $_POST['active']);
		$description = $ugroup->addChild('description',$_POST['description']);
		
		// Save to file
		$dom = new DomDocument();
		$dom->preserveWhiteSpace = false;
		$dom->formatOutput = true;
		$dom->loadXML($ugroups->asXML());
		$dom->save('data/ugroups.xml');

		$_SESSION['message'] = 'User Group created successfully';
		header('location: page_user_groups.php');
	}else{
		$_SESSION['message'] = '<strong>Group not created.</strong>.';
		header('location: page_user_groups.php');
	}
?>