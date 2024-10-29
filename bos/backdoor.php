<?php 
$getstyle = $bosdir.'core/css/construct.css';
require_once('molds/pad/module/common.php');
checkUserBackdoor();
$current_user = $_SESSION['userName'];
$row = 0;
// user account
$skip_row_number = array("1");
if (($handlep = fopen("pat/profiles/".$_SESSION['userName'].".csv", "r")) !== FALSE) {
	while (($pdata = fgetcsv($handlep, 1000, ",")) !== FALSE) {
		$row++;
		if (in_array($row, $skip_row_number)){continue;} else {
			if($pdata[4]=='1'){$ugroup='administrator';}elseif($pdata[4]=='2'){$ugroup='editor';}elseif($pdata[4]=='3'){$ugroup='member';}else{$ugroup='superuser';}
			$uid = $pdata[0];
			$uname = $pdata[1];
			if($pdata[2]==''){ $uemail = '[null]'; } else { $uemail = $pdata[2]; }
			$uactive = $pdata[3];
		}
	} fclose($handlep);
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>BOS Backdoor</title>
	<link rel="stylesheet" type="text/css" href="<?php echo $getstyle;?>">
	<style>
		a,a:link,a:visited{color: #ffff00; text-decoration: none;}
		a:hover, .btn:hover{color: #D458F7; border-bottom: 2px dashed #ffff00;}
		.modblok {border: 1px solid #32cd32; padding: 1rem; border-radius: 0.5rem; -webkit-border-radius: 0.5rem; margin: 0 0 1rem 0;}
		.modblok h3 {margin: 0; padding: 0; display: block; width: 100%; border-bottom: 1px solid #32cd32;}
		.modblok ul li a span.special{border: 1px solid #ffff00; border-radius: 0.5rem; -webkit-border-radius: 0.5rem; padding: 4px; font-weight: 600;}
		.modblok ul li a:hover span.special{background: #32cd32; color: #000;}
		.btn{font-size: 1.25rem; text-decoration: none;}
		.gui,.settings{position: absolute; top: 15px; width: 50px; text-align: center;}
		.gui{margin-left: 4px;}
		.settings{margin-left: 58px;}
	</style>
</head>
<body class="black lime-t vcr-mono">

<div style="border-bottom: 1px solid #32cd32; z-index: 4; position: -webkit-sticky; position: sticky; display: block; top: 0; width: 100%;">
	<div class="block-wrap black">
		<div class="block bw33 xs-100 sm-100 md-100">
			<h1 class="black-t lime" style="padding: 6px; margin: 12px 0 12px 0; display: inline-block;">BOS BACKDOOR</h1>
			<a href="index.php" title="Go to BOS" class="lime-b b-s-t btn black gui"><i class="bi bi-mining"></i></a>
			<a href="molds/sad/module/page_system_settings.php" target="_blank" class="btn lime-b b-s-t black settings" title="BOS Settings" ><i class="bi bi-gear"></i></a>
		</div><div class="block bw33 xs-100 sm-100 md-100 center">
			<p style="line-height: 120%;"><small>logged in as:</small><br /><span class="flow-text"><?php echo $current_user;?></span><br /><span style="font-size: 12px;">[<?php echo $ugroup;?> access]</span></p>
		</div><div class="block bw33 xs-100 sm-100 md-100 center flow-text">
			<a href="molds/pad/module/page_my_pwpin.php" target="_blank" class="btn lime-b b-s-t black" title="Change Password" style="width: 50px; text-align: center;"><i class="bi bi-pk"></i></a>
			<a href="molds/pad/module/page_profile.php" target="_blank" class="btn lime-b b-s-t black">Edit Account</a>
			<a href="logout-backdoor.php" class="btn lime-b b-s-t black">LOGOUT &raquo;</a>
		</div>
	</div>
</div>
<!-- ALL USER MODULES (PAL=0>) -->
<div class="container-1600">
	<div class="block-wrap">
		<div class="block bw33 xs-100 sm-100 md-100"><div class="padded">
			<div class="modblok">
				<h3 class="flow-text">MyPAD</h3>
				<ul class="none">
					<li><a href="<?php echo $bdir;?>/profiles/<?php echo $current_user;?>.php" target="_blank"><span class="special">View Profile</span></a></li>
					<li><a href="molds/pad/module/page_profile.php" target="_blank">Edit Profile</a></li>
					<li><a href="molds/pad/module/page_my_pwpin.php" target="_blank">Change Password</a></li>
					<li><a href="molds/pad/module/page_my_avatar.php" target="_blank">My Avatar</a></li>
					<li><a href="molds/pad/module/page_my_sm.php" target="_blank">Stream Manager</a></li>
				</ul>
			</div>
		</div></div>
		<div class="block bw33 xs-100 sm-100 md-100"><div class="padded">
			<div class="modblok">
				<h3 class="flow-text">PAWS Module</h3>
				<ul class="none">
					<li><a href="molds/paws/module/create.php" target="_blank"><span class="special">+ CREATE POST</span></a></li>
					<li style="margin-top: 6px;"><a href="molds/paws/module/my_blog.php" target="_blank">Blog Journal</a></li>
					<li><a href="molds/paws/module/my_calendar.php" target="_blank">Event Calendar</a></li>
					<li><a href="molds/paws/module/my_gallery.php" target="_blank">Photo Gallery</a></li>
					<li><a href="molds/paws/module/my_radio_station.php" target="_blank">Podcast Radio</a></li>
					<li><a href="molds/paws/module/my_products.php" target="_blank">Product Feed</a></li>
					<li><a href="molds/paws/module/my_tv_station.php" target="_blank">My TV Station</a></li>
				</ul>
				<ul class="none" style="margin-top: 1rem; padding-top: 6px; border-top: 1px solid #32cd32;">
					<li><a href="molds/paws/module/my_home.php" target="_blank">My PAWS Panel</a></li>
					<?php if(($ugroup=='administrator')||($ugroup=='superuser')){ ?><li><a href="molds/paws/module/page_settings.php" target="_blank">Settings</a></li><?php } ?>
				</ul>
			</div>
		</div></div>
		<div class="block bw33 xs-100 sm-100 md-100"><div class="padded">
			<div class="modblok">
				<h3 class="flow-text">FAM Module</h3>
				<ul class="none">
					<li><a href="molds/fam/module/page_shared_files.php" target="_blank">Shared Files</a></li>
					<li><a href="molds/fam/module/page_private_files.php" target="_blank">Private Files</a></li>
					<li><a href="molds/fam/module/page_incoming.php" target="_blank">Incoming</a></li>
				</ul>
				<ul class="none" style="margin-top: 1rem; padding-top: 6px; border-top: 1px solid #32cd32;">
					<li><a href="molds/fam/module/page_trashcan.php" target="_blank">Trash</a></li>
					<li><a href="molds/fam/module/page_mytrashcan.php" target="_blank">My Trash</a></li>
				</ul>
			</div>
		</div></div>
	</div>
	<div class="block-wrap">
		<div class="block bw33 xs-100 sm-100 md-100"><div class="padded">
			<div class="modblok">
				<h3 class="flow-text">PORTS Module</h3>
				<ul class="none">
					<li><a href="molds/ports/module/page_home.php" target="_blank">My PORTS</a></li>
					<li><a href="molds/ports/module/page_edit_projects.php" target="_blank">Projects</a></li>
					<li><a href="molds/ports/module/page_edit_tasks.php" target="_blank">Tasks</a></li>
					<li><a href="molds/ports/module/page_edit_roles.php" target="_blank">Roles</a></li>
				</ul>
			</div>
		</div></div>
		<div class="block bw33 xs-100 sm-100 md-100"><div class="padded">
			<div class="modblok">
				<h3 class="flow-text">STORYboard Module</h3>
				<ul class="none">
					<li><a href="molds/storyboard/module/page_edit_stories.php" target="_blank"><span class="special">+ CREATE STORY</span></a></li>
					<li><a href="molds/storyboard/module/page_home.php" target="_blank">My STORYboard</a></li>
					<li><a href="molds/storyboard/module/page_edit_boards.php" target="_blank">Setup Boards</a></li>
					<li><a href="molds/storyboard/module/page_archives.php" target="_blank">Archives</a></li>
				</ul>
			</div>
		</div></div>
		<div class="block bw33 xs-100 sm-100 md-100"><div class="padded">
			<div class="modblok">
				<h3 class="flow-text">CAD Module</h3>
				<ul class="none">
					<li><a href="molds/cad/module/page_edit_articles.php" target="_blank">Manage Articles</a></li>
					<li><a href="molds/cad/module/page_edit_cats.php" target="_blank">Categories</a></li>
					<li><a href="molds/cad/module/page_edit_tags.php" target="_blank">Tags</a></li>
					<li><a href="molds/cad/module/page_archives.php" target="_blank">Archives</a></li>
				</ul>
			</div>
		</div></div>
	</div>
	
	<!-- ADMINISTRATIVE MODULES (PAL=2,3) -->
	<div class="block-wrap">
		<div class="block bw33 xs-100 sm-100 md-100"><div class="padded">
			<div class="modblok">
				<h3 class="flow-text">PAD Module</h3>
				<ul class="none">
					<li><a href="molds/pad/module/page_home.php" target="_blank">PAD Home</a></li>
					<li><a href="molds/pad/module/page_edit_users.php" target="_blank">Manage Users</a></li>
					<li><a href="molds/pad/module/page_raw_data.php" target="_blank">Raw User Data Editor</a></li>
				</ul>
			</div>
		</div></div>
		<div class="block bw33 xs-100 sm-100 md-100"><div class="padded">
			<div class="modblok">
				<h3 class="flow-text">MOB Module</h3>
				<ul class="none">
					<li><a href="molds/mob/module/page_home.php" target="_blank">MOB Home</a></li>
					<li><a href="molds/mob/module/page_mold_maker.php" target="_blank">Make Molds</a></li>
					<li><a href="molds/mob/module/page_board_builder.php" target="_blank">Build Boards</a></li>
				</ul>
			</div>
		</div></div>
		<div class="block bw33 xs-100 sm-100 md-100"><div class="padded">
			<div class="modblok">
				<h3 class="flow-text">Blueprint Module</h3>
				<ul class="none">
					<li><a href="molds/blueprint/module/page_home.php" target="_blank">Blueprint Home</a></li>
					<li><a href="molds/blueprint/module/page_edit_layouts.php" target="_blank">Layouts</a></li>
					<li><a href="molds/blueprint/module/page_edit_themes.php" target="_blank">Themes</a></li>
				</ul>
			</div>
		</div></div>
	</div>
	<div class="block-wrap">
		<div class="block bw33 xs-100 sm-100 md-100"><div class="padded">
			<div class="modblok">
				<h3 class="flow-text">PAGES Module</h3>
				<ul class="none">
					<li><a href="molds/pages/module/page_home.php" target="_blank">PAGES Home</a></li>
					<li><a href="molds/pages/module/page_edit_pages.php" target="_blank">Page Manager</a></li>
					<li><a href="molds/pages/module/page_edit_groups.php" target="_blank">Page Groups</a></li>
					<li><a href="molds/pages/module/page_edit_sitemap.php" target="_blank">Sitemap</a></li>
				</ul>
			</div>
		</div></div>
		<div class="block bw33 xs-100 sm-100 md-100"><div class="padded">
			<div class="modblok">
				<h3 class="flow-text">HAPI Module</h3>
				<ul class="none">
					<li><a href="molds/hapi/module/page_home.php" target="_blank">HAPI Home</a></li>
					<li><a href="molds/hapi/module/page_edit_tpikeys.php" target="_blank">TPI Keys</a></li>
					<li><a href="molds/hapi/module/page_edit_cdns.php" target="_blank">Manage CDNs</a></li>
					<li><a href="molds/hapi/module/page_tpi_uploader.php" target="_blank">Upload TPI Files</a></li>
				</ul>
			</div>
		</div></div>
		<div class="block bw33 xs-100 sm-100 md-100"><div class="padded">
			<div class="modblok">
				<h3 class="flow-text">JACK Module</h3>
				<ul class="none">
					<li><a href="molds/jack/module/page_home.php" target="_blank">JACK Home</a></li>
					<li><a href="molds/jack/module/page_uploader.php" target="_blank">Upload Content</a></li>
					<li><a href="molds/jack/module/page_edit_joins.php" target="_blank">Joins</a></li>
					<li><a href="molds/jack/module/page_edit_ties.php" target="_blank">Ties</a></li>
				</ul>
			</div>
		</div></div>
	</div>
	<div class="block-wrap">
		<div class="block bw33 xs-100 sm-100 md-100"><div class="padded">
			<div class="modblok">
				<h3 class="flow-text">MAP Module</h3>
				<ul class="none">
					<li><a href="molds/map/module/page_home.php" target="_blank">MAP Home</a></li>
					<li><a href="molds/map/module/page_maps.php" target="_blank">Map Manager</a></li>
					<li><a href="molds/map/module/page_locations.php" target="_blank">Locations</a></li>
				</ul>
			</div>
		</div></div>
		<div class="block bw33 xs-100 sm-100 md-100"><div class="padded">
			<div class="modblok">
				<h3 class="flow-text">MyDID Module</h3>
				<ul class="none">
					<li><a href="molds/mydid/module/page_db_connections.php" target="_blank">DB Connections</a></li>
					<li><a href="molds/mydid/module/page_sql_importer.php" target="_blank">Import SQL</a></li>
					<li><a href="molds/mydid/module/page_table_manager.php" target="_blank">Manage Tables</a></li>
				</ul>
			</div>
		</div></div>
		<div class="block bw33 xs-100 sm-100 md-100"><div class="padded">
			<div class="modblok" id="sadmod">
				<h3 class="flow-text">SAD Module</h3>
				<ul class="none">
					<li><a href="molds/sad/module/page_home.php" target="_blank">SAD Home</a></li>
					<li><a href="molds/sad/module/page_system_settings.php" target="_blank">System Settings</a></li>
					<li><a href="molds/sad/module/page_system_pages.php" target="_blank">System Pages</a></li>
					<li><a href="molds/sad/module/page_seo_settings.php" target="_blank">SEO Settings</a></li>
				</ul>
			</div>
		</div></div>
	</div>
	
	<!-- EDITORIAL MODULES (PAL=1) -->
	<div class="block-wrap">
		<div class="block bw33 xs-100 sm-100 md-100"><div class="padded">
			<div class="modblok">
				<h3 class="flow-text">CRUDE Module</h3>
				<ul class="none">
					<li><a href="molds/crude/module/page_edit_data.php" target="_blank">Data Editor</a></li>
					<li><a href="molds/crude/module/page_edit_entities.php" target="_blank">Entities</a></li>
					<li><a href="molds/crude/module/page_edit_groups.php" target="_blank">Groups</a></li>
					<li><a href="molds/crude/module/page_settings.php" target="_blank">Settings</a></li>
				</ul>
			</div>
		</div></div>
		<div class="block bw33 xs-100 sm-100 md-100"><div class="padded">
			<div class="modblok">
				<h3 class="flow-text">DICK Module</h3>
				<ul class="none">
					<li><a href="molds/dick/module/page_edit_days.php" target="_blank">Custom Days</a></li>
					<li><a href="molds/dick/module/page_edit_weekdays.php" target="_blank">Weekdays</a></li>
					<li><a href="molds/dick/module/page_settings.php" target="_blank">Settings</a></li>
				</ul>
			</div>
		</div></div>
		<div class="block bw33 xs-100 sm-100 md-100"><div class="padded">
			<div class="modblok">
				<h3 class="flow-text">EDU Module</h3>
				<ul class="none">
					<li><a href="molds/edu/module/page_edit_courses.php" target="_blank">Courses</a></li>
					<li><a href="molds/edu/module/page_edit_lessons.php" target="_blank">Lessons</a></li>
					<li><a href="molds/edu/module/page_edit_quizzes.php" target="_blank">Quizzes</a></li>
					<li><a href="molds/edu/module/page_edit_settings.php" target="_blank">Settings</a></li>
				</ul>
			</div>
		</div></div>
	</div>
	<div class="block-wrap">
		<div class="block bw33 xs-100 sm-100 md-100"><div class="padded">
			<div class="modblok">
				<h3 class="flow-text">MAD Module</h3>
				<ul class="none">
					<li><a href="molds/mad/module/page_home.php" target="_blank">MAD Home</a></li>
					<li><a href="molds/mad/module/page_cta_central.php" target="_blank">CTA Central</a></li>
					<li><a href="molds/mad/module/page_manage_ads.php" target="_blank">Ad Manager</a></li>
					<li><a href="molds/mad/module/page_mailing_lists.php" target="_blank">Mailing Lists</a></li>
					<li><a href="molds/mad/module/page_manage_forms.php" target="_blank">Form Manager</a></li>
					<li><a href="molds/mad/module/page_notifications.php" target="_blank">Notifications</a></li>
					<li><a href="molds/mad/module/page_edit_settings.php" target="_blank">Settings</a></li>
				</ul>
			</div>
		</div></div>
		<div class="block bw33 xs-100 sm-100 md-100"><div class="padded">
			<div class="modblok">
				<h3 class="flow-text">SHOP Module</h3>
				<ul class="none">
					<li><a href="molds/shop/module/page_home.php" target="_blank">SHOP Home</a></li>
					<li><a href="molds/shop/module/page_inventory.php" target="_blank">Inventory</a></li>
					<li><a href="molds/shop/module/page_shipping.php" target="_blank">Shipping</a></li>
					<li><a href="molds/shop/module/page_taxes.php" target="_blank">Taxes</a></li>
					<li><a href="molds/shop/module/page_discounts.php" target="_blank">Discounts</a></li>
					<li><a href="molds/shop/module/page_orders.php" target="_blank">Orders</a></li>
					<li><a href="molds/shop/module/page_settings.php" target="_blank">Settings</a></li>
				</ul>
			</div>
		</div></div>
		<div class="block bw33 xs-100 sm-100 md-100"><div class="padded">
			<div class="modblok">
				<h3 class="flow-text">TILT Module</h3>
				<ul class="none">
					<li><a href="molds/tilt/module/page_home.php" target="_blank">TILT Home</a></li>
					<li><a href="molds/tilt/module/page_languages.php" target="_blank">Languages</a></li>
					<li><a href="molds/tilt/module/page_elements.php" target="_blank">Elements</a></li>
					<li><a href="molds/tilt/module/page_translations.php" target="_blank">Translations</a></li>
					<li><a href="molds/tilt/module/page_generate.php" target="_blank">Generate</a></li>
				</ul>
			</div>
		</div></div>
	</div>
	<p class="spacer"></p>
</div>
</body>
</html>