<?php require_once('sat/sos/sos.php'); 
require_once('pat/pad/module/common.php');
checkUser();
$row = 0;
// user account
$skip_row_number = array("1");
if (($handlep = fopen("pat/profiles/".$_SESSION['userName'].".csv", "r")) !== FALSE) {
	while (($pdata = fgetcsv($handlep, 1000, ",")) !== FALSE) {
		$row++;
		if (in_array($row, $skip_row_number)){continue;} else {
			if($pdata[4]=='1'){$ugroup='administrator';}elseif($pdata[4]=='2'){$ugroup='editor';}elseif($pdata[4]=='3'){$ugroup='member';}else{$ugroup='BOS Admin';}
			$uid = $pdata[0];
			$uname = $pdata[1];
			if($pdata[2]==''){ $uemail = '[null]'; } else { $uemail = $pdata[2]; }
			$uactive = $pdata[3];
		}
	} fclose($handlep);
}
// user profile
if (($handleprofile = fopen("pat/users/".$_SESSION['userName']."/data/profile.csv", "r")) !== FALSE) {
	while (($pdata = fgetcsv($handleprofile, 1000, ",")) !== FALSE) {
		$row++;
		$up_visibility = $pdata[0];
		$up_status = $pdata[1];
		$up_fname = $pdata[2];
		$up_lname = $pdata[3];
		$up_sex = $pdata[4];
		if($pdata[5]==''){$up_bday = '[not set]';} else { $up_bday = $pdata[5];}
		$up_email = $pdata[6];
		$up_phone = $pdata[7];
		$up_url = $pdata[8];
		$up_bio = $pdata[9];
	} fclose($handleprofile);
}

// open user notepad
$mynp = 'pat/users/'.$_SESSION['userName'].'/data/notepad.txt';
$mynotepad = fopen($mynp, "r") or die("Unable to open file!");
$mynotes = nl2br(fread($mynotepad,filesize($mynp)));
fclose($mynotepad);

// check for user avatar
$avatarpath = 'pat/users/'.$_SESSION['userName'].'/photos/avatar.jpg';
$is_avatar = file_exists($avatarpath);
if($is_avatar==1){$avatar = 'true';}else{$avatar = 'false';}
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, user-scalable=no" />

<title><?php echo 'BOS | '.$version; ?></title>
<meta name="description" content="Brutalist Framework v3 BETA" />

<script type="text/javascript">
	if(top != self) {
		window.open(self.location.href, '_top');
	}
</script>

<link href="bat/css/brutalist.min.css" type="text/css" rel="stylesheet" media="all"/>
<link href="bat/css/blueprintgrid.min.css" type="text/css" rel="stylesheet" />
<link href="fat/fos/css/filetypes.css" type="text/css" rel="stylesheet" />
<link href="bat/css/bos-ui.css" type="text/css" rel="stylesheet" />

<script src="bat/jab/jquery.3.js" type="text/javascript"></script>

<script src="fat/fam/fu/jquery.uploadifive.min.js" type="text/javascript"></script>
<script src="fat/fam/fu/upload.js" type="text/javascript"></script>

