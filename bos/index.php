<?php
$system_page=true;
require_once('build/constructor.php');
require_once('molds/pad/module/common.php');
checkUser();
$current_user = $_SESSION['userName'];

// open user notepad
$mynp = 'app/users/'.$current_user.'/data/notepad.txt';
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

<!-- CORE CSS -->
<link href="core/css/construct.css" type="text/css" rel="stylesheet" />
<!-- BOS UI CSS -->
<link href="core/css/bos-ui.css" type="text/css" rel="stylesheet" />
<style>
.block iframe { 
	background-color: #000;
	background-image: url('core/css/bos-ui/loading.gif'); background-repeat: no-repeat; background-position: center center;
}
</style>
<script src="core/jab/jquery.3.js" type="text/javascript"></script>
<script src="core/jab/plugins/jquery.uploadifive.min.js" type="text/javascript"></script>
<script src="core/jab/plugins/upload.js" type="text/javascript"></script>

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
</script>
</head> 
<body> 
<div id="bos-boot"><img src="core/css/bos-ui/bos-boot-300.gif" alt="Booting BOS"/></div>
<div class="container-fluid" id="screen">
	<!-- BOS PANEL -->
	<ul class="tiles monolisk core-tiles-top sliced-corner layer-h inline-block">
		<li class="op-tab" data-panelid="bos" data-pos="top">BOS <span class="ver">3.1</span></li>
	</ul>
	<!-- SANDBAR -->
	<div class="sandbar sand fixed-b-l layer-m center">
		<div class="taskbar bossy inline-block pill charcoal-t b-s-t charcoal-b unset-bg charcoal-t-s">
			<a href="#help" data-modal-open><i class="bi bi-help"></i></a>
			<a href="#livesite" data-modal-open><i class="bi bi-computer sepia"></i></a>
			<a href="#backdoor" data-modal-open><i class="bi bi-door sepia"></i></a>
			<button class="reloadbtn" onclick="reloadPage() "><i class="bi bi-sync sepia"></i></button>
			<?php if(($user_pal=='2')||($user_pal=='3')){ ?><a href="<?php echo $bdir; ?>bos/sedit/index.php" target="_blank"><i class="bi bi-file-edit"></i></a><?php } ?>
		</div>
		<div class="taskbar inline-block pill charcoal-t b-s-t charcoal-b dune charcoal-t-s">
			<a href="#mynotepad" data-modal-open><i class="bi bi-clipboard"></i></a>&nbsp;<a href="#fu"  data-modal-open><i class="bi bi-upload"></i></a>&nbsp;
			<!--<a href="#myfolder" data-modal-open><i class="bi bi-folder"></i></a>&nbsp;-->
			<a href="javascript:void(0);" class="op-tab" data-panelid="fam-private" data-pos="left"><i class="bi bi-folder"></i></a>&nbsp;
			<a href="#notifier" data-modal-open><i class="bi bi-bell"></i></a>
		</div>
		<a href="#my-account" class="nb-btn pill right sepia" style="margin: 6px 12px 0 0;" data-modal-open><i class="bi bi-user"></i> Account</a>
	</div>
	
		<!--
		<div class="block bw30 xs-100 sm-100 md-100">	
			<ul class="tiles monolisk core-tiles-top sliced-corner" style="margin-top: 1em;">
				<li class="op-tab" data-panelid="bos" data-pos="top" style="min-width: 180px;">BOS <span class="ver">3.1</span></li>
			</ul>
			<div class="black-t-s" style="margin-left: 0.5em; font-size: 18px;">
				<a href="#help" data-modal-open><i class="bi bi-help bi-2x"></i></a>
				<a href="<?php echo $bdir;?>" target="_blank"><i class="bi bi-computer bi-2x"></i></a>
				<a href="backdoor.php" title="BOS Backdoor"><i class="bi bi-door bi-2x"></i></a>
				<?php if($ugroup=='BOS Admin'){ ?><a href="<?php echo $bdir; ?>bos/sat/sedit/index.php" target="_blank"><i class="bi bi-file-edit bi-2x"></i></a><?php } ?>
			</div>
			
			<div class="padded">
				<div class="padded sand" style="background: rgba(0,0,0,0.5); width: 100%; border: 2px solid #333; border-radius: 6px; -webkit-border-radius: 6px;">
					<h1 class="lime-t depixel unset-bg b-s-t charcoal-b" style="font-size: 1.33em; padding: 6px; margin: 0; border-radius: 3px; -webkit-border-radius: 3px;">
						$_whoami: <span class="blink"><?php echo $_SESSION['userName']; ?></span>
					</h1>
					<div class="triangle-light neon tritekpane" style="margin-bottom: 1em;">
						<div class="crudecore-home lucida">
							<a href="#" class="nb-btn pill op-tab" data-panelid="profile" data-pos="fade">My PAD</a>
							<a href="logout.php" class="nba-btn pill">LOGOUT &raquo;</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		-->
		
		<!-- WHOAMI TERMINAL WIDGET -->
		<div class="block-wrap monolisk">
		<div class="block padded center">
			<div class="lime-t depixel unset-bg b-s-t charcoal-b pill inline-block" style="padding: 6px; margin: 0; border-radius: 3px; -webkit-border-radius: 3px;">
				$_whoami: <span class="blink"><?php echo $_SESSION['userName']; ?></span>
			</div>
		</div></div>
		
		<div class="blonk-wrap monolisk">
			<!-- GENERAL ACCESS MODULES -->
			<?php if($draggable=='on'){?><div class="draggable-wrap"><?php } ?>
			<div class="blonk blnk02 allcaps hue-h op-tab mauve" data-panelid="fam-new" data-pos="left">
				<span class="cntr"></span><span><i class="bi bi-folder bi-2x"></i><br />FAM</span>
			</div><?php if($draggable=='on'){?><div class="drag-handle"></div></div><?php } ?>
			<?php if($paws=='true'){ if($draggable=='on'){?><div class="draggable-wrap"><?php } ?>
			<div class="blonk blnk02 allcaps op-tab hue-h" data-panelid="paws" data-pos="top">
				<span class="cntr"></span><span class="banana-t"><i class="bi bi-compose bi-2x"></i><br />PAWS</span>
			</div><?php if($draggable=='on'){?><div class="drag-handle"></div></div>
			<?php }} 
			if($ports=='true'){ if($draggable=='on'){?><div class="draggable-wrap"><?php } ?>
			<div class="blonk blnk04 hue-h op-tab" data-panelid="ports" data-pos="left">
				<span class="cntr"></span><span class="lemon-t black-t-s"><i class="bi bi-box-check bi-2x"></i><br />PORTS</span>
			</div><?php if($draggable=='on'){?><div class="drag-handle"></div></div>
			<?php }} 
			if($cad=='true'){ if($draggable=='on'){?><div class="draggable-wrap"><?php } ?>
			<div class="blonk blnk04 op-tab hue-h" data-panelid="cad" data-pos="right">
				<span class="cntr"></span><span class="rice-t denim-t-s"><i class="bi bi-article bi-2x"></i><br />CAD</span>
			</div><?php if($draggable=='on'){?><div class="drag-handle"></div></div>
			<?php }}
			if($storyboard=='true'){ if($draggable=='on'){?><div class="draggable-wrap"><?php } ?>
			<div class="blonk blnk04 op-tab hue-h" data-panelid="storyboard" data-pos="right">
				<span class="cntr"></span><span class="purple-t-s poolwater-t"><i class="bi bi-book-open bi-2x"></i><br />STORYboard</span>
			</div><?php if($draggable=='on'){?><div class="drag-handle"></div></div>
			<?php }} ?>
		
			<!-- EDITORIAL Modules -->
			<?php if(($user_pal=='1')||($user_pal=='2')||($user_pal=='3')){ ?>
			<?php if($dick=='true'){ if($draggable=='on'){?><div class="draggable-wrap"><?php } ?>
			<div class="blonk blnk04 op-tab hue-h" data-panelid="dick" data-pos="right">
				<span class="cntr"></span><span class="lemon-t black-t-s"><i class="bi bi-sol bi-2x"></i><br />DICK</span>
			</div><?php if($draggable=='on'){?><div class="drag-handle"></div></div>
			<?php }} 
			if($crude=='true'){ if($draggable=='on'){?><div class="draggable-wrap"><?php } ?>
			<div class="blonk blnk04 hue-h op-tab" data-panelid="crude" data-pos="left">
				<span class="cntr"></span><span class="rice-t azure-t-s"><i class="bi bi-save bi-2x"></i><br />CRUDE</span>
			</div><?php if($draggable=='on'){?><div class="drag-handle"></div></div>
			<?php }} 
			if($edu=='true'){ if($draggable=='on'){?><div class="draggable-wrap"><?php } ?>
			<div class="blonk blnk04 hue-h op-tab" data-panelid="edu" data-pos="left">
				<span class="cntr"></span><span class="apple-t-s"><i class="bi bi-edu bi-2x"></i><br />EDU</span>
			</div><?php if($draggable=='on'){?><div class="drag-handle"></div></div>
			<?php }} 
			if($mad=='true'){ if($draggable=='on'){?><div class="draggable-wrap"><?php } ?>
			<div class="blonk blnk02 hue-h op-tab" data-panelid="mad" data-pos="left">
				<span class="cntr"></span><span class="black-t purple-neon-t-s"><i class="bi bi-2x bi-target"></i><br /><strong>MAD</strong></span>
			</div><?php if($draggable=='on'){?><div class="drag-handle"></div></div>
			<?php }} 
			if($map=='true'){ if($draggable=='on'){?><div class="draggable-wrap"><?php } ?>
			<div class="blonk blnk04 hue-h op-tab" data-panelid="map" data-pos="left">
				<span class="cntr"></span><span class="taffy-t mahogany-t-s"><i class="bi bi-pinpoint bi-2x"></i><br />MAP</span>
			</div><?php if($draggable=='on'){?><div class="drag-handle"></div></div>
			<?php }} 
			if($shop=='true'){ if($draggable=='on'){?><div class="draggable-wrap"><?php } ?>
			<div class="blonk blnk04 hue-h op-tab" data-panelid="shop" data-pos="left">
				<span class="cntr"></span><span class="mint-t charcoal-t-s"><i class="bi bi-cart bi-2x"></i><br />SHOP</span>
			</div><?php if($draggable=='on'){?><div class="drag-handle"></div></div>
			<?php }} 
			if($tilt=='true'){ if($draggable=='on'){?><div class="draggable-wrap"><?php } ?>
			<div class="blonk blnk04 hue-h op-tab" data-panelid="tilt" data-pos="left">
				<span class="cntr"></span><span class="sky-t charcoal-t-s"><i class="bi bi-global bi-2x"></i><br />TILT</span>
			</div><?php if($draggable=='on'){?><div class="drag-handle"></div></div>
			<?php }}} ?>
			
			<?php if(($user_pal == '2')||($user_pal == '3')){ ?>
			<!-- ADMIN MODULES -->
			<?php if($draggable=='on'){?><div class="draggable-wrap"><?php } ?>
			<div class="blonk blnk04 hue-h op-tab" data-panelid="sad" data-pos="left">
				<span class="cntr"></span><span><i class="bi bi-tools bi-2x"></i><br />SAD</span>
			</div><?php if($draggable=='on'){?><div class="drag-handle"></div></div><?php } ?>

			<?php if($draggable=='on'){?><div class="draggable-wrap"><?php } ?>
			<div class="blonk blnk04 hue-h op-tab" data-panelid="pad-new" data-pos="left">
				<span class="cntr"></span><span class="charcoal-t-s"><i class="bi bi-lock bi-2x"></i><br />PAD</span>
			</div><?php if($draggable=='on'){?><div class="drag-handle"></div></div><?php } ?>
			
			<?php if($draggable=='on'){?><div class="draggable-wrap"><?php } ?>
			<div class="blonk blnk04 hue-h op-tab" data-panelid="blueprint" data-pos="left">
				<span class="cntr"></span><span class="azure-t rice-t-s"><i class="bi bi-grid bi-2x"></i><br />BLUEPRINT</span>
			</div><?php if($draggable=='on'){?><div class="drag-handle"></div></div><?php } ?>
			
			<?php if($draggable=='on'){?><div class="draggable-wrap"><?php } ?>
			<div class="blonk blnk02 allcaps hue-h op-tab" data-panelid="pages" data-pos="left">
				<span class="cntr"></span><span><i class="bi bi-file bi-2x"></i><br />Pages</span>
			</div><?php if($draggable=='on'){?><div class="drag-handle"></div></div><?php } ?>
			
			<?php if($draggable=='on'){?><div class="draggable-wrap"><?php } ?>
			<div class="blonk blnk04 hue-h op-tab" data-panelid="mob" data-pos="left">
				<span class="cntr"></span><span class="lemon-t red-t-s"><i class="bi bi-communist bi-2x"></i><br />MOB</span>
			</div><?php if($draggable=='on'){?><div class="drag-handle"></div></div><?php } ?>
			
			<?php if($hapi=='true'){ if($draggable=='on'){?><div class="draggable-wrap"><?php } ?>
			<div class="blonk blnk02 hue-h op-tab" data-panelid="hapi" data-pos="left">
				<span class="cntr"></span><span><i class="bi bi-hub bi-2x"></i><br />HAPI</span>
			</div><?php if($draggable=='on'){?><div class="drag-handle"></div></div>
			<?php }}
			if($jack=='true'){ if($draggable=='on'){?><div class="draggable-wrap"><?php } ?>
			<div class="blonk blnk04 allcaps op-tab hue-h" data-panelid="jack" data-pos="right">
				<span class="cntr"></span><span class="slime-t apple-t-s"><i class="bi bi-join bi-2x"></i><br />JACK</span>
			</div><?php if($draggable=='on'){?><div class="drag-handle"></div></div>
			<?php }}
			if($mydid=='true'){ if($draggable=='on'){?><div class="draggable-wrap"><?php } ?>
			<div class="blonk blnk04 hue-h op-tab" data-panelid="mydid" data-pos="left">
				<span class="cntr"></span><span class="rice-t azure-t-s"><i class="bi bi-database bi-2x"></i><br />MyDID</span>
			</div><?php if($draggable=='on'){?><div class="drag-handle"></div></div>
			<?php }}} ?>
		</div>
		
		<?php if(($ugroup=='administrator')||($ugroup=='BOS Admin')||($ugroup=='editor')){  } ?>
		<?php if(($ugroup=='administrator')||($ugroup=='BOS Admin')){ } ?>
		<?php if(($ugroup=='BOS Admin')||($ugroup=='administrator')||($ugroup=='editor')){ } ?>
		
	</div>
	
