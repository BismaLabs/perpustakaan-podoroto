<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Kategori extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        //panggil model
        $this->load->model(array('apps', 'web'));
    }


	public function index()
	{
		$data = array(
            'title'        	=> 'Kategori &middot; ' .systems('site_title'),
            'keywords'     	=> systems('keywords'),
            'descriptions' 	=> systems('descriptions'),
            'author'       	=> systems('site_title'),
            'data_kategori'	=> $this->web->select_kategori()
        );

		$this->load->view('public/part/header', $data);
        $this->load->view('public/layout/kategori/data');
        $this->load->view('public/part/footer');
	}

	public function detail($url)
	{
			$data = array(
			'title' 		=> $this->web->detail_kategori($url)->slug.' - '. systems('site_title'),
			'data_kategori'	=> $this->web->select_kategori(),
			'data_buku' 	=> $this->web->detail_buku($url),
			'keywords'      => systems('keywords'),
            'descriptions'  => systems('descriptions'),
			);

		$this->load->view('public/part/header', $data);
        $this->load->view('public/layout/kategori/detail');
        $this->load->view('public/part/footer');
	}
}
