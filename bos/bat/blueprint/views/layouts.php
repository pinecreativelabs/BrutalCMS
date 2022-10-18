<?php 
if($layouts->layout->count()>0){ 
	foreach($layouts->layout as $layout){
		// get variables
		$layoutname = strtolower(preg_replace('/\s*/','',$layout['title']));
		$layoutmethod = $layout['method'];
		$column = $layout->column; // column class name
		$cols = $layout['cols']; // number of columns
		$rows = $layout['rows']; // number of rows
		$xu = $layout->column['x-unit']; // horizontal width unit
		$yu = $layout->column['y-unit']; // vertical height unit
		$width = $layout->column['width']; // default width
		$minwidth = $layout->column['min-width'];
		$maxwidth = $layout->column['max-width'];
		$height = $layout->column['height']; // default height
		$minheight = $layout->column['min-height'];
		$maxheight = $layout->column['max-height'];
		$rules = strtolower($layout->rules); // responsive rule classes
		$xxs = $layout->rules['xxs']; // wearables
		$xs = $layout->rules['xs']; // small mobile
		$sm = $layout->rules['sm']; // mobile
		$md = $layout->rules['md']; // tablets
		$lg = $layout->rules['lg']; // laptops
		$xl = $layout->rules['xl']; // desktops
		$xxl = $layout->rules['xxl']; // televisions
		// create responsive rules string
		$rrules = '';
		if($xxs!=''){$rrules.='xxs-'.$xxs.' ';}
		if($xs!=''){$rrules.='xs-'.$xs.' ';}
		if($sm!=''){$rrules.='sm-'.$sm.' ';}
		if($md!=''){$rrules.='md-'.$md.' ';}
		if($lg!=''){$rrules.='lg-'.$lg.' ';}
		if($xl!=''){$rrules.='xl-'.$xl.' ';}
		if($xxl!=''){$rrules.='xxl-'.$xxl.' ';}
		if($rules!=''){$rrules.=$rules.' ';}

		// build your layout code here
		if($layout['title']=='TITLE OF LAYOUT'){
			if($layoutmethod=='b3grid'){
				
			} elseif($layoutmethod=='cssgrid'){
				
			} elseif($layoutmethod=='bootstrap'){
				
			} else {}
		}
	}
} else { echo '<p>No layouts available.</p>';}
?>