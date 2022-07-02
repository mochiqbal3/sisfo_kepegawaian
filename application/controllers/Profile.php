<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{

    function __construct(){
		parent::__construct();
		$this->load->model('M_profile');
		$this->load->model('M_user');
		$this->load->library('form_validation');
	}

	public function index($id=""){
		$data['row'] = $this->M_profile->getById($this->session->userdata('userId'),);
		$data['content'] = 'user/v_profile';
		$data['listuser'] = $this->M_user->getAll();
		$data['profile'] = $this->M_profile->getProfile()->result();
		$this->load->view('v_template', $data);
	}

	public function form_profile($id=""){
		$data['row'] = $this->M_profile->getById($this->session->userdata('userId'),);
		$data['content'] = 'user/v_form_profile';
		$data['listuser'] = $this->M_user->getAll();
		$data['listeducation'] = $this->M_profile->getEducation();
		$data['profile'] = $this->M_profile->getProfile()->result();
		$this->load->view('v_template', $data);
	}
	
	public function form_education($id=""){
		$data['row'] = $this->M_profile->getByIdEducation($id);
		$data['content'] = 'user/v_form_education';
		$data['listuser'] = $this->M_user->getAll();
		$data['education'] = $this->M_profile->getEducation()->result();
		$this->load->view('v_template', $data);
	}

	public function education($id=""){
		$data['row'] = $this->M_profile->getByIdEducation($this->session->userdata('userId'),);
		$data['content'] = 'user/v_education';
		$data['listuser'] = $this->M_user->getAll();
		$data['listeducation'] = $this->M_profile->getEducation();
		$data['education'] = $this->M_profile->getEducation()->result();
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

	public function saveEducation(){
		$id = $this->input->post('id');
		$data = array(
			'user_id' => $this->session->userdata('userId'),
			'school_name' => $this->input->post('school_name'),
			'principal' => $this->input->post('principal'),
			'start_date' => $this->input->post('start_place'),
			'end_date' => $this->input->post('end_date'),
			'certificate_published_date' => $this->input->post('certificate_published_date'),
			'school_address' => $this->input->post('school_address'),
			'flag' => $this->input->post('flag'),
				
		);
		if($id==''){
			$idUser = $this->M_profile->saveEducation($data);
			$dataEducation = array(
				'user_id' => $this->session->userdata('userId'),
				'school_name' => $this->input->post('school_name'),
				'principal' => $this->input->post('principal'),
				'start_date' => $this->input->post('start_place'),
				'end_date' => $this->input->post('end_date'),
				'certificate_published_date' => $this->input->post('certificate_published_date'),
				'school_address' => $this->input->post('school_address'),
				'flag' => $this->input->post('flag'),
			);
			$this->session->set_flashdata('success','User berhasil ditambahkan');
			redirect('profile/education');
		}else{
			$this->M_profile->updateEdu($data,$id);
			$dataEducation = array(
				'user_id' => $this->session->userdata('userId'),
				'school_name' => $this->input->post('school_name'),
				'principal' => $this->input->post('principal'),
				'start_date' => $this->input->post('start_place'),
				'end_date' => $this->input->post('end_date'),
				'certificate_published_date' => $this->input->post('certificate_published_date'),
				'school_address' => $this->input->post('school_address'),
				'flag' => $this->input->post('flag'),
				
			);
			$this->M_profile->updateEducation($dataEducation,$id);
			$this->session->set_flashdata('success','User berhasil diedit');
			redirect('profile/education');
		}
	}

	public function deleteEducation($id)
	{
		$this->M_profile->deleteEducation($id);
		$this->session->set_flashdata('success','User berhasil dihapus');
		redirect('user');
	}

	public function delete($id)
	{
		$this->M_profile->delete($id);
		$this->session->set_flashdata('success','User berhasil dihapus');
		redirect('user');
	}
}
