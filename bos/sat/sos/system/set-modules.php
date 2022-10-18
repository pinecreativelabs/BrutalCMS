<?php
	$cad= $_POST['cad'];
	$dick= $_POST['dick'];
	$mad= $_POST['mad'];
	$slides= $_POST['slides'];
	$edu= $_POST['edu'];
	$shop= $_POST['shop'];
	$crude= $_POST['crude'];
	$jack= $_POST['jack'];
	$hapi= $_POST['hapi'];
	$paws= $_POST['paws'];
	$cfile = fopen('data/modules.csv', 'w+');
	$fdata = array('cad'=>$cad,'dick'=>$dick,'mad'=>$mad,'slides'=>$slides,'edu'=>$edu,'shop'=>$shop,'crude'=>$crude,'jack'=>$jack,'hapi'=>$hapi,'paws'=>$paws);
	$saved = fputcsv($cfile, $fdata);
	fclose($cfile);
	if($saved){ echo "<p class=\"padded success courier bold flow-text\">Data saved</p>";}
	else{echo "<p class=\"padded alert courier bold flow-text\">Failed to save data</p>";}
?>