<script type="text/javascript">
document.onreadystatechange = function() {
    if (document.readyState !== "complete") {
        document.querySelector("#screen").style.visibility = "none";
        document.querySelector("#bos-boot").style.visibility = "visible";
    } else {
        document.querySelector("#bos-boot").style.display = "none";
        document.querySelector("#screen").style.visibility = "visible";
    }
};
$(document).ready(function(){
	$('.fimgs .del').click(function(){
		var id = $(this).data('fid');
		var aElement_href = $('#fid_imgs_'+id ).attr("data-path");
		$.ajax({
			url: 'delete.php', type: 'post', data: {path: aElement_href},
			success: function(response){
				if(response == 1){
					$("#fid_thumb_imgs_" + id).attr("src","bat/css/images/deleted.png");
				} else { $("#fid_thumb_imgs_" + id).attr("src","bat/css/images/error.jpg");}
			}
		});
	});
	$('.faud .del').click(function(){
		var id = $(this).data('fid');
		var aElement_href = $('#fid_aud_'+id ).attr("data-path");
		$.ajax({
			url: 'delete.php', type: 'post', data: {path: aElement_href},
			success: function(response){
				if(response == 1){
					$("#fid_thumb_aud_" + id).attr("src","bat/css/images/deleted.png");
				} else { $("#fid_thumb_aud_" + id).attr("src","bat/css/images/error.jpg");}
			}
		});
	});
	$('.fvid .del').click(function(){
		var id = $(this).data('fid');
		var aElement_href = $('#fid_vid_'+id ).attr("data-path");
		$.ajax({
			url: 'delete.php', type: 'post', data: {path: aElement_href},
			success: function(response){
				if(response == 1){
					$("#fid_thumb_vid_" + id).attr("src","bat/css/images/deleted.png");
				} else { $("#fid_thumb_vid_" + id).attr("src","bat/css/images/error.jpg");}
			}
		});
	});
	$('.fdocs .del').click(function(){
		var id = $(this).data('fid');
		var aElement_href = $('#fid_docs_'+id ).attr("data-path");
		$.ajax({
			url: 'delete.php', type: 'post', data: {path: aElement_href},
			success: function(response){
				if(response == 1){
					$("#fid_thumb_docs_" + id).attr("src","bat/css/images/deleted.png");
				} else { $("#fid_thumb_docs_" + id).attr("src","bat/css/images/error.jpg");}
			}
		});
	});
	$('.fmisc .del').click(function(){
		var id = $(this).data('fid');
		var aElement_href = $('#fid_misc_'+id ).attr("data-path");
		$.ajax({
			url: 'delete.php', type: 'post', data: {path: aElement_href},
			success: function(response){
				if(response == 1){
					$("#fid_thumb_misc_" + id).attr("src","bat/css/images/deleted.png");
				} else { $("#fid_thumb_misc_" + id).attr("src","bat/css/images/error.jpg");}
			}
		});
	});
	$('.fmyf .del').click(function(){
		var id = $(this).data('fid');
		var aElement_href = $('#fid_myf_'+id ).attr("data-path");
		$.ajax({
			url: 'delete.php', type: 'post', data: {path: aElement_href},
			success: function(response){
				if(response == 1){
					$("#fid_thumb_myf_" + id).attr("src","bat/css/images/deleted.png");
				} else { $("#fid_thumb_myf_" + id).attr("src","bat/css/images/error.jpg");}
			}
		});
	});
	$('.fmypix .del').click(function(){
		var id = $(this).data('fid');
		var aElement_href = $('#fid_mypix_'+id ).attr("data-path");
		$.ajax({
			url: 'delete.php', type: 'post', data: {path: aElement_href},
			success: function(response){
				if(response == 1){
					$("#fid_thumb_mypix_" + id).attr("src","bat/css/images/deleted.png");
				} else { $("#fid_thumb_mypix_" + id).attr("src","bat/css/images/error.jpg");}
			}
		});
	});
	$('.fmyaud .del').click(function(){
		var id = $(this).data('fid');
		var aElement_href = $('#fid_myaud_'+id ).attr("data-path");
		$.ajax({
			url: 'delete.php', type: 'post', data: {path: aElement_href},
			success: function(response){
				if(response == 1){
					$("#fid_thumb_myaud_" + id).attr("src","bat/css/images/deleted.png");
				} else { $("#fid_thumb_myaud_" + id).attr("src","bat/css/images/error.jpg");}
			}
		});
	});
	$('.fmyvid .del').click(function(){
		var id = $(this).data('fid');
		var aElement_href = $('#fid_myvid_'+id ).attr("data-path");
		$.ajax({
			url: 'delete.php', type: 'post', data: {path: aElement_href},
			success: function(response){
				if(response == 1){
					$("#fid_thumb_myvid_" + id).attr("src","bat/css/images/deleted.png");
				} else { $("#fid_thumb_myvid_" + id).attr("src","bat/css/images/error.jpg");}
			}
		});
	});
	$('.ftrash .del').click(function(){
		var id = $(this).data('fid');
		var aElement_href = $('#fid_trash_'+id ).attr("data-path");
		$.ajax({
			url: 'delete.php', type: 'post', data: {path: aElement_href},
			success: function(response){
				if(response == 1){
					$("#fid_thumb_trash_" + id).attr("src","bat/css/images/deleted.png");
				} else { $("#fid_thumb_trash_" + id).attr("src","bat/css/images/error.jpg");}
			}
		});
	});
});
</script>
</head> 
<body> 
<div id="bos-boot"><img src="sat/bos-boot-300.gif" alt="Booting BOS"/></div>
<div class="container-fluid" id="screen">
	<div class="block-wrap">
		<div class="block bw20 xs-100 sm-100 md-100">
			<ul class="tiles lucida core-tiles-top sliced-corner" style="margin-top: 1em;">
				<li class="op-tab" data-panelid="bos" data-pos="top" style="min-width: 180px;">BOS <span class="ver">BETA</span></li>
			</ul>
			<div class="black-t-s" style="margin-left: 0.5em; font-size: 18px;">
				<a href="#help" data-modal-open><i class="bi bi-help bi-2x"></i></a>
				<a href="<?php echo $bdir;?>" target="_blank"><i class="bi bi-global bi-2x"></i></a>
			</div>
		</div>
		<div class="block bw50 xs-100 sm-100 md-100 impact">
			<?php if(($ugroup=='administrator')||($ugroup=="BOS Admin")){?>
			<div class="blonk blnk02 allcaps hue-h op-tab" data-panelid="pages" data-pos="left">
				<span class="cntr"></span><span><i class="bi bi-file bi-2x"></i><br />Pages</span>
			</div>
			<?php if($jack!==''){?>
			<div class="blonk blnk04 allcaps op-tab hue-h" data-panelid="jack" data-pos="right">
				<span class="cntr"></span><span class="slime-t apple-t-s"><i class="bi bi-join bi-2x"></i><br />JACK</span>
			</div>
			<?php }} ?>
			
			<div class="blonk blnk02 allcaps hue-h op-tab" data-panelid="fam" data-pos="left">
				<span class="cntr"></span><span><i class="bi bi-folder bi-2x"></i><br />FAM</span>
			</div>
			
			<?php if(($ugroup=='administrator')||($ugroup=='BOS Admin')||($ugroup=='editor')){if($paws!==''){ ?>
			<div class="blonk blnk02 allcaps op-tab hue-h" data-panelid="paws" data-pos="top">
				<span class="cntr"></span><span class="banana-t"><i class="bi bi-compose bi-2x"></i><br />PAWS</span>
			</div>
			<?php }} ?>
			
			<?php if(($ugroup=='administrator')||($ugroup=='BOS Admin')){ if($dick!==''){ ?>
			<div class="blonk blnk04 allcaps op-tab hue-h" data-panelid="dick" data-pos="right">
				<span class="cntr"></span><span class="lemon-t black-t-s"><i class="bi bi-sol bi-2x"></i><br />DICK</span>
			</div><?php }} ?>
			
			<?php if(($ugroup=='BOS Admin')||($ugroup=='administrator')||($ugroup=='editor')){ if($cad!==''){?>
			<div class="blonk blnk04 allcaps op-tab hue-h" data-panelid="cad" data-pos="right">
				<span class="cntr"></span><span class="rice-t denim-t-s"><i class="bi bi-article bi-2x"></i><br />CAD</span>
			</div><?php }} if($mad!==''){ ?>
			<div class="blonk blnk02 allcaps hue-h op-tab" data-panelid="mad" data-pos="left">
				<span class="cntr"></span><span class="black-t purple-neon-t-s"><i class="bi bi-2x bi-target"></i><br />MAD</span>
			</div><?php } if($slides!==''){?>
			<div class="blonk blnk04 allcaps op-tab hue-h" data-panelid="slides" data-pos="right">
				<span class="cntr"></span><span class="purple-t-s poolwater-t"><i class="bi bi-computer bi-2x"></i><br />SLIDES</span>
			</div><?php } if($edu!==''){?>
			<div class="blonk blnk04 allcaps hue-h op-tab" data-panelid="edu" data-pos="left">
				<span class="cntr"></span><span class="apple-t-s"><i class="bi bi-edu bi-2x"></i><br />EDU</span>
			</div><?php } if($shop!==''){?>
			<div class="blonk blnk04 allcaps hue-h op-tab" data-panelid="shop" data-pos="left">
				<span class="cntr"></span><span class="mint-t charcoal-t-s"><i class="bi bi-cart bi-2x"></i><br />SHOP</span>
			</div><?php } ?>
			
			<?php if(($ugroup=='administrator')||($ugroup=='BOS Admin')){?>
			<div class="blonk blnk04 allcaps hue-h op-tab" data-panelid="blueprint" data-pos="left">
				<span class="cntr"></span><span class="azure-t rice-t-s"><i class="bi bi-grid bi-2x"></i><br />BLUEPRINT</span>
			</div><?php } ?>
			
			<?php if($crude!==''){ if(($ugroup=='administrator')||($ugroup=='BOS Admin')||($ugroup=='editor')){ ?>
			<div class="blonk blnk04 allcaps hue-h op-tab" data-panelid="crude" data-pos="left">
				<span class="cntr"></span><span class="rice-t azure-t-s"><i class="bi bi-save bi-2x"></i><br />CRUDE</span>
			</div><?php }} ?>
			
			<?php if(($ugroup=='administrator')||($ugroup=="BOS Admin")){?>
			<div class="blonk blnk04 allcaps hue-h op-tab" data-panelid="pad" data-pos="left">
				<span class="cntr"></span><span class="charcoal-t-s"><i class="bi bi-lock bi-2x"></i><br />PAD</span>
			</div>
			<div class="blonk blnk04 allcaps hue-h op-tab" data-panelid="sad" data-pos="left">
				<span class="cntr"></span><span><i class="bi bi-tools bi-2x"></i><br />SAD</span>
			</div>
			<?php if($hapi!==''){ ?>
			<div class="blonk blnk02 allcaps hue-h op-tab" data-panelid="hapi" data-pos="left">
				<span class="cntr"></span><span><i class="bi bi-hub bi-2x"></i><br />HAPI</span>
			</div>
			<?php }} ?>
			
			<?php if($ugroup=='BOS Admin'){ ?>
			<a href="<?php echo $bdir; ?>bos/sat/sedit/index.php" target="_blank" class="blonk blnk04 allcaps hue-h">
				<span class="cntr"></span><span><i class="bi bi-file-edit bi-2x"></i><br />SEDIT</span>
			</a><?php } ?>

		</div>
		<div class="block bw30 xs-100 sm-100 md-100">
			<div class="padded">
				<div class="padded bevel" style="background: rgba(0,0,0,0.5); width: 100%; border: 2px solid #333; border-radius: 6px; -webkit-border-radius: 6px;">
					<h1 class="lucida red-t unset-bg brdr-s-t charcoal-b" style="font-size: 1.33em; padding: 6px; margin: 0; border-radius: 3px; -webkit-border-radius: 3px;">
						<span class="purple-neon-t-s plum-t">$_WHOAMI: </span><span class="blink red-neon-t-s black-t">
						<?php echo $_SESSION['userName']; ?></span>
					</h1>
					<div class="triangle-light anim-bg-neon tritekpane" style="margin-bottom: 1em;">
						<div class="crudecore-home lucida">
							<a href="#" class="btn mypad op-tab" data-panelid="profile" data-pos="fade">My PAD</a>
							<a href="logout.php" class="btn">LOGOUT &raquo;</a>
						</div>
					</div>
					<div class="mytaskbar flow-text smoke-t">
						<a href="#mynotepad" data-modal-open><i class="bi bi-clipboard"></i></a>&nbsp;<a href="#fuquickly"  data-modal-open><i class="bi bi-upload"></i></a>&nbsp;
						<a href="#myfolder" data-modal-open><i class="bi bi-folder"></i></a>&nbsp;|&nbsp;
						<a href="javascript:void(0);" data-panelid="change-password" data-pos="top" class="op-tab"><i class="bi bi-key"></i></a>&nbsp;
					</div>
				</div>
			</div>
		</div>
	</div>

	
