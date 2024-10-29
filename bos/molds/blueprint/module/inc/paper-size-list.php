<ul class="brick-wrap">
	<li><input type="radio" name="papersize" value="none" <?php echo ($row->b3grid['contain'] == 'none') ? 'checked' : ''; ?>/> NONE<br /><small>(fluid)</small></li>
	<li><input type="radio" name="papersize" value="a0" <?php echo ($row->b3grid['contain'] == 'a0') ? 'checked' : ''; ?>/> a0<br /><small>(841 x 1189mm)</small></li>
	<li><input type="radio" name="papersize" value="a1" <?php echo ($row->b3grid['contain'] == 'a1') ? 'checked' : ''; ?>/> a1<br /><small>(594 x 841mm)</small></li>
	<li><input type="radio" name="papersize" value="a2" <?php echo ($row->b3grid['contain'] == 'a2') ? 'checked' : ''; ?>/> a2<br /><small>(420 x 594mm)</small></li>
	<li><input type="radio" name="papersize" value="a3" <?php echo ($row->b3grid['contain'] == 'a3') ? 'checked' : ''; ?>/> a3<br /><small>(297 x 420mm)</small></li>
	<li><input type="radio" name="papersize" value="a4" <?php echo ($row->b3grid['contain'] == 'a4') ? 'checked' : ''; ?>/> a4<br /><small>(210 x 297mm)</small></li>
	<li><input type="radio" name="papersize" value="a5" <?php echo ($row->b3grid['contain'] == 'a5') ? 'checked' : ''; ?>/> a5<br /><small>(148 x 210mm)</small></li>
	<li><input type="radio" name="papersize" value="a6" <?php echo ($row->b3grid['contain'] == 'a6') ? 'checked' : ''; ?>/> a6<br /><small>(105 x 148mm)</small></li>
	<li><input type="radio" name="papersize" value="a7" <?php echo ($row->b3grid['contain'] == 'a7') ? 'checked' : ''; ?>/> a7<br /><small>(74 x 105mm)</small></li>
	<li><input type="radio" name="papersize" value="b5" <?php echo ($row->b3grid['contain'] == 'b5') ? 'checked' : ''; ?>/> b5<br /><small>(176 x 250mm)</small></li>
	<li><input type="radio" name="papersize" value="c5" <?php echo ($row->b3grid['contain'] == 'c5') ? 'checked' : ''; ?>/> c5<br /><small>(162 x 229mm)</small></li>
	<li><input type="radio" name="papersize" value="letter" <?php echo ($row->b3grid['contain'] == 'letter') ? 'checked' : ''; ?>/> letter<br /><small>(8.5 x 11in)</small></li>
	<li><input type="radio" name="papersize" value="gov-letter" <?php echo ($row->b3grid['contain'] == 'gov-letter') ? 'checked' : ''; ?>/> gov-letter<br /><small>(8 x 10in)</small></li>
	<li><input type="radio" name="papersize" value="half-letter" <?php echo ($row->b3grid['contain'] == 'half-letter') ? 'checked' : ''; ?>/> half-letter<br /><small>(5.5 x 8.5in)</small></li>
	<li><input type="radio" name="papersize" value="legal" <?php echo ($row->b3grid['contain'] == 'legal') ? 'checked' : ''; ?>/> legal<br /><small>(8.5 x 14in)</small></li>
	<li><input type="radio" name="papersize" value="gov-legal" <?php echo ($row->b3grid['contain'] == 'gov-legal') ? 'checked' : ''; ?>/> gov-legal<br /><small>(8.5 x 13in)</small></li>
	<li><input type="radio" name="papersize" value="tabloid" <?php echo ($row->b3grid['contain'] == 'tabloid') ? 'checked' : ''; ?>/> tabloid<br /><small>(11 x 17in)</small></li>
	<li><input type="radio" name="papersize" value="ledger" <?php echo ($row->b3grid['contain'] == 'ledger') ? 'checked' : ''; ?>/> ledger<br /><small>(17 x 11in)</small></li>
	<li><input type="radio" name="papersize" value="jr-legal" <?php echo ($row->b3grid['contain'] == 'jr-legal') ? 'checked' : ''; ?>/> jr-legal<br /><small>(5 x 8in)</small></li>
</ul>