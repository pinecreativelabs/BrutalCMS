<?php 
$system_page=true;
$module=true;
include realpath(__DIR__. '/../../..').'/build/constructor.php';
$common = realpath(__DIR__. '/../../..').'/pat/pad/module/common.php';
require_once($common);
checkUser();
$current_user = $_SESSION['userName'];
$themefile = simplexml_load_file('data/themes.xml');
$layoutfile = simplexml_load_file('data/layouts.xml');
$wpfile = simplexml_load_file('data/wallpapers.xml');
function ClearChars($str) {
    $cchar = str_replace( array('\'','"',',',';','<','>','$','%','#','*','|','&','^','!','?'),'', $str);
    return $cchar;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Blueprint Home</title>
	<link rel="stylesheet" type="text/css" href="<?php echo $bos_editor_css;?>">
	<style>
		small{font-size: 80%;}
		.limebox{border-radius: 1rem; border: 1px solid #00ff00; padding: 1rem;}
		.limebox h3 {font-weight: 600; margin: 0; padding: 8px; background: #00ff00; color: #000;}
		.edit-btn, .del-btn, .mark-btn {min-width: initial;}
		details summary {background: #00ff00; color: #000; font-weight: 600; text-transform: uppercase;}
		.details {padding: 8px 8px 32px 8px;}
		a,a:link,a:visited{color: #ffff00; border-bottom: 1px dotted #ffff00;}
		a:hover{color: #ff0000; border-bottom: 1px dotted #ff0000;}
		.tabs label {font-weight: 900; -webkit-border-radius: 4px 4px 0 0; border-radius: 4px 4px 0 0; background: #0f0; color: #000;}
		.tabs .tab {background: #000; color: #0f0; padding: 1em; border: none;}
		.tabs .tab .rolebox, .tabs .tab .projectbox, .projectbox {-webkit-border-radius: 0 1rem 1rem 1rem; border-radius: 0 1rem 1rem 1rem;}
		.wp-item, .layout-item {height: 75px;}
		.wp-item .wp, .layout-item img, .layout-item .lo {margin-top: -4px; float: right;}
		.wp-item .wp {display: inline-block; width: 140px; height: 100%; background-position: right center; background-repeat: no-repeat; background-size: cover; }
		.layout-item img {width: 60px; height: 60px; background: #fff; padding: 6px; -webkit-border-radius: 4px; border-radius: 4px;}
		.layout-item .lo {display: inline-block; height: 60px; text-align: center; font-size: 18px; line-height: 100%; font-weight: 600; padding: 20px 8px 0 8px;}
	</style>
</head>
<body class="scrollable">
<button class="reloadbtn" onclick="reloadPage() ">&#10227;</button>
<header><div style="display: block; height: 40px; margin: 0; width: 100%;"></div>
	<p style="margin-bottom: 6px;"><?php echo '<strong>Logged in as: </strong>'.$current_user; ?></p>
</header>
<?php session_start();
if(isset($_SESSION['message'])){ ?>
<div class="padded" style="background: #ff0000; color: #ffff00; margin-top:20px;"><?php echo $_SESSION['message']; ?></div>
<?php unset($_SESSION['message']); } ?>
<div class="padded">
	<div class="block-wrap">
		
		<div class="block bw100"><div style="padding: 1rem;"><div class="tabs">
			<input type="radio" name="bptabs" id="tab1" checked="checked">
			<label for="tab1">Layouts</label>
			<div class="tab"><div class="limebox">
				<div class="paginate-5" style="margin-left: 0; padding: 0.5em; max-width: 90%;">
					<div class="lucida rice-t items">
						<?php foreach($layoutfile->layout as $lrow){ 
							echo '<div class="layout-item">';
							if($lrow['method']=='bento'){
								echo '<img src="inc/imgs/bento-'.$lrow['preset'].'.svg"/>';
							}elseif(($lrow['method']=='b3grid')||($lrow['method']=='bootstrap')){
								echo '<img src="inc/imgs/'.$lrow['preset'].'.svg"/>';
							} else {echo '<div class="lo">['.$lrow['cols'].'x'.$lrow['rows'].']</div>';}
							echo '<strong>'.$lrow['title'].'</strong><br /><small>['.$lrow['method'].']</small>';
							echo '</div>';
						}?>
					</div><div class="pager lucida">
						<div class="firstPage">first</div>
						<div class="previousPage">prev</div><div class="pageNumbers"></div>
						<div class="nextPage">next</div><div class="lastPage">last</div>
				</div></div>
			</div></div>
			<input type="radio" name="bptabs" id="tab2">
			<label for="tab2">Themes</label>
			<div class="tab"><div class="limebox">
				<div class="paginate-5" style="margin-left: 0; padding: 0.5em; max-width: 90%;">
					<div class="lucida items heavy">
					<?php foreach($themefile->theme as $trow){ if($trow['active']=='true'){
						echo '<div class="theme-item">'.$trow['title'].'
						<p class="swatch"><span style="background: '.$trow->colors['primary'].';"></span><span style="background: '.$trow->colors['secondary'].';"></span><span style="background: '.$trow->colors['tertiary'].';"></span><span style="background: '.$trow->colors['links'].';"></span><span style="background: '.$trow->colors['borders'].';"></span><span style="background: '.$trow->colors['other'].';"></span></p></div>';
					}}?>
					</div><div class="pager lucida">
						<div class="firstPage">first</div>
						<div class="previousPage">prev</div><div class="pageNumbers"></div>
						<div class="nextPage">next</div><div class="lastPage">last</div>
				</div></div>
			</div></div>
			<input type="radio" name="bptabs" id="tab3">
			<label for="tab3">Wallpapers</label>
			<div class="tab"><div class="limebox">
				<div class="paginate-5" style="margin-left: 0; padding: 0.5em; max-width: 90%;">
					<div class="lucida items heavy">
					<?php foreach($wpfile->wallpaper as $wrow){ if($wrow['active']=='true'){
						echo '<div class="wp-item">.'.strtolower(str_replace(' ','-',$wrow['title'])).'<div class="wp" style="background-image: url(\''.$wrow->url.'\');"></div></div>';
					}}?>
					</div><div class="pager lucida">
						<div class="firstPage">first</div>
						<div class="previousPage">prev</div><div class="pageNumbers"></div>
						<div class="nextPage">next</div><div class="lastPage">last</div>
				</div></div>
			</div></div>
			
		</div></div></div>
	</div>
</div>  

<!-- Initiate modal -->
<div class="modal"><div class="modal-inner">
	<span data-modal-close>&times;</span>
	<div class="modal-content"></div>
</div></div>
<script src="<?php echo $bosdir;?>core/jab/buix/modal.js"></script>
<script>function reloadPage() {window.location.reload(true);}</script>
<script src="<?php echo $bosdir;?>core/jab/jquery.3.js"></script>
<script src="<?php echo $bosdir;?>core/jab/plugins/pagination.js"></script>
</body>
</html>