<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->asd = $this->session->userdata('key');

		if(!$this->asd){
			redirect(LOGIN_PAGE);
		}
	}
	
	public function index()
	{
		// $this->load->view('tester');
		$data['title'] = "All Dashboard";
		$data['isi'] = "dashboard";
		$this->load->view('theme',$data);
	}
}
