<?php
class M_sifat extends CI_Model {

 public function get_sifat($id=NULL)
 {
   if ($id==NULL){

   }else {
     $this->db->where('id_sifat',$id);
   }
   return $this->db->get('tb_sifat');
 }

 public function add_sifat($data)
 {
   $this->db->insert('tb_sifat',$data);
 }

 public function del_sifat($id)
 {
   $this->db->where('id_sifat',$id);
   $this->db->delete('tb_sifat');
 }

 public function update_sifat($id,$data)
 {
   $this->db->where('id_sifat',$id);
   $this->db->update('tb_sifat',$data);
 }
 }
