<?php session_start();
if(isset($_POST['gem'])){
	// GEM: Generative Engine Mold
	$molds = simplexml_load_file('data/molds.xml');
	foreach($molds->mold as $mold){
		if($mold['id'] == $_POST['id']){
			$mold['gem'] = $_POST['generated'];
			break;
		}
	}
	file_put_contents('data/molds.xml', $molds->asXML());
	
	// define KAT (Key Array Templates)
		$hid = str_replace('-','_',$_POST['id']);
		define('kittykat',$_POST['handle'].'_'.$hid);
		$objs = $_POST['objects'];
		if($objs!=''){ $objs_array = explode(',',$objs);}else {$objs_array = array();}
		$boards = $_POST['boards'];
		if($boards!=''){ $boards_array = explode(',',$boards);}else {$boards_array = array();}
		
		$objs_list = '<ul class="'.constant('kittykat').'">'.PHP_EOL;
		for($i=0; $i < count($objs_array); $i++) {
			$objs_list .='<li>'.$objs_array[$i].'</li>'.PHP_EOL;
		}
		$objs_list.='</ul>'.PHP_EOL;
		
	// define MEOW (Mold Entry Object Writer)
		define('meow',$_POST['handle']);
		
	// construct MEOW inputs
	
	// construct MEOW form
	
	// mold KAT->MEOW (generate new files)
	
	
	$_SESSION['message'] = '<p class="padded b-s-t">&#10004; Mold updated successfully</p>'.PHP_EOL.$objs_list;
	header('location: page_edit_molds.php');
} else{
	$_SESSION['message'] = '<p class="padded b-s-t" style="color: #ff0000;">Select a mold to edit</p>';
	header('location: page_edit_molds.php');
}
?>