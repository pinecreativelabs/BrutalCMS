<?php 

if($preset=='1col'){
	$new_layout_html.= '<div class="block bw100"></div>'.PHP_EOL;
} elseif($preset=='2col'){
	$new_layout_html.= '<div class="block bw50 '.$rrules.'"></div>'.PHP_EOL.'<div class="block bw50 '.$rrules.'"></div>'.PHP_EOL;
} elseif($preset=='3col'){
	$new_layout_html.= '<div class="block bw33 '.$rrules.'"></div>'.PHP_EOL.'<div class="block bw33 '.$rrules.'"></div>'.PHP_EOL.'<div class="block bw33 '.$rrules.'"></div>'.PHP_EOL;
} elseif($preset=='3col-sl'){
	$new_layout_html.= '<div class="block bw33 '.$rrules.'"><div class="block-wrap"><div class="block bw100"></div><div class="block bw100"></div></div></div>'.PHP_EOL;
	$new_layout_html.= '<div class="block bw33 '.$rrules.'"></div>'.PHP_EOL.'<div class="block bw33 '.$rrules.'"></div>'.PHP_EOL;
} elseif($preset=='3col-sr'){
	$new_layout_html.= '<div class="block bw33 '.$rrules.'"></div>'.PHP_EOL.'<div class="block bw33 '.$rrules.'"></div>'.PHP_EOL;
	$new_layout_html.= '<div class="block bw33 '.$rrules.'"><div class="block-wrap"><div class="block bw100"></div><div class="block bw100"></div></div></div>'.PHP_EOL;
} elseif($preset=='4col'){
	$new_layout_html.= '<div class="block bw25 '.$rrules.'"></div>'.PHP_EOL.'<div class="block bw25 '.$rrules.'"></div>'.PHP_EOL;
	$new_layout_html.= '<div class="block bw25 '.$rrules.'"></div>'.PHP_EOL.'<div class="block bw25 '.$rrules.'"></div>'.PHP_EOL;
} elseif($preset=='ls'){
	$new_layout_html.= '<div class="block bw33 xs-100 sm-100"></div>'.PHP_EOL.'<div class="block bw67 xs-100 sm-100"></div>'.PHP_EOL;
} elseif($preset=='rs'){
	$new_layout_html.= '<div class="block bw67 xs-100 sm-100"></div>'.PHP_EOL.'<div class="block bw33 xs-100 sm-100"></div>'.PHP_EOL;
} elseif($preset=='1over-sms'){
	$new_layout_html.= '<div class="block bw100"></div>'.PHP_EOL.'<div class="block bw25 xs-100 sm-100"></div>'.PHP_EOL;
	$new_layout_html.= '<div class="block bw50 xs-100 sm-100"></div>'.PHP_EOL.'<div class="block bw25 xs-100 sm-100"></div>'.PHP_EOL;
} elseif($preset=='1over-ls'){
	$new_layout_html.= '<div class="block bw100"></div>'.PHP_EOL.'<div class="block bw33 xs-100 sm-100"></div>'.PHP_EOL.'<div class="block bw67 xs-100 sm-100"></div>'.PHP_EOL;
} elseif($preset=='1over-rs'){
	$new_layout_html.= '<div class="block bw100"></div>'.PHP_EOL.'<div class="block bw67 xs-100 sm-100"></div>'.PHP_EOL.'<div class="block bw33 xs-100 sm-100"></div>'.PHP_EOL;
} elseif($preset=='1over1x2-l'){
	$new_layout_html.= '<div class="block bw100"></div>'.PHP_EOL;
	$new_layout_html.= '<div class="block bw67 xs-100 sm-100"><div class="block-wrap"><div class="block bw100"></div><div class="block bw100"></div></div></div>'.PHP_EOL;
	$new_layout_html.= '<div class="block bw33 xs-100 sm-100"></div>'.PHP_EOL;
} elseif($preset=='1over1x2-r'){
	$new_layout_html.= '<div class="block bw100"></div>'.PHP_EOL;
	$new_layout_html.= '<div class="block bw33 xs-100 sm-100"></div>'.PHP_EOL;
	$new_layout_html.= '<div class="block bw67 xs-100 sm-100"><div class="block-wrap"><div class="block bw100"></div><div class="block bw100"></div></div></div>'.PHP_EOL;
} elseif($preset=='1over1'){
	$new_layout_html.= '<div class="block bw100"></div>'.PHP_EOL.'<div class="block bw100"></div>'.PHP_EOL;
} elseif($preset=='1over2'){
	$new_layout_html.= '<div class="block bw100"></div>'.PHP_EOL;
	$new_layout_html.= '<div class="block bw50 '.$rrules.'"></div>'.PHP_EOL.'<div class="block bw50 '.$rrules.'"></div>'.PHP_EOL;
} elseif($preset=='1over3'){
	$new_layout_html.= '<div class="block bw100"></div>'.PHP_EOL;
	$new_layout_html.= '<div class="block bw33 '.$rrules.'"></div>'.PHP_EOL.'<div class="block bw33 '.$rrules.'"></div>'.PHP_EOL.'<div class="block bw33 '.$rrules.'"></div>'.PHP_EOL;
} elseif($preset=='1over4'){
	$new_layout_html.= '<div class="block bw100"></div>'.PHP_EOL;
	$new_layout_html.= '<div class="block bw25 '.$rrules.'"></div>'.PHP_EOL.'<div class="block bw25 '.$rrules.'"></div>'.PHP_EOL;
	$new_layout_html.= '<div class="block bw25 '.$rrules.'"></div>'.PHP_EOL.'<div class="block bw25 '.$rrules.'"></div>'.PHP_EOL;
} elseif($preset=='1over2x2'){
	$new_layout_html.= '<div class="block bw100"></div>'.PHP_EOL;
	$new_layout_html.= '<div class="block bw50 xs-100 sm-100"></div>'.PHP_EOL.'<div class="block bw50 xs-100 sm-100"></div>'.PHP_EOL;
	$new_layout_html.= '<div class="block bw50 xs-100 sm-100"></div>'.PHP_EOL.'<div class="block bw50 xs-100 sm-100"></div>'.PHP_EOL;
} elseif($preset=='2x1-4col'){
	$new_layout_html.= '<div class="block bw50 xs-100 sm-100"><div class="block-wrap">';
	$new_layout_html.= '<div class="block bw100"></div><div class="block bw50"></div><div class="block bw50"></div>'.PHP_EOL.'</div></div>'.PHP_EOL;
	$new_layout_html.= '<div class="block bw25 xs-100 sm-100"></div>'.PHP_EOL.'<div class="block bw25 xs-100 sm-100"></div>'.PHP_EOL;
} elseif($preset=='1x2'){
	$new_layout_html.= '<div class="block bw100 bh50"></div>'.PHP_EOL.'<div class="block bw100 bh50"></div>'.PHP_EOL;
} elseif($preset=='1x2-left'){
	$new_layout_html.= '<div class="block bw50 xs-100 sm-100"><div class="block-wrap"><div class="block bw100"></div><div class="block bw100"></div></div></div>'.PHP_EOL;
	$new_layout_html.= '<div class="block bw50 xs-100 sm-100"></div>'.PHP_EOL;
} elseif($preset=='1x2-right'){
	$new_layout_html.= '<div class="block bw50 xs-100 sm-100"></div>'.PHP_EOL;
	$new_layout_html.= '<div class="block bw50 xs-100 sm-100"><div class="block-wrap"><div class="block bw100"></div><div class="block bw100"></div></div></div>'.PHP_EOL;
} elseif($preset=='2x2'){
	$new_layout_html.= '<div class="block bw50 xs-100 sm-100"></div>'.PHP_EOL.'<div class="block bw50 xs-100 sm-100"></div>'.PHP_EOL;
	$new_layout_html.= '<div class="block bw50 xs-100 sm-100"></div>'.PHP_EOL.'<div class="block bw50 xs-100 sm-100"></div>'.PHP_EOL;
} elseif($preset=='2x2-split'){
	$new_layout_html.= '<div class="block bw50 xs-100 sm-100"></div>'.PHP_EOL;
	$new_layout_html.= '<div class="block bw50 xs-100 sm-100"><div class="block-wrap"><div class="block bw50"></div><div class="block bw50"></div></div></div>'.PHP_EOL;
	$new_layout_html.= '<div class="block bw50 xs-100 sm-100"><div class="block-wrap"><div class="block bw50"></div><div class="block bw50"></div></div></div>'.PHP_EOL;
	$new_layout_html.= '<div class="block bw50 xs-100 sm-100"></div>'.PHP_EOL;
} elseif($preset=='2x4'){
	$new_layout_html.= '<div class="block bw50 xs-100 sm-100"></div>'.PHP_EOL.'<div class="block bw50 xs-100 sm-100"></div>'.PHP_EOL;
	$new_layout_html.= '<div class="block bw50 xs-100 sm-100"></div>'.PHP_EOL.'<div class="block bw50 xs-100 sm-100"></div>'.PHP_EOL;
	$new_layout_html.= '<div class="block bw50 xs-100 sm-100"></div>'.PHP_EOL.'<div class="block bw50 xs-100 sm-100"></div>'.PHP_EOL;
	$new_layout_html.= '<div class="block bw50 xs-100 sm-100"></div>'.PHP_EOL.'<div class="block bw50 xs-100 sm-100"></div>'.PHP_EOL;
} elseif($preset=='4x2'){
	$new_layout_html.= '<div class="block bw25 xs-100 sm-100"></div>'.PHP_EOL.'<div class="block bw25 xs-100 sm-100"></div>'.PHP_EOL;
	$new_layout_html.= '<div class="block bw25 xs-100 sm-100"></div>'.PHP_EOL.'<div class="block bw25 xs-100 sm-100"></div>'.PHP_EOL;
	$new_layout_html.= '<div class="block bw25 xs-100 sm-100"></div>'.PHP_EOL.'<div class="block bw25 xs-100 sm-100"></div>'.PHP_EOL;
	$new_layout_html.= '<div class="block bw25 xs-100 sm-100"></div>'.PHP_EOL.'<div class="block bw25 xs-100 sm-100"></div>'.PHP_EOL;
} elseif($preset=='3x3'){
	$new_layout_html.= '<div class="block bw33 xs-100"></div>'.PHP_EOL.'<div class="block bw33 xs-100"></div>'.PHP_EOL.'<div class="block bw33 xs-100"></div>'.PHP_EOL;
	$new_layout_html.= '<div class="block bw33 xs-100"></div>'.PHP_EOL.'<div class="block bw33 xs-100"></div>'.PHP_EOL.'<div class="block bw33 xs-100"></div>'.PHP_EOL;
	$new_layout_html.= '<div class="block bw33 xs-100"></div>'.PHP_EOL.'<div class="block bw33 xs-100"></div>'.PHP_EOL.'<div class="block bw33 xs-100"></div>'.PHP_EOL;
} elseif($preset=='4x4'){
	$new_layout_html.= '<div class="block bw25 xs-100"></div>'.PHP_EOL.'<div class="block bw25 xs-100"></div>'.PHP_EOL;
	$new_layout_html.= '<div class="block bw25 xs-100"></div>'.PHP_EOL.'<div class="block bw25 xs-100"></div>'.PHP_EOL;
	$new_layout_html.= '<div class="block bw25 xs-100"></div>'.PHP_EOL.'<div class="block bw25 xs-100"></div>'.PHP_EOL;
	$new_layout_html.= '<div class="block bw25 xs-100"></div>'.PHP_EOL.'<div class="block bw25 xs-100"></div>'.PHP_EOL;
	$new_layout_html.= '<div class="block bw25 xs-100"></div>'.PHP_EOL.'<div class="block bw25 xs-100"></div>'.PHP_EOL;
	$new_layout_html.= '<div class="block bw25 xs-100"></div>'.PHP_EOL.'<div class="block bw25 xs-100"></div>'.PHP_EOL;
	$new_layout_html.= '<div class="block bw25 xs-100"></div>'.PHP_EOL.'<div class="block bw25 xs-100"></div>'.PHP_EOL;
	$new_layout_html.= '<div class="block bw25 xs-100"></div>'.PHP_EOL.'<div class="block bw25 xs-100"></div>'.PHP_EOL;
} else {}
?>