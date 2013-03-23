	<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/themes/sunny/jquery-ui.css" type="text/css" rel="stylesheet"/>	
	<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/jquery-ui-1.7.2.custom.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/jquery.ui.i18n.all.min.js"></script>
	<script type="text/javascript">
	$(function(){
		$.datepicker.setDefaults($.datepicker.regional['id']);
		$('#tanggal_lahir').datepicker({dateFormat: 'dd MM yy'});
		$('#tanggal_pengangkatan_cpns').datepicker({dateFormat: 'dd MM yy'});
		$('#tanggal_sk_pangkat').datepicker({dateFormat: 'dd MM yy'});
		$('#tanggal_mulai_pangkat').datepicker({dateFormat: 'dd MM yy'});
		$('#tanggal_selesai_pangkat').datepicker({dateFormat: 'dd MM yy'});
		$('#tanggal_sk_jabatan').datepicker({dateFormat: 'dd MM yy'});
		$('#tanggal_mulai_jabatan').datepicker({dateFormat: 'dd MM yy'});
		$('#tanggal_selesai_jabatan').datepicker({dateFormat: 'dd MM yy'});
		$('#tmt_eselon').datepicker({dateFormat: 'dd MM yy'});
	});
	</script>
<section id="data-pegawai">
  <div class="well">
  <div class="navbar navbar-inverse">
	  <div class="navbar-inner">
		<div class="container">
		  <a class="brand" href="#">Data Pegawai</a>
		  <div class="nav-collapse">
			<ul class="nav">
			  <li><a href="<?php echo base_url(); ?>pegawai/hapus/<?php echo $this->session->userdata("kode_pegawai"); ?>" onclick="return confirm('Anda yakin??');"><i class="icon-remove-sign icon-white"></i> Hapus Data Pegawai</a></li>
			</ul>
		  </div>
			<div class="span6 pull-right">
				<div class="btn-group pull-right">
				  <button class="btn btn-primary"><i class="icon-user icon-white"></i> <?php echo $this->session->userdata('nama_pegawai'); ?></button>
				  <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
					<span class="caret"></span>
				  </button>
				</div>
			</div>
		</div>
	  </div><!-- /navbar-inner -->
	</div><!-- /navbar -->
	<?php echo form_open_multipart('pegawai/simpan','class="form-horizontal"'); ?>
	<ul id="myTab" class="nav nav-tabs">
        <li class="active"><a href="#dtpegawai" data-toggle="tab">Data Pegawai</a></li>
        <li><a href="#dtpangkat" data-toggle="tab">Data Pangkat</a></li>
        <li><a href="#dtjabatan" data-toggle="tab">Data Jabatan</a></li>
        <li><a href="#dtfoto" data-toggle="tab">Foto Pegawai</a></li>
    </ul>
    <?php if(validation_errors()) { ?>
	<div class="alert alert-block">
	  <button type="button" class="close" data-dismiss="alert">×</button>
	  	<h4>Terjadi Kesalahan!</h4>
		<?php echo validation_errors(); ?>
	</div>
	<?php } ?>
    <div id="myTabContent" class="tab-content">
        <div class="tab-pane fade in active" id="dtpegawai">
                
        <div class="control-group">
			<label class="control-label" for="nip">NIP</label>
			<div class="controls">
			<?php
			if($st=="tambah")
			{
			?>
			  <input type="text" class="span6" name="nip" id="nip" value="<?php echo set_value('nip'); ?>" placeholder="NIP">
			<?php
			}
			else
			{
			?>
			  <input type="text" class="span6" name="nip" id="nip" value="<?php echo $nip; ?>" placeholder="NIP">
			<?php
			}
			?>
			</div>
		  </div>
		  <div class="control-group">
			<label class="control-label" for="nip_lama">NIP Lama</label>
			<div class="controls">
			<?php
			if($st=="tambah")
			{
			?>
			  <input type="text" class="span6" name="nip_lama" id="nip_lama" value="<?php echo set_value('nip_lama'); ?>" placeholder="NIP Lama">
			<?php
			}
			else
			{
			?>
			  <input type="text" class="span6" name="nip_lama" id="nip_lama" value="<?php echo $nip_lama; ?>" placeholder="NIP Lama">
			<?php
			}
			?>
			</div>
		  </div>
		  <div class="control-group">
			<label class="control-label" for="no_kartu_pegawai">Nomor Kartu Pegawai</label>
			<div class="controls">
			<?php
			if($st=="tambah")
			{
			?>
			  <input type="text" class="span6" name="no_kartu_pegawai" id="no_kartu_pegawai" value="<?php echo set_value('no_kartu_pegawai'); ?>" placeholder="Nomor Kartu Pegawai">
			<?php
			}
			else
			{
			?>
			  <input type="text" class="span6" name="no_kartu_pegawai" id="no_kartu_pegawai" value="<?php echo $no_kartu_pegawai; ?>" placeholder="Nomor Kartu Pegawai">
			<?php
			}
			?>
			</div>
		  </div>
		  <div class="control-group">
			<label class="control-label" for="nama_pegawai">Nama Pegawai</label>
			<div class="controls">
			<?php
			if($st=="tambah")
			{
			?>
			  <input type="text" class="span6" name="nama_pegawai" id="nama_pegawai" value="<?php echo set_value('nama_pegawai'); ?>" placeholder="Nama Pegawai">
			<?php
			}
			else
			{
			?>
			  <input type="text" class="span6" name="nama_pegawai" id="nama_pegawai" value="<?php echo $nama_pegawai; ?>" placeholder="Nama Pegawai">
			<?php
			}
			?>
			</div>
		  </div>
		  <div class="control-group">
			<label class="control-label" for="jenis_kelamin">Jenis Kelamin</label>
			<div class="controls">
				<select data-placeholder="Jenis Kelamin" class="chzn-select" style="width:500px;" tabindex="2" name="jenis_kelamin" id="jenis_kelamin">
					<?php
					$laki="";$perempuan="";$kosong1="";
					if($jenis_kelamin=="Laki-Laki"){ $laki='selected="selected"';$perempuan="";$kosong1=""; }
					else if($jenis_kelamin=="Perempuan"){ $laki='';$perempuan='selected="selected"';$kosong1=""; }
					else { $laki='';$perempuan='';$kosong1='selected="selected"'; }
					?>
          			<option value="" <?php echo $kosong1; ?>></option>
          			<option value="Laki-Laki" <?php echo $laki; ?>>Laki-Laki</option>
          			<option value="Perempuan" <?php echo $perempuan; ?>>Perempuan</option>
				</select>
			</div>
		  </div>
		  <div class="control-group">
			<label class="control-label" for="agama">Agama</label>
			<div class="controls">
				<select data-placeholder="Agama" class="chzn-select" style="width:500px;" tabindex="2" name="agama" id="agama">
					<?php
					$islam="";$hindu="";$budha="";$protestan="";$katolik="";$konghucu="";$lainnya="";$kosong="";$kristen="";
					if($agama==""){ $islam='';$hindu='';$budha='';$protestan='';$katolik='';$konghucu='';$lainnya='';$kosong='selected="selected"';$kristen=""; }
					else if($agama=="Hindu"){ $islam='';$hindu='selected="selected"';$budha='';$protestan='';$katolik='';$konghucu='';$lainnya='';$kristen="";$kosong=""; }
					else if($agama=="Budha"){ $islam='';$hindu='';$budha='selected="selected"';$protestan='';$katolik='';$konghucu='';$lainnya='';$kristen="";$kosong=""; }
					else if($agama=="Kristen"){ $islam='';$hindu='';$budha='';$protestan='';$katolik='';$konghucu='';$lainnya='';$kosong="";$kristen='selected="selected"'; }
					else if($agama=="Kristen Protestan"){ $islam='';$hindu='';$budha='';$protestan='selected="selected"';$katolik='';$konghucu='';$kristen="";$lainnya='';$kosong=""; }
					else if($agama=="Kristen Katolik"){ $islam='';$hindu='';$budha='';$protestan='';$katolik='selected="selected"';$konghucu='';$kristen="";$lainnya='';$kosong=""; }
					else if($agama=="Konghucu"){ $islam='';$hindu='';$budha='';$protestan='';$katolik='';$konghucu='selected="selected"';$lainnya='';$kristen="";$kosong=""; }
					else if($agama=="Lainnya"){ $islam='';$hindu='';$budha='';$protestan='';$katolik='';$konghucu='';$lainnya='selected="selected"';$kristen="";$kosong=""; }
					else if($agama=="Islam"){ $islam='selected="selected"';$hindu='';$budha='';$protestan='';$katolik='';$konghucu='';$lainnya='';$kristen="";$kosong=""; }
					?>
          			<option value="" <?php echo $kosong; ?>></option>
          			<option value="Islam" <?php echo $islam; ?>>Islam</option>
          			<option value="Hindu" <?php echo $hindu; ?>>Hindu</option>
          			<option value="Budha" <?php echo $budha; ?>>Budha</option>
          			<option value="Kristen" <?php echo $kristen; ?>>Kristen</option>
          			<option value="Kristen Protestan" <?php echo $protestan; ?>>Kristen Protestan</option>
          			<option value="Kristen Katolik" <?php echo $katolik; ?>>Kristen Katolik</option>
          			<option value="Konghucu" <?php echo $konghucu; ?>>Konghucu</option>
          			<option value="Lainnya" <?php echo $lainnya; ?>>Lainnya</option>
				</select>
			</div>
		  </div>
		  <div class="control-group">
			<label class="control-label" for="status_pegawai">Status Pegawai</label>
			<div class="controls">
				<select data-placeholder="Status Pegawai" class="chzn-select" style="width:500px;" tabindex="2" name="status_pegawai" id="status_pegawai">
          			<option value=""></option>
					<?php
						foreach($mst_status_pegawai->result_array() as $sp)
						{
							if($sp['id_status_pegawai']==$status_pegawai)
							{
					?>
						<option value="<?php echo $sp['id_status_pegawai']; ?>" selected="selected"><?php echo $sp['nama_status']; ?></option>
					<?php
							}
							else
							{
					?>

						<option value="<?php echo $sp['id_status_pegawai']; ?>"><?php echo $sp['nama_status']; ?></option>
					<?php
							}
						}
					?>
				</select>
			</div>
		  </div>
		  <div class="control-group">
			<label class="control-label" for="tempat_lahir">Tempat Lahir</label>
			<div class="controls">
			<?php
			if($st=="tambah")
			{
			?>
			  <input type="text" class="span6" name="tempat_lahir" id="tempat_lahir" value="<?php echo set_value('tempat_lahir'); ?>" placeholder="Tempat Lahir">
			<?php
			}
			else
			{
			?>
			  <input type="text" class="span6" name="tempat_lahir" id="tempat_lahir" value="<?php echo $tempat_lahir; ?>" placeholder="Tempat Lahir">
			<?php
			}
			?>
			</div>
		  </div>
		  <div class="control-group">
			<label class="control-label" for="no_npwp">Nomor NPWP</label>
			<div class="controls">
			<?php
			if($st=="tambah")
			{
			?>
			  <input type="text" class="span6" name="no_npwp" id="no_npwp" value="<?php echo set_value('no_npwp'); ?>" placeholder="Nomor NPWP">
			<?php
			}
			else
			{
			?>
			  <input type="text" class="span6" name="no_npwp" id="no_npwp" value="<?php echo $no_npwp; ?>" placeholder="Nomor NPWP">
			<?php
			}
			?>
			</div>
		  </div>
		  <div class="control-group">
			<label class="control-label" for="kartu_askes_pegawai">Kartu Askes Pegawai</label>
			<div class="controls">
			<?php
			if($st=="tambah")
			{
			?>
			  <input type="text" class="span6" name="kartu_askes_pegawai" id="kartu_askes_pegawai" value="<?php echo set_value('kartu_askes_pegawai'); ?>" placeholder="Kartu Askes Pegawai">
			<?php
			}
			else
			{
			?>
			  <input type="text" class="span6" name="kartu_askes_pegawai" id="kartu_askes_pegawai" value="<?php echo $kartu_askes_pegawai; ?>" placeholder="Kartu Askes Pegawai">
			<?php
			}
			?>
			</div>
		  </div>
		  <div class="control-group">
			<label class="control-label" for="tanggal_lahir">Tanggal Lahir</label>
			<div class="controls">
			<?php
			if($st=="tambah")
			{
			?>
			  <input type="text" class="span6" name="tanggal_lahir" id="tanggal_lahir" value="<?php echo set_value('tanggal_lahir'); ?>" placeholder="Tanggal Lahir">
			<?php
			}
			else
			{
			?>
			  <input type="text" class="span6" name="tanggal_lahir" id="tanggal_lahir" value="<?php echo $tanggal_lahir; ?>" placeholder="Tanggal Lahir">
			<?php
			}
			?>
			</div>
		  </div>
		  <div class="control-group">
			<label class="control-label" for="usia">Usia</label>
			<div class="controls">
			<?php
			if($st=="tambah")
			{
			?>
			  <input type="text" class="span6" name="usia" id="usia" value="<?php echo set_value('usia'); ?>" placeholder="Usia">
			<?php
			}
			else
			{
			?>
			  <input type="text" class="span6" name="usia" id="usia" value="<?php echo $usia; ?>" placeholder="Usia">
			<?php
			}
			?>
			</div>
		  </div>
		  <div class="control-group">
			<label class="control-label" for="tanggal_pengangkatan_cpns">Tanggal Pengangkatan CPNS</label>
			<div class="controls">
			<?php
			if($st=="tambah")
			{
			?>
			  <input type="text" class="span6" name="tanggal_pengangkatan_cpns" id="tanggal_pengangkatan_cpns" value="<?php echo set_value('tanggal_pengangkatan_cpns'); ?>" placeholder=
			  "Tanggal Pengangkatan CPNS">
			<?php
			}
			else
			{
			?>
			  <input type="text" class="span6" name="tanggal_pengangkatan_cpns" id="tanggal_pengangkatan_cpns" value="<?php echo $tanggal_pengangkatan_cpns; ?>" placeholder=
			  "Tanggal Pengangkatan CPNS">
			<?php
			}
			?>
			</div>
		  </div>
		  <div class="control-group">
			<label class="control-label" for="alamat">Alamat</label>
			<div class="controls">
			<?php
			if($st=="tambah")
			{
			?>
				<textarea class="span6" style="outline:none; resize:none;" name="alamat" id="alamat" placeholder=
			  "Alamat"><?php echo set_value('alamat'); ?></textarea>
			<?php
			}
			else
			{
			?>
				<textarea class="span6" style="outline:none; resize:none;" name="alamat" id="alamat" placeholder=
			  "Alamat"><?php echo $alamat_pegawai; ?></textarea>
			<?php
			}
			?>
			</div>
		  </div>
        
        
    	</div>
        <div class="tab-pane fade" id="dtpangkat">
          <div class="control-group">
			<label class="control-label" for="nip">Status Pegawai</label>
			<div class="controls">
			<select data-placeholder="Status Pegawai" class="chzn-select" style="width:500px;" tabindex="2" name="status_pegawai_pangkat" id="status_pegawai_pangkat">
          			<option value=""></option>
			  	<?php
			  		foreach($mst_status_pegawai->result_array() as $msp)
			  		{
			  			if($status_pegawai_pangkat==$msp['id_status_pegawai'])
			  			{
			  	?>
			  		<option value="<?php echo $msp['id_status_pegawai']; ?>" selected="selected"><?php echo $msp['nama_status']; ?></option>
			  	<?php
			  			}
			  			else
			  			{
			  	?>
			  		<option value="<?php echo $msp['id_status_pegawai']; ?>"><?php echo $msp['nama_status']; ?></option>
			  	<?php
			  			}
			  		}
			  	?>
			</select>
			</div>
		  </div>
          <div class="control-group">
			<label class="control-label" for="nip">Golongan</label>
			<div class="controls">
			<select data-placeholder="Golongan" class="chzn-select" style="width:500px;" tabindex="2" name="id_golongan" id="id_golongan">
			  	<?php
			  		foreach($mst_golongan->result_array() as $mg)
			  		{
			  			if($id_golongan==$mg['id_golongan'])
			  			{
			  	?>
			  		<option value="<?php echo $mg['id_golongan']; ?>" selected="selected"><?php echo $mg['golongan']; ?></option>
			  	<?php
			  			}
			  			else
			  			{
			  	?>
			  		<option value="<?php echo $mg['id_golongan']; ?>"><?php echo $mg['golongan']; ?></option>
			  	<?php
			  			}
			  		}
			  	?>
			</select>
			</div>
		  </div>
          <div class="control-group">
			<label class="control-label" for="nip">Nomor SK</label>
			<div class="controls">
			<?php
			if($st=="tambah")
			{
			?>
			  <input type="text" class="span6" name="nomor_sk_pangkat" id="nomor_sk_pangkat" value="<?php echo set_value('nomor_sk_pangkat'); ?>" placeholder=
			  "Nomor SK Pangkat">
			<?php
			}
			else
			{
			?>
			  <input type="text" class="span6" name="nomor_sk_pangkat" id="nomor_sk_pangkat" value="<?php echo $nomor_sk_pangkat; ?>" placeholder=
			  "Nomor SK Pangkat">
			<?php
			}
			?>
			</div>
		  </div>
          <div class="control-group">
			<label class="control-label" for="nip">Tanggal SK</label>
			<div class="controls">
			<?php
			if($st=="tambah")
			{
			?>
			  <input type="text" class="span6" name="tanggal_sk_pangkat" id="tanggal_sk_pangkat" value="<?php echo set_value('tanggal_sk_pangkat'); ?>" placeholder=
			  "Tanggal SK Pangkat">
			<?php
			}
			else
			{
			?>
			  <input type="text" class="span6" name="tanggal_sk_pangkat" id="tanggal_sk_pangkat" value="<?php echo $tanggal_sk_pangkat; ?>" placeholder=
			  "Tanggal SK Pangkat">
			<?php
			}
			?>
			</div>
		  </div>
          <div class="control-group">
			<label class="control-label" for="nip">Tanggal Mulai</label>
			<div class="controls">
			<?php
			if($st=="tambah")
			{
			?>
			  <input type="text" class="span6" name="tanggal_mulai_pangkat" id="tanggal_mulai_pangkat" value="<?php echo set_value('tanggal_mulai_pangkat'); ?>" placeholder=
			  "Tanggal Mulai Pangkat">
			<?php
			}
			else
			{
			?>
			  <input type="text" class="span6" name="tanggal_mulai_pangkat" id="tanggal_mulai_pangkat" value="<?php echo $tanggal_mulai_pangkat; ?>" placeholder=
			  "Tanggal Mulai Pangkat">
			<?php
			}
			?>
			</div>
		  </div>
          <div class="control-group">
			<label class="control-label" for="nip">Tanggal Selesai</label>
			<div class="controls">
			<?php
			if($st=="tambah")
			{
			?>
			  <input type="text" class="span6" name="tanggal_selesai_pangkat" id="tanggal_selesai_pangkat" value="<?php echo set_value('tanggal_selesai_pangkat'); ?>" placeholder=
			  "Tanggal Selesai Pangkat">
			<?php
			}
			else
			{
			?>
			  <input type="text" class="span6" name="tanggal_selesai_pangkat" id="tanggal_selesai_pangkat" value="<?php echo $tanggal_selesai_pangkat; ?>" placeholder=
			  "Tanggal Selesai Pangkat">
			<?php
			}
			?>
			</div>
		  </div>
        </div>
        <div class="tab-pane fade" id="dtjabatan">
        
          <div class="control-group">
			<label class="control-label" for="nip">Status Jabatan</label>
			<div class="controls">
			<select data-placeholder="Status Jabatan" class="chzn-select" style="width:500px;" tabindex="2" name="id_status_jabatan" id="id_status_jabatan">
			  	<?php
			  		foreach($mst_stts_jabatan->result_array() as $msj)
			  		{
			  			if($id_status_jabatan==$msj['id_status_jabatan'])
			  			{
			  	?>
			  		<option value="<?php echo $msj['id_status_jabatan']; ?>" selected="selected"><?php echo $msj['nama_jabatan']; ?></option>
			  	<?php
			  			}
			  			else
			  			{
			  	?>
			  		<option value="<?php echo $msj['id_status_jabatan']; ?>"><?php echo $msj['nama_jabatan']; ?></option>
			  	<?php
			  			}
			  		}
			  	?>
			</select>
			</div>
		  </div>
          <div class="control-group">
			<label class="control-label" for="nip">Jabatan</label>
			<div class="controls">
			<select data-placeholder="Jabatan" class="chzn-select" style="width:500px;" tabindex="2" name="id_jabatan" id="id_jabatan">
			  	<?php
			  		foreach($mst_jabatan->result_array() as $mj)
			  		{
			  			if($id_jabatan==$mj['id_jabatan'])
			  			{
			  	?>
			  		<option value="<?php echo $mj['id_jabatan']; ?>" selected="selected"><?php echo $mj['nama_jabatan']; ?></option>
			  	<?php
			  			}
			  			else
			  			{
			  	?>
			  		<option value="<?php echo $mj['id_jabatan']; ?>"><?php echo $mj['nama_jabatan']; ?></option>
			  	<?php
			  			}
			  		}
			  	?>
			</select>
			</div>
		  </div>
          <div class="control-group">
			<label class="control-label" for="nip">Unit Kerja</label>
			<div class="controls">
			<select data-placeholder="Unit Kerja" class="chzn-select" style="width:500px;" tabindex="2" name="id_unit_kerja" id="id_unit_kerja">
			  	<?php
			  		foreach($mst_unit_kerja->result_array() as $muk)
			  		{
			  			if($id_unit_kerja==$muk['id_unit_kerja'])
			  			{
			  	?>
			  		<option value="<?php echo $muk['id_unit_kerja']; ?>" selected="selected"><?php echo $muk['nama_unit_kerja']; ?></option>
			  	<?php
			  			}
			  			else
			  			{
			  	?>
			  		<option value="<?php echo $muk['id_unit_kerja']; ?>"><?php echo $muk['nama_unit_kerja']; ?></option>
			  	<?php
			  			}
			  		}
			  	?>
			</select>
			</div>
		  </div>
          <div class="control-group">
			<label class="control-label" for="nip">Satuan Kerja</label>
			<div class="controls">
			<select data-placeholder="Satuan Kerja" class="chzn-select" style="width:500px;" tabindex="2" name="id_satuan_kerja" id="id_satuan_kerja">
			  	<?php
			  		foreach($mst_satuan_kerja->result_array() as $msk)
			  		{
			  			if($id_satuan_kerja==$msk['id_satuan_kerja'])
			  			{
			  	?>
			  		<option value="<?php echo $msk['id_satuan_kerja']; ?>" selected="selected"><?php echo $msk['nama_satuan_kerja']; ?></option>
			  	<?php
			  			}
			  			else
			  			{
			  	?>
			  		<option value="<?php echo $msk['id_satuan_kerja']; ?>"><?php echo $msk['nama_satuan_kerja']; ?></option>
			  	<?php
			  			}
			  		}
			  	?>
			</select>
			</div>
		  </div>
          <div class="control-group">
			<label class="control-label" for="nip">Lokasi Kerja</label>
			<div class="controls">
			<select data-placeholder="Lokasi Kerja" class="chzn-select" style="width:500px;" tabindex="2" name="lokasi_kerja" id="lokasi_kerja">
			<option value=""></option>
			  	<?php
			  		foreach($mst_lokasi_kerja->result_array() as $me)
			  		{
			  			if($lokasi_kerja==$me['id_lokasi_kerja'])
			  			{
			  	?>
			  		<option value="<?php echo $me['id_lokasi_kerja']; ?>" selected="selected"><?php echo $me['lokasi_kerja']; ?></option>
			  	<?php
			  			}
			  			else
			  			{
			  	?>
			  		<option value="<?php echo $me['id_lokasi_kerja']; ?>"><?php echo $me['lokasi_kerja']; ?></option>
			  	<?php
			  			}
			  		}
			  	?>
			</select>
			</div>
		  </div>
          <div class="control-group">
			<label class="control-label" for="nip">Eselon</label>
			<div class="controls">
			<select data-placeholder="Eselon" class="chzn-select" style="width:500px;" tabindex="2" name="id_eselon" id="id_eselon">
			  	<?php
			  		foreach($mst_eselon->result_array() as $me)
			  		{
			  			if($id_eselon==$me['id_eselon'])
			  			{
			  	?>
			  		<option value="<?php echo $me['id_eselon']; ?>" selected="selected"><?php echo $me['nama_eselon']; ?></option>
			  	<?php
			  			}
			  			else
			  			{
			  	?>
			  		<option value="<?php echo $me['id_eselon']; ?>"><?php echo $me['nama_eselon']; ?></option>
			  	<?php
			  			}
			  		}
			  	?>
			</select>
			</div>
		  </div>
          <div class="control-group">
			<label class="control-label" for="nip">TMT Eselon</label>
			<div class="controls">
			<?php
			if($st=="tambah")
			{
			?>
			  <input type="text" class="span6" name="tmt_eselon" id="tmt_eselon" value="<?php echo set_value('tmt_eselon'); ?>" placeholder=
			  "TMT Eselon">
			<?php
			}
			else
			{
			?>
			  <input type="text" class="span6" name="tmt_eselon" id="tmt_eselon" value="<?php echo $tmt_eselon; ?>" placeholder=
			  "TMT Eselon">
			<?php
			}
			?>
			</div>
		  </div>
          <div class="control-group">
			<label class="control-label" for="nip">Nomor SK</label>
			<div class="controls">
			<?php
			if($st=="tambah")
			{
			?>
			  <input type="text" class="span6" name="nomor_sk_jabatan" id="nomor_sk_jabatan" value="<?php echo set_value('nomor_sk_jabatan'); ?>" placeholder=
			  "Nomor SK Jabatan">
			<?php
			}
			else
			{
			?>
			  <input type="text" class="span6" name="nomor_sk_jabatan" id="nomor_sk_jabatan" value="<?php echo $nomor_sk_jabatan; ?>" placeholder=
			  "Nomor SK Jabatan">
			<?php
			}
			?>
			</div>
		  </div>
          <div class="control-group">
			<label class="control-label" for="nip">Tanggal SK</label>
			<div class="controls">
			<?php
			if($st=="tambah")
			{
			?>
			  <input type="text" class="span6" name="tanggal_sk_jabatan" id="tanggal_sk_jabatan" value="<?php echo set_value('tanggal_sk_jabatan'); ?>" placeholder=
			  "Tanggal SK Jabatan">
			<?php
			}
			else
			{
			?>
			  <input type="text" class="span6" name="tanggal_sk_jabatan" id="tanggal_sk_jabatan" value="<?php echo $tanggal_sk_jabatan; ?>" placeholder=
			  "Tanggal SK Jabatan">
			<?php
			}
			?>
			</div>
		  </div>
          <div class="control-group">
			<label class="control-label" for="nip">Tanggal Mulai</label>
			<div class="controls">
			<?php
			if($st=="tambah")
			{
			?>
			  <input type="text" class="span6" name="tanggal_mulai_jabatan" id="tanggal_mulai_jabatan" value="<?php echo set_value('tanggal_mulai_jabatan'); ?>" placeholder=
			  "Tanggal Mulai Jabatan">
			<?php
			}
			else
			{
			?>
			  <input type="text" class="span6" name="tanggal_mulai_jabatan" id="tanggal_mulai_jabatan" value="<?php echo $tanggal_mulai_jabatan; ?>" placeholder=
			  "Tanggal Mulai Jabatan">
			<?php
			}
			?>
			</div>
		  </div>
          <div class="control-group">
			<label class="control-label" for="nip">Tanggal Selesai</label>
			<div class="controls">
			<?php
			if($st=="tambah")
			{
			?>
			  <input type="text" class="span6" name="tanggal_selesai_jabatan" id="tanggal_selesai_jabatan" value="<?php echo set_value('tanggal_selesai_jabatan'); ?>" placeholder=
			  "Tanggal Selesai Jabatan">
			<?php
			}
			else
			{
			?>
			  <input type="text" class="span6" name="tanggal_selesai_jabatan" id="tanggal_selesai_jabatan" value="<?php echo $tanggal_selesai_jabatan; ?>" placeholder=
			  "Tanggal Selesai Jabatan">
			<?php
			}
			?>
			</div>
		  </div>
    </div>
	<div class="tab-pane fade" id="dtfoto">
        
			<?php
				$ft = $foto;
				if($ft=="")
				{
					$ft="no-img.jpg";
				}
			?>
          <div class="control-group">
			<label class="control-label" for="nip">Upload Foto</label>
			<div class="controls">
			<input type="file" class="span6" name="userfile" id="userfile" placeholder="Upload Foto">
			<p><img src="<?php echo base_url(); ?>asset/foto_pegawai/medium/<?php echo $ft; ?>" /></p>
			</div>
		</div>
	</div>
	
		  <div class="control-group">
			<div class="controls">
			  <button type="submit" class="btn btn-primary">Simpan Data</button>
			  <button type="reset" class="btn">Hapus Data</button>
			</div>
		  </div>
		  
		  
		  <input type="hidden" name="id_param" value="<?php echo $id_param; ?>">
		  <input type="hidden" name="st" value="<?php echo $st; ?>">
		  <input type="hidden" name="frame" value="frame">
		  <script src="http://localhost/sgmc/asset/js/chosen.jquery.js" type="text/javascript"></script>
			<script type="text/javascript"> 
				$(".chzn-select").chosen();
			</script>

		<?php echo form_close(); ?>
  </div>
</section>




      <footer class="well">
        <p><?php echo $credit; ?></p>
      </footer>

    </div> <!-- /container -->
  </body>
</html>
