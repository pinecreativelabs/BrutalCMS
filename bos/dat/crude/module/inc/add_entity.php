<!-- Add Entity -->
<div style="display:none;" id="addnew">
	<div class="padded">
		<h4 class="modal-title addnew"><strong>New Entity</strong></h4>
		<form method="POST" action="action_new_entity.php">
			<input type="hidden" name="id" value="<?php echo ($file->entity->count()+1).date('dhis'); ?>" />
			<div style="min-width: 80vw;">
				<div class="block-wrap">
					<div class="block bw67 xs-100 sm-100 md-100">
						<div class="form-group">
							<label>Title</label><br />
							<input type="text" name="title" />
						</div>
						<div class="form-group">
							<label>Description</label><br />
							<input type="text" name="desc" />
						</div>
					</div>
					<div class="block bw33 xs-100 sm-100 md-100">
						<div class="form-group">
							<span class="label">Format</span><br />
							<input type="radio" name="format" value="csv" /> csv &nbsp;|&nbsp;
							<input type="radio" name="format" value="txt" /> txt 
						</div>
						<div class="form-group">	
							<label>Data Group</label><br />
							<select name="dgroup">
							<?php foreach($dgfile->datagroup as $dgrow){ ?>
								<option value="<?php echo $dgrow['title'];?>"><?php echo $dgrow['title'];?></option>
							<?php } ?>
							</select>
						</div>
					</div>
					<div class="block bw100">
						<div class="form-group">
							<label>Fields</label> <small>(ex: <em>cid,first_name,last_name,email</em>)</small><br />
							<input type="text" name="fields" />
						</div>
					</div>
				</div>
			</div>
			<button type="submit" name="add" class="btn-save">&#10004; Save</button>
		</form>
	</div>
</div>