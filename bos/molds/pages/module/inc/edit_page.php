<!-- Edit Page -->
<div style="display:none;" id="edit_<?php echo $row['id']; ?>">
	<div class="padded">
		<h4 class="modal-title edit"><strong>Edit <?php echo $row['title'];?></strong></h4>
		<form method="POST" action="action_update_page.php">
			<input type="hidden" name="id" value="<?php echo $row['id'];?>" />
			<input type="hidden" name="author" value="<?php echo $_SESSION['userName'];?>" />
			<input type="hidden" name="lastmod" value="<?php echo date('Y-m-dTH:i:sP', time()); ?>" />
			<div style="min-width: 80vw;">
				<div class="tabs">
					<input type="radio" name="editpage" id="tab1np-<?php echo $row['id'];?>" checked="checked">
					<label for="tab1np-<?php echo $row['id'];?>">General</label>
					<div class="tab">
						<div class="block-wrap"><div class="block bw50 xs-100 sm-100 md-100">
							<div class="form-group">
								<span class="label">Title</span><br /><input type="text" name="title" value="<?php echo $row['title'];?>" /><br />
								<span class="label">META Title</span><br /><input type="text" name="metatitle" value="<?php echo $row->metatitle;?>" />
							</div>
						</div><div class="block bw50 xs-100 sm-100 md-100">
							<div class="form-group">
								<span class="label">Description</span><br /><textarea name="desc" rows="3"><?php echo $row->metadesc;?></textarea>
							</div>
						</div><div class="block bw100">
							<div class="form-group">
								<span class="label">Canonical URL</span><br />
								<input type="text" name="canurl" value="<?php echo $row->loc;?>" />
							</div>
						</div><div class="block bw50 xs-100 sm-100 md-100">
							<div class="form-group">
								<span class="label"><input type="checkbox" name="active" value="true" /> active</span>
							</div>
						</div><div class="block bw50 xs-100 sm-100 md-100">
							<div class="form-group">
								<span class="label"><input type="checkbox" name="reqlogin" value="true" /> password protected</span>
							</div>
						</div></div>
					</div>
					<!-- Options Tab -->
					<input type="radio" name="editpage" id="tab2np-<?php echo $row['id'];?>">
					<label for="tab2np-<?php echo $row['id'];?>">Options</label>
					<div class="tab">
						<div class="block-wrap">
							<div class="block bw50 xs-100 sm-100 md-100">
								<div class="form-group">	
									<span class="label">Page Group</span><br />
									<select name="pggroup" id="groupselect_<?php echo $row['id']; ?>">
									<?php foreach($pggroup->pagegroup as $pggrow){ ?>
										<option value="<?php echo $pggrow['title'];?>"><?php echo $pggrow['title'];?></option>
									<?php } ?>
									</select>
								</div>
								<div class="form-group">	
									<span class="label">Type</span><br />
									<select name="type">
										<option value="public" <?php echo ($row['type'] == 'public') ? 'selected' : ''; ?>>Public</option>
										<option value="private" <?php echo ($row['type'] == 'private') ? 'selected' : ''; ?>>Private</option>
										<option value="hidden" <?php echo ($row['type'] == 'hidden') ? 'selected' : ''; ?>>Hidden</option>
										<option value="system" <?php echo ($row['type'] == 'system') ? 'selected' : ''; ?>>System</option>
									</select>
								</div>
								<div class="form-group">
									<span class="label"><input type="checkbox" name="sitemap" value="1" <?php echo ($row['sitemap'] == '1') ? 'checked="checked"' : ''; ?>/> exclude from sitemap</span>
								</div>
							</div><div class="block bw50 xs-100 sm-100 md-100">
								<div class="form-group">	
									<span class="label">Change Frequency</span><br />
									<select name="changefreq">
										<option value="always" <?php echo ($row['changefreq'] == 'always') ? 'selected' : ''; ?>>Always</option>
										<option value="hourly" <?php echo ($row['changefreq'] == 'hourly') ? 'selected' : ''; ?>>Hourly</option>
										<option value="daily" <?php echo ($row['changefreq'] == 'daily') ? 'selected' : ''; ?>>Daily</option>
										<option value="weekly" <?php echo ($row['changefreq'] == 'weekly') ? 'selected' : ''; ?>>Weekly</option>
										<option value="monthly" <?php echo ($row['changefreq'] == 'monthly') ? 'selected' : ''; ?>>Monthly</option>
										<option value="never" <?php echo ($row['changefreq'] == 'never') ? 'selected' : ''; ?>>Never</option>
									</select>
								</div>
								<div class="form-group">	
									<span class="label">Priority</span><br />
									<select name="priority">
										<option value="unset" <?php echo ($row['priority'] == 'unset') ? 'selected' : ''; ?>>[unset]</option>
										<option value="0.0" <?php echo ($row['priority'] == '0.0') ? 'selected' : ''; ?>>Unimportant</option>
										<option value="0.3" <?php echo ($row['priority'] == '0.3') ? 'selected' : ''; ?>>Low</option>
										<option value="0.5" <?php echo ($row['priority'] == '0.5') ? 'selected' : ''; ?>>Normal</option>
										<option value="0.8" <?php echo ($row['priority'] == '0.8') ? 'selected' : ''; ?>>High</option>
										<option value="1.0" <?php echo ($row['priority'] == '1.0') ? 'selected' : ''; ?>>Important</option>
									</select>
								</div>
							</div>
						</div>
					</div>
					<!-- Design Tab -->
					<input type="radio" name="editpage" id="tab3np-<?php echo $row['id'];?>">
					<label for="tab3np-<?php echo $row['id'];?>">Design</label>
					<div class="tab">
						<div class="block-wrap">
							<div class="block bw50 xs-100 sm-100 md-100">
								<div class="form-group">
									<span class="label">Layout</span><br />
									<select name="layout" id="layoutselect_<?php echo $row['id'];?>">
										<option value="0">None</option>
									<?php foreach($layoutfile->layout as $lrow){if($lrow['active']=='true'){ ?>
										<option value="<?php echo $lrow['id'];?>"><?php echo $lrow['title'];?></option>
									<?php }} ?>
									</select>
								</div>
							</div><div class="block bw50 xs-100 sm-100 md-100">
								<div class="form-group">
									<span class="label">Theme</span><br />
									<select name="theme" id="themeselect_<?php echo $row['id'];?>">
										<option value="0">None</option>
									<?php foreach($themefile->theme as $trow){if($trow['active']=='true'){ ?>
										<option value="<?php echo $trow['id'];?>"><?php echo $trow['title'];?></option>
									<?php }} ?>
									</select>
								</div>
							</div>
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
		<a href="action_delete_page.php?id=<?php echo $row['id']; ?>" class="del-btn"><i class="bi bi-delete"></i> Delete</a>
	</div>
</div>

<script>
/*function setSelectedIndex(s, v) {for ( var i = 0; i < s.options.length; i++ ) {if (s.options[i].text==v){s.options[i].selected = true; return;}}}*/
function setSelectedIndex(s, valsearch){for (i = 0; i< s.options.length; i++){ if (s.options[i].value == valsearch){s.options[i].selected = true; break;}}return;}
setSelectedIndex(document.getElementById('themeselect_<?php echo $row['id'];?>'),"<?php echo $row->design['theme'];?>");
setSelectedIndex(document.getElementById('layoutselect_<?php echo $row['id'];?>'),"<?php echo $row->design['layout'];?>");
setSelectedIndex(document.getElementById('groupselect_<?php echo $row['id'];?>'),"<?php echo $row['group'];?>");
</script>