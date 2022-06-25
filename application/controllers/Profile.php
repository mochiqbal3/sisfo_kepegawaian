<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{

    function __construct(){
		parent::__construct();
		$this->load->model('M_profile');
		$this->load->library('form_validation');
	}

	public function index($id=""){
		$data['row'] = $this->M_profile->getById($this->session->userdata('userId'),);
		$data['content'] = 'user/v_profile';
		$data['profile'] = $this->M_profile->getProfile()->result();
		$this->load->view('v_template', $data);
	}

	public function form_profile($id=""){
		$data['row'] = $this->M_profile->getById($this->session->userdata('userId'),);
		$data['content'] = 'user/v_form_profile';
		$data['profile'] = $this->M_profile->getProfile()->result();
		$this->load->view('v_template', $data);
	}

	public function save(){
		$id = $this->input->post('id');
		$data = array(
			'nik' => $this->input->post('nik'),
			'name' => $this->input->post('name'),
			'birth_place' => $this->input->post('birth_place'),
			'birth_date' => $this->input->post('birth_date'),
			'address' => $this->input->post('address'),
			'married_date' => $this->input->post('married_date'),
				
		);
		if($id==''){
			$idUser = $this->M_profile->save($data);
			$dataPersonal = array(
				'user_id' => $idUser,
				'nik' => $this->input->post('nik'),
				'name' => $this->input->post('name'),
				'birth_place' => $this->input->post('birth_place'),
				'birth_date' => $this->input->post('birth_date'),
				'address' => $this->input->post('address'),
				'married_date' => $this->input->post('married_date'),
				
			);
			$this->M_profile->savePersonalData($dataPersonal);
			$this->session->set_flashdata('success','User berhasil ditambahkan');
			redirect('profile');
		}else{
			$this->M_profile->update($data,$id);
			$dataPersonal = array(
				'user_id' => $idUser,
				'nik' => $this->input->post('nik'),
				'name' => $this->input->post('name'),
				'birth_place' => $this->input->post('birth_place'),
				'birth_date' => $this->input->post('birth_date'),
				'address' => $this->input->post('address'),
				'married_date' => $this->input->post('married_date'),
				
			);
			$this->M_profile->updatePersonal($dataPersonal,$id);
			$this->session->set_flashdata('success','User berhasil diedit');
			redirect('profile');
		}
	}


	public function delete($id)
	{
		$this->M_profile->delete($id);
		$this->session->set_flashdata('success','User berhasil dihapus');
		redirect('user');
	}
}