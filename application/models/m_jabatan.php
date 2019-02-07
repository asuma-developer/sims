<?php
class M_jabatan extends CI_Model {

 public function get_jabatan($id=NULL)
 {
   if ($id==NULL){

   }else {
     $this->db->where('id_jabatan',$id);
   }
   $this->db->where('id_jabatan !=','1');
   return $this->db->get('tb_jabatan');
 }

 public function add_jabatan($data)
 {
   $this->db->insert('tb_jabatan',$data);
 }

 public function del_jabatan($id)
 {
   $this->db->where('id_jabatan',$id);
   $this->db->delete('tb_jabatan');
 }

 public function update_jabatan($id,$data)
 {
   $this->db->where('id_jabatan',$id);
   $this->db->update('tb_jabatan',$data);
 }
 }
