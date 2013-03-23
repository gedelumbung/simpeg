
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
		<?php echo form_open('data_keluarga/simpan','class="form-horizontal"'); ?>
		  <div class="control-group">
		  	<legend>Data DP3 - <?php echo $this->session->userdata("nama_pegawai"); ?></legend>
			<label class="control-label" for="tahun">Tahun</label>
			<div class="controls">
			  <input type="text" class="span6" name="tahun" id="tahun" value="<?php echo $tahun; ?>" 
			  placeholder="Tahun" disabled>
			</div>
		  </div>
		  
		  <div class="control-group">
			<label class="control-label" for="kesetiaan">Kesetiaan</label>
			<div class="controls">
			  <input type="text" class="span6" name="kesetiaan" id="kesetiaan" value="<?php echo $kesetiaan; ?>" 
			  placeholder="Kesetiaan" disabled>
			</div>
		  </div>
		  
		  <div class="control-group">
			<label class="control-label" for="prestasi">Prestasi</label>
			<div class="controls">
			  <input type="text" class="span6" name="prestasi" id="prestasi" value="<?php echo $prestasi; ?>" 
			  placeholder="Prestasi" disabled>
			</div>
		  </div>
		  
		  <div class="control-group">
			<label class="control-label" for="tanggung_jawab">Tanggung Jawab</label>
			<div class="controls">
			  <input type="text" class="span6" name="tanggung_jawab" id="tanggung_jawab" value="<?php echo $tanggung_jawab; ?>" 
			  placeholder="Tanggung Jawab" disabled>
			</div>
		  </div>
		  
		  <div class="control-group">
			<label class="control-label" for="ketaatan">Ketaatan</label>
			<div class="controls">
			  <input type="text" class="span6" name="ketaatan" id="ketaatan" value="<?php echo $ketaatan; ?>" 
			  placeholder="Ketaatan" disabled>
			</div>
		  </div>
		  
		  <div class="control-group">
			<label class="control-label" for="kejujuran">Kejujuran</label>
			<div class="controls">
			  <input type="text" class="span6" name="kejujuran" id="kejujuran" value="<?php echo $kejujuran; ?>" 
			  placeholder="Kejujuran" disabled>
			</div>
		  </div>
		  
		  <div class="control-group">
			<label class="control-label" for="kerjasama">Kerja Sama</label>
			<div class="controls">
			  <input type="text" class="span6" name="kerjasama" id="kerjasama" value="<?php echo $kerjasama; ?>" 
			  placeholder="Kerja Sama" disabled>
			</div>
		  </div>
		  
		  <div class="control-group">
			<label class="control-label" for="prakarsa">Prakarsa</label>
			<div class="controls">
			  <input type="text" class="span6" name="prakarsa" id="prakarsa" value="<?php echo $prakarsa; ?>" 
			  placeholder="Prakarsa" disabled>
			</div>
		  </div>
		  
		  <div class="control-group">
			<label class="control-label" for="kepemimpinan">Kepemimpinan</label>
			<div class="controls">
			  <input type="text" class="span6" name="kepemimpinan" id="kepemimpinan" value="<?php echo $kepemimpinan; ?>" 
			  placeholder="Kepemimpinan" disabled>
			</div>
		  </div>
		  
		  <div class="control-group">
			<label class="control-label" for="rata-rata">Rata-Rata</label>
			<div class="controls">
			  <input type="text" class="span6" name="rata-rata" id="rata-rata" value="<?php echo $rata_rata; ?>" 
			  placeholder="Kepemimpinan" disabled>
			</div>
		  </div>
		  
		  <div class="control-group">
			<label class="control-label" for="atasan">Atasan</label>
			<div class="controls">
			  <input type="text" class="span6" name="atasan" id="atasan" value="<?php echo $atasan; ?>" 
			  placeholder="Atasan" disabled>
			</div>
		  </div>
		  
		  <div class="control-group">
			<label class="control-label" for="penilai">Penilai</label>
			<div class="controls">
			  <input type="text" class="span6" name="penilai" id="penilai" value="<?php echo $penilai; ?>" 
			  placeholder="Penilai" disabled>
			</div>
		  </div>
		  
		  <div class="control-group">
			<label class="control-label" for="mengetahui">Mengetahui</label>
			<div class="controls">
			  <input type="text" class="span6" name="mengetahui" id="mengetahui" value="<?php echo $mengetahui; ?>" 
			  placeholder="Mengetahui" disabled>
			</div>
		  </div>
		  
		  <input type="hidden" name="id_param" value="<?php echo $id_param; ?>">
		  <input type="hidden" name="id_pegawai" value="<?php echo $id_pegawai; ?>">
		  <input type="hidden" name="st" value="<?php echo $st; ?>">
		<?php echo form_close(); ?>
	</div>    
	
  </body>
</html>
