<!-- Add New Wallpaper Group -->
<div style="display:none;" id="addwpg">
	<div class="padded">
		<h4 class="modal-title addnew"><strong>New Wallpaper Group</strong></h4>
		<form method="POST" action="action_new_blueprint.php">
			<input type="hidden" name="pup" value="wpgroup" />
			<?php 
			$last_wpg = $wallpapergroups->xpath('//wallpapergroup[last()]');
			$last_wpgid1 = str_replace('bpwg-','',$last_wpg[0]['id']);
			$last_wpgid = (int) $last_wpgid1;
			$new_wpgid = 'bpwg-'.($last_wpgid + 1); 
			?>
			<input type="hidden" name="id" value="<?php echo $new_wpgid;?>" />
			<div style="min-width: 80vw;">
				<div class="block-wrap">
					<div class="block bw100">
						<div class="form-group">
							<span class="label">Title:</span><br /><input type="text" name="title" />
						</div>
						<div class="form-group"><span class="label">Group Type</span><br />
						<select name="grouptype">
							<option value="class" selected>class</option>
							<option value="slideshow">slideshow</option>
						</select></div>
						<div class="form-group">
							<span class="label"><input type="checkbox" name="active" value="true" checked="checked" /> active</span>
						</div>
					</div>
				</div>
			</div>
			<button type="submit" name="addgroup" class="btn-save">&#10004; Save</button>
		</form>
	</div>
</div>