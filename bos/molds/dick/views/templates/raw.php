<?php 
$daily_content.='<div class="raw-dick-data">'.PHP_EOL;
$daily_content.='<h4>'.$dow.'</h4>'.PHP_EOL.'<p><strong>TITLE:</strong> '.$title.'<br />'.PHP_EOL;
$daily_content.='<strong>Title Display:</strong> ';
if($td=='do'){$daily_content.='date only';} elseif($td=='to'){$daily_content.='title only';}else{$daily_content.='title &amp; date';}
$daily_content.='<br /><strong>Date Title Format:</strong> '.$dformat.'<br />';
$daily_content.='<strong>Active:</strong>' .$active.'<br /><strong>Media Type:</strong> '.$mediatype.'<br />'.PHP_EOL;
$daily_content.='<strong>Media File:</strong> <a href="'.$mediafile.'" target="_blank">View File &raquo;</a><br /><strong>Extension:</strong> '.$extension.'<br />'.PHP_EOL;
$daily_content.='<strong>Video Type:</strong> '.$vidtype.'<br /><strong>Video ID:</strong> '.$vid.'<br />'.PHP_EOL;
$daily_content.='<strong>Link:</strong> '.$link.'<br /><strong>Link Target:</strong> '.$target.'<br />'.PHP_EOL;
$daily_content.='<strong>Link Text:</strong> '.$linktext.'<br /><strong>Skin:</strong> '.$skin.'<br />'.PHP_EOL;
$daily_content.='<strong>Primary Color: </strong>'.$pcolor.'<br /><strong>Secondary Color:</strong> '.$scolor.'<br />'.PHP_EOL;
$daily_content.='<strong>Tertiary Color: </strong>'.$tcolor.'<br /><strong>Accent Color:</strong> '.$acolor.'<br />'.PHP_EOL;
$daily_content.='<strong>Other Color: </strong>'.$ocolor.'<br />'.PHP_EOL;
$daily_content.='<strong>Content:</strong></p>'.PHP_EOL.$content.PHP_EOL;
$daily_content.='</div>'.PHP_EOL;
?>