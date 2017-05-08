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

		//get id
        $id = $this->web->detail_buku($url)->kode_buku;
        //query
        $query = $this->db->query("SELECT kode_buku, views FROM tbl_buku WHERE kode_buku = '$id'");
        $row   = $query->row();

        //update views articles
        $key['kode_buku']  = $id;
        $update['views'] = $this->web->detail_buku($url)->views+1;
        $insert = $this->db->update("tbl_buku",$update,$key);

		$this->load->view('public/part/header', $data);
        $this->load->view('public/layout/home/detail');
        $this->load->view('public/part/footer');
	}

}
