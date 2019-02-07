<?php
class M_Disposisi extends CI_Model {

 public function get_pemberitahuan($id_tahun,$id=NULL,$urutan=NULL,$bulan=NULL)
 {
   $this->db->where('p.id_tahun',$id_tahun);

   if ($id==NULL){

   }else {
     $this->db->where('p.id_pemberitahuan',$id);
   }


   if ($urutan==NULL){
     $this->db->order_by('p.id_pemberitahuan','DESC');
   } else {
     $this->db->order_by('p.id_pemberitahuan',$urutan);
   }

   if ($bulan==NULL){

   } else {
     $this->db->like('p.tanggal','-'.$bulan.'-');
   }
   $this->db->join('tb_surat as s','p.id_surat=s.id_surat');
   $this->db->join('tb_nomor_agenda as n','p.id_nomor_agenda=n.id_nomor_agenda');
   $this->db->join('tb_kode_disposisi as k','n.id_kode_disposisi=k.id_kode_disposisi');
   $this->db->join('tb_sifat as f','p.id_sifat=f.id_sifat');
   $this->db->join('tb_user as u','p.id_pengirim=u.id_user');
   return $this->db->get('tb_pemberitahuan as p');
 }

 public function get_surat_disposisi($id_tahun,$id_kategori)
 {
   return $this->db->query('SELECT * FROM tb_surat
	                          WHERE id_tahun = '.$id_tahun.' AND id_kategori = '.$id_kategori. ' AND id_surat NOT IN (
	                          SELECT id_surat FROM tb_pemberitahuan);');
 }

 public function get_user_disposisi($id)
 {
  return $this->db->query('SELECT * FROM tb_user as u
                            JOIN tb_jabatan as j ON u.jabatan = j.id_jabatan
                            WHERE id_user NOT IN (SELECT id_penerima FROM pemberitahuan_surat
                            WHERE id_pemberitahuan ='.$id.');');
 }

 public function get_id($id_pemberitahuan=NULL)
 {
   if ($id_pemberitahuan==NULL) {
     $this->db->limit(1);
     $this->db->order_by('id_pemberitahuan','DESC');
   } else {
     $this->db->where('id_pemberitahuan',$id_pemberitahuan);
   }
   return $this->db->get('tb_pemberitahuan');
 }

 public function add_pemberitahuan($data)
 {
   $this->db->insert('tb_pemberitahuan',$data);
 }

 public function del_pemberitahuan($id_pemberitahuan)
 {
   $this->db->where('id_pemberitahuan',$id_pemberitahuan);
   $this->db->delete('tb_pemberitahuan');
 }

 public function update_pemberitahuan($id_pemberitahuan,$data)
 {
   $this->db->where('id_pemberitahuan',$id_pemberitahuan);
   $this->db->update('tb_pemberitahuan',$data);
 }

 //Ini batas untuk tabel penghubung//
 public function get_pemberitahuan_surat($id)
 {
    $this->db->where('ps.id_pemberitahuan',$id);
   $this->db->join('tb_pemberitahuan as p','ps.id_pemberitahuan=p.id_pemberitahuan');
   $this->db->join('tb_user as u','ps.id_penerima=u.id_user');
   return $this->db->get('pemberitahuan_surat as ps');
 }

 public function get_detail_one($id_balasan)
 {
   $this->db->where('ps.id_balasan',$id_balasan);
   $this->db->join('tb_pemberitahuan as p','ps.id_pemberitahuan=p.id_pemberitahuan');
   $this->db->join('tb_user as u','ps.id_penerima=u.id_user');
   return $this->db->get('pemberitahuan_surat as ps');
 }

 public function update_pemberitahuan_surat($id_balasan,$data)
 {
   $this->db->where('id_balasan',$id_balasan);
   $this->db->update('pemberitahuan_surat',$data);
 }

 public function add_relasi($data2)
 {
   $this->db->insert('pemberitahuan_surat',$data2);
 }

 public function del_user_relasi($id_balasan){
   $this->db->where('id_balasan',$id_balasan);
   $this->db->delete('pemberitahuan_surat');
 }

 public function update_relasi($id_pemberitahuan,$data2)
 {
   $this->db->where('id_pemberitahuan',$id_pemberitahuan);
   $this->db->insert('pemberitahuan_surat',$data2);
 }

//ini untuk model surat saya//
public function get_surat_saya($id_penerima)
{
    $this->db->where('ps.id_penerima',$id_penerima);
    $this->db->order_by('ps.id_balasan','DESC');
    $this->db->join('tb_pemberitahuan as p','ps.id_pemberitahuan=p.id_pemberitahuan');
    $this->db->join('tb_surat as s','p.id_surat=s.id_surat');
    $this->db->join('tb_nomor_agenda as n','p.id_nomor_agenda = n.id_nomor_agenda');
    $this->db->join('tb_kode_disposisi as k','n.id_kode_disposisi = k.id_kode_disposisi');
    $this->db->join('tb_sifat as f','p.id_sifat = f.id_sifat');
    return $this->db->get('pemberitahuan_surat as ps');
}
}
