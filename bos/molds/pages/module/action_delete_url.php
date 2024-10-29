<?php 
$sitemapfile = realpath(__DIR__. '/../../../..').'/sitemap.xml';
session_start();
	$id = $_GET['id'];
	$urlset = simplexml_load_file($sitemapfile);
	$index = 0;
	$i = 0;

	foreach($urlset->url as $url){
		$getlastmod = $url->lastmod;
		$lmodid = str_replace(str_split('-:+'),'',$getlastmod);
		if($lmodid == $id){
			$index = $i;
			break;
		}
		$i++;
	}
	unset($urlset->url[$index]);
	file_put_contents($sitemapfile, $urlset->asXML());
	$_SESSION['message'] = 'URL deleted';
	header('location: page_edit_sitemap.php');
?>