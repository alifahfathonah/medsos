<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Whatsapp extends CI_Controller {

	public function index()
	{
		$data['title'] = "Whats App Dashboard";
		$data['isi'] = "whatsapp/dashboard";
		$this->load->view('theme',$data);		
	}

}

/* End of file Whatsapp.php */
/* Location: ./application/controllers/Whatsapp.php */