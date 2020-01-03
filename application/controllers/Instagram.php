<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Instagram extends CI_Controller {

	public function index()
	{
		$data['title'] = "Instagram Dashboard";
		$data['isi'] = "instagram/dashboard";
		$this->load->view('theme',$data);		
	}

}

/* End of file Instagram.php */
/* Location: ./application/controllers/Instagram.php */