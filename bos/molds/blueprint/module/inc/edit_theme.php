<!-- Edit Theme -->
<div style="display:none;" id="edit_<?php echo $row['id']; ?>">
	<div class="padded">
		<h4 class="modal-title edit"><strong>Edit <?php echo $row['title'];?></strong></h4>
		<form method="POST" action="action_update_blueprint.php">
			<input type="hidden" name="pup" value="theme" />
			<input type="hidden" name="id" value="<?php echo $row['id'];?>" />
			<div style="min-width: 80vw;"><div class="tabs">
				
				<input type="radio" name="edittheme" id="tab1-<?php echo $row['id'];?>" checked="checked">
				<label for="tab1-<?php echo $row['id'];?>">General</label>
				<div class="tab"><div class="block-wrap"><div class="block bw100">
					<div class="form-group">
						<span class="label">Title:</span><br /><input type="text" name="title" value="<?php echo $row['title'];?>"/>
					</div>
					</div><div class="block bw50 xs-100 sm-100 md-100">
						<div class="form-group"><span class="label">Theme Type</span><br />
						<select name="themetype">
							<option value="body" <?php echo ($row['type'] == 'body') ? 'selected' : ''; ?>>Body</option>
							<option value="element" <?php echo ($row['type'] == 'element') ? 'selected' : ''; ?>>Element</option>
						</select></div>
					</div><div class="block bw50 xs-100 sm-100 md-100">
						<div class="form-group">
							<span class="label"><input type="checkbox" name="active" value="true" checked="checked" /> active</span>
						</div>
				</div></div></div>
				
				<input type="radio" name="edittheme" id="tab2-<?php echo $row['id'];?>">
				<label for="tab2-<?php echo $row['id'];?>">Colors</label>
				<div class="tab"><div class="block-wrap"><div class="block bw50 xs-100 sm-100 md-100">
						<div class="form-group">
							<span class="label">
							<input type="color" name="pcolor" value="<?php echo $row->colors['primary']; ?>" /> Primary<br />
							<input type="color" name="scolor" value="<?php echo $row->colors['secondary']; ?>" /> Secondary<br />
							<input type="color" name="tcolor" value="<?php echo $row->colors['tertiary']; ?>" /> Tertiary</span>
						</div>
					</div><div class="block bw50 xs-100 sm-100 md-100">
						<div class="form-group">
							<span class="label">
							<input type="color" name="lcolor" value="<?php echo $row->colors['links']; ?>" /> Links<br />
							<input type="color" name="acolor" value="<?php echo $row->colors['accent']; ?>" /> Accent<br />
							<input type="color" name="ocolor" value="<?php echo $row->colors['other']; ?>" /> Other</span>
						</div>
				</div></div></div>
				
				<input type="radio" name="edittheme" id="tab3-<?php echo $row['id'];?>">
				<label for="tab3-<?php echo $row['id'];?>">Fonts</label>
				<div class="tab"><div class="block-wrap"><div class="block bw50 xs-100 sm-100 md-100">
					<div class="form-group">	
						<span class="label">Font Type</span><br />
						<select name="font-type">
							<option value="native" <?php echo ($row->font['type'] == 'native') ? 'selected' : ''; ?>>Native</option>
							<option value="google" <?php echo ($row->font['type'] == 'google') ? 'selected' : ''; ?>>Google Fonts</option>
							<option value="custom" <?php echo ($row->font['type'] == 'custom') ? 'selected' : ''; ?>>Custom</option>
						</select>
					</div>
					</div><div class="block bw50 xs-100 sm-100 md-100">
						<div class="form-group">
							<span class="label">Default Font</span><br />
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
							<small>Family</small><br /><input type="text" name="font-family" value="<?php echo $row->font; ?>" />
						</div>
				</div></div></div>
				
				<input type="radio" name="edittheme" id="tab4-<?php echo $row['id'];?>">
				<label for="tab4-<?php echo $row['id'];?>">Background</label>
				<div class="tab"><div class="block-wrap"><div class="block bw33 xs-100 sm-100 md-100">
						<div class="form-group">	
							<span class="label">Background Size</span><br />
							<select name="bgsize">
								<option value="auto" <?php echo ($row->background['size'] == 'auto') ? 'selected' : ''; ?>>Auto</option>
								<option value="cover" <?php echo ($row->background['size'] == 'cover') ? 'selected' : ''; ?>>Cover</option>
								<option value="contain" <?php echo ($row->background['size'] == 'contain') ? 'selected' : ''; ?>>Contain</option>
							</select>
						</div>
					</div><div class="block bw33 xs-100 sm-100 md-100">
						<div class="form-group">
							<span class="label">Position</span><br />
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
						</div>
					</div><div class="block bw33 xs-100 sm-100 md-100">
						<div class="form-group">	
							<span class="label">Repeat</span><br />
							<select name="repeat">
								<option value="repeat" <?php echo ($row->background['repeat'] == 'repeat') ? 'selected' : ''; ?>>Repeat</option>
								<option value="no-repeat" <?php echo ($row->background['repeat'] == 'no-repeat') ? 'selected' : ''; ?>>No-Repeat</option>
								<option value="repeat-x" <?php echo ($row->background['repeat'] == 'repeat-x') ? 'selected' : ''; ?>>Repeat-X</option>
								<option value="repeat-y" <?php echo ($row->background['repeat'] == 'repeat-y') ? 'selected' : ''; ?>>Repeat-Y</option>
								<option value="space" <?php echo ($row->background['repeat'] == 'space') ? 'selected' : ''; ?>>Space</option>
								<option value="round" <?php echo ($row->background['repeat'] == 'round') ? 'selected' : ''; ?>>Round</option>
							</select>
						</div>
					</div><div class="block bw100">
						<div class="form-group">
							<small>Background File URL:</small><br /><input type="url" name="bgfile" value="<?php echo $row->background; ?>" />
						</div>
				</div></div></div>
				<?php if($row['type']=='element'){?>
				<input type="radio" name="edittheme" id="tab5-<?php echo $row['id'];?>">
				<label for="tab5-<?php echo $row['id'];?>">Elements</label>
				<div class="tab">
					<span class="label">Include Elements:</span> <small>(check all that apply)</small><br />
					<div class="form-group"><ul class="checkbox-group">
					<?php include 'theme-element-list.php';?>
					</ul></div>
				</div>
				<?php } ?>
			</div></div>
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