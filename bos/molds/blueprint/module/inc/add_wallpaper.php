<!-- Add New Wallpaper Group -->
<div style="display:none;" id="add">
	<div class="padded">
		<h4 class="modal-title addnew"><strong>New Wallpaper</strong></h4>
		<form method="POST" action="action_new_blueprint.php">
			<input type="hidden" name="pup" value="wallpaper" />
			<?php 
			$last_wp = $file->xpath('//wallpaper[last()]');
			$last_wpid1 = str_replace('bpw-','',$last_wp[0]['id']);
			$last_wpid = (int) $last_wpid1;
			$new_wpid = 'bpw-'.($last_wpid + 1); 
			?>
			<input type="hidden" name="id" value="<?php echo $new_wpid;?>" />
			<div style="min-width: 80vw;">
				<div class="block-wrap">
					<div class="block bw60 xs-100 sm-100 md-100">
						<span class="label">Title:</span><br /><input type="text" name="title" />
					</div><div class="block bw40 xs-100 sm-100 md-100">
						<div class="form-group">
							<span class="label"><input type="checkbox" name="active" value="true" checked="checked" /> active</span>
						</div>
					</div><div class="block bw100">
						<div class="form-group">
							<span class="label">Image URL:</span><br /><input type="url" name="wp-url" />
						</div>
					</div><div class="block bw50 xs-100 sm-100 md-100">
						<div class="form-group">
							<span class="label">Background Size</span><br />
							<select name="size">
								<option value="cover" selected>cover</option>
								<option value="contain">contain</option>
								<option value="auto">auto</option>
							</select><br />
							<span class="label">Background Position</span><br />
							<select name="position">
								<option value="left top">left top</option>
								<option value="left center">left center</option>
								<option value="left bottom">left bottom</option>
								<option value="right top">right top</option>
								<option value="right center">right center</option>
								<option value="right bottom">right bottom</option>
								<option value="center top">center top</option>
								<option value="center center" selected>center center</option>
								<option value="center bottom">center bottom</option>
							</select>
						</div>
					</div><div class="block bw50 xs-100 sm-100 md-100">
						<div class="form-group">
							<span class="label">Background Repeat</span><br />
							<select name="repeat">
								<option value="no-repeat" selected>no repeat</option>
								<option value="repeat">repeat</option>
								<option value="repeat-x">repeat-x</option>
								<option value="repeat-y">repeat-y</option>
								<option value="space">space</option>
								<option value="round">round</option>
							</select><br />
							<span class="label"><input type="checkbox" name="attach" value="1" /> fix background position</span>
						</div>
					</div>
				</div>
			</div>
			<button type="submit" name="add" class="btn-save">&#10004; Save</button>
		</form>
	</div>
</div>