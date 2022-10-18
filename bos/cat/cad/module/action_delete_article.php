<?php session_start();
	$aid = $_GET['aid'];
	$articles = simplexml_load_file('data/articles.xml');
	//we're are going to create iterator to assign to each article
	$index = 0;
	$i = 0;

	foreach($articles->article as $article){
		if($article['aid'] == $aid){
			$index = $i;
			break;
		}
		$i++;
	}

	unset($articles->article[$index]);
	file_put_contents('data/articles.xml', $articles->asXML());
	$_SESSION['message'] = 'Article deleted';
	header('location: page_edit_articles.php');
?>