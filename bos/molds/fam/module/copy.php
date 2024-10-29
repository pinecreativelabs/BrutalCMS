<?php 
if(isset($_POST['path'])){
	$path = $_POST['path']; 
	$copypath = $_POST['cpath'];
	// Check file exist or not 
	if( file_exists($path) ){ 
		// copy file to user files directory
		copy($path,$copypath);
		// Set status 
		echo 1; 
	} else { echo 0; } die;
}
?>