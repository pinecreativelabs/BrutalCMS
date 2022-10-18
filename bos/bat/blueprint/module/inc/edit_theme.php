<!-- Edit Theme -->
<div style="display:none;" id="edit_<?php echo $row['id']; ?>">
	<div class="padded">
		<h4 class="modal-title edit"><strong>Edit <?php echo $row['title'];?></strong></h4>
		<form method="POST" action="action_update_theme.php">
			<input type="hidden" name="id" value="<?php echo $row['id'];?>" />
			<input type="hidden" name="title" value="<?php echo $row['title']; ?>" />
			<div style="min-width: 80vw;">
				<div class="block-wrap">
					<div class="block bw33 xs-100 sm-100 md-100">
						<div class="form-group">	
							<label for="font-type">Font Type</label>
							<select name="font-type">
								<option value="native" <?php echo ($row->font['type'] == 'native') ? 'selected' : ''; ?>>Native</option>
								<option value="google" <?php echo ($row->font['type'] == 'google') ? 'selected' : ''; ?>>Google Fonts</option>
								<option value="custom" <?php echo ($row->font['type'] == 'custom') ? 'selected' : ''; ?>>Custom</option>
							</select>
						</div>
						<div class="form-group">
							<label>Default Font</label><br />
							<div class="brick-wrap">
								<div class="brick bw50"><small>size</small><br /><input type="number" name="font-size" value="<?php echo $row->font['size']; ?>" min="0" step=".01" /></div>
								<div class="brick bw50">
									<small>unit</small><br />
									<select name="font-unit">
										<option value="px" <?php echo ($row->font['unit'] == 'px') ? 'selected' : ''; ?>>px</option>
										<option value="em" <?php echo ($row->font['unit'] == 'em') ? 'selected' : ''; ?>>em</option>
										<option value="rem" <?php echo ($row->font['unit'] == 'rem') ? 'selected' : ''; ?>>rem</option>
										<option value="%" <?php echo ($row->font['unit'] == '%') ? 'selected' : ''; ?>>percent (%)</option>
									</select>
								</div>
							</div>
							<small>Family</small><br />
							<input type="text" name="font-family" value="<?php echo $row->font; ?>" />
						</div>
					</div>
					<div class="block bw33 xs-100 sm-100 md-100">
						<div class="form-group">	
							<label>Background</label><br />
							<small>Size</small><br />
							<select name="bgsize">
								<option value="auto" <?php echo ($row->background['size'] == 'auto') ? 'selected' : ''; ?>>Auto</option>
								<option value="cover" <?php echo ($row->background['size'] == 'cover') ? 'selected' : ''; ?>>Cover</option>
								<option value="contain" <?php echo ($row->background['size'] == 'contain') ? 'selected' : ''; ?>>Contain</option>
							</select>
	
							<small>Position</small><br />
							<select name="bgpos">
								<option value="left top" <?php echo ($row->background['position'] == 'left top') ? 'selected' : ''; ?>>Left Top</option>
								<option value="left center" <?php echo ($row->background['position'] == 'left center') ? 'selected' : ''; ?>>Left Center</option>
								<option value="left bottom" <?php echo ($row->background['position'] == 'left bottom') ? 'selected' : ''; ?>>Left Bottom</option>
								<option value="right top" <?php echo ($row->background['position'] == 'right top') ? 'selected' : ''; ?>>Right Top</option>
								<option value="right center" <?php echo ($row->background['position'] == 'right center') ? 'selected' : ''; ?>>Right Center</option>
								<option value="right bottom" <?php echo ($row->background['position'] == 'right bottom') ? 'selected' : ''; ?>>Right Bottom</option>
								<option value="center top" <?php echo ($row->background['position'] == 'center top') ? 'selected' : ''; ?>>Center Top</option>
								<option value="center center" <?php echo ($row->background['position'] == 'center center') ? 'selected' : ''; ?>>Center Center</option>
								<option value="center bottom" <?php echo ($row->background['position'] == 'center bottom') ? 'selected' : ''; ?>>Center Bottom</option>
							</select>
	
							<small>Repeat</small><br />
							<select name="repeat">
								<option value="repeat" <?php echo ($row->background['repeat'] == 'repeat') ? 'selected' : ''; ?>>Repeat</option>
								<option value="no-repeat" <?php echo ($row->background['repeat'] == 'no-repeat') ? 'selected' : ''; ?>>No-Repeat</option>
								<option value="repeat-x" <?php echo ($row->background['repeat'] == 'repeat-x') ? 'selected' : ''; ?>>Repeat-X</option>
								<option value="repeat-y" <?php echo ($row->background['repeat'] == 'repeat-y') ? 'selected' : ''; ?>>Repeat-Y</option>
								<option value="space" <?php echo ($row->background['repeat'] == 'space') ? 'selected' : ''; ?>>Space</option>
								<option value="round" <?php echo ($row->background['repeat'] == 'round') ? 'selected' : ''; ?>>Round</option>
							</select>
						</div>
						<div class="form-group">
							<small>Background File URL:</small><br />
							<input type="url" name="bgfile" value="<?php echo $row->background; ?>" />
						</div>
					</div>
					<div class="block bw33 xs-100 sm-100 md-100">
						<div class="form-group">
							<label>Colors</label><br />
							<input type="color" name="pcolor" value="<?php echo $row->colors['primary']; ?>" /> Primary<br />
							<input type="color" name="scolor" value="<?php echo $row->colors['secondary']; ?>" /> Secondary<br />
							<input type="color" name="tcolor" value="<?php echo $row->colors['tertiary']; ?>" /> Tertiary<br />
							<input type="color" name="lcolor" value="<?php echo $row->colors['links']; ?>" /> Links<br />
							<input type="color" name="acolor" value="<?php echo $row->colors['accent']; ?>" /> Accent<br />
							<input type="color" name="ocolor" value="<?php echo $row->colors['other']; ?>" /> Other
						</div>
						<div class="form-group">
							<span class="label">Active</span><br />
							<input type="radio" name="active" value="true" <?php echo ($row['active'] == 'true') ? 'checked="checked"' : ''; ?>/> true &nbsp;|&nbsp;
							<input type="radio" name="active" value="false" <?php echo ($row['active'] == 'false') ? 'checked="checked"' : ''; ?>/> false 
						</div>
					</div>
				</div>
			</div>

			<button type="submit" name="edit" class="btn-save">&#10004; Update</button>
		</form>
	</div>
</div>

<!-- Delete -->
<div id="delete_<?php echo $row['id']; ?>" style="display:none;">
	<div class="padded warning center" style="min-width: 20vw;">
		<h4>&#9888; Delete Record</h4>
		<p>You are about to delete<br />
		<span class="larger heavy"><?php echo $row['title']; ?></span><br /><br /></p>
		<a href="action_delete_theme.php?id=<?php echo $row['id']; ?>" class="del-btn"><i class="bi bi-delete"></i> Delete</a>
	</div>
</div>