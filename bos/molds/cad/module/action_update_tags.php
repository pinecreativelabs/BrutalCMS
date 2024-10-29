<?php session_start();
	if(isset($_POST['edit'])){
		$cadtags = simplexml_load_file('data/tags.xml');
		foreach($cadtags->tag as $tag){
			if($tag['tagid'] == $_POST['tagid']){
				$tag['title'] = $_POST['title'];
				$tag['cat'] = $_POST['category'];
				break;
			}
		}
		file_put_contents('data/tags.xml', $cadtags->asXML());
		$_SESSION['message'] = '<p class="padded b-s-t">&#10004; Tag updated!</p>';
		header('location: page_edit_tags.php');
	}else{
		$_SESSION['message'] = '<p class="padded b-s-t" style="color: #ff0000;">Tag title required.</p>';
		header('location: page_edit_tags.php');
	}
?>