<?php 
class Tagihan_model{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getTagihanSiswa($nisn)
    {
        $this->db->query("SELECT * FROM tb_tagihan 
                        INNER JOIN tb_spp 
                        on tb_tagihan.kd_spp = tb_spp.kd_spp
                        INNER JOIN tb_data_siswa 
                        on tb_tagihan.nisn = tb_data_siswa.nisn 
                        WHERE tb_tagihan.nisn = :nisn");
        $this->db->bind(':nisn',$nisn);
        return $this->db->resultSet();
    }

    public function cekBulan($data)
    {
        $this->db->query("SELECT * FROM tb_tagihan WHERE nisn = :nisn AND kd_spp = :kd_spp");
        $this->db->bind(':nisn',$data['nisn']);
        $this->db->bind(':kd_spp',$data['kd_spp']);
        if($this->db->single() > 0) {
            return true;
        } else {
            return false;
        }
    
    }

    public function tambahTagihan($data)
    {
        $this->db->query("INSERT INTO tb_tagihan values ('', :nisn, :keterangan, :kd_spp)");
        $this->db->bind('nisn', $data['nisn']);
        $this->db->bind('keterangan', $data['keterangan']);
        $this->db->bind('kd_spp', $data['kd_spp']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function getTagihanByid($id_tagihan)
    {
        $this->db->query("SELECT * FROM tb_tagihan WHERE id_tagihan = :id_tagihan");
        $this->db->bind(':id_tagihan',$id_tagihan);
        return $this->db->single();
    }

    public function transaksi($data)
    {
            $path ="../public/images/bukti_pembayaran/".$data['nama_foto'];
            if($data['tipe'] == "image/jpeg" || $data['tipe'] == "image/png"){ 
            if($data['ukuran'] <= 5000000){ 
                if(move_uploaded_file($data['file_tmp'], $path)){ 
                $query = "INSERT INTO tb_pembayaran values ('', :nominal_bayar, :tgl_bayar, :bukti_bayar, :id_tagihan, :kd_spp, :nisn)";
                $this->db->query($query);
                $this->db->bind("nominal_bayar",$data['nominal_bayar']);
                $this->db->bind("tgl_bayar",$data['tgl_bayar']);
                $this->db->bind("bukti_bayar",$data['nama_foto']);
                $this->db->bind("id_tagihan",$data['id_tagihan']);
                $this->db->bind("kd_spp",$data['kd_spp']);
                $this->db->bind("nisn",$data['nisn']);
                $this->db->execute();
                return $this->db->rowCount();
                }else{
                    return false;
                }
            }else{
                return false;
            }
            }else{
                return false;
            }
    }

    public function updateTagihan($data)
    {
        $query = "UPDATE tb_tagihan SET keterangan = :keterangan WHERE id_tagihan = :id_tagihan";
        $this->db->query($query);
        $this->db->bind('keterangan', $data['keterangan']);
        $this->db->bind('id_tagihan', $data['id_tagihan']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    
}
?>