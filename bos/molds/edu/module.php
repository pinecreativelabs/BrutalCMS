	<div id="edu" class="op-panel charcoal">
		<div class="op-panelctrl solid-black">
			<div data-close="edu" class="op-panelbt op-bt-close">
				<img src="core/css/bos-ui/arrow-left-48.png" alt="close" />
			</div>
			<div data-panelid="profile" data-pos="right" class="op-panelbt op-tab op-bt-nav">
				<span class="nb-btn-small pill bitstream sepia">Account &raquo;</span>
			</div>
			<div class="op-panelbt op-bt-closeall floatright">
				<img src="core/css/bos-ui/close-white-48a.png" alt="close all" />
			</div><div class="clearspace"></div>
		</div>
        <div class="op-panelform light-text">
			<div class="container-fluid">
				<div class="block-wrap">
					<div class="block bw25 md-100 sm-100 xs-100">
						<div class="lush chonk monolisk rice-t-s apple-t" style="padding: 1em 1.25em; margin: 0 1.5em 0 0;">
							<h3 style="font-size: 2.5em;"><strong>EDU <i class="bi bi-edu"></i></strong></h3>
							<h4 class="heavy flow-text">Educational Deployment Utility</h4>
						</div>
						<ul class="tiles bitstream smoke-t black-t-s">
							<li><a href="javascript:void(0);" data-panelid="manage-courses" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-school"></i> Courses</span>
							</a></li>
							<li><a href="javascript:void(0);" data-panelid="manage-lessons" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-notebook"></i> Lessons</span>
							</a></li>
							<li><a href="javascript:void(0);" data-panelid="manage-quizzes" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-help"></i> Quizzes</span>
							</a></li>
							<?php if(($ugroup=='administrator')||($ugroup=="BOS Admin")){?>
							<li><a href="javascript:void(0);" data-panelid="config-edu" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-gear"></i> Settings</span>
							</a></li>
							<?php } ?>
						</ul>
					</div>
					<div class="block bw75 md-100 sm-100 xs-100" style="padding: 1em 2em 1em 0;">
						<div class="padded warning bitstream">
							<p class="flow-text">This module will be available in 3.2 or later. It will offer management of:</p>
							<ul>
								<li>Courses</li>
								<li>Lessons</li>
								<li>Quizzes</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
        </div>
    </div>
	<!-- EDU Courses Pane -->
	<div id="manage-courses" class="op-panel charcoal">
		<div class="op-panelctrl solid-black">
			<div data-close="manage-courses" class="op-panelbt op-bt-close">
				<img src="core/css/bos-ui/arrow-left-48.png" alt="close" />
			</div>
			<div data-panelid="profile" data-pos="right" class="op-panelbt op-tab op-bt-nav">
				<span class="lucida">Account &raquo;</span>
			</div>
			<div class="op-panelbt op-bt-closeall floatright">
				<img src="core/css/bos-ui/close-white-48a.png" alt="close all" />
			</div><div class="clearspace"></div>
		</div>
        <div class="op-panelform">
			<div class="container-fluid">
				<div class="block-wrap">
					<div class="block bw25 md-100 sm-100 xs-100">
						<div class="lush chonk monolisk rice-t-s apple-t" style="padding: 1em 1.25em; margin: 0 1.5em 0 0;">
							<h3 style="font-size: 2.5em; "><strong>EDU <i class="bi bi-edu"></i></strong></h3>
							<h4 class="heavy flow-text"><i class="bi bi-school"></i> Courses</h4>
						</div>
						<ul class="tiles bitstream black-t-s smoke-t">
							<li><a href="javascript:void(0);" data-panelid="manage-lessons" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-notebook"></i> Lessons</span>
							</a></li>
							<li><a href="javascript:void(0);" data-panelid="manage-quizzes" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-help"></i> Quizzes</span>
							</a></li>
						</ul>
					</div>
					<div class="block bw75 bh85">
						<div class="block-wrap">
							<div class="block bw100 bh85">
								<iframe src="molds/edu/module/page_edit_courses.php" title="Courses Editor" style="border: none; overflow-y: none; width: 100%; margin: 0 auto; padding: 0; height: 100%;"></iframe>
							</div>
						</div>
					</div>
				</div>
			</div>
        </div>
    </div>
	<!-- EDU Lessons Pane -->
	<div id="manage-lessons" class="op-panel charcoal">
		<div class="op-panelctrl solid-black">
			<div data-close="manage-lessons" class="op-panelbt op-bt-close">
				<img src="core/css/bos-ui/arrow-left-48.png" alt="close" />
			</div>
			<div data-panelid="profile" data-pos="right" class="op-panelbt op-tab op-bt-nav">
				<span class="lucida">Account &raquo;</span>
			</div>
			<div class="op-panelbt op-bt-closeall floatright">
				<img src="core/css/bos-ui/close-white-48a.png" alt="close all" />
			</div><div class="clearspace"></div>
		</div>
        <div class="op-panelform">
			<div class="container-fluid">
				<div class="block-wrap">
					<div class="block bw25 md-100 sm-100 xs-100">
						<div class="lush chonk monolisk rice-t-s apple-t" style="padding: 1em 1.25em; margin: 0 1.5em 0 0;">
							<h3 style="font-size: 2.5em; "><strong>EDU <i class="bi bi-edu"></i></strong></h3>
							<h4 class="heavy flow-text"><i class="bi bi-notebook"></i> Lessons</h4>
						</div>
						<ul class="tiles bitstream black-t-s smoke-t">
							<li><a href="javascript:void(0);" data-panelid="manage-courses" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-school"></i> Courses</span>
							</a></li>
							<li><a href="javascript:void(0);" data-panelid="manage-quizzes" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-help"></i> Quizzes</span>
							</a></li>
						</ul>
					</div>
					<div class="block bw75 bh85">
						<div class="block-wrap">
							<div class="block bw100 bh85">
								<iframe src="molds/edu/module/page_edit_lessons.php" title="Courses Editor" style="border: none; overflow-y: none; width: 100%; margin: 0 auto; padding: 0; height: 100%;"></iframe>
							</div>
						</div>
					</div>
				</div>
			</div>
        </div>
    </div>
	<!-- EDU Quizzes Pane -->
	<div id="manage-quizzes" class="op-panel charcoal">
		<div class="op-panelctrl solid-black">
			<div data-close="manage-quizzes" class="op-panelbt op-bt-close">
				<img src="core/css/bos-ui/arrow-left-48.png" alt="close" />
			</div>
			<div data-panelid="profile" data-pos="right" class="op-panelbt op-tab op-bt-nav">
				<span class="lucida">Account &raquo;</span>
			</div>
			<div class="op-panelbt op-bt-closeall floatright">
				<img src="core/css/bos-ui/close-white-48a.png" alt="close all" />
			</div><div class="clearspace"></div>
		</div>
        <div class="op-panelform">
			<div class="container-fluid">
				<div class="block-wrap">
					<div class="block bw25 md-100 sm-100 xs-100">
						<div class="lush chonk monolisk rice-t-s apple-t" style="padding: 1em 1.25em; margin: 0 1.5em 0 0;">
							<h3 style="font-size: 2.5em; "><strong>EDU <i class="bi bi-edu"></i></strong></h3>
							<h4 class="heavy flow-text"><i class="bi bi-help"></i> Quizzes</h4>
						</div>
						<ul class="tiles bitstream black-t-s smoke-t">
							<li><a href="javascript:void(0);" data-panelid="manage-courses" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-school"></i> Courses</span>
							</a></li>
							<li><a href="javascript:void(0);" data-panelid="manage-lessons" data-pos="fade" class="op-tab">
								<span class="title"><i class="bi bi-notebook"></i> Lessons</span>
							</a></li>
						</ul>
					</div>
					<div class="block bw75 bh85">
						<div class="block-wrap">
							<div class="block bw100 bh85">
								<iframe src="molds/edu/module/page_edit_quizzes.php" title="Courses Editor" style="border: none; overflow-y: none; width: 100%; margin: 0 auto; padding: 0; height: 100%;"></iframe>
							</div>
						</div>
					</div>
				</div>
			</div>
        </div>
    </div>