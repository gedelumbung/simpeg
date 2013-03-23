
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
	<?php if(validation_errors()) { ?>
	<div class="alert alert-block">
	  <button type="button" class="close" data-dismiss="alert">×</button>
	  	<h4>Terjadi Kesalahan!</h4>
		<?php echo validation_errors(); ?>
	</div>
	<?php } ?>
		<?php echo form_open('master_unit_kerja/simpan','class="form-horizontal"'); ?>
		  <div class="control-group">
		  	<legend>Master Unit Kerja</legend>
			<label class="control-label" for="nama_unit_kerja">Nama Unit Kerja</label>
			<div class="controls">
			  <input type="text" class="span" name="nama_unit_kerja" id="nama_unit_kerja" value="<?php echo $nama_unit_kerja; ?>" placeholder="Nama Unit Kerja">
			</div>
		  </div>
		  <div class="control-group">
			<label class="control-label" for="eselon">Eselon</label>
			<div class="controls">
			  <input type="text" class="span" name="eselon" id="eselon" value="<?php echo $eselon; ?>" placeholder="Eseleon">
			</div>
		  </div>
		  <div class="control-group">
			<label class="control-label" for="parent_unit">Parent Unit</label>
			<div class="controls">
			  <input type="text" class="span" name="parent_unit" id="parent_unit" value="<?php echo $parent_unit; ?>" placeholder="Parent Unit">
			</div>
		  </div>
		  <input type="hidden" name="id_param" value="<?php echo $id_param; ?>">
		  <input type="hidden" name="st" value="<?php echo $st; ?>">
		  <div class="control-group">
			<div class="controls">
			  <button type="submit" class="btn btn-primary">Simpan Data</button>
			  <button type="reset" class="btn">Hapus Data</button>
			</div>
		  </div>
		<?php echo form_close(); ?>
	</div>    
	
  </body>
</html>
