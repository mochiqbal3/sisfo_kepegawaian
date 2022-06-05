<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class M_cuti extends CI_Model {
        private $_table = 'leave';
        private $_table2 = 'users';
        private $_table3 = 'personal_data';
        
        public function getAll(){
            $this->db->select('leave.*, b.name, c.name pengaju');
            $this->db->from($this->_table);
            $this->db->join($this->_table3. " b", 'b.user_id = leave.user_id');
            $this->db->join($this->_table3. " c", 'c.user_id = leave.user_id');
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

        public function getByStatus($status){
            $this->db->select('leave.*, b.name, c.name pengaju');
            $this->db->from($this->_table);
            $this->db->join($this->_table3. " b", 'b.user_id = leave.user_id');
            $this->db->join($this->_table3. " c", 'c.user_id = leave.user_id');
            $this->db->where('leave.status', $status);
            $query = $this->db->get();
            return $query;
        }

        public function getById($id){
            $this->db->select('*');
            $this->db->from($this->_table);
            // $this->db->join($this->_table2. " b", 'b.user_id = leave.user_id');
            $this->db->where('leave.id', $id);
            $query = $this->db->get();
            return $query->row();
        }

        public function save($data = array()){
            $result = $this->db->insert($this->_table, $data);
            $insert_id = $this->db->insert_id();
            return $insert_id;
        }

        public function approve($data, $id){
            return $this->db->update($this->_table, $data, array('id'=> $id));
        }

        public function not_approve($data, $id){
            return $this->db->update($this->_table, $data, array('id'=> $id));
        }

        public function update($data, $id){
            return $this->db->update($this->_table, $data, array('id'=> $id));
        }

        public function updateCuti($data, $id){
            return $this->db->update($this->_table, $data, array('user_id'=> $id));
        }

        public function delete($id){
            $this->db->delete($this->_table, array('user_id'=> $id));
            return $this->db->delete($this->_table, array('id'=> $id));
        }
	}
?>
