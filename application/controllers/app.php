<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class App extends CI_Controller {

	/*
		***	Controller : app.php
		***	by Gede Lumbung
		***	http://gedelumbung.com
	*/

	public function index()
	{
		if($this->session->userdata('logged_in')=="")
		{
			$d['judul_lengkap'] = $this->config->item('nama_aplikasi_full');
			$d['judul_pendek'] = $this->config->item('nama_aplikasi_pendek');
			$d['instansi'] = $this->config->item('nama_instansi');
			$d['credit'] = $this->config->item('credit_aplikasi');
			
			$this->form_validation->set_rules('username', 'Username', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
			
			if ($this->form_validation->run() == FALSE)
			{
				$this->load->view('app/login',$d);
			}
			else
			{
				$dt['username'] = $this->input->post('username');
				$dt['password'] = $this->input->post('password');
				$this->app_login_model->getLoginData($dt);
			}
		}
		else if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="administrator")
		{
			header('location:'.base_url().'dashboard_admin');
		}
		else if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="operator")
		{
			header('location:'.base_url().'dashboard_operator');
		}
		else if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="executive")
		{
			header('location:'.base_url().'dashboard_executive');
		}
	}
	
	public function change_password()
	{
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="administrator")
		{
			$d['judul_lengkap'] = $this->config->item('nama_aplikasi_full');
			$d['judul_pendek'] = $this->config->item('nama_aplikasi_pendek');
			$d['instansi'] = $this->config->item('nama_instansi');
			$d['credit'] = $this->config->item('credit_aplikasi');
			$d['alamat'] = $this->config->item('alamat_instansi');
			
			$this->load->view('dashboard_admin/user/header',$d);
			$this->load->view('dashboard_admin/user/bg_change_password');
		}
		else
		{
			header('location:'.base_url().'');
		}
	}
	
	public function save_pass()
	{
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="administrator")
		{
			$this->form_validation->set_rules('pass_lama', 'Password Lama', 'trim|required');
			$this->form_validation->set_rules('pass_baru', 'Password Baru', 'trim|required');
			$this->form_validation->set_rules('ulangi_pass_baru', 'Ulangi Password Baru', 'trim|required');
			
			$id['username'] = $this->input->post("usernname");
			$pass_lama = $this->input->post("pass_lama");
			$pass_baru = $this->input->post("pass_baru");
			$ulangi_pass_baru = $this->input->post("ulangi_pass_baru");
			
			$set['tab_a'] = "active";
			$set['tab_b'] = "";
			$this->session->set_userdata($set);
			
			if ($this->form_validation->run() == FALSE)
			{
				$d['judul_lengkap'] = $this->config->item('nama_aplikasi_full');
				$d['judul_pendek'] = $this->config->item('nama_aplikasi_pendek');
				$d['instansi'] = $this->config->item('nama_instansi');
				$d['credit'] = $this->config->item('credit_aplikasi');
				$d['alamat'] = $this->config->item('alamat_instansi');
				
				$this->load->view('dashboard_admin/user/header',$d);
				$this->load->view('dashboard_admin/user/bg_change_password');
			}
			else
			{
				$login['username'] = $id['username'];
				$login['password'] = md5($pass_lama.'AppSimpeg32');
				$cek = $this->db->get_where('tbl_user_login', $login);
				if($cek->num_rows()>0)
				{
					if($pass_baru==$ulangi_pass_baru)
					{
						$upd['password'] = md5($pass_baru.'AppSimpeg32');
						$this->db->update("tbl_user_login",$upd,$id);
						$this->session->set_flashdata('pass', 'Berhasil mengubah password...');
						header('location:'.base_url().'app/change_password');
					}
					else
					{
						$this->session->set_flashdata('pass', 'Password Baru tidak sama...');
						header('location:'.base_url().'app/change_password');
					}
				}
				else
				{
					$this->session->set_flashdata('pass', 'Password Lama salah...');
					header('location:'.base_url().'app/change_password');
				}
			}
		}
		else
		{
			header('location:'.base_url().'');
		}
	}
	
	public function save_name()
	{
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="administrator")
		{
			$this->form_validation->set_rules('nama_lengkap', 'Nama Pengguna', 'trim|required');
			
			$id['username'] = $this->input->post("usernname");
			$nama = $this->input->post("nama_lengkap");
			
			$set['tab_a'] = "";
			$set['tab_b'] = "active";
			$this->session->set_userdata($set);
			
			if ($this->form_validation->run() == FALSE)
			{
				$d['judul_lengkap'] = $this->config->item('nama_aplikasi_full');
				$d['judul_pendek'] = $this->config->item('nama_aplikasi_pendek');
				$d['instansi'] = $this->config->item('nama_instansi');
				$d['credit'] = $this->config->item('credit_aplikasi');
				$d['alamat'] = $this->config->item('alamat_instansi');
				
				$this->load->view('dashboard_admin/user/header',$d);
				$this->load->view('dashboard_admin/user/bg_change_password');
			}
			else
			{
				$upd['nama_lengkap'] = $nama;
				$this->db->update("tbl_user_login",$upd,$id);
				$this->session->set_flashdata('pass', 'Berhasil mengubah nama pengguna...');
				$set_new['nama'] = $upd['nama_lengkap'];
				$this->session->set_userdata($set_new);
				header('location:'.base_url().'app/change_password');
			}
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

/* End of file app.php */
/* Location: ./application/controllers/app.php */