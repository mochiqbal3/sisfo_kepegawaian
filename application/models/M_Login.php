<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class M_Login extends CI_Model {
        private $_table = 'users';
        private $_table2 = 'user_role';
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
		$this->db->where('username', $username);
        $this->db->join($this->_table2, 'user_role.user_id=users.user_id');
		$query = $this->db->get($this->_table);
		return $query;
	}

    public function roles_user($user_id)
	{
		$this->db->where('user_id', $user_id);
        $this->db->join($this->_table3, 'roles.role_id=user_role.role_id');
		$query = $this->db->get($this->_table2);
		return $query;
	}

    public function get_menu($user_id)
	{
		$this->db->where('user_id', $user_id);
        $this->db->join($this->_table4, 'menu_role.id_menu=menus.id');
		$query = $this->db->get($this->_table5);
		return $query;
	}

	}
?>
