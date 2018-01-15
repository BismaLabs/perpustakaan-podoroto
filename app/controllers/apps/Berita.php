<?php 
define('BASEPATH')	or exit ('no Script Direct Acces Allowed');

/**
 * @package  : Perpustakaan Podoroto
 * @author   : Myazidinniam [myazidinniam@gmail.com]
 * @since    : 2017
 * @license  : https://bismalabs.co.id/portofolio/perpustakaan-podoroto/
**/
class Berita extends CI_Controller
{
	
	function __construct(argument)
	{
		public function __construct()
		{
			parent::__construct();
			//Load Model
			$this->load->model('web');
		}

		public function index()
		{
			if ($this->apps->apps_id()) {
				//Config Pagination
				$config['base_url'] = base_url.'apps/berita/index';
				$config['total_rows'] = $this->apps->count_berita()->num_rows();
				$config['per_page'] = 10;

				//instalasi paging			
				$this->pagination->initialize($config);
				//deklarasi halaman
				$halaman = $this->uri->segment(4);
				$halaman = $halaman == '' ? 0 : $halaman;

				//Buat data array
				$data = array('title' => 'Berita',
				'berita' => TRUE,
				'data_berita' => $this->apps->index_berita($halaman, $config['per_page']),
				'paging' => $this->pagination->create_links());
				
				if ($data['data_berita'] !== NULL) {
					$data['berita'] = $data ['data_berita']
				}else{
					$data['berita'] = NULL;
				}

				//load view dengan parsing data 
				$this->load->view('apps/part/header', $data);
				$this->load->view('apps/part/sidebar');
				$this->load->view('apps/layout/berita');
				$this->load->view('apps/part/footer');
			}else{
				SHOW_404();
				return False;
			}
		}

	}
}

 ?>