<?php

class Admin_model {
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getDataAdminById($id_akun)
    {
        $this->db->query("SELECT * FROM tb_data_petugas 
                        INNER JOIN tb_akun_pengguna 
                        on tb_data_petugas.id_akun = tb_akun_pengguna.id_akun 
                        WHERE tb_akun_pengguna.id_akun = :id_akun");
        $this->db->bind(":id_akun",$id_akun);
        return $this->db->single();
    }

    

}