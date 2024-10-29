<?php require_once('common.php');
checkUser();
require_once 'get-csv-files.php';?>

<p>Signed in as <?php echo $_SESSION['userName'];?></p>
		<!-- List of CSV files -->
        <div class="block">
			<h3>CSV Files</h3>               
			<ul class="files file-list" style="list-style-type: none;">
				<?php foreach ($csvfiles as $basename) {
					echo makeCSVFileLink($basename, $csv);
				} ?>
			</ul>
		</div>
		<!-- Edit CSV content -->
		<div class="block">
		<style>
			i.edit:before, i.editing:before {display: inline-block;}
			i.edit:before {content:"\270E";}
			i.editing:before {content:"\270F";}
			<?php if($readonly==true){ ?>
			#csvtable td:last-child {display:none !important;}
			<?php } ?>
		</style>
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
				<?php if($readonly==false){ if($addrecord==true){?>
				<a href="#" id="addrow">&#10010; New Record</a><?php } ?>
				<hr />
				<a href="#" id="cancel">&#8630; Cancel</a>&nbsp;
				<a href="#" id="save">&#10004; Save</a>
				<?php } ?>
			</form>
			<div style="margin-top: 20px;" id="message"></div>
		<?php } ?>
		</div>

	<script src="js/jquery.3.js" type="text/javascript"></script>
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
		<?php if($readonly==false){ ?>
        h += "<td>";
        h += " <a href=\"#\" rel=\"editrow\" id=\"editrow-" + linenum + "\" title=\"Edit row\"><i class=\"fa " + (isenabled===true ? "editing" : "edit") + "\"></i></a>";
		h += " <a href=\"#\" rel=\"deleterow\" id=\"deleterow-" + linenum + "\" title=\"Delete row\">&#10006;</a>";
        h += "</td>";<?php } ?>
        h += "</tr>";
        return h;
    }
	</script>
<?php 
function makeTableRow($lineCnt, $row, $columns) {
    $h = "<tr rel=\"row\" id=\"row-" . $lineCnt . "\">";
    for ($columnCnt=0; $columnCnt<$columns; $columnCnt++) {
        $h .= "<td><input class=\"form-control" . ($columnCnt==0 ? " input-col-first" : " input-col-rest") . "\" rel=\"input-" . $lineCnt . "\" disabled type=\"text\" value=\"" . $row[$columnCnt] . "\"></td>";
    } 
	if($readonly==false){
	$h .= "<td>";
    $h .= " <a href=\"#\" rel=\"editrow\" id=\"editrow-" . $lineCnt . "\" title=\"Edit row\"><i class=\"edit\"></i></a>";
	$h .= " <a href=\"#\" rel=\"deleterow\" id=\"deleterow-" . $lineCnt . "\" title=\"Delete row\">&#10006;</a>";
	$h .= "</td>";
	}
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