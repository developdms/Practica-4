<?php
require '../../../classes/AutoLoad.php';
$session = new Session();
$user = $session->getUser();
if (!$user || $user->getActive() == 0) {
    header('Location:../login.php');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        if ($user->getAdministrator() == 1 || $user->getPersonal() == 1) {
            ?>
        <a href="../back/readuser.php">Ver usuarios</a>
        <a href="../back/adduser.php">Nuevo usuario</a>
        <?php } ?>
        <a href="../back/updateuser.php?email=<?= $user->getEmail()?>">Editar perfil</a>
        <a href="../back/deleteuser.php?email=<?= $user->getEmail()?>">Darme de baja</a>
        <a href="controller/logout.php">Salir</a>
    </body>
</html>
