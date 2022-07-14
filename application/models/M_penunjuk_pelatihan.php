<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class M_penunjuk_pelatihan extends CI_Model {
        private $_table = 'training';
        private $_table2 = 'users';
        private $_table3 = 'personal_data';


        public function getAll(){
            $this->db->select('training.*, b.name, c.name determiner_id');
            $this->db->from($this->_table);
            $this->db->join($this->_table3. " b", 'b.user_id = training.user_id');
            $this->db->join($this->_table3. " c", 'c.user_id = training.determiner_id');
            $this->db->where('training.user_id', $this->session->userdata('userId'));
            $query = $this->db->get();
            return $query;
        }

        public function getAllRiwayat(){
            $this->db->select('training.*, b.name, c.name determiner_id');
            $this->db->from($this->_table);
            $this->db->join($this->_table3. " b", 'b.user_id = training.user_id');
            $this->db->join($this->_table3. " c", 'c.user_id = training.determiner_id');
            $query = $this->db->get();
            return $query;
        }

        public function getAllUsers(){
            $this->db->select('users.*, b.name');
            $this->db->from($this->_table2);
            $this->db->join($this->_table3. " b", 'b.user_id = users.id');
            $query = $this->db->get();
            return $query;
        }

        public function getById($id){
            $this->db->select('*');
            $this->db->from($this->_table);
            $this->db->where('training.id', $id);
            $query = $this->db->get();
            return $query->row();
        }

        public function save($data = array()){
            $result = $this->db->insert($this->_table, $data);
            $insert_id = $this->db->insert_id();
            return $insert_id;
        }

        public function update($data, $id){
            return $this->db->update($this->_table, $data, array('id'=> $id));
        }

        public function delete($id){
            return $this->db->delete($this->_table, array('id'=> $id));
        }
	}
?>
