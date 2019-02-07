<?php
class M_Dashboard extends CI_Model {
public function count_surat($id_kategori,$id_tahun)
 {
   $this->db->where('id_kategori',$id_kategori);
   $this->db->where('id_tahun',$id_tahun);
   return $this->db->get('tb_surat');
 }

 public function count_disposisi($id_tahun)
 {
   $this->db->where('id_tahun',$id_tahun);
   return $this->db->get('tb_pemberitahuan');
 }

 }
