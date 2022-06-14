<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class M_role extends CI_Model {
        private $_table = 'user_role';
        private $_table2 = 'roles';
        private $_table3 = 'users';
        
        public function getAll(){
            $this->db->select('user_role.*, b.name, c.username');
            $this->db->from($this->_table);
            $this->db->join($this->_table2. " b", 'b.id = user_role.role_id');
            $this->db->join($this->_table3. " c", 'c.id = user_role.user_id');
            $query = $this->db->get();
            return $query;
        }

        public function getAllRole(){
            $this->db->select('*');
            $this->db->from($this->_table2);
            $query = $this->db->get();
            return $query;
        }

        public function getAllUsers(){
            $this->db->select('users.*, username');
            $this->db->from($this->_table3);
            $this->db->join($this->_table. " b", 'b.user_id = users.id');
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
