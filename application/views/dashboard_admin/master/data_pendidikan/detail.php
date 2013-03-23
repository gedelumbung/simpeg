
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
		  	<legend>Data Pendidikan - <?php echo $this->session->userdata("nama_pegawai"); ?></legend>
			<label class="control-label" for="tingkat_pendidikan">Tingkat Pendidikan</label>
			<div class="controls">
			  <input type="text" class="span6" name="tingkat_pendidikan" id="tingkat_pendidikan" value="<?php echo $tingkat_pendidikan; ?>" 
			  placeholder="Tingkat Pendidikan" disabled>
			</div>
		  </div>
		  
		  <div class="control-group">
			<label class="control-label" for="jurusan">Jurusan</label>
			<div class="controls">
			  <input type="text" class="span6" name="jurusan" id="jurusan" value="<?php echo $jurusan; ?>" 
			  placeholder="Jurusan" disabled>
			</div>
		  </div>
		  
		  <div class="control-group">
			<label class="control-label" for="uraian">Uraian</label>
			<div class="controls">
			  <textarea class="span6" name="uraian" id="uraian"
			  placeholder="Uraian" disabled><?php echo $uraian; ?></textarea>
			</div>
		  </div>
		  
		  <div class="control-group">
			<label class="control-label" for="teknik_non_teknik">Teknik / Non Teknik</label>
			<div class="controls">
			<?php
				$teknik = 'selected="selected"';
				$non_teknik = 'selected="selected"';
				if($teknik_non_teknik=="teknik")
				{
					$teknik = 'selected="selected"';
					$non_teknik = '';
				}
				else if($teknik_non_teknik=="non teknik")
				{
					$teknik = '';
					$non_teknik = 'selected="selected"';
				}
			?>
			<select name="teknik_non_teknik" disabled>
				<option value="teknik" <?php echo $teknik; ?>>Teknik</option>
				<option value="non teknik" <?php echo $non_teknik; ?>>Non Teknik</option>
			</select>
			</div>
		  </div>
		  
		  <div class="control-group">
			<label class="control-label" for="sekolah">Sekolah</label>
			<div class="controls">
			  <input type="text" class="span6" name="sekolah" id="sekolah" value="<?php echo $sekolah; ?>" 
			  placeholder="Sekolah" disabled>
			</div>
		  </div>
		  
		  <div class="control-group">
			<label class="control-label" for="tempat_sekolah">Tempat Sekolah</label>
			<div class="controls">
			  <input type="text" class="span6" name="tempat_sekolah" id="tempat_sekolah" value="<?php echo $tempat_sekolah; ?>" 
			  placeholder="Tempat Sekolah" disabled>
			</div>
		  </div>
		  
		  <div class="control-group">
			<label class="control-label" for="nomor_sttb">Nomor STTB</label>
			<div class="controls">
			  <input type="text" class="span6" name="nomor_sttb" id="nomor_sttb" value="<?php echo $nomor_sttb; ?>" 
			  placeholder="Nomor STTB" disabled>
			</div>
		  </div>
		  
		  <div class="control-group">
			<label class="control-label" for="tanggal_sttb">Tanggal STTB</label>
			<div class="controls">
			  <input type="text" class="span6" name="tanggal_sttb" id="tanggal_sttb" value="<?php echo $tanggal_sttb; ?>" 
			  placeholder="Tanggal STTB" disabled>
			</div>
		  </div>
		  
		  <div class="control-group">
			<label class="control-label" for="tanggal_lulus">Tanggal Lulus</label>
			<div class="controls">
			  <input type="text" class="span6" name="tanggal_lulus" id="tanggal_lulus" value="<?php echo $tanggal_lulus; ?>" 
			  placeholder="Tanggal Lulus" disabled>
			</div>
		  </div>
		  
		  <input type="hidden" name="id_param" value="<?php echo $id_param; ?>">
		  <input type="hidden" name="id_pegawai" value="<?php echo $id_pegawai; ?>">
		  <input type="hidden" name="st" value="<?php echo $st; ?>">
		<?php echo form_close(); ?>
	</div>    
	
  </body>
</html>
