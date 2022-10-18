<!-- Edit Weekday Record -->
<div style="display:none;" id="edit_<?php echo $row->id; ?>">
	<div class="padded">
		<h4 class="modal-title"><strong>Edit <?php echo $row['dow'];?></strong></h4>
		<form method="POST" action="action_update_weekdays.php">
			<div style="min-width: 80vw;"><div class="block-wrap">
				<div class="block bw67 xs-100 sm-100 md-100">
					<div class="form-group">
						<label>Title:</label><br />
						<input type="text" name="title" value="<?php echo $row->title; ?>" />
					</div>
					<div class="form-group">
						<label>DICK PIC:</label> <small><em>(Image or Video URL)</em></small><br />
						<input type="url" name="dpic" value="<?php echo $row->dpic; ?>" />
					</div>
					<div class="form-group">
						<label>LINK:</label><br />
						<input type="url" name="link" value="<?php echo $row->link; ?>" />
					</div>
					<div class="block-wrap"><div class="block bw50 xs-100 sm-100 md-100">
					<div class="form-group">	
						<label for="target">Link Target</label>
						<select name="target">
							<option value="_blank" <?php echo ($row->target == '_blank') ? 'selected' : ''; ?>>New Window</option>
							<option value="_self" <?php echo ($row->target == '_self') ? 'selected' : ''; ?>>Same Window</option>
							<option value="_parent" <?php echo ($row->target == '_parent') ? 'selected' : ''; ?>>Parent Window</option>
						</select>
					</div></div>
					<div class="block bw50 xs-100 sm-100 md-100">
						<div class="form-group">
							<label>Link Text</label><br />
							<input type="text" name="linktext" value="<?php echo $row->linktext; ?>" />
						</div>
					</div></div>
				</div>
				<div class="block bw33 xs-100 sm-100 md-100">
					<input type="hidden" name="id" value="<?php echo $row->id; ?>" />
					<div class="form-group">
						<span class="label">Active</span><br />
						<input type="radio" name="active" value="true" <?php echo ($row->active == 'true') ? 'checked="checked"' : ''; ?>/> true &nbsp;|&nbsp;
						<input type="radio" name="active" value="false" <?php echo ($row->active == 'false') ? 'checked="checked"' : ''; ?>/> false 
					</div>
					<div class="form-group">
						<span class="label"><strong>COLORS</strong></span><br />
						<input type="color" name="pcolor" value="<?php echo $row->colors['pcolor']; ?>" /> Primary<br />
						<input type="color" name="scolor" value="<?php echo $row->colors['scolor']; ?>" /> Secondary<br />
						<input type="color" name="tcolor" value="<?php echo $row->colors['tcolor']; ?>" /> Tertiary
					</div>
					<div class="form-group">	
						<label for="vtype">Video Type</label>
						<select name="vtype">
							<option value="none" <?php echo ($row->vtype == 'none') ? 'selected' : ''; ?>>None</option>
							<option value="yt" <?php echo ($row->vtype == 'yt') ? 'selected' : ''; ?>>YouTube</option>
							<option value="vimeo" <?php echo ($row->vtype == 'vimeo') ? 'selected' : ''; ?>>Vimeo</option>
							<option value="other" <?php echo ($row->vtype == 'other') ? 'selected' : ''; ?>>Other</option>
						</select>
					</div>
					<div class="form-group">
						<label>Video ID:</label> <small><em>(YouTube or Vimeo)</em></small><br />
						<input type="text" name="vid" value="<?php echo $row->vid; ?>" />
					</div>
				</div>
				<div class="block bw100">
					<div class="form-group">
						<label>Content</label>
						<textarea name="content"><?php echo $row->content; ?></textarea>
					</div>
				</div>

			</div></div>

			<button type="submit" name="edit" class="btn-save">&#10004; Update</button>
		</form>
	</div>
</div>