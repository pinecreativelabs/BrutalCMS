<?php session_start();
	if(isset($_POST['add'])){
		//open xml file
		$articles = simplexml_load_file('data/articles.xml');
		$article = $articles->addChild('article');
		$article->addAttribute('aid', $_POST['aid']);
		$article->addAttribute('user', $_POST['user']);
		if($_POST['title']!=''){$post = $article->addChild('post',$_POST['title']);}else{$post=$article->addChild('post','Untitled '.date('Y-m-d'));}
		if(isset($_POST['active'])){$post->addAttribute('active', $_POST['active']);}else{$post->addAttribute('active','false');}
		if(!empty($_POST['cat'])){$post->addAttribute('cat', $_POST['category']);} else {$post->addAttribute('cat','Uncategorized');}
		if(!empty($_POST['tag'])){$post->addAttribute('tag', $_POST['tag']);} else {$post->addAttribute('tag','Untagged');}
		if(!empty($_POST['dip'])){$post->addAttribute('dip', $_POST['dip']);} else {$post->addAttribute('dip',date('Y-m-d'));}
		$post->addAttribute('dep', $_POST['dep']);
		if(!empty($_POST['title'])){$title = $article->addChild('title', $_POST['title']);} else {$title = $article->addChild('title','[untitled]');}
		$url = $article->addChild('url', $_POST['url']);
		if(!empty($_POST['target'])){$url->addAttribute('target', $_POST['target']);} else {$url->addAttribute('target','_blank');}
		$pic = $article->addChild('pic', $_POST['pic']);
		$newarticlecontent = $_POST['content'];
		$new_article_content_filepath = $_POST['cdpath'].$_POST['aid'].'.txt';
		$new_article_content_file = fopen($new_article_content_filepath,"a+");
		fwrite($new_article_content_file, $newarticlecontent);
		fclose($new_article_content_file);
		$article->addChild('content',$new_article_content_filepath);
		
		// Prettify / Format XML and save
		$dom = new DomDocument();
		$dom->preserveWhiteSpace = false;
		$dom->formatOutput = true;
		$dom->loadXML($articles->asXML());
		$dom->save('data/articles.xml');

		$_SESSION['message'] = '<p class="padded b-s-t">&#10004; Article added successfully</p>';
		header('location: page_edit_articles.php');
	} else{
		$_SESSION['message'] = '<p class="padded b-s-t" style="color: #ff0000;">All fields required.</p>';
		header('location: page_edit_articles.php');
	}
?>