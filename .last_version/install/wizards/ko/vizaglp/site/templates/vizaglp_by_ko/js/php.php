<?
if (isset($_POST['phone'])) {$phone = $_POST['phone'];}
if (isset($_POST['email'])) {$email = $_POST['email'];}
if (isset($_POST['name'])) {$name = $_POST['name'];}

$address = "zerakul87@mail.ru, linamrrmrr@gmail.com";

$sub = 'Заявка с сайта Make-Up';

$mes = 
$name.$phone.$email;


$send = mail($address,$sub,$mes,"Content-type:text/plain; charset = utf-8\r\nFrom:zayavka@linamakeup.ru");