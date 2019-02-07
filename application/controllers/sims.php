<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sims extends CI_Controller {
  public function __construct(){/
	parent::__construct();
  $this->load->library('template');
}
	public function index()
	{
    $data['tahun'] = $this->m_tahun->get_tahun()->result_array();
		$this->load->view('login',$data);
	}

  public function login()
	{
		$data = array (
		'nip' => $this->input->post('nip',TRUE),
		'password' => md5($this->input->post('password',TRUE)),
	);
	$hasil = $this->m_login->login($data);
	if (count($hasil->result()) == 1) {
		foreach($hasil->result() as $h){
			$h_data['logged_id'] = 'Sudah login';
			$h_data['id_user'] = $h->id_user;
			$h_data['nip'] = $h->nip;
			$h_data['fullname'] = $h->fullname;
			$h_data['email'] = $h->email;
			$h_data['password'] = $h->password;
			$h_data['jabatan'] = $h->jabatan;
      $h_data['alamat'] = $h->alamat;
      $h_data['level'] = $h->level;
      $h_data['id_tahun'] = $this->input->post('id_tahun');
      $h_data['tahun'] = date('Y');
			$this->session->set_userdata($h_data);
		}
    redirect('sims/home');
  }

	else {
    $this->session->set_flashdata('alert','Maaf fullname atau password anda salah');
		redirect('sims/index');
	}
	}

  public function email($email,$subject,$message)
    {
      $ci = get_instance();
        $ci->load->library('email');
        $config['protocol'] = "smtp";
        $config['smtp_host'] = "ssl://smtp.gmail.com";
        $config['smtp_port'] = "465";
        $config['smtp_user'] = "files.anggi@gmail.com";
        $config['smtp_pass'] = "anggi28091996";
        $config['charset'] = "utf-8";
        $config['mailtype'] = "html";
        $config['newline'] = "\r\n";
        
        
        $ci->email->initialize($config);
 
        $ci->email->from('yerezqybagus@gmail.com', 'Pemberitahuan Disposisi');
        $ci->email->to($email);
        $ci->email->subject($subject);
        $ci->email->message($message);
        return $this->email->send();
    }

  public function home()
  {
    $id_tahun = $_SESSION['id_tahun'];
    $id_kategori1 = 1;
    $id_kategori2 = 2;
    $data['surat_masuk'] = $this->m_dashboard->count_surat($id_kategori1,$id_tahun)->result_array();
    $data['surat_keluar'] = $this->m_dashboard->count_surat($id_kategori2,$id_tahun)->result_array();
    $data['user'] = $this->m_user->get_user()->result_array();
    $data['disposisi'] = $this->m_dashboard->count_disposisi($id_tahun)->result_array();
    $this->template->load('index','contents',$data);
  }

  public function chpassword()
  {
    $id = $_SESSION['id_user'];
    $data['password'] = md5($this->input->post('new_password'));
    $hasil = $this->m_user->update_user($id,$data);
   if ($hasil == 0){
      $this->session->set_flashdata('alert','Ganti Password berhasil');
      redirect('sims/home');
    } else {
      $this->session->set_flashdata('alert','Ganti Password Gagal');
      redirect('sims/home');
    }
  }

  public function logout()
	{
		$this->session->userdata('nip');
		$this->session->userdata('level');
		session_destroy();
		redirect('sims/index');
	}

  public function user()
  {
    $data['user'] = $this->m_user->get_user()->result_array();
    $data['jabatan'] = $this->m_jabatan->get_jabatan()->result_array();
    $data['level'] = $this->m_level->get_level()->result_array();
    $this->template->load('index','user',$data);
  }

  public function adduser()
  {
    $data['nip'] = $this->input->post('nip');
    $data['fullname'] = $this->input->post('fullname');
    $data['password'] = md5($this->input->post('password'));
    $data['jabatan'] = $this->input->post('jabatan');
    $data['alamat'] = $this->input->post('alamat');
    $data['email'] = $this->input->post('email');
    $data['level'] = $this->input->post('level');
    $hasil = $this->m_user->add_user($data);
    if ($hasil == 0){
      $this->session->set_flashdata('alert','Input Data User berhasil');
  		redirect('sims/user');
    } else {
      $this->session->set_flashdata('alert','Input Data User Gagal');
      redirect('sims/user');
    }
  }

  public function deluser()
  {
    $id = $this->uri->segment(3);
    $hasil = $this->m_user->del_user($id);
    if ($hasil == 0){
      $this->session->set_flashdata('alert','Hapus Data User berhasil');
  		redirect('sims/user');
    } else {
      $this->session->set_flashdata('alert','Hapus Data User Gagal');
      redirect('sims/user');
    }
  }

  public function edituser()
  {
    $id = $this->uri->segment(3);
    $data['jabatan'] = $this->m_jabatan->get_jabatan()->result_array();
    $data['level'] = $this->m_level->get_level()->result_array();
    $data['user'] = $this->m_user->get_user($id)->row();
    $this->template->load('index','edit_user',$data);
  }

  public function updateuser()
  {
    $id = $this->input->post('id_user');
    $data['nip'] = $this->input->post('nip');
    $data['fullname'] = $this->input->post('fullname');
    $data['jabatan'] = $this->input->post('jabatan');
    $data['alamat'] = $this->input->post('alamat');
    $data['email'] = $this->input->post('email');
    $data['level'] = $this->input->post('level');
    $hasil = $this->m_user->update_user($id,$data);
    if ($hasil == 0){
      $this->session->set_flashdata('alert','Update Data User berhasil');
      redirect('sims/user');
    } else {
      $this->session->set_flashdata('alert','Update Data User Gagal');
      redirect('sims/user');
    }
  }

  public function tahun()
  {
    $data['tahun'] = $this->m_tahun->get_tahun()->result_array();
    $this->template->load('index','tahun',$data);
  }

  public function addtahun()
  {
    $data['tahun'] = $this->input->post('tahun');
    $data['nama_tahun'] = "Tahun Ajaran " . $this->input->post('tahun') . "/" . ($this->input->post('tahun')+1);
    $hasil = $this->m_tahun->add_tahun($data);
    if ($hasil == 0){
      $this->session->set_flashdata('alert','Input Data Tahun berhasil');
  		redirect('sims/tahun');
    } else {
      $this->session->set_flashdata('alert','Input Data Tahun Gagal');
      redirect('sims/tahun');
    }
  }

  public function deltahun()
  {
    $id = $this->uri->segment(3);
    $hasil = $this->m_tahun->del_tahun($id);
    if ($hasil == 0){
      $this->session->set_flashdata('alert','Hapus Data Tahun berhasil');
  		redirect('sims/tahun');
    } else {
      $this->session->set_flashdata('alert','Hapus Data Tahun Gagal');
      redirect('sims/tahun');
    }
  }

  public function edittahun()
  {
    $id = $this->uri->segment(3);
    $data['tahun'] = $this->m_tahun->get_tahun($id)->row();
    $this->template->load('index','edit_tahun',$data);
  }

  public function updatetahun()
  {
    $id = $this->input->post('id_tahun');
    $data['tahun'] = $this->input->post('tahun');
    $data['nama_tahun'] = $this->input->post('nama_tahun');
    $hasil = $this->m_tahun->update_tahun($id,$data);
    if ($hasil == 0){
      $this->session->set_flashdata('alert','Update Data Tahun berhasil');
  		redirect('sims/tahun');
    } else {
      $this->session->set_flashdata('alert','Update Data Tahun Gagal');
      redirect('sims/tahun');
    }
  }

  public function jabatan()
  {
    $data['jabatan'] = $this->m_jabatan->get_jabatan()->result_array();
    $this->template->load('index','jabatan',$data);
  }

  public function addjabatan()
  {
    $data['nama_jabatan'] = $this->input->post('nama_jabatan');
    $hasil = $this->m_jabatan->add_jabatan($data);
    if ($hasil == 0){
      $this->session->set_flashdata('alert','Input Data Jabatan berhasil');
      redirect('sims/jabatan');
    } else {
      $this->session->set_flashdata('alert','Input Data Jabatan Gagal');
      redirect('sims/jabatan');
    }
  }

  public function deljabatan()
  {
    $id = $this->uri->segment(3);
    $hasil = $this->m_jabatan->del_jabatan($id);
    if ($hasil == 0){
      $this->session->set_flashdata('alert','Hapus Data Jabatan berhasil');
      redirect('sims/jabatan');
    } else {
      $this->session->set_flashdata('alert','Hapus Data Jabatan Gagal');
      redirect('sims/jabatan');
    }
  }

  public function editjabatan()
  {
    $id = $this->uri->segment(3);
    $data['jabatan'] = $this->m_jabatan->get_jabatan($id)->row();
    $this->template->load('index','edit_jabatan',$data);
  }

  public function updatejabatan()
  {
    $id = $this->input->post('id_jabatan');
    $data['nama_jabatan'] = $this->input->post('nama_jabatan');
    $hasil = $this->m_jabatan->update_jabatan($id,$data);
    if ($hasil == 0){
      $this->session->set_flashdata('alert','Update Data Jabatan berhasil');
      redirect('sims/jabatan');
    } else {
      $this->session->set_flashdata('alert','Update Data Jabatan Gagal');
      redirect('sims/jabatan');
    }
  }

  public function kategori()
  {
    $data['kategori'] = $this->m_kategori->get_kategori()->result_array();
    $this->template->load('index','kategori',$data);
  }

  // public function addkategori()
  // {
  //   $data['nama_kategori'] = $this->input->post('nama_kategori');
  //   $hasil = $this->m_kategori->add_kategori($data);
  //   if ($hasil == 0){
  //     $this->session->set_flashdata('alert','Input Data User berhasil');
  //     redirect('sims/kategori');
  //   } else {
  //     $this->session->set_flashdata('alert','Input Data User Gagal');
  //     redirect('sims/kategori');
  //   }
  // }

  public function delkategori()
  {
    $id = $this->uri->segment(3);
    $hasil = $this->m_kategori->del_kategori($id);
    if ($hasil == 0){
      $this->session->set_flashdata('alert','Hapus Data Kategori berhasil');
      redirect('sims/kategori');
    } else {
      $this->session->set_flashdata('alert','Hapus Data Kategori Gagal');
      redirect('sims/kategori');
    }
  }

  public function editkategori()
  {
    $id = $this->uri->segment(3);
    $data['kategori'] = $this->m_kategori->get_kategori($id)->row();
    $this->template->load('index','edit_kategori',$data);
  }

  public function updatekategori()
  {
    $id = $this->input->post('id_kategori');
    $data['nama_kategori'] = $this->input->post('nama_kategori');
    $hasil = $this->m_kategori->update_kategori($id,$data);
    if ($hasil == 0){
      $this->session->set_flashdata('alert','Update Data Kategori berhasil');
      redirect('sims/kategori');
    } else {
      $this->session->set_flashdata('alert','Update Data Kategori Gagal');
      redirect('sims/kategori');
    }
  }

  public function kode_disposisi()
  {
    $data['kode_disposisi'] = $this->m_kode_disposisi->get_kode_disposisi()->result_array();
    $this->template->load('index','kode_disposisi',$data);
  }

  public function addkode_disposisi()
  {
    $data['kode_disposisi'] = $this->input->post('kode_disposisi');
    $data['nama_kode_disposisi'] = $this->input->post('nama_kode_disposisi');
    $hasil = $this->m_kode_disposisi->add_kode_disposisi($data);
    if ($hasil == 0){
      $this->session->set_flashdata('alert','Input Data Kode Agenda berhasil');
      redirect('sims/kode_disposisi');
    } else {
      $this->session->set_flashdata('alert','Input Data Kode Agenda Gagal');
      redirect('sims/kode_disposisi');
    }
  }

  public function delkode_disposisi()
  {
    $id = $this->uri->segment(3);
    $hasil = $this->m_kode_disposisi->del_kode_disposisi($id);
    if ($hasil == 0){
      $this->session->set_flashdata('alert','Hapus Data Kode Agenda berhasil');
      redirect('sims/kode_disposisi');
    } else {
      $this->session->set_flashdata('alert','Hapus Data Kode Agenda Gagal');
      redirect('sims/kode_disposisi');
    }
  }

  public function editkode_disposisi()
  {
    $id = $this->uri->segment(3);
    $data['kode_disposisi'] = $this->m_kode_disposisi->get_kode_disposisi($id)->row();
    $this->template->load('index','edit_kode_disposisi',$data);
  }

  public function updatekode_disposisi()
  {
    $id = $this->input->post('id_kode_disposisi');
    $data['kode_disposisi'] = $this->input->post('kode_disposisi');
    $data['nama_kode_disposisi'] = $this->input->post('nama_kode_disposisi');
    $hasil = $this->m_kode_disposisi->update_kode_disposisi($id,$data);
    if ($hasil == 0){
      $this->session->set_flashdata('alert','Update Data Kode Agenda berhasil');
      redirect('sims/kode_disposisi');
    } else {
      $this->session->set_flashdata('alert','Update Data Kode Agenda Gagal');
      redirect('sims/kode_disposisi');
    }
  }

  public function level()
  {
    $data['level'] = $this->m_level->get_level()->result_array();
    $this->template->load('index','level',$data);
  }

  // public function addlevel()
  // {
  //   $data['nama_level'] = $this->input->post('nama_level');
  //   $hasil = $this->m_level->add_level($data);
  //   if ($hasil == 0){
  //     $this->session->set_flashdata('alert','Input Data User berhasil');
  //     redirect('sims/level');
  //   } else {
  //     $this->session->set_flashdata('alert','Input Data User Gagal');
  //     redirect('sims/level');
  //   }
  // }

  public function dellevel()
  {
    $id = $this->uri->segment(3);
    $hasil = $this->m_level->del_level($id);
    if ($hasil == 0){
      $this->session->set_flashdata('alert','Hapus Data Level berhasil');
      redirect('sims/level');
    } else {
      $this->session->set_flashdata('alert','Hapus Data Level Gagal');
      redirect('sims/level');
    }
  }

  public function editlevel()
  {
    $id = $this->uri->segment(3);
    $data['level'] = $this->m_level->get_level($id)->row();
    $this->template->load('index','edit_level',$data);
  }

  public function updatelevel()
  {
    $id = $this->input->post('id_level');
    $data['nama_level'] = $this->input->post('nama_level');
    $hasil = $this->m_level->update_level($id,$data);
    if ($hasil == 0){
      $this->session->set_flashdata('alert','Update Data Level berhasil');
      redirect('sims/level');
    } else {
      $this->session->set_flashdata('alert','Update Data Level Gagal');
      redirect('sims/level');
    }
  }

  public function sifat()
  {
    $data['sifat'] = $this->m_sifat->get_sifat()->result_array();
    $this->template->load('index','sifat',$data);
  }

  public function addsifat()
  {
    $data['keterangan'] = $this->input->post('keterangan');
    $hasil = $this->m_sifat->add_sifat($data);
    if ($hasil == 0){
      $this->session->set_flashdata('alert','Input Data Sifat berhasil');
      redirect('sims/sifat');
    } else {
      $this->session->set_flashdata('alert','Input Data Sifat Gagal');
      redirect('sims/sifat');
    }
  }

  public function delsifat()
  {
    $id = $this->uri->segment(3);
    $hasil = $this->m_sifat->del_sifat($id);
    if ($hasil == 0){
      $this->session->set_flashdata('alert','Hapus Data Sifat berhasil');
      redirect('sims/sifat');
    } else {
      $this->session->set_flashdata('alert','Hapus Data Sifat Gagal');
      redirect('sims/sifat');
    }
  }

  public function editsifat()
  {
    $id = $this->uri->segment(3);
    $data['sifat'] = $this->m_sifat->get_sifat($id)->row();
    $this->template->load('index','edit_sifat',$data);
  }

  public function updatesifat()
  {
    $id = $this->input->post('id_sifat');
    $data['keterangan'] = $this->input->post('keterangan');
    $hasil = $this->m_sifat->update_sifat($id,$data);
    if ($hasil == 0){
      $this->session->set_flashdata('alert','Update Data Sifat berhasil');
      redirect('sims/sifat');
    } else {
      $this->session->set_flashdata('alert','Update Data Sifat Gagal');
      redirect('sims/sifat');
    }
  }

 // BELUM KELAR INI, DISELESAIN BESOK LOH
  public function nomor_agenda()
  {
    $id = $this->uri->segment(3);
    $id_tahun = $_SESSION['id_tahun'];
    $data['nomor_agenda'] = $this->m_nomor_agenda->get_nomor_agenda($id_tahun,$id)->result_array();
    $this->template->load('index','nomor_agenda',$data);
  }

  // INI BATASNYA ....

  public function surat()
  {
    $id_kategori = $this->uri->segment(3);
    $id_tahun = $_SESSION['id_tahun'];
    $data['surat'] = $this->m_surat->get_surat($id_kategori,$id_tahun)->result_array();
    $data['kode_disposisi'] = $this->m_kode_disposisi->get_kode_disposisi()->result_array();
    $data['kategori'] = $this->m_kategori->get_kategori()->result_array();
    $data['tahun'] = $this->m_tahun->get_tahun()->result_array();
    $this->template->load('index','surat',$data);
  }

  public function do_upload(){
    $type = explode('.', $_FILES['file']['name']);
		$type = $type[count($type)-1];
		$url = 'files/'.uniqid(rand()).'.'.$type;
		if(in_array($type, array('doc', 'docx', 'pdf', 'jpg', 'jpeg', 'png')))
		if (is_uploaded_file($_FILES['file']['tmp_name']))
		if(move_uploaded_file($_FILES['file']['tmp_name'], $url))
    return $url;
		// return $url;
  }

  public function addsurat()
  {
    $id_kategori = $this->input->post('id_kategori');
    $data['nomor_surat'] = $this->input->post('nomor_surat');
    $data['judul_surat'] = $this->input->post('judul_surat');
    $data['tanggal_masuk_surat'] = $this->input->post('tanggal_masuk_surat');
    $data['perihal_surat'] = $this->input->post('perihal_surat');
    $data['lampiran_surat'] = $this->input->post('lampiran_surat');
    $data['pengirim_tujuan'] = $this->input->post('pengirim_tujuan');
    $data['maksud_surat'] = $this->input->post('maksud_surat');
    $data['id_kategori'] = $this->input->post('id_kategori');
    if ($this->input->post('id_kode_disposisi')==NULL){

    } else {
      $data['id_kode_disposisi'] = $this->input->post('id_kode_disposisi');
    }
    $data['id_tahun'] = $_SESSION['id_tahun'];
    $data['file'] = $this->do_upload();
    $this->m_surat->add_surat($data);
    //fungsi di bawah untuk memanggil id terakhir
    if ($id_kategori==1){
      $id_kategori = 1;
      $id_tahun = $_SESSION['id_tahun'];
      $data1['surat'] = $this->m_surat->get_one($id_kategori)->row();
      $id_surat = $data1['surat']->id_surat;
      $id_kode_disposisi = $data1['surat']->id_kode_disposisi;
      //untuk yang dibawah ini untuk memanggil id terahir untuk selanjutnya di jumlah
      $data3['nomor_agenda'] = $this->m_nomor_agenda->get_one_id($id_kode_disposisi,$id_tahun)->row();
      $nomor_agenda = $data3['nomor_agenda']->nomor_agenda + 1;
      //ini fungsi untuk insert nomor agendanya
      $data2['nomor_agenda'] = $nomor_agenda;
      $data2['id_kode_disposisi'] = $id_kode_disposisi;
      $data2['id_tahun'] = $id_tahun;
      $data2['id_surat'] = $id_surat;
      $hasil = $this->m_nomor_agenda->add_nomor_agenda($data2);
    } else {

    }
      $id=2;
      if($id_kategori==1){
        $kategori = "<i style='color:blue'>Surat Masuk</i>";
      } else { 
        $kategori = "<i style='color:red'>Surat Keluar</i>";
      }

      $user = $this->m_user->get_level($id)->result_array();
      foreach ($user as $u) {
        $email = $u['email'];
        $subject = 'Pemberitahuan Surat Masuk';
        $message = '
        <b>Assalamualaikum W. W.</b><br><br>

        Selamat Pagi/Siang/Malam. <br>
        Terdapat surat masuk/keluar dalam sistem dengan judul surat : '.$data['judul_surat'].'. Penjelasan ringkas mengenai surat berada dibawah :<br>
        Judul Surat : <b>'.$data['judul_surat'].'</b><br>
        Jenis Surat : '.$kategori.'<br>
        Pengirim Surat : '.$data['pengirim_tujuan'].'<br>
        Maksud/Tujuan Surat : <i><b>'.$data['maksud_surat'].'</b</i> <br>
        <br>
        <b>*Jika merupakan surat masuk silahkan segera melakukan disposisi surat tersebut. <br>
        Terima Kasih.<br><br>

        Wassalamulaikum W. W."';
        $this->email($email,$subject,$message);
      }

    if ($hasil == 0){
      $this->session->set_flashdata('alert','Input Data Surat berhasil');
      redirect('sims/surat/'.$id_kategori);
    } else {
      $this->session->set_flashdata('alert','Input Data Surat Gagal');
      redirect('sims/surat');
    }
  }

  public function editsurat()
  {
    $id = $this->uri->segment(3);
    $data['surat'] = $this->m_surat->edit_surat($id)->row();
    $data['kode_disposisi'] = $this->m_kode_disposisi->get_kode_disposisi()->result_array();
    $data['kategori'] = $this->m_kategori->get_kategori()->result_array();
    $this->template->load('index','edit_surat',$data);
  }

  public function updatesurat()
  {
    $id = $this->input->post('id_surat');
    $id_kategori = $this->input->post('id_kategori');
    $data['nomor_surat'] = $this->input->post('nomor_surat');
    $data['judul_surat'] = $this->input->post('judul_surat');
    $data['tanggal_masuk_surat'] = $this->input->post('tanggal_masuk_surat');
    $data['perihal_surat'] = $this->input->post('perihal_surat');
    $data['lampiran_surat'] = $this->input->post('lampiran_surat');
    $data['pengirim_tujuan'] = $this->input->post('pengirim_tujuan');
    $data['maksud_surat'] = $this->input->post('maksud_surat');
    $data['id_kategori'] = $this->input->post('id_kategori');
    $data['id_kode_disposisi'] = $this->input->post('id_kode_disposisi');
    $data['id_tahun'] = $_SESSION['id_tahun'];
    $image = $this->do_upload();
    if ($image==NULL){

    } else {
      $data['file'] = $image;
    }
    $hasil = $this->m_surat->update_surat($id,$data);
    if ($hasil == 0){
      $this->session->set_flashdata('alert','Input Data Surat berhasil');
      redirect('sims/surat/'.$id_kategori);
    } else {
      $this->session->set_flashdata('alert','Input Data Surat Gagal');
      redirect('sims/surat');
    }
  }

  public function delsurat()
  {
    $id = $this->uri->segment(3);
    $id_kategori = $this->uri->segment(4);
    $hasil = $this->m_surat->del_surat($id);
    if ($hasil == 0){
      $this->session->set_flashdata('alert','Hapus Data Surat berhasil');
      redirect('sims/surat/'.$id_kategori);
    } else {
      $this->session->set_flashdata('alert','Hapus Data Surat Gagal');
      redirect('sims/surat');
    }
  }

  public function disposisi()
  {
    if ($this->uri->segment(3)==NULL){
      $id = $this->input->post('id_surat');
    } else {
      $id = $this->uri->segment(3);
    }
    $id_kategori = 1;
    $data['surat'] = $this->m_surat->dispo_surat($id)->row();
    $data['user'] = $this->m_user->get_user()->result_array();
    $data['sifat'] = $this->m_sifat->get_sifat()->result_array();
    $data['nomor_agenda'] = $this->m_nomor_agenda->get_one($id)->row();
    $this->template->load('index','disposisi',$data);
  }

  public function adddisposisi()
  {
    $id = $this->input->post('id_surat');
    $data['id_surat'] = $this->input->post('id_surat');
    $data['id_nomor_agenda'] = $this->input->post('id_nomor_agenda');
    $data['id_sifat'] = $this->input->post('id_sifat');
    $data['id_tahun'] = $_SESSION['id_tahun'];
    $data['tanggal'] = $this->input->post('tanggal');
    $data['id_pengirim'] = $_SESSION['id_user'];
    $this->m_disposisi->add_pemberitahuan($data);
    $data1['pemberitahuan'] = $this->m_disposisi->get_id()->row();
    $id_pemberitahuan = $data1['pemberitahuan']->id_pemberitahuan;
    $id_penerima = $this->input->post('user');

    foreach ($id_penerima as $p) {

      $data2['id_pemberitahuan'] = $id_pemberitahuan;
      $data2['id_penerima'] = $p;
      $surat = $this->m_surat->edit_surat($data['id_surat'])->row();
      $user = $this->m_user->get_user($p)->row();
      $email = $user->email;
        $subject = 'Pemberitahuan Surat Masuk';
        $message = '
        <b>Assalamualaikum W. W.</b><br><br>

        Selamat Pagi/Siang/Malam. <br>
        Anda mendapatkan surat masuk yang harus didisposisikan, dengan judul surat : '.$surat->judul_surat.'. Penjelasan ringkas mengenai surat berada dibawah :<br>
        Judul Surat : <b>'.$surat->ju.'</b><br>
        Pengirim Surat : '.$surat->pengirim_tujuan.'<br>
        Maksud/Tujuan Surat : <i><b>'.$surat->maksud_surat.'</b</i> <br>
        <br>
        <b>*Harap segera melakukan disposisi surat tersebut. <br>
        Terima Kasih.<br><br>

        Wassalamulaikum W. W."';
        $this->email($email,$subject,$message);

      $hasil = $this->m_disposisi->add_relasi($data2);
    }

    $data3['status'] = 1;
    $this->m_surat->update_surat($id,$data3);
    if ($hasil == 0){
      $this->session->set_flashdata('alert','Add Relasi berhasil');
      redirect('sims/pemberitahuan');
    } else {
      $this->session->set_flashdata('alert','Add Relasi Gagal');
      redirect('sims/pemberitahuan');
    }
  }

  public function pemberitahuan()
  {
    $id_tahun = $_SESSION['id_tahun'];
    $id_kategori = 1;
    $data['surat'] = $this->m_surat->get_surat($id_kategori,$id_tahun)->result_array();
    $data['disposisi'] = $this->m_disposisi->get_pemberitahuan($id_tahun)->result_array();
    $data['surat_disposisi'] = $this->m_disposisi->get_surat_disposisi($id_tahun,$id_kategori)->result_array();
    $data['tahun'] = $this->m_tahun->get_tahun()->result_array();
    $this->template->load('index','pemberitahuan',$data);
  }

  public function delpemberitahuan()
  {
    $id_pemberitahuan = $this->uri->segment(3);
    $data['surat'] = $this->m_disposisi->get_id($id_pemberitahuan)->row();
    $hasil = $this->m_disposisi->del_pemberitahuan($id_pemberitahuan);
    $id = $data['surat']->id_surat;
    $data3['status'] = 0;
    $this->m_surat->update_surat($id,$data3);
    if ($hasil == 0){
      $this->session->set_flashdata('alert','Hapus Data Disposisi berhasil');
      redirect('sims/pemberitahuan');
    } else {
      $this->session->set_flashdata('alert','Hapus Data Disposisi Gagal');
      redirect('sims/pemberitahuan');
    }
  }

  public function detailpemberitahuan()
  {
    $id = $this->uri->segment(3);
    $data['user'] = $this->m_user->get_user()->result_array();
    $data['detail'] = $this->m_disposisi->get_pemberitahuan_surat($id)->result_array();
    $data['user_disposisi'] = $this->m_disposisi->get_user_disposisi($id)->result_array();
    $this->template->load('index','detailpemberitahuan',$data);
  }

  public function editpemberitahuan()
  {
    $id_tahun = $_SESSION['id_tahun'];
    $id = $this->uri->segment(3);
    $data['user'] = $this->m_user->get_user()->result_array();
    $data['sifat'] = $this->m_sifat->get_sifat()->result_array();
    $data['detail'] = $this->m_disposisi->get_pemberitahuan_surat($id)->result_array();
    $data['surat'] = $this->m_disposisi->get_pemberitahuan($id_tahun,$id)->row();
    $this->template->load('index','edit_pemberitahuan',$data);
  }

  public function updatedisposisi()
  {
    $id_pemberitahuan = $this->input->post('id_pemberitahuan');
    $id = $this->input->post('id_surat');
    $data['id_sifat'] = $this->input->post('id_sifat');
    $data['tanggal'] = $this->input->post('tanggal');
    $pendisposisi = $this->m_user->get_user($_SESSION['id_user'])->row();
    $email_disposisi = $pendisposisi->email;
    $p=2;
    $user = $this->m_user->get_level($p)->result_array();
    $surat = $this->m_surat->edit_surat($id)->row();
    foreach ($user as $user) {
      $email = $user['email'];
      $subject = 'Pemberitahuan Surat Masuk';
      $message = '
      <b>Assalamualaikum W. W.</b><br><br>

      Selamat Pagi/Siang/Malam. <br>
      Balasan disposisi telah dilakukan oleh email : '.$email_disposisi.'. Surat yang telah didisposisikan adalah :<br>
      Judul Surat : <b>'.$surat->ju.'</b><br>
      Pengirim Surat : '.$surat->pengirim_tujuan.'<br>
      Maksud/Tujuan Surat : <i><b>'.$surat->maksud_surat.'</b</i> <br>
      <br>
      <b>*Harap segera mengecek balasan tersebut. <br>
      Terima Kasih.<br><br>

       Wassalamulaikum W. W."';
       $this->email($email,$subject,$message);
    }

    $hasil = $this->m_disposisi->update_pemberitahuan($id_pemberitahuan,$data);
    if ($hasil == 0){
      $this->session->set_flashdata('alert','Update Relasi berhasil');
      redirect('sims/pemberitahuan');
    } else {
      $this->session->set_flashdata('alert','Update Relasi Gagal');
      redirect('sims/pemberitahuan');
    }
  }

  public function adduserdisposisi()
  {
    $id_pemberitahuan = $this->input->post('id_pemberitahuan');
    $id_penerima = $this->input->post('user');
    foreach ($id_penerima as $p) {
      $data2['id_pemberitahuan'] = $id_pemberitahuan;
      $data2['id_penerima'] = $p;
      $hasil = $this->m_disposisi->add_relasi($data2);
    }
    if ($hasil == 0){
      $this->session->set_flashdata('alert','Add User Disposisi berhasil');
      redirect('sims/detailpemberitahuan/'.$id_pemberitahuan);
    } else {
      $this->session->set_flashdata('alert','Add User Disposisi Gagal');
      redirect('sims/detailpemberitahuan');
    }
  }

  public function deluserdisposisi()
  {
    $id_balasan = $this->uri->segment(3);
    $id_pemberitahuan = $this->uri->segment(4);
    $hasil = $this->m_disposisi->del_user_relasi($id_balasan);
    if ($hasil == 0){
      $this->session->set_flashdata('alert','Delete User Disposisi berhasil');
      redirect('sims/detailpemberitahuan/'.$id_pemberitahuan);
    } else {
      $this->session->set_flashdata('alert','Add User Disposisi Gagal');
      redirect('sims/detailpemberitahuan');
    }
  }

  public function edituserdisposisi()
  {
    $id_balasan = $this->uri->segment(3);
    $data['detail'] = $this->m_disposisi->get_detail_one($id_balasan)->row();
    $this->template->load('index','edit_userdisposisi',$data);
  }

  public function updateuserdisposisi()
  {
    $id_balasan = $this->input->post('id_balasan');
    $id_pemberitahuan = $this->input->post('id_pemberitahuan');
    $data['keterangan_disposisi'] = $this->input->post('keterangan_disposisi');
    $data['status'] = $this->input->post('status');
    $data['tanggal_selesai'] = $this->input->post('tanggal_selesai');
    $hasil = $this->m_disposisi->update_pemberitahuan_surat($id_balasan,$data);
    if ($hasil == 0){
      $this->session->set_flashdata('alert','Update Disposisi berhasil');
      redirect('sims/detailpemberitahuan/'.$id_pemberitahuan);
    } else {
      $this->session->set_flashdata('alert','Update Disposisi Gagal');
      redirect('sims/detailpemberitahuan');
    }
  }

  public function surat_saya()
  {
    $id_penerima = $_SESSION['id_user'];
    $data['surat'] = $this->m_disposisi->get_surat_saya($id_penerima)->result_array();
    $this->template->load('index','surat_saya',$data);
  }

  public function get_disposisi_surat_saya()
  {
    $id_balasan = $this->uri->segment(3);
    $data['disposisi'] = $this->m_disposisi->get_detail_one($id_balasan)->row();
    $this->template->load('index','disposisi_surat_saya',$data);
  }

  public function updateuserdisposisisaya()
  {
    $id_balasan = $this->input->post('id_balasan');
    $id_pemberitahuan = $this->input->post('id_pemberitahuan');
    $data['keterangan_disposisi'] = $this->input->post('keterangan_disposisi');
    $data['status'] = $this->input->post('status');
    $data['tanggal_selesai'] = $this->input->post('tanggal_selesai');
    $hasil = $this->m_disposisi->update_pemberitahuan_surat($id_balasan,$data);
    if ($hasil == 0){
      $this->session->set_flashdata('alert','Update Disposisi berhasil');
      redirect('sims/get_disposisi_surat_saya/'.$id_balasan);
    } else {
      $this->session->set_flashdata('alert','Update Disposisi Gagal');
      redirect('sims/get_disposisi_surat_saya');
    }
  }

  public function laporan()
  {
    $data['tahun'] = $this->m_tahun->get_tahun()->result_array();
    $data['kategori'] = $this->m_kategori->get_kategori()->result_array();
    $data['kode_disposisi'] = $this->m_kode_disposisi->get_kode_disposisi()->result_array();
    $this->template->load('index','laporan',$data);
  }

  public function laporan_surat()
  {
    $id_kategori = $this->input->post('id_kategori');
    if ($id_kategori==1){
      $data['status'] = 'MASUK';
    } else {
      $data['status'] = 'KELUAR';
    }
    $id_tahun = $this->input->post('id_tahun');
    $urutan = $this->input->post('urutan');
    if ($this->input->post('bulan')==0){
      $data['surat'] = $this->m_surat->get_surat($id_kategori,$id_tahun,$urutan)->result_array();
    } else{
      $bulan = $this->input->post('bulan');
      $data['surat'] = $this->m_surat->get_surat($id_kategori,$id_tahun,$urutan,$bulan)->result_array();
    }
    $this->load->view('laporan_surat',$data);
  }

  public function laporan_nomor_agenda()
  {
    $id = $this->input->post('id_kode_disposisi');
    $id_tahun = $this->input->post('id_tahun');
    if ($id==1){
      $data['status'] = 'DINAS PENDIDIKAN';
    } else if ($id==2){
      $data['status'] = 'MUHAMMADIYAH/YAYASAN';
    } else {
      $data['status'] = 'UMUM';
    }
    $data['nomor_agenda'] = $this->m_nomor_agenda->get_nomor_agenda($id_tahun,$id)->result_array();
    $this->load->view('laporan_nomor_agenda',$data);
  }

}
