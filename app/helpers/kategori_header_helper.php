<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @package  : Medical Top Team.
 * @author   : Fika Ridaul Maulayya <ridaulmaulayya@gmail.com>
 * @since    : 2017
 * @license  : https://maulayya.com/portofolio/medical-top-team/
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
}