</div>

<!-- OPENPANEL STATION -->
<div id="op-station">
	<!-- BOS Panel -->
	<?php include 'build/constructors/bos-panel.php'; ?>
	<!-- My PAD Panel -->
	<?php include 'molds/pad/module_mypad.php'; ?>
	
	<?php if(($user_pal=='2')||($user_pal=='3')){ ?>
	<!-- SAD Module -->
	<?php include 'molds/sad/module.php'; ?>
	<!-- PAD Module -->
	<?php include 'molds/pad/module.php'; ?>
	<!-- PAGES Panel -->
	<?php include 'molds/pages/module.php'; ?>
	<!-- BLUEPRINT Panel -->
	<?php include 'molds/blueprint/module.php'; ?>
	<!-- MOB Panel -->
	<?php include 'molds/mob/module.php'; } ?>
	
	<!-- FAM Module -->
	<?php include 'molds/fam/module.php';?>	
	<!-- PAWS Panel -->
	<?php if($paws=='true'){ include 'molds/paws/module.php'; }?>
	<!-- PORTS Panel -->
	<?php if($ports=='true'){ include 'molds/ports/module.php'; }?>
	<!-- CAD Panel -->
	<?php if($cad=='true'){ include 'molds/cad/module.php'; }?>
	<!-- STORYboard Panel -->
	<?php if($storyboard=='true'){ include 'molds/storyboard/module.php'; }?>
	
	<?php if(($user_pal=='1')||($user_pal=='2')||($user_pal=='3')){ ?>
	<!-- DICK Panel -->
	<?php if($dick=='true'){ include 'molds/dick/module.php'; }?>
	<!-- CRUDE Panel -->
	<?php if($crude=='true'){ include 'molds/crude/module.php'; }?>
	<!-- EDU Panel -->
	<?php if($edu=='true'){ include 'molds/edu/module.php'; }?>
	<!-- MAD Panel -->
	<?php if($mad=='true'){ include 'molds/mad/module.php'; }?>
	<!-- MAP Panel -->
	<?php if($map=='true'){ include 'molds/map/module.php'; }?>
	<!-- SHOP Panel -->
	<?php if($shop=='true'){ include 'molds/shop/module.php'; }?>
	<!-- TILT Panel -->
	<?php if($tilt=='true'){ include 'molds/tilt/module.php'; }?>
	<?php } ?>
	<?php if(($user_pal=='2')||($user_pal=='3')){ ?>
	<!-- HAPI Module -->
	<?php if($hapi=='true'){ include 'molds/hapi/module.php'; }?>
	<!-- JACK Panel -->
	<?php if($jack=='true'){ include 'molds/jack/module.php'; }?>
	<!-- MyDID Module -->
	<?php if($mydid=='true'){ include 'molds/mydid/module.php'; }?>
	<?php } ?>
