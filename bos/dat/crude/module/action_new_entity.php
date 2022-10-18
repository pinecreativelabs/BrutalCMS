<?php session_start();
	$csvdir = dirname(__FILE__, 4).'/rat/repo/data/csv/entities/';
	
	if(isset($_POST['add'])){
		//open xml file
		$entities = simplexml_load_file('data/entities.xml');
		$entity = $entities->addChild('entity');
		$entity->addAttribute('id', $_POST['id']);
		$entity->addAttribute('dgroup', $_POST['dgroup']);
		if(!empty($_POST['title'])){
			$filetitle = strtolower(str_replace(' ','_',$_POST['title']));
			$entity->addAttribute('title', $filetitle);
		} else {$entity->addAttribute('title','untitled');}
		if(isset($_POST['format'])){
			$entity->addAttribute('format', $_POST['format']);
			$filext = $_POST['format'];
		}else{
			$entity->addAttribute('format','csv');
			$filext = 'csv';
		}
		
		if(!empty($_POST['desc'])){$entity->addChild('description', $_POST['desc']);}else{$entity->addChild('description','Untitled data entity.');}
		
		$newfile = $csvdir.$filetitle.'.'.$filext;
		$newfiletitle = $filetitle.'.'.$filext;
		$datafile = $entity->addChild('datafile',$newfile);
		$datafile->addAttribute('title',$newfiletitle);
		if(!empty($_POST['fields'])){
			$entity->addChild('fields', str_replace(' ','',$_POST['fields']));
			$fields = str_replace(' ','',$_POST['fields']);
		}else{
			$entity->addChild('fields','id,title,description');
			$fields = 'id,title,description';
		}
		$datafile = fopen($newfile,"a+");
		fwrite($datafile,$fields."\r\n");
		
		// Prettify / Format XML and save
		$dom = new DomDocument();
		$dom->preserveWhiteSpace = false;
		$dom->formatOutput = true;
		$dom->loadXML($entities->asXML());
		$dom->save('data/entities.xml');
		$_SESSION['message'] = 'Entity created successfully';
		header('location: page_edit_entities.php');
	}
	else{
		$_SESSION['message'] = 'All fields required.';
		header('location: page_edit_entities.php');
	}
?>