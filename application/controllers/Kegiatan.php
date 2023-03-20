<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kegiatan extends CI_Controller
{
	public function index()
	{
		$this->load->view('kegiatan/kegiatan');
	}
}
