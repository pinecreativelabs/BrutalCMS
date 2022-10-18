<!-- Add Page -->
<div style="display:none;" id="addnew">
	<div class="padded">
		<h4 class="modal-title addnew"><strong>New Page</strong></h4>
		<form method="POST" action="action_new_page.php">
			<input type="hidden" name="id" value="<?php echo $new_pgid; ?>" />
			<input type="hidden" name="author" value="<?php echo $_SESSION['userName'];?>" />
			<input type="hidden" name="lastmod" value="<?php echo date('Y-m-dTH:i:sP', time()); ?>" />
			<input type="hidden" name="generated" value="0" />
			<div style="min-width: 80vw;">
				<div class="block-wrap">
					<div class="block bw50 xs-100 sm-100 md-100">
						<div class="form-group">
							<label>Title</label><br />
							<input type="text" name="title" />
						</div>
						<div class="form-group">
							<label>Canonical URL</label><br />
							<?php if($pgs_loc=='base'){ ?>
							<input type="hidden" name="burl" value="<?php echo $bdir;?>" />
							<small><?php echo $bdir;?></small><br /><?php } else { ?>
							<input type="hidden" name="burl" value="<?php echo $bosdir;?>" />
							<small><?php echo $bosdir;?></small><br /><?php } ?>
							<input type="text" name="canurl" />
						</div>
						<div class="form-group">
							<label>Description</label>
							<textarea name="desc"></textarea>
						</div>
					</div>
					<div class="block bw25 xs-100 sm-100 md-100">
						<div class="form-group">	
							<label>Page Group</label><br />
							<select name="pggroup">
							<?php foreach($pggroup->pagegroup as $pggrow){ ?>
								<option value="<?php echo $pgggrow['title'];?>"><?php echo $pggrow['title'];?></option>
							<?php } ?>
							</select>
						</div>
						<div class="form-group">	
							<label>Type</label><br />
							<select name="type">
								<option value="public">Public</option>
								<option value="private">Private</option>
								<option value="hidden">Hidden</option>
								<option value="system">System</option>
							</select>
						</div>
						<div class="form-group">
							<label>Layout</label><br />
							<select name="layout">
								<option value="0">None</option>
							<?php foreach($layoutfile->layout as $lrow){ ?>
								<option value="<?php echo $lrow['title'];?>"><?php echo $lrow['title'];?></option>
							<?php }?>
							</select>
						</div>
						<div class="form-group">
							<label>Theme</label><br />
							<select name="theme">
								<option value="0">None</option>
							<?php foreach($themefile->theme as $trow){ ?>
								<option value="<?php echo $trow['title'];?>"><?php echo $trow['title'];?></option>
							<?php }?>
							</select>
						</div>
					</div>
					<div class="block bw25 xs-100 sm-100 md-100">
						<div class="form-group">
							<span class="label">Sitemap</span><br />
							<input type="radio" name="sitemap" value="1" /> include &nbsp;|&nbsp;
							<input type="radio" name="sitemap" value="0" /> omit 
						</div>
						<div class="form-group">	
							<label>Priority</label><br />
							<select name="priority">
								<option value="unset">[unset]</option>
								<option value="0.0">Unimportant</option>
								<option value="0.3">Low</option>
								<option value="0.5">Normal</option>
								<option value="0.8">High</option>
								<option value="1.0">Important</option>
							</select>
						</div>
						<div class="form-group">	
							<label>Change Frequency</label><br />
							<select name="changefreq">
								<option value="always">Always</option>
								<option value="hourly">Hourly</option>
								<option value="daily">Daily</option>
								<option value="weekly">Weekly</option>
								<option value="monthly">Monthly</option>
								<option value="never">Never</option>
							</select>
						</div>
					</div>
				</div>
			</div>
			<button type="submit" name="add" class="btn-save">&#10004; Save</button>
		</form>
	</div>
</div>