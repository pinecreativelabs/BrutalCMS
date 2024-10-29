<?php 
$savetouser = $_POST['uname'];
$savetouserpath = '../../../app/users/'.$savetouser.'/data/notepad.txt';
$notepad = $_POST['notepad'];
$cfile = fopen($savetouserpath, 'w+');
$saved = fwrite($cfile, $notepad);
fclose($cfile);
if($saved){ echo "<p class=\"padded success courier bold flow-text\">Notepad updated.</p>";}
else{echo "<p class=\"padded alert courier bold flow-text\">Notepad failed to update.</p>";}
?>