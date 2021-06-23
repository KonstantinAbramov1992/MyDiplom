<?php
    class Home extends Controller {
        public function index()
        {
            $data = [];

            if (isset($_POST['shortLink'])) {
                $link = $this->model('LinksModel');
                $link->setData($_POST['link'], $_POST['shortLink'], $_COOKIE['login']);
                $isValid = $link->validateLink();

                if ($isValid == 'ok') {
                    $link->saveLink();
                    echo $isValid;
                } else
                    echo $isValid;
            }
            elseif(isset($_POST['id'])) {

                $link = $this->model('LinksModel');
                echo $link->deleteLink($_POST['id']);

            } elseif (isset($_COOKIE['login'])) {

                $links = $this->model('LinksModel');
                $data['links'] = $links->getLinks($_COOKIE['login']);

                $this->view('home/index', $data);

            } else
                $this->view('user/reg');
        }
    }