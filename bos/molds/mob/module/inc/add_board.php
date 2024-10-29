<!-- Add New Board -->
<div style="display:none;" id="addnew">
	<div class="padded">
		<h4 class="modal-title addnew"><strong>New Board</strong></h4>
		<form method="POST" action="action_new_mob.php">
			<input type="hidden" name="pup" value="addboard" />
			<?php 
			$last_bid = $file->xpath('//board[last()]');
			$last_bid1 = str_replace('mob-','',$last_bid[0]['id']);
			$last_bid = (int) $last_bid1;
			$new_bid = 'mob-'.($last_bid + 1); 
			?>
			<input type="hidden" name="id" value="<?php echo $new_bid;?>" />
			<div style="min-width: 80vw;">
				<div class="block-wrap">
					<div class="block bw60 xs-100 sm-100 md-100">
						<div class="form-group">
							<label>Title:</label><br />
							<input type="text" name="title" /><br />
							<label>Description:</label><br />
							<textarea name="desc" rows="2"></textarea>
						</div>
					</div><div class="block bw40 xs-100 sm-100 md-100">
						<div class="form-group">
							<span class="label"><input type="checkbox" name="active" value="true" checked="checked" /> active</span>
						</div>
						<div class="form-group">
							<span class="label"><input type="checkbox" name="access" value="1" /> private board</span><br /><small>(login required to view)</small>
						</div>
					</div><div class="block bw50 xs-100 sm-100 md-100">
						<div class="form-group">	
							<label for="content-type">Content Type</label>
							<?php echo $content_type_selector;?>
						</div>
					</div><div class="block bw50 xs-100 sm-100 md-100">
						<div class="form-group">
							<label for="content-group-type">Content Group Type</label>
							<?php echo $content_group_type_selector;?>
						</div>
					</div>
				</div>
			</div>
			<button type="submit" name="add" class="btn-save">&#10004; Save</button>
		</form>
	</div>
</div>