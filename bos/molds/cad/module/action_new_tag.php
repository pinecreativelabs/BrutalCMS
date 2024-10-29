<?php session_start();
	if((isset($_POST['add']))&&($_POST['title']!='')){
		//open xml file
		$cadtags = simplexml_load_file('data/tags.xml');
		$tag = $cadtags->addChild('tag');
		$tag->addAttribute('tagid', $_POST['tagid']);
		$title = $tag->addAttribute('title', $_POST['title']);
		$tag->addAttribute('cat', $_POST['category']);
		
		// Save to file
		// Prettify / Format XML and save
		$dom = new DomDocument();
		$dom->preserveWhiteSpace = false;
		$dom->formatOutput = true;
		$dom->loadXML($cadtags->asXML());
		$dom->save('data/tags.xml');
		$_SESSION['message'] = '<p class="padded b-s-t">&#10004; Tag added successfully</p>';
		header('location: page_edit_tags.php');
	} else{
		$_SESSION['message'] = '<p class="padded b-s-t" style="color: #ff0000;">All fields required.</p>';
		header('location: page_edit_tags.php');
	}
?>