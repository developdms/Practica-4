<?php

require '../classes/AutoLoad.php';

date_default_timezone_set('Europe/Madrid');

$mysql = new mysqli(Constan::SERVER, Constan::DBUSER, Constan::DBPASSWORD);
$res = $mysql->query(FileManager::read('sql/sql.sql'));

if ($res == 1 || $res != 1) {
    $ms = scandir('../modules');
    $mysql = new mysqli(Constan::SERVER, Constan::DBUSER, Constan::DBPASSWORD, Constan::DATABASE);
    foreach ($ms as $key => $value) {
        if ($value !== '.' && $value !== '..') {
            if (is_dir('../modules/' . $value)) {
                $res = $mysql->query(FileManager::read('../modules/' . $value . '/sql/table.sql'));
                $mysql->query(FileManager::read('../modules/' . $value . '/sql/user.sql'));
     
            }
        }
    }
}

header('Location:../modules/users/login.php');

