<?php

class Auth extends Controller {
    public function index() {
        $data['title'] = 'Login';
        $this->view('auth/index',$data);
    
    }

    public function login() {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $data = $this->model('Auth_model')->akun_user($username);
        $hash = $data['password'];
        
        if(password_verify($password, $hash))
        {
            $this->createUserSession($data);
        }else
        {
            Flasher::setFlash('Password atau Username', 'salah', 'danger');
            header('Location: ' . BASE_URL . '/auth');
            die();
        }
    }

    public function createUserSession($user) {
        $_SESSION['id_akun'] = $user['id_akun'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['level'] = $user['level'];

        if($_SESSION['level'] == "Petugas")
        {
            header('Location: ' . BASE_URL . '/Admin');
        }else {
            if($_SESSION['level'] == "kepala_sekolah")
            {
                header('Location: ' . BASE_URL . '/Kespek');
            }else {
                header('Location: ' . BASE_URL . '/Siswa');
            }
        }
    }

    public function logout() {
        unset($_SESSION['id_akun']);
        unset($_SESSION['username']);
        Flasher::setFlash('Berhasil', 'Logout', 'success');
        header('Location: ' . BASE_URL . '/auth');
    }
}