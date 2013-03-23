
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="<?php echo base_url(); ?>asset/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>asset/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>asset/css/docs.css" rel="stylesheet">
	<style>
		body{
			margin:20px;
			}
	</style>
	
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="<?php echo base_url(); ?>asset/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>asset/js/application.js"></script>
    <script src="<?php echo base_url(); ?>asset/js/bootstrap-tooltip.js"></script>
  </head>

  <body>
	<div class="well">
		<?php echo form_open('master_eselon/simpan','class="form-horizontal"'); ?>
		  <div class="control-group">
		  	<legend>Master Pelatihan</legend>
			<label class="control-label" for="nama_pelatihan">Nama Pelatihan</label>
			<div class="controls">
			  <input type="text" class="span" name="nama_pelatihan" id="nama_pelatihan" value="<?php echo $nama_pelatihan; ?>" disabled placeholder="Nama Pelatihan">
			</div>
		  </div>
		  <div class="control-group">
			<label class="control-label" for="level">Level</label>
			<div class="controls">
			  <input type="text" class="span" name="level" id="level" value="<?php echo $level; ?>" disabled placeholder="Level">
			</div>
		  </div>
		<?php echo form_close(); ?>
	</div>    
	
  </body>
</html>
