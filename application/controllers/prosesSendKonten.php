<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProsesSendKonten extends CI_Controller {

	public function telegram()
	{
		$query = $this->db->query("SELECT * FROM telegram_proses A INNER JOIN telegram_channel B ON A.channel_id = B.id_channel WHERE A.startdatetime < NOW() AND A.send_status='0' AND A.status ='0'");

		foreach ($query -> result() as $row) {
			$apiToken = $row->api_token;

			$data = [
			    'chat_id' => $row->chat_id,
			    'text' => $row->konten,
			];

			$response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" . http_build_query($data) );

			if($row->looping =="0"){
				$data = array(
						'send_status' 		=> '1',
						'status'			=>'1',
				); 				
			}else{
				$nextSend = date('Y-m-d H:i:s', strtotime($row->startdatetime . ' +'. $row->loopevery .' minutes'));
				$data = array(
						'startdatetime' 		=> $nextSend,
				); 		
			}
				$this->db->where('id_telegram_proses', $row->id_telegram_proses)->update('telegram_proses', $data);
		}	
	}

}

/* End of file prosesSendKonten.php */
/* Location: ./application/controllers/prosesSendKonten.php */