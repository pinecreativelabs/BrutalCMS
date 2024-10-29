<div class="block-wrap"><div class="block bw50 xs-100 sm-100 md-100">
	<?php if($row['method']=='bootstrap'){ 
		$setnuminput='min="1" step="1" max="12"';}elseif($row['method']=='b3grid'){
		$setnuminput='min="0" step="5" max="100"';}else{$setnuminput='min="0" step="1" max="100"';}
	?>
	<div class="form-group"><div class="brick-wrap">
		<?php if(($row['method']=='b3grid')||($row['method']=='other')){?>
		<div class="brick"><strong>XXS</strong><br /><small>(wearables)</small><br />
			<input type="number" name="xxs" value="<?php echo $row->rules['xxs']; ?>" <?php echo $setnuminput;?> />
		</div><?php } ?>
		<div class="brick"><strong>XS</strong><br /><small>(small mobile)</small><br />
			<input type="number" name="xs" value="<?php echo $row->rules['xs']; ?>" <?php echo $setnuminput;?> />
		</div><div class="brick"><strong>SM</strong><br /><small>(mobile)</small><br />
			<input type="number" name="sm" value="<?php echo $row->rules['sm']; ?>" <?php echo $setnuminput;?> />
		</div><div class="brick"><strong>MD</strong><br /><small>(tablets)</small><br />
			<input type="number" name="md" value="<?php echo $row->rules['md']; ?>" <?php echo $setnuminput;?> />
		</div><div class="brick"><strong>LG</strong><br /><small>(laptops)</small><br />
			<input type="number" name="lg" value="<?php echo $row->rules['lg']; ?>" <?php echo $setnuminput;?> />
		</div><div class="brick"><strong>XL</strong><br /><small>(desktops)</small><br />
			<input type="number" name="xl" value="<?php echo $row->rules['xl']; ?>" <?php echo $setnuminput;?> />
		</div>
		<?php if(($row['method']=='b3grid')||($row['method']=='other')){?>
		<div class="brick"><strong>XXL</strong><br /><small>(tvs)</small><br />
			<input type="number" name="xxl" value="<?php echo $row->rules['xxl']; ?>" <?php echo $setnuminput;?> />
		</div><?php } ?>
	</div></div>
</div><div class="block bw50 xs-100 sm-100 md-100">
	<div class="form-group">
		<span class="label">Column Classes</span><br /><small>ex: <em>col custom-class</em></small><br />
		<input type="text" name="col-classes" value="<?php echo $row->column; ?>" />
	</div><div class="form-group">
		<span class="label">Rule Classes</span><br /><small>ex: <em>hide-on-mobile show-on-tablet</em></small><br />
		<input type="text" name="rule-classes" value="<?php echo $row->rules; ?>" />
	</div>
</div></div>