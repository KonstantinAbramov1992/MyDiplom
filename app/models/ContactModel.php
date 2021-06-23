<?php
date_default_timezone_set('Etc/UTC');
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

    class ContactModel {
        private $email;
        private $login;
        private $age;
        private $message;

        public function setData($email, $login, $age, $message) {
            $this->login = trim(filter_var($login, FILTER_SANITIZE_STRING));
            $this->email = trim(filter_var($email, FILTER_SANITIZE_EMAIL));
            $this->message = trim(filter_var($message, FILTER_SANITIZE_STRING));
            $this->age = trim(filter_var($age, FILTER_SANITIZE_STRING));
        }

        public function validForm() {
            $this->age *= 1;
            if (strlen($this->login) < 3)
                return "Имя слишком короткое";
            else if(!filter_var($this->email, FILTER_VALIDATE_EMAIL))
                return "Email не верный";
            else if (!is_int($this->age))
                return "Возраст должен быть числом";
            else if ($this->age < 18 && $this->age > 120)
                return "Возраст должен быть от 18 до 120";
            else if (strlen($this->message) < 10)
                return "В сообщении должно быть хотя-бы 10 символов";
            else
                return 'ok';
        }

        public function sendMessage() {

            $password = file_get_contents('password.txt');

            $mail = new PHPMailer;

            $mail->isSMTP();

            $mail->SMTPDebug = 0;

            $mail->Host = 'smtp.gmail.com';

            $mail->Port = 587;

            $mail->SMTPSecure = 'tls';

            $mail->SMTPAuth = true;

            $mail->CharSet = "utf-8";

            $mail->Username = "abramovk.a1992@gmail.com";

            $mail->Password = $password;

            $mail->setFrom($this->email, $this->email);

            $mail->addReplyTo($this->email, $this->login);

            $mail->addAddress('AbramovK_A@mail.ru', 'Konstantin Abramov');

            $mail->Subject = 'Сообщение с сайта сокращения ссылок';

            $mail->msgHTML($this->message, dirname(__FILE__));

            $mail->AltBody = 'This is a plain-text message body';

            if (!$mail->send()) {
                return "Сообщение не отправлено! Причина: " . $mail->ErrorInfo;
            } else {
                return "Сообщение отправлено!";
            }
        }
    }