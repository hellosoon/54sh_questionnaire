<?php

class problem extends CI_Controller
{
	 
    public function __construct()
    {
        parent::__construct();

        if (!isset($this->session->access) || $this->session->access == '' || ((time() - $this->session->access_time) > 3600)) {
            header("location:http://your_url_for_admin");
            exit();
        }
		  $this->load->library('typography');
    }

    public function index()
    {
		$arr =  $this->db->query('SELECT * FROM `your_table_name`')->result_array();
        $data = array(
			'sqlLogRes' => $arr
        );
		$this->load->view('problem_view', $data);
    }

}