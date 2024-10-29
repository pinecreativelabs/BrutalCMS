<?php $sitemapfile = realpath(__DIR__. '/../../../..').'/sitemap.xml';
session_start();
	if(isset($_POST['edit'])){
		$urlset = simplexml_load_file($sitemapfile);
		$pages = simplexml_load_file('data/pages.xml');
		// first erase all records and save
		unset($urlset->url);
		file_put_contents($sitemapfile, $urlset->asXML());
		// add new data sitemap and save
		$index = 0; $i = 0;
		foreach($pages->page as $page){
			if(($page['type']=='public')&&($page['sitemap']=='1')){ $index=$i;
				$url = $urlset->addChild('url');
				$url->addChild('loc',$_POST['loc'.$i]);
				$url->addChild('lastmod',$_POST['lastmod'.$i]);
				$url->addChild('changefreq',$_POST['changefreq'.$i]);
				$url->addChild('priority',$_POST['priority'.$i]);
			} $i++;
		}
		file_put_contents($sitemapfile, $urlset->asXML());
		$_SESSION['message'] = 'Sitemap generated successfully';
		header('location: page_edit_sitemap.php');
	} else{ header('location: page_edit_sitemap.php'); }
?>