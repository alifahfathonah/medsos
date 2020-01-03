<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Telegram extends CI_Controller {

	public function index()
	{
		$data['channel'] = $this->MTelegram->GetChannel();
		$data['title'] = "Telegram Dashboard";
		$data['isi'] = "telegram/dashboard";
		$this->load->view('theme',$data);		
	}

	public function loadTable()
	{
		$this->load->view("telegram/settingTable");
	}

	public function add()
	{
		if($this->input->post('idChannel') == '') {
				$data = array(
						'channel_name' 			=> $this->input->post('namaChannel'),
						'chat_id' 			=> $this->input->post('channelID'),
						'api_token' 			=> $this->input->post('apiToken'),

				);

				$this->db->insert('telegram_channel', $data);
		}else{
				$data = array(
						'channel_name' 			=> $this->input->post('namaChannel'),
						'chat_id' 			=> $this->input->post('channelID'),
						'api_token' 			=> $this->input->post('apiToken'),

				);

			$this->db->where('id_channel', $this->input->post('idChannel'))->update('telegram_channel', $data); 			
		}
	}

	public function get()
	{
		if(isset($_POST["idChannel"]))  
			{  
				$getChannel = $_POST["idChannel"];
				$query = $this->db->query("SELECT *
											FROM 
												telegram_channel
											WHERE 
												id_channel = '$getChannel'");  
				$row = $query->row();
				echo json_encode($row);  
			} 
	}

	public function delete()
	{
		$id = $this->input->post('idChannel2');
		$this->db->delete('telegram_channel', array('id_channel' => $id)); 
	}
}

/* End of file Telegram.php */
/* Location: ./application/controllers/Telegram.php */