</div>
<!-- END OPENPANEL STATION -->

<!-- MY NOTEPAD -->
<div id="mynotepad" style="display:none;">
	<div class="container" style="max-width: 620px;">
		<h4 class="communist clean charcoal-t flow-text heavy" style="margin: 0; padding: 0.5em;"><i class="bi bi-clipboard sepia charcoal-t-s"></i> My Notepad</h4>
		<div class="unset-bg padded">
			<form method="post" class="notepad bos-form" id="mynotes">
				<input type="hidden" name="user" value="<?php echo $current_user;?>" id="uname" />
				<textarea name="mynotes" id="notepad" class="scrollbox parchment charcoal-t padded rounded box-s-k courier"><?php echo preg_replace('/\<br(\s*)?\/?\>/i', "\n",$mynotes); ?></textarea>
				<input type="button" value="Clear" class="nb-btn-small pill sepia bitstream" onclick="javascript:eraseText();">
				<input type="submit" class="nb-btn sepia pill bitstream" name="submit" value="SAVE" id="set-notepad" />
			</form>
			<div class="set_notepad_box" style="margin:10px 0px;"></div>
		</div>
	</div>
</div>

<!-- File Uploader (FU) Modal -->
<div id="fu" style="display:none;">
	<div class="container-960">
		<h4 class="sand charcoal-t monolisk flow-text heavy" style="margin: 0; padding: 0.5em;"><i class="bi bi-upload charcoal-t-s sepia"></i> File Uploader</h4>
		<div class="unset-bg padded">
			<!--<div class="block-wrap">
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
			</div>-->
			<div class="block-wrap"><div class="block bw67">
				<div class="tabs"> 
					<input type="radio" name="tabgroup1" id="fupublic" checked="checked">
					<label for="fupublic" class="depixel">Shared Files</label>
					<div class="tab terminal b-s-t">
						<p class="fu-note bitstream">Files will be uploaded to shared (public) files directory:<br /><span class="flow-text">/app/files/</span></p>
						<div class="fu padded terminal b-s-t">
							<input class="FU" type="file" path="app/files/" startOn="manually" buttonCaption="Upload" buttonClass="fu-fb" multi="true" afterUpload="link" maxSize="<?php echo $maxFileSize; ?>" />
						</div>
					</div>
					<input type="radio" name="tabgroup1" id="fumyfiles">
					<label for="fumyfiles" class="depixel">My Files</label>
					<div class="tab terminal b-s-t">
						<p class="fu-note bitstream">Files will be uploaded to your private files directory:<br /><span class="flow-text">/app/users/<?php echo $_SESSION['userName'];?>/files/</span></p>
						<div class="fu padded terminal b-s-t">
							<input class="FU" type="file" path="app/users/<?php echo $_SESSION['userName'];?>/files/" startOn="manually" buttonCaption="Upload" buttonClass="fu-fb" multi="true" afterUpload="link" maxSize="<?php echo $maxFileSize; ?>" />
						</div>
					</div>
					<input type="radio" name="tabgroup1" id="fuinfo">
					<label for="fuinfo" class="depixel"><i class="bi bi-info"></i></label>
					<div class="tab terminal b-s-t bitstream">
						<h4 class="flow-text" style="margin-left: 0; padding: 0;">Allowed File Types</h4>
						<p class="bold">Images &amp; AV:</p>
						<ul class="tags" style="font-size: 0.9em; line-height: 140%; margin-left: 1.1em;">
							<li>.jpg / .jpeg</li><li>.png</li><li>.gif</li><li>.bmp</li><li>.svg</li><li>.tif / .tiff</li>
							<li>.avchd</li><li>.avi</li><li>.flv</li><li>.mkv</li><li>.mov</li><li>.mp4</li><li>.webm</li><li>.wmv</li>
							<li>.aac</li><li>.aiff</li><li>.alac</li><li>.flac</li><li>.m4a</li><li>.mp3</li><li>.mp4</li><li>.ogg</li><li>.wav</li><li>.wma</li>
						</ul>
						<p class="bold">Documents, Data &amp; Other:</p>
						<ul class="tags" style="font-size: 0.9em; line-height: 140%; margin-left: 1.1em;">
							<li>.accdb</li><li>.csv</li><li>.doc / .docx</li><li>.pdf</li><li>.ppt / .pptx</li><li>.sql</li><li>.txt</li><li>.xml</li><li>.zip</li><li>* any filetype</li>
						</ul>
					</div>
				</div>
			</div><div class="block bw33"><div class="padded">
				<div class="terminal depixel b-s-t rounded padded">
					<p style="font-size: 14px;">Max file upload size:<br /><span style="font-size: 28px; font-weight: 600;"><?php echo $max_file_size;?>B</span></p>
					<hr class="thin lime" />
					<p style="font-size: 14px;">Memory limit:<br /><span style="font-size: 28px; font-weight: 600;"><?php echo $memory_limit;?>B</span></p>
					<hr class="thin lime" />
					<p style="font-size: 14px;">Available disk space:<br /><span style="font-size: 28px; font-weight: 600;"><?php echo $free_disk_space;?></span></p>
				</div>
			</div></div></div>
		</div>
	</div>
