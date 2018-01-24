<?php 
defined('BASEPATH') or exit('No Direct Script Access Allowed');
/**
 * @package  : Perpustakaan Podoroto
 * @author   : Myazidinniam [myazidinniam@gmail.com]
 * @since    : 2017
 * @license  : https://bismalabs.co.id/portofolio/perpustakaan-podoroto/
**/

class Berita extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		//Load Model
		$this->load->model('web');
		//Load Model
		$this->load->model('apps');
		//get Visitor
		$this->web->counter_visitor();
	}

	public function index()
	{
		$data = array(
			'title' => 'Berita'.' - '. systems('site_title'),
			'keywords' => systems('keywords'),
			'descriptions' => systems('descriptions'),
			'data_berita'	=> $this->web->get_berita_terbaru(),
		);

		$this->load->view('public/part/header', $data);
		$this->load->view('public/layout/berita/data');
		$this->load->view('public/part/footer');
	}

	public function detail($url)
    {
        //library disqus
        //$this->load->library('disqus');

        $data = array(
            'detail_berita'    => $this->web->detail_berita($url),
            'title'            => $this->web->detail_berita($url)->judul_berita .' - ' .systems('site_title'),
            'keywords'         => $this->web->detail_berita($url)->keywords,
            'descriptions'     => $this->web->detail_berita($url)->descriptions,
            'author'           => $this->web->detail_berita($url)->nama_user
            // 'disqus'           => $this->disqus->get_html()
        );
        //get id
        $id = $this->web->detail_berita($url)->id_berita;
        //query
        $query = $this->db->query("SELECT id_berita, views FROM tbl_berita WHERE id_berita = '$id'");
        $row   = $query->row();

        //update views articles
        $key['id_berita']  = $id;
        $update['views'] = $this->web->detail_berita($url)->views+1;
        $insert = $this->db->update("tbl_berita",$update,$key);

        //load view
        $this->load->view('public/part/header', $data);
        $this->load->view('public/layout/berita/detail');
        $this->load->view('public/part/footer');
    }
}
 ?>