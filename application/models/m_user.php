<?php
class M_user extends CI_Model {

   public function get_user($id=NULL)
   {
     if ($id==NULL){

     } else {
      $this->db->where('id_user',$id);
     }
     $this->db->order_by('id_user','DESC');
     $this->db->join('tb_level as l','l.id_level = u.level');
     $this->db->join('tb_jabatan as j','j.id_jabatan = u.jabatan');
     return $this->db->get('tb_user as u');
   }

   public function get_level($id)
   {
      $this->db->where('id_level',$id);
     $this->db->order_by('id_user','DESC');
     $this->db->join('tb_level as l','l.id_level = u.level');
     $this->db->join('tb_jabatan as j','j.id_jabatan = u.jabatan');
     return $this->db->get('tb_user as u');
   }

   public function add_user($data)
   {
     $this->db->insert('tb_user',$data);
   }

   public function del_user($id)
   {
     $this->db->where('id_user',$id);
     $this->db->delete('tb_user');
   }

   public function update_user($id,$data)
   {
     $this->db->where('id_user',$id);
     $this->db->update('tb_user',$data);
   }

 }
