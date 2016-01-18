<?php

require '../../../../classes/AutoLoad.php';

date_default_timezone_set('Europe/Madrid');
$db = new Database();
$manager = new ManagerUser($db);

$today = getdate();

$params['email'] = Request::req('email');
$params['password'] = sha1(Request::req('password'));
$rpass = sha1(Request::req('password'));

if($params['password'] != $rpass){
    header('Location:../../login.php?r=2');
    exit();
}

$params['alias'] = Request::req('alias');
$params['dischargeDate'] = $today['year'].'-'.$today['mon'].'-'.$today['mday']; 
$params['active'] = 0;
$params['administrator'] = 0;
$params['personal'] = 0;

if ($params['alias'] === '' || $params['alias'] === NULL) {
    $params['alias'] = $params['email']; 
}

if(Request::req('rol') == 'administrator'){
    $params['administrator'] = 1;
}else if(Request::req('rol') == 'personal'){
    $params['personal'] = 1;
}

$user = new User();
$user->set($params);
$r = $manager->insert($user);
$db->close();

if($r == 1){
    header('Location:../../extra/sendmail.php?user='.  Encryption::sha1Encrypt($params['alias']).'&email='.urlencode($params['email']).'&time='.Server::getRequestDate());
}



