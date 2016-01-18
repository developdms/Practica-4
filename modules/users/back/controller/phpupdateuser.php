<?php

require '../../../../classes/AutoLoad.php';

$session = new Session();
$user = $session->getUser();

if($user === NULL){
    header('Location:../login.php');
    exit();
}


$request = Request::reqFull();

if(Request::req('administrator') == NULL){
    $request['administrator'] = 0;
}
if(!Request::req('personal') == NULL){
    $request['personal'] = 0;
}
$db = new Database();
$manager = new ManagerUser($db);
$user = $manager->get($request['pk']);
$user->set($request);

$res = $manager->set($user);

header("Location:../readuser.php?r=$res&op=update");

?>