<!-- Add New Property -->
<div style="display:none;" id="addproperty">
	<div class="padded">
		<h4 class="modal-title addnew"><strong>New Property</strong></h4>
		<form method="POST" action="action_new_mob.php">
			<input type="hidden" name="pup" value="addprop" />
			<?php 
			$last_item = $properties->xpath('//property[last()]');
			$last_pid1 = str_replace('mop-','',$last_item[0]['id']);
			$last_pid = (int) $last_pid1;
			$new_pid = 'mop-'.($last_pid + 1); 
			?>
			<input type="hidden" name="id" value="<?php echo $new_pid;?>" />
			<div style="min-width: 80vw;">
				<div class="block-wrap">
					<div class="block bw60 xs-100 sm-100 md-100">
						<div class="form-group">
							<label>Title:</label><br />
							<input type="text" name="title" />
						</div>
						<div class="form-group">	
							<label for="input-type">Input Type</label><br />
							<?php echo $input_type_selector;?>
						</div>
					</div><div class="block bw40 xs-100 sm-100 md-100">
						<div class="form-group">
							<span class="label"><input type="checkbox" name="active" value="true" checked="checked" /> active</span>
						</div>
						<div class="form-group">
							<span class="label"><input type="checkbox" name="req" value="y" /> required</span>
						</div>
						<div class="form-group">
							<span class="label"><input type="checkbox" name="ro" value="1" /> readonly</span>
						</div>
					</div>
				</div>
			</div>
			<button type="submit" name="addproperty" class="btn-save">&#10004; Save</button>
		</form>
	</div>
</div>