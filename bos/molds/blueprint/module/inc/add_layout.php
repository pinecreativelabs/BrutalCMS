<!-- Add New Layout -->
<div style="display:none;" id="addnew">
	<div class="padded">
		<h4 class="modal-title addnew"><strong>New Layout</strong></h4>
		<form method="POST" action="action_new_blueprint.php">
			<input type="hidden" name="pup" value="layout" />
			<?php 
			$last_obj = $file->xpath('//layout[last()]');
			$last_lid1 = str_replace('bpl-','',$last_obj[0]['id']);
			$last_lid = (int) $last_lid1;
			$new_lid = 'bpl-'.($last_lid + 1); 
			?>
			<input type="hidden" name="id" value="<?php echo $new_lid;?>" />
			<div style="min-width: 80vw;">
				
				<div class="block-wrap"><div class="block bw60 xs-100 sm-100 md-100">
						<div class="form-group">
							<span class="label">Title:</span><br /><input type="text" name="title" /><br />
							<span class="label">Description:</span><br /><textarea name="desc" rows="2"></textarea>
						</div>
					</div><div class="block bw40 xs-100 sm-100 md-100">
						<div class="form-group">	
							<span class="label">Layout Method</span><br />
							<select name="method">
								<option value="b3grid">B3Grid</option>
								<option value="bootstrap">Bootstrap</option>
								<option value="bento">Bento</option>
								<option value="cssgrid">CSS Grid</option>
								<option value="print">Print</option>
								<option value="other">Other</option>
							</select>
						</div>
						<div class="form-group">
							<span class="label"><input type="checkbox" name="active" value="true" checked="checked" /> active</span>
						</div>
					</div>
				</div>
				
			
				<!--
				<div class="block-wrap">
					<div class="block bw20 xs-100 sm-100 md-100">
						<div class="form-group">
							<label>Columns:</label><br />
							<input type="number" name="cols" min="1" step="1" />
						</div>
					</div>
					<div class="block bw20 xs-100 sm-100 md-100">
						<div class="form-group">
							<label>Rows:</label><br />
							<input type="number" name="rows" min="1" step="1" />
						</div>
					</div>
					<div class="block bw33 xs-100 sm-100 md-100">
						<div class="form-group">
							<label>Columns</label> <small>(horizontal widths)</small>
							<div class="brick-wrap">
								<div class="brick bw50"><small>width</small><br /><input type="number" name="width" min="1" step="1" /></div>
								<div class="brick bw50">
									<small>x-unit</small><br />
									<select name="x-unit">
										<option value="px">px</option>
										<option value="%">%</option>
										<option value="em">em</option>
										<option value="rem">rem</option>
										<option value="vw">vw</option>
										<option value="vh">vh</option>
										<option value="cm">cm</option>
									</select>
								</div>
								<div class="brick"><small>min-width</small><br /><input type="number" name="min-width" min="1" step="1" /></div>
								<div class="brick"><small>max-width</small><br /><input type="number" name="max-width" min="1" step="1" /></div>
							</div>
						</div>
					</div>
					<div class="block bw33 xs-100 sm-100 md-100">
						<div class="form-group">
							<label>Rows</label> <small>(vertical heights)</small>
							<div class="brick-wrap">
								<div class="brick bw50"><small>height</small><br /><input type="number" name="height" min="1" step="1" /></div>
								<div class="brick bw50">
									<small>y-unit</small><br />
									<select name="y-unit">
										<option value="px">px</option>
										<option value="%">%</option>
										<option value="em">em</option>
										<option value="rem">rem</option>
										<option value="vw">vw</option>
										<option value="vh">vh</option>
										<option value="cm">cm</option>
									</select>
								</div>
								<div class="brick"><small>min-height</small><br /><input type="number" name="min-height" value="<?php echo $row->column['min-height']; ?>" min="1" step="1" /></div>
								<div class="brick"><small>max-height</small><br /><input type="number" name="max-height" value="<?php echo $row->column['max-height']; ?>" min="1" step="1" /></div>
							</div>
						</div>
					</div>
					<div class="block bw33 xs-100 sm-100 md-100">
						<div class="form-group">
							<label>Column Classes</label><br /><small>ex: <em>col custom-class</em></small><br />
							<input type="text" name="col-classes" />
						</div>
						<div class="form-group">
							<label>Rule Classes</label><br /><small>ex: <em>hide-on-mobile show-on-tablet</em></small><br />
							<input type="text" name="rule-classes" />
						</div>
					</div>
					<div class="block bw100">
						<label>Responsive Rules</label>
						<div class="brick-wrap">
							<div class="brick"><div class="form-group">
								XXS <small>(wearables)</small><br />
								<input type="number" name="xxs" min="1" step="1" />
							</div></div>
							<div class="brick"><div class="form-group">
								XS <small>(small mobile)</small><br />
								<input type="number" name="xs" min="1" step="1" />
							</div></div>
							<div class="brick"><div class="form-group">
								SM <small>(mobile)</small><br />
								<input type="number" name="sm" min="1" step="1" />
							</div></div>
							<div class="brick"><div class="form-group">
								MD <small>(tablets)</small><br />
								<input type="number" name="md" min="1" step="1" />
							</div></div>
							<div class="brick"><div class="form-group">
								LG <small>(laptops)</small><br />
								<input type="number" name="lg" min="1" step="1" />
							</div></div>
							<div class="brick"><div class="form-group">
								XL <small>(desktops)</small><br />
								<input type="number" name="xl" min="1" step="1" />
							</div></div>
							<div class="brick"><div class="form-group">
								XXL <small>(tvs)</small><br />
								<input type="number" name="xxl" min="1" step="1" />
							</div></div>
						</div>
					</div>
				</div>-->
				
			</div>
			<button type="submit" name="add" class="btn-save">&#10004; Save</button>
		</form>
	</div>
</div>