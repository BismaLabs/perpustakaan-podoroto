<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @package  : Perpustakaan Podoroto
 * @author   : Fika Ridaul Maulayya <ridaulmaulayya@gmail.com>
 * @since    : 2017
 * @license  : https://bismalabs.co.id/portofolio/perpustakaan-podoroto/
 */

class Slider extends CI_Controller
{
	
	function __construct()
	{

		parent:: __construct();
		//load model
		$this->load->model('apps');
	}

	public function index()
	{
		if ($this->apps->apps_id()) {
            //config pagination
            $config['base_url'] = base_url() . 'apps/slider/index/';
            $config['total_rows'] = $this->apps->count_slider()->num_rows();
            $config['per_page'] = 10;
            //instalasi paging
            $this->pagination->initialize($config);
            //deklare halaman
            $halaman = $this->uri->segment(4);
            $halaman = $halaman == '' ? 0 : $halaman;
            //create data array
            $data = array(
                'title' => 'Slider',
                'slider' => TRUE,
                'data_slide' => $this->apps->index_slider($halaman, $config['per_page']),
                'paging' => $this->pagination->create_links()
            );
            if ($data['data_slide'] != NULL) {

                $data['slide'] = $data['data_slide'];

            } else {

                $data['slide'] = NULL;

            }
            //load view with data
            $this->load->view('apps/part/header',$data);
            $this->load->view('apps/part/sidebar');
            $this->load->view('apps/layout/slider/data');
            $this->load->view('apps/part/footer');
        } else {
            show_404();
            return FALSE;
        }
	}

	public function search()
	{
		if($this->apps->apps_id())
        {
            $limit = 10;
            $this->load->helper('security');
            $keyword = $this->security->xss_clean($_GET['q']);
            $data['keyword'] = strip_tags($keyword);
            $check = strlen(preg_replace('/[^a-zA-Z]/', '', $keyword));
            if(!empty($keyword) && $check > 2)
            {
                $offset = (isset($_GET['page'])) ? $this->security->xss_clean($_GET['page']) : 0 ;
                $total  = $this->apps->total_search_slider($keyword);
                //config pagination
                $config['base_url'] = base_url().'apps/slider/search?q='.$keyword;
                $config['total_rows'] = $total;
                $config['per_page'] = $limit;
                $config['page_query_string'] = TRUE;
                $config['use_page_numbers'] = TRUE;
                $config['display_pages']	= TRUE;
                $config['query_string_segment'] = 'page';
                $config['uri_segment']  = 4;
                //instalasi paging
                $this->pagination->initialize($config);

                $data = array(
                    'title'         => 'Slider',
                    'slider'         => TRUE,
                    'data_slide'    => $this->apps->search_index_slider(strip_tags($keyword),$limit,$offset),
                    'paging'        => $this->pagination->create_links()
                );
                if($data['data_slide'] != NULL)
                {
                    $data['slide'] = $data['data_slide'];
                }else{
                    $data['slide'] = '';
                }
                //load view with data
                $this->load->view('apps/part/header', $data);
                $this->load->view('apps/part/sidebar');
                $this->load->view('apps/layout/slider/data');
                $this->load->view('apps/part/footer');
            }else{
                redirect('apps/slider/');
            }
        }else{
            show_404();
            return FALSE;
        }
	}

	public function add()
	{
		if ($this->apps->apps_id()) {
			$data = array('title' => 'Tambah Slider',
			'slider' => TRUE,
			'type'	=> 'add',
			 );

			$this->load->view('apps/part/header', $data);
			$this->load->view('apps/part/sidebar');
			$this->load->view('apps/layout/slider/add');
			$this->load->view('apps/part/footer');
		}else{
			show_404();
			return FALSE;
		}
	}

