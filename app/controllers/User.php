<?php
    class User extends Controller {
        public function reg() {
            if(isset($_POST['login'])) {
                $user = $this->model('UserModel');
                $user->setData($_POST['login'], $_POST['email'], $_POST['pass']);

                $isValid = $user->validForm();
                if($isValid == "ok") {
                    $user->addUser();
                    echo $isValid;
                } else
                    echo $isValid;
            } else
                $this->view('user/reg');
        }

        public function auth() {
            $data = [];
            if(isset($_POST['email'])) {
                $user = $this->model('UserModel');
                echo $user->auth($_POST['email'], $_POST['pass']);;
            } else
                $this->view('user/auth', $data);
        }

        public function dashboard() {

            $user = $this->model('UserModel');

            $data = ['user' => $user->getUser()];

            if(isset($_POST['exit_btn'])) {
                $user->logOut();
                exit();
            }

            $this->view('user/dashboard', $data);
        }
    }