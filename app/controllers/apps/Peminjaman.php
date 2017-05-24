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
                            'nama'        => $this->input->post("nama"),
                            'kode_anggota'     => $this->input->post("no_anggota"),
                            'kode_buku'         => $this->input->post("judul_buku"),
                            'kategori_buku'       => $this->input->post("kategori_buku"),
                            'tgl_pinjam'         => $this->input->post("tgl_pinjam"),
                            'paraf_pinjam'          => $this->input->post("paraf_pinjam"),
                            'tgl_kembali'      => $this->input->post("tgl_kembali"),
                        );
                        $this->db->insert("tbl_pinjam", $insert);
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
            }elseif ($type == 'edit') {} else {
                        $this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible">
                                                                <i class="fa fa-exclamation-circle"></i> Data Gagal Disimpan
                                                            </div>');
                        redirect('apps/peminjaman?source=add&utf8=✓');
                    }
                }

    public function edit()
    {
        if($this->apps->apps_id())
        {
            
        }else{
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