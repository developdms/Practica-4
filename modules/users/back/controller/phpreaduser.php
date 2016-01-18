<?php

require '../../../../classes/AutoLoad.php';


$session = new Session();
$user = $session->getUser();

if($user === NULL){
    header('Location:../login.php');
    exit();
}

/*
$request = Request::reqFull();

$db = new Database();
$manager = new ManagerUser($db);
$user = $manager->get($request['email']);
$user->set($request);
$res = $manager->set($user);
 * 
 */
?>
