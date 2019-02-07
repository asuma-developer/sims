<html>
<head>
<title>Upload Form</title>
</head>
<body>
<?php echo form_open_multipart('sims/do_upload');?>
<?php echo "<input type='file' name='file' size='20' />"; ?>
<?php echo "<input type='submit' name='submit' value='upload' /> ";?>
<?php echo "</form>"?>
</body>
</html>
