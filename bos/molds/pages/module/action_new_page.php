<?php $sitemapfile = realpath(__DIR__. '/../../../..').'/sitemap.xml';
	session_start();
	if(isset($_POST['add'])){
		//open xml file
		$pages = simplexml_load_file('data/pages.xml');
		$page = $pages->addChild('page');
		$page->addAttribute('id', $_POST['id']);
		if(!empty($_POST['title'])){$page->addAttribute('title', trim($_POST['title']));} else {$page->addAttribute('title','Untitled-'.$_POST['id']);}
		if(isset($_POST['active'])){$page->addAttribute('active',$_POST['active']);}else{$page->addAttribute('active','false');}
		if(isset($_POST['reqlogin'])){$page->addAttribute('login',$_POST['reqlogin']);}else{$page->addAttribute('login','false');}
		$page->addAttribute('group', $_POST['pggroup']);
		$page->addAttribute('author', $_POST['author']);
		$page->addAttribute('type', $_POST['type']);
		if($_POST['priority']!='unset'){$page->addAttribute('priority', $_POST['priority']);} else {$page->addAttribute('priority','0.5');}
		$page->addAttribute('changefreq', $_POST['changefreq']);
		if(isset($_POST['sitemap'])){$page->addAttribute('sitemap', $_POST['sitemap']);}else{$page->addAttribute('sitemap','1'); }
		
		if(!empty($_POST['title'])){
			$loc = $page->addChild('loc',$_POST['burl'].strtolower(str_replace(' ','-',trim($_POST['title']))));
		}else {
			$loc = $page->addChild('loc',$_POST['burl'].'untitled-'.$_POST['id']);
		}
		
		$loc->addAttribute('generated', $_POST['generated']);
		$lastmod = $page->addChild('lastmod',$_POST['lastmod']);
		if(!empty($_POST['title'])){$metatitle = $page->addChild('metatitle', trim($_POST['title']));} else {$metatitle = $page->addChild('metatitle','Untitled');}
		$desc = $page->addChild('metadesc',trim($_POST['desc']));
		
		$design = $page->addChild('design');
		$design->addAttribute('theme',$_POST['theme']);
		$design->addAttribute('layout',$_POST['layout']);
		
		// add page to sitemap if it is to be included and is NOT a private, hidden, or system page
		if(file_exists($sitemapfile)){
			$urlset = simplexml_load_file($sitemapfile);
			if(($_POST['type']=='public')&&(($_POST['sitemap']=='1')||(!isset($_POST['sitemap'])))){
				$url = $urlset->addChild('url');
				if(!empty($_POST['title'])){
					$url->addChild('loc',$_POST['burl'].strtolower(str_replace(' ','-',trim($_POST['title']))));
				}else {
					$url->addChild('loc',$_POST['burl'].'untitled-'.$_POST['id']);
				}
				$lastmodified = $url->addChild('lastmod',$_POST['lastmod']);
				$changefreq = $url->addchild('changefreq',$_POST['changefreq']);
				if($_POST['priority']!='unset'){$url->addChild('priority', $_POST['priority']);} else {$url->addChild('priority','0.5');}
			}
		}
		// Save to file
		//file_put_contents('data/pages.xml', $days->asXML());
		// Prettify / Format XML and save
		$dom1 = new DomDocument();
		$dom2 = new DomDocument();
		$dom1->preserveWhiteSpace = false;
		$dom2->preserveWhiteSpace = false;
		$dom1->formatOutput = true;
		$dom2->formatOutput = true;
		$dom1->loadXML($pages->asXML());
		$dom2->loadXML($urlset->asXML());
		$dom1->save('data/pages.xml');
		$dom2->save($sitemapfile);

		$_SESSION['message'] = '<p class="padded b-s-t">&#10004; Page created successfully</p>';
		header('location: page_edit_pages.php');
	}else{
		$_SESSION['message'] = '<p class="padded b-s-t" style="color: #ff0000;">All fields required.</p>';
		header('location: page_edit_pages.php');
	}
?>