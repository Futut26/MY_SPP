<?php 
class Pembayaran_model{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getTotalTransaksi()
    {
        $this->db->query("SELECT SUM(nominal_bayar) AS total FROM tb_pembayaran INNER JOIN tb_tagihan on tb_pembayaran.id_tagihan = tb_tagihan.id_tagihan WHERE keterangan ='Lunas'");
        return $this->db->resultSet();
    }

    public function getAllTransaksi()
    {
        $this->db->query("SELECT * FROM tb_pembayaran 
                            INNER JOIN tb_data_siswa 
                            on tb_pembayaran.nisn = tb_data_siswa.nisn
                            INNER JOIN tb_tagihan 
                            on tb_pembayaran.id_tagihan = tb_tagihan.id_tagihan
                            INNER JOIN tb_spp
                            on tb_pembayaran.kd_spp = tb_spp.kd_spp WHERE tb_tagihan.keterangan = 'Menunggu Konfirmasi'");
        return $this->db->resultSet();
    }

    public function getTransaksiByNisn($id_pembayaran){
        $this->db->query("SELECT * FROM tb_pembayaran 
                            INNER JOIN tb_data_siswa 
                            on tb_pembayaran.nisn = tb_data_siswa.nisn
                            INNER JOIN tb_tagihan 
                            on tb_pembayaran.id_tagihan = tb_tagihan.id_tagihan
                            INNER JOIN tb_spp
                            on tb_pembayaran.kd_spp = tb_spp.kd_spp WHERE id_pembayaran = :id_pembayaran");
        $this->db->bind(':id_pembayaran', $id_pembayaran);
        return $this->db->single();
    }

    public function getTransaksi($nisn){
        $this->db->query("SELECT * FROM tb_pembayaran 
                            INNER JOIN tb_tagihan 
                            on tb_pembayaran.id_tagihan = tb_tagihan.id_tagihan
                            INNER JOIN tb_spp
                            on tb_pembayaran.kd_spp = tb_spp.kd_spp WHERE tb_pembayaran.nisn = :nisn");
        $this->db->bind(':nisn', $nisn);
        return $this->db->resultSet();
    }

    public function konfirmasiTransaksi($id_tagihan)
    {
        $query = "UPDATE tb_tagihan SET keterangan = 'Lunas' WHERE id_tagihan = :id_tagihan";

        $this->db->query($query);
        $this->db->bind('id_tagihan', $id_tagihan);
        $this->db->execute();
        if($this->db->rowCount()) {
            return true;
        } else {
            return false;
        }
    }

}
?>