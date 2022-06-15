<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class M_role extends CI_Model {
        private $_table = 'users';
        private $_table2 = 'roles';
        
        public function getAll(){
            $this->db->select('users.*, b.name');
            $this->db->from($this->_table);
            $this->db->join($this->_table2. " b", 'b.id = users.role_id');
            $query = $this->db->get();
            return $query;
        }

        public function getAllRoles(){
            $this->db->select('*');
            $this->db->from($this->_table2);
            $query = $this->db->get();
            return $query;
        }

        public function getById($id){
            $this->db->select('*');
            $this->db->from($this->_table);
            $this->db->where('users.id', $id);
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

        public function updateAkses($data, $id){
            return $this->db->update($this->_table, $data, array('user_id'=> $id));
        }

        public function delete($id){
            $this->db->delete($this->_table, array('user_id'=> $id));
            return $this->db->delete($this->_table, array('id'=> $id));
        }
	}
?>
