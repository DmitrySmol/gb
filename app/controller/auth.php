<?php
class Auth extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function login()
    {
        if ( isset($_POST['username']) && isset($_POST['password']) ) {
            if ( $this->authorize($_POST['username'], $_POST['password']) ) {
                redirect(baseUrl());
            }
        }

        $this->view('login', $this->data);
    }

    public function logout()
    {
        unset($_SESSION['user']);
        redirect(baseUrl());
    }

    public function authorize($username, $password)
    {
        $username = clean($username);
        $password = clean($password);

        unset($_SESSION['error']);

        if ($username != 'admin') {
            $_SESSION['error'] = 'Вход только для администратора';
            return false;
        }

        if ( $password != '123' ) {
            $_SESSION['error'] = 'Введён неверный пароль';
            return false;
        }

        $user = ['id' => '1', 'username' => 'admin', 'role_id' => '1'];
        $_SESSION['user'] = $user;

        return true;
    }

}
