<?php
$lip = getenv('REMOTE_ADDR');
$sip = getenv('SERVER_ADDR');
$is_https = getenv('HTTPS');
if($is_https==true){$http = 'enabled';}else{$http='disabled';}
$cuser = get_current_user();
$uid = getmyuid();
$protocol = getenv('SERVER_PROTOCOL');

// server disk space
$freebytes = disk_free_space(".");
$totbytes = disk_total_space(".");
$si_prefix = array( 'B', 'KB', 'MB', 'GB', 'TB', 'EB', 'ZB', 'YB' );
$bbase = 1024;
$freebitclass = min((int)log($freebytes , $bbase) , count($si_prefix) - 1);
$totbitclass = min((int)log($totbytes , $bbase) , count($si_prefix) - 1);

// get max_file_upload size
$maxFileSize = ini_get('upload_max_filesize');
$postMaxSize = ini_get('post_max_size');
$memLimit = ini_get('memory_limit');
?>