</div>

<!-- Backdoor Modal -->
<div id="backdoor" style="display: none;">
	<div class="padded terminal depixel" style="max-width: 320px;">
		<p style="margin-bottom: 1rem; text-align: center;"><span class="blink flow-text">WARNING!</span><br />You are about to enter the Backdoor!</p>
		<p class="center"><a href="backdoor.php" class="pill nb-btn lime-b terminal b-s-t">Continue &raquo;</a></p>
	</div>
</div>

<!-- LIVESITE Modal -->
<div id="livesite" style="display:none;">
	<div class="container" style="max-width: 468px;">
		<h4 class="sand charcoal-t monolisk heavy flow-text" style="margin: 0; padding: 0.5em;"><i class="bi bi-computer sepia charcoal-t-s"></i> Live Application</h4>
		<div class="unset-bg padded bitstream center">
			<a href="<?php echo $bdir;?>search.php" target="_blank" class="nb-btn pill sepia"><i class="bi bi-zoom-left"></i> Live Search</a><br />
			<a href="<?php echo $bdir;?>" target="_blank" class="nb-btn pill sepia">Go to Homepage <i class="bi bi-expand"></i></a><br />
			<a href="<?php echo $bdir;?>sitemap.xml" target="_blank" class="nb-btn pill sepia">View Sitemap.xml <i class="bi bi-expand"></i></a><br />
			<a href="<?php echo $bdir;?>profiles.php" target="_blank" class="nb-btn pill sepia">Public Profiles <i class="bi bi-expand"></i></a><br />
		</div>
	</div>
