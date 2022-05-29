<?php

class Auth_model {
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function akun_user($username)
    {

        $this->db->query('SELECT * FROM tb_akun_pengguna WHERE username = :username');
        //Bind value
        $this->db->bind(':username', $username);
        return $this->db->single();
    }

    public function akun_userByPassword($data)
    {
        $this->db->query("SELECT * FROM tb_akun_pengguna WHERE id_akun = :id_akun");
        //Bind value
        $this->db->bind(':id_akun', $data['id_akun']);
        return $this->db->single();
    }

    public function updatePassword($data)
    {
        $query = "UPDATE tb_akun_pengguna SET password = :password WHERE id_akun = :id_akun ";
        $this->db->query($query);
        $this->db->bind('password',password_hash($data['password_baru'], PASSWORD_DEFAULT));
        $this->db->bind('id_akun',$data['id_akun']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function updateFoto($data)
    {
            $path ="../public/images/profile/".$data['foto'];
            if($data['tipe'] == "image/jpeg" || $data['tipe'] == "image/png"){ 
            if($data['ukuran'] <= 5000000){ 
                if(move_uploaded_file($data['file_tmp'], $path)){ 
                $query = "UPDATE tb_akun_pengguna SET foto = :foto WHERE id_akun = :id_akun ";
                $this->db->query($query);
                $this->db->bind("foto",$data['foto']);
                $this->db->bind("id_akun",$data['id_akun']);
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




    
}