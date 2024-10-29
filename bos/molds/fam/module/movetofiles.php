<?php 
if(isset($_POST['path'])){
	$path = $_POST['path']; 
	$topath = $_POST['tpath'];
	// Check file exist or not 
	if( file_exists($path) ){ 
		// move file to files directory
		rename($path,$topath);
		// Set status 
		echo 1; 
	} else { echo 0; } die;
}
?>