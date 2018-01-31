<?php 
Defined('BASEPATH')	or exit ('No Direct Script Acces Allowed');

/**
 * @package  : Perpustakaan Podoroto
 * @author   : Myazidinniam [myazidinniam@gmail.com]
 * @since    : 2017
 * @license  : https://bismalabs.co.id/portofolio/perpustakaan-podoroto/
**/
class Berita extends CI_Controller
{
	
		public function __construct()
		{
			parent::__construct();
			//Load Model
			$this->load->model('apps');
		}

		public function index()
		{
			if ($this->apps->apps_id()) {
				//Config Pagination
				$config['base_url'] = base_url().'apps/berita/index';
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
					$data['berita'] = $data ['data_berita'];
				}else{
					$data['berita'] = NULL;
				}

				//load view dengan parsing data 
				$this->load->view('apps/part/header', $data);
				$this->load->view('apps/part/sidebar');
				$this->load->view('apps/layout/berita/data');
				$this->load->view('apps/part/footer');
			}else{
				SHOW_404();
				return False;
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
                $total = $this->apps->total_search_berita($keyword);
                //config pagination
                $config['base_url'] = base_url() . 'apps/berita/search?q=' . $keyword;
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
                    'title' => 'Berita',
                    'berita' => TRUE,
                    'data_berita' => $this->apps->search_index_berita(strip_tags($keyword), $limit, $offset),
                    'paging' => $this->pagination->create_links()
                );
                if ($data['data_berita'] != NULL) {

                    $data['berita'] = $data['data_berita'];
                } else {
                    $data['berita'] = '';
                }
                //load view with data
                $this->load->view('apps/part/header', $data);
                $this->load->view('apps/part/sidebar');
                $this->load->view('apps/layout/berita/data');
                $this->load->view('apps/part/footer');
			}else{
				redirect('apps/berita');
			}
			}else {
				SHOW_404();
				return False;
			}
		}

		public function add()
		{
			if ($this->apps->apps_id()) {
				
				// Buat Data array
				$data = array('title' => 'Tambah Berita',
				'berita' => TRUE,
				'type'	=> 'add');

			//load view dengan parsing data array
			$this->load->view('apps/part/header', $data);
			$this->load->view('apps/part/sidebar');
			$this->load->view('apps/layout/berita/add');
			$this->load->view('apps/part/footer');
		}else{
			Show_404();
			return FALSE;
		}
	}

    public function edit($id_berita)
    {
        if ($this->apps->apps_id()) {
            //get id
            $id_berita = $this->encryption->decode($this->uri->segment(4));
            //create data array
            $data = array(
                'title' => 'Edit Berita',
                'berita' => TRUE,
                'type' => 'edit',
                'data_berita' => $this->apps->edit_berita($id_berita)->row_array(),
                'select_kat' => $this->apps->select_kategori()
            );
            //load view with data
            $this->load->view('apps/part/header', $data);
            $this->load->view('apps/part/sidebar');
            $this->load->view('apps/layout/berita/edit');
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
            $type = $this->input->post("type");
            $id['id_berita'] = $this->encryption->decode($this->input->post("id_berita"));

            //check value var type
            if ($type == "add") {

                //config upload
                $config = array(
                    'upload_path' => realpath('resources/images/berita/'),
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
                    $source = realpath('resources/images/berita/' . $data_upload['file_name']);
                    $destination_thumb = realpath('resources/images/berita/thumb/');

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
                        'judul_berita' => $this->input->post("judul_berita"),
                        'slug' => url_title(strtolower($this->input->post("judul_berita"))),
                        'isi_berita' => $this->input->post("isi_berita"),
                        'keywords' => $this->input->post("keywords"),
                        'descriptions' => $this->input->post("descriptions"),
                        'gambar' => $data_upload['file_name'],
                        'user_id' => $this->session->userdata("apps_id"),
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    );
                    $this->db->insert("tbl_berita", $insert);
                    //deklarasi session flashdata
                    $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible">
			                                                    <i class="fa fa-check"></i> Data Berhasil Disimpan.
			                                                </div>');
                    //redirect halaman
                    redirect('apps/berita?source=add&utf8=✓');
                } else {
                    $this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible">
			                                                    <i class="fa fa-exclamation-circle"></i> Data Gagal Disimpan ' . $this->upload->display_errors('') . '
			                                                </div>');
                    redirect('apps/berita?source=add&utf8=✓');
                }

            } elseif ($type == "edit") {
                if (empty($_FILES['userfile']['name'])) {
                    //create update array
                    $update = array(
                        'judul_berita' => $this->input->post("judul_berita"),
                        'slug' => url_title(strtolower($this->input->post("judul_berita"))),
                        'isi_berita' => $this->input->post("isi_berita"),
                        'keywords' => $this->input->post("keywords"),
                        'descriptions' => $this->input->post("descriptions"),
                        'user_id' => $this->session->userdata("apps_id"),
                        'updated_at' => date("Y-m-d H:i:s")
                    );
                    $this->db->update("tbl_berita", $update, $id);
                    $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible" >
			                                                    <i class="fa fa-check"></i> Data Berhasil Diupdate.
			                                                </div>');
                    redirect('apps/berita?source=edit&utf8=✓');
                } else {
                    //config upload
                    $config = array(
                        'upload_path' => realpath('resources/images/berita/'),
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
                        $source = realpath('resources/images/berita/' . $data_upload['file_name']);
                        $destination_thumb = realpath('resources/images/berita/thumb/');
                        $source_old = realpath('resources/images/berita/thumb/' . $foto_thumbnail . '');

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
                            'judul_berita' => $this->input->post("judul_berita"),
                            'slug' => url_title(strtolower($this->input->post("judul_berita"))),
                            'kategori_id' => $this->input->post("kategori"),
                            'isi_berita' => $this->input->post("isi_berita"),
                            'keywords' => $this->input->post("keywords"),
                            'descriptions' => $this->input->post("descriptions"),
                            'gambar' => $data_upload['file_name'],
                            'user_id' => $this->session->userdata("apps_id"),
                            'updated_at' => date("Y-m-d H:i:s")

                        );
                        $this->db->update("tbl_berita", $update, $id);
                        //deklarasi session flashdata
                        $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible">
			                                                    <i class="fa fa-check"></i> Data Berhasil Diupdate.
			                                                </div>');
                        //redirect halaman
                        redirect('apps/berita?source=edit&utf8=✓');
                    } else {
                        $this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible">
			                                                    <i class="fa fa-exclamation-circle"></i> Data Gagal Diupdate ' . $this->upload->display_errors('') . '
			                                                </div>');
                        redirect('apps/berita?source=edit&utf8=✓');
                    }
                }

            } else {
                $this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible">
			                                                    <i class="fa fa-exclamation-circle"></i> Variable Type not value
			                                                </div>');
                redirect('apps/berita?source=edit&utf8=✓');
            }
		}else{
			show_404();
			return false;
		}
	}

	public function delete()
    {
        if ($this->apps->apps_id()) {
            $id = $this->encryption->decode($this->uri->segment(4));
            $query = $this->db->query("SELECT id_berita, gambar FROM tbl_berita WHERE id_berita ='$id'")->row();
            unlink(realpath('resources/images/berita/' . $query->gambar));
            unlink(realpath('resources/images/berita/thumb/' . $query->gambar));
            $key['id_berita'] = $id;
            $this->db->delete("tbl_berita", $key);
            $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible">
			                                                    <i class="fa fa-check"></i> Data Berhasil Dihapus.
			                                                </div>');
            //redirect halaman
            redirect('apps/berita?source=delete&utf8=✓');
        } else {
            show_404();
            return FALSE;
        }
    }
}
?>