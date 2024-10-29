<?php
$system_page=true;
$ignore_tracking = true;
require_once('build/constructor.php');
$deadline = date('F j Y h:i',strtotime($coming_soon_deadline));
$deadline_date = date('F jS, Y',strtotime($coming_soon_deadline));
?>
<!DOCTYPE html>
<html lang="en">
<head>
	
	<title><?php echo $coming_soon_title;?></title>
	<meta name="description" content="PHP boilerplate blank starter page." />
	<link href="core/css/construct.css" type="text/css" rel="stylesheet" media="all" />
	<?php if($coming_soon_template=='countdown'){?>
	<style>
	.countdown {
	  display: inline-block;
	  text-align: center;
	  font-size: 36px;
	}
	.countdown-number {
	  padding: 12px; min-width: 100px; font-weight: 600;
	  border-radius: 3px; -webkit-border-radius: 3px;
	  display: inline-block;
	}
	.countdown-time {
	  padding: 15px; width: 100%; font-weight: normal; display: inline-block;
	  border-radius: 3px; -webkit-border-radius: 3px; border: 1px solid #000;
	}
	.countdown-text {
	  display: block;
	  padding-top: 5px;
	  font-size: 1.25rem;
	}
	.deadline-message{display: none;}
	.visible{display: block;}
	.hidden{display: none;}
	@media only screen and (min-width:1340px){
		.countdown {font-size: 72px;}
		.countdown-number{min-width: 160px;}
		.countdown-text {font-size: 2.25rem;}
	}
	@media only screen and (max-width:600px){
		.countdown {font-size: 24px;}
		.countdown-number{min-width: 80px;}
		.countdown-text {font-size: 1.15rem;}
	}
	</style>
	<?php } ?>
</head>
<body>

<?php if($coming_soon_template=='construction'){ ?>
<!-- CONSTRUCTION TEMPLATE -->
<div class="wrap-960 smoke padded rounded courier center" style="margin-top: 3rem; margin-bottom: 3rem;">
	<h1><?php echo $sitename;?></h1><hr />
	<h2><i class="bi bi-danger bi-4x charcoal-t-s"></i><br /><strong><?php echo $coming_soon_title;?></strong></h2>
	<div class="message flow-text">
		<p><strong><?php echo $deadline_date;?></strong></p>
		<?php echo $coming_soon_message;?>
		<p class="spacer"></p>
	</div>
</div>

<?php } elseif($coming_soon_template=='capture'){ ?>
<!-- CAPTURE TEMPLATE -->
<div class="wrap-1200" style="margin-top: 3rem; margin-bottom: 3rem;">
	<div class="padded rounded smoke tahoma">
		<div class="flex">
			<div class="half padded">
				<h1 style="margin: 0; padding: 0; border-bottom: 2px solid #333;"><?php echo $sitename;?></h1>
				<h2><?php echo $coming_soon_title;?></h2>
				<div class="flow-text">
					<p style="border-bottom: 1px solid #333; margin-bottom: 1.5rem;"><strong><?php echo $deadline_date;?></strong></p>
					<?php echo $coming_soon_message;?>
				</div>
				<p class="spacer"></p>
			</div>
			<div class="half padded"><div class="rounded padded b-s-t charcoal-b">
				
				<!-- place custom content here -->
				
			</div></div>
		</div>
	</div>
</div>

<?php } else { ?>
<!-- COUNTDOWN TEMPLATE -->
<div class="wrap-1200">
	<div class="padded rounded smoke center" style="margin-top: 2rem;">
		<h1><?php echo $sitename;?></h1><hr />
		<h2><?php echo $coming_soon_title;?></h2>
		<div class="flow-text"><?php echo $coming_soon_message;?></div>
		<!-- display upon timer end -->
		<div id="deadline-message" class="deadline-message">
			<div class="padded rounded center flow-text">
				<div class="padded sweden">
					<h3><strong>Time's Up!</strong></h3>
					<p><strong>It's worth waiting 17 seconds!</strong></p>
					<p style="margin-top: 1rem;">We can put whatever content we want in here.</p>
					<p style="margin-top: 1rem;">We can also set the countdown to end on a specific date and time:</p>
					<p class="spacer"></p>
				</div>
			</div>
		</div>
		
		<!-- COUNTDOWN TIMER -->
		<div id="countdown" class="countdown">
			<!-- days -->
			<div class="countdown-number">
				<span class="days countdown-time"></span><span class="countdown-text">Days</span>
			</div>
			<!-- hours -->
			<div class="countdown-number">
				<span class="hours countdown-time"></span><span class="countdown-text">Hours</span>
			</div>
			<!-- minutes -->
			<div class="countdown-number">
				<span class="minutes countdown-time"></span><span class="countdown-text">Minutes</span>
			</div>
			<!-- seconds -->
			<div class="countdown-number">
				<span class="seconds countdown-time"></span><span class="countdown-text">Seconds</span>
			</div>
		</div>
	</div>
</div>

<script src="core/jab/jquery.3.js"></script>
<script>
function getTimeRemaining(endtime) {
  var t = Date.parse(endtime) - Date.parse(new Date());
  var seconds = Math.floor((t / 1000) % 60);
  var minutes = Math.floor((t / 1000 / 60) % 60);
  var hours = Math.floor((t / (1000 * 60 * 60)) % 24);
  var days = Math.floor(t / (1000 * 60 * 60 * 24));
  return {
    total: t, days: days, hours: hours, minutes: minutes, seconds: seconds
  };
}
function initializeClock(id, endtime) {
  var clock = document.getElementById(id);
  var daysSpan = clock.querySelector(".days");
  var hoursSpan = clock.querySelector(".hours");
  var minutesSpan = clock.querySelector(".minutes");
  var secondsSpan = clock.querySelector(".seconds");
  function updateClock() {
    var t = getTimeRemaining(endtime);
    if (t.total <= 0) {
      document.getElementById("countdown").className = "hidden";
      document.getElementById("deadline-message").className = "visible";
      clearInterval(timeinterval);
      return true;
    }
    daysSpan.innerHTML = t.days;
    hoursSpan.innerHTML = ("0" + t.hours).slice(-2);
    minutesSpan.innerHTML = ("0" + t.minutes).slice(-2);
    secondsSpan.innerHTML = ("0" + t.seconds).slice(-2);
  }
  updateClock();
  var timeinterval = setInterval(updateClock, 1000);
}
// countdown 17 seconds
//var deadline = new Date(Date.parse(new Date()) + 17 * 1000); 
// set specific date and time
var deadline = "<?php echo $deadline;?>:00"; 
initializeClock("countdown", deadline);
</script>
<?php } ?>

</body>
</html>