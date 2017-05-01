<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @package  : Perpustakaan Podoroto
 * @author   : Fika Ridaul Maulayya <ridaulmaulayya@gmail.com>
 * @since    : 2017
 * @license  : https://bismalabs.co.id/portofolio/perpustakaan-podoroto/
 */
class Apps extends CI_Model{

    public function __construct()
    {
        parent::__construct();
    }

    //fungsi restrict halaman
    function apps_id()
    {
        return $this->session->userdata('apps_id');
    }

    //fungsi check username
    function check_one($table, $where)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($where);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result();
        }
    }

    //fungsi check login all
    function check_all($table, $field1, $field2)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($field1);
        $this->db->where($field2);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result();
        }
    }

       // funsi visitor
        function count_in_today()
        {
            $q = $this->db->query("SELECT COUNT(id_counter) as count_in_today FROM tbl_counter WHERE DATE(date_visit) = CURDATE()");
            return $q;
        }

        function count_in_week()
        {
            $q = $this->db->query("SELECT COUNT(id_counter) as count_in_week FROM tbl_counter WHERE DATE(date_visit) BETWEEN CURDATE() - INTERVAL 7 DAY AND CURDATE()");
            return $q;
        }

        function count_in_month()
        {
            $q = $this->db->query("SELECT COUNT(id_counter) as count_in_month FROM tbl_counter WHERE DATE(date_visit) BETWEEN CURDATE() - INTERVAL 30 DAY AND CURDATE()");
            return $q;
        }

        function count_in_year()
        {
            $q = $this->db->query("SELECT COUNT(id_counter) as count_in_year FROM tbl_counter WHERE YEAR(date_visit) = YEAR(CURDATE())");
            return $q;
        }

    /* fungsi user */
    function count_users()
    {
        return $this->db->get('tbl_users');
    }

    function index_users($halaman,$batas)
    {
        $query = "SELECT * FROM tbl_users  ORDER BY id_user DESC limit $halaman, $batas";
        return $this->db->query($query);
    }

    function search_users_json()
    {
        $query = $this->db->get('tbl_users');
        return $query->result();
    }

    function total_search_users($keyword)
    {
        $query = $this->db->like('nama_user',$keyword)->get('tbl_users');

        if($query->num_rows() > 0)
        {
            return $query->num_rows();
        }
        else
        {
            return NULL;
        }
    }

    public function search_index_users($keyword,$limit,$offset)
    {
        $query = $this->db->select('*')
            ->from('tbl_users')
            ->limit($limit,$offset)
            ->like('nama_user',$keyword)
            ->or_like('username', $keyword)
            ->limit($limit,$offset)
            ->order_by('id_user','DESC')
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

    function edit_users($id_user)
    {
        $id_user  =  array('id_user'=> $id_user);
        return $this->db->get_where('tbl_users', $id_user);
    }

       // fungsi pages
        function count_pages()
        {
            return $this->db->get('tbl_pages');
        }

        function index_pages($halaman,$batas)
        {
            $query = "SELECT * FROM tbl_pages as a JOIN tbl_users as b ON a.user_id = b.id_user  ORDER BY judul_page ASC limit $halaman, $batas";
            return $this->db->query($query);
        }

        function edit_pages($id_page)
        {
            $id_page  =  array('id_page'=> $id_page);
            return $this->db->get_where('tbl_pages',$id_page);
        }

        function total_search_pages($keyword)
        {
            $query = $this->db->like('judul_page',$keyword)->get('tbl_pages');

            if($query->num_rows() > 0)
            {
                return $query->num_rows();
            }
            else
            {
                return NULL;
            }
        }

        public function search_index_pages($keyword,$limit,$offset)
        {
            $query = $this->db->select('*')
                ->from('tbl_pages a')
                ->join('tbl_users b','a.user_id = b.id_user')
                ->limit($limit,$offset)
                ->like('a.judul_page',$keyword)
                ->limit($limit,$offset)
                ->order_by('a.judul_page','ASC')
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
        
        
        /* fungsi buku */
        function count_buku()
        {
            return $this->db->get('tbl_buku');
        }   

        function select_kategori()
        {
        $this->db->order_by('nama_kategori ASC');
        return $this->db->get('tbl_kategori');
        }

        function index_buku($halaman,$batas)
        {
            $query = "SELECT * FROM tbl_buku as a JOIN tbl_kategori as b ON a.kategori_id = b.id_kategori ORDER BY a.kode_buku DESC limit $halaman, $batas";
            return $this->db->query($query);
        }
    
        function search_buku_json()
        {
            $query = $this->db->get('tbl_buku');
            return $query->result();
        }
    
        function total_search_buku($keyword)
        {
            $query = $this->db->like('judul_buku',$keyword)->or_like('kode_buku', $keyword)->get('tbl_buku');
    
            if($query->num_rows() > 0)
            {
                return $query->num_rows();
            }
            else
            {
                return NULL;
            }
        }
    
        public function search_index_buku($keyword,$limit,$offset)
        {
            $query = $this->db->select('*')
                ->from('tbl_buku a')
                ->join('tbl_kategori b','a.kategori_id = b.id_kategori')
                ->limit($limit,$offset)
                ->like('a.judul_buku',$keyword)
                ->or_like('a.kode_buku',$keyword)
                ->limit($limit,$offset)
                ->order_by('a.kode_buku','DESC')
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
    
        function edit_buku($kode_buku)
        {
            $kode_buku  =  array('kode_buku'=> $kode_buku);
            return $this->db->get_where('tbl_buku', $kode_buku);
        }
            /* fungsi kategori */
            function count_kategori()
            {
                return $this->db->get('tbl_kategori');
            }

            function index_kategori($halaman,$batas)
            {
                $query = "SELECT * FROM tbl_kategori  ORDER BY id_kategori DESC limit $halaman, $batas";
                return $this->db->query($query);
            }

            function search_kategori_json()
            {
                $query = $this->db->get('tbl_kategori');
                return $query->result();
            }

            function total_search_kategori($keyword)
            {
                $query = $this->db->like('nama_kategori',$keyword)->get('tbl_kategori');

                if($query->num_rows() > 0)
                {
                    return $query->num_rows();
                }
                else
                {
                    return NULL;
                }
            }

            public function search_index_kategori($keyword,$limit,$offset)
            {
                $query = $this->db->select('*')
                    ->from('tbl_kategori')
                    ->limit($limit,$offset)
                    ->like('nama_kategori',$keyword)
                    ->limit($limit,$offset)
                    ->order_by('id_kategori','DESC')
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

            function edit_kategori($id_kategori)
            {
                $id_kategori  =  array('id_kategori'=> $id_kategori);
                return $this->db->get_where('tbl_kategori', $id_kategori);
            }
    
        

    //fungsi date time
        function tgl_time_indo($date=null){
            $tglindo = date("d-m-Y H:i:s", strtotime($date));
            $formatTanggal = $tglindo;
            return $formatTanggal;
        }

        function tgl_database($date=null)
        {
            $tgldatabase = date("Y-m-d", strtotime($date));
            $formatTanggal = $tgldatabase;
            return $formatTanggal;
        }

        function tgl_indo($date=null)
        {
            $tglindo = date("d-m-Y", strtotime($date));
            $formatTanggal = $tglindo;
            return $formatTanggal;
        }

        function tgl_tunggal($date=null)
        {
            $tglindo = date("j", strtotime($date));
            $formatTanggal = $tglindo;
            return $formatTanggal;
        }

        function tgl_mont_year($date=null)
        {
            $tglindo = date("n, Y");
            return $tglindo;
        }

        function year_tunggal($date=null)
        {
            $tglindo = date("Y");
            return $tglindo;
        }

        function jam_format($time=null)
        {
            $jamformat = date("H:i", strtotime($time));
            $formatJam = $jamformat;
            return $formatJam;
        }

        function bulan_inggris($date=null){
            //buat array nama hari dalam bahasa Indonesia dengan urutan 1-7
            $array_hari = array(1=>'Senin','Selasa','Rabu','Kamis','Jumat', 'Sabtu','Minggu');
            //buat array nama bulan dalam bahasa Indonesia dengan urutan 1-12
            $array_bulan = array(1=>'Jan','Feb','Mar', 'Apr', 'May', 'Jun','Jul','Aug',
                'Sep','Oct', 'Nov','Dec');
            if($date == null) {
                //jika $date kosong, makan tanggal yang diformat adalah tanggal hari ini
                $hari = $array_hari[date('N')];
                $tanggal = date ('j');
                $bulan = $array_bulan[date('n')];
                $tahun = date('Y');
            } else {
                //jika $date diisi, makan tanggal yang diformat adalah tanggal tersebut
                $date = strtotime($date);
                $hari = $array_hari[date('N',$date)];
                $tanggal = date ('j', $date);
                $bulan = $array_bulan[date('n',$date)];
                $tahun = date('Y',$date);
            }
            $formatTanggal = $bulan;
            return $formatTanggal;
        }

        function tgl_indo_no_hari($date=null){
            //buat array nama hari dalam bahasa Indonesia dengan urutan 1-7
            $array_hari = array(1=>'Senin','Selasa','Rabu','Kamis','Jumat', 'Sabtu','Minggu');
            //buat array nama bulan dalam bahasa Indonesia dengan urutan 1-12
            $array_bulan = array(1=>'Januari','Februari','Maret', 'April', 'Mei', 'Juni','Juli','Agustus',
                'September','Oktober', 'November','Desember');
            if($date == null) {
                //jika $date kosong, makan tanggal yang diformat adalah tanggal hari ini
                $hari = $array_hari[date('N')];
                $tanggal = date ('j');
                $bulan = $array_bulan[date('n')];
                $tahun = date('Y');
            } else {
                //jika $date diisi, makan tanggal yang diformat adalah tanggal tersebut
                $date = strtotime($date);
                $hari = $array_hari[date('N',$date)];
                $tanggal = date ('j', $date);
                $bulan = $array_bulan[date('n',$date)];
                $tahun = date('Y',$date);
            }
            $formatTanggal = $tanggal ." ". $bulan ." ". $tahun;
            return $formatTanggal;
        }

        function bulan_indo($date=null){
            //buat array nama hari dalam bahasa Indonesia dengan urutan 1-7
            $array_hari = array(1=>'Senin','Selasa','Rabu','Kamis','Jumat', 'Sabtu','Minggu');
            //buat array nama bulan dalam bahasa Indonesia dengan urutan 1-12
            $array_bulan = array(1=>'Januari','Februari','Maret', 'April', 'Mei', 'Juni','Juli','Agustus',
                'September','Oktober', 'November','Desember');
            if($date == null) {
                //jika $date kosong, makan tanggal yang diformat adalah tanggal hari ini
                $hari = $array_hari[date('N')];
                $tanggal = date ('j');
                $bulan = $array_bulan[date('n')];
                $tahun = date('Y');
            } else {
                //jika $date diisi, makan tanggal yang diformat adalah tanggal tersebut
                $date = strtotime($date);
                $hari = $array_hari[date('N',$date)];
                $tanggal = date ('j', $date);
                $bulan = $array_bulan[date('n',$date)];
                $tahun = date('Y',$date);
            }
            $formatTanggal = $bulan;
            return $formatTanggal;
        }

        function tgl_indo_lengkap($date=null){
            //buat array nama hari dalam bahasa Indonesia dengan urutan 1-7
            $array_hari = array(1=>'Senin','Selasa','Rabu','Kamis','Jumat', 'Sabtu','Minggu');
            //buat array nama bulan dalam bahasa Indonesia dengan urutan 1-12
            $array_bulan = array(1=>'Januari','Februari','Maret', 'April', 'Mei', 'Juni','Juli','Agustus',
                'September','Oktober', 'November','Desember');
            if($date == null) {
                //jika $date kosong, makan tanggal yang diformat adalah tanggal hari ini
                $hari = $array_hari[date('N')];
                $tanggal = date ('d');
                $bulan = $array_bulan[date('n')];
                $tahun = date('Y');
                $jam = date('H:i:s');
            } else {
                //jika $date diisi, makan tanggal yang diformat adalah tanggal tersebut
                $date = strtotime($date);
                $hari = $array_hari[date('N',$date)];
                $tanggal = date ('d', $date);
                $bulan = $array_bulan[date('n',$date)];
                $tahun = date('Y',$date);
                $jam = date('H:i:s',$date);
            }
            $formatTanggal = $hari . ", " . $tanggal ." ". $bulan ." ". $tahun ." Jam ". $jam;
            return $formatTanggal;
        }

        function tgl_jam_indo_no_hari($date=null){
            //buat array nama hari dalam bahasa Indonesia dengan urutan 1-7
            $array_hari = array(1=>'Senin','Selasa','Rabu','Kamis','Jumat', 'Sabtu','Minggu');
            //buat array nama bulan dalam bahasa Indonesia dengan urutan 1-12
            $array_bulan = array(1=>'Januari','Februari','Maret', 'April', 'Mei', 'Juni','Juli','Agustus',
                'September','Oktober', 'November','Desember');
            if($date == null) {
                //jika $date kosong, makan tanggal yang diformat adalah tanggal hari ini
                $hari = $array_hari[date('N')];
                $tanggal = date ('d');
                $bulan = $array_bulan[date('n')];
                $tahun = date('Y');
                $jam = date('H:i:s');
            } else {
                //jika $date diisi, makan tanggal yang diformat adalah tanggal tersebut
                $date = strtotime($date);
                $hari = $array_hari[date('N',$date)];
                $tanggal = date ('d', $date);
                $bulan = $array_bulan[date('n',$date)];
                $tahun = date('Y',$date);
                $jam = date('H:i:s',$date);
            }
            $formatTanggal = $tanggal ." ". $bulan ." ". $tahun ." Jam ". $jam;
            return $formatTanggal;
        }

        //fungsi date ago
        function time_elapsed_string($datetime, $full = false) {
            $today = time();
            $createdday= strtotime($datetime);
            $datediff = abs($today - $createdday);
            $difftext="";
            $years = floor($datediff / (365*60*60*24));
            $months = floor(($datediff - $years * 365*60*60*24) / (30*60*60*24));
            $days = floor(($datediff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
            $hours= floor($datediff/3600);
            $minutes= floor($datediff/60);
            $seconds= floor($datediff);
            //year checker
            if($difftext=="")
            {
                if($years>1)
                    $difftext=$years." years ago";
                elseif($years==1)
                    $difftext=$years." year ago";
            }
            //month checker
            if($difftext=="")
            {
                if($months>1)
                    $difftext=$months." months ago";
                elseif($months==1)
                    $difftext=$months." month ago";
            }
            //month checker
            if($difftext=="")
            {
                if($days>1)
                    $difftext=$days." days ago";
                elseif($days==1)
                    $difftext=$days." day ago";
            }
            //hour checker
            if($difftext=="")
            {
                if($hours>1)
                    $difftext=$hours." hours ago";
                elseif($hours==1)
                    $difftext=$hours." hour ago";
            }
            //minutes checker
            if($difftext=="")
            {
                if($minutes>1)
                    $difftext=$minutes." minutes ago";
                elseif($minutes==1)
                    $difftext=$minutes." minute ago";
            }
            //seconds checker
            if($difftext=="")
            {
                if($seconds>1)
                    $difftext=$seconds." seconds ago";
                elseif($seconds==1)
                    $difftext=$seconds." second ago";
            }
            return $difftext;
        }
}