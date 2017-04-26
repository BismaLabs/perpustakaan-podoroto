
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @package  : Perpustakaan Podoroto.
 * @author   : Bismalabs Team
 * @since    : 2017
 * @license  : Bismalabs/portofolio/E-Library
 */
class Web extends CI_Model{

    public function __construct()
    {
        parent::__construct();
    }

    //get pages by id
    function get_pages($id_pages)
    {
        $query = $this->db->query("SELECT * FROM tbl_pages WHERE id_page = '$id_pages'");
        return $query;
    }

    function select_buku()
    {
    $this->db->order_by('kode_buku DESC');
    return $this->db->get('tbl_buku');
    }

    function select_kategori()
    {
    $this->db->order_by('nama_kategori ASC');
    return $this->db->get('tbl_kategori');
    }

    function detail_buku($url)
    {
        $query = $this->db->query("SELECT * FROM tbl_buku WHERE slug = '$url'");
         if($query->num_rows() > 0)
        {
            return $query->row();
        }else
        {
            return NULL;
        }
    }
    
}