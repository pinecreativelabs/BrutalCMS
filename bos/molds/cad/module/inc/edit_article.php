<!-- Edit Article -->
<div style="display:none;" id="edit_<?php echo $row['aid']; ?>">
	<div class="padded">
		<h4 class="modal-title edit"><strong>Edit Article ID: <?php echo $row['aid'];?></strong></h4>
		<form method="POST" action="action_update_articles.php">
			<input type="hidden" name="aid" value="<?php echo $row['aid'];?>" />
			<input type="hidden" name="user" value="<?php echo $_SESSION['userName']; ?>" />
			<input type="hidden" name="cdpath" value="<?php echo $row->content;?>" />
			<div style="min-width: 80vw;">
				<div class="tabs">
					<input type="radio" name="editarticle" id="tab1-<?php echo $row['aid'];?>" checked="checked">
					<label for="tab1-<?php echo $row['aid'];?>">General</label>
					<div class="tab">
						<div class="block-wrap">
							<div class="block bw67 xs-100 sm-100 md-100">
								<div class="form-group">
									<span class="label">Title:</span><br />
									<input type="text" name="title" value="<?php echo $row->title; ?>" />
								</div>
								<div class="form-group">
									<span class="label">Cover Image:</span> <small><em>(enter full URL)</em></small><br />
									<input type="url" name="pic" value="<?php echo $row->pic; ?>" />
								</div>
								<div class="form-group">
									<span class="label">LINK:</span> <small><em>(optional)</em></small><br />
									<input type="url" name="url" value="<?php echo $row->url; ?>" />
								</div>
							</div>
							<div class="block bw33 xs-100 sm-100 md-100">
								<div class="form-group">	
									<span class="label">Category</span><br />
									<select name="category" id="cat<?php echo $row['aid'];?>">
									<?php foreach($catfile->cat as $cat){ ?>
										<option value="<?php echo $cat['title'];?>"><?php echo $cat['title'];?></option>
									<?php } ?>
									</select>
									<script>
									var temp = "<?php echo $row->post['cat'];?>";
									var mySelect = document.getElementById('cat<?php echo $row['aid'];?>');
									for(var i, j = 0; i = mySelect.options[j]; j++) {
										if(i.value == temp) {mySelect.selectedIndex = j; break;}
									}
									</script>
								</div>
								<div class="form-group">
									<span class="label">Tag</span><br />
									<select name="tag" id="tag<?php echo $row['aid'];?>">
									<?php foreach($tagfile->tag as $tag){ ?>
										<option value="<?php echo $tag['title'];?>"><?php echo $tag['title'];?></option>
									<?php } ?>
									</select>
									<script>
									var temp = "<?php echo $row->post['tag'];?>";
									var mySelect = document.getElementById('tag<?php echo $row['aid'];?>');
									for(var i, j = 0; i = mySelect.options[j]; j++) {
										if(i.value == temp) { mySelect.selectedIndex = j; break;}
									}
									</script>
								</div>
							</div>
						</div>
					</div>
					<!-- settings tab -->
					<input type="radio" name="editarticle" id="tab2-<?php echo $row['aid'];?>">
					<label for="tab2-<?php echo $row['aid'];?>">Settings</label>
					<div class="tab">
						<div class="block-wrap"><div class="block bw50 xs-100 sm-100 md-100">
							<div class="form-group">
								<span class="label"><input type="checkbox" name="active" value="true" <?php if($row->post['active'] == 'true'){ echo 'checked="checked"';} ?>/> active</span> 
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
								<span class="label">DIP:</span> <small><em>(Date of Initial Post)</em></small><br />
								<input type="date" name="dip" value="<?php echo date('Y-m-d',strtotime($row->post['dip'])); ?>" />
							</div>
						</div><div class="block bw50 xs-100 sm-100 md-100">
							<div class="form-group">
								<span class="label">Expires:</span> <small><em>(optional)</em></small><br />
								<input type="date" name="dep" <?php if(!empty($row->post['dep'])){ ?>value="<?php echo date('Y-m-d',strtotime($row->post['dep'])); ?>"<?php } ?> />
							</div>
						</div></div>
					</div>
					<!-- content tab -->
					<input type="radio" name="editarticle" id="tab3-<?php echo $row['aid'];?>">
					<label for="tab3-<?php echo $row['aid'];?>">Content</label>
					<div class="tab">
						<div class="form-group">
							<?php $cdfile=$row->content;
								if(file_exists($cdfile)){$content=file_get_contents($cdfile);}else{$content='';}?>
							<span class="label">Content</span><br /><textarea name="content" rows="5"><?php echo $content; ?></textarea>
						</div>
					</div>
				</div>
			</div>
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