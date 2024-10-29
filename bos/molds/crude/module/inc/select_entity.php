<!-- Add New Data Group -->
<div style="display:none;" id="selectentity">
	<div class="padded">
		<h4 class="modal-title addnew"><strong>Select Entity</strong></h4>
		<?php if($fc>0){?>
		<ul class="tags" style="list-style-type: none;">
			<?php foreach ($csvfiles as $basename) {
					foreach($file->entity as $row){
						$dfile = substr($basename,0,-4);
						if($row['title']==$dfile){
							echo makeCSVFileLink($basename, $csv);
							break;
						}
					}
				} 
			?>
		</ul><?php } else {echo '<p style="color:#333;">No entities available.</p>';}?>
	</div>
</div>