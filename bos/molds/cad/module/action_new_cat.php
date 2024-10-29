<?php session_start();
	if((isset($_POST['add']))&&($_POST['title']!='')){
		//open xml file
		$cadcats = simplexml_load_file('data/cats.xml');
		$cat = $cadcats->addChild('cat');
		$cat->addAttribute('catid', $_POST['catid']);
		$title = $cat->addAttribute('title', $_POST['title']);
		
		// Save to file
		// Prettify / Format XML and save
		$dom = new DomDocument();
		$dom->preserveWhiteSpace = false;
		$dom->formatOutput = true;
		$dom->loadXML($cadcats->asXML());
		$dom->save('data/cats.xml');
		$_SESSION['message'] = '<p class="padded b-s-t">&#10004; Category added successfully</p>';
		header('location: page_edit_cats.php');
	} else{
		$_SESSION['message'] = '<p class="padded b-s-t" style="color: #ff0000;">All fields required.</p>';
		header('location: page_edit_cats.php');
	}
?>