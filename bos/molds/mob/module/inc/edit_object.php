<!-- Edit Board -->
<div style="display:none;" id="edit_<?php echo $row['id']; ?>">
	<div class="padded">
		<h4 class="modal-title edit"><strong>Edit <?php echo $row['title'];?></strong></h4>
		<form method="POST" action="action_update_mob.php">
			<input type="hidden" name="pup" value="editobj" />
			<input type="hidden" name="id" value="<?php echo $row['id'];?>" />
			<div style="min-width: 80vw;"><div class="tabs">
				<input type="radio" name="newobject" id="tab1-<?php echo $row['id'];?>" checked="checked">
				<label for="tab1-<?php echo $row['id'];?>">General</label>
				<div class="tab">
					<div class="block-wrap">
						<div class="block bw60 xs-100 sm-100 md-100">
							<div class="form-group">
								<span class="label">Title:</span><br />
								<input type="text" name="title" value="<?php echo $row['title'];?>"/><br />
								<span class="label">Description:</span><br />
								<textarea name="desc" rows="2"><?php echo $row->desc;?></textarea>
							</div>
						</div><div class="block bw40 xs-100 sm-100 md-100">
							<div class="form-group">
								<span class="label"><input type="checkbox" name="active" value="true" checked="checked" /> active</span>
							</div><div class="form-group">	
								<span class="label">Content Type</span><br />
								<div id="ct-<?php echo $row['id'];?>">
								<?php echo $content_type_selector;?>
								</div>
								<script>
								var temp = "<?php echo $row['type'];?>";
								var mySelect = document.querySelector('#ct-<?php echo $row['id'];?> select');
								for(var i, j = 0; i = mySelect.options[j]; j++) {
									if(i.value == temp) {
										mySelect.selectedIndex = j;
										break;
									}
								}
								</script>
							</div>
						</div>
					</div>
				</div>
				<input type="radio" name="newobject" id="tab2-<?php echo $row['id'];?>">
				<label for="tab2-<?php echo $row['id'];?>">Properties</label>
				<div class="tab">
					<small style="color: #333;">Select all properties to be included in this object:</small><br />
					<div class="form-group"><ul class="checkbox-group">
					<?php 
					foreach($properties->property as $this_pcrow){ if($this_pcrow['active']=='true'){if($this_pcrow['id']!='mop-0'){
						if(in_array($this_pcrow['id'],$newmoparray)){
							echo '<li><input type="checkbox" name="mops[]" value="'.$this_pcrow['id'].'" checked />'.$this_pcrow['title'].'</li>';
						} else {
						echo '<li><input type="checkbox" name="mops[]" value="'.$this_pcrow['id'].'" />'.$this_pcrow['title'].'</li>';
					}}}}
					?>
					</ul></div>
				</div>
				
			</div></div>
			<button type="submit" name="editobject" class="btn-save">&#10004; Update</button>
		</form>
	</div>
</div>

<!-- Delete -->
<div id="delete_<?php echo $row['id']; ?>" style="display:none;">
	<div class="padded warning center" style="min-width: 20vw;">
		<h4>&#9888; Delete Object</h4>
		<p>You are about to delete<br /><span class="larger heavy"><?php echo $row['title']; ?></span><br /><br /></p>
		<a href="action_delete_object.php?id=<?php echo $row['id']; ?>" class="del-btn"><i class="bi bi-delete"></i> Delete</a>
	</div>
</div>