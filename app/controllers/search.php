<?php 
/**
* 
*/
class Search extends CI_Controller
{
    
    function __construct()
    {
          parent::__construct();
        //load model
       $this->load->model(array('apps','web'));
    }

    public function index()
    {
        $limit = 12;
        $this->load->helper('security');
        $keyword = $this->security->xss_clean($_GET['q']);
        $data['keyword'] = strip_tags($keyword);
        $check = strlen(preg_replace('/[^a-zA-Z]/', '', $keyword));
        if(!empty($keyword) && $check > 2)
        {
            $offset = (isset($_GET['page'])) ? $this->security->xss_clean($_GET['page']) : 0 ;
            $total  = $this->web->total_search_buku($keyword);
            //config pagination
            $config['base_url'] = base_url().'search?q='.$keyword;
            $config['total_rows'] = $total;
            $config['per_page'] = $limit;
            $config['page_query_string'] = TRUE;
            $config['use_page_numbers'] = TRUE;
            $config['display_pages']    = TRUE;
            $config['query_string_segment'] = 'page';
            $config['uri_segment']  = 3;
            //instalasi paging
            $this->pagination->initialize($config);

            $data = array(
                'title'         => 'Search Buku' .' - ' .systems('site_title'),
                'keywords'         => systems('keywords'),
                'descriptions'     => systems('descriptions'),
                'data_buku'   => $this->web->search_index_buku(strip_tags($keyword),$limit,$offset),
                'paging'        => $this->pagination->create_links()
            );
            if($data['data_buku'] != NULL)
            {
                $data['buku'] = $data['data_buku'];
            }else{
                $data['buku'] = '';
            }
            //load view with data
            $this->load->view('public/part/header', $data);
            $this->load->view('public/layout/home/search');
            $this->load->view('public/part/footer');
        }else{
            redirect('search/');
        }
    }
}
?>