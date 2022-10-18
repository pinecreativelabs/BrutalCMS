<?php $datadir = getcwd()."/data";
$datadir_bu = getcwd()."/data-backup";
define("CSVSeparator", ",");           // Separator
define("CSVLineTerminator", "\n");     // Line termination
define("CSVFolder", $datadir);            // The folder for csv files. Must exist!
define("CSVFolderBackup", $datadir_bu); // The folder for backup files. Must exist!
define("CSVFileExtension", "txt");     // primary csv file extension
define("CSVFileExt2","csv");				// secondary csv file extension
define("CSVReadOnly",false);				// are csv files read-only?
define("CSVNewRecords",true);				// can new records be added?
define("CSVDeleteRecords",true);			// can records be deleted?
?>