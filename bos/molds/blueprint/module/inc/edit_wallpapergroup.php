<!-- Edit Wallpaper Group -->
<div style="display:none;" id="edit_<?php echo $grow['id']; ?>">
	<div class="padded">
		<h4 class="modal-title edit"><strong>Edit <?php echo $grow['title'];?></strong></h4>
		<form method="POST" action="action_update_blueprint.php">
			<input type="hidden" name="pup" value="wpgroup" />
			<input type="hidden" name="id" value="<?php echo $grow['id'];?>" />
			<div style="min-width: 80vw;">
				<div class="block-wrap">
					<div class="block bw50 xs-100 sm-100 md-100">
						<div class="form-group">
							<span class="label">Title:</span><br /><input type="text" name="title" value="<?php echo $grow['title'];?>"/>
						</div>
						<?php if($grow['type']=='slideshow'){?>
						<div class="form-group">
							<div class="range-slider">
								<span class="label">Slide Duration:</span> <small>(in seconds)</small><br />
								<input type="range" name="dur" min="1" max="10" value="<?php echo $grow['dur'];?>" class="range-input" step="1" />
								<div class="sliderticks">
									<span>1</span><span>2</span><span>3</span><span>4</span><span>5</span>
									<span>6</span><span>7</span><span>8</span><span>9</span><span>10</span>
								</div>
							</div><p>&nbsp;</p>
							<span class="label">Slideshow Effect</span><br />
							<select name="fx">
								<option value="xfade" <?php echo ($grow['fx'] == 'xfade') ? 'selected' : ''; ?>>crossfade</option>
								<option value="kenburns" <?php echo ($grow['fx'] == 'kenburns') ? 'selected' : ''; ?>>kenburns</option>
							</select>
						</div>
						<?php } ?>
					</div><div class="block bw50 xs-100 sm-100 md-100">
						<div class="form-group"><span class="label">Group Type</span><br />
						<select name="grouptype">
							<option value="class" <?php echo ($grow['type'] == 'class') ? 'selected' : ''; ?>>class</option>
							<option value="slideshow" <?php echo ($grow['type'] == 'slideshow') ? 'selected' : ''; ?>>slideshow</option>
						</select></div>
						<div class="form-group">
							<span class="label"><input type="checkbox" name="active" value="true" <?php if($grow['active'] == 'true'){ echo 'checked="checked"';} ?> /> active</span>
						</div>
					</div>
				</div>
			</div>
			<button type="submit" name="edit" class="btn-save">&#10004; Update</button>
		</form>
	</div>
</div>

<!-- Delete -->
<div id="delete_<?php echo $grow['id']; ?>" style="display:none;">
	<div class="padded warning center" style="min-width: 20vw;">
		<h4>&#9888; Delete Record</h4>
		<p>You are about to delete<br /><span class="larger heavy"><?php echo $grow['title']; ?></span><br /><br /></p>
		<a href="action_delete_wpgroup.php?id=<?php echo $grow['id']; ?>" class="del-btn"><i class="bi bi-delete"></i> Delete</a>
	</div>
</div>