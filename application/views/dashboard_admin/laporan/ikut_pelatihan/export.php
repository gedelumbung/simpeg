<?php
$nama_file = date('Y-m-d')."_laporan_pegawai_ikut_pelatihan.xls";    
header("Pragma: public");   
header("Expires: 0");   
header("Cache-Control: must-revalidate, post-check=0,pre-check=0");     
header("Content-Type: application/force-download");     
header("Content-Type: application/octet-stream");   
header("Content-Type: application/download");   
header("Content-Disposition: attachment;filename=".$nama_file."");  
header("Content-Transfer-Encoding: binary ");
?>
<table>
<tr>
<td></td>
<td align="center">Laporan Pegawai Yang  Pernah Mengikuti Pelatihan/Diklat Pada Satuan Kerja Tertentu</td>
</tr>
<tr>
<td></td>
<td>
  <table cellpadding="8" style="border-collapse:collapse;" border="1">
      <tr height="40" style="background-color:#EA7D57;">
        <td>Nomor</td>
        <td>NIP</td>
        <td>NIP Lama</td>
        <td>Nomor Kartu Pegawai</td>
        <td>Nama Pegawai</td>
        <td>Nama Pelatihan</td>
        <td>Uraian</td>
        <td>Lokasi</td>
        <td>Tanggal Sertifikat</td>
        <td>Jam Pelatihan</td>
        <td>Negara</td>
        <td>Tempat/Tanggal Lahir</td>
        <td>Jenis Kelamin</td>
        <td>Agama</td>
        <td>Usia</td>
        <td>Status Pegawai</td>
        <td>Tanggal Pengangkatan CPNS</td>
        <td>Alamat</td>
        <td>Nomor NPWP</td>
        <td>Kartu Askes Pegawai</td>
        <td>Status Pangkat Pegawai</td>
        <td>Golongan</td>
        <td>Nomor SK Pangkat</td>
        <td>Tanggal SK Pangkat</td>
        <td>Tanggal Mulai Pangkat</td>
        <td>Tanggal Selesai Pangkat</td>
        <td>Status Jabatan</td>
        <td>Jabatan</td>
        <td>Unit Kerja</td>
        <td>Satuan Kerja</td>
        <td>Lokasi Kerja</td>
        <td>Nomor SK Jabatan</td>
        <td>Tanggal SK Jabatan</td>
        <td>Tanggal Mulai Jabatan</td>
        <td>Tanggal Selesai Jabatan</td>
        <td>Eselon</td>
        <td>TMT Eselon</td>
      </tr>
	<?php
		$no=1;
		foreach($data_pegawai->result_array() as $dp)
		{
	?>
      <tr height="35">
        <td><?php echo $no; ?></td>
        <td><?php echo $dp['nip'].'<font color="white">_</font>'; ?></td>
        <td><?php echo $dp['nip_lama'].'<font color="white">_</font>'; ?></td>
        <td><?php echo $dp['no_kartu_pegawai']; ?></td>
        <td><?php echo $dp['nama_pegawai']; ?></td>
        <td><?php echo $dp['nama_pelatihan']; ?></td>
        <td><?php echo $dp['uraian']; ?></td>
        <td><?php echo $dp['nama_lokasi']; ?></td>
        <td><?php echo $dp['tanggal_sertifikat']; ?></td>
        <td><?php echo $dp['jam_pelatihan']; ?></td>
        <td><?php echo $dp['negara']; ?></td>
        <td><?php echo $dp['tempat_lahir'].' - '.$dp['tanggal_lahir']; ?></td>
        <td><?php echo $dp['jenis_kelamin']; ?></td>
        <td><?php echo $dp['agama']; ?></td>
        <td><?php echo $dp['usia']; ?></td>
        <td><?php echo $dp['status_pegawai']; ?></td>
        <td><?php echo $dp['tanggal_pengangkatan_cpns']; ?></td>
        <td><?php echo $dp['alamat']; ?></td>
        <td><?php echo $dp['no_npwp']; ?></td>
        <td><?php echo $dp['kartu_askes_pegawai']; ?></td>
        <td><?php echo $dp['status_pegawai_pangkat']; ?></td>
        <td><?php echo $dp['golongan']; ?></td>
        <td><?php echo $dp['nomor_sk_pangkat']; ?></td>
        <td><?php echo $dp['tanggal_sk_pangkat']; ?></td>
        <td><?php echo $dp['tanggal_mulai_pangkat']; ?></td>
        <td><?php echo $dp['tanggal_selesai_pangkat']; ?></td>
        <td><?php echo $dp['nama_status_jabatan']; ?></td>
        <td><?php echo $dp['nama_jabatan']; ?></td>
        <td><?php echo $dp['nama_unit_kerja']; ?></td>
        <td><?php echo $dp['nama_satuan_kerja']; ?></td>
        <td><?php echo $dp['lokasi_kerja']; ?></td>
        <td><?php echo $dp['nomor_sk_jabatan']; ?></td>
        <td><?php echo $dp['tanggal_sk_jabatan']; ?></td>
        <td><?php echo $dp['tanggal_mulai_jabatan']; ?></td>
        <td><?php echo $dp['tanggal_selesai_jabatan']; ?></td>
        <td><?php echo $dp['nama_eselon']; ?></td>
        <td><?php echo $dp['tmt_eselon']; ?></td>
      </tr>
	 <?php
	 		$no++;
	 	}
	 ?>
  </table>
</td>
</tr>
</table>