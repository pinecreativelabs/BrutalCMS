<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
	<title>DICK DEMO</title>
	<meta name="description" content="Brutal CMS \\\ Daily Integrated Content Keeper Demo." />
	<!-- Twitter Card data -->
	<meta name="twitter:card" content="summary">
	<meta name="twitter:site" content="@brutalistfwk">
	<meta name="twitter:title" content="DICK Demo">
	<meta name="twitter:description" content="Brutal CMS \\\ Daily Integrated Content Keeper Demo.">
	<meta name="twitter:creator" content="@brutalistfwk">
	<meta name="twitter:image" content="https://beta.brutalistframework.com/bf3/dickss.jpg">
	<!-- Open Graph data -->
	<meta property="og:title" content="DICK Demo" />
	<meta property="og:type" content="website" />
	<meta property="og:url" content="http://www.brutalistframework.com" />
	<meta property="og:image" content="https://beta.brutalistframework.com/bf3/dickss.jpg" />
	<meta property="og:description" content="Brutal CMS \\\ Daily Integrated Content Keeper Demo." /> 
	<meta property="og:site_name" content="Brutal CMS" />
	
	<link href="bos/bat/css/brutalist.min.css" type="text/css" rel="stylesheet" media="all"/>
	<link href="bos/bat/css/blueprintgrid.min.css" type="text/css" rel="stylesheet" />
	<!--<link href="bos/bat/css/bos-ui.css" type="text/css" rel="stylesheet" />-->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Shadows+Into+Light&display=swap" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Special+Elite&display=swap" rel="stylesheet">
	<style>
	ul.check li {margin-top: 8px;}
	.shadows-into-light {font-family: 'Shadows Into Light', cursive;}
	.special-elite {font-family: 'Special Elite', cursive;}
	.daily-content-wrapper { }
	.daily-content-wrapper .season, .daily-content-wrapper .month {padding: 1em;}
	.daily-content-wrapper .season:before, .daily-content-wrapper .month:before{display:block; font-size: 2em; font-weight: 600; }
	.daily-content-wrapper .season.summer:before {content:'\1F31E SUMMER';}
	.daily-content-wrapper .season.fall:before {content: '\1F342 AUTUMN';}
	.daily-content-wrapper .season.winter:before {content: '\2744 WINTER';}
	.daily-content-wrapper .season.spring:before {content: '\1F331 SPRING';}
	.daily-content-wrapper .month.july:before {content: '\1F31F JULY';}
	.daily-content-wrapper .month.july {background: rgb(230,18,18);
		background: linear-gradient(158deg, rgba(230,18,18,1) 0%, rgba(246,246,246,1) 48%, rgba(8,35,205,1) 100%);
	}
	.daily-content {margin: 0 auto; border-radius: 10px; -webkit-border-radius: 1em;}
	.daily-content .header h3, .daily-content .header h4 {padding: 8px; margin: 0; font-weight: 600; font-family: 'Shadows Into Light', cursive;}
	.daily-content .header h3 {font-size: 1.75em;}
	.daily-content .header h3 span.date {font-size: 0.75em;}
	.daily-content .header h4.title {font-size: 1.5em; font-weight: 600; font-family: 'Shadows Into Light', cursive;}
	.daily-content .content {font-size: 1.2em; line-height: 150%; margin: 0 auto; padding: 8px; font-family: 'Special Elite', cursive;}
	.daily-content .cta a{display: block; width: 100%; text-align: center; padding: 8px; font-size: 1.25em;}
	</style>
</head>
<body>
<div class="container-fluid">
<header class="block-wrap sunset">
	<div class="block bw40 xs-100 sm-100">
		<div class="padded">
			<h1 class="lucida" style="font-size: 60px; line-height: 140%;">CAT //<br />DICK Module</h1>
		</div>
	</div>
	<div class="block bw20 xs-100 sm-100 center"><strong>
		<span class="black-t peach-t-s wmv throb" style="font-size: 4.5em;">3==> <span class="blink-slow">*</span></span>
	</strong></div>
	<div class="block bw40 xs-100 sm-100">
		<div class="padded">
			<h2 class="lucida" style="font-size: 48px;">Daily Integrated Content Keeper Module</h2>
		</div>
	</div>
</header>
<div class="block-wrap infinitile">
	<div class="block bw33 xs-100 sm-100 md-50">
		<div class="padded">
			<div class="padded blueprint">
				<h3 class="lucida flow-text">About DICK Module</h3>
				<p>DICK <em>(Daily Integrated Content Keeper)</em> is a CAT (Content Application Toolkit) module that allows you to automatically display daily content. Features include:</p>
				<ul class="check">
					<li>Display a daily image or video (self-hosted, YouTube, or Vimeo)</li>
					<li>Include custom text and link</li>
					<li>Set content for each day of week</li>
					<li>Limit content to display only during certain months or seasons</li>
					<li>Create custom days to be displayed on a future set date</li>
					<li>Specify 3 custom colors for each day (to be used within a template)</li>
					<li>Set custom fallback content to be used if no other content is available that day</li>
				</ul>
			</div>
		</div><div class="padded">
			<div class="padded warning">
				<h4 class="lucida flow-text">Proposed Improvements &amp; Features</h4>
				<p>In future versions, the following improvements are proposed:</p>
				<ul class="brutal">
					<li>Accurate detection of local timezones, so content can display ONLY during a given day. Currently, content displays based on the server timezone, and not a local one.</li>
					<li>Randomly select content to be displayed if more than one daily content is added to the same day.</li>
					<li>Option to auto-delete custom days after they have been displayed</li>
					<li>Video options (auto-play, loop, controls)</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="block bw33 xs-100 sm-100 md-50"><div class="padded center">
	<h2 class="lucida flow-text">Default View Demo</h2>
	<p class="courier">New content will be displayed every day in the area below. You should see either an image or video of the day.</p>
	<?php require_once 'bos/cat/dick/view.php'; 
	echo '<p class="lucida" style="text-align: left; margin-top: 1em; margin-bottom: 1em;"><strong>'.$days_file->day->count().'</strong> custom pre-determined days<br /><strong>today:</strong> '.date('Y-m-d').'<br /><strong>Set Timezone: '.$tz.'<br />Server Timezone: '.$server_tz.'</strong></p>';?>
	</div></div>
	<div class="block bw33 xs-100 sm-100 md-100">
		<div class="padded">
			<div class="padded blueprint">
				<h3 class="lucida flow-text">How Does it Work?</h3>
				<p>Depending on the module's settings, content is rendered via the following rules:</p>
				<ul class="check">
					<li>If a custom day is set for a given day, it is displayed for that day.</li>
					<li>If no custom day is set for a given day, content for the current weekday is displayed that day.</li>
					<li>If neither a custom <em>nor</em> weekday day is enabled on a given day, fallback content is displayed.</li>
					<li>If content is set to render only during specific months or seasons, and no custom days are set, then weekday content is rendered. If not, fallback content is displayed.</li>
					<li>If only certain months or seasons are enabled, then either custom days or weekdays will be rendered, if they are active. If not, fallback content is displayed.</li>
					<li>If content is set to render only during the week, then only weekday content is rendered. If a weekday isn't active, then fallback content is rendered.</li>
					<li>If multiple custom days are set to the same day, only the first occurrence will be displayed.</li>
				</ul>
			</div>
		</div>
	</div>
</div>
	
<footer><p>Brutal CMS &copy; 2022</p></footer>
</div>
</body>
</html>