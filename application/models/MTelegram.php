<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MTelegram extends CI_Model {

	public function GetChannel()
	{
		$query = $this->db->query("SELECT * FROM telegram_channel")->result_array();

		return $query;
	}

}

/* End of file MTelegram.php */
/* Location: ./application/models/MTelegram.php */