<?php
class M_surat extends CI_Model {

  public function get_surat($id_kategori=NULL,$id_tahun,$urutan=NULL,$bulan=NULL)
  {
    if ($id_kategori==NULL){

    }else {
      if ($id_kategori==1){
        $this->db->join('tb_kode_disposisi as k','s.id_kode_disposisi = k.id_kode_disposisi');
        $this->db->join('tb_nomor_agenda as n','s.id_surat = n.id_surat');
        $this->db->where('s.id_kategori',$id_kategori);
      } else {
        $this->db->where('s.id_kategori',$id_kategori);
      }
    }
    if ($urutan==NULL){
      $this->db->order_by('s.id_surat','DESC');
    } else {
      $this->db->order_by('s.id_surat',$urutan);
    }
    if ($bulan==NULL){

    }else {
      $this->db->like('s.tanggal_masuk_surat','-'.$bulan.'-');
    }
    $this->db->where('s.id_tahun',$id_tahun);
    return $this->db->get('tb_surat as s');
  }

  public function get_one($id_kategori)
  {
    $this->db->limit(1);
    $this->db->order_by('id_surat','DESC');
    $this->db->where('id_kategori',$id_kategori);
    return $this->db->get('tb_surat');
  }

  public function edit_surat($id)
  {
    $this->db->where('s.id_surat',$id);
    return $this->db->get('tb_surat as s');
  }

  public function dispo_surat($id)
  {
    $this->db->where('s.id_surat',$id);
    $this->db->join('tb_kode_disposisi as k','s.id_kode_disposisi=k.id_kode_disposisi');
    return $this->db->get('tb_surat as s');
  }

  public function add_surat($data)
  {
    $this->db->insert('tb_surat',$data);
  }

  public function del_surat($id)
  {
    $this->db->where('id_surat',$id);
    $this->db->delete('tb_surat');
  }

  public function update_surat($id,$data)
  {
    $this->db->where('id_surat',$id);
    $this->db->update('tb_surat',$data);
  }
 }
