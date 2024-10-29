<!-- Add Page -->
<div style="display:none;" id="addnew"><div class="padded">
	<h4 class="modal-title addnew"><strong>New Page</strong></h4>
	<form method="POST" action="action_new_page.php">
		<input type="hidden" name="id" value="<?php echo ($file->page->count()+1).date('dhis');?>" />
		<input type="hidden" name="author" value="<?php echo $_SESSION['userName'];?>" />
		<input type="hidden" name="lastmod" value="<?php echo date('Y-m-dTH:i:sP', time()); ?>" />
		<input type="hidden" name="generated" value="0" />
		<?php if($pages_location=='base'){ ?>
		<input type="hidden" name="burl" value="<?php echo $bdir;?>" />
		<?php } else { ?>
		<input type="hidden" name="burl" value="<?php echo $bosdir;?>" />
		<?php } ?>
		<div style="min-width: 80vw;">
			<div class="tabs">
				<input type="radio" name="newpage" id="tab1np" checked="checked">
				<label for="tab1np">General</label>
				<div class="tab">
					<div class="block-wrap"><div class="block bw60 xs-100 sm-100 md-100">
						<div class="form-group">
							<span class="label">Title</span><br /><input type="text" name="title" />
						</div>
						<div class="form-group">
							<span class="label">Description</span><br /><textarea name="desc" rows="4"></textarea>
						</div>
					</div><div class="block bw40 xs-100 sm-100 md-100">
						<div class="form-group">
							<span class="label"><input type="checkbox" name="active" value="true" checked="checked" /> active</span>
						</div>
						<div class="form-group">
							<span class="label"><input type="checkbox" name="reqlogin" value="true" /> password protected</span>
						</div>
					</div></div>
				</div>
				<!-- Options Tab -->
				<input type="radio" name="newpage" id="tab2np">
				<label for="tab2np">Options</label>
				<div class="tab">
					<div class="block-wrap">
						<div class="block bw50 xs-100 sm-100 md-100">
							<div class="form-group">	
								<span class="label">Page Group</span><br />
								<select name="pggroup">
								<?php foreach($pggroup->pagegroup as $pggrow){ ?>
									<option value="<?php echo $pgggrow['title'];?>"><?php echo $pggrow['title'];?></option>
								<?php } ?>
								</select>
							</div>
							<div class="form-group">	
								<span class="label">Type</span><br />
								<select name="type">
									<option value="public">Public</option>
									<option value="private">Private</option>
									<option value="hidden">Hidden</option>
									<option value="system">System</option>
								</select>
							</div>
							<div class="form-group">
								<span class="label"><input type="checkbox" name="sitemap" value="1" /> exclude from sitemap</span>
							</div>
						</div><div class="block bw50 xs-100 sm-100 md-100">
							<div class="form-group">	
								<span class="label">Change Frequency</span><br />
								<select name="changefreq">
									<option value="always">Always</option>
									<option value="hourly">Hourly</option>
									<option value="daily">Daily</option>
									<option value="weekly">Weekly</option>
									<option value="monthly">Monthly</option>
									<option value="never">Never</option>
								</select>
							</div>
							<div class="form-group">	
								<span class="label">Priority</span><br />
								<select name="priority">
									<option value="unset">[unset]</option>
									<option value="0.0">Unimportant</option>
									<option value="0.3">Low</option>
									<option value="0.5">Normal</option>
									<option value="0.8">High</option>
									<option value="1.0">Important</option>
								</select>
							</div>
						</div>
					</div>
				</div>
				<!-- Design Tab -->
				<input type="radio" name="newpage" id="tab3np">
				<label for="tab3np">Design</label>
				<div class="tab">
					<div class="block-wrap">
						<div class="block bw50 xs-100 sm-100 md-100">
							<div class="form-group">
								<span class="label">Layout</span><br />
								<select name="layout">
									<option value="0">None</option>
								<?php foreach($layoutfile->layout as $lrow){ ?>
									<option value="<?php echo $lrow['id'];?>"><?php echo $lrow['title'];?></option>
								<?php }?>
								</select>
							</div>
						</div><div class="block bw50 xs-100 sm-100 md-100">
							<div class="form-group">
								<span class="label">Theme</span><br />
								<select name="theme">
									<option value="0">None</option>
								<?php foreach($themefile->theme as $trow){ ?>
									<option value="<?php echo $trow['id'];?>"><?php echo $trow['title'];?></option>
								<?php }?>
								</select>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<button type="submit" name="add" class="btn-save">&#10004; Save</button>
	</form>
</div></div>