<?php session_start();
// UPDATE OBJECTS
if($_POST['pup']=='editobj'){
	if(isset($_POST['editobject'])){
		$objects = simplexml_load_file('data/objects.xml');
		foreach($objects->object as $object){
			if($object['id'] == $_POST['id']){
				if($_POST['title']!=''){ $object['title'] = $_POST['title']; } else {$object['title'] = 'Untitled';}
				$object['type'] = $_POST['content-type'];
				if(isset($_POST['active'])){$object['active'] = $_POST['active'];}else{$object['active']='false';}
				$object->desc = $_POST['desc'];
				if(!empty($_POST['mops'])){
					$newmops = 'mop-0,';
					foreach($_POST['mops'] as $mop){$newmops.=$mop.',';}
					$object->mops = substr($newmops,0,-1);
				}
				break;
			}
		}
		file_put_contents('data/objects.xml', $objects->asXML());
		$_SESSION['message'] = '<p class="padded b-s-t">&#10004; Object updated successfully</p>';
		header('location: page_edit_objects.php');
	} else{
		$_SESSION['message'] = '<p class="padded b-s-t" style="color: #ff0000;">Select an object to edit</p>';
		header('location: page_edit_objects.php');
	}
	
// UPDATE PROPERTIES
} elseif($_POST['pup']=='editprop'){
	if(isset($_POST['editproperty'])){
		$properties = simplexml_load_file('data/properties.xml');
		$handle= str_replace(' ','_',$_POST['title']);
		foreach($properties->property as $property){
			if($property['id'] == $_POST['id']){
				if($_POST['title']!=''){ $property['title'] = $_POST['title']; } else {$property['title'] = 'Untitled '.$_POST['input-type'];}
				if(isset($_POST['active'])){$property['active'] = $_POST['active'];}else{$property['active']='false';}
				if(isset($_POST['req'])){$property['req'] = $_POST['req'];}else{$property['req']='n';}
				if(isset($_POST['ro'])){$property['ro'] = $_POST['ro'];}else{$property['ro']='0';}
				$property['type'] = $_POST['input-type'];
				if($_POST['input-type']=='hidden'){$property['hit']=$_POST['hit'];}
				$property['value'] = $_POST['dvalue'];
				if(($_POST['input-type']=='select')||($_POST['input-type']=='radio')||($_POST['input-type']=='checkbox')){
					$property->options = $_POST['options'];
				}
				if(($_POST['input-type']=='number')||($_POST['input-type']=='range')){
					$property['min'] = $_POST['min']; 
					$property['max'] = $_POST['max'];
					$property['step'] = $_POST['step'];
				}
				break;
			}
		}
		file_put_contents('data/properties.xml', $properties->asXML());
		$_SESSION['message'] = '<p class="padded b-s-t">&#10004; Property updated successfully</p>';
		header('location: page_edit_objects.php');
	} else{
		$_SESSION['message'] = '<p class="padded b-s-t" style="color: #ff0000;">Select an object to edit</p>';
		header('location: page_edit_objects.php');
	}
	
// UPDATE BOARDS
} elseif($_POST['pup']=='editboard'){
	if(isset($_POST['edit'])){
		$boards = simplexml_load_file('data/boards.xml');
		foreach($boards->board as $board){
			if($board['id'] == $_POST['id']){
				if($_POST['title']!=''){ $board['title'] = $_POST['title']; } else {$board['title'] = 'Untitled';}
				if(isset($_POST['active'])){$board['active'] = $_POST['active'];}else{$board['active']='false';}
				if(isset($_POST['access'])){$board['access'] = $_POST['access'];}else{$board['access']='0';}
				$board['ctype'] = $_POST['content-type'];
				$board['cgtype'] = $_POST['content-group-type'];
				$board->desc = $_POST['desc'];
				break;
			}
		}
		file_put_contents('data/boards.xml', $boards->asXML());
		$_SESSION['message'] = '<p class="padded b-s-t">&#10004; Board updated successfully</p>';
		header('location: page_edit_boards.php');
	} else{
		$_SESSION['message'] = '<p class="padded b-s-t" style="color: #ff0000;">Select a board to edit</p>';
		header('location: page_edit_boards.php');
	}
	
// UPDATE MOLDS
} else {
	if(isset($_POST['editmold'])){
		$molds = simplexml_load_file('data/molds.xml');
		foreach($molds->mold as $mold){
			if($mold['id'] == $_POST['id']){
				if($_POST['title']!=''){ $mold['title'] = $_POST['title']; } else {$mold['title'] = 'Untitled';}
				if(isset($_POST['active'])){$mold['active'] = $_POST['active'];}else{$mold['active']='false';}
				$mold['type'] = $_POST['content-type'];
				$mold['etype'] = $_POST['element-type'];
				$mold->desc = $_POST['desc'];
				$mold->classes = $_POST['classes'];
				if(!empty($_POST['mos'])){
					$newmos = '';
					foreach($_POST['mos'] as $mos){$newmos.=$mos.',';}
					$mold->objects = substr($newmos,0,-1);
				}
				if(!empty($_POST['mob'])){
					$newmob = '';
					foreach($_POST['mob'] as $mob){$newmob.=$mob.',';}
					$mold->boards = substr($newmob,0,-1);
				}
				break;
			}
		}
		file_put_contents('data/molds.xml', $molds->asXML());
		$_SESSION['message'] = '<p class="padded b-s-t">&#10004; Mold updated successfully</p>';
		header('location: page_edit_molds.php');
	} else{
		$_SESSION['message'] = '<p class="padded b-s-t" style="color: #ff0000;">Select a mold to edit</p>';
		header('location: page_edit_molds.php');
	}
} 
?>