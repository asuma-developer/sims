<?php
class M_login extends CI_Model {
public function login($data)
 {
   $this->db->where('nip',$data['nip']);
   $this->db->where('password',$data['password']);
   return $this->db->get('tb_user');
 }

 }
