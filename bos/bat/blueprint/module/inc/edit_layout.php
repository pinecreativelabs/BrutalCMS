<!-- Edit Theme -->
<div style="display:none;" id="edit_<?php echo $row['id']; ?>">
	<div class="padded">
		<h4 class="modal-title edit"><strong>Edit <?php echo $row['title'];?></strong></h4>
		<form method="POST" action="action_update_layout.php">
			<input type="hidden" name="id" value="<?php echo $row['id'];?>" />
			<div style="min-width: 80vw;">
				<div class="block-wrap">
					<div class="block bw30 xs-100 sm-100 md-100">
						<div class="form-group">
							<label>Title:</label><br />
							<input type="text" name="title" value="<?php echo $row['title']; ?>" />
						</div>
					</div>
					<div class="block bw20 xs-100 sm-100 md-100">
						<div class="form-group">
							<label>Columns:</label><br />
							<input type="number" name="cols" value="<?php echo $row['cols']; ?>" min="1" step="1" />
						</div>
					</div>
					<div class="block bw20 xs-100 sm-100 md-100">
						<div class="form-group">
							<label>Rows:</label><br />
							<input type="number" name="rows" value="<?php echo $row['rows']; ?>" min="1" step="1" />
						</div>
					</div>
					<div class="block bw30 xs-100 sm-100 md-100">
						<div class="form-group">	
							<label for="method">Layout Method</label>
							<select name="method">
								<option value="b3grid" <?php echo ($row['method'] == 'b3grid') ? 'selected' : ''; ?>>B3Grid</option>
								<option value="bootstrap" <?php echo ($row['method'] == 'bootstrap') ? 'selected' : ''; ?>>Bootstrap</option>
								<option value="other" <?php echo ($row['method'] == 'other') ? 'selected' : ''; ?>>Other</option>
							</select>
						</div>
					</div>
				</div>
				<div class="block-wrap">
					<div class="block bw33 xs-100 sm-100 md-100">
						<div class="form-group">
							<label>Columns</label> <small>(horizontal widths)</small>
							<div class="brick-wrap">
								<div class="brick bw50"><small>width</small><br /><input type="number" name="width" value="<?php echo $row->column['width']; ?>" min="1" step="1" /></div>
								<div class="brick bw50">
									<small>x-unit</small><br />
									<select name="x-unit">
										<option value="px" <?php echo ($row->column['x-unit'] == 'px') ? 'selected' : ''; ?>>px</option>
										<option value="%" <?php echo ($row->column['x-unit'] == '%') ? 'selected' : ''; ?>>%</option>
										<option value="em" <?php echo ($row->column['x-unit'] == 'em') ? 'selected' : ''; ?>>em</option>
										<option value="rem" <?php echo ($row->column['x-unit'] == 'rem') ? 'selected' : ''; ?>>rem</option>
										<option value="vw" <?php echo ($row->column['x-unit'] == 'vw') ? 'selected' : ''; ?>>vw</option>
										<option value="vh" <?php echo ($row->column['x-unit'] == 'vh') ? 'selected' : ''; ?>>vh</option>
										<option value="cm" <?php echo ($row->column['x-unit'] == 'cm') ? 'selected' : ''; ?>>cm</option>
									</select>
								</div>
								<div class="brick"><small>min-width</small><br /><input type="number" name="min-width" value="<?php echo $row->column['min-width']; ?>" min="1" step="1" /></div>
								<div class="brick"><small>max-width</small><br /><input type="number" name="max-width" value="<?php echo $row->column['max-width']; ?>" min="1" step="1" /></div>
							</div>
						</div>
					</div>
					<div class="block bw33 xs-100 sm-100 md-100">
						<div class="form-group">
							<label>Rows</label> <small>(vertical heights)</small>
							<div class="brick-wrap">
								<div class="brick bw50"><small>height</small><br /><input type="number" name="height" value="<?php echo $row->column['height']; ?>" min="1" step="1" /></div>
								<div class="brick bw50">
									<small>y-unit</small><br />
									<select name="y-unit">
										<option value="px" <?php echo ($row->column['y-unit'] == 'px') ? 'selected' : ''; ?>>px</option>
										<option value="%" <?php echo ($row->column['y-unit'] == '%') ? 'selected' : ''; ?>>%</option>
										<option value="em" <?php echo ($row->column['y-unit'] == 'em') ? 'selected' : ''; ?>>em</option>
										<option value="rem" <?php echo ($row->column['y-unit'] == 'rem') ? 'selected' : ''; ?>>rem</option>
										<option value="vw" <?php echo ($row->column['y-unit'] == 'vw') ? 'selected' : ''; ?>>vw</option>
										<option value="vh" <?php echo ($row->column['y-unit'] == 'vh') ? 'selected' : ''; ?>>vh</option>
										<option value="cm" <?php echo ($row->column['y-unit'] == 'cm') ? 'selected' : ''; ?>>cm</option>
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
							<input type="text" name="col-classes" value="<?php echo $row->column; ?>" />
						</div>
						<div class="form-group">
							<label>Rule Classes</label><br /><small>ex: <em>hide-on-mobile show-on-tablet</em></small><br />
							<input type="text" name="rule-classes" value="<?php echo $row->rules; ?>" />
						</div>
					</div>
					<div class="block bw100">
						<label>Responsive Rules</label>
						<div class="brick-wrap">
							<div class="brick"><div class="form-group">
								XXS <small>(wearables)</small><br />
								<input type="number" name="xxs" value="<?php echo $row->rules['xxs']; ?>" min="1" step="1" />
							</div></div>
							<div class="brick"><div class="form-group">
								XS <small>(small mobile)</small><br />
								<input type="number" name="xs" value="<?php echo $row->rules['xs']; ?>" min="1" step="1" />
							</div></div>
							<div class="brick"><div class="form-group">
								SM <small>(mobile)</small><br />
								<input type="number" name="sm" value="<?php echo $row->rules['sm']; ?>" min="1" step="1" />
							</div></div>
							<div class="brick"><div class="form-group">
								MD <small>(tablets)</small><br />
								<input type="number" name="md" value="<?php echo $row->rules['md']; ?>" min="1" step="1" />
							</div></div>
							<div class="brick"><div class="form-group">
								LG <small>(laptops)</small><br />
								<input type="number" name="lg" value="<?php echo $row->rules['lg']; ?>" min="1" step="1" />
							</div></div>
							<div class="brick"><div class="form-group">
								XL <small>(desktops)</small><br />
								<input type="number" name="xl" value="<?php echo $row->rules['xl']; ?>" min="1" step="1" />
							</div></div>
							<div class="brick"><div class="form-group">
								XXL <small>(tvs)</small><br />
								<input type="number" name="xxl" value="<?php echo $row->rules['xxl']; ?>" min="1" step="1" />
							</div></div>
						</div>
					</div>
				</div>
			</div>

			<button type="submit" name="edit" class="btn-save">&#10004; Update</button>
		</form>
	</div>
</div>

<!-- Delete -->
<div id="delete_<?php echo $row['id']; ?>" style="display:none;">
	<div class="padded warning center" style="min-width: 20vw;">
		<h4>&#9888; Delete Record</h4>
		<p>You are about to delete<br />
		<span class="larger heavy"><?php echo $row['title']; ?></span><br /><br /></p>
		<a href="action_delete_layout.php?id=<?php echo $row['id']; ?>" class="del-btn"><i class="bi bi-delete"></i> Delete</a>
	</div>
</div>