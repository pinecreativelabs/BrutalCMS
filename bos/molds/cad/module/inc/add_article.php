
<!-- Add New Article -->
<div style="display:none;" id="addnew">
	<div class="padded">
		<h4 class="modal-title addnew"><strong>New Article</strong></h4>
		<form method="POST" action="action_new_article.php">
			<input type="hidden" name="aid" value="<?php echo ($file->article->count()+1).date('dhis');?>" />
			<input type="hidden" name="user" value="<?php echo $_SESSION['userName']; ?>" />
			<input type="hidden" name="cdpath" value="<?php echo $droot_bos.'/molds/cad/module/data/articles/';?>" />
			<div style="min-width: 80vw;">
				<div class="tabs">
					<input type="radio" name="newarticle" id="tab1" checked="checked">
					<label for="tab1">General</label>
					<div class="tab">
						<div class="block-wrap">
							<div class="block bw67 xs-100 sm-100 md-100">
								<div class="form-group">
									<span class="label">Title:</span><br />
									<input type="text" name="title" />
								</div>
								<div class="form-group">
									<span class="label">Cover Image:</span> <small><em>(enter full URL)</em></small><br />
									<input type="url" name="pic" />
								</div>
								<div class="form-group">
									<span class="label">LINK:</span> <small><em>(optional)</em></small><br />
									<input type="url" name="url" />
								</div>
							</div>
							<div class="block bw33 xs-100 sm-100 md-100">
								<div class="form-group">	
									<span class="label">Category</span>
									<?php echo $cadcat_selector;?>
								</div>
								<div class="form-group">	
									<span class="label">Tag</span><br />
									<?php echo $cadtag_selector;?>
								</div>
							</div>
						</div>
					</div>
					<!-- settings tab -->
					<input type="radio" name="newarticle" id="tab2">
					<label for="tab2">Settings</label>
					<div class="tab">
						<div class="block-wrap"><div class="block bw50 xs-100 sm-100 md-100">
							<div class="form-group">
								<span class="label"><input type="checkbox" name="active" value="true" checked="checked" /> active</span>
							</div>
						</div><div class="block bw50 xs-100 sm-100 md-100">
							<div class="form-group">	
								<span class="label">Link Target</span><br />
								<select name="target">
									<option value="_blank">New Window</option>
									<option value="_self">Same Window</option>
									<option value="_parent">Parent Window</option>
								</select>
							</div>
						</div><div class="block bw50 xs-100 sm-100 md-100">
							<div class="form-group">
								<span class="label">DIP:</span> <small><em>(Date of Initial Post)</em></small><br />
								<input type="date" name="dip" />
							</div>
						</div><div class="block bw50 xs-100 sm-100 md-100">
							<div class="form-group">
								<span class="label">Expires:</span> <small><em>(optional)</em></small><br />
								<input type="date" name="dep" />
							</div>
						</div></div>
					</div>
					<!-- content tab -->
					<input type="radio" name="newarticle" id="tab3">
					<label for="tab3">Content</label>
					<div class="tab">
						<div class="form-group">
							<span class="label">Content</span><br />
							<textarea name="content" rows="5"></textarea>
						</div>
					</div>
				</div>
			</div>

			<button type="submit" name="add" class="btn-save">&#10004; Save</button>
		</form>
	</div>
</div>