</div>

<!-- OPENPANEL STATION -->
<div id="op-station">
	<!-- BOS Panel -->
	<?php include 'sat/bos-ui/bos.php'; ?>
	
	<!-- SAD Module -->
	<?php include 'sat/bos-ui/sad.php';
	include 'sat/bos-ui/sad/module.php'; ?>
	
	<!-- My PAD Panel -->
	<?php include 'sat/bos-ui/profile.php';
	include 'sat/bos-ui/mypad/module.php';?>
	
	<!-- FAM Module -->
	<?php include 'sat/bos-ui/fam.php';
	include 'sat/bos-ui/fam/module.php'; ?>
	
	<?php if(($ugroup=='administrator')||($ugroup=="BOS Admin")){ ?>
		<!-- PAGES Panel -->
		<?php include 'fat/pages/module.php'; ?>
		<!-- BLUEPRINT Panel -->
		<?php include 'bat/blueprint/module.php'; ?>
		<!-- PAD Module -->
		<?php include 'pat/pad/module.php';
		if($hapi!==''){?>
		<!-- HAPI Module -->
		<?php include 'hat/hapi/module.php';}
		if($jack!==''){?>
		<!-- JACK Panel -->
		<?php include 'cat/jack/module.php';} ?>
	<?php } if($paws!==''){ ?>
	<!-- PAWS Panel -->
	<?php include 'cat/paws/module.php'; }
	if(($ugroup=='administrator')||($ugroup=='BOS Admin')||($ugroup=='editor')){
	if($cad!==''){ ?>
	<!-- CAD Panel -->
	<?php include 'cat/cad/module.php';}
	if($dick!==''){?>
	<!-- DICK Panel -->
	<?php include 'cat/dick/module.php'; }
	if($crude!==''){?>
	<!-- CRUDE Panel -->
	<?php include 'dat/crude/module.php'; }}
	if($edu!==''){?>
	<!-- EDU Panel -->
	<?php include 'mat/edu/module.php'; }
	if($shop!==''){?>
	<!-- SHOP Panel -->
	<?php include 'mat/shop/module.php'; }
	if($mad!==''){ ?>
	<!-- MAD Panel -->
	<?php include 'mat/mad/module.php'; }
	if($slides!==''){ ?>
	<!-- SLIDES Panel -->
	<?php include 'mat/slides/module.php'; }?>
	
