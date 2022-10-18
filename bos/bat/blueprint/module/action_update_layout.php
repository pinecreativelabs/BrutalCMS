<?php
	session_start();
	if(isset($_POST['edit'])){
		$layouts = simplexml_load_file('data/layouts.xml');
		foreach($layouts->layout as $layout){
			if($layout['id'] == $_POST['id']){
				$layout['title'] = $_POST['title'];
				$layout['method'] = $_POST['method'];
				$layout['cols'] = $_POST['cols'];
				$layout['rows'] = $_POST['rows'];
				
				$layout->column = $_POST['col-classes'];
				$layout->column['width'] = $_POST['width'];
				$layout->column['min-width'] = $_POST['min-width'];
				$layout->column['max-width'] = $_POST['max-width'];
				$layout->column['height'] = $_POST['height'];
				$layout->column['min-height'] = $_POST['min-height'];
				$layout->column['max-height'] = $_POST['max-height'];
				$layout->column['x-unit'] = $_POST['x-unit'];
				$layout->column['y-unit'] = $_POST['y-unit'];
				
				$layout->rules = $_POST['rule-classes'];
				$layout->rules['xxs'] = $_POST['xxs'];
				$layout->rules['xs'] = $_POST['xs'];
				$layout->rules['sm'] = $_POST['sm'];
				$layout->rules['md'] = $_POST['md'];
				$layout->rules['lg'] = $_POST['lg'];
				$layout->rules['xl'] = $_POST['xl'];
				$layout->rules['xxl'] = $_POST['xxl'];
				break;
			}
		}
		file_put_contents('data/layouts.xml', $layouts->asXML());
		$_SESSION['message'] = 'Layout updated successfully';
		header('location: page_edit_layouts.php');
	}
	else{
		$_SESSION['message'] = 'Select a layout to edit';
		header('location: page_edit_layouts.php');
	}

?>