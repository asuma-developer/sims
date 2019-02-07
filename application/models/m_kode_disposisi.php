<?php
class M_kode_disposisi extends CI_Model {

 public function get_kode_disposisi($id=NULL)
 {
   if ($id==NULL){

   }else {
     $this->db->where('id_kode_disposisi',$id);
   }
   return $this->db->get('tb_kode_disposisi');
 }

 public function add_kode_disposisi($data)
 {
   $this->db->insert('tb_kode_disposisi',$data);
 }

 public function del_kode_disposisi($id)
 {
   $this->db->where('id_kode_disposisi',$id);
   $this->db->delete('tb_kode_disposisi');
 }

 public function update_kode_disposisi($id,$data)
 {
   $this->db->where('id_kode_disposisi',$id);
   $this->db->update('tb_kode_disposisi',$data);
 }
 }
