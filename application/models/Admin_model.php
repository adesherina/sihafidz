<?php

class Admin_model extends CI_Model
{
    private $_table = "admin";

    public function doLogin(){
		$post = $this->input->post();

        // cari user berdasarkan email dan username
        $this->db->where('username', $post["username"]);
        $admin = $this->db->get($this->_table)->row();

        // jika user terdaftar
        if($admin){
            // periksa password-nya
            $isPasswordTrue = password_verify($post["password"], $admin->password);
        
            // jika password benar dan dia admin
            if($isPasswordTrue){ 
                // login sukses yay!
                $this->session->set_userdata(['user_logged' => $admin]);
                $this->_updateLastLogin($admin->id_admin);
                return true;
            }
        }
        
        // login gagal
		return false;
    }

    public function isNotLogin(){
        return $this->session->userdata('user_logged') === null;
    }

    private function _updateLastLogin($id_admin){
        $sql = "UPDATE {$this->_table} SET last_login=now() WHERE id_admin={$id_admin}";
        $this->db->query($sql);
    }

}