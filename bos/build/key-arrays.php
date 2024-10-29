<?php 
// CONTENT GROUPING
$contenttypes = array('element','data','form','ui','multimedia','navigation','other','hidden');
$element_types = array('aside','address','blockquote','figure','article','fieldset','details','div','iframe','table','progress','meter','picture','menu');
$content_group_types = array('blog','gallery','list','fieldset','tabs','menu','table','modal','slider','accordion','header','footer','main','section','sidebar');
$contentposttypes = array('Guest','Interview','Case Study','Comparison','Guide','Authority','Media','Narrative','Personal','Research','Ephemeral','Listicle','Review','News');
$stream_types = array('audio','video','photo','article','event','product','notification');
sort($contentposttypes);
sort($contenttypes);
sort($element_types);
sort($stream_types);
sort($content_group_types);

// Favicons
$ficons = array (
	// icon initial, size, format (ico or png), enabled
	array('f',16,'ico',true),		// favicon
	array('s',32,'png',true),		// shortcut icon
	array('a',180,'png',true),		// Apple touch
);

// FONTS
$fonts = array(
	'Bitstream'=>array('fontclass'=>'bitstream','active'=>true),
	'Communist'=>array('fontclass'=>'communist','active'=>true),
	'Depixel'=>array('fontclass'=>'depixel','active'=>true),
	'Monolisk'=>array('fontclass'=>'monolisk','active'=>true),
	'VCR Mono'=>array('fontclass'=>'vcr-mono','active'=>true),
	'Writer Duospace'=>array('fontclass'=>'writer-duospace','active'=>true)
);
ksort($fonts);

// USER GROUP TYPES
$grouptypes = array(
	'superadmin'=>array('permissions'=>'owner','accesslevel'=>3),
	'admin'=>array('permissions'=>'full read-write','accesslevel'=>2),
	'editors'=>array('permissions'=>'partial read-write','accesslevel'=>1),
	'guests'=>array('permissions'=>'read-only','accesslevel'=>0)
);

// TIMEZONES
$us_timezones = array(
	'AST'=>array('offset'=>'UTC -4','name'=>'Atlantic Standard Time'),
	'AKST'=>array('offset'=>'UTC -9','name'=>'Alaska Standard Time'),
	'CST'=>array('offset'=>'UTC -6','name'=>'Central Standard Time'),
	'EST'=>array('offset'=>'UTC -5','name'=>'Eastern Standard Time'),
	'HST'=>array('offset'=>'UTC -10','name'=>'Hawaii Standard Time',),
	'MST'=>array('offset'=>'UTC -7','name'=>'Mountain Standard Time'),
	'PST'=>array('offset'=>'UTC -8','name'=>'Pacific Standard Time'),
	'SST'=>array('offset'=>'UTC -11','name'=>'Samoa Standard Time'),
	'WAKT'=>array('offset'=>'UTC +12','name'=>'Wake Time')
);

// ELEMENT TAG TYPES
$element_tag_types = array('a','aside','p','img','audio','ul','ol','video','hr','iframe','nav','menu','article','section','footer','header','blockquote','form','details','main','table');
sort($element_tag_types);

// INPUT TYPES 
$input_types = array('text','textarea','url','email','number','radio','select','checkbox','hidden','date','datetime-local','color','range','tel','time');
sort($input_types);

// PATTERNS
$patterns = array(
	'email'=>array('pattern'=>'[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,}$','title'=>'Email Validator'),
	'phone'=>array('pattern'=>'[0-9]{3}-?[0-9]{3}-?[0-9]{4}','title'=>'US Phone'),
	'url'=>array('pattern'=>'https?://.+','title'=>'URL Validator'),
	'dec2'=>array('pattern'=>'\d+(\.\d{2})?','title'=>'Two Decimal: 1.00'),
	'dec2c'=>array('pattern'=>'\d+(\.\d{2})?','title'=>'Two Decimal with comma: 1,00'),
	'hex'=>array('pattern'=>'^#?([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$','title'=>'Hex-Color'),
	'alpha'=>array('pattern'=>'[a-zA-Z0-9]+','title'=>'Alpha-Numeric'),
	'card'=>array('pattern'=>'[0-9]{13,16}','title'=>'Credit Card'),
	'isbn'=>array('pattern'=>'(?:(?=.{17}$)97[89][ -](?:[0-9]+[ -]){2}[0-9]+[ -][0-9]|97[89][0-9]{10}|(?=.{13}$)(?:[0-9]+[ -]){2}[0-9]+[ -][0-9Xx]|[0-9]{9}[0-9Xx])','title'=>'ISBN')
);
ksort($patterns);
?>