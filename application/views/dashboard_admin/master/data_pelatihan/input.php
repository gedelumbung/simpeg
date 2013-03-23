
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
	<link href="<?php echo base_url(); ?>asset/css/chosen.css" rel="stylesheet" type="text/css">
	<style>
		body{
			margin:20px;
			}
	</style>
	
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="<?php echo base_url(); ?>asset/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>asset/js/application.js"></script>
    <script src="<?php echo base_url(); ?>asset/js/bootstrap-tooltip.js"></script>
    <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/themes/sunny/jquery-ui.css" type="text/css" rel="stylesheet"/>	
	<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/jquery-ui-1.7.2.custom.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/jquery.ui.i18n.all.min.js"></script>
	<script type="text/javascript">
	$(function(){
		$.datepicker.setDefaults($.datepicker.regional['id']);
		$('#tanggal_sertifikat').datepicker({dateFormat: 'dd MM yy'});
	});
	</script>
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
		<?php echo form_open('data_pelatihan/simpan','class="form-horizontal"'); ?>
		  <div class="control-group">
		  	<legend>Data Pelatihan - <?php echo $this->session->userdata("nama_pegawai"); ?></legend>
			<label class="control-label" for="id_master_pelatihan">Nama Pelatihan</label>
			<div class="controls">
			  <select name="id_master_pelatihan" id="id_master_pelatihan" data-placeholder="Nama Pelatihan" class="chzn-select" style="width:300px;" tabindex="2">
			<option value=""></option>
			  	<?php
			  		foreach($mst_pelatihan->result_array() as $mp)
			  		{
			  			if($id_master_pelatihan==$mp['id_pelatihan'])
			  			{
			  	?>
			  		<option value="<?php echo $mp['id_pelatihan']; ?>" selected="selected"><?php echo $mp['nama_pelatihan']; ?></option>
			  	<?php
			  			}
			  			else
			  			{
			  	?>
			  		<option value="<?php echo $mp['id_pelatihan']; ?>"><?php echo $mp['nama_pelatihan']; ?></option>
			  	<?php
			  			}
			  		}
			  	?>
			  </select>
			</div>
		  </div>
		  
		  <div class="control-group">
			<label class="control-label" for="uraian">Uraian</label>
			<div class="controls">
			  <textarea type="text" class="span6" name="uraian" id="uraian"
			  placeholder="Uraian"><?php echo $uraian; ?></textarea>
			</div>
		  </div>
		  
		  <div class="control-group">
			<label class="control-label" for="lokasi">Lokasi</label>
			<div class="controls">
			  <select name="lokasi" id="lokasi" data-placeholder="Lokasi Pelatihan" class="chzn-select" style="width:300px;" tabindex="2">
			<option value=""></option>
			  	<?php
			  		foreach($mst_lokasi->result_array() as $mp)
			  		{
			  			if($lokasi==$mp['id_lokasi_pelatihan'])
			  			{
			  	?>
			  		<option value="<?php echo $mp['id_lokasi_pelatihan']; ?>" selected="selected"><?php echo $mp['nama_lokasi']; ?></option>
			  	<?php
			  			}
			  			else
			  			{
			  	?>
			  		<option value="<?php echo $mp['id_lokasi_pelatihan']; ?>"><?php echo $mp['nama_lokasi']; ?></option>
			  	<?php
			  			}
			  		}
			  	?>
			  </select>
			</div>
		  </div>
		  
		  <div class="control-group">
			<label class="control-label" for="tanggal_sertifikat">Tanggal Sertifikat</label>
			<div class="controls">
			  <input type="text" class="span6" name="tanggal_sertifikat" id="tanggal_sertifikat" value="<?php echo $tanggal_sertifikat; ?>" 
			  placeholder="Tanggal Sertifikat">
			</div>
		  </div>
		  
		  <div class="control-group">
			<label class="control-label" for="jam_pelatihan">Jam Pelatihan</label>
			<div class="controls">
			  <input type="text" class="span6" name="jam_pelatihan" id="jam_pelatihan" value="<?php echo $jam_pelatihan; ?>" 
			  placeholder="Jam Pelatihan">
			</div>
		  </div>
		  
		  <div class="control-group">
			<label class="control-label" for="negara">Negara</label>
			<div class="controls">
			  <input type="text" class="span6" name="negara" id="negara" value="<?php echo $negara; ?>" 
			  placeholder="Negara">
			</div>
		  </div>
		  
		  <input type="hidden" name="id_param" value="<?php echo $id_param; ?>">
		  <input type="hidden" name="id_pegawai" value="<?php echo $id_pegawai; ?>">
		  <input type="hidden" name="st" value="<?php echo $st; ?>">
		  <div class="control-group">
			<div class="controls">
			  <button type="submit" class="btn btn-primary">Simpan Data</button>
			  <button type="reset" class="btn">Hapus Data</button>
			</div>
		  </div>
		  <script src="http://localhost/sgmc/asset/js/chosen.jquery.js" type="text/javascript"></script>
			<script type="text/javascript"> 
				$(".chzn-select").chosen();
			</script>
		<?php echo form_close(); ?>
	</div>    
	
  </body>
</html>
