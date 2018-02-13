<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @package  : Perpustakaan Podoroto.
 * @author   : bismalabs <bismalabs@gmail.com>
 * @since    : 2017
 * @license  : https://bismalabs.com/portofolio/perpustakaan.podoroto.desa.id/
 */

class Pdf {

    function Pdf()
    {
        $CI = & get_instance();
        log_message('Debug', 'mPDF class is loaded.');
    }

    function cetak_kartu($param = NULL)
    {
        include_once APPPATH.'/third_party/mpdf/mpdf.php';

        if ($params == NULL)
        {
            $param = '"utf-8", "A5-L",1,1,1,1,1';

        }

        //return new mPDF($param);
        // return new mPDF('', // L - landscape, P - portrait
        //     'A4', '', '', 
        //     1, // margin_left
        //     1, // margin right
        //     1, // margin top
        //     1, // margin bottom
        //     1, // margin header
        //     1, 'L');
    return new mPDF('utf-8', 'A5-L',3,3,3,3,3,3);

    }
}
