<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    function __construct(){
		parent::__construct();
		$this->load->model('M_user');
		$this->load->library('form_validation');
	}

    public function index()
    {
		$data['listuser'] = $this->M_user->getAll();
        $data['content'] = 'user/v_user';
        $this->load->view('v_template',$data);
    }

	public function form($id=""){
		$data['row'] = $this->M_user->getById($id);
		$data['content'] = 'user/v_form_user';
		$data['roles'] = $this->M_user->getAllRoles()->result();
		$this->load->view('v_template', $data);
	}

	public function profile($id=""){
		$data['row'] = $this->M_user->getById($this->session->userdata('userId'),);
		$data['content'] = 'user/v_profile';
		$data['profile'] = $this->M_user->getProfile()->result();
		$this->load->view('v_template', $data);
	}

	public function form_profile($id=""){
		$data['row'] = $this->M_user->getById($this->session->userdata('userId'),);
		$data['content'] = 'user/v_form_profile';
		$data['profile'] = $this->M_user->getProfile()->result();
		$this->load->view('v_template', $data);
	}

	public function save(){
		$id = $this->input->post('id');
		$data = array(
			'username' => $this->input->post('username'),
			'password' => password_hash($this->input->post('password'),PASSWORD_DEFAULT),
			'role_id' => $this->input->post('role_id'),

		);
		if($id==''){
			$idUser = $this->M_user->save($data);
			$dataPersonal = array(
				'user_id' => $idUser,
				'nik' => $this->input->post('nik'),
				'name' => $this->input->post('name'),

				

			);
			$this->M_user->savePersonalData($dataPersonal);
			$this->session->set_flashdata('success','User berhasil ditambahkan');
			redirect('user');
		}else{
			$this->M_user->update($data,$id);
			$dataPersonal = array(
				'user_id' => $idUser,
				'nik' => $this->input->post('nik'),
				'name' => $this->input->post('name'),
				
			);
			$this->M_user->updatePersonal($dataPersonal,$id);
			$this->session->set_flashdata('success','User berhasil diedit');
			redirect('user');
		}
	}


	public function saveProfile(){
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
			$idUser = $this->M_user->savePersonalData($data);
			$dataPersonal = array(
				'user_id' => $idUser,
				'nik' => $this->input->post('nik'),
				'name' => $this->input->post('name'),
				'birth_place' => $this->input->post('birth_place'),
				'birth_date' => $this->input->post('birth_date'),
				'address' => $this->input->post('address'),
				'married_date' => $this->input->post('married_date'),
				
			);
			$this->M_user->savePersonalData($dataPersonal);
			$this->session->set_flashdata('success','User berhasil ditambahkan');
			redirect('user/profile');
		}else{
			$this->M_user->updatePersonal($data,$id);
			$dataPersonal = array(
				'user_id' => $idUser,
				'nik' => $this->input->post('nik'),
				'name' => $this->input->post('name'),
				'birth_place' => $this->input->post('birth_place'),
				'birth_date' => $this->input->post('birth_date'),
				'address' => $this->input->post('address'),
				'married_date' => $this->input->post('married_date'),
				
			);
			$this->M_user->updatePersonal($dataPersonal,$id);
			$this->session->set_flashdata('success','User berhasil diedit');
			redirect('user/profile');
		}
	}


	public function delete($id)
	{
		$this->M_user->delete($id);
		$this->session->set_flashdata('success','User berhasil dihapus');
		redirect('user');
	}
}
