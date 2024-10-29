<!-- Generate Sitemap -->
<div style="display:none;" id="addnew">
	<div class="padded">
		<h4 class="modal-title edit"><strong>Generate Sitemap</strong></h4>
		<form method="POST" action="action_generate_sitemap.php">
			<?php 
			$index = 0; $i = 0; $count = 0;
			foreach($pfile->page as $page){ 
				if(($page['type']=='public')&&($page['sitemap']=='1')){ $index=$i; $count++; ?>
			<input type="hidden" name="lastmod<?php echo $i;?>" value="<?php echo $page->lastmod; ?>" />
			<input type="hidden" name="loc<?php echo $i;?>" value="<?php echo $page->loc;?>" />
			<input type="hidden" name="priority<?php echo $i;?>" value="<?php echo $page['priority'];?>" />
			<input type="hidden" name="changefreq<?php echo $i;?>" value="<?php echo $page['changefreq'];?>" />
			<?php } $i++; } ?>
			<div style="max-width: 80vw;">
				<div class="block-wrap">
					<div class="block bw100">
						<p class="padded" style="color: #ff0000; font-size: 1.5em;"><strong><?php echo $count;?></strong> pages will be updated in the Sitemap</p>
					</div>
				</div>
			</div>
			<button type="submit" name="edit" class="btn-save">&#10056; Generate</button>
		</form>
	</div>
</div>