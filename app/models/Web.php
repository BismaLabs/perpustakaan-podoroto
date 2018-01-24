
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

     function select_pages()
    {
    $this->db->order_by('id_page DESC');
    return $this->db->get('tbl_pages');
    }

    function select_buku()
    {
    $this->db->order_by('kode_buku DESC');
    $this->db->limit(8, 0);
    return $this->db->get('tbl_buku');
    }

    function select_kategori()
    {
    $this->db->order_by('nama_kategori ASC');
    return $this->db->get('tbl_kategori');
    }

    function select_slider()
    {
    $this->db->order_by('id_slide DESC');
    return $this->db->get('tbl_slider');
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

    function detail_pages($url)
    {
       $query = $this->db->query("SELECT * FROM tbl_pages WHERE slug_page = '$url'");
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


    function select_buku_populer()
    {
        // $query = $this->db->query("SELECT * FROM tbl_buku WHERE views > 50");
        $query = $this->db->select('*')->where('views > ', '0' )->limit(4)->get('tbl_buku');

        if($query->num_rows() > 0)
        {
            return $query->row();
        }else
        {
            return NULL;
        }
    }

    //index search buku
    public function search_index_buku($keyword,$limit,$offset)
    {
        $query = $this->db->select('*')
            ->from('tbl_buku')
            ->limit($limit,$offset)
            ->like('judul_buku',$keyword)
            ->limit($limit,$offset)
            ->order_by('kode_buku','DESC')
            ->get();

        if($query->num_rows() > 0)
        {
            return $query;
        }
        else
        {
            return NULL;
        }
    }

    //total search buku
    function total_search_buku($keyword)
    {
        $query = $this->db->like('judul_buku',$keyword)->get('tbl_buku');

        if($query->num_rows() > 0)
        {
            return $query->num_rows();
        }
        else
        {
            return NULL;
        }
    }

    /*Counter Pengunjung*/
    public function counter_visitor()
    {
        setcookie("pengunjung", "sudah berkunjung", time()+60*60*24);
        if (!isset($_COOKIE["pengunjung"])) {
            $d_in['ip_address'] = $_SERVER['REMOTE_ADDR'];
            $d_in['date_visit'] = date("Y-m-d H:i:s");
            $this->db->insert("tbl_counter",$d_in);
        }
    }

    /*Berita*/
     function get_berita_terbaru()
    {
        $this->db->order_by('id_berita DESC');
        $this->db->limit(8, 0);
        return $this->db->get('tbl_berita');
    }

    //get detail berita
    function detail_berita($url)
    {
        $query = $this->db->query("SELECT a.id_berita, a.user_id, a.judul_berita, a.slug, a.isi_berita, a.gambar, a.views, a.keywords, a.descriptions, a.created_at, b.id_user, b.nama_user FROM tbl_berita as a JOIN tbl_users as b ON a.user_id = b.id_user WHERE a.slug = '$url'");

        if($query->num_rows() > 0)
        {
            return $query->row();
        }else
        {
            return NULL;
        }
    }

     //total search berita
    function total_search_berita($keyword)
    {
        $query = $this->db->like('judul_berita',$keyword)->get('tbl_berita');

        if($query->num_rows() > 0)
        {
            return $query->num_rows();
        }
        else
        {
            return NULL;
        }
    }

    public function search_index_berita($keyword, $limit, $offset)
    {
        $query = $this->db->select('a.id_berita, a.judul_berita, a.slug, a.user_id, a.kategori_id, a.created_at, a.updated_at, b.id_user, b.nama_user')
            ->from('tbl_berita a')
            ->join('tbl_users b', 'a.user_id = b.id_user')
            ->limit($limit, $offset)
            ->like('a.judul_berita', $keyword)
            ->limit($limit, $offset)
            ->order_by('a.id_berita', 'DESC')
            ->get();

        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return NULL;
        }
    }
}