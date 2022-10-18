<?php
$dir_imgs = "rat/repo/files/images/";
$dir_aud = "rat/repo/files/audio/";
$dir_vid = "rat/repo/files/video/";
$dir_docs = "rat/repo/files/docs/";
$dir_other = "rat/repo/files/other/";
$dir_mypix = "pat/users/".$_SESSION['userName']."/photos/";
$dir_myfiles = "pat/users/".$_SESSION['userName']."/files/";
$dir_myaudio = "pat/users/".$_SESSION['userName']."/audio/";
$dir_myvideo = "pat/users/".$_SESSION['userName']."/video/";
$dir_trash = "rat/repo/trash/";
$dir_inc = "rat/repo/incoming/";
$dir_mydata = "pat/users/".$_SESSION['userName']."/data/";
$files1 = scandir($dir_imgs);
$files2 = scandir($dir_aud);
$files3 = scandir($dir_vid);
$files4 = scandir($dir_docs);
$files5 = scandir($dir_other);
$files6 = scandir($dir_mypix);
$files7 = scandir($dir_myfiles);
$files8 = scandir($dir_trash);
$files9 = scandir($dir_inc);
$files10 = scandir($dir_mydata);
$files11 = scandir($dir_myaudio);
$files12 = scandir($dir_myvideo);
$fc_imgs = count($files1)-2;
$fc_aud = count($files2)-2;
$fc_vid = count($files3)-2;
$fc_docs = count($files4)-2;
$fc_other = count($files5)-2;
$fc_mypix = count($files6)-2;
$fc_myfiles = count($files7)-2;
$fc_trash = count($files8)-2;
$fc_inc = count($files9)-2;
$fc_mydata = count($files10)-3;
$fc_myaud = count($files11)-2;
$fc_myvid = count($files12)-2;
?>
	<div id="fam" class="op-panel charcoal">
		<div class="op-panelctrl solid-black">
			<div data-close="fam" class="op-panelbt op-bt-close">
				<img src="bat/css/bos-ui/arrow-left-48.png" alt="close" />
			</div>
			<div data-panelid="profile" data-pos="right" class="op-panelbt op-tab op-bt-nav">
				<span class="lucida">Account &raquo;</span>
			</div>
			<div class="op-panelbt op-bt-closeall floatright">
				<img src="bat/css/bos-ui/close-white-48a.png" alt="close all" />
			</div>
			<div class="clearspace"></div>
		</div>
        
        <!-- Panel Content -->
        <div class="op-panelform light-text">
			<div class="container-fluid">
				<div class="block-wrap">
					<div class="block b100">
						<div class="clean chonk fossil-t charcoal-t-s" style="padding: 0px 16px 8px 16px; display: inline-block; margin: 0 1.5em 0 0; min-width: 33vw;">
							<h3 class="lucida bold" style="font-size: 2.5em; ">FAM <i class="bi bi-folder"></i></h3>
							<h4 class="lucida heavy flow-text">File Asset Manager</h4>
						</div>
					</div>
				</div>
				<div class="block-wrap">
					<div class="block bw50 md-100 sm-100 xs-100" style="padding: 1em 2em 1em 0;">
						<h4 class="lucida clean fossil-t charcoal-t-s flow-text" style="margin-left: 0; padding: 0.5em; max-width: 90%;"><i class="bi bi-folder"></i> Public </h4>
						<ul class="tiles files folderlist lucida smoke-t">
							<li><a href="javascript:void(0);" class="op-tab" data-panelid="fam-imgs" data-pos="right"><i class="folder-image"></i> Images <span class="fcount"><?php echo $fc_imgs; ?></span></a></li>
							<li><a href="javascript:void(0);" class="op-tab" data-panelid="fam-aud" data-pos="right"><i class="folder-music"></i> Audio <span class="fcount"><?php echo $fc_aud; ?></span></a></li>
							<li><a href="javascript:void(0);" class="op-tab" data-panelid="fam-vid" data-pos="right"><i class="folder-video"></i> Video <span class="fcount"><?php echo $fc_vid; ?></span></a></li>
							<li><a href="javascript:void(0);" class="op-tab" data-panelid="fam-docs" data-pos="right"><i class="folder"></i> Documents <span class="fcount"><?php echo $fc_docs; ?></span></a></li>
							<li><a href="javascript:void(0);" class="op-tab" data-panelid="fam-other" data-pos="right"><i class="folder-plain-open"></i> Other <span class="fcount"><?php echo $fc_other; ?></span></a></li>
						</ul>
					</div>
					<div class="block bw25 md-100 sm-100 xs-100" style="padding: 1em 2em 1em 0;">
						<h4 class="lucida smoke fossil-t charcoal-t-s flow-text" style="margin-left: 0; padding: 0.5em; max-width: 90%;"><i class="bi bi-nav"></i> System </h4>
						<ul class="tiles files folderlist lucida smoke-t">
							<li><a href="javascript:void(0);" class="op-tab" data-panelid="fam-inc" data-pos="bottom"><i class="folder-network-open"></i> Incoming <span class="fcount"><?php echo $fc_inc;?></span></a></li>
							<li><a href="javascript:void(0);" class="op-tab" data-panelid="fam-trash" data-pos="bottom"><i class="folder-trash"></i> Trash <span class="fcount"><?php echo $fc_trash;?></span></a></li>
						</ul>
					</div>
					<div class="block bw25 md-100 sm-100 xs-100" style="padding: 1em 2em 1em 0;">
						<h4 class="lucida smoke fossil-t flow-text charcoal-t-s" style="margin-left: 0; padding: 0.5em; max-width: 90%;"><i class="bi bi-lock"></i> Private </h4>
						<ul class="tiles files folderlist lucida smoke-t">
							<li><a href="javascript:void(0);" class="op-tab" data-panelid="my_files" data-pos="left"><i class="folder-archive"></i> My Files <span class="fcount"><?php echo $fc_myfiles; ?></span></a></li>
							<li><a href="javascript:void(0);" class="op-tab" data-panelid="my_photos" data-pos="left"><i class="folder-photo"></i> My Photos <span class="fcount"><?php echo $fc_mypix; ?></span></a></li>
							<li><a href="javascript:void(0);" class="op-tab" data-panelid="my_audio" data-pos="left"><i class="folder-music"></i> My Audio <span class="fcount"><?php echo $fc_myaud; ?></span></a></li>
							<li><a href="javascript:void(0);" class="op-tab" data-panelid="my_videos" data-pos="left"><i class="folder-video"></i> My Videos <span class="fcount"><?php echo $fc_myvid; ?></span></a></li>
							<li><a href="javascript:void(0);" class="op-tab" data-panelid="my_data" data-pos="left"><i class="folder-classic"></i> My Data <span class="fcount"><?php echo $fc_mydata; ?></span></a></li>
						</ul>
					</div>
				</div>
			</div>
			
        </div>
    </div>