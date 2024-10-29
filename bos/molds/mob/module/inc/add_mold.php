<!-- Add New Mold -->
<div style="display:none;" id="addnew">
	<div class="padded">
		<h4 class="modal-title addnew"><strong>New Mold</strong></h4>
		<?php if($ofc<=0){echo '<div class="warningbox">No objects available. Create an object before creating a new mold.</div>';}else{?>
		<form method="POST" action="action_new_mob.php">
			<input type="hidden" name="pup" value="addmold"/>
			<?php 
			$last_bid = $file->xpath('//mold[last()]');
			$last_bid1 = str_replace('mold-','',$last_bid[0]['id']);
			$last_bid = (int) $last_bid1;
			$new_bid = 'mold-'.($last_bid + 1); 
			?>
			<input type="hidden" name="id" value="<?php echo $new_bid;?>" />
			<div style="min-width: 80vw;"><div class="tabs">
				<input type="radio" name="newmold" id="no-tab1" checked="checked">
				<label for="no-tab1">General</label>
				<div class="tab"><div class="block-wrap">
					<div class="block bw50 xs-100 sm-100 md-100">
						<div class="form-group">
							<span class="label">Title:</span><br />
							<input type="text" name="title" /><br />
							<span class="label">Description:</span><br />
							<textarea name="desc" rows="2"></textarea>
						</div>
					</div><div class="block bw50 xs-100 sm-100 md-100">
						<div class="form-group">
							<span class="label"><input type="checkbox" name="active" value="true" checked="checked" /> active</span>
						</div>
						<div class="form-group">	
							<span class="label">Content Type</span>
							<?php echo $content_type_selector;?><br />
							<span class="label">Element Type</span>
							<?php echo $element_type_selector;?>
						</div>
					</div>
				</div></div>
				<input type="radio" name="newmold" id="nm-tab2">
				<label for="nm-tab2">Objects</label>
				<div class="tab">
					<small style="color: #333;">Select all objects to be included in this mold:</small><br />
					<?php echo $object_checklist;?>
				</div>
				<input type="radio" name="newmold" id="nm-tab3">
				<label for="nm-tab3">Boards</label>
				<div class="tab">
					<small style="color: #333;"><strong>OPTIONAL:</strong> Select all boards to be associated with this mold:</small><br />
					<?php if($bfc<=0){echo 'div class="warningbox">No boards available.</div>';}else {echo $board_checklist;}?>
				</div>
			</div></div>
			<button type="submit" name="add" class="btn-save">&#10004; Save</button>
		</form><?php } ?>
	</div>
</div>