<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Penunjuk_pelatihan extends CI_Controller
{

    function __construct(){
		parent::__construct();
		$this->load->model('M_penunjuk_pelatihan');
		$this->load->model('M_user');
		$this->load->library('form_validation');
	}

    public function index()
    {
		$data['listtraining'] = $this->M_penunjuk_pelatihan->getAll();
        $data['content'] = 'pelatihan/v_penunjuk_pelatihan';
        $data['users'] = $this->M_penunjuk_pelatihan->getAllUsers()->result();
		// echo "<pre>";
		// var_dump(count($liststatusdisetujui));
		// echo "</pre>";
		// exit;
        $this->load->view('v_template',$data);
    }

	public function riwayat()
    {
		$data['listtraining'] = $this->M_penunjuk_pelatihan->getAllRiwayat();
        $data['content'] = 'pelatihan/v_riwayat_penunjukan_pelatihan';
        $this->load->view('v_template',$data);
    }

	public function form($id=""){
		$data['row'] = $this->M_penunjuk_pelatihan->getById($id);
		$data['content'] = 'pelatihan/v_form_penunjukan_pelatihan';
		$data['users'] = $this->M_penunjuk_pelatihan->getAllUsers()->result();
		$this->load->view('v_template', $data);
	}

	public function detail($id=""){
		$data['row'] = $this->M_penunjuk_pelatihan->getById($id);
		$data['content'] = 'pelatihan/v_form_detail_penunjukan';
		$data['users'] = $this->M_penunjuk_pelatihan->getAllUsers()->result();
		$this->load->view('v_template', $data);
	}

	public function save(){
		$id = $this->input->post('id');
		$data = array(
			'user_id' => $this->session->userdata('userId'),
			'training_name' => $this->input->post('training_name'),
			'start_date' => $this->input->post('start_date'),
			'end_date' => $this->input->post('end_date'),
			'certificate_published_date' => $this->input->post('certificate_published_date'),
			'address' => $this->input->post('address'),
			'note' => $this->input->post('note'),
			'flag' => $this->input->post('flag'),
			'determiner_id' => $this->input->post('determiner_id'),

		);
		if($id==''){
			$idUser = $this->M_penunjuk_pelatihan->save($data);
			$dataTraining = array(
				'id' => $idUser,
				'user_id' => $this->session->userdata('userId'),
				'training_name' => $this->input->post('training_name'),
				'start_date' => $this->input->post('start_date'),
				'end_date' => $this->input->post('end_date'),
				'certificate_published_date' => $this->input->post('certificate_published_date'),
				'address' => $this->input->post('address'),
				'note' => $this->input->post('note'),
				'flag' => $this->input->post('flag'),
				'determiner_id' => $this->input->post('determiner_id'),

			);
			$this->session->set_flashdata('success','Penunjukan pelatihan berhasil disimpan');
			redirect('penunjuk_pelatihan');
		}else{
			$this->M_penunjuk_pelatihan->update($data,$id);
			// echo "<pre>";
            // var_dump($var);
            // echo "</pre>";
            // exit;
			$dataTraining = array(
				'id' => $id,
				'user_id' => $this->session->userdata('userId'),
				'training_name' => $this->input->post('training_name'),
				'start_date' => $this->input->post('start_date'),
				'end_date' => $this->input->post('end_date'),
				'certificate_published_date' => $this->input->post('certificate_published_date'),
				'address' => $this->input->post('address'),
				'note' => $this->input->post('note'),
				'flag' => $this->input->post('flag'),
				'determiner_id' => $this->input->post('determiner_id'),
				
			);
			$this->session->set_flashdata('success','Penunjukan pelatihan berhasil diupdate');
			redirect('penunjuk_pelatihan');
		}
	}

	public function delete($id)
	{
		$this->M_penunjuk_pelatihan->delete($id);
		$this->session->set_flashdata('success',' Data cuti berhasil dihapus');
		redirect('Penunjuk_pelatihan');
	}
}
