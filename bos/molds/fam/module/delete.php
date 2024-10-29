<?php 
if(isset($_POST['path'])){
   $path = $_POST['path']; 
   // Check file exist or not 
   if( file_exists($path) ){ 
      // Remove file 
      unlink($path); 
      // Set status 
      echo 1; 
   } else { echo 0; } die;
}
?>