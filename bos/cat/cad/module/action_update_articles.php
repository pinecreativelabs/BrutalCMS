<?php
	session_start();
	if(isset($_POST['edit'])){
		$articles = simplexml_load_file('data/articles.xml');
		foreach($articles->article as $article){
			if($article['aid'] == $_POST['aid']){
				$article['user'] = $_POST['user'];
				$article->post['tag'] = $_POST['tag'];
				
				if(!empty($_POST['dip'])){$article->post['dip'] = $_POST['dip'];} else { $article->post['dip'] = date('Y-m-d');}
				$article->post['dep'] = $_POST['dep'];
				$article->post['active'] = $_POST['active'];
				$article->title = $_POST['title'];
				$article->content = $_POST['content'];
				$article->url = $_POST['url'];
				$article->url['target'] = $_POST['target'];
				$article->pic = $_POST['pic'];
				break;
			}
		}
		file_put_contents('data/articles.xml', $articles->asXML());
		$_SESSION['message'] = 'Article updated successfully';
		header('location: page_edit_articles.php');
	}
	else{
		$_SESSION['message'] = 'Select article to edit';
		header('location: page_edit_articles.php');
	}

?>