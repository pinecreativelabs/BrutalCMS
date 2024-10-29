<?php session_start();
	if(isset($_POST['edit'])){
		$articles = simplexml_load_file('data/articles.xml');
		foreach($articles->article as $article){
			if($article['aid'] == $_POST['aid']){
				$article['user'] = $_POST['user'];
				$article->post['cat'] = $_POST['category'];
				$article->post['tag'] = $_POST['tag'];
				if(!empty($_POST['dip'])){$article->post['dip'] = $_POST['dip'];} else { $article->post['dip'] = date('Y-m-d');}
				$article->post['dep'] = $_POST['dep'];
				if(isset($_POST['active'])){$article->post['active'] = $_POST['active'];}else{$article->post['active']='false';}
				$article->title = $_POST['title'];
				
				$article->url = $_POST['url'];
				$article->url['target'] = $_POST['target'];
				$article->pic = $_POST['pic'];
				
				$cdpath = $_POST['cdpath'];
				$article->content = $cdpath;
				$editarticlecontent = $_POST['content'];
				if(file_exists($cdpath)){
					$day_content_file = fopen($cdpath,"w+");
					fwrite($day_content_file, $editarticlecontent);
					fclose($day_content_file);
				}else{
					$day_content_file = fopen($cdpath,"a+");
					fwrite($day_content_file, $editarticlecontent);
					fclose($day_content_file);
				}
				break;
			}
		}
		file_put_contents('data/articles.xml', $articles->asXML());
		$_SESSION['message'] = '<p class="padded b-s-t">&#10004; Article updated successfully</p>';
		header('location: page_edit_articles.php');
	} else{
		$_SESSION['message'] = '<p class="padded b-s-t" style="color: #ff0000;">Select an article to edit</p>';
		header('location: page_edit_articles.php');
	}
?>