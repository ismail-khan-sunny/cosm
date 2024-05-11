<option>Select One</option>
<?php foreach($processes as $process_id=>$process): ?>
	<option value="<?php echo $process_id ?>"><?php echo $process; ?></option>
<?php endforeach; ?>