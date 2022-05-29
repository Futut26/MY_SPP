<?php

class Admin extends Controller {
    public function __construct()
    {
        if(!isset($_SESSION['username']))
        {
            header('location:' . BASE_URL . '/Auth');
        }else{
            if($_SESSION['level'] != 'Petugas')
            {
                header('location:' . BASE_URL . '/error');
            }else
            {
                $id_akun = $_SESSION['id_akun'];
                $data['user'] = $this->model('Admin_model')->getdataAdminById($id_akun);
            }
        }
        
    }

    public function index(){
        $id_akun = $_SESSION['id_akun'];
        $data['user'] = $this->model('Admin_model')->getdataAdminById($id_akun);
        $data['pemasukan'] = $this->model('Pembayaran_model')->getTotalTransaksi();
        $data['jumlah_siswa'] = $this->model('Siswa_model')->getJumlahSiswa();
        $data['title'] = 'Dashboard Admin';
        $this->view('templates/header',$data);
        $this->view('admin/index',$data);
        $this->view('templates/footer');
    }

    public function profile($id_akun)
    {
        $data['user'] = $this->model('Admin_model')->getdataAdminById($id_akun);
        $data['title'] = 'Profile';
        $this->view('templates/header',$data);
        $this->view('admin/profile',$data);
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
            header('Location: ' . BASE_URL . '/admin/profile/'.$data['id_akun']);
            die();
        }else
        {
            Flasher::setFlash('gagal', 'update foto', 'danger');
            header('Location: ' . BASE_URL . '/admin/profile/'.$data['id_akun']);
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
            if($data['password_baru'] == $data['konfirmasi_password'] )
            {
                $this->model('Auth_model')->updatePassword($data);
                Flasher::setFlash('Password', 'berhasil diganti', 'success');
                header('Location: ' . BASE_URL . '/admin/profile/'.$data['id_akun']);
                die();
                
            }else{
                Flasher::setFlash('Konfirmasi password', 'salah', 'danger');
                header('Location: ' . BASE_URL . '/admin/profile/'.$data['id_akun']);
                die();
               
            }
        }else
        {
            Flasher::setFlash('Password Lama', 'salah', 'danger');
            header('Location: ' . BASE_URL . '/admin/profile/'.$data['id_akun']);
            die();
        }

    }

    public function dataSiswa(){
        $data['title'] = 'Data Siswa';
        $id_akun = $_SESSION['id_akun'];
        $data['user'] = $this->model('Admin_model')->getdataAdminById($id_akun);
        $data['siswa'] = $this->model('Siswa_model')->getAllSiswa();
        $this->view('templates/header',$data);
        $this->view('admin/siswa',$data);
        $this->view('templates/footer');
    }

    public function detailDataSiswa($nisn){
        $data['title'] = 'Data Siswa';
        $id_akun = $_SESSION['id_akun'];
        $data['user'] = $this->model('Admin_model')->getdataAdminById($id_akun);
        $data['siswa'] = $this->model('Siswa_model')->getdataSiswaByNisn($nisn);
        $this->view('templates/header',$data);
        $this->view('admin/detailSiswa',$data);
        $this->view('templates/footer');
    }

    public function tambahSiswa()
    {
        $id_akun = $_SESSION['id_akun'];
        if($this->model('Siswa_model')->tambahDataSiswa($_POST) > 0)
        {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASE_URL . '/admin/dataSiswa/'.$id_akun);
            die();
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASE_URL . '/admin/dataSiswa'.$id_akun);
            die();
        }
    }

    public function getSiswaUbah() 
    {
        echo json_encode($this->model('Siswa_model')->getdataSiswaByNisn($_POST['nisn']));
    }

    public function UbahDataSiswa()
    {
        $id_akun = $_SESSION['id_akun'];
        $id_akun = $_SESSION['id_akun'];
        $data['user'] = $this->model('Admin_model')->getdataAdminById($id_akun);
        if($this->model('Siswa_model')->ubahDataSiswa($_POST) > 0)
        {
            Flasher::setFlash('berhasil', 'diupdate', 'success');
            header('Location: ' . BASE_URL . '/admin/dataSiswa');
            die();
        } else {
            Flasher::setFlash('gagal', 'diupdate', 'danger');
            header('Location: ' . BASE_URL . '/admin/dataSiswa');
            die();
        }
    }

    public function cariSiswa()
    {
        $data['title'] = 'Data Siswa';
        $id_akun = $_SESSION['id_akun'];
        $data['user'] = $this->model('Admin_model')->getdataAdminById($id_akun);
        $data['siswa'] = $this->model('Siswa_model')->cariDataSiswa();
        $this->view('templates/header',$data);
        $this->view('admin/siswa',$data);
        $this->view('templates/footer');
    }

    public function hapusDataSiswa($id_akun) 
    {
        if($this->model('Siswa_model')->hapusDataSiswa($id_akun) > 0)
        {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASE_URL . '/admin/dataSiswa');
            die();
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASE_URL . '/admin/dataSiswa');
            die();
        }
    }

    public function transaksiSiswa()
    {
        $data['title'] = 'Data Transaksi Siswa';
        $id_akun = $_SESSION['id_akun'];
        $data['user'] = $this->model('Admin_model')->getdataAdminById($id_akun);
        $data['pembayaran'] = $this->model('Pembayaran_model')->getAllTransaksi();
        $this->view('templates/header',$data);
        $this->view('admin/transaksi',$data);
        $this->view('templates/footer');
    }

    public function detailDataPembayaran()
    {
        $data['title'] = 'Detail Transaksi Siswa';
        $nisn = $_POST['nisn'];
        $id_pembayaran = $_POST['id_pembayaran'];

        $id_akun = $_SESSION['id_akun'];
        $data['user'] = $this->model('Admin_model')->getdataAdminById($id_akun);
        $data['siswa'] = $this->model('Siswa_model')->getdataSiswaByNisn($nisn);
        $data['pembayaran'] = $this->model('Pembayaran_model')->getTransaksiByNisn($id_pembayaran);
        $this->view('templates/header',$data);
        $this->view('admin/detailTransaksi',$data);
        $this->view('templates/footer');
    }

    public function konfirmasiPembayaran($id_tagihan)
    {
        if($this->model('Pembayaran_model')->konfirmasiTransaksi($id_tagihan))
        {
            Flasher::setFlash('Pembayaran Siswa Berhasil ', 'di konfirmasi', 'success');
            header('Location: ' . BASE_URL . '/admin/transaksiSiswa');
            die();
        }else{
            Flasher::setFlash('Pembayaran Siswa Gagl ', 'di konfirmasi', 'danger');
            header('Location: ' . BASE_URL . '/admin/transaksiSiswa');
            die();
        }
    }

    public function Tagihan()
    {
        $data['title'] = 'Tagihan SPP';
        $id_akun = $_SESSION['id_akun'];
        $data['user'] = $this->model('Admin_model')->getdataAdminById($id_akun);
        $data['siswa'] = $this->model('Siswa_model')->getAllSiswa();
        $this->view('templates/header',$data);
        $this->view('admin/tagihanSPP',$data);
        $this->view('templates/footer');
    }
    public function cariSiswaTagihan()
    {
        $data['title'] = 'Tagihan SPP';
        $id_akun = $_SESSION['id_akun'];
        $data['user'] = $this->model('Admin_model')->getdataAdminById($id_akun);
        $data['siswa'] = $this->model('Siswa_model')->cariDataSiswa();
        $this->view('templates/header',$data);
        $this->view('admin/tagihanSPP',$data);
        $this->view('templates/footer');
    }

    public function tagihanSiswa($nisn)
    {
        $data['title'] = 'Tagihan SPP';
        $id_akun = $_SESSION['id_akun'];
        $data['user'] = $this->model('Admin_model')->getdataAdminById($id_akun);
        $data['siswa'] = $this->model('Siswa_model')->getdataSiswaByNisn($nisn);
        $data['tagihan'] = $this->model('Tagihan_model')->getTagihanSiswa($nisn);
        $this->view('templates/header',$data);
        $this->view('admin/tagihanSiswa',$data);
        $this->view('templates/footer');
    }

    public function tambahTagihanSiswa()
    {
        $data = [
            'nisn'=>$_POST['nisn'],
            'keterangan' => 'Belum Bayar',
            'kd_spp'=>$_POST['bulan']
        ];

       
        //cek bulan yang dipilih apakah sudah ada di database
        if($this->model('Tagihan_model')->cekBulan($data))
        {
            Flasher::setFlash('Tagihan Bulan yang dipilih', 'sudah tersedia', 'danger');
            header('Location: ' . BASE_URL . '/admin/tagihanSiswa/'.$data['nisn']);
            die();
        }else{
            $this->model('Tagihan_model')->tambahTagihan($data);
            Flasher::setFlash('Berhasil Menambahkan Tagihan SPP', '', 'success');
            header('Location: ' . BASE_URL . '/admin/tagihanSiswa/'.$data['nisn']);
            die();
        }

        
    }

    

    



}