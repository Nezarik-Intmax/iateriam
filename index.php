<?php
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

/*
$mail = new PHPMailer;

$name = isset( $_POST['name'] );
$email = isset( $_POST['email'] );
$phone = isset( $_POST['phone'] );

$mail->IsSMTP();
$mail->Host			= "smtp.gmail.com";
$mail->SMTPAuth		= true;
$mail->SMTPSecure	= "ssl";
$mail->Port			= 465;
$mail->CharSet		= 'UTF-8';
$body = file_get_contents('happy.txt');
$mail->Username		= "nezarikintmax";
$mail->Password		= "pfgjvyb3";
$mail->SetFrom('nezarikintmax@gmail.com', 'lorem lorem ipsum lorem');
$mail->Subject		= "Отправка письма с Mail";
$mail->Body 		= "gdfg";
$mail->MsgHTML($body);
$address = "nezarikintmax@gmail.com";
$mail->AddAddress($address, "DFSFDASF");

if($mail->Send()){
	echo 'Mess send';
}else{
	echo 'Mess no send';
	//mail($email, 'Тема сообщения', $name);
}*/
 /* This file is part of MODX Revolution.
 *
 * Copyright (c) MODX, LLC. All Rights Reserved.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

$tstart= microtime(true);

/* define this as true in another entry file, then include this file to simply access the API
 * without executing the MODX request handler */
if (!defined('MODX_API_MODE')) {
    define('MODX_API_MODE', false);
}

/* this can be used to disable caching in MODX absolutely */
$modx_cache_disabled= false;

/* include custom core config and define core path */
@include(dirname(__FILE__) . '/config.core.php');
if (!defined('MODX_CORE_PATH')) define('MODX_CORE_PATH', dirname(__FILE__) . '/core/');

/* include the modX class */
if (!@include_once (MODX_CORE_PATH . "model/modx/modx.class.php")) {
    $errorMessage = 'Site temporarily unavailable';
    @include(MODX_CORE_PATH . 'error/unavailable.include.php');
    header($_SERVER['SERVER_PROTOCOL'] . ' 503 Service Unavailable');
    echo "<html><title>Error 503: Site temporarily unavailable</title><body><h1>Error 503</h1><p>{$errorMessage}</p></body></html>";
    exit();
}

/* start output buffering */
ob_start();

/* Create an instance of the modX class */
$modx= new modX();
if (!is_object($modx) || !($modx instanceof modX)) {
    ob_get_level() && @ob_end_flush();
    $errorMessage = '<a href="setup/">MODX not installed. Install now?</a>';
    @include(MODX_CORE_PATH . 'error/unavailable.include.php');
    header($_SERVER['SERVER_PROTOCOL'] . ' 503 Service Unavailable');
    echo "<html><title>Error 503: Site temporarily unavailable</title><body><h1>Error 503</h1><p>{$errorMessage}</p></body></html>";
    exit();
}

/* Set the actual start time */
$modx->startTime= $tstart;

/* Initialize the default 'web' context */
$modx->initialize('web');

/* execute the request handler */
if (!MODX_API_MODE) {
    $modx->handleRequest();
}
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
    $mail->Subject     = "Тест php mailer";
    $mail->ContentType = "text/html; charset=utf-8\r\n";
//адрес почтового ящика gmail
    $mail->Username   = "nezarikintmax@gmail.com";
//ваш пароль от ящика
    $mail->Password   = 'pfgjvyb3';
    $mail->isHTML(true);
//текст письма
    $mail->Body = "привет от Phpmailer";
    $mail->WordWrap = 50;
//адрес, на котоый нужно отправить письмо
    $mail->AddAddress("nezarikintmax@gmail.com");
    if(!$mail->send()) {
      echo 'ошибка';
      exit;
    }
    echo 'сообщение отправлено';
	
?>
