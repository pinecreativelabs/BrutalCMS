<!-- Edit Wallpaper -->
<div style="display:none;" id="edit_<?php echo $row['id']; ?>">
	<div class="padded">
		<h4 class="modal-title edit"><strong>Edit <?php echo $row['title'];?></strong></h4>
		<form method="POST" action="action_update_blueprint.php">
			<input type="hidden" name="pup" value="wallpaper" />
			<input type="hidden" name="id" value="<?php echo $row['id'];?>" />
			<div style="min-width: 80vw;">
				<div class="block-wrap">
					<div class="block bw60 xs-100 sm-100 md-100">
						<span class="label">Title:</span><br /><input type="text" name="title" value="<?php echo $row['title'];?>" /><br />
						<span class="label"><input type="checkbox" name="active" value="true" <?php if($row['active'] == 'true'){ echo 'checked="checked"';} ?> /> active</span>
					</div><div class="block bw40 xs-100 sm-100 md-100">
						<div class="form-group">
							<span class="label">Group</span><br />
							<div id="wpg-<?php echo $row['id'];?>"><select name="group">
								<option value="none">none</option>
								<?php echo $group_optlist;?>
							</select></div>
							<script>
								var temp = "<?php echo $row['group'];?>";
								var mySelect = document.querySelector('#wpg-<?php echo $row['id'];?> select');
								for(var i, j = 0; i = mySelect.options[j]; j++) {
									if(i.value == temp) {
										mySelect.selectedIndex = j;
										break;
									}
								}
							</script>
						</div>
					</div><div class="block bw100">
						<div class="form-group">
							<span class="label">Image URL:</span><br /><input type="url" name="wp-url" value="<?php echo $row->url;?>" />
						</div>
					</div><div class="block bw100">
					<div class="form-group"><div class="block-wrap">
						<div class="block bw50 xs-100 sm-100 md-100">
							<span class="label">Background Size</span><br />
							<select name="size">
								<option value="cover" <?php echo ($row->options['size'] == 'cover') ? 'selected' : ''; ?>>cover</option>
								<option value="contain" <?php echo ($row->options['size'] == 'contain') ? 'selected' : ''; ?>>contain</option>
								<option value="auto" <?php echo ($row->options['sizee'] == 'auto') ? 'selected' : ''; ?>>auto</option>
							</select><br />
							<span class="label">Background Position</span><br />
							<select name="position">
								<option value="left top" <?php echo ($row->options['position'] == 'left top') ? 'selected' : ''; ?>>left top</option>
								<option value="left center" <?php echo ($row->options['position'] == 'left center') ? 'selected' : ''; ?>>left center</option>
								<option value="left bottom" <?php echo ($row->options['position'] == 'left bottom') ? 'selected' : ''; ?>>left bottom</option>
								<option value="right top" <?php echo ($row->options['position'] == 'right top') ? 'selected' : ''; ?>>right top</option>
								<option value="right center" <?php echo ($row->options['position'] == 'right center') ? 'selected' : ''; ?>>right center</option>
								<option value="right bottom" <?php echo ($row->options['position'] == 'right bottom') ? 'selected' : ''; ?>>right bottom</option>
								<option value="center top" <?php echo ($row->options['position'] == 'center top') ? 'selected' : ''; ?>>center top</option>
								<option value="center center" <?php echo ($row->options['position'] == 'center center') ? 'selected' : ''; ?>>center center</option>
								<option value="center bottom" <?php echo ($row->options['position'] == 'center bottom') ? 'selected' : ''; ?>>center bottom</option>
							</select>
						</div><div class="block bw50 xs-100 sm-100 md-100">
							<span class="label">Background Repeat</span><br />
							<select name="repeat">
								<option value="no-repeat"  <?php echo ($row->options['no-repeat'] == 'left top') ? 'selected' : ''; ?>>no-repeat</option>
								<option value="repeat" <?php echo ($row->options['repeat'] == 'repeat') ? 'selected' : ''; ?>>repeat</option>
								<option value="repeat-x" <?php echo ($row->options['repeat'] == 'repeat-x') ? 'selected' : ''; ?>>repeat-x</option>
								<option value="repeat-y" <?php echo ($row->options['repeat'] == 'repeat-y') ? 'selected' : ''; ?>>repeat-y</option>
								<option value="space" <?php echo ($row->options['repeat'] == 'space') ? 'selected' : ''; ?>>space</option>
								<option value="round" <?php echo ($row->options['repeat'] == 'round') ? 'selected' : ''; ?>>round</option>
							</select><br />
							<span class="label"><input type="checkbox" name="attach" value="1" <?php if($row->options['attach'] == '1'){ echo 'checked="checked"';} ?> /> fix background</span>
						</div>
					</div></div>
				</div></div>
			</div>
			<button type="submit" name="edit" class="btn-save">&#10004; Update</button>
		</form>
	</div>
</div>

<!-- Delete -->
<div id="delete_<?php echo $row['id']; ?>" style="display:none;">
	<div class="padded warning center" style="min-width: 20vw;">
		<h4>&#9888; Delete Record</h4>
		<p>You are about to delete<br /><span class="larger heavy"><?php echo $row['title']; ?></span><br /><br /></p>
		<a href="action_delete_wallpaper.php?id=<?php echo $row['id']; ?>" class="del-btn"><i class="bi bi-delete"></i> Delete</a>
	</div>
</div>