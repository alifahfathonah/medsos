<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		
		$this->asd = $this->session->userdata('key');

		if(!$this->asd){
			redirect(LOGIN_PAGE);
		}
	}

	public function add()
	{
		if($this->input->post('idUser') == '') {
			$data = array(
					'nama' 			=> $this->input->post('namaUser'),
					'username' 		=> $this->input->post('userName'),
					'password' 		=> md5($this->input->post('password')),
					'role' 			=> $this->input->post('role'),
			);
			$this->db->insert('master_user', $data);
		}else{
			if($this->input->post('password')!=""){
				$data = array(
					'nama' 			=> $this->input->post('namaUser'),
					'username' 		=> $this->input->post('userName'),
					'password' 		=> md5($this->input->post('password')),
					'role' 			=> $this->input->post('role'),
				);	
			}
			else{
				$data = array(
					'nama' 			=> $this->input->post('namaUser'),
					'username' 		=> $this->input->post('userName'),
					'role' 			=> $this->input->post('role'),
				);					
			}
			$this->db->where('id_user', $this->input->post('idUser'))->update('master_user', $data);	
		
		}	
	}

	public function loadTable()
	{
		$this->load->view('user/settingTable');
	}

	public function get()
	{
		if(isset($_POST["idUser"]))  
			{  
				$getIDUser = $_POST["idUser"];
				$query = $this->db->query("SELECT * 
											FROM 
												master_user  
											WHERE id_user = '$getIDUser'");  
				$row = $query->row();
				echo json_encode($row);  
			}  
	}

	public function delete()
	{
				$this->db->delete('master_user', array('id_user' => $this->input->post('idUser2'))); 
	}
}

/* End of file User.php */
/* Location: ./application/controllers/User.php */