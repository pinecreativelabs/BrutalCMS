<!-- Generate Page -->
<div style="display:none;" id="generate_<?php echo $row['id']; ?>">
	<div class="padded">
		<h4 class="modal-title edit"><strong>Generate Page</strong></h4>
		<form method="POST" action="action_generate_page.php">
			<input type="hidden" name="id" value="<?php echo $row['id'];?>" />
			<input type="hidden" name="sitename" value="<?php echo $sitename;?>" />
			<input type="hidden" name="dateformat" value="<?php echo $ddf;?>" />
			<input type="hidden" name="timeformat" value="<?php echo $dtf;?>" />
			<input type="hidden" name="author" value="<?php echo $_SESSION['userName'];?>" />
			<input type="hidden" name="generated" value="1" />
			<input type="hidden" name="lastmod" value="<?php echo date('Y-m-dTH:i:sP', time()); ?>" />
			<input type="hidden" name="canurl" value="<?php echo $row->loc;?>" />
			<input type="hidden" name="pgsloc" value="<?php echo $pgs_loc;?>" />
			<?php 
			if((!empty($basedir))||($basedir!='')){ $urldir = $droot.'/'.$basedir.'/';} else { $urldir = $droot.'/';}
			if($pgs_loc == 'base'){ ?>
			<input type="hidden" name="loc" value="<?php echo str_replace($bdir,$urldir,$row->loc);?>.php" />
			<?php } else { ?>
			<input type="hidden" name="loc" value="<?php echo str_replace($bosdir,$urldir.'/bos/',$row->loc);?>.php" />
			<?php }?>
			<input type="hidden" name="title" value="<?php echo $row['title'];?>" />
			<input type="hidden" name="metatitle" value="<?php echo $row->metatitle;?>" />
			<input type="hidden" name="desc" value="<?php echo $row->metadesc;?>" />
			<input type="hidden" name="group" value="<?php echo $row['group'];?>" />
			<input type="hidden" name="type" value="<?php echo $row['type'];?>" />
			<input type="hidden" name="theme" value="<?php echo $row->design['theme'];?>" />
			<input type="hidden" name="layout" value="<?php echo $row->design['layout'];?>" />
			
			<div style="min-width: 80vw;">
				<div class="block-wrap">
					<div class="block bw33">
						<div class="form-group">
							<span class="label">Javascript</span><br /><br />Include jQuery:<br />
							<select name="incjquery">
								<option value="0" <?php echo ($row->generator['incjquery'] == '0') ? 'selected' : ''; ?>>no</option>
								<option value="1" <?php echo ($row->generator['incjquery'] == '1') ? 'selected' : ''; ?>>version 1</option>
								<option value="2" <?php echo ($row->generator['incjquery'] == '2') ? 'selected' : ''; ?>>version 2</option>
								<option value="3" <?php echo ($row->generator['incjquery'] == '3') ? 'selected' : ''; ?>>version 3</option>
							</select>
							<br /><br />
							JAB Library:<br />
							<select name="incjab">
								<option value="0" <?php echo ($row->generator['incjab'] == '0') ? 'selected' : ''; ?>>omit</option>
								<option value="1" <?php echo ($row->generator['incjab'] == '1') ? 'selected' : ''; ?>>full</option>
								<option value="2" <?php echo ($row->generator['incjab'] == '2') ? 'selected' : ''; ?>>light</option>
							</select><br /><br />
						</div>
					</div>
					<div class="block bw33 xs-100 sm-100 md-100">
						<div class="form-group">
							<span class="label">Theme &amp; Style</span><br /><br />
							<strong><em><?php if($row->design['theme']!='0'){echo $row->design['theme'].' Theme:';}else{echo '[no theme set]';}?></em></strong><br />
							<input type="radio" name="apptheme" value="1" <?php echo ($row->generator['apptheme'] == '1') ? 'checked="checked"' : ''; ?>/> apply&nbsp;|&nbsp;
							<input type="radio" name="apptheme" value="0" <?php echo ($row->generator['apptheme'] == '0') ? 'checked="checked"' : ''; ?>/> omit <br /><br />
							<strong>BAT CSS Library</strong><br />
							<select name="batcss">
								<option value="0" <?php echo ($row->generator['batcss'] == '0') ? 'selected' : ''; ?>>omit</option>
								<option value="1" <?php echo ($row->generator['batcss'] == '1') ? 'selected' : ''; ?>>full</option>
								<option value="2" <?php echo ($row->generator['batcss'] == '2') ? 'selected' : ''; ?>>light</option>
							</select><br /><br />
						</div>
					</div>
					<div class="block bw33 xs-100 sm-100 md-100">
						<div class="form-group">
							<span class="label">Layout</span><br /><br />
							<strong><em><?php if($row->design['layout']!='0'){echo $row->design['layout'].' Layout:';}else{echo '[no layout set]';}?></em></strong><br />
							<input type="radio" name="inclayout" value="1" <?php echo ($row->generator['inclayout'] == '1') ? 'checked="checked"' : ''; ?>/> apply&nbsp;|&nbsp;
							<input type="radio" name="inclayout" value="0" <?php echo ($row->generator['inclayout'] == '0') ? 'checked="checked"' : ''; ?>/> omit
						</div>
						<div class="form-group">	
							Layout container:<br />
							<select name="container">
								<option value="n" <?php echo ($row->generator['container'] == 'n') ? 'selected' : ''; ?>>None</option>
								<option value="container-fluid" <?php echo ($row->generator['container'] == 'container-fluid') ? 'selected' : ''; ?>>Fluid</option>
								<option value="container" <?php echo ($row->generator['container'] == 'container') ? 'selected' : ''; ?>>Standard</option>
								<option value="container-960" <?php echo ($row->generator['container'] == 'container-960') ? 'selected' : ''; ?>>960px</option>
								<option value="container-1200" <?php echo ($row->generator['container'] == 'container-1200') ? 'selected' : ''; ?>>1200px</option>
								<option value="container-1600" <?php echo ($row->generator['container'] == 'container-1600') ? 'selected' : ''; ?>>1600px</option>
							</select>
						</div>
						<div class="form-group">	
							Apply layout to:<br />
							<select name="applayout">
								<option value="b" <?php echo ($row->generator['applayout'] == 'b') ? 'selected' : ''; ?>>Body only</option>
								<option value="h" <?php echo ($row->generator['applayout'] == 'h') ? 'selected' : ''; ?>>Header only</option>
								<option value="f" <?php echo ($row->generator['applayout'] == 'f') ? 'selected' : ''; ?>>Footer only</option>
								<option value="hb" <?php echo ($row->generator['applayout'] == 'hb') ? 'selected' : ''; ?>>Header + Body</option>
								<option value="hf" <?php echo ($row->generator['applayout'] == 'hf') ? 'selected' : ''; ?>>Header + Footer</option>
								<option value="bf" <?php echo ($row->generator['applayout'] == 'bf') ? 'selected' : ''; ?>>Body + Footer</option>
								<option value="hbf" <?php echo ($row->generator['applayout'] == 'hbf') ? 'selected' : ''; ?>>All Sections</option>
							</select><br /><br />
						</div>
					</div>
					<div class="block bw100">
						<?php $headers = @get_headers($row->loc.'.php');
						if($headers && strpos( $headers[0], '200')) {$status = "<strong>WARNING:</strong> The following page file will be re-written:";}
						else {$status = "A new page file will be created at:";} ?>
						<p class="padded" style="background: #ff0000; color: #fff;"><?php echo $status;?><br />
						<span style="color: #ffff00;"><strong><?php echo $row->loc.'.php';?></strong></span></p>
					</div>
				</div>
			</div>
			<button type="submit" name="edit" class="btn-save">&#128171; Generate</button>
		</form>
	</div>
</div>