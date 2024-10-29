<?php
if(isset($_POST["action"]) && $_POST["action"]=="upload")
{
	if(!empty($_FILES))
	{
		$result = array();
		$tempFile = $_FILES["Filedata"]["tmp_name"];
		$targetPath = $_POST["path"];
		$pathinfo = pathinfo($_FILES['Filedata']['name']);
		$fileExt = $pathinfo["extension"];
		$result["error"] = "";
		if($fileExt!="php" && $fileExt!="php5" && $fileExt!="php4" && $fileExt!="php3" && $fileExt!="html" && $fileExt!="htm" && $fileExt!="js")
		{
			$targetFile =  $targetPath . stripslashes($_FILES["Filedata"]["name"]);
			if(!move_uploaded_file($tempFile, $targetFile))
				$result["error"] .= "Upload failed!";
		}
		else
			$result["error"] .= " Cannot upload " . $fileExt . " files!";

		if($result["error"]=="")
			echo "amu_start1amu_end";
		else
			echo "amu_start" . $result["error"] . "amu_end";
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