</div>
<!-- END OPENPANEL STATION -->

<!-- MY NOTEPAD -->
<div id="mynotepad" style="display:none;">
	<div class="container" style="max-width: 620px;">
		<h4 class="lucida clean charcoal-t red-t-s flow-text" style="margin: 0; padding: 0.5em;"><i class="bi bi-clipboard"></i> My Notepad</h4>
		<div class="unset-bg padded courier"><div class="padded rice charcoal-t times">
			<?php if($mynotes!=''){echo $mynotes;}else{echo '[empty notepad]';} ?>
		</div><a href="#" class="btn smoke charcoal-t lucida brdr-s-t charcoal-b op-tab" data-panelid="edit-profile" data-pos="left"><i class="bi bi-edit"></i> Edit</a></div>
	</div>
</div>

<!-- FAM Helper Modal -->
<div id="fam-helper" style="display:none;">
	<div class="container" style="max-width: 620px;">
		<div class="padded info">
			<h4 class="lucida charcoal-t flow-text" style="margin: 0; padding: 8px;"><i class="bi bi-help"></i> FAM Help</h4><hr />
			<p class="lucida">To open and view a file, simply click on the file title. The estimated file size is displayed in the grey box.<br /><br />
			<span class="purple" style="padding: 4px;"><i class="bi bi-clipboard"></i></span> = copies the relative file URL to clipboard. This value can be pasted anywhere.<br /><br />
			<span class="red yellow-t" style="padding: 4px;"><i class="bi bi-delete"></i></span> = permanently deletes the file in one click<br /><br />
		</div>
	</div>
