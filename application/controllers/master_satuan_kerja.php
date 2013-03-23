<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Master_Satuan_Kerja extends CI_Controller {

	/*
		***	Controller : master_satuan_kerja.php
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
			
			$page=$this->uri->segment(3);
			$limit=$this->config->item('limit_data');
			if(!$page):
			$offset = 0;
			else:
			$offset = $page;
			endif;
			
			$d['tot'] = $offset;
			$tot_hal = $this->db->get("tbl_master_satuan_kerja");
			$config['base_url'] = base_url() . 'master_satuan_kerja/index/';
			$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Selanjutnya';
			$config['prev_link'] = 'Sebelumnya';
			$this->pagination->initialize($config);
			$d["paginator"] =$this->pagination->create_links();
			
			$d['status_pegawai'] = $this->db->get("tbl_master_satuan_kerja",$limit,$offset);
			
			$this->load->view('dashboard_admin/master_satuan_kerja/home',$d);
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
			$id['id_satuan_kerja'] = $this->uri->segment(3);
			$q = $this->db->get_where("tbl_master_satuan_kerja",$id);
			$d = array();
			foreach($q->result() as $dt)
			{
				$d['id_param'] = $dt->id_satuan_kerja;
				$d['nama_unit_kerja'] = $dt->nama_satuan_kerja; 
				$d['parent_unit'] = $dt->parent_unit; 
			}
			$d['st'] = "edit";
			
			$this->load->view('dashboard_admin/master_satuan_kerja/input',$d);
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
			$id['id_satuan_kerja'] = $this->uri->segment(3);
			$q = $this->db->get_where("tbl_master_satuan_kerja",$id);
			$d = array();
			foreach($q->result() as $dt)
			{
				$d['id_param'] = $dt->id_satuan_kerja;
				$d['nama_unit_kerja'] = $dt->nama_satuan_kerja; 
				$d['parent_unit'] = $dt->parent_unit; 
			}
			$d['st'] = "edit";
			
			$this->load->view('dashboard_admin/master_satuan_kerja/detail',$d);
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
			$d['nama_unit_kerja'] = ""; 
			$d['parent_unit'] = ""; 
			$d['st'] = "tambah";
			$this->load->view('dashboard_admin/master_satuan_kerja/input',$d);
		}
		else
		{
			header('location:'.base_url().'');
		}
	}

	public function cari()
	{
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="administrator")
		{
			$d['judul_lengkap'] = $this->config->item('nama_aplikasi_full');
			$d['judul_pendek'] = $this->config->item('nama_aplikasi_pendek');
			$d['instansi'] = $this->config->item('nama_instansi');
			$d['credit'] = $this->config->item('credit_aplikasi');
			$d['alamat'] = $this->config->item('alamat_instansi');
			
			if($this->input->post("cari")=="")
			{
				$kata = $this->session->userdata('kata');
			}
			else
			{
				$sess_data['kata'] = $this->input->post("cari");
				$this->session->set_userdata($sess_data);
				$kata = $this->session->userdata('kata');
			}
			
			$page=$this->uri->segment(3);
			$limit=$this->config->item('limit_data');
			if(!$page):
			$offset = 0;
			else:
			$offset = $page;
			endif;
			
			$d['tot'] = $page;
			$tot_hal = $this->db->query("select * from tbl_master_satuan_kerja where nama_satuan_kerja like '%".$kata."%'");
			$config['base_url'] = base_url() . 'master_satuan_kerja/cari/';
			$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Selanjutnya';
			$config['prev_link'] = 'Sebelumnya';
			$this->pagination->initialize($config);
			$d["paginator"] =$this->pagination->create_links();
			$d['status_pegawai'] = $this->db->query("select * from tbl_master_satuan_kerja where nama_satuan_kerja like '%".$kata."%' LIMIT ".$offset.",".$limit."");
			$this->load->view('dashboard_admin/master_satuan_kerja/home',$d);
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
			$id['id_satuan_kerja'] = $this->uri->segment(3);
			$this->db->delete("tbl_master_satuan_kerja",$id);
			header('location:'.base_url().'master_satuan_kerja');
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
			$this->form_validation->set_rules('nama_unit_kerja', 'Nama Satuan Kerja', 'trim|required');
			$this->form_validation->set_rules('parent_unit', 'Parent Unit', 'trim|required');
			$id['id_satuan_kerja'] = $this->input->post("id_param");
			
			if ($this->form_validation->run() == FALSE)
			{
				$st = $this->input->post('st');
				if($st=="edit")
				{
					$q = $this->db->get_where("tbl_master_satuan_kerja",$id);
					$d = array();
					foreach($q->result() as $dt)
					{
						$d['id_param'] = $dt->id_unit_kerja;
						$d['nama_unit_kerja'] = $dt->nama_satuan_kerja; 
						$d['parent_unit'] = $dt->parent_unit; 
					}
					$d['st'] = $st;
					$this->load->view('dashboard_admin/master_satuan_kerja/input',$d);
				}
				else if($st=="tambah")
				{
					$d['id_param'] = "";
					$d['nama_unit_kerja'] = "";
					$d['parent_unit'] = ""; 
					$d['st'] = $st;
					$this->load->view('dashboard_admin/master_satuan_kerja/input',$d);
				}
			}
			else
			{
				$st = $this->input->post('st');
				if($st=="edit")
				{
					$upd['nama_satuan_kerja'] = $this->input->post("nama_unit_kerja");
					$upd['parent_unit'] = $this->input->post("parent_unit");
					$this->db->update("tbl_master_satuan_kerja",$upd,$id);
					?>
						<script>
							window.parent.location.reload(true);
						</script>
					<?php
				}
				else if($st=="tambah")
				{
					$in['nama_satuan_kerja'] = $this->input->post("nama_unit_kerja");
					$in['parent_unit'] = $this->input->post("parent_unit");
					$this->db->insert("tbl_master_satuan_kerja",$in);
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

/* End of file master_satuan_kerja.php */
/* Location: ./application/controllers/master_satuan_kerja.php */ 