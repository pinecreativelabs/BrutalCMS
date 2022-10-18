<?php session_start();
	if(isset($_POST['edit'])){
		$pages = simplexml_load_file('data/pages.xml');
		foreach($pages->page as $page){
			if($page['id'] == $_POST['id']){
				$page['title'] = $_POST['title'];
				$page->metatitle = $_POST['metatitle'];
				$page->loc = $_POST['canurl'];
				$page->metadesc = $_POST['desc'];
				$page->lastmod = $_POST['lastmod'];
				$page['group'] = $_POST['pggroup'];
				$page['author'] = $_POST['author'];
				$page['type'] = $_POST['type'];
				$page->design['theme'] = $_POST['theme'];
				$page->design['layout'] = $_POST['layout'];
				$page['sitemap'] = $_POST['sitemap'];
				$page['priority'] = $_POST['priority'];
				$page['changefreq'] = $_POST['changefreq'];
				break;
			}
		}
		
		file_put_contents('data/pages.xml', $pages->asXML());
		$_SESSION['message'] = 'Page updated successfully';
		header('location: page_edit_pages.php');
	}
	else{
		$_SESSION['message'] = 'Select a page to edit';
		header('location: page_edit_pages.php');
	}
?>