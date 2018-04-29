<?php
// Файлы phpmailer
require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/OAuth.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/POP3.php';
require 'PHPMailer-master/src/SMTP.php';

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\OAuth;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\POP3;
use PHPMailer\PHPMailer\SMTP;
// Переменные
echo 'lol';
if($_SERVER['REQUEST_METHOD'] == 'POST') {
$name = $_POST['name'];
$number = $_POST['phone'];
$email = $_POST['mail'];
echo $email;
$textmes = $_POST['description'];
// Настройки
//получаем экземпляр
    $mail = new PHPMailer();
//задаём как  работать с SMTP сервером
    $mail->IsSMTP();
//адрес smtp сервера
    $mail->Host       = "smtp.gmail.com";
//сообщения дебагера, 0-не показываем
    $mail->SMTPDebug  = 0;
//если сервер требует авторизации
    $mail->SMTPAuth   = true;
//тип шифрования
    $mail->SMTPSecure = "ssl";
//порт сервера
    $mail->Port       = 465;
//приоритет почты, 3 - нормально
    $mail->Priority    = 3;
//кодировка
    $mail->CharSet     = 'UTF-8';
    $mail->Encoding    = '8bit';
//тема письма
    $mail->Subject     = "Заказ для iateriam";
    $mail->ContentType = "text/html; charset=utf-8\r\n";
//адрес почтового ящика gmail
    $mail->Username   = "something@mail.com";
//ваш пароль от ящика
    $mail->Password   = "password";
    $mail->isHTML(true);
    $mail->SetFrom($email, 'fdf');  // Адресант почтового сообщения
//текст письма
    $mail->Body = 'Имя: $name, phone: $phone, $textmes';
    $mail->WordWrap = 50;
//адрес, на котоый нужно отправить письмо
	echo $email+'41234';
    $mail->AddAddress('something@mail.com');
    if(!$mail->send()) {
      echo 'ошибка' . $mail->ErrorInfo;
      exit;
    }
    echo 'сообщение отправлено';
echo 'lol3';
}
echo 'lol7';
?>