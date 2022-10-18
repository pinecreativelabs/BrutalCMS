<?php $maxFileSize = ini_get('upload_max_filesize');
$postMaxSize = ini_get('post_max_size');
$memLimit = ini_get('memory_limit');
$freebytes = disk_free_space(".");
$totbytes = disk_total_space(".");
$si_prefix = array( 'B', 'KB', 'MB', 'GB', 'TB', 'EB', 'ZB', 'YB' );
$bbase = 1024;
$freebitclass = min((int)log($freebytes , $bbase) , count($si_prefix) - 1);
$totbitclass = min((int)log($totbytes , $bbase) , count($si_prefix) - 1);
?>

	<div id="fam-fu-myaudio" class="op-panel charcoal">
		<div class="op-panelctrl solid-black">
			<div data-close="fam-fu-myaudio" class="op-panelbt op-bt-close">
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
			<div class="container-fluid">
				<div class="block-wrap">
					<div class="block b100">
						<div class="clean chonk fossil-t charcoal-t-s" style="padding: 0px 16px 8px 16px; display: inline-block; margin: 0 1.5em 0 0; min-width: 33vw;">
							<h3 class="lucida bold" style="font-size: 2.5em; "><i class="bi bi-upload"></i> FU</h3>
							<h4 class="lucida heavy flow-text">File Uploader | <i class="bi bi-audio"></i> My Audio</h4>
						</div>
					</div>
				</div>
				<div class="block-wrap">
					<div class="block bw25 md-100 sm-100 xs-100" style="padding: 1em 2em 1em 0;">
						
						<div class="info lucida padded" style="max-width: 90%;">
							<p>Max file upload size:<br /><span class="bold flow-text"><?php echo substr_replace($maxFileSize,' '.substr($maxFileSize, -1), -1); ?>B</span></p>
							<hr />
							<p>Memory limit:<br /><span class="bold flow-text"><?php echo substr_replace($memLimit,' '.substr($memLimit, -1), -1); ?>B</span></p>
							<hr />
							<p>Available disk space:<br /><span class="bold flow-text">
							<?php echo sprintf('%1.2f' , $freebytes / pow($bbase,$freebitclass)).' '.$si_prefix[$freebitclass];?></span></p>
						</div>


					</div>
					<div class="block bw50 md-100 sm-100 xs-100" style="padding: 1em 2em 1em 0;">
						<p class="smoke-t lucida padded warning" style="font-size: 1.1em;">All files will be uploaded to:<br />
							<span class="bigger bold">/pat/users/<?php echo $_SESSION['userName'];?>/audio/</span>
							<a href="#fu-helper" data-modal-open style="float:right; display:inline-block; font-size: 28px;"><i class="bi bi-help"></i></a>
						</p>
						<!-- FU WIDGET -->
						<div class="fu padded unset-bg">
							<input class="FU" type="file" path="pat/users/<?php echo $_SESSION['userName'];?>/audio/" startOn="manually" buttonCaption="Upload" buttonClass="fu-fb" multi="true" afterUpload="link" maxSize="<?php echo $maxFileSize; ?>" fileType="audio/aac,audio/asc,audio/MPA,audio/mp4,audio/mpeg,audio/ogg"/>
						</div>
					</div>
					<div class="block bw25 md-100 sm-100 xs-100" style="padding: 1em 2em 1em 0;">
						<h4 class="lucida fossil smoke-t flow-text chonk" style="margin-left: 0; padding: 0.5em; max-width: 90%;">Browse...</h4>
						<ul class="tiles lucida black-t-s">
							<li><a href="javascript:void(0);" data-panelid="fam-imgs" data-pos="right" class="op-tab">
								<span class="title"><i class="bi bi-image"></i> Image Files</span>
							</a></li>
							<li><a href="javascript:void(0);" data-panelid="fam-docs" data-pos="right" class="op-tab">
								<span class="title"><i class="bi bi-file"></i> Document Files</span>
							</a></li>
							<li><a href="javascript:void(0);" data-panelid="fam-aud" data-pos="right" class="op-tab">
								<span class="title"><i class="bi bi-audio"></i> Audio Files</span>
							</a></li>
							<li><a href="javascript:void(0);" data-panelid="fam-vid" data-pos="right" class="op-tab">
								<span class="title"><i class="bi bi-video"></i> Video Files</span>
							</a></li>
							<li><a href="javascript:void(0);" data-panelid="fam-other" data-pos="right" class="op-tab">
								<span class="title"><i class="bi bi-wonder"></i> Other Files</span>
							</a></li>
							<li><a href="#myfolder" data-modal-open><span class="title"><i class="bi bi-folder"></i> My Folder</span></a></li>
						</ul>
					</div>
				</div>
			</div>
			
        </div>
    </div>