<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserLogin extends CI_Model {

	function verifyUser($u, $pw) {
		$ps=md5($pw);
		$sql= $this->db->query("SELECT * 
								FROM 
									master_user
								WHERE 
									username = '$u' AND password = '$ps'");
			
			if ($sql->num_rows() > 0){
				$row = $sql->row_array();
				return $row;
			}else{
				$this->session->set_flashdata('pesan', 'Username atau password tidak terdaftar.');	
				return array();
			}		

	}		

}

/* End of file UserLogin.php */
/* Location: ./application/models/UserLogin.php */