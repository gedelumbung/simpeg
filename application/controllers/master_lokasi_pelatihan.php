<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Master_Lokasi_Pelatihan extends CI_Controller {

	/*
		***	Controller : master_lokasi_pelatihan.php
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
			$tot_hal = $this->db->get("tbl_master_lokasi_pelatihan");
			$config['base_url'] = base_url() . 'master_lokasi_pelatihan/index/';
			$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Selanjutnya';
			$config['prev_link'] = 'Sebelumnya';
			$this->pagination->initialize($config);
			$d["paginator"] =$this->pagination->create_links();
			
			$d['status_pegawai'] = $this->db->get("tbl_master_lokasi_pelatihan",$limit,$offset);
			
			$this->load->view('dashboard_admin/master_lokasi_pelatihan/home',$d);
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
			$id['id_lokasi_pelatihan'] = $this->uri->segment(3);
			$q = $this->db->get_where("tbl_master_lokasi_pelatihan",$id);
			$d = array();
			foreach($q->result() as $dt)
			{
				$d['id_param'] = $dt->id_lokasi_pelatihan;
				$d['nama_lokasi'] = $dt->nama_lokasi;
			}
			$d['st'] = "edit";
			
			$this->load->view('dashboard_admin/master_lokasi_pelatihan/input',$d);
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
			$id['id_lokasi_pelatihan'] = $this->uri->segment(3);
			$q = $this->db->get_where("tbl_master_lokasi_pelatihan",$id);
			$d = array();
			foreach($q->result() as $dt)
			{
				$d['id_param'] = $dt->id_lokasi_pelatihan;
				$d['nama_lokasi'] = $dt->nama_lokasi;
			}
			$d['st'] = "edit";
			
			$this->load->view('dashboard_admin/master_lokasi_pelatihan/detail',$d);
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
			$d['nama_lokasi'] = "";
			$d['st'] = "tambah";
			$this->load->view('dashboard_admin/master_lokasi_pelatihan/input',$d);
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
			$tot_hal = $this->db->query("select * from tbl_master_lokasi_pelatihan where nama_lokasi like '%".$kata."%'");
			$config['base_url'] = base_url() . 'master_lokasi_pelatihan/cari/';
			$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Selanjutnya';
			$config['prev_link'] = 'Sebelumnya';
			$this->pagination->initialize($config);
			$d["paginator"] =$this->pagination->create_links();
			$d['status_pegawai'] = $this->db->query("select * from tbl_master_lokasi_pelatihan where nama_lokasi like '%".$kata."%' LIMIT ".$offset.",".$limit."");
			$this->load->view('dashboard_admin/master_lokasi_pelatihan/home',$d);
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
			$id['id_lokasi_pelatihan'] = $this->uri->segment(3);
			$this->db->delete("tbl_master_lokasi_pelatihan",$id);
			header('location:'.base_url().'master_lokasi_pelatihan');
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
			$this->form_validation->set_rules('nama_lokasi', 'Nama Lokasi', 'trim|required');
			$id['id_lokasi_pelatihan'] = $this->input->post("id_param");
			
			if ($this->form_validation->run() == FALSE)
			{
				$st = $this->input->post('st');
				if($st=="edit")
				{
					$q = $this->db->get_where("tbl_master_lokasi_pelatihan",$id);
					$d = array();
					foreach($q->result() as $dt)
					{
						$d['id_param'] = $dt->id_lokasi_pelatihan;
						$d['nama_lokasi'] = $dt->nama_lokasi;
					}
					$d['st'] = $st;
					$this->load->view('dashboard_admin/master_lokasi_pelatihan/input',$d);
				}
				else if($st=="tambah")
				{
					$d['id_param'] = "";
					$d['nama_lokasi'] = "";
					$d['st'] = $st;
					$this->load->view('dashboard_admin/master_lokasi_pelatihan/input',$d);
				}
			}
			else
			{
				$st = $this->input->post('st');
				if($st=="edit")
				{
					$upd['nama_lokasi'] = $this->input->post("nama_lokasi");
					$this->db->update("tbl_master_lokasi_pelatihan",$upd,$id);
					?>
						<script>
							window.parent.location.reload(true);
						</script>
					<?php
				}
				else if($st=="tambah")
				{
					$in['nama_lokasi'] = $this->input->post("nama_lokasi");
					$this->db->insert("tbl_master_lokasi_pelatihan",$in);
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

/* End of file master_lokasi_pelatihan.php */
/* Location: ./application/controllers/master_lokasi_pelatihan.php */