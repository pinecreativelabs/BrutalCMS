<?php 
// CONSTRUCT FONTLIST & Font Selector
$fontids = array_keys($fonts);
$fontlist = '<ul class="font-list">'.PHP_EOL;
$font_selector = '<select name="font">'.PHP_EOL;
for($i=0; $i < count($fonts); $i++) {
	$fontname = $fontids[$i];
    foreach($fonts[$fontids[$i]] as $fontid => $value) {
		if($fontid=='fontclass'){$fontclass=$value;}
		if($fontid=='active'){if($value==true){
			$fontlist.= '<li class="'.$fontclass.'">'.$fontname.'</li>'.PHP_EOL;
			$font_selector.='<option class="'.$fontclass.'" value="'.$fontclass.'">'.$fontname.'</option>'.PHP_EOL;
		}}
    }
}
$fontlist .= '</ul>'.PHP_EOL;
$font_selector .= '</select>'.PHP_EOL;

// CONSTRUCT CONTENTTYPELIST
$content_type_list = '<ul class="content-type-list">'.PHP_EOL;
$content_type_selector = '<select name="content-type">'.PHP_EOL;
for($i=0; $i < count($contenttypes); $i++) {
  $content_type_list.='<li>'.$contenttypes[$i].'</li>'.PHP_EOL;
  $content_type_selector .='<option value="'.$contenttypes[$i].'">'.$contenttypes[$i].'</option>'.PHP_EOL;
}
$content_type_list.='</ul>'.PHP_EOL;
$content_type_selector.='</select>'.PHP_EOL;

// CONSTRUCT ELEMENT TYPE 
$element_type_list = '<ul class="element-type-list">'.PHP_EOL;
$element_type_selector = '<select name="element-type">'.PHP_EOL;
for($i=0; $i < count($element_types); $i++) {
  $element_type_list.='<li>'.$element_types[$i].'</li>'.PHP_EOL;
  $element_type_selector .='<option value="'.$element_types[$i].'">'.$element_types[$i].'</option>'.PHP_EOL;
}
$element_type_selector.='</select>'.PHP_EOL;
$element_type_list.='</ul>'.PHP_EOL;

// CONSTRUCT CONTENT POST TYPE LIST
$content_post_type_list = '<ul class="blog-post-type-list">'.PHP_EOL;
$content_post_type_selector = '<select name="content-post-type">'.PHP_EOL;
for($i=0; $i < count($contentposttypes); $i++) {
  $content_post_type_list.='<li>'.ucwords($contentposttypes[$i]).'</li>'.PHP_EOL;
  $content_post_type_selector .='<option value="'.$contentposttypes[$i].'">'.ucwords($contentposttypes[$i]).'</option>'.PHP_EOL;
}
$content_post_type_list.='</ul>'.PHP_EOL;
$content_post_type_selector.='</select>'.PHP_EOL;

// CONSTRUCT STREAM TYPE LIST
$stream_type_list = '<ul class="stream-type-list">'.PHP_EOL;
$stream_type_selector = '<select name="stream-type">'.PHP_EOL;
for($i=0; $i < count($stream_types); $i++) {
  $stream_type_list.='<li>'.ucwords($stream_types[$i]).'</li>'.PHP_EOL;
  $stream_type_selector .='<option value="'.$stream_types[$i].'">'.ucwords($stream_types[$i]).'</option>'.PHP_EOL;
}
$stream_type_list.='</ul>'.PHP_EOL;
$stream_type_selector.='</select>'.PHP_EOL;

// CONSTRUCT CONTENT GROUP TYPE LIST
$content_group_type_list = '<ul class="category-list">'.PHP_EOL;
$content_group_type_selector = '<select name="content-group-type">'.PHP_EOL;
for($i=0; $i < count($content_group_types); $i++) {
	$content_group_type_list.='<li>'.$content_group_types[$i].'</li>'.PHP_EOL;
	$content_group_type_selector.='<option value="'.$content_group_types[$i].'">'.$content_group_types[$i].'</option>'.PHP_EOL;
}
$content_group_type_list.='</ul>'.PHP_EOL;
$content_group_type_selector.='</select>'.PHP_EOL;

