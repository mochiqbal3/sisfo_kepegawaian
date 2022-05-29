<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    function __construct(){
		parent::__construct();
		$this->load->model('M_Login');
		$this->load->library('form_validation');
	}

    public function index()
    {
        if(!$this->session->userdata('isLogin')){
            $this->load->view('login');
        }else{
            redirect('dashboard');
        }
    }

    public function login()
    {
        $username = $this->input->post('username');
		$password = $this->input->post('password');
        
        $user = $this->M_Login->validateUser($username);
        if($user->num_rows() > 0)
        {
            // kita ambil isi dari record
            $hasil = $user->row();
            if(password_verify($password, $hasil->password))
            {
                $this->session->set_userdata('isLogin',true);
                $this->session->set_userdata('username',$username);
                $this->session->set_userdata('name',$hasil->name);
                $this->session->set_userdata('userId',$hasil->id);
                redirect('dashboard');
            }else{
                $this->session->set_flashdata('failed','Password tidak sesuai !');
                redirect('auth');
            }

        }else{

            // jika username salah
            $this->session->set_flashdata('failed','Username tidak ditemukan !');
            redirect('auth');

        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth');
    }
    
}
