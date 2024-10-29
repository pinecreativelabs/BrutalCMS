<?php 
$layouts = simplexml_load_file($droot_bos.'/molds/blueprint/module/data/layouts.xml');
$larray = array();
foreach($layouts->layout as $layout){if($layout['active']=='true'){
	$larray[]=$layout['id'];
}}
$layout_count = count($larray);

$new_layout_css='';
$new_layout_html='';
if($layout_count>0){ 
	foreach($layouts->layout as $layout){
		if(($layout['active']=='true')&&($layout['id']==$new_bpid)){
			// get variables
			$layoutname = strtolower(preg_replace('/\s*/','',$layout['title']));
			$layoutmethod = $layout['method'];
			$preset = $layout['preset'];
			$container = $layout->b3grid['contain'];
			$cols = $layout['cols']; // number of columns
			$rows = $layout['rows']; // number of rows
			
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
	
			
			if($layoutmethod=='b3grid'){
				$b3type = $layout->b3grid['type'];
				$b3dir = $layout->b3grid['dir'];
				$b3halign = $layout->b3grid['align-h'];
				$b3valign = $layout->b3grid['align-v'];
				
				$bwclasses='';
				if($b3dir!='row'){$bwclasses.=' '.$b3dir;}
				$bwclasses.=' '.$b3halign.' '.$b3valign;
				
				if($container!='none'){$new_layout_html.='<div class="'.$container.'">'.PHP_EOL;
				$new_layout_html.='<div class="block-wrap'.$bwclasses.'">'.PHP_EOL;
				include 'b3grid-layout-constructor.php';
				$new_layout_html.='</div>'.PHP_EOL;
				if($container!='none'){$new_layout_html.='</div>'.PHP_EOL;
				
			} elseif($layoutmethod=='bento'){
				$cellgap = $layout->bento['cellgap'];
				$bento_cols = $layout->bento['columns'];
				$bento_ar = $layout->bento['ar'];
				$bento_bf = $layout->bento['bf'];
				$bento_mcw = $layout->bento['mcw'];
					
			} elseif($layoutmethod=='cssgrid'){
				$gridflow = $layout->cssgrid['flow'];
				$gridgaps = $layout->cssgrid['gaps'];
				$placecontent = $layout->cssgrid['place-content'];
				$placeitems = $layout->cssgrid['place-items'];
					
			} elseif($layoutmethod=='bootstrap'){
				if($container!='none'){$new_layout_html.='<div class="'.$container.'">'.PHP_EOL;
				$new_layout_html.='<div class="row">'.PHP_EOL;
				include 'bootstrap-layout-constructor.php';
				$new_layout_html.='</div>'.PHP_EOL;
				if($container!='none'){$new_layout_html.='</div>'.PHP_EOL;
				
			} elseif($layoutmethod=='print'){
				if($container!='none'){$new_layout_html.='<div class="'.$container.'">'.PHP_EOL;
				
				if($container!='none'){$new_layout_html.='</div>'.PHP_EOL;
					
			}else{
				$column = $layout->column; // column class name
				$xu = $layout->column['x-unit']; // horizontal width unit
				$yu = $layout->column['y-unit']; // vertical height unit
				$minwidth = $layout->column['min-width'];
				$maxwidth = $layout->column['max-width'];
				$minheight = $layout->column['min-height'];
				$maxheight = $layout->column['max-height'];
				$width = $layout->column['width']; // default width
				$height = $layout->column['height']; // default height
				
				$minmax='';
				if($minwidth!=''){$minmax.='min-width: '.$minwidth.$xu.'; ';}
				if($minheight!=''){$minmax.='min-height: '.$minheight.$yu.'; ';}
				if($maxwidth!=''){$minmax.='max-width: '.$maxwidth.$xu.'; ';}
				if($maxheight!=''){$minmax.='max-height: '.$maxheight.$yu.'; ';}
				
				$new_layout_css.='<style>'.PHP_EOL.'.'.$layoutname.'{}'.PHP_EOL;
				$new_layout_css.='.'.$layoutname.'>div{width: '.$width.$xu.'; height: '.$height.$yu.'; '.$minmax.'}'.PHP_EOL;
				$new_layout_css.='</style>'.PHP_EOL;
				
				$new_layout_html.= '<div class="'.$layoutname.'">'.PHP_EOL.
				
				
				$new_layout_html.='</div>'.PHP_EOL;
			}
			
		}else{ $new_layout_html.='<p>No layouts available.</p>'.PHP_EOL;}
	}
} else { $new_layout_html.='<p>No layouts available.</p>'.PHP_EOL;}
?>