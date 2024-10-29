<?php session_start();
	if(isset($_POST['edit'])){
		$pages = simplexml_load_file('data/pages.xml');
		foreach($pages->page as $page){
			if($page['id'] == $_POST['id']){
				$page['title'] = $_POST['title'];
				if(isset($_POST['active'])){$page['active'] = $_POST['active'];}else{$page['active']='false';}
				if(isset($_POST['reqlogin'])){$page['login'] = $_POST['reqlogin'];}else{$page['login']='false';}
				$page->metatitle = $_POST['metatitle'];
				$page->loc = $_POST['canurl'];
				$page->metadesc = $_POST['desc'];
				$page->lastmod = $_POST['lastmod'];
				$page['group'] = $_POST['pggroup'];
				$page['author'] = $_POST['author'];
				$page['type'] = $_POST['type'];
				$page->design['theme'] = $_POST['theme'];
				$page->design['layout'] = $_POST['layout'];
				if(isset($_POST['sitemap'])){$page['sitemap'] = $_POST['sitemap'];}else{$page['sitemap']='0';}
				$page['priority'] = $_POST['priority'];
				$page['changefreq'] = $_POST['changefreq'];
				break;
			}
		}
		
		file_put_contents('data/pages.xml', $pages->asXML());
		$_SESSION['message'] = '<p class="padded b-s-t">&#10004; Page updated successfully</p>';
		header('location: page_home.php');
	} else{
		$_SESSION['message'] = '<p class="padded b-s-t" style="color: #ff0000;">Update failed.</p>';
		header('location: page_home.php');
	}
?>