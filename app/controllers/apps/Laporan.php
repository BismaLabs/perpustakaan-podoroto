<?php 
defined('BASEPATH') OR EXIT ('no direct script access allowed');

/**
	* @package : Perpustakaan Web Application.
	* @author : M Yazidinni'am
	* @since : 2017
**/
	class Laporan extends CI_Controller
	{

		private $table_name = "tbl_anggota";
		private $_model = "";
		
		function __construct()
		{
			parent::__construct();
			// load model
			$this->load->model('apps');
		}

		public function index()
		{
			if ($this->apps->apps_id()) {
				
				$data = array('title' => 'Laporan',
				'Laporan' => TRUE );

				//load view with data
				$this->load->view('apps/part/header', $data);
				$this->load->view('apps/part/sidebar');
				$this->load->view('apps/layout/laporan/data');
				$this->load->view('apps/part/footer');
			}else{
				show_404();
				return FALSE;
			}
		}

		public function cetak_data_anggota()
		{
			if ($this->apps->apps_id()) {

				$this->load->library('excel');

				$fields = $this->db->list_fields($this->table_name);
				$header= array();
				$body = array();
				$result = $this->apps->get_export_data_anggota();

				foreach ($fields as $field) {
					$header[] = strtoupper(str_replace("_", " ", $field));
				}
				if ($result) {
					foreach ($result->result() as $row) {
						$data = array();
						foreach ($fields as $field) {
							$data[] = $row->$field;
						}

						$body[] = $data;
					}
				}
				$openTo = 'browser';
            	$filename = 'Laporan_Aggota_Perpustakaan-'.date('Y-m-d').'.xlsx';
            	$type = 'XLSX';

            	$this->excel->write($header, $body, $type, $openTo, $filename);
			}else{
				show_404();
				return False;
			}
		}

	}
 ?>