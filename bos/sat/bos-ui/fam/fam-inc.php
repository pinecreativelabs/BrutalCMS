<?php 
$pdir = realpath(__DIR__. '/../../..');

if($fam_cm=='relative'){
$incdir = 'rat/repo/incoming/';
} else {$incdir = $bosdir.'rat/repo/incoming/';}

$incpath = $pdir.'/rat/repo/incoming/';

$files1 = scandir($incpath);
$fc_inc = count($files1)-2;
if(($fc_inc>=51)&&($fc_inc<=150)){$fcinc_pag = 10;}
elseif(($fc_inc>=151)&&($fc_inc<=300)){$fcinc_pag = 15;}
elseif(($fc_inc>=301)&&($fc_inc<=400)){$fcinc_pag = 20;}
elseif($fc_inc>400){$fcinc_pag = 25;}
else {$fcinc_pag = 5;}
?>

	<div id="fam-inc" class="op-panel charcoal">
		<div class="op-panelctrl solid-black">
			<div data-close="fam-inc" class="op-panelbt op-bt-close">
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
							<h3 class="lucida bold" style="font-size: 2.5em; "><i class="bi bi-down-right"></i> FAM / Incoming Files</h3>
							<h4 class="lucida heavy flow-text"><?php echo $fc_inc; ?> files</h4>
						</div>
					</div>
					<div class="block bw25 md-100 sm-100 xs-100 center"></div>
				</div>
				<div class="block-wrap">
					<div class="block bw75 md-100 sm-100 xs-100" style="padding: 1em 2em 1em 0;">
						<p class="smoke-t padded warning">
							<span class="bold lucida" style="font-size: 0.95em;">Working directory:</span><br />
							<span style="font-size:1.25em;" class="arial"><?php echo $incpath;?></span>
							<a href="#fam-helper" data-modal-open style="float:right; display:inline-block; font-size: 28px;"><i class="bi bi-help"></i></a>
						</p>
						<!--<div class="padded unset-bg" style="margin-bottom: 0.33em;">
							<input type="checkbox" id="checkAll" /><label>Select All</label>
							<input type="submit" id="submit" name="createzip" value="Download All Seleted Files" >
						</div>-->
						
						<div class="paginate-<?php echo $fcinc_pag;?> file-list" style="margin-left: 0; padding: 0.5em; max-width: 90%;">
						  <div class="lucida rice-t items">
							<?php if (is_dir($incpath)){
							if ($opendirectory = opendir($incpath)){
							$fid = 0;
							while (($file = readdir($opendirectory)) !== false){
								if(is_file($incpath.$file)){
									$fid++;
									$fsbytes=filesize($incpath.$file);
									if ($fsbytes >= 1073741824){$fsize = number_format($fsbytes / 1073741824, 2) . '<br />GB';}
									elseif ($fsbytes >= 1048576){$fsize = number_format($fsbytes / 1048576, 2) . '<br />MB';}
									elseif ($fsbytes >= 1024){$fsize = number_format($fsbytes / 1024, 0) . '<br />KB';}
									elseif ($fsbytes > 1){$fsize = $fsbytes . '<br />bytes';}
									elseif ($fsbytes == 1){$fsize = $fsbytes . '<br />byte';} 
									else{$fsize = '0<br />bytes';}
									$filepath = $incpath.$file;
									$ext = pathinfo($filepath, PATHINFO_EXTENSION);
									$ftarray = array("accdb","avi","bmp","csv","doc","docx","eps","fla","flac","indd","mov","mp3","mp4","mpeg","midi","ogg","pdf","pptx","psd","pub","rar","sql","tiff","txt","vsd","wav","wma","wmv","xls","xlsx","xml","zip");
									echo "<div class=\"fi finc\">";
									//<div class=\"chk\"><input class=\"chki\" type=\"checkbox\" id=\"\" name=\"files[]\" value=\"".$file."\"></div>
									echo "<div class=\"thumb\">";
									if ((exif_imagetype($incdir.$file)==true)||($ext=="svg")){ 
										echo "<img src=\"".$incdir.$file."\" class=\"tiny-thumb crop\" id=\"fid_thumb_inc_".$fid."\" />";
									} elseif(in_array($ext,$ftarray)){
										echo "<img src=\"fat/fam/icons/".$ext.".png\" class=\"tiny-thumb crop\" id=\"fid_thumb_inc_".$fid."\" />";
									}
									else { echo "<img src=\"bat/css/images/nif.png\" class=\"tiny-thumb crop\" id=\"fid_thumb_inc_".$fid."\" />";}
									echo "</div><a href=\"".$incdir.$file."\" target=\"_blank\" id=\"fid_inc_".$fid."\">".$file."</a><div class=\"fsize\">".$fsize."</div>
									<div class=\"copier copy-attr\" data-copy-on-click=\"#fid_inc_".$fid."\"><i class=\"bi bi-clipboard\"></i></div></div>";
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
							<li><a href="javascript:void(0);" data-panelid="fam-aud" data-pos="right" class="op-tab">
								<span class="title"><i class="bi bi-image"></i> Image Files</span>
							</a></li>
							<li><a href="javascript:void(0);" data-panelid="fam-aud" data-pos="right" class="op-tab">
								<span class="title"><i class="bi bi-audio"></i> Audio Files</span>
							</a></li>
							<li><a href="javascript:void(0);" data-panelid="fam-vid" data-pos="right" class="op-tab">
								<span class="title"><i class="bi bi-video"></i> Video Files</span>
							</a></li>
							<li><a href="javascript:void(0);" data-panelid="fam-docs" data-pos="right" class="op-tab">
								<span class="title"><i class="bi bi-file"></i> Document Files</span>
							</a></li>
							<li><a href="javascript:void(0);" data-panelid="fam-other" data-pos="right" class="op-tab">
								<span class="title"><i class="bi bi-wonder"></i> Other Files</span>
							</a></li>
							<li><a href="#myfolder" data-modal-open><span class="title"><i class="bi bi-folder"></i> My Folder</span></a></li>
						</ul>
					</div>
				</div>
			</div>
			</form>
        </div>
    </div>