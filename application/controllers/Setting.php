<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->asd = $this->session->userdata('key');

		if(!$this->asd){
			redirect(LOGIN_PAGE);
		}
	}

	public function telegram(){
		$data['title'] = "Telegram Setting";
		$data['isi'] = "telegram/setting";
		$this->load->view('theme',$data);		
	}

	public function instagram(){
		$data['title'] = "Instagram Setting";
		$data['isi'] = "instagram/setting";
		$this->load->view('theme',$data);		
	}

	public function facebook(){
		$data['title'] = "Facebook Setting";
		$data['isi'] = "facebook/setting";
		$this->load->view('theme',$data);		
	}

	public function whatsapp(){
		$data['title'] = "WhatsApp Setting";
		$data['isi'] = "whatsapp/setting";
		$this->load->view('theme',$data);		
	}

	public function masterUser()
	{
		$data['title'] = "Master User";
		$data['isi'] = "user/setting";
		$this->load->view('theme',$data);		
	}			

}

/* End of file Setting.php */
/* Location: ./application/controllers/Setting.php */