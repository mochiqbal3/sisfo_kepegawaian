<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class M_profile extends CI_Model {
        private $_table = 'users';
        private $_table2 = 'personal_data';
        private $_table3 = 'educational_background';
        
        public function getAll(){
            $this->db->select('users.*, b.name, b.nik');
            $this->db->from($this->_table);
            $this->db->join($this->_table2 . " b",'b.user_id = users.id');
            $query = $this->db->get();
            return $query;
        }

        public function getProfile(){
            $this->db->select('*');
            $this->db->from($this->_table2);
            $query = $this->db->get();
            return $query;
        }
        
        public function getEducation(){
            $this->db->select('*');
            $this->db->from($this->_table3);
            $this->db->where('educational_background.user_id', $this->session->userdata('userId'));
            $query = $this->db->get();
            return $query;
        }

        public function getById($id){
            $this->db->select('*');
            $this->db->from($this->_table);
            $this->db->join($this->_table2 . " b",'b.user_id = users.id');
            // $this->db->join($this->_table3 . " c",'c.user_id = users.id');
            $this->db->where('users.id', $this->session->userdata('userId'));
            $query = $this->db->get();
            return $query->row();
        }

        public function getByIdEducation($id){
            $this->db->select('*');
            $this->db->from($this->_table3);
            $this->db->where('educational_background.id', $id);
            $query = $this->db->get();
            return $query->row();
        }

        public function save($data = array()){
            $result = $this->db->insert($this->_table2, $data);
            $insert_id = $this->db->insert_id();
            return $insert_id;
        }

        public function saveEducation($data = array()){
            $result = $this->db->insert($this->_table3, $data);
            $insert_id = $this->db->insert_id();
            return $insert_id;
        }

        public function savePersonalData($data = array()){
            $result = $this->db->insert($this->_table2, $data);
            $insert_id = $this->db->insert_id();
            return $insert_id;
        }
    
        public function update($data, $id){
            return $this->db->update($this->_table2, $data, array('id'=> $id));
        }
        
        public function updateEdu($data, $id){
            return $this->db->update($this->_table3, $data, array('id'=> $id));
        }

        public function updatePersonal($data, $id){
            return $this->db->update($this->_table2, $data, array('user_id'=> $id));
        }

        public function updateEducation($data, $id){
            return $this->db->update($this->_table3, $data, array('user_id'=> $id));
        }

        public function delete($id){
            $this->db->delete($this->_table2, array('user_id'=> $id));
            return $this->db->delete($this->_table, array('id'=> $id));
        }

        public function deleteEducation($id){
            $this->db->delete($this->_table2, array('user_id'=> $id));
            return $this->db->delete($this->_table, array('id'=> $id));
        }

    }
?>
