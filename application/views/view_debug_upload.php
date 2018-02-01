<?php
	echo form_open_multipart(site_url('auth/debug_upload'),'class="form-register"');
?>
	<input type="file" name="test_upload">
	<input type="submit" name="submit" value="submit">
<?php
	echo form_close();
?>
