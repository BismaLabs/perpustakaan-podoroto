<?php 
defined('BASEPATH') or exit('No direct script access allowed');

/**
* @package  : Perpustakaan Podoroto
* @author   : Mohamad Yazidinni'am <myazidinniam@gmail.com>
* @since    : 2017
* @license  : https://bismalabs.co.id/portofolio/perpustakaan-podoroto/
*/
class Anggota extends CI_Controller
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

        //config pagination
        $config['base_url'] = base_url() . 'apps/buku/index/';
        $config['total_rows'] = $this->apps->count_anggota()->num_rows();
        $config['per_page'] = 10;
        //instalasi paging
        $this->pagination->initialize($config);
        //deklare halaman
        $halaman = $this->uri->segment(4);
        $halaman = $halaman == '' ? 0 : $halaman;
        //create data array

        $data = array('title' =>    'Data Anggota', 
                'anggota'  =>    TRUE,
                'data_anggota' => $this->apps->index_anggota($halaman, $config['per_page']),
                'paging' => $this->pagination->create_links()
            );
            if ($data['data_anggota'] != NULL) {

                $data['anggota'] = $data['data_anggota'];

            } else {

                $data['anggota'] = NULL;

            }
            //load view
            $this->load->view('apps/part/header', $data);
            $this->load->view('apps/part/sidebar');
            $this->load->view('apps/layout/anggota/data');
            $this->load->view('apps/part/footer');
        } else {
            show_404();
            return FALSE;
        }
    }

    //fungsi pencarian
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
                $total = $this->apps->total_search_anggota($keyword);
                //config pagination
                $config['base_url'] = base_url() . 'apps/anggota/search?q=' . $keyword;
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
                    'title' => 'Data Anggota',
                    'anggota' => TRUE,
                    'data_anggota' => $this->apps->search_index_buku(strip_tags($keyword), $limit, $offset),
                    'paging' => $this->pagination->create_links()
                );
                if ($data['data_anggota'] != NULL) {

                    $data['anggota'] = $data['data_anggota'];
                } else {
                    $data['anggota'] = '';
                }
                //load view with data
                $this->load->view('apps/part/header', $data);
                $this->load->view('apps/part/sidebar');
                $this->load->view('apps/layout/anggota/data');
                $this->load->view('apps/part/footer');
            } else {
                redirect('apps/anggota');
            }
        } else {
            show_404();
            return FALSE;
        }
    }

    public function add()
    {
        if ($this->apps->apps_id()) {
             $data = array('title' => 'Tambah Anggota',
                            'anggota' => TRUE,
                            'type'  => 'add');
             //Load View
            $this->load->view('apps/part/header', $data);
            $this->load->view('apps/part/sidebar');
            $this->load->view('apps/layout/anggota/add');
            $this->load->view('apps/part/footer');
        } else {
            show_404();
            return FALSE;
        }
       
    }

    public function save()
    {
       if ($this->apps->apps_id()) {

            //get type from form
            $type               = $this->input->post("type");
            $id['no_anggota']    = $this->encryption->decode($this->input->post("no_anggota"));
            //automated kode buku
            $no_anggota          = $this->getnotes($this->encryption->decode($this->input->post("no_anggota")));

            //fungsi simpan tipe tambah
           if ($type == 'add') {
               
               //config upload
                    $config = array(
                        'upload_path' => realpath('resources/images/anggota/'),
                        'allowed_types' => 'jpg|png|jpeg',
                        'encrypt_name' => TRUE,
                        'remove_spaces' => TRUE,
                        'overwrite' => TRUE,
                        'max_size' => '5000',
                        'max_width' => '5000',
                        'max_height' => '5000'
                    );
                    //load library upload
                    $this->load->library("upload", $config);
                    //load library lib image
                    $this->load->library("image_lib");

                    $this->upload->initialize($config);
                    if ($this->upload->do_upload("userfile")) {
                        $data_upload = $this->upload->data();

                        /* PATH */
                        $source = realpath('resources/images/anggota/' . $data_upload['file_name']);
                        $destination_thumb = realpath('resources/images/anggota/thumb/');

                        // Permission Configuration
                        chmod($source, 0777);

                        /* Resizing Processing */
                        // Configuration Of Image Manipulation :: Static
                        $img['image_library'] = 'GD2';
                        $img['create_thumb'] = TRUE;
                        $img['maintain_ratio'] = TRUE;

                        /// Limit Width Resize
                        $limit_thumb = 600;

                        // Size Image Limit was using (LIMIT TOP)
                        $limit_use = $data_upload['image_width'] > $data_upload['image_height'] ? $data_upload['image_width'] : $data_upload['image_height'];

                        // Percentase Resize
                        if ($limit_use > $limit_thumb) {
                            $percent_thumb = $limit_thumb / $limit_use;
                        }

                        //// Making THUMBNAIL ///////
                        $img['width'] = $limit_use > $limit_thumb ? $data_upload['image_width'] * $percent_thumb : $data_upload['image_width'];
                        $img['height'] = $limit_use > $limit_thumb ? $data_upload['image_height'] * $percent_thumb : $data_upload['image_height'];

                        // Configuration Of Image Manipulation :: Dynamic
                        $img['thumb_marker'] = '';
                        $img['quality'] = '100%';
                        $img['source_image'] = $source;
                        $img['new_image'] = $destination_thumb;

                        // Do Resizing
                        $this->image_lib->initialize($img);
                        $this->image_lib->resize();
                        $this->image_lib->clear();

                        $insert = array(
                            'no_anggota'         => $no_anggota,
                            'nama_lengkap'        => $this->input->post("nama_lengkap"),
                            'slug'              => url_title(strtolower($this->input->post("nama_lengkap"))),
                            'jenis_kelamin'         => $this->input->post("jenis_kelamin"),
                            'tempat_lahir'       => $this->input->post("tempat_lahir"),
                            'tgl_lahir'         => $this->input->post("tgl_lahir"),
                            'bulan_lahir'       => $this->input->post("bulan_lahir"),
                            'tahun'          => $this->input->post("tahun"),
                            'alamat'      => $this->input->post("alamat"),
                            'no_telp'           => $this->input->post("no_telp"),
                            'foto'              => $data_upload['file_name'],
                            'created_at'        => date("Y-m-d H:i:s"),
                            'updated_at'        => date("Y-m-d H:i:s")
                        );
                        $this->db->insert("tbl_anggota", $insert);
                        //deklarasi session flashdata
                        $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible">
                        <i class="fa fa-check"></i> Data Berhasil Disimpan.
                    </div>');
                        //redirect halaman
                        redirect('apps/anggota?source=add&utf8=✓');
                    } else {
                        $this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible">
                    <i class="fa fa-exclamation-circle"></i> Data Gagal Disimpan ' . $this->upload->display_errors('') . '</div>');
                        redirect('apps/anggota?source=add&utf8=✓');
                    }

               //fungsi simpan tipe edit
           }elseif ($type == 'edit') {
              if (empty($_FILES['userfile']['name'])) {
                    //create update array
                    $update = array(
                        'nama_lengkap'        => $this->input->post("nama_lengkap"),
                        'slug'              => url_title(strtolower($this->input->post("nama_lengkap"))),
                        'jenis_kelamin'         => $this->input->post("jenis_kelamin"),
                       'tempat_lahir'       => $this->input->post("tempat_lahir"),
                        'tgl_lahir'         => $this->input->post("tgl_lahir"),
                        'bulan_lahir'       => $this->input->post("bulan_lahir"),
                        'tahun'          => $this->input->post("tahun"),
                        'alamat'      => $this->input->post("alamat"),
                        'no_telp'           => $this->input->post("no_telp"),
                        'foto'              => $data_upload['file_name'],
                        'updated_at'        => date("Y-m-d H:i:s")
                    );
                    $this->db->update("tbl_anggota", $update, $id);
                    $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible" >
                    <i class="fa fa-check"></i> Data Berhasil Diupdate.
                </div>');
                    redirect('apps/anggota?source=edit&utf8=✓');
                } else {
                    //config upload
                    $config = array(
                        'upload_path' => realpath('resources/images/anggota/'),
                        'allowed_types' => 'jpg|png|jpeg',
                        'encrypt_name' => TRUE,
                        'remove_spaces' => TRUE,
                        'overwrite' => TRUE,
                        'max_size' => '5000',
                        'max_width' => '5000',
                        'max_height' => '5000'
                    );
                    //load library upload
                    $this->load->library("upload", $config);
                    //load library lib image
                    $this->load->library("image_lib");

                    $this->upload->initialize($config);
                    if ($this->upload->do_upload("userfile")) {
                        $data_upload = $this->upload->data();

                        /* PATH */
                        $source = realpath('resources/images/anggota/' . $data_upload['file_name']);
                        $destination_thumb = realpath('resources/images/anggota/thumb/');
                        $source_old = realpath('resources/images/anggota/thumb/' . $foto_thumbnail . '');

                        // Permission Configuration
                        chmod($source, 0777);

                        /* Resizing Processing */
                        // Configuration Of Image Manipulation :: Static
                        $img['image_library'] = 'GD2';
                        $img['create_thumb'] = TRUE;
                        $img['maintain_ratio'] = TRUE;

                        /// Limit Width Resize
                        $limit_thumb = 600;

                        // Size Image Limit was using (LIMIT TOP)
                        $limit_use = $data_upload['image_width'] > $data_upload['image_height'] ? $data_upload['image_width'] : $data_upload['image_height'];

                        // Percentase Resize
                        if ($limit_use > $limit_thumb) {
                            $percent_thumb = $limit_thumb / $limit_use;
                        }

                        //// Making THUMBNAIL ///////
                        $img['width'] = $limit_use > $limit_thumb ? $data_upload['image_width'] * $percent_thumb : $data_upload['image_width'];
                        $img['height'] = $limit_use > $limit_thumb ? $data_upload['image_height'] * $percent_thumb : $data_upload['image_height'];

                        // Configuration Of Image Manipulation :: Dynamic
                        $img['thumb_marker'] = '';
                        $img['quality'] = '100%';
                        $img['source_image'] = $source;
                        $img['new_image'] = $destination_thumb;

                        // Do Resizing
                        $this->image_lib->initialize($img);
                        $this->image_lib->resize();
                        $this->image_lib->clear();

                        $update = array(
                        'nama_lengkap'        => $this->input->post("nama_lengkap"),
                        'slug'              => url_title(strtolower($this->input->post("nama_lengkap"))),
                        'jenis_kelamin'         => $this->input->post("jenis_kelamin"),
                       'tempat_lahir'       => $this->input->post("tempat_lahir"),
                        'tgl_lahir'         => $this->input->post("tgl_lahir"),
                        'bulan_lahir'       => $this->input->post("bulan_lahir"),
                        'tahun'          => $this->input->post("tahun"),
                        'alamat'      => $this->input->post("alamat"),
                        'no_telp'           => $this->input->post("no_telp"),
                        'foto'              => $data_upload['file_name'],
                        'updated_at'        => date("Y-m-d H:i:s")

                        );
                        $this->db->update("tbl_anggota", $update, $id);
                        //deklarasi session flashdata
                        $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible">
                            <i class="fa fa-check"></i> Data Berhasil Diupdate.
                        </div>');
                //redirect halaman
                        redirect('apps/anggota?source=edit&utf8=✓');
                    } else {
                        $this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible">
                    <i class="fa fa-exclamation-circle"></i> Data Gagal Diupdate ' . $this->upload->display_errors('') . '
                </div>');
                        redirect('apps/anggota?source=edit&utf8=✓');
                    }
                }

            } else {
                $this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible">
                <i class="fa fa-exclamation-circle"></i> Variable Type not value
            </div>');
                redirect('apps/anggota?source=edit&utf8=✓');
            }

        }else{
            show_404();
            return FALSE;
        }
   }


     public function getnotes($no_anggota ='') {
        if (empty(trim($no_anggota))) {
            return '';
            exit();
        }
        $ketemu=false;
        $urut=1;
        while ($ketemu==false) {
            $kode_anggota = $no_anggota.'-'.sprintf("%03d", $urut);
            $sql="SELECT no_anggota FROM tbl_anggota where no_anggota ='$no_anggota'";
            $jml  = $this->db->query($sql)->num_rows();
            if ($jml==0) { //Jika nomor tes belum dipakai
                $ketemu=true;
                return $kode_anggota;
            }
            else { //Jika nomor tes sudah dipakai
                $urut++;
            }
        }
    }
}