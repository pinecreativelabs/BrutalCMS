<?php
	session_start();
	if(isset($_POST['add'])){
		//open xml file
		$articles = simplexml_load_file('data/articles.xml');
		$article = $articles->addChild('article');
		$article->addAttribute('aid', $_POST['aid']);
		$article->addAttribute('user', $_POST['user']);
		
		$post = $article->addChild('post',$_POST['title']);
		if(isset($_POST['active'])){$post->addAttribute('active', $_POST['active']);}else{$post->addAttribute('active','true');}
		if(!empty($_POST['tag'])){$post->addAttribute('tag', $_POST['tag']);} else {$post->addAttribute('tag','Unspecified');}
		if(!empty($_POST['dip'])){$post->addAttribute('dip', $_POST['dip']);} else {$post->addAttribute('dip',date('Y-m-d'));}
		$post->addAttribute('dep', $_POST['dep']);
		
		if(!empty($_POST['title'])){$title = $article->addChild('title', $_POST['title']);} else {$title = $article->addChild('title','[untitled]');}
		$content = $article->addChild('content', $_POST['content']);
		$url = $article->addChild('url', $_POST['url']);
		if(!empty($_POST['target'])){$url->addAttribute('target', $_POST['target']);} else {$url->addAttribute('target','_blank');}
		$pic = $article->addChild('pic', $_POST['pic']);
		
		// Save to file
		//file_put_contents('data/days.xml', $days->asXML());
		// Prettify / Format XML and save
		$dom = new DomDocument();
		$dom->preserveWhiteSpace = false;
		$dom->formatOutput = true;
		$dom->loadXML($articles->asXML());
		$dom->save('data/articles.xml');

		$_SESSION['message'] = 'Article created successfully';
		header('location: page_edit_articles.php');
	}
	else{
		$_SESSION['message'] = 'All fields required.';
		header('location: page_edit_articles.php');
	}

?>