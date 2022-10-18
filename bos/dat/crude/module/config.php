<?php 
$datadir = realpath(__DIR__. '/../../..').'/rat/repo/data/csv/entities';
$datadir_bu = realpath(__DIR__. '/../../..')."/backup/data/entities";
define("CSVSeparator", ",");           // Separator
define("CSVLineTerminator", "\n");     // Line termination
define("CSVFolder", $datadir);            // The folder for csv files. Must exist!
define("CSVFolderBackup", $datadir_bu); // The folder for backup files. Must exist!
define("CSVFileExtension", "txt");     // primary csv file extension
define("CSVFileExt2","csv");				// secondary csv file extension
?>