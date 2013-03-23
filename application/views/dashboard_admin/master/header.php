
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?php echo $judul_lengkap.' - '.$instansi; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="<?php echo base_url(); ?>asset/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>asset/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>asset/css/docs.css" rel="stylesheet">
	
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="<?php echo base_url(); ?>asset/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>asset/js/application.js"></script>
    <script src="<?php echo base_url(); ?>asset/js/bootstrap-tooltip.js"></script>
	<link href="<?php echo base_url(); ?>asset/css/chosen.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>asset/colorbox/colorbox.css" />
	<script src="<?php echo base_url(); ?>asset/colorbox/jquery.colorbox.js"></script>
	<script>
		  $(document).ready(function(){
			  //Examples of how to assign the ColorBox event to elements
			  $(".medium-box").colorbox({rel:'group', iframe:true, width:"900px", height:"90%"});
	
		  });
	</script>
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="<?php echo base_url(); ?>"><?php echo $judul_pendek; ?></a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active"><a href="<?php echo base_url(); ?>"><i class="icon-home icon-white"></i> Beranda</a></li>
			  <li class="dropdown">
			  	<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-book icon-white"></i> Master <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="<?php echo base_url(); ?>master_status_pegawai"><i class="icon-tag"></i> Status Pegawai</a></li>
                  <li><a href="<?php echo base_url(); ?>master_unit_kerja"><i class="icon-question-sign"></i> Unit Kerja</a></li>
                  <li><a href="<?php echo base_url(); ?>master_satuan_kerja"><i class="icon-ok-sign"></i> Satuan Kerja</a></li>
                  <li><a href="<?php echo base_url(); ?>master_ppk"><i class="icon-eye-open"></i> PPK</a></li>
                  <li><a href="<?php echo base_url(); ?>master_golongan"><i class="icon-random"></i> Golongan</a></li>
                  <li><a href="<?php echo base_url(); ?>master_eselon"><i class="icon-retweet"></i> Eselon</a></li>
                  <li><a href="<?php echo base_url(); ?>master_pelatihan"><i class="icon-folder-open"></i> Pelatihan</a></li>
                  <li><a href="<?php echo base_url(); ?>master_jabatan"><i class="icon-hdd"></i> Jabatan</a></li>
                  <li><a href="<?php echo base_url(); ?>master_status_jabatan"><i class="icon-tasks"></i> Status Jabatan</a></li>
                  <li><a href="<?php echo base_url(); ?>master_penghargaan"><i class="icon-filter"></i> Penghargaan</a></li>
                  <li><a href="<?php echo base_url(); ?>master_hukuman"><i class="icon-briefcase"></i> Hukuman</a></li>
                  <li><a href="<?php echo base_url(); ?>master_lokasi_pelatihan"><i class="icon-fullscreen"></i> Lokasi Pelatihan</a></li>
                  <li><a href="<?php echo base_url(); ?>master_lokasi_kerja"><i class="icon-briefcase"></i> Lokasi Kerja</a></li>
                </ul>
              </li>
			  <li class="dropdown">
			  	<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-comment icon-white"></i> Panduan <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="<?php echo base_url(); ?>panduan_administrator"><i class="icon-fire"></i> Administrator</a></li>
                  <li><a href="<?php echo base_url(); ?>panduan_operator"><i class="icon-asterisk"></i> Operator</a></li>
                  <li><a href="<?php echo base_url(); ?>panduan_executive"><i class="icon-leaf"></i> Executive</a></li>
                </ul>
              </li>
			  <li class="dropdown">
			  	<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-tasks icon-white"></i> Laporan <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="<?php echo base_url(); ?>laporan_pegawai_unit_satuan"><i class="icon-tag"></i> Laporan Pegawai - Unit Kerja dan Satuan Kerja</a></li>
                  <li><a href="<?php echo base_url(); ?>laporan_pegawai_penempatan_kerja"><i class="icon-question-sign"></i> Laporan Pegawai - Penempatan Kerja</a></li>
                  <li><a href="<?php echo base_url(); ?>laporan_pegawai_ikut_pelatihan"><i class="icon-ok-sign"></i> Laporan Pegawai - Mengikuti Pelatihan</a></li>
                  <li><a href="<?php echo base_url(); ?>laporan_pegawai_status_golongan"><i class="icon-eye-open"></i> Laporan Pegawai - Status Pegawai dan Golongan</a></li>
                  <li><a href="<?php echo base_url(); ?>laporan_pegawai_struktural_fungsional"><i class="icon-random"></i> Laporan Pegawai - Struktural dan Fungsional</a></li>
                  <li><a href="<?php echo base_url(); ?>laporan_pegawai_urut_kepangkatan"><i class="icon-retweet"></i> Laporan Daftar Urut Kepangkatan</a></li>
                </ul>
              </li>
            </ul>
            <div class="btn-group pull-right">
			  <button class="btn btn-primary"><i class="icon-user icon-white"></i> <?php echo $this->session->userdata('nama'); ?></button>
			  <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
				<span class="caret"></span>
			  </button>
			  <ul class="dropdown-menu">
				<li><a href="<?php echo base_url(); ?>app/change_password"><i class="icon-wrench"></i> Pengaturan Akun</a></li>
				<li><a href="<?php echo base_url(); ?>manage_user"><i class="icon-tasks"></i> Manajemen User</a></li>
				<li><a href="<?php echo base_url(); ?>app/logout"><i class="icon-off"></i> Log Out</a></li>
			  </ul>
			</div>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
	
    <div class="container">
	
	<div class="well">
	  <div class="row">
		<div class="span">
		  <h3><?php echo $judul_lengkap.' '.$instansi; ?></h3>
		  <p><?php echo $alamat; ?></p>
		</div>
	  </div>
	</div>
	
	<header class="jumbotron subhead" id="overview">
	  <div class="subnav">
		<ul class="nav nav-pills">
		  <li><a href="<?php echo base_url(); ?>pegawai/edit/<?php echo $this->session->userdata("kode_pegawai"); ?>">Pegawai</a></li>
		  <li><a href="<?php echo base_url(); ?>data_keluarga/index/<?php echo $this->session->userdata("kode_pegawai"); ?>">Keluarga</a></li>
		  <li><a href="<?php echo base_url(); ?>data_riwayat_pangkat/index/<?php echo $this->session->userdata("kode_pegawai"); ?>">Riwayat Pangkat</a></li>
		  <li><a href="<?php echo base_url(); ?>data_riwayat_jabatan/index/<?php echo $this->session->userdata("kode_pegawai"); ?>">Riwayat Jabatan</a></li>
		  <li><a href="<?php echo base_url(); ?>data_pendidikan/index/<?php echo $this->session->userdata("kode_pegawai"); ?>">Pendidikan</a></li>
		  <li><a href="<?php echo base_url(); ?>data_pelatihan/index/<?php echo $this->session->userdata("kode_pegawai"); ?>">Pelatihan</a></li>
		  <li><a href="<?php echo base_url(); ?>data_penghargaan/index/<?php echo $this->session->userdata("kode_pegawai"); ?>">Penghargaan</a></li>
		  <li><a href="<?php echo base_url(); ?>data_seminar/index/<?php echo $this->session->userdata("kode_pegawai"); ?>">Seminar</a></li>
		  <li><a href="<?php echo base_url(); ?>data_organisasi/index/<?php echo $this->session->userdata("kode_pegawai"); ?>">Organisasi</a></li>
		  <li><a href="<?php echo base_url(); ?>data_gaji_pokok/index/<?php echo $this->session->userdata("kode_pegawai"); ?>">Gaji Pokok</a></li>
		  <li><a href="<?php echo base_url(); ?>data_hukuman/index/<?php echo $this->session->userdata("kode_pegawai"); ?>">Hukuman</a></li>
		  <li><a href="<?php echo base_url(); ?>data_dp3/index/<?php echo $this->session->userdata("kode_pegawai"); ?>">DP3</a></li>
		</ul>
	  </div>
	</header>