</div>

<!-- MY NOTIFIER MODAL -->
<div id="notifier" style="display:none;">
	<div class="sand padded" style="max-width: 468px;">
		<h4 class="depixel unset-bg lime-t rounded flow-text b-s-t charcoal-b" style="margin: 0; padding: 0.5em;">My Notifications</h4>
		<ul class="tiles bitstream">
			<li class="bw100"><a href="javascript:void(0);" class="op-tab" data-panelid="ports-tasks" data-pos="right"><i class="bi bi-bell sepia charcoal-t-s"></i> <span class="badge">11</span> Active Notifications</a></li>
			<li class="bw100"><a href="javascript:void(0);" class="op-tab" data-panelid="ports-tasks" data-pos="right"><i class="bi bi-box-check sepia charcoal-t-s"></i> <span class="badge zero">0</span> Uncompleted Tasks</a></li>
			<li class="bw100"><a href="javascript:void(0);" class="op-tab" data-panelid="paws" data-pos="right"><i class="bi bi-compose sepia charcoal-t-s"></i> <span class="badge">2</span> Expired Posts</a></li>
			<li class="bw100"><a href="javascript:void(0);" class="op-tab" data-panelid="storyboard" data-pos="right"><i class="bi bi-open-book sepia charcoal-t-s"></i> <span class="badge">3</span> Expired Stories</a></li>
			<li class="bw100"><a href="javascript:void(0);" class="op-tab" data-panelid="cad" data-pos="right"><i class="bi bi-article sepia charcoal-t-s"></i> <span class="badge">99</span> Expired Articles</a></li>
		</ul>
		<a href="javascript:void(0);" class="nb-btn-small pill sepia op-tab" data-panelid="edit-profile" data-pos="left"><i class="bi bi-add"></i> Create Notification</a>
	</div>
