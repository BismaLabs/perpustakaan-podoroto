<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//panggil model
		$this->load->model('apps');
	}

	public function index()
	{
		if ($this->apps->apps_id()) {

		$data = array('title' => 'Perpustakaan Desa Podoroto, Kesamben, Jombang, Jawa Timur',
			'data_buku'=> $this->apps->select_buku(),
			'data_kategori'=> $this->apps->select_kategori(),
			'data_page'=> $this->web->select_pages()
			);
		$this->load->view('public/part/header', $data);
        $this->load->view('public/part/slider');
        $this->load->view('public/layout/home/data');
        $this->load->view('public/part/footer');
		}else{
			show_404();
			return FALSE;
		}
	}
}
