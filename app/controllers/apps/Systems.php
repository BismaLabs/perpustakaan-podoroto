<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @package  : Perpustakaan Podoroto
 * @author   : bismalabs <bismalabs@gmail.com>
 * @since    : 2017
 * @license  : https://bismalabs.co.id/portofolio/perpustakaan-podoroto/
 */
class Systems extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        //load model
        $this->load->model('apps');
    }

    public function index()
    {
        if ($this->apps->apps_id()) {

            $data = array(
                'title' => 'Setting Systems ',
                'systems' => TRUE,
                'settings'=> TRUE
            );
            $this->load->view('apps/part/header', $data);
            $this->load->view('apps/part/sidebar');
            $this->load->view('apps/layout/systems/data');
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
            $id['id_system'] = $this->encryption->decode($this->input->post('id_system'));
            //create var update array
            $update = array(
                'admin_title'   => $this->input->post('admin_title'),
                'admin_footer'  => $this->input->post('admin_footer'),
                'site_title'    => $this->input->post('site_title'),
                'site_footer'   => $this->input->post('site_footer'),
                'keywords'      => $this->input->post('keywords'),
                'descriptions'  => $this->input->post('descriptions'),
                'tentang'       => $this->input->post('about'),
                'no_tlp'        => $this->input->post('phone'),
                'email'         => $this->input->post('email'),
                'alamat'        => $this->input->post('address')
            );
            $this->db->update('tbl_systems', $update, $id);
            $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible" style="font-family:Roboto">
			                                                    <i class="fa fa-check"></i> Sistem Berhasil Diupdate.
			                                                </div>');
            redirect('apps/systems?source=update&utf8=✓');
        }else{
            show_404();
            return FALSE;
        }
    }

}