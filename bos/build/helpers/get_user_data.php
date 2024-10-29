<?php
$usersfile = simplexml_load_file($droot_bos.'/molds/pad/module/data/users.xml');
$ugroupsfile = simplexml_load_file($droot_bos.'/molds/pad/module/data/ugroups.xml');
foreach($usersfile->user as $user){
	//if($current_user_id==$user['id']){
	if($current_user==$username){
		$uid = $user['id'];
		$username = $user['username'];
		$user_pal = $user['pal'];
		$user_blocked = $user['blocked'];
		$user_group = $user['group'];
		$user_active = $user['active'];
		$user_status = $user['status'];
		$user_visibility = $user['visibility'];
		$user_password = $user->password;
		$user_email = $user->email;
		$user_profile_name = $user->profile['name'];
		$user_sex = $user->profile['sex'];
		$user_birthday = $user->profile['birthday'];
		$user_bio = $user->bio;
		$user_phone = $user->contact['phone'];
		$user_url = $user->contact['url'];
		$user_ig = $user->contact['ig'];
		$user_tw = $user->contact['tw'];
		$up_country = $user->locale['country'];
		$up_city = $user->locale['city'];
		$up_region = $user->locale['region'];
		$up_tz = $user->locale['timezone'];
		$up_lang = $user->locale['language'];
		$up_curc = $user->locale['curc'];
		$up_curs = $user->locale['curs'];
	}
}

// construct group list and selector
$group_selector = '<select name="usergroup">'.PHP_EOL;
$group_list = '<ul class="grouplist">'.PHP_EOL;
foreach($ugroupsfile->ugroup as $ugroup){
	$title = $title = $ugroup['title'];
	$active = $ugroup['active'];
	if($active=='true'){
		$group_selector .= '<option value="'.$title.'">'.$title.'</option>'.PHP_EOL;
		$group_list .= '<li>'.$title.'</li>'.PHP_EOL;
	}
}
$group_selector .= '</select>'.PHP_EOL;
$group_list .= '</ul>'.PHP_EOL;
?>