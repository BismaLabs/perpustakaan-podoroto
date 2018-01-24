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
            'data_buku'     => $this->web->select_buku(),
            'data_kategori' => $this->web->select_kategori(),
            'buku_populer'  => $this->web->select_buku_populer(),
            'data_slide'    => $this->web->select_slider(),
            'title_page'    => 'Buku Terpopuler'
        );
        
        $this->load->view('public/part/header', $data);
        $this->load->view('public/layout/home/data');
        $this->load->view('public/part/footer');
    }

    function get_berita()
    {
        //declare page
        $page   =  $_GET['page'];
        //var articles define
        $berita = $this->web->get_berita($page);
        //loop
        foreach($berita as $hasil){

            //check lenght title
            if(strlen($hasil->judul_berita)<40)
            {
                $judul = '<a href="'. base_url().'berita/'.$hasil->slug.'/" style="color:#4c4a45">
                            '.$hasil->judul_berita.'
                          </a>';
            }else{
                $judul = '<a href="'. base_url().'berita/'.$hasil->slug.'/" title="'.$hasil->judul_berita.'" style="color:#4c4a45">
                            '. substr($hasil->judul_berita, 0, 40).'....
                          </a>';
            }

            echo '<div class="col-md-3">
                    <img src="'.base_url().'resources/images/berita/'.$hasil->gambar.'" alt="" style="object-fit: cover; width:100%; height:200px;">
                    <div class="inner" style="padding:10px;background-color: #ffffff;-moz-box-shadow: 0 2px 2px 0 rgba(0,0,0,.14),0 3px 1px -2px rgba(0,0,0,.2),0 1px 5px 0 rgba(0,0,0,.12);webkit-box-shadow: 0 2px 2px 0 rgba(0,0,0,.14),0 3px 1px -2px rgba(0,0,0,.2),0 1px 5px 0 rgba(0,0,0,.12);box-shadow: 0 2px 2px 0 rgba(0,0,0,.14), 0 3px 1px -2px rgba(0,0,0,.2), 0 1px 5px 0 rgba(0,0,0,.12);">
                        <div class="entry-header">
                            <time class="published"  title="'.$this->apps->tgl_indo_lengkap($hasil->created_at).'" style="color: #4c4a45">
                                '. $this->apps->tgl_indo_lengkap($hasil->created_at).'</time>
                            <h6 class="post-title entry-title wrap-berita">
                                '. $judul .'
                            </h6>
                        </div><!-- end entry-header -->
                        <div class="entry-content">
                            <p class="wrap-berita" style="color: #333">'.substr($hasil->descriptions, "0","90") .'.....</p>
                        </div>
                    </div><!-- end inner -->
                </div>';
        }
        exit;
    }
}
