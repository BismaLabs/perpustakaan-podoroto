
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
}