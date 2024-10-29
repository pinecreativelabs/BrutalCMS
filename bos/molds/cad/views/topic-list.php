<?php 
$topix_data = 'bos/cat/cad/module/data/topics.csv';

// create list of topics
echo '<ul class="tags">';
$trow = 0;
$skip_row_number = array("1");
if (($handletopix = fopen($topix_data, 'r')) !== FALSE) {
	while (($pdata = fgetcsv($handletopix, 1000, ",")) !== FALSE) {
		$trow++;
		if (in_array($trow, $skip_row_number)){continue;} else {
			echo '<li>'.$pdata[1].'</li>';
		}
	} fclose($handletopix);
} 
echo '</ul>';

// get total number of topics
$topixfile = new SplFileObject($topix_data, 'r');
$topixfile->seek(PHP_INT_MAX);
$tagtotal = $topixfile->key()-1;
?>