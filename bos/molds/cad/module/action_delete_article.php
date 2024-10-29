<?php session_start();
	$aid = $_GET['aid'];
	$articles = simplexml_load_file('data/articles.xml');
	$index = 0;
	$i = 0;
	foreach($articles->article as $article){
		if($article['aid'] == $aid){
			$cdf=$article->content;
			$index = $i;
			break;
		} $i++;
	}
	unlink($cdf);
	unset($articles->article[$index]);
	file_put_contents('data/articles.xml', $articles->asXML());
	$_SESSION['message'] = 'Article deleted';
	header('location: page_edit_articles.php');
?>