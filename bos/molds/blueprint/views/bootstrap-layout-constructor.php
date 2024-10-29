<?php 

if($preset=='1col'){
	$new_layout_html.= '<div class="col-12"></div>'.PHP_EOL;
} elseif($preset=='2col'){
	$new_layout_html.= '<div class="col-6"></div>'.PHP_EOL.'<div class="col-6"></div>'.PHP_EOL;
} elseif($preset=='3col'){
	$new_layout_html.= '<div class="col-4"></div>'.PHP_EOL.'<div class="col-4"></div>'.PHP_EOL.'<div class="col-4"></div>'.PHP_EOL;
} elseif($preset=='3col-sl'){
	$new_layout_html.= '<div class="col-4"><div class="row"><div class="col-12"></div><div class="col-12"></div></div></div>'.PHP_EOL;
	$new_layout_html.= '<div class="col-4"></div>'.PHP_EOL.'<div class="col-4"></div>'.PHP_EOL;
} elseif($preset=='3col-sr'){
	$new_layout_html.= '<div class="col-4"></div>'.PHP_EOL.'<div class="col-4"></div>'.PHP_EOL;
	$new_layout_html.= '<div class="col-4"><div class="row"><div class="col-12"></div><div class="col-12"></div></div></div>'.PHP_EOL;
} elseif($preset=='4col'){
	$new_layout_html.= '<div class="col-3"></div>'.PHP_EOL.'<div class="col-3"></div>'.PHP_EOL.'<div class="col-3"></div>'.PHP_EOL.'<div class="col-3"></div>'.PHP_EOL;
} elseif($preset=='ls'){
	$new_layout_html.= '<div class="col-3"></div>'.PHP_EOL.'<div class="col-9"></div>'.PHP_EOL;
} elseif($preset=='rs'){
	$new_layout_html.= '<div class="col-9"></div>'.PHP_EOL.'<div class="col-3"></div>'.PHP_EOL;
} elseif($preset=='1over-sms'){
	$new_layout_html.= '<div class="col-12"></div>'.PHP_EOL.'</div>'.PHP_EOL.'<div class="row">'.PHP_EOL.'<div class="col-3"></div>'.PHP_EOL;
	$new_layout_html.= '<div class="col-6"></div>'.PHP_EOL.'<div class="col-3"></div>'.PHP_EOL;
} elseif($preset=='1over-ls'){
	$new_layout_html.= '<div class="col-12"></div>'.PHP_EOL.'</div>'.PHP_EOL.'<div class="row">'.PHP_EOL;
	$new_layout_html.= '<div class="col-3"></div>'.PHP_EOL.'<div class="col-9"></div>'.PHP_EOL;
} elseif($preset=='1over-rs'){
	$new_layout_html.= '<div class="col-12"></div>'.PHP_EOL.'</div>'.PHP_EOL.'<div class="row">'.PHP_EOL;
	$new_layout_html.= '<div class="col-9"></div>'.PHP_EOL.'<div class="col-3"></div>'.PHP_EOL;
} elseif($preset=='1over1x2-l'){
	$new_layout_html.= '<div class="col-12"></div>'.PHP_EOL.'</div>'.PHP_EOL.'<div class="row">'.PHP_EOL;
	$new_layout_html.= '<div class="col-8"><div class="row"><div class="col-12"></div></div><div class="row"><div class="col-12"></div></div></div>'.PHP_EOL;
	$new_layout_html.= '<div class="col-4"></div>'.PHP_EOL;
} elseif($preset=='1over1x2-r'){
	$new_layout_html.= '<div class="col-12"></div>'.PHP_EOL.'</div>'.PHP_EOL.'<div class="row">'.PHP_EOL;
	$new_layout_html.= '<div class="col-4"></div>'.PHP_EOL;
	$new_layout_html.= '<div class="col-8"><div class="row"><div class="col-12"></div></div><div class="row"><div class="col-12"></div></div></div>'.PHP_EOL;
} elseif($preset=='1over1'){
	$new_layout_html.= '<div class="col-12"></div></div><div class="row">'.PHP_EOL.'<div class="col-12"></div>'.PHP_EOL;
} elseif($preset=='1over2'){
	$new_layout_html.= '<div class="col-12"></div>'.PHP_EOL.'</div>'.PHP_EOL.'<div class="row">'.PHP_EOL;
	$new_layout_html.= '<div class="col-6"></div>'.PHP_EOL.'<div class="col-6"></div>'.PHP_EOL;
} elseif($preset=='1over3'){
	$new_layout_html.= '<div class="col-12"></div>'.PHP_EOL.'</div>'.PHP_EOL.'<div class="row">'.PHP_EOL;
	$new_layout_html.= '<div class="col-4"></div>'.PHP_EOL.'<div class="col-4"></div>'.PHP_EOL.'<div class="col-4"></div>'.PHP_EOL;
} elseif($preset=='1over4'){
	$new_layout_html.= '<div class="col-12"></div>'.PHP_EOL.'</div>'.PHP_EOL.'<div class="row">'.PHP_EOL;
	$new_layout_html.= '<div class="col-3"></div>'.PHP_EOL.'<div class="col-3"></div>'.PHP_EOL.'<div class="col-3"></div>'.PHP_EOL.'<div class="col-3"></div>'.PHP_EOL;
} elseif($preset=='1over2x2'){
	$new_layout_html.= '<div class="col-12"></div>'.PHP_EOL.'</div>'.PHP_EOL.'<div class="row">'.PHP_EOL;
	$new_layout_html.= '<div class="col-6"></div>'.PHP_EOL.'<div class="col-6"></div>'.PHP_EOL.'</div>'.PHP_EOL.'<div class="row">'.PHP_EOL;
	$new_layout_html.= '<div class="col-6"></div>'.PHP_EOL.'<div class="col-6"></div>'.PHP_EOL;
} elseif($preset=='2x1-4col'){
	$new_layout_html.= '<div class="col-6">'.PHP_EOL.'<div class="row"><div class="col-12"></div></div>'.PHP_EOL;
	$new_layout-html.= '<div class="row"><div class="col-6"></div><div class="col-6"></div></div>'.PHP_EOL.'</div>'.PHP_EOL;
	$new_layout_html.= '<div class="col-3"></div>'.PHP_EOL.'<div class="col-3"></div>'.PHP_EOL;
} elseif($preset=='1x2'){
	$new_layout_html.= '<div class="col-12"></div>'.PHP_EOL.'<div class="col-12"></div>'.PHP_EOL;
} elseif($preset=='1x2-left'){
	$new_layout_html.= '<div class="col-6"><div class="row"><div class="col-12"></div></div>'.PHP_EOL;
	$new_layout_html.= '<div class="row"><div class="col-12"></div></div></div>'.PHP_EOL;
	$new_layout_html.= '<div class="col-6"></div>'.PHP_EOL;
} elseif($preset=='1x2-right'){
	$new_layout_html.= '<div class="col-6"></div>'.PHP_EOL;
	$new_layout_html.= '<div class="col-6"><div class="row"><div class="col-12"></div></div>'.PHP_EOL;
	$new_layout_html.= '<div class="row"><div class="col-12"></div></div></div>'.PHP_EOL;
} elseif($preset=='2x2'){
	$new_layout_html.= '<div class="col-6"></div>'.PHP_EOL.'<div class="col-6"></div>'.PHP_EOL.'</div><div class="row">'.PHP_EOL;
	$new_layout_html.= '<div class="col-6"></div>'.PHP_EOL.'<div class="col-6"></div>'.PHP_EOL;
} elseif($preset=='2x2-split'){
	$new_layout_html.= '<div class="col-6"></div>'.PHP_EOL;
	$new_layout_html.= '<div class="col-6"><div class="row"><div class="col-6"></div>'.PHP_EOL.'<div class="col-6"></div></div></div>'.PHP_EOL;
	$new_layout_html.= '</div><div class="row">'.PHP_EOL;
	$new_layout_html.= '<div class="col-6"><div class="row"><div class="col-6"></div>'.PHP_EOL.'<div class="col-6"></div></div></div>'.PHP_EOL;
	$new_layout_html.= '<div class="col-6"></div>'.PHP_EOL;
} elseif($preset=='2x4'){
	$new_layout_html.= '<div class="col-6"></div>'.PHP_EOL.'<div class="col-6"></div>'.PHP_EOL.'</div><div class="row">'.PHP_EOL;
	$new_layout_html.= '<div class="col-6"></div>'.PHP_EOL.'<div class="col-6"></div>'.PHP_EOL.'</div><div class="row">'.PHP_EOL;
	$new_layout_html.= '<div class="col-6"></div>'.PHP_EOL.'<div class="col-6"></div>'.PHP_EOL.'</div><div class="row">'.PHP_EOL;
	$new_layout_html.= '<div class="col-6"></div>'.PHP_EOL.'<div class="col-6"></div>'.PHP_EOL;
} elseif($preset=='4x2'){
	$new_layout_html.= '<div class="col-3"></div>'.PHP_EOL.'<div class="col-3"></div>'.PHP_EOL.'<div class="col-3"></div>'.PHP_EOL.'<div class="col-3"></div>'.PHP_EOL;
	$new_layout_html.= '</div><div class="row">'.PHP_EOL;
	$new_layout_html.= '<div class="col-3"></div>'.PHP_EOL.'<div class="col-3"></div>'.PHP_EOL.'<div class="col-3"></div>'.PHP_EOL.'<div class="col-3"></div>'.PHP_EOL;
} elseif($preset=='3x3'){
	$new_layout_html.= '<div class="col-4"></div>'.PHP_EOL.'<div class="col-4"></div>'.PHP_EOL.'<div class="col-4"></div>'.PHP_EOL;
	$new_layout_html.= '</div><div class="row">'.PHP_EOL;
	$new_layout_html.= '<div class="col-4"></div>'.PHP_EOL.'<div class="col-4"></div>'.PHP_EOL.'<div class="col-4"></div>'.PHP_EOL;
	$new_layout_html.= '</div><div class="row">'.PHP_EOL;
	$new_layout_html.= '<div class="col-4"></div>'.PHP_EOL.'<div class="col-4"></div>'.PHP_EOL.'<div class="col-4"></div>'.PHP_EOL;
} elseif($preset=='4x4'){
	$new_layout_html.= '<div class="col-3"></div>'.PHP_EOL.'<div class="col-3"></div>'.PHP_EOL.'<div class="col-3"></div>'.PHP_EOL.'<div class="col-3"></div>'.PHP_EOL;
	$new_layout_html.= '</div><div class="row">'.PHP_EOL;
	$new_layout_html.= '<div class="col-3"></div>'.PHP_EOL.'<div class="col-3"></div>'.PHP_EOL.'<div class="col-3"></div>'.PHP_EOL.'<div class="col-3"></div>'.PHP_EOL;
	$new_layout_html.= '</div><div class="row">'.PHP_EOL;
	$new_layout_html.= '<div class="col-3"></div>'.PHP_EOL.'<div class="col-3"></div>'.PHP_EOL.'<div class="col-3"></div>'.PHP_EOL.'<div class="col-3"></div>'.PHP_EOL;
	$new_layout_html.= '</div><div class="row">'.PHP_EOL;
	$new_layout_html.= '<div class="col-3"></div>'.PHP_EOL.'<div class="col-3"></div>'.PHP_EOL.'<div class="col-3"></div>'.PHP_EOL.'<div class="col-3"></div>'.PHP_EOL;
} else {}
?>