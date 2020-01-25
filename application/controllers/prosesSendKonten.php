<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProsesSendKonten extends CI_Controller {

	public function telegram()
	{
		$query = $this->db->query("SELECT * FROM telegram_proses A INNER JOIN telegram_channel B ON A.channel_id = B.id_channel WHERE A.startdatetime < NOW() AND A.send_status='0' AND A.status ='0'");

		foreach ($query -> result() as $row) {
			$apiToken = $row->api_token;
			// $emoticons = '\U0001F4A8';
			//$data['text'] =  "your text ".json_decode('"'.$emoticons.'"').' bla bla';
			$time = strtotime(date('H:i:s'));
			if(($time > "1579899600") AND ($time < "1579921200")){
				$row->konten = str_replace("%5Bgreeting%5D","<b>Selamat Pagi Bapak/Ibu</b>",$row->konten);
				// echo "selamat pagi";
			}else if(($time > "1579921201") AND ($time < "1579935600")){
				$row->konten = str_replace("%5Bgreeting%5D","<b>Selamat Siang Bapak/Ibu</b>",$row->konten);
				// echo "selamat siang";
			}else if(($time > "1579935601") AND ($time < "1579951800")){
				$row->konten = str_replace("%5Bgreeting%5D","<b>Selamat Sore Bapak/Ibu</b>",$row->konten);
				// echo "selamat sore";
			}else if(($time > "1579951801") AND ($time < "1579971540")){
				$row->konten = str_replace("%5Bgreeting%5D","<b>Selamat Malam Bapak/Ibu</b>",$row->konten);
				// echo "selamat malam";
			}else{
				$row->konten = str_replace("%5Bgreeting%5D","",$row->konten);
			}

			if($row->type_konten=="0"){
				$data = [
				    'chat_id' 		=> $row->chat_id,
				    'text'			=> $row->konten,
				    'parse_mode'	=> 'html',
				];

				// $response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" . http_build_query($data) );
				$response = "https://api.telegram.org/bot$apiToken/sendMessage?" . http_build_query($data);
			}else{
				$data = [
					'chat_id' 		=> $row->chat_id,
				    'photo'			=> $row->image_konten,
				    'caption' 		=> $row->konten,
				    'parse_mode'	=> 'html',
				];

				// $response = file_get_contents("https://api.telegram.org/bot$apiToken/sendPhoto?" . http_build_query($data) );	
				$response = "https://api.telegram.org/bot$apiToken/sendPhoto?" . http_build_query($data);
			}

            $c = curl_init();
            curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($c, CURLOPT_URL, $response);
            $contents = curl_exec($c);
            curl_close($c);
    
            // if ($contents){ return $contents;}
            // else{ return FALSE;}

			// $response = file_contents("https://api.telegram.org/bot$apiToken/sendMessage?chat_id=$row->chat_id&text=$row->konten&parse_mode=html");

			if($row->looping =="0"){
				$data = array(
						'send_status' 		=> '1',
						'status'			=>'1',
				); 				
			}else{
				if($row->loopevery=="0"){
					$nextSend = date('Y-m-d H:i:s', strtotime($row->startdatetime . ' +1 days'));
				}
				else{
					$nextSend = date('Y-m-d H:i:s', strtotime($row->startdatetime . ' +'. $row->loopevery .' '.$row->looptime));
				}	
				
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