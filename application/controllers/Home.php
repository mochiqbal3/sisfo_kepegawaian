<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function index()
    {
        $data['content'] = 'v_dashboard';
        $this->load->view('v_template',$data);
    }
}
