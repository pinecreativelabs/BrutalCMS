<!-- Add New Object -->
<div style="display:none;" id="addobject">
	<div class="padded">
		<h4 class="modal-title addnew"><strong>New Object</strong></h4>
		<?php if($pfc<=0){echo '<div class="warningbox">No properties available. Create a property before creating a new object.</div>';}else{?>
		<form method="POST" action="action_new_mob.php">
			<input type="hidden" name="pup" value="addobject" />
			<?php 
			$last_obj = $file->xpath('//object[last()]');
			$last_oid1 = str_replace('mo-','',$last_obj[0]['id']);
			$last_oid = (int) $last_oid1;
			$new_oid = 'mo-'.($last_oid + 1); 
			?>
			<input type="hidden" name="id" value="<?php echo $new_oid;?>" />
			<div style="min-width: 80vw;"><div class="tabs">
				<input type="radio" name="newobject" id="no-tab1" checked="checked">
				<label for="no-tab1">General</label>
				<div class="tab">
					<div class="block-wrap">
						<div class="block bw60 xs-100 sm-100 md-100">
							<div class="form-group">
								<span class="label">Title:</span><br />
								<input type="text" name="title" /><br />
								<span class="label">Description:</span><br />
								<textarea name="desc" rows="2"></textarea>
							</div>
						</div><div class="block bw40 xs-100 sm-100 md-100">
							<div class="form-group">
								<span class="label"><input type="checkbox" name="active" value="true" checked="checked" /> active</span>
							</div><div class="form-group">	
								<span class="label">Content Type</span>
								<?php echo $content_type_selector;?>
							</div>
						</div>
					</div>
				</div>
				<input type="radio" name="newobject" id="no-tab2">
				<label for="no-tab2">Properties</label>
				<div class="tab">
					<small style="color: #333;">Select all properties to be included in this object:</small><br />
					<?php echo $property_checklist;?>
				</div>
				
			</div></div>
			<button type="submit" name="addobject" class="btn-save">&#10004; Save</button>
		</form><?php } ?>
	</div>
</div>