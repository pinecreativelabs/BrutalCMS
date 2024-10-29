<?php session_start();
	if(isset($_POST['update_mmode'])){
		$syspages = simplexml_load_file('data/syspages.xml');
		foreach($syspages->syspage as $syspage){
			if($syspage['id'] == '11'){
				$syspage->mmode['status'] = $_POST['mmode'];
				if($_POST['mm_title']!=''){ $syspage->mmode['title'] = $_POST['mm_title'];}else{$syspage->mmode['title'] = 'Maintenance Mode'; }
				if($_POST['mm_message']!=''){$syspage->mmode = $_POST['mm_message'];} else { $syspage->mmode = 'This site is undergoing maintenance.'; }
				break;
			}
		}
		file_put_contents('data/syspages.xml', $syspages->asXML());
		$_SESSION['message'] = 'Maintenance Mode updated.';
		header('location: page_system_pages.php');
	} else{
		$_SESSION['message'] = 'Update failed.';
		header('location: page_system_pages.php');
	}
?>