</div>

<!-- FU Quickly Modal -->
<div id="fuquickly" style="display:none;">
	<div class="container" style="max-width: 768px;">
		<h4 class="lucida clean charcoal-t red-t-s flow-text" style="margin: 0; padding: 0.5em;"><i class="bi bi-upload"></i> FU | <small><em>Quick Access</em></small></h4>
		<div class="unset-bg padded courier">
			<p class="lime-t bold" style="font-size: 1.25em; margin-bottom: -1em;">Upload files to...</p>
			<div class="block-wrap">
				<div class="block bw50 padded">
					<ul class="tiles folderlist">
						<li class="bw100"><a href="javascript:void(0);" class="op-tab" data-panelid="fam-fu-imgs" data-pos="fade"><i class="bi bi-image"></i> Images </a></li>
						<li class="bw100"><a href="javascript:void(0);" class="op-tab" data-panelid="fam-fu-aud" data-pos="fade"><i class="bi bi-audio"></i> Audio </a></li>
						<li class="bw100"><a href="javascript:void(0);" class="op-tab" data-panelid="fam-fu-vid" data-pos="fade"><i class="bi bi-video"></i> Video </a></li>
						<li class="bw100"><a href="javascript:void(0);" class="op-tab" data-panelid="fam-fu-docs" data-pos="fade"><i class="bi bi-file"></i> Documents </a></li>
						<li class="bw100"><a href="javascript:void(0);" class="op-tab" data-panelid="fam-fu-misc" data-pos="fade"><i class="bi bi-wonder"></i> Other </a></li>
					</ul>
				</div>
				<div class="block bw50 padded">
					<ul class="tiles folderlist">
						<li class="bw100"><a href="javascript:void(0);" class="op-tab" data-panelid="fam-fu-myfiles" data-pos="fade"><i class="bi bi-folder"></i> My Files </a></li>
						<li class="bw100"><a href="javascript:void(0);" class="op-tab" data-panelid="fam-fu-myphotos" data-pos="fade"><i class="bi bi-camera"></i> My Photos </a></li>
						<li class="bw100"><a href="javascript:void(0);" class="op-tab" data-panelid="fam-fu-myaudio" data-pos="fade"><i class="bi bi-audio"></i> My Audio </a></li>
						<li class="bw100"><a href="javascript:void(0);" class="op-tab" data-panelid="fam-fu-myvideo" data-pos="fade"><i class="bi bi-video"></i> My Videos </a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- FU Helper Modal -->
