<?php
require '../../../classes/AutoLoad.php';
$session = new Session();
$user = $session->getUser();

if($user === NULL){
    header('Location:../login.php');
    exit();
}

$params = Request::reqFull();
$mensaje = Messages::getMessage($params);

$db = new Database();
$manager = new ManagerUser($db);
$params = array();
$params['administrator'] = 1;
$admins = $manager->getList($params);
$params = array();
$params['personal'] = 1;
$personal = $manager->getList($params);
$params = array();
$params['administrator'] = 0;
$params['personal'] = 0;
$normal = $manager->getList($params);

?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="../css/style.css"/>
        <script src="../js/process.js"></script>
    </head>
    <body>
        <div id="wrapper">
            <?php require './header.php'; ?>
            <h2>Listado de usuarios</h2>
            <h3><?= $mensaje?></h3>
            <div id="admin">
                <h2>Administradores</h2>
                <?php if(count($admins) == 0){ ?>
                <p>No existen usuarios</p>
                <?php }else { ?> 
                <div class="flx"><span>Alias</span><span>Correo electrónico</span><span>Activo</span></div>
                    <?php foreach ($admins as $value) { ?>
                <div class="flx"><span><?= $value->getAlias() ?></span><span><?= $value->getEmail() ?></span><span><?= $value->getActive() ?></span><div><a href="updateuser.php?email=<?= $value->getEmail(); ?>">  Editar </a><a href="controller/lock.php?user=<?= $value->getEmail(); ?>" class="delete"> Eliminar</a></div></div>
                <?php } }?>
            </div>
            <div id="personal">
                <h2>Personal</h2>
                <?php if(count($personal) == 0){ ?>
                <p>No existen usuarios</p>
                <?php }else { ?> 
                <div class="flx"><span>Alias</span><span>Correo electrónico</span><span>Activo</span></div>
                    <?php foreach ($personal as $value) { ?>
                <div class="flx"><span><?= $value->getAlias() ?></span><span><?= $value->getEmail() ?></span><span><?= $value->getActive() ?></span><div><a href="updateuser.php?email=<?= $value->getEmail(); ?>">  Editar </a><a href="controller/lock.php?user=<?= $value->getEmail(); ?>" class="delete"> Eliminar</a></div></div>
                <?php } }?>
            <div id="normal">
                <h2>Sin privilegios</h2>
                <?php if(count($normal) == 0){ ?>
                <p>No existen usuarios</p>
                <?php }else { ?> 
                <div class="flx"><span>Alias</span><span>Correo electrónico</span><span>Activo</span></div>
                    <?php foreach ($normal as $value) { ?>
                <div class="flx"><span><?= $value->getAlias() ?></span><span><?= $value->getEmail() ?></span><span><?= $value->getActive() ?></span><div><a href="updateuser.php?email=<?= $value->getEmail(); ?>">  Editar </a><a href="controller/lock.php?user=<?= $value->getEmail(); ?>" class="delete"> Eliminar</a></div></div>
                <?php } }?>
        </div>
    </body>
</html>
