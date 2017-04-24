<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//panggil model
		$this->load->model(array('apps','web'));
	}

	public function index()
	{
			$data = array('title' => 'Perpustakaan Desa Podoroto, Kesamben, Jombang, Jawa Timur',
			'data_buku'=> $this->web->select_buku(),
			'data_kategori'=> $this->web->select_kategori()
			);
		$this->load->view('public/part/header', $data);
        $this->load->view('public/part/slider');
        $this->load->view('public/layout/home/data');
        $this->load->view('public/part/footer');
	}
}
