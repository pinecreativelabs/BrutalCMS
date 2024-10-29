<!-- Edit Theme -->
<div style="display:none;" id="edit_<?php echo $row['id']; ?>">
	<div class="padded">
		<h4 class="modal-title edit"><strong>Edit <?php echo $row['title'];?></strong></h4>
		<form method="POST" action="action_update_blueprint.php">
			<input type="hidden" name="pup" value="layout" />
			<input type="hidden" name="id" value="<?php echo $row['id'];?>" />
			<div style="min-width: 80vw;"><div class="tabs">
				
				<input type="radio" name="editlayout" id="tab1-<?php echo $row['id'];?>" checked="checked">
				<label for="tab1-<?php echo $row['id'];?>">General</label>
				<div class="tab">
					<div class="block-wrap"><div class="block bw50 xs-100 sm-100 md-100">
						<div class="form-group">
							<span class="label">Title:</span><br /><input type="text" name="title" value="<?php echo $row['title']; ?>" /><br />
							<span class="label">Description:</span><br /><textarea name="desc" rows="2"><?php echo $row->desc;?></textarea>
						</div>
					</div><div class="block bw50 xs-100 sm-100 md-100">
						<div class="form-group">	
							<span class="label">Layout Method</span><br />
							<select name="method">
								<option value="b3grid" <?php echo ($row['method'] == 'b3grid') ? 'selected' : ''; ?>>B3Grid</option>
								<option value="bootstrap" <?php echo ($row['method'] == 'bootstrap') ? 'selected' : ''; ?>>Bootstrap</option>
								<option value="bento" <?php echo ($row['method'] == 'bento') ? 'selected' : ''; ?>>Bento</option>
								<option value="cssgrid" <?php echo ($row['method'] == 'cssgrid') ? 'selected' : ''; ?>>CSS Grid</option>
								<option value="print" <?php echo ($row['method'] == 'print') ? 'selected' : ''; ?>>Print</option>
								<option value="other" <?php echo ($row['method'] == 'other') ? 'selected' : ''; ?>>Other</option>
							</select>
						</div>
						<?php if($row['method']!='bento'){?>
						<div class="form-group">
							<div class="block-wrap">
								<div class="block bw50 xs-100 sm-100 md-100">
									<span class="label">Columns:</span><br />
									<input type="number" name="cols" value="<?php echo $row['cols']; ?>" min="1" step="1" <?php if($row['method']=='bootstrap'){ echo 'max="12"';}?> />
								</div>
								<div class="block bw50 xs-100 sm-100 md-100">
									<span class="label">Rows:</span><br />
									<input type="number" name="rows" value="<?php echo $row['rows']; ?>" min="1" step="1" />
								</div>
							</div>
						</div><?php } ?>
					</div></div>
				</div>
				
				<?php if(($row['method']=='b3grid')||($row['method']=='bootstrap')){?>
				<input type="radio" name="editlayout" id="tab2-<?php echo $row['id'];?>">
				<label for="tab2-<?php echo $row['id'];?>">Options</label>
				<div class="tab">
					<div class="block-wrap"><div class="block bw50 xs-100 sm-100 md-100">
							<div class="form-group">	
								<?php if($row['method']=='b3grid'){?>
								<span class="label">Layout Method</span><br />
								<select name="b3type">
									<option value="blocks" <?php echo ($row->b3grid['type'] == 'blocks') ? 'selected' : ''; ?>>Blocks</option>
									<option value="bricks" <?php echo ($row->b3grid['type'] == 'bricks') ? 'selected' : ''; ?>>Bricks</option>
									<option value="panes" <?php echo ($row->b3grid['type'] == 'panes') ? 'selected' : ''; ?>>Panes</option>
									<option value="tiles" <?php echo ($row->b3grid['type'] == 'tiles') ? 'selected' : ''; ?>>Tiles</option>
								</select><br /><?php } ?>	
								<span class="label">Container</span><br />
								<select name="b3contain">
									<option value="none" <?php echo ($row->b3grid['contain'] == 'none') ? 'selected' : ''; ?>>none</option>
									<option value="container" <?php echo ($row->b3grid['contain'] == 'container') ? 'selected' : ''; ?>>Standard</option>
									<option value="container-960" <?php echo ($row->b3grid['contain'] == 'container-960') ? 'selected' : ''; ?>>960px</option>
									<option value="container-1200" <?php echo ($row->b3grid['contain'] == 'container-1200') ? 'selected' : ''; ?>>1200px</option>
									<option value="container-1600" <?php echo ($row->b3grid['contain'] == 'container-1600') ? 'selected' : ''; ?>>1600px</option>
									<option value="container-fluid" <?php echo ($row->b3grid['contain'] == 'container-fluid') ? 'selected' : ''; ?>>Fluid</option>
								</select><br />
								<?php if($row['method']=='b3grid'){?>
								<span class="label">Direction</span><br />
								<select name="b3dir">
									<option value="row" <?php echo ($row->b3grid['dir'] == 'row') ? 'selected' : ''; ?>>Row (horizontal)</option>
									<option value="row-rev" <?php echo ($row->b3grid['dir'] == 'row-rev') ? 'selected' : ''; ?>>Row-Reverse</option>
									<option value="col" <?php echo ($row->b3grid['dir'] == 'col') ? 'selected' : ''; ?>>Column (vertical)</option>
									<option value="col-rev" <?php echo ($row->b3grid['dir'] == 'col-rev') ? 'selected' : ''; ?>>Column-Reverse</option>
								</select><?php } ?>
							</div>
						</div>
						<?php if($row['method']=='b3grid'){?>
						<div class="block bw50 xs-100 sm-100 md-100">
							<div class="form-group">	
								<span class="label">Align Horizontal</span><br />
								<select name="b3alignh">
									<option value="around" <?php echo ($row->b3grid['align-h'] == 'around') ? 'selected' : ''; ?>>Around</option>
									<option value="between" <?php echo ($row->b3grid['align-h'] == 'between') ? 'selected' : ''; ?>>Between</option>
									<option value="evenly" <?php echo ($row->b3grid['align-h'] == 'evenly') ? 'selected' : ''; ?>>Evenly</option>
								</select><br />
								<span class="label">Align Vertical</span><br />
								<select name="b3alignv">
									<option value="start" <?php echo ($row->b3grid['align-v'] == 'start') ? 'selected' : ''; ?>>Start</option>
									<option value="end" <?php echo ($row->b3grid['align-v'] == 'end') ? 'selected' : ''; ?>>End</option>
									<option value="middle" <?php echo ($row->b3grid['align-v'] == 'middle') ? 'selected' : ''; ?>>Middle</option>
									<option value="baseline" <?php echo ($row->b3grid['align-v'] == 'baseline') ? 'selected' : ''; ?>>Baseline</option>
									<option value="stretch" <?php echo ($row->b3grid['align-v'] == 'stretch') ? 'selected' : ''; ?>>Stretch</option>
								</select>
							</div>
						</div><?php } ?>
					</div>
				</div>
				<?php } elseif($row['method']=='bento'){ ?>
				<input type="radio" name="editlayout" id="tab2-<?php echo $row['id'];?>">
				<label for="tab2-<?php echo $row['id'];?>">Options</label>
				<div class="tab">
					<div class="block-wrap"><div class="block bw33 xs-100 sm-100 md-100">
						<div class="form-group">
							<span class="label">Balance Fillers</span><br />
							<select name="bento-bf">
								<option value="true" <?php echo ($row->bento['bf'] == 'true') ? 'selected' : ''; ?>>true</option>
								<option value="false" <?php echo ($row->bento['bf'] == 'false') ? 'selected' : ''; ?>>false</option>
							</select><br />
							<span class="label">Aspect Ratio</span><br />
							<select name="bento-ar">
								<option value="1" <?php echo ($row->bento['ar'] == '1') ? 'selected' : ''; ?>>1 (default)</option>
								<option value="2" <?php echo ($row->bento['ar'] == '2') ? 'selected' : ''; ?>>2</option>
								<option value="3" <?php echo ($row->bento['ar'] == '3') ? 'selected' : ''; ?>>3</option>
								<option value="4" <?php echo ($row->bento['ar'] == '4') ? 'selected' : ''; ?>>4</option>
								<option value="1/2" <?php echo ($row->bento['ar'] == '1/2') ? 'selected' : ''; ?>>1/2</option>
								<option value="1/3" <?php echo ($row->bento['ar'] == '1/3') ? 'selected' : ''; ?>>1/3</option>
								<option value="1/4" <?php echo ($row->bento['ar'] == '1/4') ? 'selected' : ''; ?>>1/4</option>
								<option value="9/16" <?php echo ($row->bento['ar'] == '9/16') ? 'selected' : ''; ?>>9/16</option>
							</select>
						</div>
					</div><div class="block bw33 xs-100 sm-100 md-100">
						<div class="form-group">
							<span class="label">Min Cell Width:</span><br />
							<input type="number" name="mincellwidth" value="<?php echo $row->bento['mcw']; ?>" min="0" step="1" /><br />
							<span class="label">Cell Gap:</span><br />
							<input type="number" name="cellgap" value="<?php echo $row->bento['cellgap']; ?>" min="0" step="1" />
						</div>
					</div><div class="block bw33 xs-100 sm-100 md-100">
						<div class="form-group">
							<span class="label">Columns:</span><br />
							<input type="number" name="bento-cols" value="<?php echo $row->bento['columns']; ?>" min="1" step="1" />
						</div>
					</div></div>
				</div>
				<?php } elseif($row['method']=='cssgrid'){?>
				<input type="radio" name="editlayout" id="tab2-<?php echo $row['id'];?>">
				<label for="tab2-<?php echo $row['id'];?>">Options</label>
				<div class="tab">
					<div class="block-wrap"><div class="block bw50 xs-100 sm-100 md-100">
						<div class="form-group">
							<span class="label">Flow:</span><br />
							<select name="gridflow">
								<option value="row" <?php echo ($row->cssgrid['flow'] == 'row') ? 'selected' : ''; ?>>Row</option>
								<option value="column" <?php echo ($row->cssgrid['flow'] == 'column') ? 'selected' : ''; ?>>Column</option>
								<option value="dense" <?php echo ($row->cssgrid['flow'] == 'dense') ? 'selected' : ''; ?>>Dense</option>
							</select><br />
							<span class="label">Column Gaps:</span><br />
							<input type="text" name="grid-gap" value="<?php echo $row->cssgrid['gaps'];?>" maxlength="11" size="11" style="max-width: 150px;" />
						</div>
					</div><div class="block bw50 xs-100 sm-100 md-100">
						<div class="form-group">
							<span class="label">Align Items:</span><br />
							<select name="css-ai">
								<option value="start" <?php echo ($row->cssgrid['place-items'] == 'start') ? 'selected' : ''; ?>>Start</option>
								<option value="end" <?php echo ($row->cssgrid['place-items'] == 'end') ? 'selected' : ''; ?>>End</option>
								<option value="center" <?php echo ($row->cssgrid['place-items'] == 'center') ? 'selected' : ''; ?>>Center</option>
								<option value="stretch" <?php echo ($row->cssgrid['place-items'] == 'stretch') ? 'selected' : ''; ?>>Stretch</option>
							</select><br />
							<span class="label">Align Content:</span><br />
							<select name="css-ac">
								<option value="start" <?php echo ($row->cssgrid['place-content'] == 'start') ? 'selected' : ''; ?>>Start</option>
								<option value="end" <?php echo ($row->cssgrid['place-content'] == 'end') ? 'selected' : ''; ?>>End</option>
								<option value="center" <?php echo ($row->cssgrid['place-content'] == 'center') ? 'selected' : ''; ?>>Center</option>
								<option value="stretch" <?php echo ($row->cssgrid['place-content'] == 'stretch') ? 'selected' : ''; ?>>Stretch</option>
								<option value="space-around" <?php echo ($row->cssgrid['place-content'] == 'space-around') ? 'selected' : ''; ?>>Space Around</option>
								<option value="space-between" <?php echo ($row->cssgrid['place-content'] == 'space-between') ? 'selected' : ''; ?>>Space Between</option>
								<option value="space-evenly" <?php echo ($row->cssgrid['place-content'] == 'space-evenly') ? 'selected' : ''; ?>>Space Evenly</option>
							</select><br />
						</div>
					</div></div>
				</div>
				<?php }else{}?>
				
				<?php if(($row['method']!='other')&&($row['method']!='print')){?>
				<input type="radio" name="editlayout" id="tab3-<?php echo $row['id'];?>">
				<label for="tab3-<?php echo $row['id'];?>">Layout</label>
				<div class="tab">
					<p>Select a layout preset:</p>
					<div class="block-wrap"><div class="block bw100">
						<?php include('preset-layout-list.php');?>
					</div></div>
				</div>
				<?php } else { ?>
				<input type="radio" name="editlayout" id="tab3-<?php echo $row['id'];?>">
				<label for="tab3-<?php echo $row['id'];?>">Layout</label>
				<div class="tab">
					<div class="block-wrap">
					<?php if($row['method']=='print'){?>
					<div class="block bw100"><div class="form-group">
						<span class="label">Paper Size</span><br />
						<?php include('paper-size-list.php');?>
					</div></div><?php } ?>
					<div class="block bw50 xs-100 sm-100 md-100">
						<div class="form-group">
							<span class="label">Column Width</span><?php if($row['method']=='print'){echo ' <small>Set to 0 for full-width.</small>';}?>
							<div class="brick-wrap">
								<div class="brick"><input type="number" name="width" value="<?php echo $row->column['width']; ?>" min="0" step="1" /></div>
								<div class="brick">
									<select name="x-unit" style="width: 80px;">
										<option value="px" <?php echo ($row->column['x-unit'] == 'px') ? 'selected' : ''; ?>>px</option>
										<?php if($row['method']!='print'){?>
										<option value="%" <?php echo ($row->column['x-unit'] == '%') ? 'selected' : ''; ?>>%</option>
										<option value="em" <?php echo ($row->column['x-unit'] == 'em') ? 'selected' : ''; ?>>em</option>
										<option value="rem" <?php echo ($row->column['x-unit'] == 'rem') ? 'selected' : ''; ?>>rem</option>
										<option value="vw" <?php echo ($row->column['x-unit'] == 'vw') ? 'selected' : ''; ?>>vw</option>
										<option value="vh" <?php echo ($row->column['x-unit'] == 'vh') ? 'selected' : ''; ?>>vh</option>
										<?php } else { ?>
										<option value="pt" <?php echo ($row->column['x-unit'] == 'pt') ? 'selected' : ''; ?>>pt</option>
										<option value="cm" <?php echo ($row->column['x-unit'] == 'cm') ? 'selected' : ''; ?>>cm</option>
										<option value="mm" <?php echo ($row->column['x-unit'] == 'mm') ? 'selected' : ''; ?>>mm</option>
										<option value="in" <?php echo ($row->column['x-unit'] == 'in') ? 'selected' : ''; ?>>in</option>
										<?php } ?>
									</select>
								</div>
							</div>
							<?php if($row['method']!='print'){?>
							<div class="brick-wrap">
								<div class="brick"><small>min-width</small><br /><input type="text" name="min-width" value="<?php echo $row->column['min-width']; ?>" min="1" step="1" /></div>
								<div class="brick"><small>max-width</small><br /><input type="text" name="max-width" value="<?php echo $row->column['max-width']; ?>" min="1" step="1" /></div>
							</div><?php } ?>
						</div>
					</div><div class="block bw50 xs-100 sm-100 md-100">
						<div class="form-group">
							<span class="label">Row Height</span><?php if($row['method']=='print'){echo ' <small>Set to 0 to ignore.</small>';}?>
							<div class="brick-wrap">
								<div class="brick"><input type="number" name="height" value="<?php echo $row->column['height']; ?>" min="0" step="1" /></div>
								<div class="brick">
									<select name="y-unit" style="width: 80px;">
										<option value="px" <?php echo ($row->column['y-unit'] == 'px') ? 'selected' : ''; ?>>px</option>
										<?php if($row['method']!='print'){?>
										<option value="%" <?php echo ($row->column['y-unit'] == '%') ? 'selected' : ''; ?>>%</option>
										<option value="em" <?php echo ($row->column['y-unit'] == 'em') ? 'selected' : ''; ?>>em</option>
										<option value="rem" <?php echo ($row->column['y-unit'] == 'rem') ? 'selected' : ''; ?>>rem</option>
										<option value="vw" <?php echo ($row->column['y-unit'] == 'vw') ? 'selected' : ''; ?>>vw</option>
										<option value="vh" <?php echo ($row->column['y-unit'] == 'vh') ? 'selected' : ''; ?>>vh</option>
										<?php } else { ?>
										<option value="pt" <?php echo ($row->column['y-unit'] == 'pt') ? 'selected' : ''; ?>>pt</option>
										<option value="cm" <?php echo ($row->column['y-unit'] == 'cm') ? 'selected' : ''; ?>>cm</option>
										<option value="mm" <?php echo ($row->column['y-unit'] == 'mm') ? 'selected' : ''; ?>>mm</option>
										<option value="in" <?php echo ($row->column['y-unit'] == 'in') ? 'selected' : ''; ?>>in</option>
										<?php } ?>
									</select>
								</div>
							</div>
							<?php if($row['method']!='print'){?>
							<div class="brick-wrap">
								<div class="brick"><small>min-height</small><br /><input type="text" name="min-height" value="<?php echo $row->column['min-height']; ?>" min="1" step="1" /></div>
								<div class="brick"><small>max-height</small><br /><input type="text" name="max-height" value="<?php echo $row->column['max-height']; ?>" min="1" step="1" /></div>
							</div><?php } ?>
						</div>
					</div></div>
				</div>
				<?php } ?>
				<?php if(($row['method']!='cssgrid')&&($row['method']!='bento')&&($row['method']!='print')){?>
				<input type="radio" name="editlayout" id="tab4-<?php echo $row['id'];?>">
				<label for="tab4-<?php echo $row['id'];?>">Responsive</label>
				<div class="tab">
					<?php include 'rrules.php';?>
				</div>
				<?php } ?>
			</div></div>
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