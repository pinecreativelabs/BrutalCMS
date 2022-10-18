
<!-- Add New Article -->
<div style="display:none;" id="addnew">
	<div class="padded">
		<h4 class="modal-title addnew"><strong>New Article</strong></h4>
		<form method="POST" action="action_new_article.php">
			<input type="hidden" name="aid" value="<?php echo ($file->article->count()+1).date('dhis');?>" />
			<input type="hidden" name="user" value="<?php echo $_SESSION['userName']; ?>" />
			<div style="min-width: 80vw;"><div class="block-wrap">
				<div class="block bw67 xs-100 sm-100 md-100">
					<div class="form-group">
						<label>Title:</label><br />
						<input type="text" name="title" />
					</div>
					<div class="form-group">
						<label>PIC:</label> <small><em>(Image URL)</em></small><br />
						<input type="url" name="pic" />
					</div>
					<div class="form-group">
						<label>LINK:</label><br />
						<input type="url" name="url" />
					</div>
					<div class="form-group">	
						<label for="target">Link Target</label>
						<select name="target">
							<option value="_blank">New Window</option>
							<option value="_self">Same Window</option>
							<option value="_parent">Parent Window</option>
						</select>
					</div>
				</div>
				<div class="block bw33 xs-100 sm-100 md-100">
					<div class="form-group">	
						<label for="tag">Topic</label>
						<select name="tag">
							<?php $trow1 = 0;
								$skip_row_number = array("1");
								if (($handletopix1 = fopen($cadtopixpath, 'r')) !== FALSE) {
									while (($pdata = fgetcsv($handletopix1, 1000, ",")) !== FALSE) {
										$trow1++;
										if (in_array($trow1, $skip_row_number)){continue;} else { ?>
										<option value="<?php echo $pdata[1]; ?>"><?php echo $pdata[1]; ?></option>
										<?php }
									} fclose($handletopix1);
								}
							?>
						</select>
					</div>
					<div class="form-group">
						<label>DIP:</label> <small><em>(Date of Initial Post)</em></small><br />
						<input type="date" name="dip" />
					</div>
					<div class="form-group">
						<label>Expires:</label> <small><em>(optional)</em></small><br />
						<input type="date" name="dep" />
					</div>
					<div class="form-group">
						<span class="label">Active</span><br />
						<input type="radio" name="active" value="true" /> true &nbsp;|&nbsp;
						<input type="radio" name="active" value="false" /> false 
					</div>
				</div>
				<div class="block bw100">
					<div class="form-group">
						<label>Content</label>
						<textarea name="content"></textarea>
					</div>
				</div>

			</div></div>

			<button type="submit" name="add" class="btn-save">&#10004; Save</button>
		</form>
	</div>
</div>