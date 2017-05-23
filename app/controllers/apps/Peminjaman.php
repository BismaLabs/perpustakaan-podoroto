<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @package  : Perpustakaan Podoroto
 * @author   : Mohamad Yazidinni'am <myazidinniam@gmail.com>
 * @since    : 2017
 * @license  : https://bismalabs.co.id/portofolio/perpustakaan-podoroto/
 */

 class Peminjaman extends CI_Controller
 {
 	
 	function __construct()
 	{
 		parent::__construct();
        //Load Model
        $this->load->model('apps');
 	}

 	public function index()
 	{
 		if ($this->apps->apps_id()) {
        
            $data = array('title' => 'Data Peminjaman',
            'peminjam' => TRUE );

 			 //load view
            $this->load->view('apps/part/header', $data);
            $this->load->view('apps/part/sidebar');
            $this->load->view('apps/layout/peminjam/data');
            $this->load->view('apps/part/footer');
        }else{
            show_404();
            return false;
        }
 	}
 }