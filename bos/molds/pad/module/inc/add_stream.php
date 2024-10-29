<!-- Create Stream -->
<div style="display:none;" id="addnew">
	<div class="padded">
		<h4 class="modal-title addnew"><strong>New Stream</strong></h4>
		<form method="POST" action="action_new_stream.php">
			<input type="hidden" name="uname" value="<?php echo $current_user;?>" />
			<input type="hidden" name="sid" value="<?php echo $uid.'-'.($streamsfile->stream->count()+1);?>" />
			<div style="min-width: 80vw;">
				<div class="block-wrap">
					<div class="block bw100">
						<div class="form-group">
							<label>Title</label><br />
							<input type="text" name="title" /><br />
							<label>Description</label><br />
							<textarea name="description"></textarea>
						</div>
					</div>
					<div class="block bw50 xs-100 sm-100 md-100">
						<div class="form-group">	
							<label>Type</label><br />
							<select name="type">
								<option value="mixed">Mixed</option>
								<option value="audio">Audio</option>
								<option value="blog">Blog</option>
								<option value="event">Event</option>
								<option value="image">Image</option>
								<option value="product">Product</option>
								<option value="video">Video</option>
							</select>
						</div>
					</div>
					<div class="block bw50 xs-100 sm-100 md-100">
						<div class="form-group">	
							<label>Active</label><br />
							<select name="active">
								<option value="true">true</option>
								<option value="false">false</option>
							</select>
						</div>
					</div>
				</div>
			</div>
			<button type="submit" name="add" class="btn-save">&#10004; Save</button>
		</form>
	</div>
</div>