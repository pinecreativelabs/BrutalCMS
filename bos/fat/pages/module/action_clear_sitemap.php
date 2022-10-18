<?php $sitemapfile = realpath(__DIR__. '/../../../..').'/sitemap.xml';
session_start();
	$urlset = simplexml_load_file($sitemapfile);
	unset($urlset->url);
	file_put_contents($sitemapfile, $urlset->asXML());
	$_SESSION['message'] = 'Sitemap cleared.';
	header('location: page_edit_sitemap.php');
?>