<!-- Edit Tag -->
<div style="display:none;" id="edit_<?php echo $row['tagid']; ?>">
	<div class="padded">
		<h4 class="modal-title edit"><strong>Edit Tag:</strong> <em><?php echo $row['title'];?></em></h4>
		<form method="POST" action="action_update_tags.php">
			<input type="hidden" name="tagid" value="<?php echo $row['tagid'];?>" />
			<div style="min-width: 80vw;"><div class="block-wrap">
				<div class="block bw100 xs-100 sm-100 md-100">
					<div class="form-group">
						<label>Title:</label><br />
						<input type="text" name="title" value="<?php echo $row['title']; ?>" />
					</div>
					<div class="form-group">
						<label>Category: <?php echo $row['cat'];?></label><br />
						<select name="category" id="<?php echo $row['tagid'];?>">
						<?php foreach($catfile->cat as $cat){ ?>
							<option value="<?php echo $cat['title'];?>"><?php echo $cat['title'];?></option>
						<?php } ?>
						</select>
						<script>
						var temp = "<?php echo $row['cat'];?>";
						var mySelect = document.getElementById('<?php echo $row['tagid'];?>');
						for(var i, j = 0; i = mySelect.options[j]; j++) {
							if(i.value == temp) {
								mySelect.selectedIndex = j;
								break;
							}
						}
						</script>
					</div>
				</div>
			</div></div>
			<button type="submit" name="edit" class="btn-save">&#10004; Update</button>
		</form>
	</div>
</div>

<!-- Delete -->
<div id="delete_<?php echo $row['tagid']; ?>" style="display:none;">
	<div class="padded warning center" style="min-width: 20vw;">
		<h4>&#9888; Delete Record</h4>
		<p>You are about to delete<br />
		<span class="larger heavy">Category: <?php echo $row['title']; ?></span><br /><br /></p>
		<a href="action_delete_tag.php?tagid=<?php echo $row['tagid']; ?>" class="del-btn"><i class="bi bi-delete"></i> Delete</a>
	</div>
</div>