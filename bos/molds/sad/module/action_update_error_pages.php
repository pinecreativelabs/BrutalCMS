<?php session_start();
	if(isset($_POST['update_errorpgs'])){
		$syspages = simplexml_load_file('data/syspages.xml');
		foreach($syspages->syspage as $syspage){
			if($syspage['id'] == '11'){
				if($_POST['error403']!=''){ $syspage->error403['title'] = $_POST['error403'];}else{$syspage->error403['title'] = '403 Forbidden'; }
				if($_POST['error403_msg']!=''){ $syspage->error403 = $_POST['error403_msg'];}else{
					$syspage->error403 = 'The server has refused to fulfill your request.';
				}
				if($_POST['error404']!=''){ $syspage->error404['title'] = $_POST['error404'];}else{$syspage->error404['title'] = '404 Not Found'; }
				if($_POST['error404_msg']!=''){ $syspage->error404 = $_POST['error404_msg'];}else{
					$syspage->error404 = 'The document or file requested was not found on this server.';
				}
				if($_POST['error405']!=''){ $syspage->error405['title'] = $_POST['error405'];}else{$syspage->error405['title'] = '405 Method Not Allowed'; }
				if($_POST['error405_msg']!=''){ $syspage->error405 = $_POST['error405_msg'];}else{
					$syspage->error405 = 'The method specified in the Request-Line is not allowed for the specified resource.';
				}
				if($_POST['error408']!=''){ $syspage->error408['title'] = $_POST['error408'];}else{$syspage->error408['title'] = '408 Request Timeout'; }
				if($_POST['error408_msg']!=''){ $syspage->error408 = $_POST['error408_msg'];}else{
					$syspage->error408 = 'Your browser failed to send a request in the time allowed by the server.';
				}
				if($_POST['error500']!=''){ $syspage->error500['title'] = $_POST['error500'];}else{$syspage->error500['title'] = '500 Internal Server Error'; }
				if($_POST['error500_msg']!=''){ $syspage->error500 = $_POST['error500_msg'];}else{
					$syspage->error500 = 'The request was unsuccessful due to an unexpected condition encountered by the server.';
				}
				if($_POST['error502']!=''){ $syspage->error502['title'] = $_POST['error502'];}else{$syspage->error502['title'] = '502 Bad Gateway'; }
				if($_POST['error502_msg']!=''){ $syspage->error502 = $_POST['error502_msg'];}else{
					$syspage->error502 = 'The server received an invalid response from the upstream server while trying to fulfill the request.';
				}
				if($_POST['error504']!=''){ $syspage->error504['title'] = $_POST['error504'];}else{$syspage->error504['title'] = '504 Gateway Timeout'; }
				if($_POST['error504_msg']!=''){ $syspage->error504 = $_POST['error504_msg'];}else{
					$syspage->error504 = 'The upstream server failed to send a request in the time allowed by the server.';
				}
				break;
			}
		}
		file_put_contents('data/syspages.xml', $syspages->asXML());
		$_SESSION['message'] = 'Error Pages updated.';
		header('location: page_system_pages.php');
	} else{
		$_SESSION['message'] = 'Update failed.';
		header('location: page_system_pages.php');
	}
?>