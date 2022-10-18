<?php
	session_start();
	if(isset($_POST['add'])){
		//open xml file
		$layouts = simplexml_load_file('data/layouts.xml');
		$layout = $layouts->addChild('layout');
		$layout->addAttribute('id', $_POST['id']);
		if(!empty($_POST['title'])){$layout->addAttribute('title', $_POST['title']);}else{$layout->addAttribute('title','[untitled]');}
		$layout->addAttribute('method', $_POST['method']);
		if(!empty($_POST['cols'])){$layout->addAttribute('cols', $_POST['cols']);}else{$layout->addAttribute('cols','1');}
		if(!empty($_POST['rows'])){$layout->addAttribute('rows', $_POST['rows']);}else{$layout->addAttribute('rows','1');}
		
		if(!empty($_POST['col-classes'])){$column = $layout->addChild('column', $_POST['col_classes']);}else{$column = $layout->addChild('column');}
		$column->addAttribute('x-unit', $_POST['x-unit']);
		$column->addAttribute('y-unit', $_POST['y-unit']);
		if(!empty($_POST['width'])){$column->addAttribute('width', $_POST['width']);}else{$column->addAttribute('width', '1');}
		$column->addAttribute('min-width', $_POST['min-width']);
		$column->addAttribute('max-width', $_POST['max-width']);
		$column->addAttribute('height', $_POST['height']);
		$column->addAttribute('min-height', $_POST['min-height']);
		$column->addAttribute('max-height', $_POST['max-height']);
		
		if(!empty($_POST['rule-classes'])){$rules = $layout->addChild('rules', $_POST['rule_classes']);}else{$rules = $layout->addChild('rules');}
		$rules->addAttribute('xxs', $_POST['xxs']);
		$rules->addAttribute('xs', $_POST['xs']);
		$rules->addAttribute('sm', $_POST['sm']);
		$rules->addAttribute('md', $_POST['md']);
		$rules->addAttribute('lg', $_POST['lg']);
		$rules->addAttribute('xl', $_POST['xl']);
		$rules->addAttribute('xxl', $_POST['xxl']);
		
		// Save to file
		//file_put_contents('data/layouts.xml', $days->asXML());
		// Prettify / Format XML and save
		$dom = new DomDocument();
		$dom->preserveWhiteSpace = false;
		$dom->formatOutput = true;
		$dom->loadXML($layouts->asXML());
		$dom->save('data/layouts.xml');

		$_SESSION['message'] = 'Layout created successfully';
		header('location: page_edit_layouts.php');
	}
	else{
		$_SESSION['message'] = 'All fields required.';
		header('location: page_edit_layouts.php');
	}

?>