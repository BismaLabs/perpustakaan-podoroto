<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @package  : Medical Top Team.
 * @author   : bismalabs <bismalabs@gmail.com>
 * @since    : 2017
 * @license  : https://bismalabs.com/portofolio/medical-top-team/
 */
if(!function_exists('kategori_header'))
{
    function kategori_header()
    {
        $CI = & get_instance();
 
        $query = $CI->db->select('*')->order_by('nama_kategori' ,'ASC')->limit(5)->get('tbl_kategori');
 
        if($query->num_rows() < 0){
 
            return NULL;
        }else{
            return $query->result();
        }
    }

    function page_header()
    {
        $CI = & get_instance();
 
        $query = $CI->db->select('*')->order_by('judul_page' ,'ASC')->limit(4)->get('tbl_pages');
 
        if($query->num_rows() < 0){
 
            return NULL;
        }else{
            return $query->result();
        }
    }

    function buku_populer() {
        $CI = & get_instance();
        $query = $CI->db->select('*')->where('views > ', '50' )->limit(6)->get('tbl_buku');
         if($query->num_rows() < 0){
            return NULL;
        }else{
            return $query->result();
        }
    }

    function buku_terkait($kategori_id, $slug) {
        $CI = & get_instance();
        $query = $CI->db->select('*')->where('kategori_id', $kategori_id)->where_not_in('slug', $slug)->limit(3)->get('tbl_buku');
         if($query->num_rows() < 0){
            return NULL;
        }else{
            return $query->result();
        }
    }
}