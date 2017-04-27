
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
        $query = $this->db->query("SELECT a.kode_buku, a.judul_buku, a.foto, a.views, a.slug, a.tahun_terbit, a.penerbit, a.pengarang, a.kategori_id, a.deskripsi, a.no_isbn, a.jumlah_buku, a.created_at, b.id_kategori, b.nama_kategori FROM tbl_buku as a JOIN tbl_kategori as b ON a.kategori_id = b.id_kategori WHERE a.slug = '$url'");
         if($query->num_rows() > 0)
        {
            return $query->row();
        }else
        {
            return NULL;
        }
    }

    function detail_kategori($url)
    {
        $query = $this->db->query("SELECT a.kode_buku, a.judul_buku, a.foto, a.views, a.tahun_terbit, a.penerbit, a.pengarang, a.kategori_id, a.deskripsi, a.no_isbn, a.jumlah_buku, a.created_at, b.id_kategori, b.nama_kategori, b.slug FROM tbl_buku as a JOIN tbl_kategori as b ON a.kategori_id = b.id_kategori WHERE b.slug = '$url'");

        if($query->num_rows() > 0)
        {
            return $query->row();
        }else
        {
            return NULL;
        }
    }

    function count_kategori($slug)
    {
        $query = $this->db->select('a.kode_buku, a.kategori_id, a.judul_buku, a.slug, a.views, a.foto, a.created_at, b.id_kategori, b.nama_kategori, b.slug_kategori, c.id_user, c.username, c.nama_user')
            ->from('tbl_buku a')
            ->join('tbl_kategori b','a.kategori_id = b.id_kategori')
            ->join('tbl_users c','a.user_id = c.id_user')
            ->where('b.slug_kategori',$slug)
            ->order_by('a.kode_buku','DESC')
            ->get();

        if($query->num_rows() > 0)
        {
            return $query->num_rows();
        }
        else
        {
            return NULL;
        }
    }

    function index_kategori($halaman,$batas,$slug)
    {
        $query = "SELECT a.kode_buku, a.kategori_id, a.judul_buku, a.slug, a.views, a.foto, a.created_at, b.id_kategori, b.nama_kategori, b.slug_kategori, c.id_user, c.username, c.nama_user FROM tbl_buku as a JOIN tbl_kategori as b JOIN tbl_users as c ON a.kategori_id = b.id_kategori AND a.user_id = c.id_user WHERE b.slug_kategori = '$slug' limit $halaman, $batas";
        return $this->db->query($query);
    }

    function get_kategori_judul($slug)
    {
        $query = $this->db->query("SELECT * FROM tbl_kategori WHERE slug_kategori = '$slug'");

        if($query->num_rows() > 0)
        {
            return $query->row();
        }else
        {
            return NULL;
        }
    }


}