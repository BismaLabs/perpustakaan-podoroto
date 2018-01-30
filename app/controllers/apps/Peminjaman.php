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
//setup pagination
$config['base_url'] = base_url() . 'apps/peminjaman/index/';
$config['total_rows'] = $this->apps->count_pinjam()->num_rows();
$config['per_page'] = 10;
//instalasi paging
$this->pagination->initialize($config);
//deklare halaman
$halaman = $this->uri->segment(4);
$halaman = $halaman == '' ? 0 : $halaman;
//create data array
$data = array(
'title' => 'Data Peminjaman',
'peminjam' => TRUE,
'data_pinjam' => $this->apps->index_pinjam($halaman, $config['per_page']),
'paging' => $this->pagination->create_links()
);
if ($data['data_pinjam'] != NULL) {

$data['pinjam'] = $data['data_pinjam'];

} else {

$data['pinjam'] = NULL;
}
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

function search_buku()
{
$username = trim($this->input->get('term', TRUE)); //get term parameter sent via text field. Not sure how secure get() is

$this->db->select('kode_buku');
$this->db->from('tbl_buku');
$this->db->like('kode_buku',$username);
$this->db->limit('5');
$query = $this->db->get();

if ($query->num_rows() > 0)
{
$data['response'] = 'true'; //If username exists set true
$data['message'] = array();

foreach ($query->result() as $row)
{
$data['message'] = array(
    'kode_buku' => $row->kode_buku
);
}
}
else
{
$data['response'] = 'false'; //Set false if user not valid
}

echo json_encode($data);
}

function search_anggota()
{
$anggota = trim($this->input->get('term', TRUE)); //get term parameter sent via text field. Not sure how secure get() is

$this->db->select('nama_lengkap');
$this->db->from('tbl_anggota');
$this->db->like('nama_lengkap', $anggota);
$this->db->limit('5');
$query = $this->db->get();

if ($query->num_rows() > 0)
{
$data['response'] = 'true'; //If username exists set true
$data['message'] = array();

foreach ($query->result() as $row)
{
$data['message'] = array(
    'nama_lengkap' => $row->nama_lengkap
);
}
}
else
{
$data['response'] = 'false'; //Set false if user not valid
}

echo json_encode($data);
}

public function search()
{
if ($this->apps->apps_id()) {
$limit = 10;
$this->load->helper('security');
$keyword = $this->security->xss_clean($_GET['q']);
$data['keyword'] = strip_tags($keyword);
$check = strlen(preg_replace('/[^a-zA-Z]/', '', $keyword));
if (!empty($keyword) && $check > 2) {
$offset = (isset($_GET['page'])) ? $this->security->xss_clean($_GET['page']) : 0;
$total = $this->apps->total_search_pinjam($keyword);
//config pagination
$config['base_url'] = base_url() . 'apps/peminjaman/search?q=' . $keyword;
$config['total_rows'] = $total;
$config['per_page'] = $limit;
$config['page_query_string'] = TRUE;
$config['use_page_numbers'] = TRUE;
$config['display_pages'] = TRUE;
$config['query_string_segment'] = 'page';
$config['uri_segment'] = 4;
//instalasi paging
$this->pagination->initialize($config);

$data = array(
'title' => 'Data Peminjaman',
'peminjam' => TRUE,
'data_pinjam' => $this->apps->search_index_pinjam(strip_tags($keyword), $limit, $offset),
'paging' => $this->pagination->create_links()
);
if ($data['data_pinjam'] != NULL) {

$data['pinjam'] = $data['data_pinjam'];
} else {
$data['pinjam'] = '';
}
//load view with data
$this->load->view('apps/part/header', $data);
$this->load->view('apps/part/sidebar');
$this->load->view('apps/layout/peminjam/data');
$this->load->view('apps/part/footer');
} else {
redirect('apps/peminjaman');
}
} else {
show_404();
return FALSE;
}
}



public function add()
{
if ($this->apps->apps_id()) {
//create data array
$data = array(
'title'         => 'Tambah Peminjaman',
'peminjam'      => TRUE,
'type'          => 'add',
'select_kat'    => $this->apps->select_kategori()
);
//load view with data
$this->load->view('apps/part/header', $data);
$this->load->view('apps/part/sidebar');
$this->load->view('apps/layout/peminjam/add');
$this->load->view('apps/part/footer');
} else {
show_404();
return FALSE;
}

}

