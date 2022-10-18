<?php 
$pdir = realpath(__DIR__. '/../../..');

if($fam_cm=='relative'){
$myviddir = 'pat/users/'.$_SESSION['userName'].'/video/';
} else {$myviddir = $bosdir.'pat/users/'.$_SESSION['userName'].'/video/';}

$myvidpath = $pdir.'/pat/users/'.$_SESSION['userName'].'/video/';

$files6v = scandir($myvidpath);
$fc_myvid = count($files6v)-2;
if(($fc_myvid>=51)&&($fc_myvid<=150)){$fcmyv_pag = 10;}
elseif(($fc_myvid>=151)&&($fc_myvid<=300)){$fcmyv_pag = 15;}
elseif(($fc_myvid>=301)&&($fc_myvid<=400)){$fcmyv_pag = 20;}
elseif($fc_myvid>400){$fcmyv_pag = 25;}
else {$fcmyv_pag = 5;}
?>

	<div id="my_videos" class="op-panel charcoal">
		<div class="op-panelctrl solid-black">
			<div data-close="my_videos" class="op-panelbt op-bt-close">
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
        <div class="op-panelform smoke-t">
			<form name="zips" action="" method="post">
			<div class="container-fluid">
				<div class="block-wrap">
					<div class="block bw75 md-100 sm-100 xs-100">
						<div class="clean chonk fossil-t charcoal-t-s" style="padding: 0px 16px 8px 16px; display: inline-block; margin: 0 1.5em 0 0; min-width: 33vw;">
							<h3 class="lucida bold" style="font-size: 2.5em; "><i class="bi bi-video"></i> My Videos</h3>
							<h4 class="lucida heavy flow-text"><?php echo $fc_myvid; ?> files</h4>
						</div>
					</div>
					<div class="block bw25 md-100 sm-100 xs-100 center">
						<ul class="tiles lucida black-t-s" style="margin: 0 auto; padding: 0.5em; max-width: 300px;">
							<li style="text-align: left;"><a href="javascript:void(0);" data-panelid="fam-fu-myvideo" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-upload"></i> Upload Files</span>
							</a></li>
						</ul>
					</div>
				</div>
				<div class="block-wrap">
					<div class="block bw75 md-100 sm-100 xs-100" style="padding: 1em 2em 1em 0;">
						<p class="smoke-t padded warning">
							<span class="bold lucida" style="font-size: 0.95em;">Working directory:</span><br />
							<span style="font-size:1.25em;" class="arial"><?php echo $myvidpath;?></span>
							<a href="#fam-helper" data-modal-open style="float:right; display:inline-block; font-size: 28px;"><i class="bi bi-help"></i></a>
						</p>
						<!--<div class="padded unset-bg" style="margin-bottom: 0.33em;">
							<input type="checkbox" id="checkAll" /><label>Select All</label>
							<input type="submit" id="submit" name="createzip" value="Download All Seleted Files" >
						</div>-->
						
						<div class="paginate-<?php echo $fcmyv_pag;?> file-list" style="margin-left: 0; padding: 0.5em; max-width: 90%;">
						  <div class="lucida rice-t items">
							<?php if (is_dir($myvidpath)){
							if ($opendirectory = opendir($myvidpath)){
							$fid = 0;
							while (($file = readdir($opendirectory)) !== false){
								if(is_file($myvidpath.$file)){
									$fid++;
									$fsbytes=filesize($myvidpath.$file);
									if ($fsbytes >= 1073741824){$fsize = number_format($fsbytes / 1073741824, 2) . '<br />GB';}
									elseif ($fsbytes >= 1048576){$fsize = number_format($fsbytes / 1048576, 2) . '<br />MB';}
									elseif ($fsbytes >= 1024){$fsize = number_format($fsbytes / 1024, 0) . '<br />KB';}
									elseif ($fsbytes > 1){$fsize = $fsbytes . '<br />bytes';}
									elseif ($fsbytes == 1){$fsize = $fsbytes . '<br />byte';} 
									else{$fsize = '0<br />bytes';}
									$filepath = $myvidpath.$file;
									$ext = pathinfo($filepath, PATHINFO_EXTENSION);
									$ftarray = array("accdb","avi","bmp","csv","doc","docx","eps","fla","flac","indd","mov","mp3","mp4","mpeg","midi","ogg","pdf","pptx","psd","pub","rar","sql","tiff","txt","vsd","wav","wma","wmv","xls","xlsx","xml","zip");
									echo "<div class=\"fi fmyvid\">";
									//<div class=\"chk\"><input class=\"chki\" type=\"checkbox\" id=\"\" name=\"files[]\" value=\"".$file."\"></div>
									echo "<div class=\"thumb\">";
									if ((exif_imagetype($myviddir.$file)==true)||($ext=="svg")){ 
										echo "<img src=\"".$myviddir.$file."\" class=\"tiny-thumb crop\" id=\"fid_thumb_myvid_".$fid."\" />";
									} elseif(in_array($ext,$ftarray)){
										echo "<img src=\"fat/fam/icons/".$ext.".png\" class=\"tiny-thumb crop\" id=\"fid_thumb_myvid_".$fid."\" />";
									}
									else { echo "<img src=\"bat/css/images/nif.png\" class=\"tiny-thumb crop\" id=\"fid_thumb_myvid_".$fid."\" />";}
									echo "</div><a href=\"".$myviddir.$file."\" target=\"_blank\" data-path=\"".$filepath."\" id=\"fid_myvid_".$fid."\">".$file."</a><div class=\"fsize\">".$fsize."</div>
									<div class=\"copier copy-attr\" data-copy-on-click=\"#fid_myvid_".$fid."\"><i class=\"bi bi-clipboard\"></i></div>
									<div class=\"del\" data-fid=\"".$fid."\"><i class=\"bi bi-delete\"></i></div></div>";
								}} closedir($opendirectory);}}
							?>
						  </div>
						  <div class="pager">
							<div class="firstPage">first</div>
							<div class="previousPage">prev</div>
							<div class="pageNumbers"></div>
							<div class="nextPage">next</div>
							<div class="lastPage">last</div>
						  </div>
						</div>
						
					</div>
					<div class="block bw25 md-100 sm-100 xs-100" style="padding: 1em 2em 1em 0;">
						
						<h4 class="lucida fossil smoke-t flow-text chonk" style="margin-left: 0; padding: 0.5em; max-width: 90%;">Go to...</h4>
						<ul class="tiles lucida black-t-s">
							<li><a href="javascript:void(0);" data-panelid="my_photos" data-pos="right" class="op-tab">
								<span class="title"><i class="bi bi-image"></i> My Photos</span>
							</a></li>
							<li><a href="javascript:void(0);" data-panelid="my_audio" data-pos="right" class="op-tab">
								<span class="title"><i class="bi bi-audio"></i> My Audio</span>
							</a></li>
							<li><a href="javascript:void(0);" data-panelid="my_files" data-pos="right" class="op-tab">
								<span class="title"><i class="bi bi-file"></i> My Files</span>
							</a></li>
						</ul>
					</div>
				</div>
			</div>
			</form>
        </div>
    </div>