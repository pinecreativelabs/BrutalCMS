<?php 
$crudedatapath = 'bos/rat/repo/data/csv/entities/';
$datafiles = scandir($crudedatapath);
$entity_count = (count($datafiles)-2);

$entity_list = '<ul>';
$dir = $crudedatapath;
// Check if the directory exists
if (file_exists($dir) && is_dir($dir) ) {
    // Get the files of the directory as an array
    $scan_arr = scandir($dir);
    $files_arr = array_diff($scan_arr, array('.','..') );
    // Get each files of our directory with line break
    foreach ($files_arr as $file) {
        //Get the file path
        $file_path = $crudedatapath.$file;
        // Get the file extension
        $file_ext = pathinfo($file_path, PATHINFO_EXTENSION);
        if ($file_ext=="csv" || $file_ext=="txt") {
          $entity_list .= '<li><a href="'.$file_path.'" target="_blank">'.$file.'</a></li>';
        } 
    }
} else {$entity_list .= '<li>Directory does not exist</li>';}
$entity_list .= '</ul>';
?>