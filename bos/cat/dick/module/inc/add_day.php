<!-- Add new day Record -->
<div style="display:none;" id="addnew">
	<div class="padded">
		<h4 class="modal-title addnew"><strong>New Day</strong></h4>
		<form method="POST" action="action_new_day.php">
			<input type="hidden" name="id" value="<?php echo $new_dayid; ?>" />
			<div style="min-width: 80vw;"><div class="block-wrap">
				<div class="block bw67 xs-100 sm-100 md-100">
					<div class="block-wrap"><div class="block bw40 xs-100 sm-100 md-100">
						<div class="form-group">
							<label>Date:</label><br />
							<input type="date" name="ddate" />
						</div>
					</div><div class="block bw60 xs-100 sm-100 md-100">
						<div class="form-group">
							<label>Title:</label><br />
							<input type="text" name="title" />
						</div>
					</div></div>
					<div class="form-group">
						<label>DICK PIC:</label> <small><em>(Image or Video URL)</em></small><br />
						<input type="url" name="dpic" />
					</div>
					<div class="form-group">
						<label>LINK:</label><br />
						<input type="url" name="link" />
					</div>
					<div class="block-wrap"><div class="block bw50 xs-100 sm-100 md-100">
					<div class="form-group">	
						<label for="target">Link Target</label>
						<select name="target">
							<option value="_blank">New Window</option>
							<option value="_self">Same Window</option>
							<option value="_parent">Parent Window</option>
						</select>
					</div></div>
					<div class="block bw50 xs-100 sm-100 md-100">
						<div class="form-group">
							<label>Link Text</label><br />
							<input type="text" name="linktext" />
						</div>
					</div></div>
				</div>
				<div class="block bw33 xs-100 sm-100 md-100">
					<div class="form-group">
						<span class="label">Active</span><br />
						<input type="radio" name="active" value="true" /> true &nbsp;|&nbsp;
						<input type="radio" name="active" value="false" /> false 
					</div>
					<div class="form-group">
						<span class="label"><strong>COLORS</strong></span><br />
						<input type="color" name="pcolor" /> Primary<br />
						<input type="color" name="scolor" /> Secondary<br />
						<input type="color" name="tcolor" /> Tertiary
					</div>
					<div class="form-group">	
						<label for="vtype">Video Type</label>
						<select name="vtype">
							<option value="none">None</option>
							<option value="yt">YouTube</option>
							<option value="vimeo">Vimeo</option>
							<option value="other">Other</option>
						</select>
					</div>
					<div class="form-group">
						<label>Video ID:</label> <small><em>(YouTube or Vimeo)</em></small><br />
						<input type="text" name="vid" />
					</div>
				</div>
				<div class="block bw100">
					<div class="form-group">
						<label>Content</label>
						<textarea name="content"></textarea>
					</div>
				</div>

			</div></div>

			<button type="submit" name="add" class="btn-save">&#10004; Save</button>
		</form>
	</div>
</div>