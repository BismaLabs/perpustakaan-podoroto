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

		public function detail_lap_pinjam()
		{
			if ($this->apps->apps_id()) {
				
				$data = array('title' => 'Detail Laporan Pinjam',
				'Laporan' => TRUE );

				//load view with data
				$this->load->view('apps/part/header', $data);
				$this->load->view('apps/part/sidebar');
				$this->load->view('apps/layout/laporan/detail_lap_pinjam');
				$this->load->view('apps/part/footer');
			}else{
				show_404();
				return FALSE;
			}
		}

		public function download_r_anggota()  {

		$subscribers = $this->apps->get_export_data_anggota();

		require_once APPPATH . '/third_party/Phpexcel/Bootstrap.php';

		// Create new Spreadsheet object
		$spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();

// Set document properties
		$spreadsheet->getProperties()->setCreator('perpustakaan.podoroto.desa.id')
				->setLastModifiedBy('Perpustakaan Podoroto')
				->setTitle('Laporan Anggota Perpustakaan');
				// ->setSubject('integrate codeigniter with PhpExcel')
				// ->setDescription('this is the file test');

		// add style to the header
		$styleArray = array(
				'font' => array(
						'bold' => true,
				),
				'alignment' => array(
						'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
						'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
				),
				'borders' => array(
						'top' => array(
								'style' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
						),
				),
				'fill' => array(
						'type' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_GRADIENT_LINEAR,
						'rotation' => 90,
						'startcolor' => array(
								'argb' => 'FFA0A0A0',
						),
						'endcolor' => array(
								'argb' => 'FFFFFFFF',
						),
				),
		);
		$spreadsheet->getActiveSheet()->getStyle('A1:D1')->applyFromArray($styleArray);


		// auto fit column to content

		foreach(range('A','D') as $columnID) {
			$spreadsheet->getActiveSheet()->getColumnDimension($columnID)
					->setAutoSize(true);
		}
		// set the names of header cells
		$spreadsheet->setActiveSheetIndex(0)
				->setCellValue("A1",'Nama Lengkap')
				->setCellValue("B1",'No Anggota')
				->setCellValue("C1",'Jenis Kelamin')
				->setCellValue("D1",'Alamat');

		// Add some data
		$x= 2;
		foreach($subscribers as $sub){
			$spreadsheet->setActiveSheetIndex(0)
					->setCellValue("A$x",$sub['nama_lengkap'])
					->setCellValue("B$x",$sub['no_anggota'])
					->setCellValue("C$x",$sub['jenis_kelamin'])
					->setCellValue("D$x",$sub['alamat']);
			$x++;
		}

// Rename worksheet
		$spreadsheet->getActiveSheet()->setTitle('Laporan Anggota Perpustakaan');

// set right to left direction
//		$spreadsheet->getActiveSheet()->setRightToLeft(true);

// Set active sheet index to the first sheet, so Excel opens this as the first sheet
		$spreadsheet->setActiveSheetIndex(0);

// Redirect output to a client’s web browser (Excel2007)
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="Laporan Anggota Perpustakaan.xlsx"');
		header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
		header('Cache-Control: max-age=1');

// If you're serving to IE over SSL, then the following may be needed
		header('Expires: Mon, 26 Jul 2050 05:00:00 GMT'); // Date in the past
		header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
		header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
		header('Pragma: public'); // HTTP/1.0

		$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Excel2007');
		$writer->save('php://output');
		exit;

		//  create new file and remove Compatibility mode from word title
	}

	public function download_r_buku()  {

		$subscribers = $this->apps->get_export_data_buku();

		require_once APPPATH . '/third_party/Phpexcel/Bootstrap.php';

		// Create new Spreadsheet object
		$spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();

// Set document properties
		$spreadsheet->getProperties()->setCreator('perpustakaan.podoroto.desa.id ')
				->setLastModifiedBy('Perpustakaan Podoroto')
				->setTitle('Laporan Buku Perpustakaan');
				// ->setSubject('integrate codeigniter with PhpExcel')
				// ->setDescription('this is the file test');

		// add style to the header
		$styleArray = array(
				'font' => array(
						'bold' => true,
				),
				'alignment' => array(
						'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
						'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
				),
				'borders' => array(
						'top' => array(
								'style' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
						),
				),
				'fill' => array(
						'type' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_GRADIENT_LINEAR,
						'rotation' => 90,
						'startcolor' => array(
								'argb' => 'FFA0A0A0',
						),
						'endcolor' => array(
								'argb' => 'FFFFFFFF',
						),
				),
		);
		$spreadsheet->getActiveSheet()->getStyle('A1:G1')->applyFromArray($styleArray);


		// auto fit column to content

		foreach(range('A','G') as $columnID) {
			$spreadsheet->getActiveSheet()->getColumnDimension($columnID)
					->setAutoSize(true);
		}
		// set the names of header cells
		$spreadsheet->setActiveSheetIndex(0)
				->setCellValue("A1",'Kode Buku')
				->setCellValue("B1",'Judul Buku')
				->setCellValue("C1",'Pengarang')
				->setCellValue("D1",'Penerbit')
				->setCellValue("E1",'No ISBN')
				->setCellValue("F1",'Kategori')
				->setCellValue("G1",'Jumlah Buku');

		// Add some data
		$x= 2;
		foreach($subscribers as $sub){
			$spreadsheet->setActiveSheetIndex(0)
					->setCellValue("A$x",$sub['kode_buku'])
					->setCellValue("B$x",$sub['judul_buku'])
					->setCellValue("C$x",$sub['pengarang'])
					->setCellValue("D$x",$sub['penerbit'])
					->setCellValue("E$x",$sub['no_isbn'])
					->setCellValue("F$x",$sub['kategori_id'])
					->setCellValue("G$x",$sub['jumlah_buku']);
			$x++;
		}

// Rename worksheet
		$spreadsheet->getActiveSheet()->setTitle('Laporan Buku Perpustakaan');

// set right to left direction
//		$spreadsheet->getActiveSheet()->setRightToLeft(true);

// Set active sheet index to the first sheet, so Excel opens this as the first sheet
		$spreadsheet->setActiveSheetIndex(0);

// Redirect output to a client’s web browser (Excel2007)
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="Laporan Buku Perpustakaan.xlsx"');
		header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
		header('Cache-Control: max-age=1');

// If you're serving to IE over SSL, then the following may be needed
		header('Expires: Mon, 26 Jul 2050 05:00:00 GMT'); // Date in the past
		header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
		header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
		header('Pragma: public'); // HTTP/1.0

		$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Excel2007');
		$writer->save('php://output');
		exit;

		//  create new file and remove Compatibility mode from word title
	}

	public function download_r_pinjam()  {

		$tgl_awal = $this->input->post("tgl_awal");
		$tgl_akhir = $this->input->post("tgl_akhir");

		$subscribers = $this->apps->get_export_data_pinjam($tgl_awal, $tgl_akhir);

		/*print_r($subscribers);
		die;*/

		require_once APPPATH . '/third_party/Phpexcel/Bootstrap.php';

		// Create new Spreadsheet object
		$spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();

// Set document properties
		$spreadsheet->getProperties()->setCreator('perpustakaan.podoroto.desa.id')
				->setLastModifiedBy('Perpustakaan Podoroto')
				->setTitle('Laporan Peminjam Perpustakaan');
				// ->setSubject('integrate codeigniter with PhpExcel')
				// ->setDescription('this is the file test');

		// add style to the header
		$styleArray = array(
				'font' => array(
						'bold' => true,
				),
				'alignment' => array(
						'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
						'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
				),
				'borders' => array(
						'top' => array(
								'style' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
						),
				),
				'fill' => array(
						'type' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_GRADIENT_LINEAR,
						'rotation' => 90,
						'startcolor' => array(
								'argb' => 'FFA0A0A0',
						),
						'endcolor' => array(
								'argb' => 'FFFFFFFF',
						),
				),
		);
		$spreadsheet->getActiveSheet()->getStyle('A1:E1')->applyFromArray($styleArray);


		// auto fit column to content

		foreach(range('A','E') as $columnID) {
			$spreadsheet->getActiveSheet()->getColumnDimension($columnID)
					->setAutoSize(true);
		}
		// set the names of header cells
		$spreadsheet->setActiveSheetIndex(0)
				->setCellValue("A1",'Nama Anggota')
				->setCellValue("B1",'Kode Buku')
				->setCellValue("C1",'Tanggal Pinjam')
				->setCellValue("D1",'Tanggal Kembali')
				->setCellValue("E1",'Dikembalikan?');

		// Add some data
		$x= 2;
		foreach($subscribers as $sub){
			$spreadsheet->setActiveSheetIndex(0)
					->setCellValue("A$x",$sub['nama_anggota'])
					->setCellValue("B$x",$sub['buku_kode'])
					->setCellValue("C$x",$sub['tgl_pinjam'])
					->setCellValue("D$x",$sub['tgl_pinjam'])
					->setCellValue("E$x",$sub['is_kembali']);
			$x++;
		}

// Rename worksheet
		$spreadsheet->getActiveSheet()->setTitle('Laporan Peminjam Perpustakaan');

// set right to left direction
//		$spreadsheet->getActiveSheet()->setRightToLeft(true);

// Set active sheet index to the first sheet, so Excel opens this as the first sheet
		$spreadsheet->setActiveSheetIndex(0);

// Redirect output to a client’s web browser (Excel2007)
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="Laporan Peminjam Perpustakaan.xlsx"');
		header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
		header('Cache-Control: max-age=1');

// If you're serving to IE over SSL, then the following may be needed
		header('Expires: Mon, 26 Jul 2050 05:00:00 GMT'); // Date in the past
		header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
		header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
		header('Pragma: public'); // HTTP/1.0

		$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Excel2007');
		$writer->save('php://output');
		exit;

		//  create new file and remove Compatibility mode from word title
	}

	}
 ?>