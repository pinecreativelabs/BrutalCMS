<?php 
$pawpostdatapath = 'pat/users/'.$_SESSION['userName'].'/data/blog/blog.xml'; 
if (file_exists($pawspostdatapath)) {
$pawpost = simplexml_load_file($pawpostdatapath) or die("Error: Object Creation failure");
} 
?>
	<div id="blog" class="op-panel charcoal">
		<div class="op-panelctrl solid-black">
			<div data-close="blog" class="op-panelbt op-bt-close">
				<img src="bat/css/bos-ui/arrow-left-48.png" alt="close" />
			</div>
			<div data-panelid="profile" data-pos="right" class="op-panelbt op-tab op-bt-nav">
				<span class="lucida">Account &raquo;</span>
			</div>
			<div class="op-panelbt op-bt-closeall floatright">
				<img src="bat/css/bos-ui/close-white-48a.png" alt="close all" />
			</div>
			<div class="clearspace"></div>
		</div>
		
        <!-- Panel Content -->
        <div class="op-panelform">
			<div class="container-fluid">
				<div class="block-wrap">
					<div class="block bw25 md-100 sm-100 xs-100">
						<div class="banana chonk strawberry-t black-t-s" style="padding: 1em 1.25em; margin: 0 1.5em 0 0;">
							<h3 class="lucida bold" style="font-size: 2.5em; ">PAWS <i class="bi bi-compose"></i></h3>
							<h4 class="lucida heavy flow-text"><i class="bi bi-chat"></i> Blog</h4>
						</div>
						<h4 class="lucida strawberry-banana flow-text" style="margin-left: 0; padding: 0.5em; max-width: 90%;"><i class="bi bi-actions"></i> Actions</h4>
						<ul class="tiles lucida black-t-s smoke-t">
							<li><a href="javascript:void(0);" data-panelid="blogstream" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-watch"></i> View Stream</span></a></li>
							<li><a href="javascript:void(0);" data-panelid="my_photos" data-pos="right" class="op-tab">
								<span class="title"><i class="bi bi-folder grayscale"></i> Browse Images</span></a></li>
							<li><a href="javascript:void(0);" data-panelid="fam-fu-myphotos" data-pos="right" class="op-tab">
								<span class="title"><i class="bi bi-upload grayscale"></i> Upload Images</span></a></li>
						</ul>
					</div>
					<div class="block bw75 bh85 xs-100 sm-100 md-100">
						<div class="block-wrap">
							<div class="block bw100 bh85">
								<iframe src="cat/paws/module/page_edit_blogposts.php" title="Blog Post Editor" style="border: none; overflow-y: none; width: 100%; margin: 0 auto; padding: 0; height: 100%;"></iframe>
							</div>
						</div>
					</div>
				</div>
						<div class="smoke-t courier">
							Post Datapath: <?php echo $pawpostdatapath; ?><br />
							<?php if (file_exists($pawspostdatapath)) {
								foreach ($pawpost->children() as $data){
									$post_id = $data->id;
									$post_cat = $data->channel;
									$post_type = $data->type;
									$post_title = $data->title;
									$post_sum = $data->summary;
									$post_content = $data->content;
									echo '<p class="mauve" style="margin-bottom: 8px;"><strong>PID: </strong>'.$post_id.'<br />
									<strong>Channel: </strong>'.$post_cat.' | <strong>Type: </strong>'.$post_type.'<br />
									<strong>Title: </strong>'.$post_title.'<br /><strong>Summary: </strong>'.$post_sum.'<br />'.$post_content.'</p>';
								}
							} else { echo '<p>No posts created.</p>';}
							?>
						</div>
			</div>
        </div>
    </div>