</div>

<!-- MY ACCOUNT MODAL -->
<div id="my-account" style="display:none;">
	<div class="sand padded" style="max-width: 320px;">
		<h4 class="depixel unset-bg lime-t rounded flow-text b-s-t charcoal-b" style="margin: 0; padding: 0.5em;">My Account</h4>
		<ul class="tiles bitstream charcoal-t-s">
			<li class="bw100"><a href="javascript:void(0);" class="op-tab" data-panelid="profile" data-pos="right"><i class="bi bi-edit sepia"></i> Edit Profile</a></li>
			<li class="bw100"><a href="javascript:void(0);" class="op-tab" data-panelid="my_avatar" data-pos="right"><i class="bi bi-user sepia"></i> Update Avatar</a></li>
			<li class="bw100"><a href="javascript:void(0);" class="op-tab" data-panelid="my_pw" data-pos="right"><i class="bi bi-primary-key sepia"></i> Change Password</a></li>
			<li class="bw100"><a href="javascript:void(0);" class="op-tab" data-panelid="my_streams" data-pos="right"><i class="bi bi-trident sepia"></i> Stream Manager</a></li>
		</ul>
		<a href="logout.php" class="nba-btn pill bitstream sepia full center">LOGOUT &raquo;</a>
	</div>
</div>

