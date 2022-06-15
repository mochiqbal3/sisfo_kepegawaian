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

	public function save(){
		$id = $this->input->post('id');
		$data = array(
			'username' => $this->input->post('username'),
			'password' => password_hash("p@55word",PASSWORD_DEFAULT),
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
				'user_id' => $id,
				'nik' => $this->input->post('nik'),
				'name' => $this->input->post('name'),
				
			);
			$this->M_user->updatePersonal($dataPersonal,$id);
			$this->session->set_flashdata('success','User berhasil diedit');
			redirect('user');
		}
	}

	public function delete($id)
	{
		$this->M_user->delete($id);
		$this->session->set_flashdata('success','User berhasil dihapus');
		redirect('user');
	}
}
