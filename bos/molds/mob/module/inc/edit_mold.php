<!-- Edit Mold -->
<div style="display:none;" id="edit_<?php echo $row['id']; ?>">
	<div class="padded">
		<h4 class="modal-title addnew"><strong>Edit Mold</strong></h4>
		<?php if($ofc<=0){echo '<div class="warningbox">No objects available. Create an object before creating a new mold.</div>';}else{?>
		<form method="POST" action="action_update_mob.php">
			<input type="hidden" name="pup" value="editmold"/>
			<input type="hidden" name="id" value="<?php echo $row['id'];?>" />
			<div style="min-width: 80vw;"><div class="tabs">
				<input type="radio" name="editmold" id="tab1-<?php echo $row['id'];?>" checked="checked">
				<label for="tab1-<?php echo $row['id'];?>">General</label>
				<div class="tab"><div class="block-wrap">
					<div class="block bw50 xs-100 sm-100 md-100">
						<div class="form-group">
							<span class="label">Title:</span><?php if($row['gem']=='1'){echo $row['title'];} else {?><br />
							<input type="text" name="title" value="<?php echo $row['title'];?>"/><?php } ?><br />
							<span class="label">Description:</span><br />
							<textarea name="desc" rows="2"><?php echo $row->desc;?></textarea>
						</div>
					</div><div class="block bw50 xs-100 sm-100 md-100">
						<div class="form-group">
							<span class="label"><input type="checkbox" name="active" value="true" checked="checked" /> active</span>
						</div>
						<div class="form-group">	
							<span class="label">Content Type</span><br />
							<div id="ct-<?php echo $row['id'];?>">
								<?php echo $content_type_selector;?><br />
							</div>
							<script>
								var temp = "<?php echo $row['type'];?>";
								var mySelect = document.querySelector('#ct-<?php echo $row['id'];?> select');
								for(var i, j = 0; i = mySelect.options[j]; j++) {
									if(i.value == temp) {
										mySelect.selectedIndex = j;
										break;
									}
								}
							</script>
							<span class="label">Element Type</span><br />
							<div id="ect-<?php echo $row['id'];?>">
							<?php echo $element_type_selector;?>
							</div>
							<script>
								var temp = "<?php echo $row['etype'];?>";
								var mySelect = document.querySelector('#ect-<?php echo $row['id'];?> select');
								for(var i, j = 0; i = mySelect.options[j]; j++) {
									if(i.value == temp) {
										mySelect.selectedIndex = j;
										break;
									}
								}
							</script>
						</div>
					</div>
				</div></div>
				<input type="radio" name="editmold" id="tab2-<?php echo $row['id'];?>">
				<label for="tab2-<?php echo $row['id'];?>">Objects</label>
				<div class="tab">
					<small style="color: #333;">Select all objects to be included in this mold:</small><br />
					<div class="form-group"><ul class="checkbox-group">
					<?php 
					foreach($objects->object as $this_ocrow){ if($this_ocrow['active']=='true'){if($this_ocrow['id']!='mo-0'){
						if(in_array($this_ocrow['id'],$newmoarray)){
							echo '<li><input type="checkbox" name="mos[]" value="'.$this_ocrow['id'].'" checked />'.$this_ocrow['title'].'</li>';
						} else {
						echo '<li><input type="checkbox" name="mos[]" value="'.$this_ocrow['id'].'" />'.$this_ocrow['title'].'</li>';
					}}}}
					?>
					</ul></div>
				</div>
				<input type="radio" name="editmold" id="tab3-<?php echo $row['id'];?>">
				<label for="tab3-<?php echo $row['id'];?>">Boards</label>
				<div class="tab">
					<small style="color: #333;"><strong>OPTIONAL:</strong> Select all boards to be associated with this mold:</small><br />
					<?php if($bfc<=0){echo 'div class="warningbox">No boards available.</div>';}else {?>
					<div class="form-group"><ul class="checkbox-group">
					<?php 
					foreach($boards->board as $this_bcrow){ if($this_bcrow['active']=='true'){if($this_bcrow['id']!='mob-0'){
						if(in_array($this_bcrow['id'],$newmbarray)){
							echo '<li><input type="checkbox" name="mob[]" value="'.$this_bcrow['id'].'" checked />'.$this_bcrow['title'].'</li>';
						} else {
						echo '<li><input type="checkbox" name="mob[]" value="'.$this_bcrow['id'].'" />'.$this_bcrow['title'].'</li>';
					}}}}
					?>
					</ul></div>
					<?php }?>
				</div>
				<input type="radio" name="editmold" id="tab4-<?php echo $row['id'];?>">
				<label for="tab4-<?php echo $row['id'];?>">Classes</label>
				<div class="tab">
					<small style="color: #333;"><strong>OPTIONAL:</strong> Enter classes to be applied to this mold:</small><br />
					<textarea name="classes" rows="2"><?php echo $row->classes;?></textarea>
				</div>
			</div></div>
			<button type="submit" name="editmold" class="btn-save">&#10004; Save</button>
		</form><?php } ?>
	</div>
</div>

<?php if($row['gem']=='0'){?>
<!-- Generate MOLD -->
<div style="display:none;" id="gen_<?php echo $row['id']; ?>">
	<div class="padded">
		<h4 class="modal-title edit"><strong>Generate Mold</strong></h4>
		<form method="POST" action="action_generate_mold.php">
			<input type="hidden" name="id" value="<?php echo $row['id'];?>" />
			<input type="hidden" name="generated" value="1" />
			<input type="hidden" name="title" value="<?php echo $row['title'];?>" />
			<input type="hidden" name="handle" value="<?php echo strtolower(str_replace(' ','_',$row['title']));?>" />
			<input type="hidden" name="etype" value="<?php echo $row['etype'];?>" />
			<input type="hidden" name="type" value="<?php echo $row['type'];?>" />
			<input type="hidden" name="boards" value="<?php echo $row->boards;?>" />
			<input type="hidden" name="objects" value="<?php echo $row->objects;?>" />
			<input type="hidden" name="active" value="<?php echo $row['active'];?>" />
			
			<div style="min-width: 80vw;">
				<div class="block-wrap">
					<div class="block bw100">
						<div class="form-group">
							<span class="label">Mode:</span>
							<select name="genmode">
								<option value="v" selected>Virtual MOLD</option>
								<option value="f">Full MOLD</option>
							</select>
						</div>
						<p style="color: #333;"><strong>Virtual MOLD</strong></p>
					</div>
				</div>
			</div>
			<button type="submit" name="gem" class="btn-save">&#128171; Generate</button>
		</form>
	</div>
</div>
<?php } ?>