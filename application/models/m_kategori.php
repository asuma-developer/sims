<?php
class M_kategori extends CI_Model {

 public function get_kategori($id=NULL)
 {
   if ($id==NULL){

   }else {
     $this->db->where('id_kategori',$id);
   }
   return $this->db->get('tb_kategori');
 }

 public function add_kategori($data)
 {
   $this->db->insert('tb_kategori',$data);
 }

 public function del_kategori($id)
 {
   $this->db->where('id_kategori',$id);
   $this->db->delete('tb_kategori');
 }

 public function update_kategori($id,$data)
 {
   $this->db->where('id_kategori',$id);
   $this->db->update('tb_kategori',$data);
 }
 }
