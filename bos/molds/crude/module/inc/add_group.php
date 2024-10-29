<!-- Add New Data Group -->
<div style="display:none;" id="addnew">
	<div class="padded">
		<h4 class="modal-title addnew"><strong>New Data Group</strong></h4>
		<form method="POST" action="action_new_group.php">
			<input type="hidden" name="id" value="<?php echo ($file->datagroup->count()+1).date('dhis'); ?>" />
			<div style="min-width: 80vw;">
				<div class="block-wrap">
					<div class="block bw50 xs-100 sm-100 md-100">
						<div class="form-group">
							<label>Title:</label><br /><input type="text" name="title" />
						</div>
					</div><div class="block bw50 xs-100 sm-100 md-100">
						<div class="form-group">	
							<label for="datatype">Data Type</label>
							<select name="datatype">
								<option value="mixed">Mixed</option>
								<option value="csv">CSV</option>
								<option value="xml">XML</option>
							</select>
						</div>
					</div>
					<div class="block bw100">
						<div class="form-group">
							<label>Description:</label><br /><input type="text" name="desc" />
						</div>
					</div>
				</div>
			</div>
			<button type="submit" name="add" class="btn-save">&#10004; Save</button>
		</form>
	</div>
</div>