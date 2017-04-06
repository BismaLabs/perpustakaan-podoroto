<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @package  : Perpustakaan Podoroto
 * @author   : Fika Ridaul Maulayya <ridaulmaulayya@gmail.com>
 * @since    : 2017
 * @license  : https://bismalabs.co.id/portofolio/perpustakaan-podoroto/
 */
class Dashboard extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        //load model
        $this->load->model('apps');
    }

    public function index()
    {
        if($this->apps->apps_id())
        {

            $data = array(
                'title' => 'Dashboard ',
                'dashboard' => TRUE,
                'js_ready' => "GetToday('" . date("Y-m-d") . "')"
            );

            // Get Count Visitor
            $today_visit = $this->apps->count_in_today();
            $get_today_visit = $today_visit->row();
            $data['today_visit'] = $get_today_visit->count_in_today;

            $week_visit = $this->apps->count_in_week();
            $get_week_visit = $week_visit->row();
            $data['week_visit'] = $get_week_visit->count_in_week;

            $month_visit = $this->apps->count_in_month();
            $get_month_visit = $month_visit->row();
            $data['month_visit'] = $get_month_visit->count_in_month;

            $year_visit = $this->apps->count_in_year();
            $get_year_visit = $year_visit->row();
            $data['year_visit'] = $get_year_visit->count_in_year;

            $this->load->view('apps/part/header', $data);
            $this->load->view('apps/part/sidebar');
            $this->load->view('apps/layout/dashboard/dashboard');
            $this->load->view('apps/part/footer');

        }else{
            show_404();
            return FALSE;
        }
    }

}