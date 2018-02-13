<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @package  : Perpustakaan Podoroto
 * @author   : bismalabs <bismalabs@gmail.com>
 * @since    : 2017
 * @license  : https://bismalabs.co.id/portofolio/perpustakaan-podoroto/
 */
class Kategori extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //load model
        $this->load->model('apps');
    }

    public function index()
    {
        if ($this->apps->apps_id()) {
            //config pagination
            $config['base_url'] = base_url() . 'apps/kategori/index/';
            $config['total_rows'] = $this->apps->count_users()->num_rows();
            $config['per_page'] = 10;
            //instalasi paging
            $this->pagination->initialize($config);
            //deklare halaman
            $halaman = $this->uri->segment(4);
            $halaman = $halaman == '' ? 0 : $halaman;
            //create data array
            $data = array(
                'title' => 'kategori Buku',
                'kategori' => TRUE,
                'data_kategori' => $this->apps->index_kategori($halaman, $config['per_page']),
                'paging' => $this->pagination->create_links()
            );
            if ($data['data_kategori'] != NULL) {

                $data['kategori'] = $data['data_kategori'];

            } else {

                $data['kategori'] = NULL;

            }
            //load view with data
            $this->load->view('apps/part/header', $data);
            $this->load->view('apps/part/sidebar');
            $this->load->view('apps/layout/kategori/data');
            $this->load->view('apps/part/footer');
        } else {
            show_404();
            return FALSE;
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
                $total = $this->apps->total_search_kategori($keyword);
                //config pagination
                $config['base_url'] = base_url() . 'apps/kategori/search?q=' . $keyword;
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
                    'title' => 'kategori Buku',
                    'kategori' => TRUE,
                    'data_kategori' => $this->apps->search_index_kategori(strip_tags($keyword), $limit, $offset),
                    'paging' => $this->pagination->create_links()
                );
                if ($data['data_kategori'] != NULL) {

                    $data['kategori'] = $data['data_kategori'];
                } else {
                    $data['kategori'] = '';
                }
                //load view with data
                $this->load->view('apps/part/header', $data);
                $this->load->view('apps/part/sidebar');
                $this->load->view('apps/layout/kategori/data');
                $this->load->view('apps/part/footer');
            } else {
                redirect('apps/kategori');
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
                'title' => 'Add Kategori',
                'kategori' => TRUE,
                'type' => 'add'
            );
            //load view with data
            $this->load->view('apps/part/header', $data);
            $this->load->view('apps/part/sidebar');
            $this->load->view('apps/layout/kategori/add');
            $this->load->view('apps/part/footer');
        } else {
            show_404();
            return FALSE;
        }

    }

    public function edit($id_kategori)
    {
        if($this->apps->apps_id())
        {
            //get id
            $id_kategori = $this->encryption->decode($this->uri->segment(4));
            //create data array
            $data = array(
                'title'          => 'Edit Kategori',
                'kategori'          => TRUE,
                'type'           => 'edit',
                'data_kategori'     => $this->apps->edit_kategori($id_kategori)->row_array()
            );
            //load view with data
            $this->load->view('apps/part/header', $data);
            $this->load->view('apps/part/sidebar');
            $this->load->view('apps/layout/kategori/edit');
            $this->load->view('apps/part/footer');
        }else{
            show_404();
            return FALSE;
        }
    }

    public function save()
    {
        if($this->apps->apps_id())
        {

            $type               = $this->input->post("type");
            $id['id_kategori']  = $this->encryption->decode($this->input->post("id_kategori"));

            if($type == "add")
            {

                $insert = array(
                    'nama_kategori' => $this->input->post("nama_kategori"),
                    'slug_kategori'          => url_title(strtolower($this->input->post("nama_kategori"))),
                    'created_at'    => date("Y-m-d H:i:s"),
                    'updated_at'    => date("Y-m-d H:i:s")
                );

                $this->db->insert("tbl_kategori", $insert);
                //deklarasi session flashdata
                $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible" style="font-family:Roboto">
			                                                    <i class="fa fa-check"></i> Data Berhasil Disimpan.
			                                                </div>');
                //redirect halaman
                redirect('apps/kategori?source=add&utf8=✓');

            }elseif($type == "edit"){

                $update = array(
                    'nama_kategori' => $this->input->post("nama_kategori"),
                    'slug_kategori'          => url_title(strtolower($this->input->post("nama_kategori"))),
                    'created_at'    => date("Y-m-d H:i:s"),
                    'updated_at'    => date("Y-m-d H:i:s")
                );

                $this->db->update("tbl_kategori", $update, $id);
                //deklarasi session flashdata
                $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible" style="font-family:Roboto">
			                                                    <i class="fa fa-check"></i> Data Berhasil Diupdate.
			                                                </div>');
                //redirect halaman
                redirect('apps/kategori?source=edit&utf8=✓');

            }else{

                //

            }

        }else{
            show_404();
            return FALSE;
        }
    }

}