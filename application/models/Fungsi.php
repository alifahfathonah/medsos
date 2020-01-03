<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fungsi extends CI_Model {

	function rupiah($nilai){
		$hasil = "Rp. " . number_format($nilai,2,',','.');
		return $hasil;
	}

	function dateTime($tgl){
			$tanggal = substr($tgl,8,2);
			$bulan = $this->Fungsi->month(substr($tgl,5,2));
			$tahun = substr($tgl,0,4);
			$jam = substr($tgl,11,2);
			$menit = substr($tgl,14,2);
			$detik = substr($tgl,17,2);
			return '<b>Tanggal : '.$tanggal.' '.$bulan.' '.$tahun.'<br>Jam : '.$jam.':'.$menit.':'.$detik.'</b>';		 
	}

	function dateTime2($tgl){
			$tanggal = substr($tgl,8,2);
			$bulan = $this->Fungsi->month2(substr($tgl,5,2));
			$tahun = substr($tgl,0,4);
			$jam = substr($tgl,11,2);
			$menit = substr($tgl,14,2);
			$detik = substr($tgl,17,2);
			return $tanggal.' '.$bulan.' '.$tahun.' '.$jam.':'.$menit.':'.$detik.'</b>';		 
	}
	
	function month($bln){
				switch ($bln){
					case 1: return "Januari";	break;
					case 2: return "Februari"; 	break;
					case 3:	return "Maret";		break;
					case 4:	return "April";		break;
					case 5:	return "Mei";		break;
					case 6: return "Juni";		break;
					case 7:	return "Juli";		break;
					case 8:	return "Agustus";	break;
					case 9:	 return "September";break;
					case 10: return "Oktober";	break;
					case 11: return "November";	break;
					case 12: return "Desember";	break;
				}
			} 

	function month2($bln){
				switch ($bln){
					case 1: return "Jan";	break;
					case 2: return "Feb"; 	break;
					case 3:	return "Mar";		break;
					case 4:	return "Apr";		break;
					case 5:	return "Mei";		break;
					case 6: return "Jun";		break;
					case 7:	return "Jul";		break;
					case 8:	return "Agus";	break;
					case 9:	 return "Sept";break;
					case 10: return "Okt";	break;
					case 11: return "Nov";	break;
					case 12: return "Des";	break;
				}
			} 			

	function justDate($tgl){
			$tanggal = substr($tgl,8,2);
			$bulan = $this->Fungsi->month(substr($tgl,5,2));
			$tahun = substr($tgl,0,4);
			return $tanggal.' '.$bulan.' '.$tahun;		 
	}

}

/* End of file Fungsi.php */
/* Location: ./application/models/Fungsi.php */