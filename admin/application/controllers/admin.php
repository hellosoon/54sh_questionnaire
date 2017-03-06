<?php

/**
 * Created by Soon
 * www.so-on.cn
 * Date: 2016/11/13
 * Time: 1:23
 */
class admin extends CI_Controller
{
    public function index()
    {
        $acc = $this->input->post('acc', true);
        $pass = $this->input->post('pass', true);
        if (empty($acc) or empty($pass)) {
            $this->load->view('admin_view');
        } else {
            if ($acc == 'sh' && $pass == 'proadmin') {
                $time = time();
                $data = array(
                    'access' => 'true',
                    'access_time' => $time
                );
                $this->session->set_userdata($data);
                header("location:http://yoururl");
                exit();
            } else {
                $this->load->view('admin_view');
            }
        }
    }
}