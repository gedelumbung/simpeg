<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class laporan_pegawai_penempatan_kerja extends CI_Controller {

	/*
		***	Controller : laporan_pegawai_penempatan_kerja.php
		***	by Gede Lumbung
		***	http://gedelumbung.com
	*/

	public function index()
	{
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="administrator")
		{
			$d['judul_lengkap'] = $this->config->item('nama_aplikasi_full');
			$d['judul_pendek'] = $this->config->item('nama_aplikasi_pendek');
			$d['instansi'] = $this->config->item('nama_instansi');
			$d['credit'] = $this->config->item('credit_aplikasi');
			$d['alamat'] = $this->config->item('alamat_instansi');
			
			if($this->session->userdata('id_satuan_kerja')=="Semua")
			{
				$set_lap1['lokasi_kerja'] = $this->session->userdata('id_lokasi_kerja');
				$d['data_pegawai'] = $this->db->get_where("tbl_data_pegawai",$set_lap1);
				$d['mst_lokasi_kerja'] = $this->db->get('tbl_master_lokasi_kerja');
				$d['mst_satuan_kerja'] = $this->db->get('tbl_master_satuan_kerja');
				$this->load->view('dashboard_admin/laporan/penempatan_kerja/home',$d);
			}
			else
			{
				$set_lap2['id_satuan_kerja'] = $this->session->userdata('id_satuan_kerja');
				$set_lap2['lokasi_kerja'] = $this->session->userdata('id_lokasi_kerja');
				$d['data_pegawai'] = $this->db->get_where("tbl_data_pegawai",$set_lap2);
				$d['mst_lokasi_kerja'] = $this->db->get('tbl_master_lokasi_kerja');
				$d['mst_satuan_kerja'] = $this->db->get('tbl_master_satuan_kerja');
				$this->load->view('dashboard_admin/laporan/penempatan_kerja/home',$d);
			}
		}
		else
		{
			header('location:'.base_url().'');
		}
	}

	public function export()
	{
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="administrator")
		{
			
			if($this->session->userdata('id_satuan_kerja')=="Semua")
			{
				$set_lap1['lokasi_kerja'] = $this->session->userdata('id_lokasi_kerja');
				$d['data_pegawai'] = $this->db->query("select a.nip, a.nip_lama, a.no_kartu_pegawai, a.nama_pegawai, a.tempat_lahir, a.tanggal_lahir, 
				a.jenis_kelamin, a.agama, a.usia, b.nama_status as status_pegawai, a.tanggal_pengangkatan_cpns, a.alamat, a.no_npwp, 
				a.kartu_askes_pegawai, c.nama_status as status_pegawai_pangkat, d.golongan, a.nomor_sk_pangkat, a.tanggal_sk_pangkat, 
				a.tanggal_mulai_pangkat,a.tanggal_selesai_pangkat, e.nama_jabatan as nama_status_jabatan, f.nama_jabatan as nama_jabatan, 
				g.nama_unit_kerja, h.nama_satuan_kerja,a.lokasi_kerja, a.nomor_sk_jabatan, a.tanggal_sk_jabatan, a.tanggal_mulai_jabatan, 
				a.tanggal_selesai_jabatan, i.nama_eselon, a.tmt_eselon from tbl_data_pegawai a left join tbl_master_status_pegawai b on 
				a.status_pegawai=b.id_status_pegawai left join tbl_master_status_pegawai c on a.status_pegawai_pangkat=c.id_status_pegawai left join 
				tbl_master_golongan d on a.id_golongan=d.id_golongan left join tbl_master_status_jabatan e on a.id_status_jabatan=e.id_status_jabatan 
				left join tbl_master_jabatan f on a.id_jabatan=f.id_jabatan left join tbl_master_unit_kerja g on a.id_unit_kerja=g.id_unit_kerja left 
				join tbl_master_satuan_kerja h on a.id_satuan_kerja=h.id_satuan_kerja left join tbl_master_eselon i on a.id_eselon=i.id_eselon where 
				a.lokasi_kerja='".$set_lap1['lokasi_kerja']."'");
				$this->load->view('dashboard_admin/laporan/penempatan_kerja/export',$d);
			}
			else
			{
				$set_lap2['lokasi_kerja'] = $this->session->userdata('id_lokasi_kerja');
				$set_lap2['id_satuan_kerja'] = $this->session->userdata('id_satuan_kerja');
				
				$d['data_pegawai'] = $this->db->query("select a.nip, a.nip_lama, a.no_kartu_pegawai, a.nama_pegawai, a.tempat_lahir, a.tanggal_lahir, 
				a.jenis_kelamin, a.agama, a.usia, b.nama_status as status_pegawai, a.tanggal_pengangkatan_cpns, a.alamat, a.no_npwp, 
				a.kartu_askes_pegawai, c.nama_status as status_pegawai_pangkat, d.golongan, a.nomor_sk_pangkat, a.tanggal_sk_pangkat, 
				a.tanggal_mulai_pangkat,a.tanggal_selesai_pangkat, e.nama_jabatan as nama_status_jabatan, f.nama_jabatan as nama_jabatan, 
				g.nama_unit_kerja, h.nama_satuan_kerja,a.lokasi_kerja, a.nomor_sk_jabatan, a.tanggal_sk_jabatan, a.tanggal_mulai_jabatan, 
				a.tanggal_selesai_jabatan, i.nama_eselon, a.tmt_eselon from tbl_data_pegawai a left join tbl_master_status_pegawai b on 
				a.status_pegawai=b.id_status_pegawai left join tbl_master_status_pegawai c on a.status_pegawai_pangkat=c.id_status_pegawai left join 
				tbl_master_golongan d on a.id_golongan=d.id_golongan left join tbl_master_status_jabatan e on a.id_status_jabatan=e.id_status_jabatan 
				left join tbl_master_jabatan f on a.id_jabatan=f.id_jabatan left join tbl_master_unit_kerja g on a.id_unit_kerja=g.id_unit_kerja left 
				join tbl_master_satuan_kerja h on a.id_satuan_kerja=h.id_satuan_kerja left join tbl_master_eselon i on a.id_eselon=i.id_eselon where 
				a.lokasi_kerja='".$set_lap2['lokasi_kerja']."' and a.id_satuan_kerja='".$set_lap2['id_satuan_kerja']."'");
				
				$this->load->view('dashboard_admin/laporan/penempatan_kerja/export',$d);
			}
		}
		else
		{
			header('location:'.base_url().'');
		}
	}

	public function set()
	{
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="administrator")
		{
			$sel_lap1['id_lokasi_kerja'] = $this->input->post('id_lokasi_kerja');
			$sel_lap1['id_satuan_kerja'] = $this->input->post('id_satuan_kerja');
			$this->session->set_userdata($sel_lap1);
			header('location:'.base_url().'laporan_pegawai_penempatan_kerja');
		}
		else
		{
			header('location:'.base_url().'');
		}
	}
	
	function logout()
	{
		$this->session->sess_destroy();
		header('location:'.base_url().'');
	}
}

/* End of file laporan_pegawai_penempatan_kerja.php */
/* Location: ./application/controllers/laporan_pegawai_penempatan_kerja.php */