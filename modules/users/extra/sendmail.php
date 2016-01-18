<?php

session_start();
require_once '../../../classes/Constan.php';
require_once '../../../classes/Encryption.php';
require_once '../../../classes/Server.php';
require_once '../../../classes/Request.php';
require_once '../../../classes/Mailer.php';
require_once '../../../classes/Google/autoload.php';
require_once '../../../classes/class.phpmailer.php';  //las últimas versiones también vienen con autoload

$request = Request::reqFull();

$client = new Google_Client();
$mailer = new Mailer($client);

$origen = '';
$alias= '';
$destino=$request['email'];
$asunto ='ACTIVACIÓN DE CUENTA';
$mensaje ="http://".Server::getServerHost().'/usuarios/modules/users/back/controller/unlock.php?user='. $request['user'].'&time='.  $request['time'];

$res = $mailer->sendMail($origen, $alias, $destino, $asunto, $mensaje);

header('Location:../login.php');

?>

