<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//panggil model
		$this->load->model(array('apps','web'));
	}

	public function index()
	{
		$data = array('title' => systems('site_title'),
			'data_buku'=> $this->web->select_buku(),
			'data_kategori'=> $this->web->select_kategori(),
			'data_page'=> $this->web->select_pages()
			);
		$this->load->view('public/part/header', $data);
        $this->load->view('public/layout/page/data');
        $this->load->view('public/part/footer');
	}

	public function detail_pages($id_pages)
	{
		$data = array('title' => systems('site_title'),
		'data_buku'=> $this->web->select_buku(),
		'data_kategori'=> $this->web->select_kategori(),
		'data_page'=> $this->web->get_pages($id_pages)
		);

		$this->load->view('public/part/header', $data);
        $this->load->view('public/layout/page/detail');
        $this->load->view('public/part/footer');
	}

	// public function visi_misi()
	// {
	// 	$data = array('title' => systems('site_title'),
	// 		'data_buku'=> $this->web->select_buku(),
	// 		'data_kategori'=> $this->web->select_kategori(),
	// 		'data_page'=> $this->web->get_pages()
	// 		);
	// 	$this->load->view('public/part/header', $data);
 //        $this->load->view('public/layout/page/visi_misi');
 //        $this->load->view('public/part/footer');
	// }

	// public function ketentuan_umum()
	// {
	// 	$data = array('title' => systems('site_title'),
	// 			'data_buku' => $this->web->select_buku(),
	// 			'data_kategori' => $this->web->select_kategori(),
	// 			'data_page'	=> $this->web->get_pages(2)
	// 			);
	// 	$this->load->view('public/part/header', $data);
	// 	$this->load->view('public/layout/page/ketentuan_umum');
	// 	$this->load->view('public/part/footer');
	// }

	// public function pelayanan()
	// {
	// 	$data = array('title' => system('site_title'),
	// 	'data_buku' => $this->web->select_buku(),
	// 	'data_kategori' => $this->web->select_kategori(),
	// 	'data_page'	=>	$this->web->get_pages(1)
	// 	 );

	// 	$this->load->view('public/part/header', $data);
	// 	$this->load->view('public/layout/page/pelayanan');
	// 	$this->load->view('public/part/footer');
	// }

	// public function layanan_internet()
	// {
	// 	$data = array('title' => systems('site_title'),
	// 		'data_buku'	=> $this->web->select_buku(),
	// 		'data_kategori'	=> $this->web->select_kategori(),
	// 		'data_page' => $this->web->get_pages(4)
	// 		);
	// 	$this->load->view('public/part/header', $data);
	// 	$this->load->view('public/layout/page/layanan_internet');
	// 	$this->load->view('public/part/footer');
	// }
}
