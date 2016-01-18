<?php

require '../../../../classes/AutoLoad.php';

$params['alias'] = Request::req('user');
$time = Request::req('time');

$db = new Database();
$manager = new ManagerUser($db);

$user = $manager->unlock($params);
$res = $user->setActive(1);

header("Location:../../login.php?r=$res&op=unlock");
    

