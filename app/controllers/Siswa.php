<?php

class Siswa extends Controller {
    public function __construct()
    {
        if(!isset($_SESSION['username']))
        {
            header('location:' . BASE_URL . '/Auth');
        }else{
            if($_SESSION['level'] != 'siswa')
            {
                header('location:' . BASE_URL . '/error');
            }else
            {
                $id_akun = $_SESSION['id_akun'];
                $data['user'] = $this->model('Siswa_model')->getdataSiswaById($id_akun);
            }
        }
        
    }

    public function index(){

        $data['title'] = 'Dashboard siswa';
        $id_akun = $_SESSION['id_akun'];
        $data['user'] = $this->model('Siswa_model')->getdataSiswaById($id_akun);
        $this->view('templates/header',$data);
        $this->view('siswa/index',$data);
        $this->view('templates/footer');
        
    }

    public function tagihanSPP($nisn)
    {
        $data['title'] = 'Tagihan SPP';
        $id_akun = $_SESSION['id_akun'];
        $data['user'] = $this->model('Siswa_model')->getdataSiswaById($id_akun);
        $data['tagihan'] = $this->model('Tagihan_model')->getTagihanSiswa($nisn);
        $this->view('templates/header',$data);
        $this->view('siswa/tagihan',$data);
        $this->view('templates/footer');
    }

    public function profile($id_akun)
    {
        $data['title'] = 'Profile';
        $data['user'] = $this->model('Siswa_model')->getdataSiswaById($id_akun);
        $this->view('templates/header',$data);
        $this->view('siswa/profile',$data);
        $this->view('templates/footer');
    }

    public function gantiFoto()
    {
        $data = [
            'id_akun' => $_POST['id_akun'],
            'foto' => $_FILES['foto']['name'],
            'ukuran' => $_FILES['foto']['size'],
            'tipe' => $_FILES['foto']['type'],
            'file_tmp' => $_FILES['foto']['tmp_name']
        ];
        $update = $this->model('Auth_model')->updateFoto($data);
        if($update)
        {
            Flasher::setFlash('berhasil', 'update foto', 'success');
            header('Location: ' . BASE_URL . '/Siswa/profile/'.$data['id_akun']);
            die();
        }else
        {
            Flasher::setFlash('gagal', 'update foto', 'danger');
            header('Location: ' . BASE_URL . '/Siswa/profile/'.$data['id_akun']);
            die();
        }
    }

    public function gantiPassword()
    {
        $data = [
            'password_lama' => $_POST['password_lama'],
            'id_akun' => $_POST['id_akun'],
            'password_baru' => $_POST['password_baru'],
            'konfirmasi_password' => $_POST['konfirmasi_password']
        ];

        $data_password = $this->model('Auth_model')->akun_userByPassword($data);

        $password_hash = $data_password['password'];
        $password_lama = $data['password_lama'];

        if(password_verify($password_lama, $password_hash))
        {
            if($data['password_baru'] != $data['konfirmasi_password'] )
            {
                
                Flasher::setFlash('Konfirmasi password', 'salah', 'danger');
                header('Location: ' . BASE_URL . '/Siswa/profile/'.$data['id_akun']);
                die();
                
            }else{
                $this->model('Auth_model')->updatePassword($data);
                Flasher::setFlash('Password', 'berhasil diganti', 'success');
                header('Location: ' . BASE_URL . '/Siswa/profile/'.$data['id_akun']);
                die();
               
            }
        }else
        {
            Flasher::setFlash('Password Lama', 'salah', 'danger');
            header('Location: ' . BASE_URL . '/Siswa/profile/'.$data['id_akun']);
            die();
        }

    }
    public function ambilTagihan() 
    {
        echo json_encode($this->model('Tagihan_model')->getTagihanByid($_POST['id_tagihan']));
    }
    

    public function bayarTagihan()
    {
        $data = [
            'nisn'=> $_POST['nisn'],
            'nominal_bayar' => '150000',
            'tgl_bayar' => $_POST['tgl_bayar'],
            'nama_foto' => $_FILES['bukti']['name'],
            'ukuran' => $_FILES['bukti']['size'],
            'tipe' => $_FILES['bukti']['type'],
            'file_tmp' => $_FILES['bukti']['tmp_name'],
            'kd_spp' => $_POST['kd_spp'],
            'id_tagihan' => $_POST['id_tagihan'],
            'keterangan' => 'Menunggu Konfirmasi'
        ];

        if($this->model('Tagihan_model')->transaksi($data)>0)
        {
            $this->model('Tagihan_model')->updateTagihan($data);
            Flasher::setFlash('Berhasil Melakukan Pembayaran', 'Tunggun Konfirmasi Dari Petugas', 'success');
            header('Location: ' . BASE_URL . '/Siswa/tagihanSPP/'.$data['nisn']);
            die();
        }else
        {
            Flasher::setFlash('Gagl Melakukan Pembayaran', '', 'danger');
            header('Location: ' . BASE_URL . '/Siswa/tagihanSPP/'.$data['nisn']);
            die();
        }
    }

    public function transaksi($nisn)
    {
        $data['title'] = 'Riwayat Transaksi';
        $id_akun = $_SESSION['id_akun'];
        $data['user'] = $this->model('Siswa_model')->getdataSiswaById($id_akun);
        $data['pembayaran'] = $this->model('Pembayaran_model')->getTransaksi($nisn);
        $this->view('templates/header',$data);
        $this->view('siswa/riwayatPembayaran',$data);
        $this->view('templates/footer');
    }

    public function detailDataPembayaran()
    {
        $data['title'] = 'Detail Riwayat Pembayaran';
        $nisn = $_POST['nisn'];
        $id_akun = $_SESSION['id_akun'];
        $id_pembayaran = $_POST['id_pembayaran'];
        $data['user'] = $this->model('Siswa_model')->getdataSiswaById($id_akun);
        $data['siswa'] = $this->model('Siswa_model')->getdataSiswaByNisn($nisn);
        $data['pembayaran'] = $this->model('Pembayaran_model')->getTransaksiByNisn($id_pembayaran);
        $this->view('templates/header',$data);
        $this->view('siswa/detailRiwayat',$data);
        $this->view('templates/footer');
    }

    public function cetakTransaksi($id_pembayaran)
    {
        $data['title'] = 'Cetak Bukti Pembayaran';
        $id_akun = $_SESSION['id_akun'];
        $data['user'] = $this->model('Siswa_model')->getdataSiswaById($id_akun);
        $data['pembayaran'] = $this->model('Pembayaran_model')->getTransaksiByNisn($id_pembayaran);
        $this->view('siswa/cetak',$data);
 
    }

   

}