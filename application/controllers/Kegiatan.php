<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kegiatan extends CI_Controller
{
	public function index()
	{


		// persiapkan curl
		$ch = curl_init();

		// set url 
		curl_setopt($ch, CURLOPT_URL, "https://raw.githubusercontent.com/lakuapik/jadwalsholatorg/master/adzan/bogor/" . date('Y') . "/" . date('d') . ".json");

		// return the transfer as a string 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

		// $output contains the output string 
		$output = curl_exec($ch);

		// tutup curl 
		curl_close($ch);


		$datas = json_decode($output, true);
		$a = array_filter($datas, function ($d) {
			return $d['tanggal'] == date('Y-m-d');
		});

		// var_dump($a);
		// die;

		$data = [
			'hari' => $this->db->get('tbl_hari')->result_array(),
			'sholat' => $a
		];

		$this->load->view('kegiatan/kegiatan_masjid', $data);
	}
}
