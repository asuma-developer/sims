<?php
class M_level extends CI_Model {

  public function get_level($id=NULL)
  {
    if ($id==NULL){

    }else {
      $this->db->where('id_level',$id);
    }
    return $this->db->get('tb_level');
  }

  public function add_level($data)
  {
    $this->db->insert('tb_level',$data);
  }

  public function del_level($id)
  {
    $this->db->where('id_level',$id);
    $this->db->delete('tb_level');
  }

  public function update_level($id,$data)
  {
    $this->db->where('id_level',$id);
    $this->db->update('tb_level',$data);
  }
 }
