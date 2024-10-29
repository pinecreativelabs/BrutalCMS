<?php 
include realpath(__DIR__. '/../../..').'/sat/sos/paths.php';
$getbasestyle = $bosdir.'bat/css/brutalist.lite.css';
$geteditor = $bosdir.'bat/css/editor.css';
$getgrid = $bosdir.'bat/css/blueprintgrid/minified/b3grid.min.css';
$common = 'common.php';
require_once($common);
checkUser();
$sysdefaultdata = realpath(__DIR__. '/../../..').'/sat/sos/system/data/defaults.csv';

if (($dhandle = fopen($sysdefaultdata, "r")) !== FALSE) {
	while (($pdata = fgetcsv($dhandle, 1000, ",")) !== FALSE) {
		$row++;
		$sitename = $pdata[0];
		$mailto = $pdata[1];
		$ddf = $pdata[2];
		$dtf = $pdata[3];
		$default_theme = $pdata[4];
		$fam_curl_mode = $pdata[5];
	} fclose($dhandle);
}

// user account
$skip_row_number = array("1");
if (($handlep = fopen(realpath(__DIR__. '/../../..')."/pat/profiles/".$_SESSION['userName'].".csv", "r")) !== FALSE) {
	while (($pdata = fgetcsv($handlep, 1000, ",")) !== FALSE) {
		$row++;
		if (in_array($row, $skip_row_number)){continue;} else {
			if($pdata[3]==1){$ugroup='administrator';}elseif($pdata[3]==2){$ugroup='editor';}elseif($pdata[3]==3){$ugroup='user';}else{$ugroup='BOS Admin';}
			$uid = $pdata[0];
			$uname = $pdata[1];
			if($pdata[2]==''){ $uemail = '[null]'; } else { $uemail = $pdata[2]; }
			$uactive = $pdata[3];
		}
	} fclose($handlep);
}

