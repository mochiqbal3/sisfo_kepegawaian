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

	public function riwayat()
    {
		$data['listcuti'] = $this->M_cuti->getAllRiwayatCuti();
        $data['content'] = 'cuti/v_riwayat_cuti';
        $this->load->view('v_template',$data);
    }

	public function approval()
    {
		$data['listcuti'] = $this->M_cuti->getByStatus(1);
        $data['content'] = 'cuti/v_approve_cuti';
        $this->load->view('v_template',$data);
    }

	public function form($id=""){
		$data['row'] = $this->M_cuti->getById($id);
		$data['content'] = 'cuti/v_form_cuti';
		$data['users'] = $this->M_cuti->getAllUsers()->result();
		$data['jenis_cuti'] = $this->M_cuti->getAllCuti()->result();
		$listCuti = $this->M_cuti->getAll()->result();
		$daydiff = 0;
		foreach($listCuti as $rowCuti){
			$a = strtotime($rowCuti->start_date);
			$b = strtotime($rowCuti->end_date);
			$datediff = ($b - $a);
			$daydiff += round($datediff / (60 * 60 * 24) )+ 1;
		}
		// echo "<pre>";
		$found_key = array_search('Cuti Tahunan', array_column($data['jenis_cuti'], 'nama_cuti'));
		// var_dump($found_key);
		// echo "</pre>";
		// exit;
		if($daydiff>=12){
			array_splice($data['jenis_cuti'],$found_key,1);
		}
		$this->load->view('v_template', $data);
	}

	public function save(){
		$id = $this->input->post('id');
		$a = strtotime($this->input->post('start_date'));
		$b = strtotime($this->input->post('end_date'));
		$datediff = ($b - $a);
		$daydiff += round($datediff / (60 * 60 * 24) )+ 1;
		if($daydiff <= 12) {
			if($id==''){
				$data = array(
				
					'user_id' => $this->session->userdata('userId'),
					// 'name' => $this->input->post('name'),
					'reason' => $this->input->post('reason'),
					'jenis_cuti_id' => $this->input->post('jenis_cuti_id'),
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
					'jenis_cuti_id' => $this->input->post('jenis_cuti_id'),
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
		else{
			$this->session->set_flashdata('warning',' Satus Cuti yang dipilih lebih dari 12 hari');
				redirect('cuti/form');
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
