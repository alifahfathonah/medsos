<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
public function __construct()
{
	parent::__construct();
	$this -> load -> model('UserLogin');
	$this->asd = $this->session->userdata('key');
		
}

	public function index()
	{
		$data = array('auth' => $this->asd);
		$this->load->view('page/login');
	}

	public function verify(){
		if(($this -> input -> post('username'))&&($this -> input -> post('password'))) {
			$u = $this -> input -> post('username');
			$pw = $this -> input -> post('password');

			
			$row = $this -> UserLogin -> verifyUser($u, $pw);
			if(count($row)) {
				$this->session->set_userdata('key',$row);

				redirect('dashboard', 'refresh');
			} else {

				redirect('login', 'refresh');
			}
		} else {
			$this->session->set_flashdata('pesan', 'Username dan password harus diisi.');
			redirect('login', 'refresh');
		}
	}

	function logout() {
		$this->session->sess_destroy();
		// $this->session->unset_userdata('verifyDataTarget');
		$this->session->unset_userdata($this->asd);


		$this -> session -> set_flashdata('pesan', "Anda telah melakukan logout!!");
		redirect('login', 'refresh');
	}

}

/* End of file login.php */
/* Location: ./application/controllers/login.php */