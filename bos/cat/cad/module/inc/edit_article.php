<!-- Edit Day Record -->
<div style="display:none;" id="edit_<?php echo $row['aid']; ?>">
	<div class="padded">
		<h4 class="modal-title edit"><strong>Edit Article ID: <?php echo $row['aid'];?></strong></h4>
		<form method="POST" action="action_update_articles.php">
			<input type="hidden" name="aid" value="<?php echo $row['aid'];?>" />
			<input type="hidden" name="user" value="<?php echo $_SESSION['userName']; ?>" />
			<div style="min-width: 80vw;"><div class="block-wrap">
				<div class="block bw67 xs-100 sm-100 md-100">
					<div class="form-group">
						<label>Title:</label><br />
						<input type="text" name="title" value="<?php echo $row->title; ?>" />
					</div>
					<div class="form-group">
						<label>PIC:</label> <small><em>(Image URL)</em></small><br />
						<input type="url" name="pic" value="<?php echo $row->pic; ?>" />
					</div>
					<div class="form-group">
						<label>LINK:</label><br />
						<input type="url" name="url" value="<?php echo $row->url; ?>" />
					</div>
					<div class="form-group">	
						<label for="target">Link Target</label>
						<select name="target">
							<option value="_blank" <?php echo ($row->url['target'] == '_blank') ? 'selected' : ''; ?>>New Window</option>
							<option value="_self" <?php echo ($row->url['target'] == '_self') ? 'selected' : ''; ?>>Same Window</option>
							<option value="_parent" <?php echo ($row->url['target'] == '_parent') ? 'selected' : ''; ?>>Parent Window</option>
						</select>
					</div>
				</div>
				<div class="block bw33 xs-100 sm-100 md-100">
					<div class="form-group">	
						<label for="tag">Topic</label>
						<select name="tag">
							<?php $trow = 0;
								$skip_row_number = array("1");
								if (($handletopix = fopen($cadtopixpath, 'r')) !== FALSE) {
									while (($pdata = fgetcsv($handletopix, 1000, ",")) !== FALSE) {
										$trow++;
										if (in_array($trow, $skip_row_number)){continue;} else { ?>
										<option value="<?php echo $pdata[1]; ?>" <?php echo ($row->post['tag']==$pdata[1]) ? 'selected' : ''; ?>><?php echo $pdata[1]; ?></option>
										<?php }
									} fclose($handletopix);
								}
							?>
						</select>
					</div>
					<div class="form-group">
						<label>DIP:</label> <small><em>(Date of Initial Post)</em></small><br />
						<input type="date" name="dip" value="<?php echo date('Y-m-d',strtotime($row->post['dip'])); ?>" />
					</div>
					<div class="form-group">
						<label>Expires:</label> <small><em>(optional)</em></small><br />
						<input type="date" name="dep" <?php if(!empty($row->post['dep'])){ ?>value="<?php echo date('Y-m-d',strtotime($row->post['dep'])); ?>"<?php } ?> />
					</div>
					<div class="form-group">
						<span class="label">Active</span><br />
						<input type="radio" name="active" value="true" <?php echo ($row->post['active'] == 'true') ? 'checked="checked"' : ''; ?>/> true &nbsp;|&nbsp;
						<input type="radio" name="active" value="false" <?php echo ($row->post['active'] == 'false') ? 'checked="checked"' : ''; ?>/> false 
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

<!-- Delete -->
<div id="delete_<?php echo $row['aid']; ?>" style="display:none;">
	<div class="padded warning center" style="min-width: 20vw;">
		<h4>&#9888; Delete Record</h4>
		<p>You are about to delete<br />
		<span class="larger heavy">Article ID: <?php echo $row['aid']; ?></span><br /><br /></p>
		<a href="action_delete_article.php?aid=<?php echo $row['aid']; ?>" class="del-btn"><i class="bi bi-delete"></i> Delete</a>
	</div>
</div>