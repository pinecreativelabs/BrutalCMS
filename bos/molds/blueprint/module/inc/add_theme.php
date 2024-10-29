<!-- Add New Theme -->
<div style="display:none;" id="addnew">
	<div class="padded">
		<h4 class="modal-title addnew"><strong>New Theme</strong></h4>
		<form method="POST" action="action_new_blueprint.php">
			<input type="hidden" name="pup" value="theme" />
			<?php 
			$last_obj = $file->xpath('//theme[last()]');
			$last_tid1 = str_replace('bpt-','',$last_obj[0]['id']);
			$last_tid = (int) $last_tid1;
			$new_tid = 'bpt-'.($last_tid + 1); 
			?>
			<input type="hidden" name="id" value="<?php echo $new_tid;?>" />
			<div style="min-width: 80vw;"><div class="tabs">
				
				<input type="radio" name="addtheme" id="tab1" checked="checked">
				<label for="tab1">General</label>
				<div class="tab"><div class="block-wrap"><div class="block bw100">
					<div class="form-group">
						<span class="label">Title:</span><br /><input type="text" name="title" />
					</div>
					</div><div class="block bw50 xs-100 sm-100 md-100">
						<div class="form-group"><span class="label">Theme Type</span><br />
						<select name="themetype">
							<option value="body" selected>Body</option>
							<option value="element">Element</option>
						</select></div>
					</div><div class="block bw50 xs-100 sm-100 md-100">
						<div class="form-group">
							<span class="label"><input type="checkbox" name="active" value="true" checked="checked" /> active</span>
						</div>
				</div></div></div>
				
				<input type="radio" name="addtheme" id="tab2">
				<label for="tab2">Colors</label>
				<div class="tab"><div class="block-wrap"><div class="block bw50 xs-100 sm-100 md-100">
						<div class="form-group">
							<span class="label">
							<input type="color" name="pcolor" value="" /> Primary<br />
							<input type="color" name="scolor" value="" /> Secondary<br />
							<input type="color" name="tcolor" value="" /> Tertiary</span>
						</div>
					</div><div class="block bw50 xs-100 sm-100 md-100">
						<div class="form-group">
							<span class="label">
							<input type="color" name="lcolor" value="" /> Links<br />
							<input type="color" name="acolor" value="" /> Accent<br />
							<input type="color" name="ocolor" value="" /> Other</span>
						</div>
				</div></div></div>
				
				<input type="radio" name="addtheme" id="tab3">
				<label for="tab3">Fonts</label>
				<div class="tab"><div class="block-wrap"><div class="block bw50 xs-100 sm-100 md-100">
					<div class="form-group">	
						<span class="label">Font Type</span><br />
						<select name="font-type">
							<option value="native" selected>Native</option>
							<option value="google">Google Fonts</option>
							<option value="custom">Custom</option>
						</select>
					</div>
					</div><div class="block bw50 xs-100 sm-100 md-100">
						<div class="form-group">
							<span class="label">Default Font</span><br />
							<div class="brick-wrap">
								<div class="brick bw50"><small>size</small><br /><input type="number" name="font-size" min="0" step=".01" /></div>
								<div class="brick bw50">
									<small>unit</small><br />
									<select name="font-unit">
										<option value="px" selected>px</option>
										<option value="em">em</option>
										<option value="rem">rem</option>
										<option value="%">percent (%)</option>
									</select>
								</div>
							</div>
							<small>Family</small><br /><input type="text" name="font-family" />
						</div>
				</div></div></div>
				
				<input type="radio" name="addtheme" id="tab4">
				<label for="tab4">Background</label>
				<div class="tab"><div class="block-wrap"><div class="block bw33 xs-100 sm-100 md-100">
						<div class="form-group">	
							<span class="label">Background Size</span><br />
							<select name="bgsize">
								<option value="auto">Auto</option>
								<option value="cover" selected>Cover</option>
								<option value="contain">Contain</option>
							</select>
						</div>
					</div><div class="block bw33 xs-100 sm-100 md-100">
						<div class="form-group">
							<span class="label">Position</span><br />
							<select name="bgpos">
								<option value="left top" selected>Left Top</option>
								<option value="left center">Left Center</option>
								<option value="left bottom">Left Bottom</option>
								<option value="right top">Right Top</option>
								<option value="right center">Right Center</option>
								<option value="right bottom">Right Bottom</option>
								<option value="center top">Center Top</option>
								<option value="center center">Center Center</option>
								<option value="center bottom">Center Bottom</option>
							</select>
						</div>
					</div><div class="block bw33 xs-100 sm-100 md-100">
						<div class="form-group">	
							<span class="label">Repeat</span><br />
							<select name="repeat">
								<option value="repeat" selected>Repeat</option>
								<option value="no-repeat">No-Repeat</option>
								<option value="repeat-x">Repeat-X</option>
								<option value="repeat-y">Repeat-Y</option>
								<option value="space">Space</option>
								<option value="round">Round</option>
							</select>
						</div>
					</div><div class="block bw100">
						<div class="form-group">
							<small>Background File URL:</small><br /><input type="url" name="bgfile" />
						</div>
				</div></div></div>
			</div></div>
			<button type="submit" name="add" class="btn-save">&#10004; Save</button>
		</form>
	</div>
</div>