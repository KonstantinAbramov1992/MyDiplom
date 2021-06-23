<?php
    require 'DB.php';

    class UserModel {
        private $login;
        private $email;
        private $pass;

        private $_db = null;

        public function __construct() {
            $this->_db = DB::getInstence();
        }

        public function setData($login, $email, $pass) {
            $this->login = trim(filter_var($login, FILTER_SANITIZE_STRING));
            $this->email = trim(filter_var($email, FILTER_SANITIZE_EMAIL));
            $this->pass = trim(filter_var($pass, FILTER_SANITIZE_STRING));
        }

        public function validForm() {
            $sql = "SELECT * FROM `users` WHERE `login` = :login OR `email` = :email";
            $query = $this->_db->prepare($sql);
            $query->execute(['login' => $this->login, 'email' => $this->email]);
            $result = $query->fetch(PDO::FETCH_ASSOC);

            if($this->email == '')
                return 'Введите email';
            elseif($result['email'] == $this->email)
                return "Пользователь c таким Email уже есть";
            elseif (strlen($this->login) < 3)
                return "Login слишком короткий";
            elseif ($result['login'] == $this->login)
                return "Пользователь c таким Login уже есть";
            else if(!filter_var($this->email, FILTER_VALIDATE_EMAIL))
                return "Email не верный";
            else if(strlen($this->pass) < 3)
                return "Пароль не менее 3 символов";
            else
                return "ok";
        }

        public function addUser() {
            $sql = 'INSERT INTO users(login, email, pass) VALUES(:login, :email, :pass)';
            $query = $this->_db->prepare($sql);

            $pass = password_hash($this->pass, PASSWORD_DEFAULT);
            $query->execute(['login' => $this->login, 'email' => $this->email, 'pass' => $pass]);

            $this->setAuth($this->email);
        }

        public function getUser() {
            $email = $_COOKIE['login'];
            $result = $this->_db->query("SELECT * FROM `users` WHERE `email` = '$email'");
            return $result->fetch(PDO::FETCH_ASSOC);
        }

        public function logOut() {
            setcookie('login', $this->email, time() - 3600 * 24, '/');
            unset($_COOKIE['login']);
            header('Location: /user/auth');
        }

        public function auth($email, $pass) {
            $sql = "SELECT * FROM `users` WHERE `email` = :email";
            $query = $this->_db->prepare($sql);
            $query->execute(['email' => $email]);
            $user = $query->fetch(PDO::FETCH_ASSOC);

            if($user['email'] == '')
                return 'Пользователя с таким email не существует';
            else if(password_verify($pass, $user['pass'])) {
                $this->setAuth($email);
                return 'ok';
            } else
                return 'Пароли не совпадают';
        }

        public function setAuth($email) {
            setcookie('login', $email, time() + 3600 * 24*30, '/');
        }

    }