<?php 
$system_page=true;
$module=true;
include realpath(__DIR__. '/../../..').'/build/constructor.php';
$common = realpath(__DIR__. '/../../..').'/pat/pad/module/common.php';
require_once($common);
checkUser();
$current_user = $_SESSION['userName'];
$userlistdata = realpath(__DIR__.'/../../..').'/pat/pad/module/data/userlist.csv'; 

$pdir = realpath(__DIR__. '/../../..');

if($fam_cm=='relative'){
$miscdir = 'app/users/'.$current_user.'/trash/';
} else {$miscdir = $bosdir.'app/users/'.$current_user.'/trash/';}

$miscpath = $pdir.'/app/users/'.$current_user.'/trash/';
$trashpath = $pdir.'/app/users/'.$current_user.'/files/';

$files5 = scandir($miscpath);
$fc_misc = count($files5)-2;
if(($fc_misc>=51)&&($fc_misc<=150)){
	$fcm_pag = 10;
} elseif(($fc_misc>=151)&&($fc_misc<=300)){
	$fcm_pag = 15;
} elseif(($fc_misc>=301)&&($fc_misc<=400)){
	$fcm_pag = 20;
} elseif($fc_misc>400){
	$fcm_pag = 25;
} else {$fcm_pag = 5;}

$row = 0;
$user_select = '<select name="user">'.PHP_EOL.'<option value="">[select user]</option>'.PHP_EOL;
$user_select_options = '<option value="">[select user]</option>'.PHP_EOL;
$skip_row_number = array("1");
if (($handle = fopen($userlistdata, "r")) !== FALSE) {
	while (($pdata = fgetcsv($handle, 1000, ",")) !== FALSE) {
		$uid = $pdata[0];
		$uname = $pdata[1];
		$uactive = $pdata[4];
		$row++;
		if(in_array($row, $skip_row_number)){continue;} else { 
			if(($pdata[0]!='')&&($uactive=='true')){ 
				$user_select.='<option value="'.$uname.'">'.$uname.'</option>'.PHP_EOL;
				$user_select_options.='<option value="'.$uname.'">'.$uname.'</option>'.PHP_EOL;
			}
		}
	} fclose($handle);} 
	$user_select.='</select>'.PHP_EOL;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>FAM: My Trash</title>
	<link rel="stylesheet" type="text/css" href="<?php echo $bos_editor_css;?>">
	<style>
		.modal-content h4 {background-color: #c2b280 !important; color: #333;}
		.modal-content h4 i {text-shadow: 2px 2px #333;}
		.helpbtn {display: inline-block; padding: 8px; font-size: 1.25rem; 
			border: 1px solid #0f0; position: fixed; z-index: 999;
			border-radius: 6px; -webkit-border-radius: 6px;
			top:0; right: 0; color: #0f0; font-weight: 600; margin: 1rem;
		}
		.helpbtn:hover{background: #0f0; color: #000; }
	</style>
</head>
<body class="scrollable">
<button class="reloadbtn" onclick="reloadPage() ">&#10227;</button>
<a href="#help" class="helpbtn" data-modal-open>&#9432; HELP</a>
<header><div style="display: block; height: 20px; margin: 1rem 0 0 0; width: 100%;"></div>
	<p style="margin-bottom: 6px;"><span class="heavy badge warn"><?php echo $fc_misc;?> files</span> | <?php echo '<strong>Editing as: </strong>'.$current_user; ?></p>
</header>
<?php session_start();
if(isset($_SESSION['message'])){ ?>
<div class="padded" style="background: #ff0000; color: #ffff00; margin-top:20px;"><?php echo $_SESSION['message']; ?></div>
<?php unset($_SESSION['message']); } ?>

<?php if($fc_misc > 0){?>
<div class="bostaskbar lucida">
	<!-- Search control -->
	<div class="search-row">
		<i class="bi sepia bi-zoom-right" style="text-shadow: 3px 3px #333;"></i><input type="text" class="fltr-controls filtr-search" name="filtr-search" data-search />
	</div>
	<ul class="simplefilter">
		<li class="fltr-controls active" data-filter="all">All</li>
		<li class="fltr-controls" data-filter="images"><i class="bi bi-image sepia"></i></li>
		<li class="fltr-controls" data-filter="audio"><i class="bi bi-audio sepia"></i></li>
		<li class="fltr-controls" data-filter="video"><i class="bi bi-video sepia"></i></li>
		<li class="fltr-controls" data-filter="docs"><i class="bi bi-file sepia"></i></li>
		<li class="fltr-controls" data-filter="data"><i class="bi bi-database sepia"></i></li>
		<li class="fltr-controls" data-filter="other"><i class="bi bi-wonder sepia"></i></li>
	</ul>
	<ul class="sortandshuffle">
		<!-- Basic shuffle control -->
		<li class="fltr-controls shuffle-btn" data-shuffle><i class="bi bi-shuffle sepia"></i></li>
		<!-- Basic sort controls consisting of asc/desc button and a select -->
		<li class="fltr-controls sort-btn active" data-sortAsc><i class="bi bi-increase sepia"></i></li>
		<li class="fltr-controls sort-btn" data-sortDesc><i class="bi bi-decrease sepia"></i></li>
		<select class="fltr-controls" data-sortOrder style="display: none;">
			<option value="index">Index</option>
			<option value="sortData">Alphabetically</option>
		</select>
	</ul>
</div>

<div class="file-list" style="margin-left: 0; padding: 0.5em; max-width: 90%;">
	<div class="arial rice-t items files filtr-container">
		<?php if (is_dir($miscpath)){
			if ($opendirectory = opendir($miscpath)){
				$fid = 0;
				while (($file = readdir($opendirectory)) !== false){
					if(($file != ".") and ($file != "..") and ($file != "index.php")) {
						$files[] = $file; // put in array.
					} 
					
				} closedir($opendirectory);
				natcasesort($files);
				
				foreach($files as $file) {
					if(is_file($miscpath.$file)){
						$fid++;
						$fsbytes=filesize($miscpath.$file);
						if ($fsbytes >= 1073741824){$fsize = number_format($fsbytes / 1073741824, 2) . '<br />GB';}
						elseif ($fsbytes >= 1048576){$fsize = number_format($fsbytes / 1048576, 2) . '<br />MB';}
						elseif ($fsbytes >= 1024){$fsize = number_format($fsbytes / 1024, 0) . '<br />KB';}
						elseif ($fsbytes > 1){$fsize = $fsbytes . '<br />bytes';}
						elseif ($fsbytes == 1){$fsize = $fsbytes . '<br />byte';} 
						else{$fsize = '0<br />bytes';}
						$filepath = $miscpath.$file;
						$trashfilepath = $trashpath.$file;
						$ext = pathinfo($filepath, PATHINFO_EXTENSION);
						$ftarray = array("accdb","avi","bmp","csv","doc","docx","eps","fla","flac","indd","jpg","mov","mp3","mp4","mpeg","midi","ogg","pdf","pptx","psd","pub","rar","sql","tiff","txt","vsd","wav","wma","wmv","xls","xlsx","xml","zip");
						
						$imgs_array = array("bmp","eps","gif","ico","jpg","jpeg","png","psd","svg","tif","tiff","wbmp","webp");
						$docs_array = array("doc","docb","docm","docx","htm","html","indd","odp","odt","ods","ott","pdf","ppt","pptx","pub","rtx","txt","wbk","wps");
						$audio_array = array("aac","aiff","alac","au","caf","flac","m4a","mid","midi","mp3","mpa","mpga","ogg","ra","wav","wma");
						$video_array = array("3g2","3gp","asf","avi","flv","m2v","m4v","mkv","mov","mp4","mpg","mpeg","ogv","rm","vob","webm","wmv");
						$data_array = array("accdb","csv","db","dbf","dif","dll","json","md","odb","pdb","sdf","sql","sqlite","xls","xlsx","xml");
						if(in_array($ext,$imgs_array)){$fcat = 'images';}
						elseif(in_array($ext,$docs_array)){$fcat = 'docs';}
						elseif(in_array($ext,$audio_array)){$fcat = 'audio';}
						elseif(in_array($ext,$video_array)){$fcat = 'video';}
						elseif(in_array($ext,$data_array)){$fcat = 'data';} else {$fcat = 'other';}
						
						echo "<div class=\"fi fmisc filtr-item\" data-category=\"".$fcat."\" \"data-sort=\"".strtolower($file)."\">";
						echo "<a href=\"".$miscdir.$file."\" target=\"_blank\" data-path=\"".$filepath."\" data-tpath=\"".$trashfilepath."\" id=\"fid_misc_".$fid."\">".$file."</a>";
						
						echo "<div class=\"fsize lucida\">".$fsize."</div>";
						echo "<div class=\"copier copy-attr invert-h\" data-copy-on-click=\"#fid_misc_".$fid."\"><img src=\"../../../core/css/images/copy-link.png\"/></div>";
						echo "<div class=\"move invert-h\" data-fid=\"".$fid."\"><img src=\"../../../core/css/images/trash-undo.png\" class=\"tiny-thumb\" id=\"untrash_".$fid."\"/></div>";
						echo "<div class=\"del sepia-h\" data-fid=\"".$fid."\"><img src=\"../../../core/css/images/x-delete.png\" class=\"tiny-thumb\" id=\"purge_".$fid."\"/></div></div>";
					}
				}
			}
		}
		?>
	</div>
</div>
<?php } else { echo '<p class="flow-text heavy lime-t courier padded b-b-t lime-b">NO FILES</p>';} ?>

<!-- Help Modal -->
<div id="help" style="display:none;">
	<div class="padded rounded b-s-k lime-b depixel" style="background: #000; max-width: 600px;">
		<h4 class="flow-text heavy" style="padding: 8px;">&#9432; HELP</h4>
		<p><img src="../../../core/css/images/copy-link.png" alt="move" class="micro-thumb"/> <small>[Copies file URL to clipboard.]</small></p>
		<p><img src="../../../core/css/images/trash-undo.png" alt="untrash" class="micro-thumb"/> <small>[Restores file to user's <em>files</em> folder.]</small></p>
		<p><img src="../../../core/css/images/x-delete.png" alt="move" class="micro-thumb"/> <small>[Permanently deletes file from server.]</small></p>
	</div>
</div>

<!-- Initiate modal -->
<div class="modal">
	<div class="modal-inner rounded b-s-t">
		<span data-modal-close>&times;</span>
		<div class="modal-content"></div>
	</div>
</div>

<script src="<?php echo $bosdir;?>core/jab/buix/modal.js"></script>
<script>function reloadPage() {window.location.reload(true);}</script>
<script src="<?php echo $bosdir;?>core/jab/jquery.3.js" type="text/javascript"></script>
<script src="<?php echo $bosdir;?>core/jab/plugins/filterizr.min.js" type="text/javascript"></script>
<script src="<?php echo $bosdir;?>core/jab/plugins/pagination.js" type="text/javascript"></script>
<script src="<?php echo $bosdir;?>core/jab/plugins/copier.js" type="text/javascript"></script>
<script>
$(document).ready(function(){
	$('.fmisc .del').click(function(){
		var id = $(this).data('fid');
		var aElement_href = $('#fid_misc_'+id ).attr("data-path");
		$.ajax({
			url: 'delete.php', type: 'post', data: {path: aElement_href},
			success: function(response){
				if(response == 1){
					$("#purge_" + id).attr("src","../../../core/css/images/deleted.png");
				} else { $("#purge_" + id).attr("src","../../../core/css/images/error.jpg");}
			}
		});
	});
	$('.fmisc .move').click(function(){
		var id = $(this).data('fid');
		var aElement_href = $('#fid_misc_'+id ).attr("data-path");
		var bElement_href = $('#fid_misc_'+id ).attr("data-tpath");
		$.ajax({
			url: 'movetofiles.php', type: 'post', data: {path: aElement_href, tpath: bElement_href},
			success: function(response){
				if(response == 1){
					$("#untrash_" + id).attr("src","../../../core/css/images/untrashed.png");
				} else { $("#untrash_" + id).attr("src","../../../core/css/images/error.jpg");}
			}
		});
	});
});
</script>
<script type="text/javascript">
    const simpleFilters = document.querySelectorAll('.simplefilter li');
    Array.from(simpleFilters).forEach((node) =>
      node.addEventListener('click', function() {
        simpleFilters.forEach((filter) => filter.classList.remove('active'));
        node.classList.add('active');
      })
    );

    const multiFilters = document.querySelectorAll('.multifilter li');
    Array.from(multiFilters).forEach((node) =>
      node.addEventListener('click', function() {
        node.classList.toggle('active');
      })
    );

    const sortControls = document.querySelectorAll('.sort-btn');
    Array.from(sortControls).forEach((node) =>
      node.addEventListener('click', function() {
        sortControls.forEach((control) => control.classList.remove('active'));
        node.classList.add('active');
      })
    );

    const shuffleControl = document.querySelector('.shuffle-btn');
    shuffleControl.addEventListener('click', function() {
      sortControls.forEach((control) => control.classList.remove('active'));
    });
	// Expose this filterizr as a global for debugging
    window.filterizr = new window.Filterizr('.filtr-container', {
      controlsSelector: '.fltr-controls', layout: 'vertical',
      gutterPixels: 0, spinner: {enabled: true,},
    });
	
</script>
</body>
</html>