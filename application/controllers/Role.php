<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Role extends CI_Controller
{

    function __construct(){
		parent::__construct();
		$this->load->model('M_role');
		$this->load->model('M_user');
		$this->load->library('form_validation');
	}

    public function index()
    {
		$data['listrole'] = $this->M_role->getAll();
        $data['content'] = 'role/v_role';
        $this->load->view('v_template',$data);
    }

	public function form($id=""){
		$data['row'] = $this->M_role->getById($id);
		$data['content'] = 'role/v_form_role';
		$data['users'] = $this->M_role->getAll()->result();
		$data['roles'] = $this->M_role->getAllRoles()->result();
		$this->load->view('v_template', $data);
	}

	public function save(){
		$id = $this->input->post('id');
		if($id==''){
			$data = array(
			
				'role_id' => $this->input->post('role_id'),
				
			);
			$idRole = $this->M_role->save($data);
			$this->session->set_flashdata('Success',' Hak Akses berhasil tersimpan');
			redirect('role');
		}else{
			$data = array(
			
				'role_id' => $this->input->post('role_id'),
				
			);
			$this->M_role->update($data,$id);
			$this->session->set_flashdata('Success',' Hak Akses berhasil terupdate');
			redirect('role');
		}
	}

	public function delete($id)
	{
		$this->M_role->delete($id);
		$this->session->set_flashdata('Success',' Hak Akses berhasil dihapus');
		redirect('role');
	}
}
