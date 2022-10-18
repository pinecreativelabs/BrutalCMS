<?php require_once 'get-csv-files.php';
include realpath(__DIR__. '/../../..').'/sat/sos/paths.php';
$getbasestyle = $bosdir.'bat/css/brutalist.lite.css';
$geteditor = $bosdir.'bat/css/editor.css';
$getgrid = $bosdir.'bat/css/blueprintgrid/minified/b3grid.min.css';
$crudeconfigdatapath = 'data/config.csv';
$row = 0;
if (($handlecrudeconfig = fopen($crudeconfigdatapath, "r")) !== FALSE) {
	while (($pdata = fgetcsv($handlecrudeconfig, 1000, ",")) !== FALSE) {
		$row++;
		$addrecords = $pdata[0];
		$delrecords = $pdata[1];
		$readonly = $pdata[2];
	}
	fclose($handlecrudeconfig);
}
$ggdir = realpath(__DIR__. '/../../..').'/rat/repo/data/csv';
$file = simplexml_load_file('data/entities.xml');
$fc = $file->count();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>CRUDE Data Editor</title>
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
		<?php if($readonly=='true'){ ?>
		#csvtable td:last-child {display:none !important;}
		<?php } ?>
		<?php if($delrecords=='false'){?>
		#csvtable td:last-child a[rel~="deleterow"]{display: none !important;}
		<?php } ?>
	</style>
</head>
<body>

<a href="#selectentity" class="add-btn brick" data-modal-open>&#9998; Select Entity</a>

<?php session_start();
if(isset($_SESSION['message'])){ ?>
<div class="padded" style="background: #ff0000; color: #ffff00; margin-top:20px;"><?php echo $_SESSION['message']; ?></div>
<?php unset($_SESSION['message']); } ?>
<div class="padded">
<div class="block-wrap">
	<!-- Edit CSV content -->
	<div class="block bw100">
	<?php if($fc>0){ ?>
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
			<?php if($readonly=='false'){ if($addrecords=='true'){?>
			<a href="#" id="addrow" class="new-record-btn">&#10010; New Record</a><?php } ?>
			<hr />
			<a href="#" id="cancel" class="del-btn">&#8630; Cancel</a>&nbsp;
			<a href="#" id="save" class="btn-save">&#10004; Save</a>
			<?php } ?>
		</form>
		<div style="margin-top: 20px;" id="message"></div>
	<?php } }else{echo '<div style="margin-top: 2em; margin-bottom: 2.5em;"><h3>no entities</h3></div>';}?>
	</div>
</div>
</div>
<?php include 'inc/select_entity.php';?>
<!-- Initiate modal -->
<div class="modal">
	<div class="modal-inner draggable">
		<span data-modal-close>&times;</span>
		<div class="modal-content"></div>
	</div>
</div>

<script src="<?php echo $bosdir; ?>bat/jab/functions/modal.js"></script>
<script src="<?php echo $bosdir; ?>bat/jab/jquery.3.js"></script>
<script>
    var csvfile = "<?php echo $csv;?>";
    // Enable/disable row 
    $(document).on("click", "a[rel=editrow]", function(e) { 
	// $("a[rel=editrow]").click(function(e) { 
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
        $("#"+messageid).html(h); return;
    }
	
	function makeTableRow(linenum, columns, isenabled) {
        var h = "<tr rel=\"row\" id=\"row-" + linenum + "\" class=\"" + (isenabled===true ? "success" : "") + "\">";
        for (var columncnt=0; columncnt<columns; columncnt++) {
            h += "<td><input class=\"form-control" + (columncnt==0 ? " input-col-first" : " input-col-rest") + "\" rel=\"input-" + linenum + "\"" + (isenabled===true ? "" : " disabled") + " type=\"text\" value=\"\"></td>";
        }
        h += "<td style=\"width: 86px; text-align: center;\">";
		<?php if($readonly=='false'){?>
        h += " <a href=\"#\" rel=\"editrow\" id=\"editrow-" + linenum + "\" title=\"Edit row\"><i class=\"fa " + (isenabled===true ? "editing" : "edit") + "\"></i></a>";
		h += " <a href=\"#\" rel=\"deleterow\" id=\"deleterow-" + linenum + "\" title=\"Delete row\">&#10006;</a>";
		<?php } ?>
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
        $h .= "<td><input class=\"form-control" . ($columnCnt==0 ? " input-col-first" : " input-col-rest") . "\" rel=\"input-" . $lineCnt . "\" disabled type=\"text\" value=\"" . $row[$columnCnt] . "\"></td>";
    } 
	$h .= "<td style=\"width: 84px; text-align: center;\">";
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