<?php
    class S extends Controller {
        public function index() {
            $data = func_get_args();
            $link = $this->model('LinksModel');
            $data = $link->getLink($data[0])['long_name'];

            header("Location: $data");
        }
    }