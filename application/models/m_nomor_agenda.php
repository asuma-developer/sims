<?php
class M_nomor_agenda extends CI_Model {

  public function get_nomor_agenda($id_tahun=NULL,$id=NULL)
  {
    if ($id_tahun==null){
    } else {
      $this->db->where('n.id_tahun',$id_tahun);
    }

    if($id==null){

    } else {
      $this->db->where('n.id_kode_disposisi',$id);
    }
    $this->db->join('tb_surat as s','s.id_surat = n.id_surat');
    return $this->db->get('tb_nomor_agenda as n');
  }

  public function get_one($id)
  {
    $this->db->order_by('id_nomor_agenda','DESC');
    $this->db->where('id_surat',$id);
    return $this->db->get('tb_nomor_agenda');
  }

  public function get_one_id($id_kode_disposisi)
  {
    $this->db->limit(1);
    $this->db->order_by('id_nomor_agenda','DESC');
    $this->db->where('id_kode_disposisi',$id_kode_disposisi);
    return $this->db->get('tb_nomor_agenda');
  }

  public function add_nomor_agenda($data2)
  {
    $this->db->insert('tb_nomor_agenda',$data2);
  }

  public function del_nomor_agenda($id)
  {
    $this->db->where('id_nomor_agenda',$id);
    $this->db->delete('tb_nomor_agenda');
  }

  public function update_nomor_agenda($id,$data)
  {
    $this->db->where('id_nomor_agenda',$id);
    $this->db->update('tb_nomor_agenda',$data);
  }
 }
