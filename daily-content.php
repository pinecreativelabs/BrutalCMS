<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <title>Timelapse Magic</title>
    <meta name="description" content="Timelapse Magic: Brutal CMS DICK (Daily Integrated Content Keeper) module demo." />
    <link rel="stylesheet" type="text/css" href="bos/bat/css/brutalist.min.css" media="screen"/>
	<link rel="stylesheet" type="text/css" href="bos/bat/css/blueprintgrid.min.css" media="screen"/>
    <link rel="stylesheet" type="text/css" href="bos/rat/repo/premium/timelapse/css/style.css" media="screen"/>
	<link rel="stylesheet" type="text/css" href="bos/rat/repo/premium/timelapse/fonts/fonts.css" media="screen"/> 
	
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
	.daily-content-wrapper .season, .daily-content-wrapper .month {padding: 1em; -webkit-border-radius: 1em; border-radius: 1em;}
	.daily-content-wrapper .season:before, .daily-content-wrapper .month:before{display:block; font-size: 2em; font-weight: 600; }
	.daily-content-wrapper .season.summer:before {content:'\1F31E SUMMER';}
	.daily-content-wrapper .season.fall:before {content: '\1F342 AUTUMN';}
	.daily-content-wrapper .season.winter:before {content: '\2744 WINTER';}
	.daily-content-wrapper .season.spring:before {content: '\1F331 SPRING';}
	/* JANUARY */
	.daily-content-wrapper .month.january:before {content: '\26C4 JANUARY';}
	.daily-content-wrapper .month.january {background: rgb(114,159,181);
		background: linear-gradient(158deg, rgba(114,159,181,1) 0%, rgba(60,101,159,1) 46%, rgba(228,224,205,1) 100%);
	}
	/* FEBRUARY */
	.daily-content-wrapper .month.february:before {content: '\1F495 FEBRUARY';}
	.daily-content-wrapper .month.february {background: rgb(221,80,80);
		background: linear-gradient(156deg, rgba(221,80,80,1) 0%, rgba(235,202,202,1) 46%, rgba(184,46,60,1) 100%);
	}
	/* MARCH */
	.daily-content-wrapper .month.march:before {content: '\1F340 MARCH';}
	.daily-content-wrapper .month.march {background: rgb(43,97,34);
		background: linear-gradient(156deg, rgba(43,97,34,1) 0%, rgba(152,194,117,1) 46%, rgba(221,204,126,1) 100%);
	}
	/* APRIL */
	.daily-content-wrapper .month.april:before {content: '\1F331 APRIL';}
	.daily-content-wrapper .month.april {background: rgb(18,133,131);
		background: linear-gradient(156deg, rgba(18,133,131,1) 0%, rgba(112,166,67,1) 46%, rgba(163,149,83,1) 100%);
	}
	/* MAY */
	.daily-content-wrapper .month.may:before {content: '\1F337 MAY';}
	.daily-content-wrapper .month.may {background: rgb(128,196,96);
		background: linear-gradient(133deg, rgba(128,196,96,1) 0%, rgba(215,244,38,1) 46%, rgba(137,244,149,1) 100%);
	}
	/* JUNE */
	.daily-content-wrapper .month.june:before {content: '\1F338 JUNE';}
	.daily-content-wrapper .month.june {background: rgb(42,244,214);
		background: linear-gradient(133deg, rgba(42,244,214,1) 0%, rgba(235,229,30,1) 46%, rgba(241,144,239,1) 100%);
	}
	/* JULY */
	.daily-content-wrapper .month.july:before {content: '\1F31F JULY';}
	.daily-content-wrapper .month.july {background: rgb(230,18,18);
		background: linear-gradient(158deg, rgba(230,18,18,1) 0%, rgba(246,246,246,1) 48%, rgba(8,35,205,1) 100%);
	}
	/* AUGUST */
	.daily-content-wrapper .month.august:before {content: '\1F305 AUGUST';}
	.daily-content-wrapper .month.august { background: rgb(218,111,111);
		background: linear-gradient(158deg, rgba(218,111,111,1) 0%, rgba(230,195,68,1) 48%, rgba(124,181,204,1) 100%);
	}
	/* SEPTEMBER */
	.daily-content-wrapper .month.september:before {content: '\1F342 SEPTEMBER';}
	.daily-content-wrapper .month.september { background: rgb(189,68,28);
		background: linear-gradient(133deg, rgba(189,68,28,1) 0%, rgba(210,170,19,1) 44%, rgba(59,122,33,1) 100%);
	}
	/* OCTOBER */
	.daily-content-wrapper .month.october:before {content: '\1F383 OCTOBER';}
	.daily-content-wrapper .month.october { background: rgb(61,28,8);
		background: linear-gradient(133deg, rgba(61,28,8,1) 0%, rgba(236,75,12,1) 46%, rgba(251,149,40,1) 100%);
	}
	/* NOVEMBER */
	.daily-content-wrapper .month.november:before {content: '\1F983 NOVEMBER';}
	.daily-content-wrapper .month.november { background: rgb(117,74,48);
		background: linear-gradient(133deg, rgba(117,74,48,1) 0%, rgba(198,98,58,1) 46%, rgba(236,183,127,1) 100%);
	}
	/* DECEMBER */
	.daily-content-wrapper .month.december:before {content: '\1F384 DECEMBER';}
	.daily-content-wrapper .month.december { background: rgb(55,84,28);
		background: linear-gradient(133deg, rgba(55,84,28,1) 0%, rgba(62,148,8,1) 46%, rgba(224,32,32,1) 100%);
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
	<!-- Preloader -->
	<div id="preloader" class="swede-split"><div id="status">&nbsp;</div></div>
	
	<div id="nightsky"></div>
    <div id="sky"></div>
    <div id="sun_yellow"></div>
    <div id="sun_red"></div>
    <div id="clouds"></div>
    <div id="ground"></div>
	<div id="ground_night"></div>
    <div id="night"></div>
    <div id="stars"></div>        
    <div id="sstar"></div>
    <div id="moon"></div>
	
    <div id="logo">
		<div class="logo-head">
			<h1 class="sky-t">Timelapse Magic</h1>
			<h2 class="flow-text sky-t lucida">Brutal CMS // DICK Module Demo</h2>
			<p class="special-elite flow-text white-t" style="margin: 0.5em 0 0.5em 0;">Daily Integrated Content Keeper</p>
			<ul class="tiles thirds aqua center courier bold rounded">
				<li><a href="#aboutdick" data-modal-open class="lemon-t charcoal-t-s invert-h"><small>About DICK<br />Module</small></a></li>
				<li><a href="#howitworks" data-modal-open class="lemon-t charcoal-t-s invert-h"><small>How Does<br />it Work?</small></a></li>
				<li><a href="#improvements" data-modal-open class="lemon-t charcoal-t-s invert-h"><small>Proposed<br />Improvements</small></a></li>
			</ul>
		</div>
		<div id="dick-preloader" class="brick padded info lucida center"><span class="flow-text">[ DICK LOADING<span class="blink">...</span>]</span><br /><small>The best things are worth waiting for.</small></div>
		<div id="dick" class="block padded bw33 xs-100 sm-100 md-100 lg-50" style="margin-bottom: 2em;">
			<?php require_once 'bos/cat/dick/view.php'; ?>
		</div>
	</div>

    <div id="back" class="lucida"><a href="https://www.brutalcms.com" target="_blank">Brutal CMS</a></div>

<div style="display: none;" id="aboutdick">
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
		<p style="margin-top: 0.75em; margin-bottom: 1em;"><strong>DEMO: </strong>Every day, different content will be displayed. This will be either an image or video, and some text.</p>
	</div>
</div>
<div id="howitworks" style="display: none;">
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
<div style="display: none;" id="improvements">
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
<!-- Initiate and display modal itself -->
<div class="modal">
	<div class="modal-inner draggable">
		<span data-modal-close>&times;</span>
		<div class="modal-content"></div>
	</div>
</div>

<script src="bos/rat/repo/premium/timelapse/js/jab-lite.js" type="text/javascript" ></script>
<script src="bos/bat/jab/jquery.3.js" type="text/javascript" ></script>
<script src="bos/rat/repo/premium/timelapse/js/jquery.easing.1.3.js" type="text/javascript"></script>
<script src="bos/rat/repo/premium/timelapse/js/jquery.color.js" type="text/javascript" ></script>
<!-- Preloader -->
<script type="text/javascript">
//<![CDATA[
	$(window).on("load",function(e) { // makes sure the whole site is loaded
		$("#status").fadeOut(); // will first fade out the loading animation
		$("#preloader").delay(500).fadeOut("slow"); // will fade out the white DIV that covers the website.
	})
//]]>
</script> 
    <script type="text/javascript">
        $(function() {
            $('#sun_yellow').delay(800).animate({'top':'96%','opacity':0.4}, 15000, function(){
                $('#stars').animate({'opacity':1}, 5000, function(){
                    $('#moon').animate({'top':'30%','opacity':1}, 5000, function(){
                        $('#sstar').animate({'opacity':1}, 300);
                        $('#sstar').animate({'backgroundPosition': '0px 0px','top':'15%', 'opacity':0 }, 500, function(){
                            $('#dick').animate({'opacity':1}, 800);
							$('#dick-preloader').animate({'opacity':0}, 800);
							$('#dick .daily-content-wrapper').animate({'opacity':1}, 1100);
                            //$('#back').animate({'opacity':1}, 3000);
                        });
                    });
					$('#ground').animate({'opacity':0}, 15000);
					$('#ground_night').animate({'opacity': 1}, 15000);
					$('#night').animate({'opacity':0 }, 15000);
                });
            });
            $('#sun_red').animate({'top':'96%','opacity':0.8}, 15000);
            $('#sky').animate({'backgroundColor':'#0d2488', 'opacity':0}, 13000); <!--#4f0030-->
            $('#clouds').animate({'left':'-1000px','opacity':0}, 25000);
            $('#night').animate({'opacity':0.8}, 15000);
			$('#clouds').animate({'left':'1000px','opacity':1}, 25000);
        });
    </script>
    </body>
</html>