<div id="fu-helper" style="display:none;">
	<div class="container" style="max-width: 620px;"><div class="padded info">
		<h4 class="flow-text" style="margin-left: 0; padding: 0;">Allowed File Types</h4>
		<div class="block-wrap"><div class="block bw50">
			<p class="bold">IMAGES, MY PHOTOS:</p>
			<ul class="check bold" style="font-size: 0.9em; line-height: 140%; margin-left: 1.1em;">
				<li>.jpg / .jpeg</li><li>.png</li><li>.gif</li><li>.bmp</li><li>.svg</li><li>.tif / .tiff</li>
			</ul>
			<p class="bold">VIDEO:</p>
			<ul class="check bold" style="font-size: 0.9em; line-height: 140%; margin-left: 1.1em;">
				<li>.avchd</li><li>.avi</li><li>.flv</li><li>.mkv</li><li>.mov</li><li>.mp4</li><li>.webm</li><li>.wmv</li>
			</ul>
		</div><div class="block bw50">
			<p class="bold">AUDIO:</p>
			<ul class="check bold" style="font-size: 0.9em; line-height: 140%; margin-left: 1.1em;">
				<li>.aac</li><li>.aiff</li><li>.alac</li><li>.flac</li><li>.m4a</li><li>.mp3</li><li>.mp4</li><li>.ogg</li><li>.wav</li><li>.wma</li>
			</ul>
		</div></div>
		<p class="bold">DOCUMENTS, OTHER, MY FILES:</p>
		<ul class="check bold" style="font-size: 0.9em; line-height: 140%; margin-left: 1.1em;"><li>any file type</li></ul>
	</div></div>
