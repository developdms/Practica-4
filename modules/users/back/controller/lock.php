<?php

require '../../../../classes/AutoLoad.php';

$params['alias'] = Request::req('user');
$time = Request::req('time');

$db = new Database();
$manager = new ManagerUser($db);

$user = $manager->selec($params);
$user->setActive(0);

$res =$manager->set($user);

header("Location:../readuser.php?r=$res&op=lock");




