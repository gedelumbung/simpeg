<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Data_Seminar extends CI_Controller {

	/*
		***	Controller : data_seminar.php
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
			$tot_hal = $this->db->get_where("tbl_data_seminar",$kode);
			$config['base_url'] = base_url() . 'data_seminar/index/';
			$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 4;
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Selanjutnya';
			$config['prev_link'] = 'Sebelumnya';
			$this->pagination->initialize($config);
			$d["paginator"] =$this->pagination->create_links();
			
			$d['data'] = $this->db->get_where("tbl_data_seminar",$kode,$limit,$offset);
			
			$this->load->view('dashboard_admin/master/header',$d);
			$this->load->view('dashboard_admin/master/data_seminar/bg_home');
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
			$id['id_seminar'] = $this->uri->segment(3);
			$q = $this->db->get_where("tbl_data_seminar",$id);
			$d = array();
			foreach($q->result() as $dt)
			{
				$d['id_param'] = $dt->id_seminar;
				$d['id_pegawai'] = $dt->id_pegawai; 
				$d['uraian'] = $dt->uraian; 
				$d['lokasi'] = $dt->lokasi; 
				$d['tanggal'] = $dt->tanggal; 
			}
			$d['st'] = "edit";
			
			$this->load->view('dashboard_admin/master/data_seminar/input',$d);
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
			$id['id_seminar'] = $this->uri->segment(3);
			$q = $this->db->get_where("tbl_data_seminar",$id);
			$d = array();
			foreach($q->result() as $dt)
			{
				$d['id_param'] = $dt->id_seminar;
				$d['id_pegawai'] = $dt->id_pegawai; 
				$d['uraian'] = $dt->uraian; 
				$d['lokasi'] = $dt->lokasi; 
				$d['tanggal'] = $dt->tanggal; 
			}
			$d['st'] = "edit";
			$this->load->view('dashboard_admin/master/data_seminar/detail',$d);
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
			$d['uraian'] = "";
			$d['lokasi'] = "";
			$d['tanggal'] = "";
			
			$d['st'] = "tambah";
			
			$this->load->view('dashboard_admin/master/data_seminar/input',$d);
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
			$id['id_seminar'] = $this->uri->segment(3);
			$this->db->delete("tbl_data_seminar",$id);
			header('location:'.base_url().'data_seminar/index/'.$this->session->userdata("kode_pegawai").'');
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
			$this->form_validation->set_rules('uraian', 'Uraian', 'trim|required');
			$this->form_validation->set_rules('lokasi', 'Lokasi', 'trim|required');
			$this->form_validation->set_rules('tanggal', 'Tanggal', 'trim|required');
			
			$id['id_seminar'] = $this->input->post("id_param");
			
			if ($this->form_validation->run() == FALSE)
			{
				$st = $this->input->post('st');
				if($st=="edit")
				{
					$q = $this->db->get_where("tbl_data_seminar",$id);
					$d = array();
					foreach($q->result() as $dt)
					{
						$d['id_param'] = $dt->id_seminar;
						$d['id_pegawai'] = $dt->id_pegawai; 
						$d['uraian'] = $dt->uraian; 
						$d['lokasi'] = $dt->lokasi; 
						$d['tanggal'] = $dt->tanggal; 
					}
					$d['st'] = $st;
					$this->load->view('dashboard_admin/master/data_seminar/input',$d);
				}
				else if($st=="tambah")
				{
					$d['id_param'] = "";
					$d['id_pegawai'] = $this->session->userdata("kode_pegawai");
					$d['uraian'] = "";
					$d['lokasi'] = "";
					$d['tanggal'] = "";
			
					$d['st'] = "tambah";
			
					$this->load->view('dashboard_admin/master/data_seminar/input',$d);
				}
			}
			else
			{
				$st = $this->input->post('st');
				if($st=="edit")
				{
					$upd['id_pegawai'] = $this->input->post("id_pegawai");
					$upd['uraian'] = $this->input->post("uraian");
					$upd['lokasi'] = $this->input->post("lokasi");
					$upd['tanggal'] = $this->input->post("tanggal");
					
					$this->db->update("tbl_data_seminar",$upd,$id);
					?>
						<script>
							window.parent.location.reload(true);
						</script>
					<?php
				}
				else if($st=="tambah")
				{
					$in['id_pegawai'] = $this->input->post("id_pegawai");
					$in['uraian'] = $this->input->post("uraian");
					$in['lokasi'] = $this->input->post("lokasi");
					$in['tanggal'] = $this->input->post("tanggal");
					
					$this->db->insert("tbl_data_seminar",$in);
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

/* End of file data_seminar.php */
/* Location: ./application/controllers/data_seminar.php */