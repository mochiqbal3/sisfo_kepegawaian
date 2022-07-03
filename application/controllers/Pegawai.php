<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pegawai extends CI_Controller
{

    function __construct(){
		parent::__construct();
		$this->load->model('M_profile');
		$this->load->model('M_user');
		$this->load->library('form_validation');
	}

    public function index()
    {
		$data['listpegawai'] = $this->M_user->getAllPegawai();
        $data['content'] = 'pegawai/v_pegawai';
        $this->load->view('v_template',$data);
    }

	//PROFILE
	public function profile($id=""){
		$data['row'] = $this->M_profile->getByIdProfilePegawai($id);
		$data['content'] = 'pegawai/v_profile';
		$data['listuser'] = $this->M_user->getAll();
		$data['profile'] = $this->M_profile->getProfile()->result();
		$this->load->view('v_template', $data);
	}

	//EDUCATION
	public function education($id=""){
		$data['row'] = $this->M_profile->getByIdProfilePegawai($id);
		$data['content'] = 'pegawai/v_education';
		$data['listuser'] = $this->M_user->getAll();
		$data['listeducation'] = $this->M_profile->getEducationByUserId($id);
		$data['education'] = $this->M_profile->getEducation()->result();
		$this->load->view('v_template', $data);
	}

	//FAMILY_MEMBER
	public function family($id=""){
		$data['row'] = $this->M_profile->getByIdProfilePegawai($id);
		$data['content'] = 'pegawai/v_family';
		$data['listuser'] = $this->M_user->getAll();
		$data['listfamily'] = $this->M_profile->getFamilyByUserId($id);
		$data['family'] = $this->M_profile->getFamily()->result();
		$this->load->view('v_template', $data);
	}

}
