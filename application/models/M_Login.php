<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class M_Login extends CI_Model {
        private $_table = 'users';
        private $_table2 = 'personal_data';
        private $_table3 = 'roles';
        private $_table4 = 'menu_role';
        private $_table5 = 'menus';

        public function validateUser($username){
            return $this->db->get_where($this->_table, [
                'username' => $username
            ]);
        }

        public function login($username)
	{
        $this->db->select('users.*, b.name, b.nik');
        $this->db->from($this->_table);
        $this->db->join($this->_table2 . ' b', 'b.user_id=users.id');
		$this->db->where('username', $username);
		$query = $this->db->get();
		return $query;
	}

	}
?>
