<?php session_start();
	if(isset($_POST['edit'])){
		$cadcats = simplexml_load_file('data/cats.xml');
		foreach($cadcats->cat as $cat){
			if($cat['catid'] == $_POST['catid']){
				$cat['title'] = $_POST['title'];
				break;
			}
		}
		file_put_contents('data/cats.xml', $cadcats->asXML());
		$_SESSION['message'] = '<p class="padded b-s-t">&#10004; Category updated!</p>';
		header('location: page_edit_cats.php');
	}else{
		$_SESSION['message'] = '<p class="padded b-s-t" style="color: #ff0000;">Select category to edit.</p>';
		header('location: page_edit_cats.php');
	}
?>