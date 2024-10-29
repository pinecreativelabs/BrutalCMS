<!-- Edit Day Record -->
<div style="display:none;" id="edit_<?php echo $row['id']; ?>">
	<div class="padded">
		<h4 class="modal-title addnew"><strong>Edit Day ID: <?php echo $row['id'];?></strong></h4>
		<form method="POST" action="action_update_days.php">
			<input type="hidden" name="id" value="<?php echo $row['id'];?>" />
			<input type="hidden" name="cdpath" value="<?php echo $row->content;?>" />
			<div style="min-width: 80vw;">
				<div class="tabs">
					<input type="radio" name="newday" id="tab1-<?php echo $row['id'];?>" checked="checked">
					<label for="tab1-<?php echo $row['id'];?>">General</label>
					<div class="tab">
						<div class="block-wrap"><div class="block bw67 xs-100 sm-100 md-100">
								<div class="form-group">
									<span class="label">Title:</span><br /><input type="text" name="title" value="<?php echo $row['title']; ?>" />
								</div>
							</div><div class="block bw33 xs-100 sm-100 md-100">
								<div class="form-group"><span class="label">Date:</span><br /><input type="date" name="ddate" value="<?php echo date('Y-m-d',strtotime($row['ddate'])); ?>" /></div>
						</div></div>
						
						<details><summary>Options</summary><div class="details">
							<div class="block-wrap"><div class="block bw50 xs-100 sm-100 md-100">
								<div class="form-group">
									<span class="label"><input type="checkbox" name="active" value="true" <?php if($row['active'] == 'true'){ echo 'checked="checked"';} ?>/> active</span>
								</div>
							</div><div class="block bw50 xs-100 sm-100 md-100">
								<div class="form-group">	
									<span class="label">Title Display</span><br />
									<select name="title_display">
										<option value="td" <?php echo ($row['td'] == 'td') ? 'selected' : ''; ?>>Title + Date</option>
										<option value="to" <?php echo ($row['td'] == 'to') ? 'selected' : ''; ?>>Title Only</option>
										<option value="do" <?php echo ($row['td'] == 'do') ? 'selected' : ''; ?>>Date Only</option>
									</select>
								</div>
							</div></div>
						
							<div class="block-wrap">
								<div class="block bw100">
									<div class="form-group">
										<span class="label">Link URL:</span> <small><em>(optional)</em></small><br /><input type="url" name="link" value="<?php echo $row->url; ?>" />
									</div>
								</div><div class="block bw50 xs-100 sm-100 md-100">
									<div class="form-group">	
										<span class="label">Link Target</span><br />
										<select name="target">
											<option value="_blank" <?php echo ($row->url['target'] == '_blank') ? 'selected' : ''; ?>>New Window</option>
											<option value="_self" <?php echo ($row->url['target'] == '_self') ? 'selected' : ''; ?>>Same Window</option>
											<option value="_parent" <?php echo ($row->url['target'] == '_parent') ? 'selected' : ''; ?>>Parent Window</option>
										</select>
									</div>
								</div><div class="block bw50 xs-100 sm-100 md-100">
									<div class="form-group">
										<span class="label">Link Text</span><br /><input type="text" name="linktext" value="<?php echo $row->url['linktext']; ?>" />
									</div>
								</div>
							</div>
						</details>
					</div>
					<!-- Design Tab -->
					<input type="radio" name="newday" id="tab2-<?php echo $row['id'];?>">
					<label for="tab2-<?php echo $row['id'];?>">Design</label>
					<div class="tab">
						<div class="block-wrap"><div class="block bw100">
							<div class="form-group">
								<span class="label">Cover Image URL:</span> <small><em>(optional)</em></small><br /><input type="url" name="cover" value="<?php echo $row->design;?>" />
							</div>
						</div><div class="block bw50 xs-100 sm-100 md-100">
							<div class="form-group">	
								<span class="label">Template</span><br />
								<select name="template">
									<option value="default" <?php echo ($row->design['template'] == 'default') ? 'selected' : ''; ?>>Default</option>
									<option value="raw" <?php echo ($row->design['template'] == 'raw') ? 'selected' : ''; ?>>Raw Data</option>
								</select>
							</div><div class="form-group">
								<span class="label">Skin</span><br />
								<select name="skin">
									<option value="flat" <?php echo ($row->design['skin'] == 'flat') ? 'selected' : ''; ?>>Flat</option>
									<option value="gradient" <?php echo ($row->design['skin'] == 'gradient') ? 'selected' : ''; ?>>Linear Gradient</option>
									<option value="radial" <?php echo ($row->design['skin'] == 'radial') ? 'selected' : ''; ?>>Radial Gradient</option>
									<option value="mesh" <?php echo ($row->design['skin'] == 'mesh') ? 'selected' : ''; ?>>Mesh Gradient</option>
									<option value="nude" <?php echo ($row->design['skin'] == 'nude') ? 'selected' : ''; ?>>Nude</option>
								</select>
							</div>
						</div><div class="block bw50 xs-100 sm-100 md-100">
							<div class="form-group">
								<span class="label"><strong>Color Scheme</strong></span><br />
								<input type="color" name="pcolor" value="<?php echo $row->design['pcolor']; ?>"/> Primary <small>(background)</small><br />
								<input type="color" name="scolor" value="<?php echo $row->design['scolor']; ?>"/> Secondary <small>(title, headings, borders)</small><br />
								<input type="color" name="tcolor" value="<?php echo $row->design['tcolor']; ?>"/> Tertiary <small>(general text, outlines)</small><br />
								<input type="color" name="acolor" value="<?php echo $row->design['acolor']; ?>"/> Accent <small>(links, drop shadows)</small><br />
								<input type="color" name="ocolor" value="<?php echo $row->design['ocolor']; ?>"/> Other <small>(link hover, misc.)</small>
							</div>
						</div></div>
					</div>
					<!-- Media Tab -->
					<input type="radio" name="newday" id="tab3-<?php echo $row['id'];?>">
					<label for="tab3-<?php echo $row['id'];?>">Media</label>
					<div class="tab mediatype">
						<div class="block-wrap"><div class="block bw100">
							<div class="block-wrap">
								<div class="block bw33 xs-100 sm-100 md-100">
									<div class="form-group">	
										<span class="label">Media Type</span><br />
										<input type="radio" name="mtype" value="image" <?php echo ($row->media['type'] == 'image') ? 'checked' : ''; ?>> Image<br />
										<input type="radio" name="mtype" value="video" <?php echo ($row->media['type'] == 'video') ? 'checked' : ''; ?>> Video<br />
										<input type="radio" name="mtype" value="audio" <?php echo ($row->media['type'] == 'audio') ? 'checked' : ''; ?>> Audio<br /><br />
									</div>
								</div><div class="block bw67 xs-100 sm-100 md-100">
									<div class="form-group">
										<span class="label">Media URL:</span><br /><small><em>(Image, video, or audio file URL)</em></small><br />
										<input type="url" name="murl" value="<?php echo $row->media; ?>" />
									</div>
								</div><div class="block bw100">
									
									<details><summary>Video Settings</summary><div class="details">
									<div class="form-group"><span class="label">Video Type</span><br />
										<select name="vidtype">
											<option value="none" <?php echo ($row->media['vidtype'] == 'none') ? 'selected' : ''; ?>>[none]</option>
											<option value="yt" <?php echo ($row->media['vidtype'] == 'yt') ? 'selected' : ''; ?>>YouTube</option>
											<option value="vimeo" <?php echo ($row->media['vidtype'] == 'vimeo') ? 'selected' : ''; ?>>Vimeo</option>
											<option value="dm" <?php echo ($row->media['vidtype'] == 'dm') ? 'selected' : ''; ?>>Dailymotion</option>
											<option value="bc" <?php echo ($row->media['vidtype'] == 'bc') ? 'selected' : ''; ?>>BitChute</option>
											<option value="ovid" <?php echo ($row->media['vidtype'] == 'ovid') ? 'selected' : ''; ?>>Other Video</option>
										</select>
									</div>
									<div class="form-group"><span class="label">Video IDs</span>
									<div class="brick-wrap"><div class="brick bw25 xs-100 sm-100 md-100">
										<span class="label"><a href="https://www.youtube.com/" target="_blank">YouTube</a></span><br >
										<input type="text" name="ytvid" style="max-width: 200px;" value="<?php echo $row->media['ytvid']; ?>" />
									</div><div class="brick bw25 xs-100 sm-100 md-100">
										<span class="label"><a href="https://vimeo.com/" target="_blank">Vimeo</a></span><br >
										<input type="text" name="vvid" style="max-width: 200px;" value="<?php echo $row->media['vvid']; ?>" />
									</div><div class="brick bw25 xs-100 sm-100 md-100">
										<span class="label"><a href="https://www.bitchute.com/" target="_blank">BitChute</a></span><br >
										<input type="text" name="bcvid" style="max-width: 200px;" value="<?php echo $row->media['bcvid']; ?>" />
									</div><div class="brick bw25 xs-100 sm-100 md-100">
										<span class="label"><a href="https://www.dailymotion.com/" target="_blank">Dailymotion</a></span><br >
										<input type="text" name="dmvid" style="max-width: 200px;" value="<?php echo $row->media['dmvid']; ?>" />
									</div></div></div>
									</details>

								</div>
							</div>
						</div></div>
					</div>
					<!-- Content Tab -->
					<input type="radio" name="newday" id="tab4-<?php echo $row['id'];?>">
					<label for="tab4-<?php echo $row['id'];?>">Content</label>
					<div class="tab">
						<div class="block-wrap"><div class="block bw100">
							<div class="form-group">
								<span class="label">Content</span><br /><textarea name="content" rows="5"><?php echo file_get_contents($row->content); ?></textarea>
							</div>
						</div></div>
					</div>
				</div>
			</div>
			
			<button type="submit" name="edit" class="btn-save">&#10004; Save</button>
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