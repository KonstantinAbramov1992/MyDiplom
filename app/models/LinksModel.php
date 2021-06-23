<?php
    require 'DB.php';

    class LinksModel {
        private $long_name;
        private $user_email;
        private $short_name;
        private $_db = null;

        public function __construct() {
            $this->_db = DB::getInstence();
        }

        public function setData($long_name, $short_name, $user_email) {
            $this->long_name = trim(filter_var($long_name, FILTER_SANITIZE_URL));
            $this->user_email = trim(filter_var($user_email, FILTER_SANITIZE_EMAIL));
            $this->short_name = trim(filter_var($short_name, FILTER_SANITIZE_STRING));
        }

        public function getLinks ($email) {
            $sql = "SELECT * FROM `links` WHERE `user_email` = :email";
            $query = $this->_db->prepare($sql);
            $query->execute(['email' => $email]);
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getLink ($short_name) {
            $sql = "SELECT `long_name` FROM `links` WHERE `short_name` = :short_name";
            $query = $this->_db->prepare($sql);
            $query->execute(['short_name' => $short_name]);

            return $query->fetch(PDO::FETCH_ASSOC);
        }

        public function validateLink() {
            $sql = "SELECT `short_name` FROM `links` WHERE `short_name` = :short_name";
            $query = $this->_db->prepare($sql);
            $query->execute(['short_name' => $this->short_name]);
            $result = $query->fetch(PDO::FETCH_ASSOC);

            if($result['short_name'] != '')
                return 'Такая короткая ссылка уже есть в базе';

            if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $this->long_name))
                return 'Неверный url';

            if (get_headers($this->long_name, 1)[0] != 'HTTP/1.1 404 Not Found')
                return 'ok';
            else
                return 'Ошибка 404';
        }

        public function saveLink() {
            $sql = "INSERT INTO links(long_name, short_name, user_email) VALUES(:long_name, :short_name, :user_email)";
            $query = $this->_db->prepare($sql);
            $query->execute(['long_name' => $this->long_name, 'short_name' => $this->short_name, 'user_email' => $this->user_email]);
        }

        public function deleteLink($id) {
            $sql = "DELETE FROM `links` WHERE `id` = :id";
            $query = $this->_db->prepare($sql);
            $query->execute(['id' => $id]);
            return 'ok';
        }

    }