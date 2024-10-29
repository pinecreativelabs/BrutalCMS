<?php require_once('common.php');
checkUser();
$bufile = realpath(__DIR__. '/../../..').'/backup/data/modules/pad/users.csv';
$input = fopen('data/users.csv', 'r');  //open for reading
$output = fopen('data/utemp.csv', 'w'); //open for writing
$outputcopy = fopen($bufile,'w');
//echo 'path: '.$bufile.'<br />user: '.$_SESSION['userName'];
while(($data = fgetcsv($input, 1000, ",")) !== FALSE){
   //modify data here
   if ($data[1] == $_POST['oldPassword'] && $data[0] == $_SESSION['userName']) {
      //Replace line here
      $data[1] = md5($_POST['newPassword']);
   }
   //write modified data to new file
   fputcsv($output, $data);
   fputcsv($outputcopy, $data);
}
//close both files
fclose($input);
fclose($output);
//clean up
unlink('data/users.csv');// Delete obsolete BD
$saved = rename('data/utemp.csv', 'data/users.csv'); //Rename temporary to new
if($saved){ echo "<p class=\"padded success courier bold flow-text\">Password updated.</p>";}
else{echo "<p class=\"padded alert courier bold flow-text\">Failed to update password.</p>";}
?>