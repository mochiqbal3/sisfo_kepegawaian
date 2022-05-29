<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class M_Login extends CI_Model {
        private $_table = 'users';
        public function validateUser($username){
            return $this->db->get_where($this->_table, [
                'username' => $username
            ]);
        }
	}
?>