// CONSTRUCT GROUPTYPELIST 
$gtids = array_keys($grouptypes);
$group_type_list = '<ul class="grouptype-list">'.PHP_EOL;
$group_type_selector = '<select name="group-type">'.PHP_EOL;
for($i=0; $i<count($grouptypes); $i++){
	$grouptypename = $gtids[$i];
	foreach($grouptypes[$gtids[$i]] as $gtid => $value){
		if($gtid=='permissions'){$permissions=$value;}
		if($gtid=='accesslevel'){if($value!=3){
			$group_type_list.='<li>'.$grouptypename.' ('.$permissions.')</li>'.PHP_EOL;
			$group_type_selector.='<option value="'.$grouptypename.'">'.$grouptypename.' ('.$permissions.')</option>'.PHP_EOL;
		}}
	}
}
$group_type_list.='</ul>'.PHP_EOL;
$group_type_selector.='</select>'.PHP_EOL;

// CONSTRUCT US TIMEZONE SELECTOR
$ustzids = array_keys($us_timezones);
$us_tz_selector = '<select name="us-timezone">'.PHP_EOL;
$us_tz_offset_selector = '<select name="us-timezone">'.PHP_EOL;
for($i=0; $i < count($us_timezones); $i++) {
	$tz_title = $ustzids[$i];
    foreach($us_timezones[$ustzids[$i]] as $ustzid => $value) {
		if($ustzid=='offset'){$offset=$value;}
		if($ustzid=='offset'){if(!empty($value)){
			$us_tz_selector.='<option value="'.$tz_title.'">'.$tz_title.'</option>'.PHP_EOL;
			$us_tz_offset_selector.='<option value="'.$offset.'">'.$tz_title.' ('.$offset.')</option>'.PHP_EOL;
		}}
    }
}
$us_tz_selector .= '</select>'.PHP_EOL;
$us_tz_offset_selector .= '</select>'.PHP_EOL;

// CONSTRUCT INPUT TYPE Selector
$input_type_list = '<ul class="input-type-list">'.PHP_EOL;
$input_type_selector = '<select name="input-type">'.PHP_EOL;
for($i=0; $i < count($input_types); $i++) {
	$input_type_list.='<li>'.$input_types[$i].'</li>'.PHP_EOL;
	$input_type_selector.='<option value="'.$input_types[$i].'">'.$input_types[$i].'</option>'.PHP_EOL;
}
$input_type_list.='</ul>'.PHP_EOL;
$input_type_selector.='</select>'.PHP_EOL;

// CONSTRUCT ELEMENT TAG TYPE Checklist
$element_tag_type_checklist = '<div class="form-group"><ul class="checkbox-group">'.PHP_EOL;
for($i=0; $i < count($element_tag_types); $i++) {
	$element_tag_type_checklist.='<li><input type="checkbox" name="tagelements[]" value="'.$element_tag_types[$i].'" /> '.$element_tag_types[$i].'</li>'.PHP_EOL;
}
$element_tag_type_checklist.='</ul></div>'.PHP_EOL;

// CONSTRUCT PATTERN INPUT Selector
$patternids = array_keys($patterns);
$pattern_input_selector = '<select name="pattern">'.PHP_EOL;
for($i=0; $i < count($patterns); $i++) {
	$pat_title = $patternids[$i];
    foreach($patterns[$patternids[$i]] as $patternid => $value) {
		if($patternid=='pattern'){$pat=$value;}
		if($patternid=='title'){$pat_title=$value;}
		if($patternid=='pattern'){if(!empty($value)){
			$pattern_input_selector.='<option value="'.$pat.'">'.$pat_title.'</option>'.PHP_EOL;
		}}
    }
}
$pattern_input_selector .= '</select>'.PHP_EOL;
?>