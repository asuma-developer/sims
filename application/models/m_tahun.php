<?php
class M_tahun extends CI_Model {

 public function get_tahun($id=NULL)
 {
   if ($id==NULL){

   }else {
     $this->db->where('id_tahun',$id);
   }
   return $this->db->get('tb_tahun');
 }

 public function get_id_tahun($tahun)
 {
   $this->db->where('tahun',$tahun);
   return $this->db->get('tb_tahun');
 }

 public function add_tahun($data)
 {
   $this->db->insert('tb_tahun',$data);
 }

 public function del_tahun($id)
 {
   $this->db->where('id_tahun',$id);
   $this->db->delete('tb_tahun');
 }

 public function update_tahun($id,$data)
 {
   $this->db->where('id_tahun',$id);
   $this->db->update('tb_tahun',$data);
 }
 }
