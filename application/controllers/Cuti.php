<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Cuti extends CI_Controller
{

    function __construct(){
		parent::__construct();
		$this->load->model('M_cuti');
		$this->load->model('M_user');
		$this->load->library('form_validation');
	}

    public function index()
    {
		$data['listcuti'] = $this->M_cuti->getAll();
        $data['content'] = 'cuti/v_cuti';
        $this->load->view('v_template',$data);
    }


	public function form($id=""){
		$data['row'] = $this->M_cuti->getById($id);
		$data['content'] = 'cuti/v_form_cuti';
		$data['users'] = $this->M_cuti->getAllUsers()->result();
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
			$this->session->set_flashdata('success','Data Cuti berhasil ditambahkan');
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
			$this->session->set_flashdata('success','Data Cuti berhasil diedit');
			redirect('cuti');
		}
	}

	public function delete($id)
	{
		$this->M_cuti->delete($id);
		$this->session->set_flashdata('success','Data cuti berhasil dihapus');
		redirect('cuti');
	}
}
