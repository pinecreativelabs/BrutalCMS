<!-- Add new day Record -->
<div style="display:none;" id="addnew">
	<div class="padded">
		<h4 class="modal-title addnew"><strong>New Day</strong></h4>
		<form method="POST" action="action_new_day.php">
			<input type="hidden" name="id" value="<?php echo ($file->day->count()+1).date('dhis');?>" />
			<input type="hidden" name="cdpath" value="<?php echo $droot_bos.'/molds/dick/module/data/content/';?>" />
			<input type="hidden" name="cdurl" value="<?php echo $bdir.'bos/molds/dick/module/data/content/';?>" />
			<div style="min-width: 80vw;">
				<div class="tabs">
					<input type="radio" name="newday" id="tab1" checked="checked">
					<label for="tab1">General</label>
					<div class="tab">
						<div class="block-wrap"><div class="block bw67 xs-100 sm-100 md-100">
								<div class="form-group">
									<span class="label">Title:</span><br /><input type="text" name="title" />
								</div>
							</div><div class="block bw33 xs-100 sm-100 md-100">
								<div class="form-group"><span class="label">Date:</span><br /><input type="date" name="ddate" /></div>
						</div></div>
						<details><summary>Options</summary><div class="details">
							<div class="block-wrap"><div class="block bw50 xs-100 sm-100 md-100">
								<div class="form-group">
									<span class="label"><input type="checkbox" name="active" value="true" checked="checked" /> active</span>
								</div>
							</div><div class="block bw50 xs-100 sm-100 md-100">
								<div class="form-group">	
									<span class="label">Title Display</span><br />
									<select name="title_display">
										<option value="td">Title + Date</option>
										<option value="to">Title Only</option>
										<option value="do">Date Only</option>
									</select>
								</div>
							</div></div>
							<div class="block-wrap">
								<div class="block bw100">
									<div class="form-group">
										<span class="label">Link URL:</span> <small><em>(optional)</em></small><br /><input type="url" name="link" />
									</div>
								</div><div class="block bw50 xs-100 sm-100 md-100">
									<div class="form-group">	
										<span class="label">Link Target</span><br />
										<select name="target">
											<option value="_blank">New Window</option>
											<option value="_self">Same Window</option>
											<option value="_parent">Parent Window</option>
										</select>
									</div>
								</div><div class="block bw50 xs-100 sm-100 md-100">
									<div class="form-group">
										<span class="label">Link Text</span><br /><input type="text" name="linktext" />
									</div>
								</div>
							</div>
						</details>
					</div>
					<!-- Design Tab -->
					<input type="radio" name="newday" id="tab2">
					<label for="tab2">Design</label>
					<div class="tab">
						<div class="block-wrap"><div class="block bw100">
							<div class="form-group">
								<span class="label">Cover Image URL:</span> <small><em>(optional)</em></small><br /><input type="url" name="cover" />
							</div>
						</div><div class="block bw50 xs-100 sm-100 md-100">
							<div class="form-group">	
								<span class="label">Template</span><br />
								<select name="template">
									<option value="default">Default</option>
									<option value="raw">Raw Data</option>
								</select>
							</div><div class="form-group">
								<span class="label">Skin</span><br />
								<select name="skin">
									<option value="flat">Flat</option>
									<option value="gradient">Linear Gradient</option>
									<option value="radial">Radial Gradient</option>
									<option value="mesh">Mesh Gradient</option>
									<option value="nude">Nude</option>
								</select>
							</div>
						</div><div class="block bw50 xs-100 sm-100 md-100">
							<div class="form-group">
								<span class="label"><strong>Color Scheme</strong></span><br />
								<input type="color" name="pcolor" value="<?php echo $fb_pcolor;?>"/> Primary <small>(background)</small><br />
								<input type="color" name="scolor" value="<?php echo $fb_scolor;?>"/> Secondary <small>(title, headings, borders)</small><br />
								<input type="color" name="tcolor" value="<?php echo $fb_tcolor;?>"/> Tertiary <small>(general text, outlines)</small><br />
								<input type="color" name="acolor" value="<?php echo $fb_acolor;?>"/> Accent <small>(links, drop shadows)</small><br />
								<input type="color" name="ocolor" value="<?php echo $fb_ocolor;?>"/> Other <small>(link hover, misc.)</small>
							</div>
						</div></div>
					</div>
					<!-- Media Tab -->
					<input type="radio" name="newday" id="tab3">
					<label for="tab3">Media</label>
					<div class="tab mediatype">
						<div class="block-wrap"><div class="block bw100">
							<div class="block-wrap">
								<div class="block bw33 xs-100 sm-100 md-100">
									<div class="form-group">	
										<span class="label">Media Type</span><br />
										<input type="radio" name="mtype" value="image"> Image<br />
										<input type="radio" name="mtype" value="video"> Video<br />
										<input type="radio" name="mtype" value="audio"> Audio<br /><br />
										<span class="label">Video Type</span><br />
										<select name="vidtype">
											<option value="none">[none]</option>
											<option value="yt">YouTube</option>
											<option value="vimeo">Vimeo</option>
											<option value="dm">Dailymotion</option>
											<option value="bc">BitChute</option>
											<option value="ovid">Other Video</option>
										</select>
									</div>
								</div><div class="block bw67 xs-100 sm-100 md-100">
									<div class="form-group">
										<span class="label">Media URL:</span><br /><small><em>(Image, video, or audio file URL)</em></small><br />
										<input type="url" name="murl" />
									</div>
									<div class="form-group">
										<span class="label">Video ID:</span><br /><small><em>(<a href="https://www.youtube.com/" target="_blank">YouTube</a>, <a href="https://vimeo.com/" target="_blank">Vimeo</a>, <a href="https://www.dailymotion.com/" target="_blank">Dailymotion</a>, or <a href="https://www.bitchute.com/" target="_blank">BitChute</a>)</em></small><br />
										<input type="text" name="vid" style="max-width: 200px;" />
									</div>
								</div>
							</div>
						</div></div>
					</div>
					<!-- Content Tab -->
					<input type="radio" name="newday" id="tab4">
					<label for="tab4">Content</label>
					<div class="tab">
						<div class="block-wrap"><div class="block bw100">
							<div class="form-group">
								<span class="label">Content</span><br /><textarea name="content" rows="5"></textarea>
							</div>
						</div></div>
					</div>
				</div>
			</div>
			
			<button type="submit" name="add" class="btn-save">&#10004; Save</button>
		</form>
	</div>
</div>