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
		$data['content'] = 'cuti/v_form_cuti';
		$data['users'] = $this->M_role->getAllUsers()->result();
		$this->load->view('v_template', $data);
	}

	public function save(){
		$id = $this->input->post('id');
		if($id==''){
			$data = array(
			
				'user_id' => $this->session->userdata('userId'),
				// 'name' => $this->input->post('name'),
				'reason' => $this->input->post('reason'),
				'start_date' => $this->input->post('start_date'),
				'end_date' => $this->input->post('end_date'),
				'status' => '1',
				// 'status' => $this->input->post('status'),
				'responsible' => $this->input->post('responsible'),
				
			);
			$idCuti = $this->M_cuti->save($data);
			$this->session->set_flashdata('success',' Data Cuti berhasil ditambahkan');
			redirect('cuti');
		}else{
			$data = array(
			
				'user_id' => $this->session->userdata('userId'),
				// 'name' => $this->input->post('name'),
				'reason' => $this->input->post('reason'),
				'start_date' => $this->input->post('start_date'),
				'end_date' => $this->input->post('end_date'),
				'status' => '1',
				// 'status' => $this->input->post('status'),
				'responsible' => $this->input->post('responsible'),
				
			);
			$this->M_cuti->update($data,$id);
			$this->session->set_flashdata('success',' Data Cuti berhasil diedit');
			redirect('cuti');
		}
	}

	public function approve($id=""){
		$data = array(
			'status' => '2',
		);
		$this->M_cuti->update($data,$id);
		$this->session->set_flashdata('success',' Data cuti disetujui');
		redirect('cuti/approval');
	}

	public function not_approve($id=""){
		$data = array(
			'status' => '3',
		);
		$this->M_cuti->update($data,$id);
		$this->session->set_flashdata('success',' Data cuti tidak disetujui');
		redirect('cuti/approval');
	}

	public function delete($id)
	{
		$this->M_cuti->delete($id);
		$this->session->set_flashdata('success',' Data cuti berhasil dihapus');
		redirect('cuti');
	}
}
