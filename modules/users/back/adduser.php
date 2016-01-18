<?php
    require '../../../classes/AutoLoad.php';
    $session = new Session();
    $user = $session->getUser();
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="../css/style.css"/>
    </head>
    <body>
        <div id="wrapper">
            <h2>Nuevo usuario</h2>
        <form method="POST" action="controller/phpadduser.php">
        <label>Email: </label><input type="text" name="email"/><br/>
        <label>Alias: </label><input type="text" name="alias"/><br/>
        <label>Password: </label><input type="password" name="password"/><br/>
        <label>Repite password: </label><input type="password" name="rpassword"/><br/>
        <?php
            if($user !== NULL){
        ?>
        <label>Tipo de usuario: </label>
        <select name="rol">
            <?php if($user->getAdministrator() == 1){ ?>
            <option value="administrator">Administrador</option>
            <?php } ?>        
            <option value="personal">Personal</option>
            <option value="normal">Normal</option>
        </select>
            <?php } ?>
        <br/>
        <button>ACEPTAR</button>
        </form>
        </div>
    </body>
</html>
