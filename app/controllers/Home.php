<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //panggil model
        $this->load->model(array('apps', 'web'));
    }

    public function index()
    {
        $data = array(
            'title'         => systems('site_title'),
            'data_buku'     => $this->web->select_buku(),
            'data_kategori' => $this->web->select_kategori(),
            'buku_populer'  => $this->web->select_buku_populer(),
            'data_slide'    => $this->web->select_slider(),
            'data_berita'   => $this->web->get_berita_terbaru(),
            'title_page'    => 'Buku Tersedia'
        );
        
        $this->load->view('public/part/header', $data);
        $this->load->view('public/part/slider');
        $this->load->view('public/layout/home/data');
        $this->load->view('public/part/footer');
    }

    public function terbaru()
    {
        $data = array(
            'title'         => systems('site_title'),
            'data_buku'     => $this->web->select_buku(),
            'data_kategori' => $this->web->select_kategori(),
            'data_slide'    => $this->web->select_slider(),
            'title_page'    => 'Buku Terbaru'
        );
        
        $this->load->view('public/part/header', $data);
        $this->load->view('public/layout/home/data');
        $this->load->view('public/part/footer');
    }

    public function populer()
    {
        $data = array(
            'title'         => systems('site_title'),
            //'data_buku'     => $this->web->select_buku(),
            //'data_kategori' => $this->web->select_kategori(),
            'data_buku'  => $this->web->select_buku_populer(),
            'data_slide'    => $this->web->select_slider(),
            'title_page'    => 'Buku Terpopuler'
        );
        
        $this->load->view('public/part/header', $data);
        $this->load->view('public/layout/home/data');
        $this->load->view('public/part/footer');
    }
}
