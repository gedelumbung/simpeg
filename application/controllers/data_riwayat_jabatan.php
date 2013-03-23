<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Data_Riwayat_Jabatan extends CI_Controller {

	/*
		***	Controller : data_riwayat_jabatan.php
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
			
			$id['kode_pegawai'] = $this->uri->segment(3);
			$this->session->set_userdata($id);
			$kode['id_pegawai'] = $this->session->userdata('kode_pegawai');
			
			$page=$this->uri->segment(4);
			$limit=$this->config->item('limit_data');
			if(!$page):
			$offset = 0;
			else:
			$offset = $page;
			endif;
			
			$d['tot'] = $offset;
			$tot_hal = $this->db->query("select * from tbl_data_riwayat_jabatan a left join tbl_master_jabatan b
			on a.id_jabatan=b.id_jabatan left join tbl_master_unit_kerja c on a.id_unit_kerja=c.id_unit_kerja
			left join tbl_master_eselon d on a.id_eselon=d.id_eselon where a.id_pegawai='".$kode['id_pegawai']."'");
			$config['base_url'] = base_url() . 'data_riwayat_jabatan/index/';
			$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 4;
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Selanjutnya';
			$config['prev_link'] = 'Sebelumnya';
			$this->pagination->initialize($config);
			$d["paginator"] =$this->pagination->create_links();
			
			$d['data'] = $this->db->query("select * from tbl_data_riwayat_jabatan a left join tbl_master_jabatan b
			on a.id_jabatan=b.id_jabatan left join tbl_master_unit_kerja c on a.id_unit_kerja=c.id_unit_kerja
			left join tbl_master_eselon d on a.id_eselon=d.id_eselon left join tbl_master_status_jabatan e on a.status=e.id_status_jabatan 
			where a.id_pegawai='".$kode['id_pegawai']."'
			 LIMIT ".$offset.",".$limit."");
			
			$this->load->view('dashboard_admin/master/header',$d);
			$this->load->view('dashboard_admin/master/data_riwayat_jabatan/bg_home');
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
			$id['id_riwayat_jabatan'] = $this->uri->segment(3);
			$q = $this->db->get_where("tbl_data_riwayat_jabatan",$id);
			$d = array();
			foreach($q->result() as $dt)
			{
				$d['id_param'] = $dt->id_riwayat_jabatan;
				$d['id_pegawai'] = $dt->id_pegawai; 
				$d['status'] = $dt->status; 
				$d['penempatan'] = $dt->penempatan; 
				$d['id_jabatan'] = $dt->id_jabatan; 
				$d['id_unit_kerja'] = $dt->id_unit_kerja; 
				$d['uraian'] = $dt->uraian; 
				$d['id_eselon'] = $dt->id_eselon; 
				$d['tmt_eselon'] = $dt->tmt_eselon; 
				$d['nomor_sk'] = $dt->nomor_sk; 
				$d['tanggal_sk'] = $dt->tanggal_sk; 
				$d['tanggal_mulai'] = $dt->tanggal_mulai; 
				$d['tanggal_selesai'] = $dt->tanggal_selesai; 
				$d['lokasi'] = $dt->lokasi; 
			}
			$d['st'] = "edit";
			$d['mst_jabatan'] = $this->db->get("tbl_master_jabatan");
			$d['mst_unit_kerja'] = $this->db->get("tbl_master_unit_kerja");
			$d['mst_eselon'] = $this->db->get("tbl_master_eselon");
			$d['mst_stts_jabatan'] = $this->db->get('tbl_master_status_jabatan');
			
			$this->load->view('dashboard_admin/master/data_riwayat_jabatan/input',$d);
		}
		else
		{
			header('location:'.base_url().'');
		}
	}

	public function detail()
	{
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="administrator")
		{
			$id['id_riwayat_jabatan'] = $this->uri->segment(3);
			$q = $this->db->get_where("tbl_data_riwayat_jabatan",$id);
			$d = array();
			foreach($q->result() as $dt)
			{
				$d['id_param'] = $dt->id_riwayat_jabatan;
				$d['id_pegawai'] = $dt->id_pegawai; 
				$d['status'] = $dt->status; 
				$d['penempatan'] = $dt->penempatan; 
				$d['id_jabatan'] = $dt->id_jabatan; 
				$d['id_unit_kerja'] = $dt->id_unit_kerja; 
				$d['uraian'] = $dt->uraian; 
				$d['id_eselon'] = $dt->id_eselon; 
				$d['tmt_eselon'] = $dt->tmt_eselon; 
				$d['nomor_sk'] = $dt->nomor_sk; 
				$d['tanggal_sk'] = $dt->tanggal_sk; 
				$d['tanggal_mulai'] = $dt->tanggal_mulai; 
				$d['tanggal_selesai'] = $dt->tanggal_selesai; 
				$d['lokasi'] = $dt->lokasi; 
			}
			$d['st'] = "edit";
			$d['mst_jabatan'] = $this->db->get("tbl_master_jabatan");
			$d['mst_unit_kerja'] = $this->db->get("tbl_master_unit_kerja");
			$d['mst_eselon'] = $this->db->get("tbl_master_eselon");
			
			$this->load->view('dashboard_admin/master/data_riwayat_jabatan/detail',$d);
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
			$d['id_pegawai'] = $this->session->userdata("kode_pegawai");
			$d['status'] = "";
			$d['penempatan'] = "";
			$d['id_jabatan'] = "";
			$d['id_unit_kerja'] = "";
			$d['uraian'] = "";
			$d['id_eselon'] = "";
			$d['tmt_eselon'] = "";
			$d['nomor_sk'] = "";
			$d['tanggal_sk'] = "";
			$d['tanggal_mulai'] = "";
			$d['tanggal_selesai'] = "";
			$d['lokasi'] = "";
			
			$d['st'] = "tambah";
			$d['mst_jabatan'] = $this->db->get("tbl_master_jabatan");
			$d['mst_unit_kerja'] = $this->db->get("tbl_master_unit_kerja");
			$d['mst_eselon'] = $this->db->get("tbl_master_eselon");
			$d['mst_stts_jabatan'] = $this->db->get('tbl_master_status_jabatan');
			
			$this->load->view('dashboard_admin/master/data_riwayat_jabatan/input',$d);
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
			$id['id_riwayat_jabatan'] = $this->uri->segment(3);
			$this->db->delete("tbl_data_riwayat_jabatan",$id);
			header('location:'.base_url().'data_riwayat_jabatan/index/'.$this->session->userdata("kode_pegawai").'');
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
			$this->form_validation->set_rules('id_pegawai', 'Id Pegawai', 'trim|required');
			$this->form_validation->set_rules('status', 'Status', 'trim|required');
			$this->form_validation->set_rules('penempatan', 'Penempatan', 'trim|required');
			$this->form_validation->set_rules('id_jabatan', 'Jabatan', 'trim|required');
			$this->form_validation->set_rules('id_unit_kerja', 'Unit Kerja', 'trim|required');
			$this->form_validation->set_rules('uraian', 'Uraian', 'trim|required');
			$this->form_validation->set_rules('id_eselon', 'Eselon', 'trim|required');
			$this->form_validation->set_rules('tmt_eselon', 'Tmt Eselon', 'trim|required');
			$this->form_validation->set_rules('nomor_sk', 'Nomor SK', 'trim|required');
			$this->form_validation->set_rules('tanggal_sk', 'Tanggal SK', 'trim|required');
			$this->form_validation->set_rules('tanggal_mulai', 'Tanggal Mulai', 'trim|required');
			$this->form_validation->set_rules('tanggal_selesai', 'Tanggal Selesai', 'trim|required');
			$this->form_validation->set_rules('lokasi', 'Lokasi', 'trim|required');
			
			$id['id_riwayat_jabatan'] = $this->input->post("id_param");
			
			if ($this->form_validation->run() == FALSE)
			{
				$st = $this->input->post('st');
				if($st=="edit")
				{
					$q = $this->db->get_where("tbl_data_riwayat_jabatan",$id);
					$d = array();
					foreach($q->result() as $dt)
					{
						$d['id_param'] = $dt->id_riwayat_jabatan;
						$d['id_pegawai'] = $dt->id_pegawai; 
						$d['status'] = $dt->status; 
						$d['penempatan'] = $dt->penempatan; 
						$d['id_jabatan'] = $dt->id_jabatan; 
						$d['id_unit_kerja'] = $dt->id_unit_kerja; 
						$d['uraian'] = $dt->uraian; 
						$d['id_eselon'] = $dt->id_eselon; 
						$d['tmt_eselon'] = $dt->tmt_eselon; 
						$d['nomor_sk'] = $dt->nomor_sk; 
						$d['tanggal_sk'] = $dt->tanggal_sk; 
						$d['tanggal_mulai'] = $dt->tanggal_mulai; 
						$d['tanggal_selesai'] = $dt->tanggal_selesai; 
						$d['lokasi'] = $dt->lokasi; 
					}
					$d['st'] = $st;
					$d['mst_jabatan'] = $this->db->get("tbl_master_jabatan");
					$d['mst_unit_kerja'] = $this->db->get("tbl_master_unit_kerja");
					$d['mst_eselon'] = $this->db->get("tbl_master_eselon");
			
					$this->load->view('dashboard_admin/master/data_riwayat_jabatan/input',$d);
					
				}
				else if($st=="tambah")
				{
					$d['id_param'] = "";
					$d['id_pegawai'] = $this->session->userdata("kode_pegawai");
					$d['status'] = "";
					$d['penempatan'] = "";
					$d['id_jabatan'] = "";
					$d['id_unit_kerja'] = "";
					$d['uraian'] = "";
					$d['id_eselon'] = "";
					$d['tmt_eselon'] = "";
					$d['nomor_sk'] = "";
					$d['tanggal_sk'] = "";
					$d['tanggal_mulai'] = "";
					$d['tanggal_selesai'] = "";
					$d['lokasi'] = "";
			
					$d['st'] = "tambah";
					$d['mst_jabatan'] = $this->db->get("tbl_master_jabatan");
					$d['mst_unit_kerja'] = $this->db->get("tbl_master_unit_kerja");
					$d['mst_eselon'] = $this->db->get("tbl_master_eselon");
			
					$this->load->view('dashboard_admin/master/data_riwayat_jabatan/input',$d);
				}
			}
			else
			{
				$st = $this->input->post('st');
				if($st=="edit")
				{
					$upd['id_pegawai'] = $this->input->post("id_pegawai");
					$upd['status'] = $this->input->post("status");
					$upd['penempatan'] = $this->input->post("penempatan");
					$upd['id_jabatan'] = $this->input->post("id_jabatan");
					$upd['id_unit_kerja'] = $this->input->post("id_unit_kerja");
					$upd['uraian'] = $this->input->post("uraian");
					$upd['id_eselon'] = $this->input->post("id_eselon");
					$upd['tmt_eselon'] = $this->input->post("tmt_eselon");
					$upd['nomor_sk'] = $this->input->post("nomor_sk");
					$upd['tanggal_sk'] = $this->input->post("tanggal_sk");
					$upd['tanggal_mulai'] = $this->input->post("tanggal_mulai");
					$upd['tanggal_selesai'] = $this->input->post("tanggal_selesai");
					$upd['lokasi'] = $this->input->post("lokasi");
					
					$this->db->update("tbl_data_riwayat_jabatan",$upd,$id);
					?>
						<script>
							window.parent.location.reload(true);
						</script>
					<?php
				}
				else if($st=="tambah")
				{
					$in['id_pegawai'] = $this->input->post("id_pegawai");
					$in['status'] = $this->input->post("status");
					$in['penempatan'] = $this->input->post("penempatan");
					$in['id_jabatan'] = $this->input->post("id_jabatan");
					$in['id_unit_kerja'] = $this->input->post("id_unit_kerja");
					$in['uraian'] = $this->input->post("uraian");
					$in['id_eselon'] = $this->input->post("id_eselon");
					$in['tmt_eselon'] = $this->input->post("tmt_eselon");
					$in['nomor_sk'] = $this->input->post("nomor_sk");
					$in['tanggal_sk'] = $this->input->post("tanggal_sk");
					$in['tanggal_mulai'] = $this->input->post("tanggal_mulai");
					$in['tanggal_selesai'] = $this->input->post("tanggal_selesai");
					$in['lokasi'] = $this->input->post("lokasi");
					
					$this->db->insert("tbl_data_riwayat_jabatan",$in);
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

/* End of file data_riwayat_pangkat.php */
/* Location: ./application/controllers/data_riwayat_pangkat.php */