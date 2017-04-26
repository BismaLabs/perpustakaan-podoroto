<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//panggil model
		$this->load->model(array('apps','web'));
	}

	public function detail_buku($url)
	{
		$data = array('title' => 'Perpustakaan Desa Podoroto, Kesamben, Jombang, Jawa Timur',
			'data_buku'=> $this->web->select_buku(),
			'data_kategori'=> $this->web->select_kategori(),
			'data_buku' => $this->web->detail_buku($url),
			);
		$this->load->view('public/part/header', $data);
        $this->load->view('public/layout/home/detail');
        $this->load->view('public/part/footer');
	}

	public function detail_kategori($url)
	{
		$data = array('title' => 'Perpustakaan Desa Podoroto, Kesamben, Jombang, Jawa Timur',
			'data_buku'=> $this->web->select_buku(),
			'data_kategori'=> $this->web->select_kategori(),
			'kategori_buku' => $this->web->detail_kategori($url),
			);
		$this->load->view('public/part/header', $data);
        $this->load->view('public/layout/kategori/data');
        $this->load->view('public/part/footer');
	}
}
