<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$this->load->view('public/part/header');
        $this->load->view('public/part/slider');
        $this->load->view('public/layout/home/data');
        $this->load->view('public/part/footer');
	}
}
