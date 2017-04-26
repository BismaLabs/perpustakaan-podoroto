<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Kategori extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//panggil model
		$this->load->model(array('apps','web'));
		 $this->load->helper('systems');
	}

	public function index()
	{
		$data = array(
            'title'        	=> 'Category &middot; ' .systems('site_title'),
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
			'title' 		=> $this->web->detail_buku($url)->nama_kategori .' - '. systems('site_title'),
			'data_kategori'	=> $this->web->select_kategori(),
			'data_buku' 	=> $this->web->detail_buku($url),
			'keywords'      => systems('keywords'),
            'descriptions'  => systems('descriptions'),
			);

		$query = $this->db->query("SELECT a.kode_buku, a.judul_buku, a.foto, a.slug, a.tahun_terbit, a.penerbit, a.pengarang, a.kategori_id, a.deskripsi, a.no_isbn, a.jumlah_buku, a.created_at, b.id_kategori, b.nama_kategori FROM tbl_buku as a JOIN tbl_kategori as b ON a.kategori_id = b.id_kategori WHERE a.slug = '$url'");
         if($query->num_rows() > 0)
        {
            return $query->row();
        }else
        {
            return NULL;
        }

		$this->load->view('public/part/header', $data);
        $this->load->view('public/layout/kategori/detail');
        $this->load->view('public/part/footer');
	}
}
