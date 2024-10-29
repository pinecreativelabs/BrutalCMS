<?php 
$sitemapfile = realpath(__DIR__. '/../../../..').'/sitemap.xml';
session_start();
	if(isset($_POST['edit'])){
		$urlset = simplexml_load_file($sitemapfile);
		foreach($urlset->url as $url){
			if($url->lastmod == $_POST['lastmod']){
				$url->priority = $_POST['priority'];
				$url->changefreq = $_POST['changefreq'];
				break;
			}
		}
		
		file_put_contents($sitemapfile, $urlset->asXML());
		$_SESSION['message'] = 'URL updated successfully';
		header('location: page_edit_sitemap.php');
	}
	else{
		$_SESSION['message'] = 'Select a URL to edit';
		header('location: page_edit_sitemap.php');
	}
?>