public function save()
{
if($this->apps->apps_id())
{
$type = $this->input->post("type");
$id['id_pinjam'] = $this->encryption->decode($this->input->post("id_pinjam"));



if ($type == 'add') {
        $insert = array(
        'nama_anggota'     => $this->input->post("nama_lengkap"),
        'buku_kode'         => $this->input->post("kode_buku"),
        'tgl_pinjam'         => $this->input->post("tgl_pinjam"),
        'tgl_kembali'         => $this->input->post("tgl_kembali")
    );
    $this->db->insert("tbl_pinjam", $insert);

    $skey2 =  $this->input->post("kode_buku");
    $query = $this->db->query("SELECT jumlah_buku as jml FROM tbl_buku where kode_buku = '$skey2'");
    $srow = $query->row();



    $skey['kode_buku'] = $this->input->post("kode_buku");
    $update['jumlah_buku'] = $srow->jml - 1;
    $this->db->update("tbl_buku",$update, $skey);
    
    
    //deklarasi session flashdata
    $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible">
                                            <i class="fa fa-check"></i> Data Berhasil Disimpan.
                                        </div>');
    //redirect halaman
    redirect('apps/peminjaman?source=add&utf8=✓');
} else {
    $this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible">
                                            <i class="fa fa-exclamation-circle"></i> Data Gagal Disimpan
                                        </div>');
    redirect('apps/peminjaman?source=add&utf8=✓');
}
}elseif ($type == 'edit') {
$update = array(
        'nama_anggota'     => $this->input->post("nama_lengkap"),
        'buku_kode'         => $this->input->post("kode_buku"),
        'tgl_kembali'         => $this->input->post("tgl_kembali")
    );
    $this->db->update("tbl_pinjam", $update);
    //deklarasi session flashdata
    $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible">
                                            <i class="fa fa-check"></i> Data Berhasil Disimpan.
                                        </div>');
    //redirect halaman
    redirect('apps/peminjaman?source=add&utf8=✓');
} else {
    $this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible">
                                            <i class="fa fa-exclamation-circle"></i> Data Gagal Disimpan
                                        </div>');
    redirect('apps/peminjaman?source=add&utf8=✓');
}
}


public function confirm($id, $value)
{
if ($this->apps->apps_id()) {
$id_pinjam = $this->encryption->decode($id);
$value = $this->encryption->decode($this->uri->segment(5));
//where id
$key['id_pinjam'] = $id_pinjam;
//update
$update_status = array(
'is_kembali' => $value
);
//update query
$this->db->update("tbl_pinjam", $update_status, $key);

//Query kode tbl_buku
$squery = $this->db->query("SELECT buku_kode FROM tbl_pinjam WHERE id_pinjam = $id_pinjam")->row();

//update jumlah buku ketika di kembalikan
$query = $this->db->query("SELECT jumlah_buku as jml FROM tbl_buku where kode_buku = '$squery->buku_kode'");
$srow = $query->row();
$skode['kode_buku'] = $squery->buku_kode;

$update['jumlah_buku'] = $srow->jml + 1;
$this->db->update("tbl_buku",$update, $skode);
//deklarasi session flashdata
$this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible" style="font-family:Roboto">
                                            <i class="fa fa-check"></i> Data Berhasil Diupdate.
                                        </div>');
//redirect halaman
redirect('apps/peminjaman?source=confirm&utf8=✓');
} else {
show_404();
return FALSE;
}
}

public function delete()
{
if($this->apps->apps_id())
{
$id     = $this->encryption->decode($this->uri->segment(4));
$query  = $this->db->query("SELECT id_pinjam FROM tbl_pinjam WHERE id_pinjam ='$id'")->row();
$key['id_pinjam'] = $id;
$this->db->delete("tbl_pinjam", $key);
$this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible">
                                            <i class="fa fa-check"></i> Data Berhasil Dihapus.
                                        </div>');
//redirect halaman
redirect('apps/peminjaman?source=delete&utf8=✓');
}else{
show_404();
return FALSE;
}
}
}