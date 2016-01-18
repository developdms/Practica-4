<?php

require '../../../../classes/AutoLoad.php';

$request = Request::reqFull();

$db = new Database();
$manager = new ManagerUser($db);
$user = $manager->get($request['email']);
$user->setActive(0);
$res = $manager->set($user);
header("Location:../readuser.php?r=1&op=delete");


