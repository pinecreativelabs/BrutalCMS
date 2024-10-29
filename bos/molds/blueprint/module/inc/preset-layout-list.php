<ul class="brick-wrap">
	<?php if($row['method']!='bento'){?>
	<li><input type="radio" name="preset" value="1col" <?php echo ($row['preset'] == '1col') ? 'checked' : ''; ?>/><img src="inc/imgs/1col.svg" alt="single column" /></li>
	<li><input type="radio" name="preset" value="2col" <?php echo ($row['preset'] == '2col') ? 'checked' : ''; ?>/><img src="inc/imgs/2col.svg" alt="two column" /></li>
	<li><input type="radio" name="preset" value="3col" <?php echo ($row['preset'] == '3col') ? 'checked' : ''; ?>/><img src="inc/imgs/3col.svg" alt="three column" /></li>
	<li><input type="radio" name="preset" value="3col-sl" <?php echo ($row['preset'] == '3col-sl') ? 'checked' : ''; ?>/><img src="inc/imgs/3col-sl.svg" alt="three column split left" /></li>
	<li><input type="radio" name="preset" value="3col-sr" <?php echo ($row['preset'] == '3col-sr') ? 'checked' : ''; ?>/><img src="inc/imgs/3col-sr.svg" alt="three column split right" /></li>
	<li><input type="radio" name="preset" value="4col" <?php echo ($row['preset'] == '4col') ? 'checked' : ''; ?>/><img src="inc/imgs/4col.svg" alt="four column" /></li>
	<li><input type="radio" name="preset" value="ls" <?php echo ($row['preset'] == 'ls') ? 'checked' : ''; ?>/><img src="inc/imgs/left-sidebar.svg" alt="left sidebar" /></li>
	<li><input type="radio" name="preset" value="rs" <?php echo ($row['preset'] == 'rs') ? 'checked' : ''; ?>/><img src="inc/imgs/right-sidebar.svg" alt="right-sidebar" /></li>
	<li><input type="radio" name="preset" value="1over-sms" <?php echo ($row['preset'] == '1over-sms') ? 'checked' : ''; ?>/><img src="inc/imgs/1over-sms.svg" alt="1over-sms" /></li>
	<li><input type="radio" name="preset" value="1over-ls" <?php echo ($row['preset'] == '1over-ls') ? 'checked' : ''; ?>/><img src="inc/imgs/1over-ls.svg" alt="left sidebar" /></li>
	<li><input type="radio" name="preset" value="1over-rs" <?php echo ($row['preset'] == '1over-rs') ? 'checked' : ''; ?>/><img src="inc/imgs/1over-rs.svg" alt="right sidebar" /></li>
	<li><input type="radio" name="preset" value="1over1x2-l" <?php echo ($row['preset'] == '1over1x2-l') ? 'checked' : ''; ?>/><img src="inc/imgs/1over1x2-l.svg" alt="1over1x2-left" /></li>
	<li><input type="radio" name="preset" value="1over1x2-r" <?php echo ($row['preset'] == '1over1x2-r') ? 'checked' : ''; ?>/><img src="inc/imgs/1over1x2-r.svg" alt="1over1x2-right" /></li>
	<li><input type="radio" name="preset" value="1over1" <?php echo ($row['preset'] == '1over1') ? 'checked' : ''; ?>/><img src="inc/imgs/1col-header.svg" alt="one over one" /></li>
	<li><input type="radio" name="preset" value="1over2" <?php echo ($row['preset'] == '1over2') ? 'checked' : ''; ?>/><img src="inc/imgs/1over2.svg" alt="one over two" /></li>
	<li><input type="radio" name="preset" value="1over3" <?php echo ($row['preset'] == '1over3') ? 'checked' : ''; ?>/><img src="inc/imgs/1over3.svg" alt="one over three" /></li>
	<li><input type="radio" name="preset" value="1over4" <?php echo ($row['preset'] == '1over4') ? 'checked' : ''; ?>/><img src="inc/imgs/1over4.svg" alt="one over four" /></li>
	<li><input type="radio" name="preset" value="1over2x2" <?php echo ($row['preset'] == 'over2x2') ? 'checked' : ''; ?>/><img src="inc/imgs/1over2x2.svg" alt="one over 2x2" /></li>
	<li><input type="radio" name="preset" value="2x1-4col" <?php echo ($row['preset'] == '2x1-4col') ? 'checked' : ''; ?>/><img src="inc/imgs/2x1-4col.svg" alt="2x1-4col" /></li>
	<li><input type="radio" name="preset" value="1x2" <?php echo ($row['preset'] == '1x2') ? 'checked' : ''; ?>/><img src="inc/imgs/1x2.svg" alt="1x2" /></li>
	<li><input type="radio" name="preset" value="1x2-left" <?php echo ($row['preset'] == '1x2-left') ? 'checked' : ''; ?>/><img src="inc/imgs/1x2-left.svg" alt="1x2-left" /></li>
	<li><input type="radio" name="preset" value="1x2-right" <?php echo ($row['preset'] == '1x2-right') ? 'checked' : ''; ?>/><img src="inc/imgs/1x2-right.svg" alt="1x2-right" /></li>
	<li><input type="radio" name="preset" value="2x2" <?php echo ($row['preset'] == '2x2') ? 'checked' : ''; ?>/><img src="inc/imgs/2x2.svg" alt="2x2" /></li>
	<li><input type="radio" name="preset" value="2x2-split" <?php echo ($row['preset'] == '2x2-split') ? 'checked' : ''; ?>/><img src="inc/imgs/2x2-split.svg" alt="2x2-split" /></li>
	<li><input type="radio" name="preset" value="2x4" <?php echo ($row['preset'] == '2x4') ? 'checked' : ''; ?>/><img src="inc/imgs/2x4.svg" alt="2x4" /></li>
	<li><input type="radio" name="preset" value="4x2" <?php echo ($row['preset'] == '4x2') ? 'checked' : ''; ?>/><img src="inc/imgs/4x2.svg" alt="4x2" /></li>
	<li><input type="radio" name="preset" value="3x3" <?php echo ($row['preset'] == '3x3') ? 'checked' : ''; ?>/><img src="inc/imgs/3x3.svg" alt="3x3" /></li>
	<li><input type="radio" name="preset" value="4x4" <?php echo ($row['preset'] == '4x4') ? 'checked' : ''; ?>/><img src="inc/imgs/4x4.svg" alt="4x4" /></li>
	<?php } else {?>
	<li><input type="radio" name="preset" value="1-1" <?php echo ($row['preset'] == '1-1') ? 'checked' : ''; ?>/><img src="inc/imgs/bento-1-1.svg" alt="2col" /></li>
	<li><input type="radio" name="preset" value="1-1-1" <?php echo ($row['preset'] == '1-1-1') ? 'checked' : ''; ?>/><img src="inc/imgs/bento-1-1-1.svg" alt="3col" /></li>
	<li><input type="radio" name="preset" value="1-1-1-1" <?php echo ($row['preset'] == '1-1-1-1') ? 'checked' : ''; ?>/><img src="inc/imgs/bento-1-1-1-1.svg" alt="4col" /></li>
	<li><input type="radio" name="preset" value="1-1-2" <?php echo ($row['preset'] == '1-1-2') ? 'checked' : ''; ?>/><img src="inc/imgs/bento-1-1-2.svg" alt="1-1-2" /></li>
	<li><input type="radio" name="preset" value="1-1-3" <?php echo ($row['preset'] == '1-1-3') ? 'checked' : ''; ?>/><img src="inc/imgs/bento-1-1-3.svg" alt="1-1-3" /></li>
	<li><input type="radio" name="preset" value="1-2" <?php echo ($row['preset'] == '1-2') ? 'checked' : ''; ?>/><img src="inc/imgs/bento-1-2.svg" alt="1-2" /></li>
	<li><input type="radio" name="preset" value="2-1" <?php echo ($row['preset'] == '2-1') ? 'checked' : ''; ?>/><img src="inc/imgs/bento-2-1.svg" alt="2-1" /></li>
	<li><input type="radio" name="preset" value="1-3" <?php echo ($row['preset'] == '1-3') ? 'checked' : ''; ?>/><img src="inc/imgs/bento-1-3.svg" alt="1-3" /></li>
	<li><input type="radio" name="preset" value="1-4" <?php echo ($row['preset'] == '1-4') ? 'checked' : ''; ?>/><img src="inc/imgs/bento-1-4.svg" alt="1-4" /></li>
	<li><input type="radio" name="preset" value="2-4" <?php echo ($row['preset'] == '2-4') ? 'checked' : ''; ?>/><img src="inc/imgs/bento-2-4.svg" alt="2-4" /></li>
	<li><input type="radio" name="preset" value="2" <?php echo ($row['preset'] == '2') ? 'checked' : ''; ?>/><img src="inc/imgs/bento-2.svg" alt="2" /></li>
	<li><input type="radio" name="preset" value="3" <?php echo ($row['preset'] == '3') ? 'checked' : ''; ?>/><img src="inc/imgs/bento-3.svg" alt="3" /></li>
	<li><input type="radio" name="preset" value="3-3" <?php echo ($row['preset'] == '3-3') ? 'checked' : ''; ?>/><img src="inc/imgs/bento-3-3.svg" alt="3-3" /></li>
	<li><input type="radio" name="preset" value="3-3-3" <?php echo ($row['preset'] == '3-3-3') ? 'checked' : ''; ?>/><img src="inc/imgs/bento-3-3-3.svg" alt="3-3-3" /></li>
	<li><input type="radio" name="preset" value="quad" <?php echo ($row['preset'] == 'quad') ? 'checked' : ''; ?>/><img src="inc/imgs/bento-quad.svg" alt="quad" /></li>
	<li><input type="radio" name="preset" value="hero" <?php echo ($row['preset'] == 'hero') ? 'checked' : ''; ?>/><img src="inc/imgs/bento-hero.svg" alt="hero" /></li>
	<li><input type="radio" name="preset" value="1-0-2" <?php echo ($row['preset'] == '1-0-2') ? 'checked' : ''; ?>/><img src="inc/imgs/bento-1-0-2.svg" alt="1-0-2" /></li>
	<li><input type="radio" name="preset" value="banner" <?php echo ($row['preset'] == 'banner') ? 'checked' : ''; ?>/><img src="inc/imgs/bento-banner.svg" alt="banner" /></li>
	<li><input type="radio" name="preset" value="bricks" <?php echo ($row['preset'] == 'bricks') ? 'checked' : ''; ?>/><img src="inc/imgs/bento-bricks.svg" alt="bricks" /></li>
	<li><input type="radio" name="preset" value="pack" <?php echo ($row['preset'] == 'pack') ? 'checked' : ''; ?>/><img src="inc/imgs/bento-pack.svg" alt="pack" /></li>
	<?php } ?>
</ul>