require_once 'get-csv-files.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>PAD Raw Data Editor</title>
	<link rel="stylesheet" type="text/css" href="<?php echo $getbasestyle;?>">
	<link rel="stylesheet" type="text/css" href="<?php echo $geteditor;?>">
	<link rel="stylesheet" type="text/css" href="<?php echo $getgrid;?>">
	<style>
		.padded {padding: 1em;}
		form table td input:disabled, form table td input {color: #333;}
		.tags li {background: #e2e2e2; border: 1px solid #333; border-radius: 3px; -webkit-border-radius: 3px;}
		.tags li a {padding: 6px;}
		.tags li a.active {font-weight: 600; text-decoration: underline;}
		.new-record-btn {display: inline-block; background: #0f52ba; color: #fff; padding: 0.75em; font-wize: 1em; font-weight: 600;}
		.new-record-btn:hover {background: #fff; color: #0f52ba;}
		a[rel~="editrow"],a[rel~="deleterow"]{font-size: 24px; height: 36px; width: 36px; text-align: center; display: inline-block; padding: 3px; font-weight: 600; }
		a[rel~="editrow"]{ background: #0f52ba; color: #fff;}
		a[rel~="deleterow"]{background: #ff0000; color: #ffff00;}
		i.edit:before, i.editing:before {display: inline-block;}
		i.edit:before {content:"\270E";}
		i.editing:before {content:"\270F";}
		.file-list {padding: 0; margin: 0;}
		.file-list li {display: inline-block; border: 1px solid #fff; border-radius: 4px; -webkit-border-radius: 4px; padding: 6px; margin-left: 0; margin-right: 10px;}
		.file-list li a:link, .file-list li a:visited{color: #ffff00;}
		.file-list li:hover {background: #333;}
		.file-list li a.active {font-weight: 600;}
	</style>
</head>
<body>

<header><div style="display: block; height: 40px; margin: 0; width: 100%;"></div>
	<p><?php echo 'Editing as: <strong>'.$_SESSION['userName']; ?></strong> with <?php echo $ugroup; ?> permissions</p>
</header>
<?php session_start();
if(isset($_SESSION['message'])){ ?>
<div class="padded" style="background: #ff0000; color: #ffff00; margin-top:20px;"><?php echo $_SESSION['message']; ?></div>
<?php unset($_SESSION['message']); } ?>
<div class="padded">
    <div class="block-wrap smoke-t">
		<div class="block bw100">
			<h4>PAD Data Files</h4>               
			<ul class="files file-list" style="list-style-type: none;">
				<?php foreach ($csvfiles as $basename) {
					echo makeCSVFileLink($basename, $csv);
				} ?>
			</ul>
		</div>
		<div class="block bw100">
		<?php if(!isset($csv)) {} else {
			// CSV file is not empty, let's show the content
			$row = explode(CSVSeparator, $lines[0]);
			$columns = sizeof($row); ?>
			<form>
				<h3><?php echo $csv; ?></h3>
				<table id="csvtable">
					<thead><tr>
						<?php // Show header
						for ($columnCnt=0; $columnCnt<$columns; $columnCnt++) {
								echo "<th>" . $row[$columnCnt] . "</th>";
						} if($readonly==false){echo "<th>&nbsp;</th>";}?>
					</tr></thead>                        
					<tbody>
						<?php // Show content
							for ($lineCnt=1; $lineCnt<sizeof($lines); $lineCnt++) {
								$row = explode(CSVSeparator, $lines[$lineCnt]);
								echo makeTableRow($lineCnt, $row, $columns);
							} ?>
					</tbody>
				</table>
				<a href="#" id="addrow" class="new-record-btn">&#10010; New Record</a>
				<hr />
				<a href="#" id="cancel" class="del-btn">&#8630; Cancel</a>&nbsp;
				<a href="#" id="save" class="btn-save">&#10004; Save</a>
			</form>
			<div style="margin-top: 20px;" id="message"></div>
		<?php } ?>
		</div>
		</div>
	</div>
</div>  

<!-- Initiate modal -->
<div class="modal">
	<div class="modal-inner draggable">
		<span data-modal-close>&times;</span>
		<div class="modal-content"></div>
	</div>
</div>

<script src="<?php echo $bosdir; ?>bat/jab/functions/modal.js"></script>
<script src="<?php echo $bosdir; ?>bat/jab/jquery.3.js" type="text/javascript"></script>
<script>
    var csvfile = "<?php echo $csv;?>";
    // Enable/disable row 
    $(document).on("click", "a[rel=editrow]", function(e) { 
//    $("a[rel=editrow]").click(function(e) { 
        e.preventDefault();
        // get id clicked a and extract the linenumber
        var linenum = this.id.split("-")[1];

        // change button icon and row background color according to state
        var rowIsEnabled;
        if ($(this).children().attr("class") === "editing") {
            rowIsEnabled = true;
            $(this).children().attr("class", "edit");
        }
        else {
            rowIsEnabled = false;
            $(this).children().attr("class", "editing");
        }
        $("#row-"+ linenum).toggleClass("success");

        // Toggle (disable/enable) every input field in row
        $("input[rel=input-"+ linenum + "]").each(function( i ) {
            $(this).prop("disabled", rowIsEnabled);
        });
    });
    
    // Delete row
    $(document).on("click", "a[rel=deleterow]", function(e) { 
        e.preventDefault();
        // get id clicked a and extract the linenumber
        var linenum = this.id.split("-")[1];
        // change background color of row to indicate that row is unlocked/locked
        $("#row-"+ linenum).hide();
    });
    // Add row
    $("#addrow").click(function(e) { 
        e.preventDefault();
        // get linenumber of last row
        var linenum = parseInt($("#csvtable tbody tr:last").attr("id").split("-")[1]);
        $("#csvtable tbody").append(makeTableRow(linenum+1, <?php echo $columns;?>, true));
    });
    // Cancel (reload page)
    $("#cancel").click(function(e) { 
        e.preventDefault();
        location.reload(true);
    });

    // Save
	$("#save").click(function(e) { 
        e.preventDefault();
        var csvlines = {};
        var columncnt = 0;
        var linecnt = 0;
        // Loop through all (visible only) table rows and make data
        $("[rel=row]:visible").each(function() {
            var linenum = this.id.split("-")[1];
            var thisline = {};
            columncnt = 0;
            $("input[rel=input-"+ linenum + "]").each(function() {
                thisline['col-'+columncnt] = $(this).val(); 
                columncnt++;
            });
            csvlines['line-'+linecnt] = thisline;
            linecnt++;
        });
        var csvdata = {csvfile: csvfile, lines: linecnt, columns: columncnt, data: csvlines};
        //alert(JSON.stringify(csvdata));

        // Write data to file and show result to user
        $.ajax({
            url: "savetocsv.php",
            method: "POST",
            contentType: 'application/json; charset=utf-8',
            dataType: 'json', async: false,
            data: JSON.stringify(csvdata),
            cache: false,
            success: function(response) {
                makeMessage("<h4>" + response.responseText + "</h4>Page will reload momentarily.", "success", "message");
                // reload page in 3 sec
                setTimeout(function(){location.reload();}, 2500);
                
            },
            error: function(response) {
                makeMessage("<h4>ERROR</h4>" + response.status + " " + response.statusText, "danger", "message");
            }
        });        
    });
	function makeMessage(messagetext, messagetype, messageid){
        var h = "<div class=\"alert alert-" + messagetype + " alert-dismissible\" role=\"alert\">"+ messagetext + "</div>";
        $("#"+messageid).html(h);
        return;
    }
	function makeTableRow(linenum, columns, isenabled) {
        var h = "<tr rel=\"row\" id=\"row-" + linenum + "\" class=\"" + (isenabled===true ? "success" : "") + "\">";
        for (var columncnt=0; columncnt<columns; columncnt++) {
            h += "<td><input class=\"form-control" + (columncnt==0 ? " input-col-first" : " input-col-rest") + "\" rel=\"input-" + linenum + "\"" + (isenabled===true ? "" : " disabled") + " type=\"text\" value=\"\"></td>";
        }
        h += "<td>";
        h += " <a href=\"#\" rel=\"editrow\" id=\"editrow-" + linenum + "\" title=\"Edit row\"><i class=\"fa " + (isenabled===true ? "editing" : "edit") + "\"></i></a>";
        h += " <a href=\"#\" rel=\"deleterow\" id=\"deleterow-" + linenum + "\" title=\"Delete row\">&#10006;</a>";
		h += "</td>";
        h += "</tr>";
        return h;
    }
</script>
</body>
</html>
<?php 
function makeTableRow($lineCnt, $row, $columns) {
	$h = "<tr rel=\"row\" id=\"row-" . $lineCnt . "\">";
    for ($columnCnt=0; $columnCnt<$columns; $columnCnt++) {
        $h .= "<td><input class=\"form-control" . ($columnCnt==0 ? " input-col-first" : " input-col-rest") . "\"rel=\"input-" . $lineCnt . "\" disabled type=\"text\" value=\"" . $row[$columnCnt] . "\"></td>";
    } 
	$h .= "<td>";
    $h .= " <a href=\"#\" rel=\"editrow\" id=\"editrow-" . $lineCnt . "\" title=\"Edit row\"><i class=\"edit\"></i></a>";
	$h .= " <a href=\"#\" rel=\"deleterow\" id=\"deleterow-" . $lineCnt . "\" title=\"Delete row\">&#10006;</a>";
	$h .= "</td>";
    $h .= "</tr>";
    return $h;
}
function makeCSVFileLink($basename, $activebasename) {
    // Include CSV files only (defined by extension)
	if((substr($basename, -3)==CSVFileExtension)||(substr($basename, -3)==CSVFileExt2)){
        $h = "<li><a href=\"?file=" . $basename . "\" ";
        $h .= "class=\"list-group-item" . ($basename==$activebasename ? " active" : "") . "\">";
        $h .= $basename . "</a></li>";
    }
    return $h;
}
?>