	public function edit($id_slide)
	{
		if($this->apps->apps_id())
        {
            //get id
            $id_slide = $this->encryption->decode($this->uri->segment(4));
            //create data array
            $data = array(
                'title'         => 'Edit Slider',
                'slider'         => TRUE,
                'type'          => 'edit',
                'data_slide'    => $this->apps->edit_slider($id_slide)->row_array()
            );
            $this->load->view('apps/part/header', $data);
            $this->load->view('apps/part/sidebar');
            $this->load->view('apps/layout/slider/edit');
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
            //get type from form
            $type               = $this->input->post("type");
            $id['id_slide']    = $this->encryption->decode($this->input->post("id_slide"));
            //automated kode buku
            //check value var type
            if ($type == "add") {

                    //config upload
                    $config = array(
                        'upload_path' => realpath('resources/images/slider/'),
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
                        $source = realpath('resources/images/slider/' . $data_upload['file_name']);
                        $destination_thumb = realpath('resources/images/slider/');

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
                            'caption'        => $this->input->post("caption"),
                            'foto'              => $data_upload['file_name'],
                            'user_id'           => $this->session->userdata("apps_id"),
                            'created_at'        => date("Y-m-d H:i:s"),
                        );
                        $this->db->insert("tbl_slider", $insert);
                        //deklarasi session flashdata
                        $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible">
			                                                    <i class="fa fa-check"></i> Data Berhasil Disimpan.
			                                                </div>');
                        //redirect halaman
                        redirect('apps/slider?source=add&utf8=✓');
                    } else {
                        $this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible">
			                                                    <i class="fa fa-exclamation-circle"></i> Data Gagal Disimpan ' . $this->upload->display_errors('') . '
			                                                </div>');
                        redirect('apps/slider?source=add&utf8=✓');
                    }

            } elseif ($type == "edit") {
                if (empty($_FILES['userfile']['name'])) {
                    //create update array
                    $update = array(
                         'caption'        => $this->input->post("caption"),
                            'foto'              => $data_upload['file_name'],
                            'user_id'           => $this->session->userdata("apps_id"),
                            'updated_at'        => date("Y-m-d H:i:s")
                    );
                    $this->db->update("tbl_slider", $update, $id);
                    $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible" >
			                                                    <i class="fa fa-check"></i> Data Berhasil Diupdate.
			                                                </div>');
                    redirect('apps/slider?source=edit&utf8=✓');
                } else {
                    //config upload
                    $config = array(
                        'upload_path' => realpath('resources/images/slider/'),
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
                        $source = realpath('resources/images/slider/' . $data_upload['file_name']);
                        $destination_thumb = realpath('resources/images/slider/');
                        $source_old = realpath('resources/images/slider/' . $foto_thumbnail . '');

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
                            'caption'        => $this->input->post("caption"),
                            'foto'              => $data_upload['file_name'],
                            'user_id'           => $this->session->userdata("apps_id"),
                            'updated_at'        => date("Y-m-d H:i:s")

                        );
                        $this->db->update("tbl_slider", $update, $id);
                        //deklarasi session flashdata
                        $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible">
			                                                    <i class="fa fa-check"></i> Data Berhasil Diupdate.
			                                                </div>');
                        //redirect halaman
                        redirect('apps/slider?source=edit&utf8=✓');
                    } else {
                        $this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible">
			                                                    <i class="fa fa-exclamation-circle"></i> Data Gagal Diupdate ' . $this->upload->display_errors('') . '
			                                                </div>');
                        redirect('apps/slider?source=edit&utf8=✓');
                    }
                }

            } else {
                $this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible">
			                                                    <i class="fa fa-exclamation-circle"></i> Variable Type not value
			                                                </div>');
                redirect('apps/slider?source=edit&utf8=✓');
            }

        }else{
            show_404();
            return FALSE;
        }
    }

    public function delete($id_slide)
    {
         if ($this->apps->apps_id()) {
            $id = $this->encryption->decode($this->uri->segment(4));
            $key['id_slide'] = $id;
            $this->db->delete('tbl_slider', $key);
            $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible" style="font-family:Roboto">
                                                                <i class="fa fa-check"></i> Data Berhasil Dihapus.
                                                            </div>');
            //redirect halaman
           redirect('apps/slider?source=delete&utf8=✓');
           }else {
            show_404();
            return FALSE;
        }
    }
}