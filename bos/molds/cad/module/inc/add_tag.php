
<!-- Add New Tag -->
<div style="display:none;" id="addnew">
	<div class="padded">
		<h4 class="modal-title addnew"><strong>New Tag</strong></h4>
		<form method="POST" action="action_new_tag.php">
			<input type="hidden" name="tagid" value="<?php echo ($file->tag->count()+1).date('dhis');?>" />
			<div style="min-width: 80vw;"><div class="block-wrap">
				<div class="block bw100 xs-100 sm-100 md-100">
					<div class="form-group">
						<label>Title:</label><br />
						<input type="text" name="title" />
					</div>
					<div class="form-group">
						<label>Category:</label><br />
						<?php echo $cadcat_selector;?>
					</div>
				</div>
			</div></div>
			<button type="submit" name="add" class="btn-save">&#10004; Save</button>
		</form>
	</div>
</div>