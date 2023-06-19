<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kegiatan extends CI_Controller
{
	public function index()
	{


		// persiapkan curl
		$ch = curl_init();

		// set url 
		curl_setopt($ch, CURLOPT_URL, "https://api.banghasan.com/sholat/format/json/jadwal/kota/700/tanggal/" . date('Y-m-d'));

		// return the transfer as a string 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

		// $output contains the output string 
		$output = curl_exec($ch);

		// tutup curl 
		curl_close($ch);


		$datas = json_decode($output, true);
		$tanggal = $this->hari_ini() . ', ' . date('d') . ' ' . $this->bulan_ini() . ' ' . date('Y');

		var_dump($tanggal);
		die;

		$rekening = $this->db->get('tbl_rekening')->result_array();

		$pengumuman = $this->db->get_where('tbl_pengumuman', ['status' => 'Aktif'])->result_array();

		$halaman_awal = $this->db->order_by('id', 'DESC')->get_where('tbl_hal_awal', ['status' => 'Aktif'])->row_array();

		$data = [
			'hari' => $this->db->get('tbl_hari')->result_array(),
			'kegiatan' => $this->db->select('*')->from('tbl_kegiatan')->join('tbl_rekening', 'tbl_rekening.id_rekening=tbl_kegiatan.id_rekening')->join('tbl_qris', 'tbl_qris.id_qris=tbl_kegiatan.id_qris')->get()->result_array(),
			'tanggal' => $tanggal,
			'sholat' => $datas['jadwal']['data'],
			'rekening' => $rekening,
			'halaman_awal' => $halaman_awal,
			'pengumuman' => $pengumuman
		];


		$this->load->view('kegiatan/kegiatan_masjid', $data);
	}


	function hari_ini()
	{
		$hari = date("D");

		switch ($hari) {
			case 'Sun':
				$hari_ini = "Minggu";
				break;

			case 'Mon':
				$hari_ini = "Senin";
				break;

			case 'Tue':
				$hari_ini = "Selasa";
				break;

			case 'Wed':
				$hari_ini = "Rabu";
				break;

			case 'Thu':
				$hari_ini = "Kamis";
				break;

			case 'Fri':
				$hari_ini = "Jumat";
				break;

			case 'Sat':
				$hari_ini = "Sabtu";
				break;

			default:
				$hari_ini = "Tidak di ketahui";
				break;
		}

		return $hari_ini;
	}


	function bulan_ini()
	{
		$bulan = date("m");

		switch ($bulan) {
			case '01':
				$hari_ini = "Januari";
				break;

			case '02':
				$hari_ini = "Februari";
				break;

			case '03':
				$hari_ini = "Maret";
				break;

			case '04':
				$hari_ini = "April";
				break;

			case '05':
				$hari_ini = "Mei";
				break;

			case '06':
				$hari_ini = "Juni";
				break;

			case '07':
				$hari_ini = "Juli";
				break;

			case '08':
				$hari_ini = "Agustus";
				break;

			case '09':
				$hari_ini = "September";
				break;

			case '10':
				$hari_ini = "Oktober";
				break;

			case '11':
				$hari_ini = "November";
				break;

			case '12':
				$hari_ini = "Desember";
				break;

			default:
				$hari_ini = "Tidak di ketahui";
				break;
		}

		return $hari_ini;
	}
}
