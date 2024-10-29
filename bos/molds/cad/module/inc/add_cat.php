
<!-- Add New Category -->
<div style="display:none;" id="addnew">
	<div class="padded">
		<h4 class="modal-title addnew"><strong>New Category</strong></h4>
		<form method="POST" action="action_new_cat.php">
			<input type="hidden" name="catid" value="<?php echo ($file->cat->count()+1).date('dhis');?>" />
			<div style="min-width: 80vw;"><div class="block-wrap">
				<div class="block bw100 xs-100 sm-100 md-100">
					<div class="form-group">
						<label>Title:</label><br />
						<input type="text" name="title" />
					</div>
				</div>
			</div></div>
			<button type="submit" name="add" class="btn-save">&#10004; Save</button>
		</form>
	</div>
</div>