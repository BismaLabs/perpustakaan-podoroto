<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//panggil model
		$this->load->model(array('apps','web'));
	}

	public function detail($url)
	{
		$data = array(
			'title' 		=> $this->web->detail_buku($url)->judul_buku .' - '. systems('site_title'),
			'data_kategori'	=> $this->web->select_kategori(),
			'data_buku' 	=> $this->web->detail_buku($url),
			'keywords'      => systems('keywords'),
            'descriptions'  => systems('descriptions'),
			);
		$this->load->view('public/part/header', $data);
        $this->load->view('public/layout/home/detail');
        $this->load->view('public/part/footer');
	}
}
