<!-- Add New Theme -->
<div style="display:none;" id="addnew">
	<div class="padded">
		<h4 class="modal-title addnew"><strong>New Theme</strong></h4>
		<form method="POST" action="action_new_theme.php">
			<input type="hidden" name="id" value="<?php echo ($file->theme->count()+1).date('dhis'); ?>" />
			<div style="min-width: 80vw;">
				<div class="block-wrap">
					<div class="block bw67 xs-100 sm-100 md-100">
						<div class="form-group">
							<label>Title:</label><br />
							<input type="text" name="title" />
						</div>
					</div>
					<div class="block bw33 xs-100 sm-100 md-100">
						<div class="form-group">
							<span class="label">Active</span><br />
							<input type="radio" name="active" value="true" /> true &nbsp;|&nbsp;
							<input type="radio" name="active" value="false" /> false 
						</div>
					</div>
				</div>
				<div class="block-wrap">
					<div class="block bw33 xs-100 sm-100 md-100">
						<div class="form-group">	
							<label for="font-type">Font Type</label>
							<select name="font-type">
								<option value="native">Native</option>
								<option value="google">Google Fonts</option>
								<option value="custom">Custom</option>
							</select>
						</div>
						<div class="form-group">
							<label>Default Font</label><br />
							<div class="brick-wrap">
								<div class="brick bw50"><small>size</small><br /><input type="number" name="font-size" min="0" step=".01" /></div>
								<div class="brick bw50">
									<small>unit</small><br />
									<select name="font-unit">
										<option value="px">px</option>
										<option value="em">em</option>
										<option value="rem">rem</option>
										<option value="%">percent (%)</option>
									</select>
								</div>
							</div>
							<small>Family</small><br />
							<input type="text" name="font-family" />
						</div>
					</div>
					<div class="block bw33 xs-100 sm-100 md-100">
						<div class="form-group">	
							<label>Background</label><br />
							<small>Size</small><br />
							<select name="bgsize">
								<option value="auto">Auto</option>
								<option value="cover">Cover</option>
								<option value="contain">Contain</option>
							</select>
	
							<small>Position</small><br />
							<select name="bgpos">
								<option value="left top">Left Top</option>
								<option value="left center">Left Center</option>
								<option value="left bottom">Left Bottom</option>
								<option value="right top">Right Top</option>
								<option value="right center">Right Center</option>
								<option value="right bottom">Right Bottom</option>
								<option value="center top">Center Top</option>
								<option value="center center">Center Center</option>
								<option value="center bottom">Center Bottom</option>
							</select>
	
							<small>Repeat</small><br />
							<select name="repeat">
								<option value="repeat">Repeat</option>
								<option value="no-repeat">No-Repeat</option>
								<option value="repeat-x">Repeat-X</option>
								<option value="repeat-y">Repeat-Y</option>
								<option value="space">Space</option>
								<option value="round">Round</option>
							</select>
						</div>
						<div class="form-group">
							<small>Background File URL:</small><br />
							<input type="url" name="bgfile" />
						</div>
					</div>
					<div class="block bw33 xs-100 sm-100 md-100">
						<div class="form-group">
							<label>Colors</label><br />
							<input type="color" name="pcolor" value="#ffffff" /> Primary<br />
							<input type="color" name="scolor" value="#000000" /> Secondary<br />
							<input type="color" name="tcolor" value="#ff0000" /> Tertiary<br />
							<input type="color" name="lcolor" value="#0000ff" /> Links<br />
							<input type="color" name="acolor" value="#808080" /> Accent<br />
							<input type="color" name="ocolor" value="#ffff00" /> Other
						</div>
					</div>
				</div>
			</div>
			<button type="submit" name="add" class="btn-save">&#10004; Save</button>
		</form>
	</div>
</div>