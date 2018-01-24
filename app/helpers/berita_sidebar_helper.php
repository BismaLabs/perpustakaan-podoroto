<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @package  : Medical Top Team.
 * @author   : Fika Ridaul Maulayya <ridaulmaulayya@gmail.com>
 * @since    : 2017
 * @license  : https://maulayya.com/portofolio/medical-top-team/
 */
if(!function_exists('berita_sidebar'))
{
    function berita_sidebar($id_berita)
    {
        $CI = & get_instance();

        $query = $CI->db->select('*')->where_not_in('id_berita', $id_berita)->order_by('id_berita' ,'DESC')->limit(5,0)->get('tbl_berita');

        if($query->num_rows() < 0){

            return NULL;
        }else{
            return $query->result();
        }
    }

    function berita_sidebar_terbaru()
    {
        $CI = & get_instance();

        $query = $CI->db->select('*')->order_by('id_berita' ,'DESC')->limit(3,0)->get('tbl_berita');

        if($query->num_rows() < 0){

            return NULL;
        }else{
            return $query->result();
        }
    }
}