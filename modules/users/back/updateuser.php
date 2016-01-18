<?php
require '../../../classes/AutoLoad.php';
$session = new Session();
$user = $session->getUser();
if (!$user || $user->getActive() == 0) {
    header('Location:../login.php');
}
$params = Request::reqFull();
$db = new Database();
$manager = new ManagerUser($db);
$item = $manager->selec($params);
$db->close();
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
            <h2>Actualización de usuario</h2>
            <form method="POST" action="controller/phpupdateuser.php" id="form">
                <input type="hidden" name="pk" value="<?= $item->getEmail(); ?>"/><br/>
                <label>Email: <input type="text" name="email" value="<?= $item->getEmail(); ?>"/></label><br/>
                <label>Alias: <input type="text" name="alias" value="<?= $item->getAlias(); ?>"/></label><br/>
                <label>Administrador: <input type="checkbox" name="administrator" value="1" <?php if($item->getAdministrator()==1){ ?> checked<?php } ?> /></label><br/>
                <label>Personal: <input type="checkbox" name="personal" value="1" <?php if($item->getPersonal()==1){ ?> checked<?php } ?> /></label><br/>
                <input type="submit" value="ACEPTAR" class="action"/>          
            </form>
        </div>
    </body>
</html>
