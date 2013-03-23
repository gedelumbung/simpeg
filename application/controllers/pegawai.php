<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pegawai extends CI_Controller {

	/*
		***	Controller : pegawai.php
		***	by Gede Lumbung
		***	http://gedelumbung.com
	*/

	public function index()
	{
		header('location:'.base_url().'');
	}

	public function detail()
	{
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="administrator")
		{
			$d['judul_lengkap'] = $this->config->item('nama_aplikasi_full');
			$d['judul_pendek'] = $this->config->item('nama_aplikasi_pendek');
			$d['instansi'] = $this->config->item('nama_instansi');
			$d['credit'] = $this->config->item('credit_aplikasi');
			$d['alamat'] = $this->config->item('alamat_instansi');
			
			$id['id_pegawai'] = $this->uri->segment(3);
			$this->session->set_userdata($id);
			$data_pegawai = $this->db->get_where("tbl_data_pegawai",$id);
			
			if($data_pegawai->num_rows()>0)
			{
				$q = $this->db->get_where("tbl_data_pegawai",$id);
				$set_detail = $q->row();
				$this->session->set_userdata("nama_pegawai",$set_detail->nama_pegawai);
				
				foreach($q->result() as $data)
				{
					$d['id_param'] = $data->id_pegawai;
					$d['nip'] = $data->nip;
					$d['nip_lama'] = $data->nip_lama;
					$d['no_kartu_pegawai'] = $data->no_kartu_pegawai;
					$d['nama_pegawai'] = $data->nama_pegawai;
					$d['tempat_lahir'] =  $data->tempat_lahir;
					$d['tanggal_lahir'] = $data->tanggal_lahir;
					$d['jenis_kelamin'] = $data->jenis_kelamin;
					$d['agama'] = $data->agama;
					$d['usia'] =  $data->usia;
					$d['status_pegawai'] = $data->status_pegawai;
					$d['tanggal_pengangkatan_cpns'] = $data->tanggal_pengangkatan_cpns;
					$d['alamat_pegawai'] =  $data->alamat;
					$d['no_npwp'] = $data->no_npwp;
					$d['kartu_askes_pegawai'] = $data->kartu_askes_pegawai;
					$d['status_pegawai_pangkat'] = $data->status_pegawai_pangkat;
					$d['id_golongan'] = $data->id_golongan;
					$d['nomor_sk_pangkat'] = $data->nomor_sk_pangkat;
					$d['tanggal_sk_pangkat'] = $data->tanggal_sk_pangkat;
					$d['tanggal_mulai_pangkat'] = $data->tanggal_mulai_pangkat;
					$d['tanggal_selesai_pangkat'] = $data->tanggal_selesai_pangkat;
					$d['id_status_jabatan'] = $data->id_status_jabatan;
					$d['id_jabatan'] = $data->id_jabatan;
					$d['id_unit_kerja'] = $data->id_unit_kerja;
					$d['id_satuan_kerja'] = $data->id_satuan_kerja;
					$d['lokasi_kerja'] = $data->lokasi_kerja;
					$d['nomor_sk_jabatan'] = $data->nomor_sk_jabatan;
					$d['tanggal_sk_jabatan'] = $data->tanggal_sk_jabatan;
					$d['tanggal_mulai_jabatan'] = $data->tanggal_mulai_jabatan;
					$d['tanggal_selesai_jabatan'] = $data->tanggal_selesai_jabatan;
					$d['id_eselon'] = $data->id_eselon;
					$d['tmt_eselon'] = $data->tmt_eselon;
					$d['foto'] = $data->foto;
				}
				
				$d['st'] = "edit";
				$d['mst_status_pegawai'] = $this->db->get('tbl_master_status_pegawai');
				$d['mst_golongan'] = $this->db->get('tbl_master_golongan');
				$d['mst_stts_jabatan'] = $this->db->get('tbl_master_status_jabatan');
				$d['mst_jabatan'] = $this->db->get('tbl_master_jabatan');
				$d['mst_unit_kerja'] = $this->db->get('tbl_master_unit_kerja');
				$d['mst_satuan_kerja'] = $this->db->get('tbl_master_satuan_kerja');
				$d['mst_eselon'] = $this->db->get('tbl_master_eselon');
				$d['mst_lokasi_kerja'] = $this->db->get('tbl_master_lokasi_kerja');
				
				$d['data_keluarga'] = $this->db->get_where("tbl_data_keluarga",$id);
				$d['data_riwayat_pangkat'] = $this->db->query("select * from tbl_data_riwayat_pangkat a left join tbl_master_golongan b on a.id_golongan=b.id_golongan where 
				a.id_pegawai='".$id['id_pegawai']."'");
				$d['data_riwayat_jabatan'] = $this->db->query("select * from tbl_data_riwayat_jabatan a left join tbl_master_jabatan b on a.id_jabatan=b.id_jabatan left join
				tbl_master_unit_kerja c on a.id_unit_kerja=c.id_unit_kerja left join tbl_master_eselon d on a.id_eselon=d.id_eselon where 
				a.id_pegawai='".$id['id_pegawai']."'");
				$d['data_pendidikan'] = $this->db->get_where("tbl_data_pendidikan",$id);
				$d['data_pelatihan'] = $this->db->query("select b.nama_pelatihan, a.lokasi, a.tanggal_sertifikat, a.jam_pelatihan,
				a.negara, a.id_pelatihan from tbl_data_pelatihan a left join tbl_master_pelatihan b on a.id_master_pelatihan=b.id_pelatihan where 
				a.id_pegawai='".$id['id_pegawai']."'");
				$d['data_penghargaan'] = $this->db->query("select b.nama_penghargaan, a.nomor_sk, a.tanggal_sk, a.id_penghargaan from tbl_data_penghargaan a left join tbl_master_penghargaan b on a.id_master_penghargaan=b.id_penghargaan where
				a.id_pegawai='".$id['id_pegawai']."'");
				$d['data_seminar'] = $this->db->get_where("tbl_data_seminar",$id);
				$d['data_organisasi'] = $this->db->get_where("tbl_data_organisasi",$id);
				$d['data_gaji_pokok'] = $this->db->query("select * from tbl_data_gaji_pokok a left join tbl_master_golongan b on a.id_golongan=b.id_golongan where
				a.id_pegawai='".$id['id_pegawai']."'");
				$d['data_hukuman'] =  $this->db->query("select a.id_hukuman, b.nama_hukuman, a.nomor_sk, a.tanggal_sk, a.tanggal_mulai
			, a.tanggal_selesai, a.masa_berlaku from tbl_data_hukuman a left join tbl_master_hukuman b on a.id_master_hukuman=b.id_hukuman where
				a.id_pegawai='".$id['id_pegawai']."'");
				$d['data_dp3'] = $this->db->get_where("tbl_data_dp3",$id);
				
				$this->load->view('dashboard_admin/pegawai/detail_pegawai',$d);
			}
			else
			{
				header('location:'.base_url().'');
			}
		}
		else
		{
			header('location:'.base_url().'');
		}
	}

	public function tambah()
	{
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="administrator")
		{
			$d['id_param'] = "";
			$d['nip'] = "";
			$d['nip_lama'] = "";
			$d['no_kartu_pegawai'] = "";
			$d['nama_pegawai'] = "";
			$d['tempat_lahir'] = "";
			$d['tanggal_lahir'] = "";
			$d['jenis_kelamin'] = "";
			$d['agama'] = "";
			$d['usia'] = "";
			$d['status_pegawai'] = "";
			$d['tanggal_pengangkatan_cpns'] = "";
			$d['alamat'] = "";
			$d['no_npwp'] = "";
			$d['kartu_askes_pegawai'] = "";
			$d['status_pegawai_pangkat'] = "";
			$d['id_golongan'] = "";
			$d['nomor_sk_pangkat'] = "";
			$d['tanggal_sk_pangkat'] = "";
			$d['tanggal_mulai_pangkat'] = "";
			$d['tanggal_selesai_pangkat'] = "";
			$d['id_status_jabatan'] = "";
			$d['id_jabatan'] = "";
			$d['id_unit_kerja'] = "";
			$d['id_satuan_kerja'] = "";
			$d['lokasi_kerja'] = "";
			$d['nomor_sk_jabatan'] = "";
			$d['tanggal_sk_jabatan'] = "";
			$d['tanggal_mulai_jabatan'] = "";
			$d['tanggal_selesai_jabatan'] = "";
			$d['id_eselon'] = "";
			$d['tmt_eselon'] = "";
			
			$d['st'] = "tambah";
			$d['mst_status_pegawai'] = $this->db->get('tbl_master_status_pegawai');
			$d['mst_golongan'] = $this->db->get('tbl_master_golongan');
			$d['mst_stts_jabatan'] = $this->db->get('tbl_master_status_jabatan');
			$d['mst_jabatan'] = $this->db->get('tbl_master_jabatan');
			$d['mst_unit_kerja'] = $this->db->get('tbl_master_unit_kerja');
			$d['mst_satuan_kerja'] = $this->db->get('tbl_master_satuan_kerja');
			$d['mst_eselon'] = $this->db->get('tbl_master_eselon');
			$d['mst_lokasi_kerja'] = $this->db->get('tbl_master_lokasi_kerja');
			$this->load->view('dashboard_admin/pegawai/input',$d);
		}
		else
		{
			header('location:'.base_url().'');
		}
	}

	public function hapus()
	{
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="administrator")
		{
			$id['id_pegawai'] = $this->session->userdata('kode_pegawai');
			$this->db->delete("tbl_data_pegawai",$id);
			$this->db->delete("tbl_data_dp3",$id);
			$this->db->delete("tbl_data_gaji_pokok",$id);
			$this->db->delete("tbl_data_hukuman",$id);
			$this->db->delete("tbl_data_keluarga",$id);
			$this->db->delete("tbl_data_organisasi",$id);
			$this->db->delete("tbl_data_pelatihan",$id);
			$this->db->delete("tbl_data_pendidikan",$id);
			$this->db->delete("tbl_data_penghargaan",$id);
			$this->db->delete("tbl_data_riwayat_jabatan",$id);
			$this->db->delete("tbl_data_riwayat_pangkat",$id);
			$this->db->delete("tbl_data_seminar",$id);
			header('location:'.base_url().'');
		}
		else
		{
			header('location:'.base_url().'');
		}
	}

	public function edit()
	{
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="administrator")
		{
			$d['judul_lengkap'] = $this->config->item('nama_aplikasi_full');
			$d['judul_pendek'] = $this->config->item('nama_aplikasi_pendek');
			$d['instansi'] = $this->config->item('nama_instansi');
			$d['credit'] = $this->config->item('credit_aplikasi');
			$d['alamat'] = $this->config->item('alamat_instansi');
			
			$id['kode_pegawai'] = $this->uri->segment(3);
			$this->session->set_userdata($id);
			$kode['id_pegawai'] = $this->session->userdata('kode_pegawai');
			
			$q = $this->db->get_where("tbl_data_pegawai",$kode);
			$set_detail = $q->row();
			$this->session->set_userdata("nama_pegawai",$set_detail->nama_pegawai);
			
			foreach($q->result() as $data)
			{
				$d['id_param'] = $data->id_pegawai;
				$d['nip'] = $data->nip;
				$d['nip_lama'] = $data->nip_lama;
				$d['no_kartu_pegawai'] = $data->no_kartu_pegawai;
				$d['nama_pegawai'] = $data->nama_pegawai;
				$d['tempat_lahir'] =  $data->tempat_lahir;
				$d['tanggal_lahir'] = $data->tanggal_lahir;
				$d['jenis_kelamin'] = $data->jenis_kelamin;
				$d['agama'] = $data->agama;
				$d['usia'] =  $data->usia;
				$d['status_pegawai'] = $data->status_pegawai;
				$d['tanggal_pengangkatan_cpns'] = $data->tanggal_pengangkatan_cpns;
				$d['alamat_pegawai'] =  $data->alamat;
				$d['no_npwp'] = $data->no_npwp;
				$d['kartu_askes_pegawai'] = $data->kartu_askes_pegawai;
				$d['status_pegawai_pangkat'] = $data->status_pegawai_pangkat;
				$d['id_golongan'] = $data->id_golongan;
				$d['nomor_sk_pangkat'] = $data->nomor_sk_pangkat;
				$d['tanggal_sk_pangkat'] = $data->tanggal_sk_pangkat;
				$d['tanggal_mulai_pangkat'] = $data->tanggal_mulai_pangkat;
				$d['tanggal_selesai_pangkat'] = $data->tanggal_selesai_pangkat;
				$d['id_status_jabatan'] = $data->id_status_jabatan;
				$d['id_jabatan'] = $data->id_jabatan;
				$d['id_unit_kerja'] = $data->id_unit_kerja;
				$d['id_satuan_kerja'] = $data->id_satuan_kerja;
				$d['lokasi_kerja'] = $data->lokasi_kerja;
				$d['nomor_sk_jabatan'] = $data->nomor_sk_jabatan;
				$d['tanggal_sk_jabatan'] = $data->tanggal_sk_jabatan;
				$d['tanggal_mulai_jabatan'] = $data->tanggal_mulai_jabatan;
				$d['tanggal_selesai_jabatan'] = $data->tanggal_selesai_jabatan;
				$d['foto'] = $data->foto;
				$d['id_eselon'] = $data->id_eselon;
				$d['tmt_eselon'] = $data->tmt_eselon;
			}
			
			$d['st'] = "edit";
			$d['mst_status_pegawai'] = $this->db->get('tbl_master_status_pegawai');
			$d['mst_lokasi_kerja'] = $this->db->get('tbl_master_lokasi_kerja');
			$d['mst_golongan'] = $this->db->get('tbl_master_golongan');
			$d['mst_stts_jabatan'] = $this->db->get('tbl_master_status_jabatan');
			$d['mst_jabatan'] = $this->db->get('tbl_master_jabatan');
			$d['mst_unit_kerja'] = $this->db->get('tbl_master_unit_kerja');
			$d['mst_satuan_kerja'] = $this->db->get('tbl_master_satuan_kerja');
			$d['mst_eselon'] = $this->db->get('tbl_master_eselon');
			$this->load->view('dashboard_admin/master/header',$d);
			$this->load->view('dashboard_admin/master/bg_pegawai');
		}
		else
		{
			header('location:'.base_url().'');
		}
	}
	
	public function simpan()
	{
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="administrator")
		{
			$d['judul_lengkap'] = $this->config->item('nama_aplikasi_full');
			$d['judul_pendek'] = $this->config->item('nama_aplikasi_pendek');
			$d['instansi'] = $this->config->item('nama_instansi');
			$d['credit'] = $this->config->item('credit_aplikasi');
			$d['alamat'] = $this->config->item('alamat_instansi');
			
			$this->form_validation->set_rules('nip', 'NIP', 'trim|required');
			$this->form_validation->set_rules('nip_lama', 'NIP Lama', 'trim|required');
			$this->form_validation->set_rules('no_kartu_pegawai', 'Nomor Kartu Pegawai', 'trim|required');
			$this->form_validation->set_rules('nama_pegawai', 'Nama Pegawai', 'trim|required');
			$this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'trim|required');
			$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'trim|required');
			$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'trim|required');
			$this->form_validation->set_rules('agama', 'Agama', 'trim|required');
			$this->form_validation->set_rules('usia', 'Usia', 'trim|required');
			$this->form_validation->set_rules('status_pegawai', 'Status Pegawai', 'trim|required');
			$this->form_validation->set_rules('tanggal_pengangkatan_cpns', 'Tanggal Pengangkatan CPNS', 'trim|required');
			$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
			$this->form_validation->set_rules('no_npwp', 'Nomor Npwp', 'trim|required');
			$this->form_validation->set_rules('kartu_askes_pegawai', 'Kartu Askes Pegawai', 'trim|required');
			$this->form_validation->set_rules('status_pegawai_pangkat', 'Status Pegawai Pangkat', 'trim|required');
			$this->form_validation->set_rules('id_golongan', 'Golongan', 'trim|required');
			$this->form_validation->set_rules('nomor_sk_pangkat', 'Nomor SK Pangkat', 'trim|required');
			$this->form_validation->set_rules('tanggal_sk_pangkat', 'Tanggal SK Pangkat', 'trim|required');
			$this->form_validation->set_rules('tanggal_mulai_pangkat', 'Tanggal Mulai Pangkat', 'trim|required');
			$this->form_validation->set_rules('tanggal_selesai_pangkat', 'Tanggal Selesai Pangkat', 'trim|required');
			$this->form_validation->set_rules('id_status_jabatan', 'Status Jabatan', 'trim|required');
			$this->form_validation->set_rules('id_jabatan', 'Jabatan', 'trim|required');
			$this->form_validation->set_rules('id_unit_kerja', 'Unit Kerja', 'trim|required');
			$this->form_validation->set_rules('id_satuan_kerja', 'Satuan Kerja', 'trim|required');
			$this->form_validation->set_rules('lokasi_kerja', 'Lokasi Kerja', 'trim|required');
			$this->form_validation->set_rules('nomor_sk_jabatan', 'Nomor SK Jabatan', 'trim|required');
			$this->form_validation->set_rules('tanggal_sk_jabatan', 'Tanggal SK Jabatan', 'trim|required');
			$this->form_validation->set_rules('tanggal_mulai_jabatan', 'Tanggal Mulai Jabatan', 'trim|required');
			$this->form_validation->set_rules('tanggal_selesai_jabatan', 'Tanggal Selesai Jabatan', 'trim|required');
			$this->form_validation->set_rules('id_eselon', 'Eselon', 'trim|required');
			$this->form_validation->set_rules('tmt_eselon', 'TMT Eselon', 'trim|required');
			
			$id['id_pegawai'] = $this->input->post("id_param");
			$st_frame = $this->input->post("frame");
			
			if ($this->form_validation->run() == FALSE)
			{
				$st = $this->input->post('st');
				if($st=="edit")
				{
					$q = $this->db->get_where("tbl_data_pegawai",$id);
					foreach($q->result() as $dt)
					{
						$d['id_param'] = $dt->id_pegawai;
						$d['nip'] = $dt->nip;
						$d['nip_lama'] = $dt->nip_lama;
						$d['no_kartu_pegawai'] = $dt->no_kartu_pegawai;
						$d['nama_pegawai'] = $dt->nama_pegawai;
						$d['tempat_lahir'] = $dt->tempat_lahir;
						$d['tanggal_lahir'] = $dt->tanggal_lahir;
						$d['jenis_kelamin'] = $dt->jenis_kelamin;
						$d['agama'] = $dt->agama;
						$d['usia'] = $dt->usia;
						$d['status_pegawai'] = $dt->status_pegawai;
						$d['tanggal_pengangkatan_cpns'] = $dt->tanggal_pengangkatan_cpns;
						$d['alamat_pegawai'] = $dt->alamat;
						$d['no_npwp'] = $dt->no_npwp;
						$d['kartu_askes_pegawai'] = $dt->kartu_askes_pegawai;
						$d['status_pegawai_pangkat'] = $dt->status_pegawai_pangkat;
						$d['id_golongan'] = $dt->id_golongan;
						$d['nomor_sk_pangkat'] = $dt->nomor_sk_pangkat;
						$d['tanggal_sk_pangkat'] = $dt->tanggal_sk_pangkat;
						$d['tanggal_mulai_pangkat'] = $dt->tanggal_mulai_pangkat;
						$d['tanggal_selesai_pangkat'] = $dt->tanggal_selesai_pangkat;
						$d['id_status_jabatan'] = $dt->id_status_jabatan;
						$d['id_jabatan'] = $dt->id_jabatan;
						$d['id_unit_kerja'] = $dt->id_unit_kerja;
						$d['id_satuan_kerja'] = $dt->id_satuan_kerja;
						$d['lokasi_kerja'] = $dt->lokasi_kerja;
						$d['nomor_sk_jabatan'] = $dt->nomor_sk_jabatan;
						$d['tanggal_sk_jabatan'] = $dt->tanggal_sk_jabatan;
						$d['tanggal_mulai_jabatan'] = $dt->tanggal_mulai_jabatan;
						$d['tanggal_selesai_jabatan'] = $dt->tanggal_selesai_jabatan;
						$d['foto'] = $dt->foto;
						$d['id_eselon'] = $dt->id_eselon;
						$d['tmt_eselon'] = $dt->tmt_eselon;
						$d['mst_status_pegawai'] = $this->db->get('tbl_master_status_pegawai');
						$d['mst_golongan'] = $this->db->get('tbl_master_golongan');
						$d['mst_stts_jabatan'] = $this->db->get('tbl_master_status_jabatan');
						$d['mst_jabatan'] = $this->db->get('tbl_master_jabatan');
						$d['mst_unit_kerja'] = $this->db->get('tbl_master_unit_kerja');
						$d['mst_satuan_kerja'] = $this->db->get('tbl_master_satuan_kerja');
						$d['mst_eselon'] = $this->db->get('tbl_master_eselon');
						$d['mst_lokasi_kerja'] = $this->db->get('tbl_master_lokasi_kerja');
					}
					$d['st'] = $st;
					$this->load->view('dashboard_admin/master/header',$d);
					$this->load->view('dashboard_admin/master/bg_pegawai');
				}
				else if($st=="tambah")
				{
					$d['id_param'] = "";
					$d['nip'] = "";
					$d['nip_lama'] = "";
					$d['no_kartu_pegawai'] = "";
					$d['nama_pegawai'] = "";
					$d['tempat_lahir'] = "";
					$d['tanggal_lahir'] = "";
					$d['jenis_kelamin'] = "";
					$d['agama'] = "";
					$d['usia'] = "";
					$d['status_pegawai'] = "";
					$d['tanggal_pengangkatan_cpns'] = "";
					$d['alamat_pegawai'] = ""; 
					$d['no_npwp'] = "";
					$d['kartu_askes_pegawai'] = "";
					$d['status_pegawai_pangkat'] = "";
					$d['id_golongan'] = "";
					$d['nomor_sk_pangkat'] = "";
					$d['tanggal_sk_pangkat'] = "";
					$d['tanggal_mulai_pangkat'] = "";
					$d['tanggal_selesai_pangkat'] = "";
					$d['id_status_jabatan'] = "";
					$d['id_jabatan'] = "";
					$d['id_unit_kerja'] = "";
					$d['id_satuan_kerja'] = "";
					$d['lokasi_kerja'] = "";
					$d['nomor_sk_jabatan'] = "";
					$d['tanggal_sk_jabatan'] = "";
					$d['tanggal_mulai_jabatan'] = "";
					$d['tanggal_selesai_jabatan'] = "";
					$d['id_eselon'] = "";
					$d['tmt_eselon'] = "";
					
					$d['st'] = $st;
					$d['mst_status_pegawai'] = $this->db->get('tbl_master_status_pegawai');
					$d['mst_golongan'] = $this->db->get('tbl_master_golongan');
					$d['mst_stts_jabatan'] = $this->db->get('tbl_master_status_jabatan');
					$d['mst_jabatan'] = $this->db->get('tbl_master_jabatan');
					$d['mst_unit_kerja'] = $this->db->get('tbl_master_unit_kerja');
					$d['mst_satuan_kerja'] = $this->db->get('tbl_master_satuan_kerja');
					$d['mst_eselon'] = $this->db->get('tbl_master_eselon');
					$d['mst_lokasi_kerja'] = $this->db->get('tbl_master_lokasi_kerja');
					$this->load->view('dashboard_admin/pegawai/input',$d);
				}
			}
			else
			{
				$st = $this->input->post('st');
				if($st=="edit")
				{
					$upd['nip'] = $this->input->post('nip');
					$upd['nip_lama'] = $this->input->post('nip_lama');
					$upd['no_kartu_pegawai'] = $this->input->post('no_kartu_pegawai');
					$upd['nama_pegawai'] = $this->input->post('nama_pegawai');
					$upd['tempat_lahir'] = $this->input->post('tempat_lahir');
					$upd['tanggal_lahir'] = $this->input->post('tanggal_lahir');
					$upd['jenis_kelamin'] = $this->input->post('jenis_kelamin');
					$upd['agama'] = $this->input->post('agama');
					$upd['usia'] = $this->input->post('usia');
					$upd['status_pegawai'] = $this->input->post('status_pegawai');
					$upd['tanggal_pengangkatan_cpns'] = $this->input->post('tanggal_pengangkatan_cpns');
					$upd['alamat'] = $this->input->post('alamat');
					$upd['no_npwp'] = $this->input->post('no_npwp');
					$upd['kartu_askes_pegawai'] = $this->input->post('kartu_askes_pegawai');
					$upd['status_pegawai_pangkat'] = $this->input->post('status_pegawai_pangkat');
					$upd['id_golongan'] = $this->input->post('id_golongan');
					$upd['nomor_sk_pangkat'] = $this->input->post('nomor_sk_pangkat');
					$upd['tanggal_sk_pangkat'] = $this->input->post('tanggal_sk_pangkat');
					$upd['tanggal_mulai_pangkat'] = $this->input->post('tanggal_mulai_pangkat');
					$upd['tanggal_selesai_pangkat'] = $this->input->post('tanggal_selesai_pangkat');
					$upd['id_status_jabatan'] = $this->input->post('id_status_jabatan');
					$upd['id_jabatan'] = $this->input->post('id_jabatan');
					$upd['id_unit_kerja'] = $this->input->post('id_unit_kerja');
					$upd['id_satuan_kerja'] = $this->input->post('id_satuan_kerja');
					$upd['lokasi_kerja'] = $this->input->post('lokasi_kerja');
					$upd['nomor_sk_jabatan'] = $this->input->post('nomor_sk_jabatan');
					$upd['tanggal_sk_jabatan'] = $this->input->post('tanggal_sk_jabatan');
					$upd['tanggal_mulai_jabatan'] = $this->input->post('tanggal_mulai_jabatan');
					$upd['tanggal_selesai_jabatan'] = $this->input->post('tanggal_selesai_jabatan');
					$upd['id_eselon'] = $this->input->post('id_eselon');
					$upd['tmt_eselon'] = $this->input->post('tmt_eselon');
					
					if(!empty($_FILES['userfile']['name']))
					{
						$acak=rand(00000000000,99999999999);
						$bersih=$_FILES['userfile']['name'];
						$nm=str_replace(" ","_","$bersih");
						$pisah=explode(".",$nm);
						$nama_murni_lama = preg_replace("/^(.+?);.*$/", "\\1",$pisah[0]);
						$nama_murni=date('Ymd-His');
						$ekstensi_kotor = $pisah[1];
						
						$file_type = preg_replace("/^(.+?);.*$/", "\\1", $ekstensi_kotor);
						$file_type_baru = strtolower($file_type);
						
						$ubah=$acak.'-'.$nama_murni; //tanpa ekstensi
						$n_baru = $ubah.'.'.$file_type_baru;
						
						$config['upload_path']	= "./asset/foto_pegawai/";
						$config['allowed_types']= 'gif|jpg|png|jpeg';
						$config['file_name'] = $n_baru;
						$config['max_size']     = '2500';
						$config['max_width']  	= '3000';
						$config['max_height']  	= '3000';
				 
						$this->load->library('upload', $config);
				 
						if ($this->upload->do_upload("userfile")) {
							$data	 	= $this->upload->data();
				 
							/* PATH */
							$source             = "./asset/foto_pegawai/".$data['file_name'] ;
							$destination_thumb	= "./asset/foto_pegawai/thumb/" ;
							$destination_medium	= "./asset/foto_pegawai/medium/" ;
				 
							// Permission Configuration
							chmod($source, 0777) ;
				 
							/* Resizing Processing */
							// Configuration Of Image Manipulation :: Static
							$this->load->library('image_lib') ;
							$img['image_library'] = 'GD2';
							$img['create_thumb']  = TRUE;
							$img['maintain_ratio']= TRUE;
				 
							/// Limit Width Resize
							$limit_medium   = 425 ;
							$limit_thumb    = 220 ;
				 
							// Size Image Limit was using (LIMIT TOP)
							$limit_use  = $data['image_width'] > $data['image_height'] ? $data['image_width'] : $data['image_height'] ;
				 
							// Percentase Resize
							if ($limit_use > $limit_medium || $limit_use > $limit_thumb) {
								$percent_medium = $limit_medium/$limit_use ;
								$percent_thumb  = $limit_thumb/$limit_use ;
							}
				 
							//// Making THUMBNAIL ///////
							$img['width']  = $limit_use > $limit_thumb ?  $data['image_width'] * $percent_thumb : $data['image_width'] ;
							$img['height'] = $limit_use > $limit_thumb ?  $data['image_height'] * $percent_thumb : $data['image_height'] ;
				 
							// Configuration Of Image Manipulation :: Dynamic
							$img['thumb_marker'] = '';
							$img['quality']      = '100%' ;
							$img['source_image'] = $source ;
							$img['new_image']    = $destination_thumb ;
				 
							// Do Resizing
							$this->image_lib->initialize($img);
							$this->image_lib->resize();
							$this->image_lib->clear() ;
				 
							////// Making MEDIUM /////////////
							$img['width']   = $limit_use > $limit_medium ?  $data['image_width'] * $percent_medium : $data['image_width'] ;
							$img['height']  = $limit_use > $limit_medium ?  $data['image_height'] * $percent_medium : $data['image_height'] ;
				 
							// Configuration Of Image Manipulation :: Dynamic
							$img['thumb_marker'] = '';
							$img['quality']      = '100%' ;
							$img['source_image'] = $source ;
							$img['new_image']    = $destination_medium ;
							
							$upd['foto'] = $data['file_name'];
				 
							// Do Resizing
							$this->image_lib->initialize($img);
							$this->image_lib->resize();
							$this->image_lib->clear() ;
						}
					}
					
					$this->db->update("tbl_data_pegawai",$upd,$id);
					
				
						header("location:".base_url()."pegawai/edit/".$this->session->userdata("kode_pegawai")."");
				}
				else if($st=="tambah")
				{
					$in['nip'] = $this->input->post('nip');
					$in['nip_lama'] = $this->input->post('nip_lama');
					$in['no_kartu_pegawai'] = $this->input->post('no_kartu_pegawai');
					$in['nama_pegawai'] = $this->input->post('nama_pegawai');
					$in['tempat_lahir'] = $this->input->post('tempat_lahir');
					$in['tanggal_lahir'] = $this->input->post('tanggal_lahir');
					$in['jenis_kelamin'] = $this->input->post('jenis_kelamin');
					$in['agama'] = $this->input->post('agama');
					$in['usia'] = $this->input->post('usia');
					$in['status_pegawai'] = $this->input->post('status_pegawai');
					$in['tanggal_pengangkatan_cpns'] = $this->input->post('tanggal_pengangkatan_cpns');
					$in['alamat'] = $this->input->post('alamat');
					$in['no_npwp'] = $this->input->post('no_npwp');
					$in['kartu_askes_pegawai'] = $this->input->post('kartu_askes_pegawai');
					$in['status_pegawai_pangkat'] = $this->input->post('status_pegawai_pangkat');
					$in['id_golongan'] = $this->input->post('id_golongan');
					$in['nomor_sk_pangkat'] = $this->input->post('nomor_sk_pangkat');
					$in['tanggal_sk_pangkat'] = $this->input->post('tanggal_sk_pangkat');
					$in['tanggal_mulai_pangkat'] = $this->input->post('tanggal_mulai_pangkat');
					$in['tanggal_selesai_pangkat'] = $this->input->post('tanggal_selesai_pangkat');
					$in['id_status_jabatan'] = $this->input->post('id_status_jabatan');
					$in['id_jabatan'] = $this->input->post('id_jabatan');
					$in['id_unit_kerja'] = $this->input->post('id_unit_kerja');
					$in['id_satuan_kerja'] = $this->input->post('id_satuan_kerja');
					$in['lokasi_kerja'] = $this->input->post('lokasi_kerja');
					$in['nomor_sk_jabatan'] = $this->input->post('nomor_sk_jabatan');
					$in['tanggal_sk_jabatan'] = $this->input->post('tanggal_sk_jabatan');
					$in['tanggal_mulai_jabatan'] = $this->input->post('tanggal_mulai_jabatan');
					$in['tanggal_selesai_jabatan'] = $this->input->post('tanggal_selesai_jabatan');
					$in['id_eselon'] = $this->input->post('id_eselon');
					$in['tmt_eselon'] = $this->input->post('tmt_eselon');
					
					if(!empty($_FILES['userfile']['name']))
					{
						$acak=rand(00000000000,99999999999);
						$bersih=$_FILES['userfile']['name'];
						$nm=str_replace(" ","_","$bersih");
						$pisah=explode(".",$nm);
						$nama_murni_lama = preg_replace("/^(.+?);.*$/", "\\1",$pisah[0]);
						$nama_murni=date('Ymd-His');
						$ekstensi_kotor = $pisah[1];
						
						$file_type = preg_replace("/^(.+?);.*$/", "\\1", $ekstensi_kotor);
						$file_type_baru = strtolower($file_type);
						
						$ubah=$acak.'-'.$nama_murni; //tanpa ekstensi
						$n_baru = $ubah.'.'.$file_type_baru;
						
						$config['upload_path']	= "./asset/foto_pegawai/";
						$config['allowed_types']= 'gif|jpg|png|jpeg';
						$config['file_name'] = $n_baru;
						$config['max_size']     = '2500';
						$config['max_width']  	= '3000';
						$config['max_height']  	= '3000';
				 
						$this->load->library('upload', $config);
				 
						if ($this->upload->do_upload("userfile")) {
							$data	 	= $this->upload->data();
				 
							/* PATH */
							$source             = "./asset/foto_pegawai/".$data['file_name'] ;
							$destination_thumb	= "./asset/foto_pegawai/thumb/" ;
							$destination_medium	= "./asset/foto_pegawai/medium/" ;
				 
							// Permission Configuration
							chmod($source, 0777) ;
				 
							/* Resizing Processing */
							// Configuration Of Image Manipulation :: Static
							$this->load->library('image_lib') ;
							$img['image_library'] = 'GD2';
							$img['create_thumb']  = TRUE;
							$img['maintain_ratio']= TRUE;
				 
							/// Limit Width Resize
							$limit_medium   = 425 ;
							$limit_thumb    = 220 ;
				 
							// Size Image Limit was using (LIMIT TOP)
							$limit_use  = $data['image_width'] > $data['image_height'] ? $data['image_width'] : $data['image_height'] ;
				 
							// Percentase Resize
							if ($limit_use > $limit_medium || $limit_use > $limit_thumb) {
								$percent_medium = $limit_medium/$limit_use ;
								$percent_thumb  = $limit_thumb/$limit_use ;
							}
				 
							//// Making THUMBNAIL ///////
							$img['width']  = $limit_use > $limit_thumb ?  $data['image_width'] * $percent_thumb : $data['image_width'] ;
							$img['height'] = $limit_use > $limit_thumb ?  $data['image_height'] * $percent_thumb : $data['image_height'] ;
				 
							// Configuration Of Image Manipulation :: Dynamic
							$img['thumb_marker'] = '';
							$img['quality']      = '100%' ;
							$img['source_image'] = $source ;
							$img['new_image']    = $destination_thumb ;
				 
							// Do Resizing
							$this->image_lib->initialize($img);
							$this->image_lib->resize();
							$this->image_lib->clear() ;
				 
							////// Making MEDIUM /////////////
							$img['width']   = $limit_use > $limit_medium ?  $data['image_width'] * $percent_medium : $data['image_width'] ;
							$img['height']  = $limit_use > $limit_medium ?  $data['image_height'] * $percent_medium : $data['image_height'] ;
				 
							// Configuration Of Image Manipulation :: Dynamic
							$img['thumb_marker'] = '';
							$img['quality']      = '100%' ;
							$img['source_image'] = $source ;
							$img['new_image']    = $destination_medium ;
							
							$in['foto'] = $data['file_name'];
				 
							// Do Resizing
							$this->image_lib->initialize($img);
							$this->image_lib->resize();
							$this->image_lib->clear() ;
						}
					}
					
					$this->db->insert("tbl_data_pegawai",$in);
					?>
						<script>
							window.parent.location.reload(true);
						</script>
					<?php
				}
			
			}
		}
		else
		{
			header('location:'.base_url().'');
		}
	}
}

/* End of file pegawai.php */
/* Location: ./application/controllers/pegawai.php */