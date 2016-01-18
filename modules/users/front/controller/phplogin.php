<?php

require '../../../../classes/AutoLoad.php';
$params['alias'] = Request::req('alias');
$params['password'] = sha1(Request::req('password'));


$db = new Database();
$manager = new ManagerUser($db);
$user = $manager->login($params);

if(!$user){
    header('Location:../../login.php');
    exit();
}else{
    $session = new Session();
    $session->set('_user', $user);
    header('Location:../');
    exit();
}

