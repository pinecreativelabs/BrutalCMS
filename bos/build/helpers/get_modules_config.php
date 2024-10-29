<?php 
// PAD config
$padfile = simplexml_load_file($droot_bos.'/molds/pad/module/data/config.xml');
foreach($padfile->padconfig as $padconfig){
	if($padconfig['id']=='11'){
		$profiles = $padconfig->profiles['mode'];
		$profile_theme = $padconfig->profiles['theme'];
		$profile_layout = $padconfig->profiles['layout'];
		$blocked_user_message = $padconfig->blocked;
		$blocked_redirect = $padconfig->blocked['redirect'];
		$profile_storyboard = $padconfig->modules['storyboard'];
		$profile_paws = $padconfig->modules['paws'];
		$profile_ports = $padconfig->modules['ports'];
		$profile_fam = $padconfig->modules['fam'];
		$userlist_layout = $padconfig->profiles['userlist'];
	}
}

// PAGES config
$pagesfile = simplexml_load_file($droot_bos.'/molds/pages/module/data/config.xml');
foreach($pagesfile->pagesconfig as $pagesconfig){
	if($pagesconfig['id']=='22'){
		$pages_genmode = $pagesconfig->options['genmode'];
		$pages_location = $pagesconfig->options['location'];
		$pages_pal = $pagesconfig->options['pal'];
		$pages_meta = $pagesconfig->options['meta'];
	}
}

// CRUDE config
$crudefile = simplexml_load_file($droot_bos.'/molds/crude/module/data/config.xml');
foreach($crudefile->crudeconfig as $crudeconfig){
	if($crudeconfig['id']=='27'){
		$crude_addrecords = $crudeconfig->options['addrecords'];
		$crude_delrecords = $crudeconfig->options['delrecords'];
		$crude_readonly = $crudeconfig->options['readonly'];
	}
}
?>