<?php require_once 'config.php';
// Get array of CSV files
$csvpath = CSVFolder . "/";
$readonly = CSVReadOnly;
$addrecord = CSVNewRecords;
$delrecord = CSVDeleteRecords;
$files = scandir($csvpath); // this is all files in dir

// clean up file list (to exclude)should only include csv files
$csvfiles = array();
foreach ($files as $basename) {
    if((substr($basename, -3)==CSVFileExtension)||(substr($basename, -3)==CSVFileExt2)){
        array_push($csvfiles, $basename);
    }
}
// Set first csv file as default csv file to display in edit mode
if(sizeof($csvfiles)>0) {
    $csv = $csvfiles[0];
}
// Override default csv file if a csv file is provided
if(isset($_GET["file"])) {
    $csv = $_GET["file"];
}

// Open CSV file
$filename = CSVFolder . "/" . $csv;
$fp = fopen($filename, "r");
$content = fread($fp, filesize($filename));
$lines = explode("\n", $content);
fclose($fp);
?>