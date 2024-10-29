<?php session_start();
// ADD MOLD
if($_POST['pup']=='addmold'){
	if(isset($_POST['add'])){
		$molds = simplexml_load_file('data/molds.xml');
		$mold = $molds->addChild('mold','');
		$mold->addAttribute('id', $_POST['id']);
		if(!empty($_POST['title'])){$mold->addAttribute('title',$_POST['title']);} else {$mold->addAttribute('title','Untitled '.$_POST['type'].' Mold');}
		$mold->addAttribute('type', $_POST['content-type']);
		$mold->addAttribute('etype', $_POST['element-type']);
		$mold->addAttribute('gem','0');
		if(isset($_POST['active'])){$mold->addAttribute('active',$_POST['active']);}else{$mold->addAttribute('active','false');}
		$mold->addChild('desc',$_POST['desc']);
		$mold->addChild('classes','');
		
		if(!empty($_POST['mos'])){
			$newmos = '';
			foreach($_POST['mos'] as $mo){
				$newmos.=$mo.',';
			}
			$mold->addChild('objects',substr($newmos,0,-1));
		}
		if(!empty($_POST['mob'])){
			$newmob = '';
			foreach($_POST['mob'] as $mob){
				$newmob.=$mob.',';
			}
			$mold->addChild('boards',substr($newmob,0,-1));
		}
		// Prettify / Format XML and save
		$dom = new DomDocument();
		$dom->preserveWhiteSpace = false;
		$dom->formatOutput = true;
		$dom->loadXML($molds->asXML());
		$dom->save('data/molds.xml');
		$_SESSION['message'] = '<p class="padded b-s-t">&#10004; Mold formed successfully</p>'.$newmops;
		header('location: page_edit_molds.php');
	}else{
		$_SESSION['message'] = '<p class="padded b-s-t" style="color: #ff0000;">All fields required.</p>';
		header('location: page_edit_molds.php');
	}

// ADD BOARD
}elseif($_POST['pup']=='addboard'){
	if(isset($_POST['add'])){
		$boards = simplexml_load_file('data/boards.xml');
		$board = $boards->addChild('board','');
		$board->addChild('desc',$_POST['desc']);
		$board->addAttribute('id', $_POST['id']);
		if(!empty($_POST['title'])){$board->addAttribute('title', $_POST['title']);}else{$board->addAttribute('title','[untitled]');}
		$board->addAttribute('ctype', $_POST['content-type']);
		$board->addAttribute('cgtype', $_POST['content-group-type']);
		if(isset($_POST['access'])){$board->addAttribute('access',$_POST['access']);}else{$board->addAttribute('access','0');}
		if(isset($_POST['active'])){$board->addAttribute('active',$_POST['active']);}else{$board->addAttribute('active','false');}
		// Prettify / Format XML and save
		$dom = new DomDocument();
		$dom->preserveWhiteSpace = false;
		$dom->formatOutput = true;
		$dom->loadXML($boards->asXML());
		$dom->save('data/boards.xml');
		$_SESSION['message'] = '<p class="padded b-s-t">&#10004; Board created successfully</p>';
		header('location: page_edit_boards.php');
	}else{
		$_SESSION['message'] = '<p class="padded b-s-t" style="color: #ff0000;">All fields required.</p>';
		header('location: page_edit_boards.php');
	}
	
// ADD PROPERTY
}elseif($_POST['pup']=='addprop'){
	if(isset($_POST['addproperty'])){
		$properties = simplexml_load_file('data/properties.xml');
		$property = $properties->addChild('property','');
		$property->addAttribute('id', $_POST['id']);
		if(!empty($_POST['title'])){$property->addAttribute('title', $_POST['title']);}else{$property->addAttribute('title','Untitled '.$_POST['input-type']);}
		$property->addAttribute('type', $_POST['input-type']);
		$property->addChild('pattern','');
		if($_POST['input-type']=='textarea'){$property->addAttribute('rows','2');}
		if(($_POST['input-type']=='number')||($_POST['input-type']=='range')){
			$property->addAttribute('min','0');
			$property->addAttribute('max','');
			$property->addAttribute('step','1');
		}
		if($_POST['input-type']=='hidden'){ $property->addAttribute('hit','none');}
		$property->addAttribute('value','');
		if(isset($_POST['req'])){$property->addAttribute('req',$_POST['req']);}else{$property->addAttribute('req','n');}
		if(isset($_POST['ro'])){$property->addAttribute('ro',$_POST['ro']);}else{$property->addAttribute('ro','0');}
		if(isset($_POST['active'])){$property->addAttribute('active',$_POST['active']);}else{$property->addAttribute('active','false');}
		if(($_POST['input-type']=='checkbox')||($_POST['input-type']=='radio')||($_POST['input-type']=='select')){
			$property->addChild('options','');
		}
		// Prettify / Format XML and save
		$dom = new DomDocument();
		$dom->preserveWhiteSpace = false;
		$dom->formatOutput = true;
		$dom->loadXML($properties->asXML());
		$dom->save('data/properties.xml');
		$_SESSION['message'] = '<p class="padded b-s-t">&#10004; Property created successfully</p>';
		header('location: page_edit_objects.php');
	}else{
		$_SESSION['message'] = '<p class="padded b-s-t" style="color: #ff0000;">All fields required.</p>';
		header('location: page_edit_objects.php');
	}

// ADD OBJECT
} else {
	if(isset($_POST['addobject'])){
		$objects = simplexml_load_file('data/objects.xml');
		$object = $objects->addChild('object','');
		$object->addAttribute('id', $_POST['id']);
		if(!empty($_POST['title'])){$object->addAttribute('title',$_POST['title']);} else {$object->addAttribute('title','Untitled ');}
		$object->addAttribute('type', $_POST['content-type']);
		if(isset($_POST['active'])){$object->addAttribute('active',$_POST['active']);}else{$object->addAttribute('active','false');}
		$object->addChild('desc',$_POST['desc']);
		if(!empty($_POST['mops'])){
			$newmops = 'mop-0,';
			foreach($_POST['mops'] as $mop){
				$newmops.=$mop.',';
			}
			$object->addChild('mops',substr($newmops,0,-1));
		}
		// Prettify / Format XML and save
		$dom = new DomDocument();
		$dom->preserveWhiteSpace = false;
		$dom->formatOutput = true;
		$dom->loadXML($objects->asXML());
		$dom->save('data/objects.xml');
		$_SESSION['message'] = '<p class="padded b-s-t">&#10004; Object created successfully</p>'.$newmops;
		header('location: page_edit_objects.php');
	}else{
		$_SESSION['message'] = '<p class="padded b-s-t" style="color: #ff0000;">All fields required.</p>';
		header('location: page_edit_objects.php');
	}
}
?>