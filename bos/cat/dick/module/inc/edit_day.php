<!-- Edit Day Record -->
<div style="display:none;" id="edit_<?php echo $row['id']; ?>">
	<div class="padded">
		<h4 class="modal-title edit"><strong>Edit <?php echo $row['ddate'];?></strong></h4>
		<form method="POST" action="action_update_days.php">
			<input type="hidden" name="id" value="<?php echo $row['id'];?>" />
			<div style="min-width: 80vw;"><div class="block-wrap">
				<div class="block bw67 xs-100 sm-100 md-100">
					<div class="block-wrap"><div class="block bw40 xs-100 sm-100 md-100">
						<div class="form-group">
							<label>Date:</label><br />
							<input type="date" name="date" value="<?php echo date('Y-m-d',strtotime($row['ddate'])); ?>" />
						</div>
					</div><div class="block bw60 xs-100 sm-100 md-100">
						<div class="form-group">
							<label>Title:</label><br />
							<input type="text" name="title" value="<?php echo $row['title']; ?>" />
						</div>
					</div></div>
					<div class="form-group">
						<label>DICK PIC:</label> <small><em>(Image or Video URL)</em></small><br />
						<input type="url" name="dpic" value="<?php echo $row->dpic; ?>" />
					</div>
					<div class="form-group">
						<label>LINK:</label><br />
						<input type="url" name="link" value="<?php echo $row->url; ?>" />
					</div>
					<div class="block-wrap"><div class="block bw50 xs-100 sm-100 md-100">
					<div class="form-group">	
						<label for="target">Link Target</label>
						<select name="target">
							<option value="_blank" <?php echo ($row->url['target'] == '_blank') ? 'selected' : ''; ?>>New Window</option>
							<option value="_self" <?php echo ($row->url['target'] == '_self') ? 'selected' : ''; ?>>Same Window</option>
							<option value="_parent" <?php echo ($row->url['target'] == '_parent') ? 'selected' : ''; ?>>Parent Window</option>
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
						<label>Video ID:</label>  <small><em>(YouTube or Vimeo)</em></small><br />
						<input type="text" name="vid" value="<?php echo $row->vid; ?>" />
					</div>
				</div>
				<div class="block bw100">
					<div class="form-group">
						<label>Content</label><br />
						<textarea name="content"><?php echo $row->content; ?></textarea>
					</div>
				</div>

			</div></div>

			<button type="submit" name="edit" class="btn-save">&#10004; Update</button>
		</form>
	</div>
</div>

<!-- Delete -->
<div id="delete_<?php echo $row['id']; ?>" style="display:none;">
	<div class="padded warning center" style="min-width: 20vw;">
		<h4>&#9888; Delete Record</h4>
		<p>You are about to delete:<br />
		<span class="larger heavy"><?php echo $row['ddate'].', ID '.$row['id']; ?></span><br /><br /></p>
		<a href="action_delete_day.php?id=<?php echo $row['id']; ?>" class="del-btn"><i class="bi bi-delete"></i> Delete</a>
	</div>
</div>