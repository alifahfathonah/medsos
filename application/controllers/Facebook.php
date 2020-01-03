<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Facebook extends CI_Controller {

	public function index()
	{
		$data['title'] = "Facebook Dashboard";
		$data['isi'] = "facebook/dashboard";
		$this->load->view('theme',$data);		
	}

}

/* End of file Facebook.php */
/* Location: ./application/controllers/Facebook.php */