</div>

<!-- My Folder Modal -->
<div id="myfolder" style="display:none;">
	<div class="container" style="max-width: 620px;">
		<h4 class="lucida clean charcoal-t red-t-s" style="margin: 0; padding: 0.5em;"><i class="bi bi-folder"></i> My Folder</h4>
		<div class="block-wrap">
			<div class="block bw100 no-padding">
				<div class="unset-bg padded courier">
					<p class="smoke-t flow-text"><strong>PATH: </strong><a href="<?php echo $bosdir;?>pat/users/<?php echo $_SESSION['userName'];?>/" class="link" target="_blank">pat/users/<?php echo $_SESSION['userName']; ?>/</a></p>
					<ul class="tiles files folderlist">
						<li class="bw100"><a href="javascript:void(0);" class="op-tab" data-panelid="my_files" data-pos="left"><i class="folder-archive"></i> My Files <span class="fcount"><?php echo $fc_myfiles; ?></span></a></li>
						<li class="bw100"><a href="javascript:void(0);" class="op-tab" data-panelid="my_photos" data-pos="left"><i class="folder-photo"></i> My Photos <span class="fcount"><?php echo $fc_mypix; ?></span></a></li>
						<li class="bw100"><a href="javascript:void(0);" class="op-tab" data-panelid="my_audio" data-pos="left"><i class="folder-music"></i> My Audio <span class="fcount"><?php echo $fc_myaud; ?></span></a></li>
						<li class="bw100"><a href="javascript:void(0);" class="op-tab" data-panelid="my_videos" data-pos="left"><i class="folder-video"></i> My Videos <span class="fcount"><?php echo $fc_myvid; ?></span></a></li>
						<li class="bw100"><a href="javascript:void(0);" class="op-tab" data-panelid="my_data" data-pos="left"><i class="folder-classic"></i> My Data <span class="fcount"><?php echo $fc_mydata; ?></span></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Help modal -->
<div id="help" style="display:none;">
	<div class="container" style="max-width: 620px;">
		<h4 class="lucida clean flow-text charcoal-t red-t-s" style="margin: 0; padding: 0.5em;"><i class="bi bi-help"></i> Help Center</h4>
		<div class="block-wrap">
			<div class="block bw100 no-padding">
				<div class="violence padded" style="min-height: 120px;">
					<ul class="tiles thirds center lucida">
						<li class="brdr-s-t charcoal-b"><a href="http://docs.brutalcms.com" target="_blank">Reference Guides</a></li>
						<li class="brdr-s-t charcoal-b"><a href="https://github.com/pinecreativelabs/BrutalCMS" target="_blank">Github</a></li>
						<li class="brdr-s-t charcoal-b"><a href="https://www.brutalboard.net/" target="_blank">Brutal Board</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Initiate modal -->
<div class="modal">
	<div class="modal-inner draggable">
		<span data-modal-close>&times;</span>
		<div class="modal-content"></div>
	</div>
</div>

<!-- BOS UI -->
<script type="text/javascript" src="bat/jab/bos-ui.js"></script>
<script type="text/javascript">
$(window).on('load', function(){
	$('body').openpanel({
		animSpeed: 400, enableKeys: true
	});
});
</script>

<script src="bat/jab/brutalist.js"></script>
<script src="bat/jab/start.brutalizing.js"></script>
<script src="bat/jab/jab.js" type="text/javascript"></script>

</body>
</html>