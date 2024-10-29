<?php 
if(isset($_POST['path'])){
	$path = $_POST['path']; 
	$trashpath = $_POST['tpath'];
	// Check file exist or not 
	if( file_exists($path) ){ 
		// move file to trash directory
		rename($path,$trashpath);
		// Set status 
		echo 1; 
	} else { echo 0; } die;
}
?>