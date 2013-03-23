<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Data_Gaji_Pokok extends CI_Controller {

	/*
		***	Controller : data_gaji_pokok.php
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
			$tot_hal = $this->db->query("select * from tbl_data_gaji_pokok a left join tbl_master_golongan 
			b on a.id_golongan=b.id_golongan where a.id_pegawai='".$kode['id_pegawai']."'");
			$config['base_url'] = base_url() . 'data_gaji_pokok/index/';
			$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 4;
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Selanjutnya';
			$config['prev_link'] = 'Sebelumnya';
			$this->pagination->initialize($config);
			$d["paginator"] =$this->pagination->create_links();
			
			$d['data'] = $this->db->query("select * from tbl_data_gaji_pokok a left join tbl_master_golongan 
			b on a.id_golongan=b.id_golongan where a.id_pegawai='".$kode['id_pegawai']."' LIMIT ".$offset.",".$limit."");
			
			$this->load->view('dashboard_admin/master/header',$d);
			$this->load->view('dashboard_admin/master/data_gaji_pokok/bg_home');
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
			$id['id_gaji_pokok'] = $this->uri->segment(3);
			$q = $this->db->get_where("tbl_data_gaji_pokok",$id);
			$d = array();
			foreach($q->result() as $dt)
			{
				$d['id_param'] = $dt->id_gaji_pokok;
				$d['id_pegawai'] = $dt->id_pegawai; 
				$d['id_golongan'] = $dt->id_golongan; 
				$d['nomor_sk'] = $dt->nomor_sk; 
				$d['tanggal_sk'] = $dt->tanggal_sk; 
				$d['dasar_perubahan'] = $dt->dasar_perubahan; 
				$d['gaji_pokok'] = $dt->gaji_pokok; 
				$d['tanggal_mulai'] = $dt->tanggal_mulai; 
				$d['tanggal_selesai'] = $dt->tanggal_selesai; 
				$d['masa_kerja'] = $dt->masa_kerja; 
				$d['pejabat_menetapkan'] = $dt->pejabat_menetapkan; 
			}
			$d['st'] = "edit";
			$d['golongan'] = $this->db->get("tbl_master_golongan");
			
			$this->load->view('dashboard_admin/master/data_gaji_pokok/input',$d);
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
			$id['id_gaji_pokok'] = $this->uri->segment(3);
			$q = $this->db->get_where("tbl_data_gaji_pokok",$id);
			$d = array();
			foreach($q->result() as $dt)
			{
				$d['id_param'] = $dt->id_gaji_pokok;
				$d['id_pegawai'] = $dt->id_pegawai; 
				$d['id_golongan'] = $dt->id_golongan; 
				$d['nomor_sk'] = $dt->nomor_sk; 
				$d['tanggal_sk'] = $dt->tanggal_sk; 
				$d['dasar_perubahan'] = $dt->dasar_perubahan; 
				$d['gaji_pokok'] = $dt->gaji_pokok; 
				$d['tanggal_mulai'] = $dt->tanggal_mulai; 
				$d['tanggal_selesai'] = $dt->tanggal_selesai; 
				$d['masa_kerja'] = $dt->masa_kerja; 
				$d['pejabat_menetapkan'] = $dt->pejabat_menetapkan; 
			}
			$d['st'] = "edit";
			$d['golongan'] = $this->db->get("tbl_master_golongan");
			
			$this->load->view('dashboard_admin/master/data_gaji_pokok/detail',$d);
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
			$d['id_golongan'] = "";
			$d['nomor_sk'] = "";
			$d['tanggal_sk'] = "";
			$d['dasar_perubahan'] = "";
			$d['gaji_pokok'] = "";
			$d['tanggal_mulai'] = "";
			$d['tanggal_selesai'] = "";
			$d['masa_kerja'] = "";
			$d['pejabat_menetapkan'] = "";
			
			$d['st'] = "tambah";
			$d['golongan'] = $this->db->get("tbl_master_golongan");
			
			$this->load->view('dashboard_admin/master/data_gaji_pokok/input',$d);
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
			$id['id_gaji_pokok'] = $this->uri->segment(3);
			$this->db->delete("tbl_data_gaji_pokok",$id);
			header('location:'.base_url().'data_gaji_pokok/index/'.$this->session->userdata("kode_pegawai").'');
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
			$this->form_validation->set_rules('id_golongan', 'Golongan', 'trim|required');
			$this->form_validation->set_rules('nomor_sk', 'Nomor SK', 'trim|required');
			$this->form_validation->set_rules('tanggal_sk', 'Tanggal SK', 'trim|required');
			$this->form_validation->set_rules('dasar_perubahan', 'Dasar Perubahan', 'trim|required');
			$this->form_validation->set_rules('gaji_pokok', 'Gaji Pokok', 'trim|required');
			$this->form_validation->set_rules('tanggal_mulai', 'Tanggal Mulai', 'trim|required');
			$this->form_validation->set_rules('tanggal_selesai', 'Tanggal Selesai', 'trim|required');
			$this->form_validation->set_rules('masa_kerja', 'Masa Kerja', 'trim|required');
			$this->form_validation->set_rules('pejabat_menetapkan', 'Pejabat Menetapkan', 'trim|required');
			
			$id['id_gaji_pokok'] = $this->input->post("id_param");
			
			if ($this->form_validation->run() == FALSE)
			{
				$st = $this->input->post('st');
				if($st=="edit")
				{
					$q = $this->db->get_where("tbl_data_gaji_pokok",$id);
					$d = array();
					foreach($q->result() as $dt)
					{
						$d['id_param'] = $dt->id_gaji_pokok;
						$d['id_pegawai'] = $dt->id_pegawai; 
						$d['id_golongan'] = $dt->id_golongan; 
						$d['nomor_sk'] = $dt->nomor_sk; 
						$d['tanggal_sk'] = $dt->tanggal_sk; 
						$d['dasar_perubahan'] = $dt->tanggal_sk; 
						$d['gaji_pokok'] = $dt->tanggal_sk; 
						$d['tanggal_mulai'] = $dt->tanggal_mulai; 
						$d['tanggal_selesai'] = $dt->tanggal_selesai; 
						$d['masa_kerja'] = $dt->masa_kerja; 
						$d['pejabat_menetapkan'] = $dt->pejabat_menetapkan;   
					}
					$d['st'] = $st;
					$d['golongan'] = $this->db->get("tbl_master_golongan");
					$this->load->view('dashboard_admin/master/data_gaji_pokok/input',$d);
				}
				else if($st=="tambah")
				{
					$d['id_param'] = "";
					$d['id_pegawai'] = $this->session->userdata("kode_pegawai");
					$d['id_golongan'] = "";
					$d['nomor_sk'] = "";
					$d['tanggal_sk'] = "";
					$d['dasar_perubahan'] = "";
					$d['gaji_pokok'] = "";
					$d['tanggal_mulai'] = "";
					$d['tanggal_selesai'] = "";
					$d['masa_kerja'] = "";
					$d['pejabat_menetapkan'] = "";
					$d['st'] = $st;
					$d['golongan'] = $this->db->get("tbl_master_golongan");
					$this->load->view('dashboard_admin/master/data_gaji_pokok/input',$d);
				}
			}
			else
			{
				$st = $this->input->post('st');
				if($st=="edit")
				{
					$upd['id_pegawai'] = $this->input->post("id_pegawai");
					$upd['id_golongan'] = $this->input->post("id_golongan");
					$upd['nomor_sk'] = $this->input->post("nomor_sk");
					$upd['tanggal_sk'] = $this->input->post("tanggal_sk");
					$upd['dasar_perubahan'] = $this->input->post("dasar_perubahan");
					$upd['gaji_pokok'] = $this->input->post("gaji_pokok");
					$upd['tanggal_mulai'] = $this->input->post("tanggal_mulai");
					$upd['tanggal_selesai'] = $this->input->post("tanggal_selesai");
					$upd['masa_kerja'] = $this->input->post("masa_kerja");
					$upd['pejabat_menetapkan'] = $this->input->post("pejabat_menetapkan");
					
					
					$this->db->update("tbl_data_gaji_pokok",$upd,$id);
					?>
						<script>
							window.parent.location.reload(true);
						</script>
					<?php
				}
				else if($st=="tambah")
				{
					$in['id_pegawai'] = $this->input->post("id_pegawai");
					$in['id_golongan'] = $this->input->post("id_golongan");
					$in['nomor_sk'] = $this->input->post("nomor_sk");
					$in['tanggal_sk'] = $this->input->post("tanggal_sk");
					$in['dasar_perubahan'] = $this->input->post("dasar_perubahan");
					$in['gaji_pokok'] = $this->input->post("gaji_pokok");
					$in['tanggal_mulai'] = $this->input->post("tanggal_mulai");
					$in['tanggal_selesai'] = $this->input->post("tanggal_selesai");
					$in['masa_kerja'] = $this->input->post("masa_kerja");
					$in['pejabat_menetapkan'] = $this->input->post("pejabat_menetapkan");
					
					$this->db->insert("tbl_data_gaji_pokok",$in);
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

/* End of file data_gaji_pokok.php */
/* Location: ./application/controllers/data_gaji_pokok.php */