<?php
    class Contact extends Controller {
        public function index() {

            if(isset($_POST['email'])) {
                $contact = $this->model('ContactModel');
                $contact->setData($_POST['email'], $_POST['login'], $_POST['age'], $_POST['message']);

                $isValid = $contact->validForm();

                if ($isValid == 'ok')
                    echo $contact->sendMessage();
                else
                    echo $isValid;

            } else
                $this->view('contact/index');
        }

        public function about() {
            $this->view('contact/about');
        }
    }