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
            'title'        	=> 'Kategori - ' .systems('site_title'),
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
        $slug = $this->uri->segment(2);
        //config pagination
        $config['base_url'] = base_url().'kategori/'.$slug.'/index/';
        $config['total_rows'] = $this->web->count_kategori($slug);
        $config['per_page'] = 12;
        //instalasi paging
        $this->pagination->initialize($config);
        //deklare halaman
        $halaman            =  $this->uri->segment(4);
        $halaman            =  $halaman==''? 0 : $halaman;

        $data = array(
            'title'        => $this->web->get_kategori_judul($slug)->nama_kategori. ' - ' . systems('site_title'),
            'keywords'     => systems('keywords'),
            'descriptions' => systems('descriptions'),
            'author'       => systems('site_title'),
            'nama_kategori'=> $this->web->get_kategori_judul($slug)->nama_kategori,
            'data_kategori'=> $this->web->index_kategori($halaman,$config['per_page'],$slug),
            'paging'       => $this->pagination->create_links()
        );

		$this->load->view('public/part/header', $data);
        $this->load->view('public/layout/kategori/detail');
        $this->load->view('public/part/footer');
	}
}
