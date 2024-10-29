<!-- Edit Board -->
<div style="display:none;" id="edit_<?php echo $row['id']; ?>">
	<div class="padded">
		<h4 class="modal-title edit"><strong>Edit <?php echo $row['title'];?></strong></h4>
		<form method="POST" action="action_update_mob.php">
			<input type="hidden" name="pup" value="editboard" />
			<input type="hidden" name="id" value="<?php echo $row['id'];?>" />
			<div style="min-width: 80vw;">
				<div class="block-wrap">
					<div class="block bw60 xs-100 sm-100 md-100">
						<div class="form-group">
							<label>Title:</label><br />
							<input type="text" name="title" value="<?php echo $row['title'];?>" /><br />
							<label>Description:</label><br />
							<textarea name="desc" rows="2"><?php echo $row->desc;?></textarea>
						</div>
					</div><div class="block bw40 xs-100 sm-100 md-100">
						<div class="form-group">
							<span class="label"><input type="checkbox" name="active" value="true" <?php if($row['active'] == 'true'){ echo 'checked="checked"';} ?> /> active</span>
						</div>
						<div class="form-group">
							<span class="label"><input type="checkbox" name="access" value="1" <?php if($row['access'] == '1'){ echo 'checked="checked"';} ?> /> private board</span><br />
							<small>(login required to view)</small>
						</div>
					</div><div class="block bw50 xs-100 sm-100 md-100">
						<div class="form-group">	
							<label for="content-type">Content Type</label>
							<div id="ct-<?php echo $row['id'];?>">
							<?php echo $content_type_selector;?>
							</div>
							<script>
							var temp = "<?php echo $row['ctype'];?>";
							var mySelect = document.querySelector('#ct-<?php echo $row['id'];?> select');
							for(var i, j = 0; i = mySelect.options[j]; j++) {
								if(i.value == temp) {
									mySelect.selectedIndex = j;
									break;
								}
							}
							</script>
						</div>
					</div><div class="block bw50 xs-100 sm-100 md-100">
						<div class="form-group">
							<label for="content-group-type">Content Group Type</label>
							<div id="cgt-<?php echo $row['id'];?>">
							<?php echo $content_group_type_selector;?>
							</div>
							<script>
							var temp = "<?php echo $row['cgtype'];?>";
							var mySelect = document.querySelector('#cgt-<?php echo $row['id'];?> select');
							for(var i, j = 0; i = mySelect.options[j]; j++) {
								if(i.value == temp) {
									mySelect.selectedIndex = j;
									break;
								}
							}
							</script>
						</div>
					</div>
				</div>
			</div><button type="submit" name="edit" class="btn-save">&#10004; Update</button>
		</form>
	</div>
</div>

<!-- Delete -->
<div id="delete_<?php echo $row['id']; ?>" style="display:none;">
	<div class="padded warning center" style="min-width: 20vw;">
		<h4>&#9888; Delete Board</h4>
		<p>You are about to delete<br /><span class="larger heavy"><?php echo $row['title']; ?></span><br /><br /></p>
		<a href="action_delete_board.php?id=<?php echo $row['id']; ?>" class="del-btn"><i class="bi bi-delete"></i> Delete</a>
	</div>
</div>