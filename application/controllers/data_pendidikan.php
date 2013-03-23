<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Data_Pendidikan extends CI_Controller {

	/*
		***	Controller : data_pendidikan.php
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
			$tot_hal = $this->db->get_where("tbl_data_pendidikan",$kode);
			$config['base_url'] = base_url() . 'data_pendidikan/index/';
			$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 4;
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Selanjutnya';
			$config['prev_link'] = 'Sebelumnya';
			$this->pagination->initialize($config);
			$d["paginator"] =$this->pagination->create_links();
			
			$d['data'] = $this->db->get_where("tbl_data_pendidikan",$kode,$limit,$offset);
			
			$this->load->view('dashboard_admin/master/header',$d);
			$this->load->view('dashboard_admin/master/data_pendidikan/bg_home');
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
			$id['id_pendidikan'] = $this->uri->segment(3);
			$q = $this->db->get_where("tbl_data_pendidikan",$id);
			$d = array();
			foreach($q->result() as $dt)
			{
				$d['id_param'] = $dt->id_pendidikan;
				$d['id_pegawai'] = $dt->id_pegawai; 
				$d['tingkat_pendidikan'] = $dt->tingkat_pendidikan; 
				$d['jurusan'] = $dt->jurusan; 
				$d['uraian'] = $dt->uraian; 
				$d['teknik_non_teknik'] = $dt->teknik_non_teknik; 
				$d['sekolah'] = $dt->sekolah; 
				$d['tempat_sekolah'] = $dt->tempat_sekolah; 
				$d['nomor_sttb'] = $dt->nomor_sttb; 
				$d['tanggal_sttb'] = $dt->tanggal_sttb; 
				$d['tanggal_lulus'] = $dt->tanggal_lulus; 
			}
			$d['st'] = "edit";
			
			$this->load->view('dashboard_admin/master/data_pendidikan/input',$d);
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
			$id['id_pendidikan'] = $this->uri->segment(3);
			$q = $this->db->get_where("tbl_data_pendidikan",$id);
			$d = array();
			foreach($q->result() as $dt)
			{
				$d['id_param'] = $dt->id_pendidikan;
				$d['id_pegawai'] = $dt->id_pegawai; 
				$d['tingkat_pendidikan'] = $dt->tingkat_pendidikan; 
				$d['jurusan'] = $dt->jurusan; 
				$d['uraian'] = $dt->uraian; 
				$d['teknik_non_teknik'] = $dt->teknik_non_teknik; 
				$d['sekolah'] = $dt->sekolah; 
				$d['tempat_sekolah'] = $dt->tempat_sekolah; 
				$d['nomor_sttb'] = $dt->nomor_sttb; 
				$d['tanggal_sttb'] = $dt->tanggal_sttb; 
				$d['tanggal_lulus'] = $dt->tanggal_lulus; 
			}
			$d['st'] = "edit";
			
			$this->load->view('dashboard_admin/master/data_pendidikan/detail',$d);
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
			$d['tingkat_pendidikan'] = ""; 
			$d['jurusan'] = "";
			$d['uraian'] = "";
			$d['teknik_non_teknik'] =  "";
			$d['sekolah'] =  "";
			$d['tempat_sekolah'] =  "";
			$d['nomor_sttb'] = "";
			$d['tanggal_sttb'] =  "";
			$d['tanggal_lulus'] = "";
			$d['st'] = "tambah";
			
			$this->load->view('dashboard_admin/master/data_pendidikan/input',$d);
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
			$id['id_pendidikan'] = $this->uri->segment(3);
			$this->db->delete("tbl_data_pendidikan",$id);
			header('location:'.base_url().'data_pendidikan/index/'.$this->session->userdata("kode_pegawai").'');
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
			$this->form_validation->set_rules('tingkat_pendidikan', 'Tingkat Pendidikan', 'trim|required');
			$this->form_validation->set_rules('jurusan', 'Jurusan', 'trim|required');
			$this->form_validation->set_rules('uraian', 'Uraian', 'trim|required');
			$this->form_validation->set_rules('teknik_non_teknik', 'Teknik / Non Teknik', 'trim|required');
			$this->form_validation->set_rules('sekolah', 'Sekolah', 'trim|required');
			$this->form_validation->set_rules('tempat_sekolah', 'Tempat Sekolah', 'trim|required');
			$this->form_validation->set_rules('nomor_sttb', 'Nomor STTB', 'trim|required');
			$this->form_validation->set_rules('tanggal_sttb', 'Tanggal STTB', 'trim|required');
			$this->form_validation->set_rules('tanggal_lulus', 'Tanggal Lulus', 'trim|required');
			
			$id['id_pendidikan'] = $this->input->post("id_param");
			
			if ($this->form_validation->run() == FALSE)
			{
				$st = $this->input->post('st');
				if($st=="edit")
				{
					$q = $this->db->get_where("tbl_data_pendidikan",$id);
					$d = array();
					foreach($q->result() as $dt)
					{
						$d['id_param'] = $dt->id_pendidikan;
						$d['id_pegawai'] = $dt->id_pegawai; 
						$d['tingkat_pendidikan'] = $dt->tingkat_pendidikan; 
						$d['jurusan'] = $dt->jurusan; 
						$d['uraian'] = $dt->uraian; 
						$d['teknik_non_teknik'] = $dt->teknik_non_teknik; 
						$d['sekolah'] = $dt->sekolah; 
						$d['tempat_sekolah'] = $dt->tempat_sekolah; 
						$d['nomor_sttb'] = $dt->nomor_sttb; 
						$d['tanggal_sttb'] = $dt->tanggal_sttb; 
						$d['tanggal_lulus'] = $dt->tanggal_lulus; 
					}
					$d['st'] = $st;
			
					$this->load->view('dashboard_admin/master/data_pendidikan/input',$d);
					
				}
				else if($st=="tambah")
				{
					$d['id_param'] = "";
					$d['id_pegawai'] = $this->session->userdata("kode_pegawai");
					$d['tingkat_pendidikan'] = ""; 
					$d['jurusan'] = "";
					$d['uraian'] = "";
					$d['teknik_non_teknik'] =  "";
					$d['sekolah'] =  "";
					$d['tempat_sekolah'] =  "";
					$d['nomor_sttb'] = "";
					$d['tanggal_sttb'] =  "";
					$d['tanggal_lulus'] = "";
			
					$this->load->view('dashboard_admin/master/data_pendidikan/input',$d);
				}
			}
			else
			{
				$st = $this->input->post('st');
				if($st=="edit")
				{
					$upd['id_pegawai'] = $this->input->post("id_pegawai");
					$upd['tingkat_pendidikan'] = $this->input->post("tingkat_pendidikan");
					$upd['jurusan'] = $this->input->post("jurusan");
					$upd['uraian'] = $this->input->post("uraian");
					$upd['teknik_non_teknik'] =  $this->input->post("teknik_non_teknik");
					$upd['sekolah'] =  $this->input->post("sekolah");
					$upd['tempat_sekolah'] =  $this->input->post("tempat_sekolah");
					$upd['nomor_sttb'] = $this->input->post("nomor_sttb");
					$upd['tanggal_sttb'] =  $this->input->post("tanggal_sttb");
					$upd['tanggal_lulus'] = $this->input->post("tanggal_lulus");
					
					$this->db->update("tbl_data_pendidikan",$upd,$id);
					?>
						<script>
							window.parent.location.reload(true);
						</script>
					<?php
				}
				else if($st=="tambah")
				{
					$in['id_pegawai'] = $this->input->post("id_pegawai");
					$in['tingkat_pendidikan'] = $this->input->post("tingkat_pendidikan");
					$in['jurusan'] = $this->input->post("jurusan");
					$in['uraian'] = $this->input->post("uraian");
					$in['teknik_non_teknik'] =  $this->input->post("teknik_non_teknik");
					$in['sekolah'] =  $this->input->post("sekolah");
					$in['tempat_sekolah'] =  $this->input->post("tempat_sekolah");
					$in['nomor_sttb'] = $this->input->post("nomor_sttb");
					$in['tanggal_sttb'] =  $this->input->post("tanggal_sttb");
					$in['tanggal_lulus'] = $this->input->post("tanggal_lulus");
					
					$this->db->insert("tbl_data_pendidikan",$in);
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

/* End of file data_pendidikan.php */
/* Location: ./application/controllers/data_pendidikan.php */