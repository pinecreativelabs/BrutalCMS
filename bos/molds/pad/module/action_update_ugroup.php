<?php session_start();
	if(isset($_POST['edit'])){
		$ugroups = simplexml_load_file('data/ugroups.xml');
		foreach($ugroups->ugroup as $ugroup){
			if($ugroup['id'] == $_POST['ugid']){
				if($_POST['title']!=''){$ugroup['title'] = $_POST['title'];}else{$ugroup['title'] = 'Untitled';}
				$ugroup->description = $_POST['description'];
				$ugroup['active'] = $_POST['active'];
				$ugroup['pal'] = $_POST['pal'];
				if($_POST['pal']=='0'){ 
					$ugroup['type'] = 'guests';
				} elseif($_POST['pal']=='1'){
					$ugroup['type']='editors';
				} else { $ugroup['type']='admins';}
				break;
			}
		}
		file_put_contents('data/ugroups.xml', $ugroups->asXML());
		$_SESSION['message'] = '<p class="padded b-s-t">&#10004; User Group updated successfully</p>';
		header('location: page_user_groups.php');
	} else{
		$_SESSION['message'] = '<p class="padded b-s-t" style="color: #ff0000;">Select group to edit.</p>';
		header('location: page_user_groups.php');
	}
?>