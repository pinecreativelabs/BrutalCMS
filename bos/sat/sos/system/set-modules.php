<?php
	$cad= $_POST['cad'];
	$crude= $_POST['crude'];
	$dick= $_POST['dick'];
	$edu= $_POST['edu'];
	$hapi= $_POST['hapi'];
	$jack= $_POST['jack'];
	$mad= $_POST['mad'];
	$mydid= $_POST['mydid'];
	$paws= $_POST['paws'];
	$ports= $_POST['ports'];
	$shop= $_POST['shop'];
	$slides= $_POST['slides'];
	$tilt= $_POST['tilt'];
	
	$cfile = fopen('data/modules.csv', 'w+');
	$fdata = array('cad'=>$cad,'crude'=>$crude,'dick'=>$dick,'edu'=>$edu,'hapi'=>$hapi,'jack'=>$jack,'mad'=>$mad,'mydid'=>$mydid,'paws'=>$paws,'ports'=>$ports,'shop'=>$shop,'slides'=>$slides,'tilt'=>$tilt);
	$saved = fputcsv($cfile, $fdata);
	fclose($cfile);
	if($saved){ echo "<p class=\"padded success courier bold flow-text\">Data saved</p>";}
	else{echo "<p class=\"padded alert courier bold flow-text\">Failed to save data</p>";}
?>