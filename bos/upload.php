<?php
if(isset($_POST["PHPSESSID"]) && $_POST["PHPSESSID"]!="")
{
	session_id($_POST["PHPSESSID"]);
	//session_name("your_session_name"); uncomment this if your session has a name
	session_start();
}
if(isset($_POST["action"]) && $_POST["action"]=="upload")
{
	if(!empty($_FILES))
	{
		$result = array();
		$tempFile = $_FILES["Filedata"]["tmp_name"];
		$targetPath = $_POST["path"];
		$pathinfo = pathinfo($_FILES['Filedata']['name']);
		$fileExt = $pathinfo["extension"];
		if($fileExt!="php" && $fileExt!="php5" && $fileExt!="php4" && $fileExt!="php3" && $fileExt!="html" && $fileExt!="htm" && $fileExt!="js")
		{
			//$fileName = stripslashes($pathinfo["filename"]) . time();
			$fileName = stripslashes($pathinfo["filename"]);
			$targetFile =  $targetPath . $fileName . "." . $fileExt;
			if(move_uploaded_file($tempFile, $targetFile))
			{
				if(isset($_POST["text_watermark_thumbnails"]) && (int)$_POST["text_watermark_thumbnails"])
				{
					//textWatermark
					$textWatermarks = array();
					$i = 0;
					while($_POST["text_watermark_width".$i]!="")
					{
						$textWatermarks[$i]["text"] = $_POST["text_watermark_text".$i];
						$textWatermarks[$i]["width"] = $_POST["text_watermark_width".$i];
						$textWatermarks[$i]["height"] = $_POST["text_watermark_height".$i];
						$textWatermarks[$i]["background_color"] = $_POST["text_watermark_background_color".$i];
						$textWatermarks[$i]["text_color"] = $_POST["text_watermark_text_color".$i];
						$textWatermarks[$i]["bg_transparency"] = $_POST["text_watermark_bg_transparency".$i];
						$textWatermarks[$i]["text_transparency"] = $_POST["text_watermark_text_transparency".$i];
						$textWatermarks[$i]["font"] = $_POST["text_watermark_font".$i];
						$textWatermarks[$i]["font_size"] = $_POST["text_watermark_font_size".$i];
						$textWatermarks[$i]["text_x"] = $_POST["text_watermark_text_x".$i];
						$textWatermarks[$i]["text_y"] = $_POST["text_watermark_text_y".$i];
						$textWatermarks[$i]["right"] = $_POST["text_watermark_right".$i];
						$textWatermarks[$i]["bottom"] = $_POST["text_watermark_bottom".$i];
						$i++;
					}
					if(count($textWatermarks))
					{
						require_once("functions.php");
						$imagesize = getimagesize($targetFile);
						$width = $imagesize[0];
						$height = $imagesize[1];
						resizeImage($width, $height, $targetFile, $targetFile, array(), $textWatermarks);
					}
				}
				if(isset($_POST["watermark_thumbnails"]) && (int)$_POST["watermark_thumbnails"])
				{
					//watermark
					$watermarks = array();
					$i = 0;
					while($_POST["watermark_path".$i]!="")
					{
						$watermarks[$i]["path"] = $_POST["watermark_path".$i];
						$watermarks[$i]["bottom"] =  $_POST["watermark_bottom".$i];
						$watermarks[$i]["right"] =  $_POST["watermark_right".$i];
						$i++;
					}
					if(count($watermarks))
					{
						require_once("functions.php");
						$imagesize = getimagesize($targetFile);
						$width = $imagesize[0];
						$height = $imagesize[1];
						resizeImage($width, $height, $targetFile, $targetFile, $watermarks);
					}
				}
				//generate thumbnails after the main file is uploaded
				if(isset($_POST["thumbnails"]) && $_POST["thumbnails"]!="")
				{
					require_once("functions.php");
					$thumbnailsExplode = explode(",", $_POST["thumbnails"]);
					if($_POST["thumbnailsFolders"]!="")
						$thumbnailsFoldersExplode = explode(",", $_POST["thumbnailsFolders"]); 
					if($_POST["thumbnailsCrop"]!="") 
						$thumbnailsCropExplode = explode(",", $_POST["thumbnailsCrop"]); 

					$result["thumbnails"] = array();
					for($i=0; $i<count($thumbnailsExplode); $i++)
					{
						$dimensions = explode("x", trim($thumbnailsExplode[$i]));
						$sourceFile = $targetFile;
						$destinationFile = (trim($thumbnailsFoldersExplode[$i])!="" ? trim($thumbnailsFoldersExplode[$i]):$targetPath) . "thumb" . $i . "_" . $fileName . "." . $fileExt;
						resizeImage($dimensions[0], $dimensions[1], $sourceFile, $destinationFile,array(),array(),$thumbnailsCropExplode[$i]);
						$result["thumbnails"][] = "thumb" . $i . "_" . $fileName . "." . $fileExt;
					}
				}
				if(!isset($_POST["text_watermark_thumbnails"]) || !(int)$_POST["text_watermark_thumbnails"])
				{
					//textWatermark
					$textWatermarks = array();
					$i = 0;
					while(isset($_POST["text_watermark_width".$i]) && $_POST["text_watermark_width".$i]!="")
					{
						$textWatermarks[$i]["text"] = $_POST["text_watermark_text".$i];
						$textWatermarks[$i]["width"] = $_POST["text_watermark_width".$i];
						$textWatermarks[$i]["height"] = $_POST["text_watermark_height".$i];
						$textWatermarks[$i]["background_color"] = $_POST["text_watermark_background_color".$i];
						$textWatermarks[$i]["text_color"] = $_POST["text_watermark_text_color".$i];
						$textWatermarks[$i]["bg_transparency"] = $_POST["text_watermark_bg_transparency".$i];
						$textWatermarks[$i]["text_transparency"] = $_POST["text_watermark_text_transparency".$i];
						$textWatermarks[$i]["font"] = $_POST["text_watermark_font".$i];
						$textWatermarks[$i]["font_size"] = $_POST["text_watermark_font_size".$i];
						$textWatermarks[$i]["text_x"] = $_POST["text_watermark_text_x".$i];
						$textWatermarks[$i]["text_y"] = $_POST["text_watermark_text_y".$i];
						$textWatermarks[$i]["right"] = $_POST["text_watermark_right".$i];
						$textWatermarks[$i]["bottom"] = $_POST["text_watermark_bottom".$i];
						$i++;
					}
					if(count($textWatermarks))
					{
						require_once("functions.php");
						$imagesize = getimagesize($targetFile);
						$width = $imagesize[0];
						$height = $imagesize[1];
						resizeImage($width, $height, $targetFile, $targetFile, array(), $textWatermarks);
					}
				}
				if(!isset($_POST["watermark_thumbnails"]) || !(int)$_POST["watermark_thumbnails"])
				{
					//watermark
					$watermarks = array();
					$i = 0;
					while(isset($_POST["watermark_path".$i]) && $_POST["watermark_path".$i]!="")
					{
						$watermarks[$i]["path"] = $_POST["watermark_path".$i];
						$watermarks[$i]["bottom"] =  $_POST["watermark_bottom".$i];
						$watermarks[$i]["right"] =  $_POST["watermark_right".$i];
						$i++;
					}
					if(count($watermarks))
					{
						require_once("functions.php");
						$imagesize = getimagesize($targetFile);
						$width = $imagesize[0];
						$height = $imagesize[1];
						resizeImage($width, $height, $targetFile, $targetFile, $watermarks);
					}
				}
			}
			else
				$result["error"] .= " Upload failed!";
		}
		else
			$result["error"] .= " Cannot upload " . $fileExt . " files!";
		$result["path"] = $targetPath;
		$result["filename"] = $fileName . "." . $fileExt;
		$result["extension"] = $fileExt;
		echo "imu_start" . json_encode($result) . "imu_end";
		exit();
	}
}
else if(isset($_POST["action"]) && $_POST["action"]=="remove")
{
	$message = "";
	/*if you uploading files to other than files directory, you've got to change it in three below lines
	in function pathinfo, in if statement and in unlink function*/
	$pathInfo = pathinfo("files/".stripslashes($_POST["filename"]));
	if($pathInfo['dirname']=="files")
	{
		if(!@unlink("files/".stripslashes($_POST["filename"])))
			 $message = "Error - file not found! ";
	}
	else
		$message = "Security error!";
	echo $message;
}
?>