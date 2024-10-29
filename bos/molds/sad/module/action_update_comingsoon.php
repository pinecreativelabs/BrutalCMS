<?php session_start();
	if(isset($_POST['update_comingsoon'])){
		$syspages = simplexml_load_file('data/syspages.xml');
		foreach($syspages->syspage as $syspage){
			if($syspage['id'] == '11'){
				$syspage->comingsoon['status'] = $_POST['cs_status'];
				$syspage->comingsoon['template'] = $_POST['cs_template'];
				$syspage->comingsoon['deadline'] = $_POST['deadline'];
				if($_POST['cs_title']!=''){ $syspage->comingsoon['title'] = $_POST['cs_title'];}else{$syspage->comingsoon['title'] = 'Coming Soon'; }
				if($_POST['cs_message']!=''){$syspage->comingsoon = $_POST['cs_message'];} else { $syspage->comingsoon = 'New brutality is being constructed!'; }
				break;
			}
		}
		file_put_contents('data/syspages.xml', $syspages->asXML());
		$_SESSION['message'] = 'Coming Soon page updated.';
		header('location: page_system_pages.php');
	} else{
		$_SESSION['message'] = 'Update failed.';
		header('location: page_system_pages.php');
	}
?>