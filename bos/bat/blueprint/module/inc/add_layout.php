<!-- Add New Layout -->
<div style="display:none;" id="addnew">
	<div class="padded">
		<h4 class="modal-title addnew"><strong>New Layout</strong></h4>
		<form method="POST" action="action_new_layout.php">
			<input type="hidden" name="id" value="<?php echo ($file->layout->count()+1).date('dhis'); ?>" />
			<div style="min-width: 80vw;">
				<div class="block-wrap">
					<div class="block bw30 xs-100 sm-100 md-100">
						<div class="form-group">
							<label>Title:</label><br />
							<input type="text" name="title" />
						</div>
					</div>
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
					<div class="block bw30 xs-100 sm-100 md-100">
						<div class="form-group">	
							<label for="method">Layout Method</label>
							<select name="method">
								<option value="b3grid">B3Grid</option>
								<option value="bootstrap">Bootstrap</option>
								<option value="other">Other</option>
							</select>
						</div>
					</div>
				</div>
				<div class="block-wrap">
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
				</div>
			</div>
			<button type="submit" name="add" class="btn-save">&#10004; Save</button>
		</form>
	</div>
</div>