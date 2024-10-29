<!-- Edit Property -->
<div style="display:none;" id="edit_<?php echo $prow['id'];?>">
	<div class="padded">
		<h4 class="modal-title addnew"><strong>Edit Property</strong></h4>
		<form method="POST" action="action_update_mob.php">
			<input type="hidden" name="pup" value="editprop" />
			<input type="hidden" name="id" value="<?php echo $prow['id'];?>">
			<div style="min-width: 80vw;">
				<div class="block-wrap">
					<div class="block bw60 xs-100 sm-100 md-100">
						<div class="form-group">
							<label for="title">Title:</label><br />
							<?php if($prow['id']!='mop-0'){?><input type="text" name="title" value="<?php echo $prow['title'];?>" /><?php } else { echo $prow['title'];} ?>
						</div>
						<div class="form-group">	
							<label for="input-type">Input Type</label><br />
							<?php if($prow['id']!='mop-0'){?><div id="it-<?php echo $prow['id'];?>">
							<?php echo $input_type_selector;?>
							</div>
							<script>
							var temp = "<?php echo $prow['type'];?>";
							var mySelect = document.querySelector('#it-<?php echo $prow['id'];?> select');
							for(var i, j = 0; i = mySelect.options[j]; j++) {
								if(i.value == temp) {
									mySelect.selectedIndex = j;
									break;
								}
							}
							</script><?php } else { echo $prow['type'];} ?>
						</div>
					</div><div class="block bw40 xs-100 sm-100 md-100">
						<div class="form-group">
							<label>ID:</label> <strong><?php echo $prow['id'];?></strong>
						</div>
						<?php if($prow['id']!='mop-0'){?><div class="form-group">
							<span class="label" style="width: 95%;"><input type="checkbox" name="active" value="true" <?php if($prow['active'] == 'true'){ echo 'checked="checked"';} ?> /> active</span>
							<span class="label" style="width: 95%;"><input type="checkbox" name="req" value="y" <?php if($prow['req'] == 'y'){ echo 'checked="checked"';} ?> /> required</span>
							<span class="label" style="width: 95%;"><input type="checkbox" name="ro" value="1" <?php if($prow['ro'] == '1'){ echo 'checked="checked"';} ?> /> readonly</span>
						</div><?php } ?>
					</div>
					<div class="block bw100">
						<?php if($prow['type']=='hidden'){ ?>
						<div class="form-group">
							<label for="hit">Hidden Input Type</label><br />
							<select name="hit">
								<option value="none" <?php echo ($prow['hit'] == 'none') ? 'selected' : ''; ?>>None (custom text)</option>
								<option value="agid" <?php echo ($prow['hit'] == 'agid') ? 'selected' : ''; ?>>Auto-Generated ID</option>
								<option value="user" <?php echo ($prow['hit'] == 'user') ? 'selected' : ''; ?>>Current User</option>
								<option value="date" <?php echo ($prow['hit'] == 'date') ? 'selected' : ''; ?>>Current Date</option>
								<option value="time" <?php echo ($prow['hit'] == 'time') ? 'selected' : ''; ?>>Current Time</option>
								<option value="dt" <?php echo ($prow['hit'] == 'dt') ? 'selected' : ''; ?>>Current Date + Time</option>
							</select>
						</div>
						<?php } ?>
						<div class="form-group">
							<label for="dvalue">Default Value</label><br />
							<input type="text" name="dvalue" value="<?php echo $prow['value'];?>">
						</div>
					</div>
					<?php if(($prow['type']=='select')||($prow['type']=='radio')||($prow['type']=='checkbox')){ ?>
					<div class="block bw100"><div class="form-group">
						<label for="options">Options</label><br /><small>Separate each option by a comma (ex:<em>option 1,option 2,option 3)</em></small><br />
						<textarea name="options"><?php echo $prow->options;?></textarea>
					</div></div>
					<?php } elseif(($prow['type']=='number')||($prow['type']=='range')){ ?>
					<div class="block bw33 xs-100 sm-100 md-100">
						<div class="form-group">
							<label for="min">Min Value</label><br /><input type="number" name="min" value="<?php echo $prow['min'];?>">
						</div>
					</div><div class="block bw33 xs-100 sm-100 md-100">
						<div class="form-group">
							<label for="max">Max Value</label><br /><input type="number" name="max" value="<?php echo $prow['max'];?>">
						</div>
					</div><div class="block bw33 xs-100 sm-100 md-100">
						<div class="form-group">
							<label for="step">Step Value</label><br /><input type="number" name="step" value="<?php echo $prow['step'];?>" min="0">
						</div>
					</div>
					<?php } else {} ?>
				</div>
			</div>
			<button type="submit" name="editproperty" class="btn-save">&#10004; Update</button>
		</form>
	</div>
</div>

<!-- Delete -->
<div id="delete_<?php echo $prow['id']; ?>" style="display:none;">
	<div class="padded warning center" style="min-width: 20vw;">
		<h4>&#9888; Delete Property</h4>
		<p>You are about to delete<br /><span class="larger heavy"><?php echo $prow; ?></span><br /><br /></p>
		<a href="action_delete_property.php?id=<?php echo $prow['id']; ?>" class="del-btn"><i class="bi bi-delete"></i> Delete</a>
	</div>
</div>