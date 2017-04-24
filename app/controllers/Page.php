<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//panggil model
		$this->load->model(array('apps','web'));
	}

	public function visi_misi()
	{
		$data = array('title' => 'Perpustakaan Desa Podoroto, Kesamben, Jombang, Jawa Timur',
			'data_buku'=> $this->web->select_buku(),
			'data_kategori'=> $this->web->select_kategori(),
			'data_page'=> $this->web->get_pages(3)
			);
		$this->load->view('public/part/header', $data);
        $this->load->view('public/layout/page/visi_misi');
        $this->load->view('public/part/footer');
	}
}