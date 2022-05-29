<?php 

class Siswa_model{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllSiswa()
    {
        $this->db->query("SELECT * FROM tb_data_siswa 
                        INNER JOIN tb_akun_pengguna 
                        on tb_data_siswa.id_akun = tb_akun_pengguna.id_akun
                        INNER JOIN tb_kelas 
                        on tb_data_siswa.id_kelas = tb_kelas.id_kelas
                        INNER JOIN tb_jurusan 
                        on tb_data_siswa.id_jurusan = tb_jurusan.id_jurusan");
        return $this->db->resultSet();
    }

    public function getdataSiswaById($id_akun)
    {
        $this->db->query("SELECT * FROM tb_data_siswa 
                        INNER JOIN tb_akun_pengguna 
                        on tb_data_siswa.id_akun = tb_akun_pengguna.id_akun
                        INNER JOIN tb_kelas 
                        on tb_data_siswa.id_kelas = tb_kelas.id_kelas
                        INNER JOIN tb_jurusan 
                        on tb_data_siswa.id_jurusan = tb_jurusan.id_jurusan 
                        WHERE tb_data_siswa.id_akun = :id_akun");
        $this->db->bind('id_akun', $id_akun);
        return $this->db->single();
    }

    public function getdataSiswaByNisn($nisn)
    {
        $this->db->query("SELECT * FROM tb_data_siswa 
                        INNER JOIN tb_akun_pengguna 
                        on tb_data_siswa.id_akun = tb_akun_pengguna.id_akun
                        INNER JOIN tb_kelas 
                        on tb_data_siswa.id_kelas = tb_kelas.id_kelas
                        INNER JOIN tb_jurusan 
                        on tb_data_siswa.id_jurusan = tb_jurusan.id_jurusan 
                        WHERE tb_data_siswa.nisn = :nisn");
        $this->db->bind('nisn', $nisn);
        return $this->db->single();
    }

    public function tambahDataSiswa($data)
    {
        $query1 = "INSERT INTO tb_akun_pengguna values ('', :username, :password, :level, :foto)"; //tambah data ke tabel tb_akun_pengguna terlebih dahulu
        $data['level'] = "siswa";
        $data['foto'] = "default.jpg";
        $this->db->query($query1);
        $this->db->bind('username', $data['nisn']);
        $this->db->bind('password', password_hash($data['nisn'], PASSWORD_DEFAULT));
        $this->db->bind('level', $data['level']);
        $this->db->bind('foto', $data['foto']);
        $this->db->execute();
        $this->db->rowCount();
        
        $query2 = "SELECT max(id_akun) AS last_id FROM tb_akun_pengguna";//ambil data terakhir dari kolom id_akun di tabel tb_akun_pengguna
        $data['level'] = "siswa";
        $this->db->query($query2);
        $id['id'] = $this->db->single();

        $this->db->query("INSERT INTO tb_data_siswa values (:nisn, :nama_lengkap, :jenis_kelamin, :alamat, :no_hp, :wali_murid, :id_akun, :id_kelas, :id_jurusan)");
        $this->db->bind('nisn', $data['nisn']);
        $this->db->bind('nama_lengkap', $data['nama_lengkap']);
        $this->db->bind('jenis_kelamin', $data['jenis_kelamin']);
        $this->db->bind('alamat', $data['alamat']);
        $this->db->bind('no_hp', $data['no_hp']);
        $this->db->bind('wali_murid', $data['wali_murid']);
        $this->db->bind(':id_akun', $id['id']['last_id']);
        $this->db->bind('id_kelas', $data['kelas']);
        $this->db->bind('id_jurusan', $data['jurusan']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function ubahDataSiswa($data)
    {
        $query = "UPDATE tb_data_siswa SET 
                        nisn = :nisn, 
                        nama_lengkap = :nama_lengkap, 
                        jenis_kelamin = :jenis_kelamin, 
                        alamat = :alamat,
                        no_hp = :no_hp,
                        wali_murid = :wali_murid,
                        id_kelas = :id_kelas,
                        id_jurusan = :id_jurusan
                  WHERE nisn = :nisn";

        $this->db->query($query);
        $this->db->bind('nisn', $data['nisn']);
        $this->db->bind('nama_lengkap', $data['nama_lengkap']);
        $this->db->bind('jenis_kelamin', $data['jenis_kelamin']);
        $this->db->bind('alamat', $data['alamat']);
        $this->db->bind('no_hp', $data['no_hp']);
        $this->db->bind('wali_murid', $data['wali_murid']);
        $this->db->bind('id_kelas', $data['kelas']);
        $this->db->bind('id_jurusan', $data['jurusan']);
        
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function cariDataSiswa() 
    {
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM tb_data_siswa  
                    INNER JOIN tb_kelas 
                    on tb_data_siswa.id_kelas = tb_kelas.id_kelas
                    INNER JOIN tb_jurusan 
                    on tb_data_siswa.id_jurusan = tb_jurusan.id_jurusan 
                    WHERE nama_lengkap or nisn LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultSet();
    }

    public function hapusDataSiswa($id_akun)
    {
        $query = "DELETE FROM tb_akun_pengguna WHERE id_akun = :id_akun";
        $this->db->query($query);
        $this->db->bind('id_akun', $id_akun);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function getJumlahSiswa()
    {
        $this->db->query(" SELECT COUNT(*) as total_siswa FROM tb_data_siswa");
        return $this->db->resultSet();
    }

    
}