<!-- Help modal -->
<div id="help" style="display:none;">
	<div class="container" style="max-width: 468px;">
		<h4 class="sand flow-text charcoal-t monolisk heavy" style="margin: 0; padding: 0.5em;"><i class="bi bi-help sepia charcoal-t-s"></i> Help Center</h4>
		<div class="unset-bg bitstream padded">
			<ul class="tiles">
				<li class="b-s-t charcoal-b"><a href="https://www.brutalistwebdesign.com" target="_blank">Reference Guides</a></li>
				<li class="b-s-t charcoal-b"><a href="https://github.com/pinecreativelabs/Brutalist-Framework/issues" target="_blank">Github Issues</a></li>
				<li class="b-s-t charcoal-b"><a href="https://www.brutalistframework.com" target="_blank">BrutalistFramework.com</a></li>
			</ul>
		</div>
	</div>
</div>

<!-- Initiate modal -->
<div class="modal">
	<div class="modal-inner rounded b-s-t charcoal-b<?php if($draggable=='on'){?> draggable<?php } ?>">
		<span data-modal-close>&times;</span>
		<div class="modal-content"></div>
	</div>
</div>

<!-- BOS UI -->
<script src="core/jab/bos-ui.js" type="text/javascript"></script>
<script type="text/javascript">
$(window).on('load', function(){
	$('body').openpanel({
		animSpeed: 400, enableKeys: true
	});
});
// validate URL input
function is_url(str){
  regexp = /^(?:(?:https?|ftp):\/\/)?(?:(?!(?:10|127)(?:\.\d{1,3}){3})(?!(?:169\.254|192\.168)(?:\.\d{1,3}){2})(?!172\.(?:1[6-9]|2\d|3[0-1])(?:\.\d{1,3}){2})(?:[1-9]\d?|1\d\d|2[01]\d|22[0-3])(?:\.(?:1?\d{1,2}|2[0-4]\d|25[0-5])){2}(?:\.(?:[1-9]\d?|1\d\d|2[0-4]\d|25[0-4]))|(?:(?:[a-z\u00a1-\uffff0-9]-*)*[a-z\u00a1-\uffff0-9]+)(?:\.(?:[a-z\u00a1-\uffff0-9]-*)*[a-z\u00a1-\uffff0-9]+)*(?:\.(?:[a-z\u00a1-\uffff]{2,})))(?::\d{2,5})?(?:\/\S*)?$/;
        if (regexp.test(str)){return true;}
        else{return false;}
};
function eraseText() {document.getElementById("notepad").value = "";}
</script>
<script src="core/jab/plugins/pagination.js"></script>
<script src="core/jab/buix/modal.js"></script>
<?php if($draggable=='on'){?><script src="core/jab/plugins/draggable.js"></script><?php } ?>
<script>function reloadPage() {window.location.reload(true);}</script>
<script>
$(document).ready(function() {
	var delay = 2000;
	$('#set-notepad').click(function(e){
		e.preventDefault();
		var uname = $('#uname').val();
		var notepad = $('#notepad').val();
		$.ajax({
            type: "POST", url: "molds/pad/module/action_notepad_save.php",
            data: "uname="+uname+"&notepad="+notepad,
			beforeSend: function() {
				$('.set_notepad_box').html('<img src="core/files/images/loader.gif" width="200" height="44"/>');
			},		 
            success: function(data){
				setTimeout(function() {$('.set_notepad_box').html(data);}, delay);
            }
		});
	});
});
</script>
</body>
</html>