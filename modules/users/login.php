<?php
require '../../classes/AutoLoad.php';
    $session = new Session();
    $user = $session->getUser();
    if($user !== NULL){
        header('Location:front/');
    }
    $mensaje = '';
    $r = Request::get('r');
    if($r == '2'){
        $mensaje = 'Las contraseñas no coinciden';
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="css/style.css"/>
    </head>
    <body>
        <div id="wrapper">
            <h3><?= $mensaje ?></h3>
            <a href="back/adduser.php" class="linkprofile">Crear perfil</a>
            <h2>Login</h2>
            <?php if($r == '1'){?>
            <h3>Operacion realizada correctamente</h3>
            <?php } if($r == '0'){?>
            <h3>La operacion no ha podido realizarse</h3>
            <?php } ?>
               <form method="POST" action="front/controller/phplogin.php">
                <label>Alias: </label><input type="text" name="alias"/><br/>
                <label>Password: </label><input type="password" name="password"/>
                <button>ENTRAR</button>
            </form>
        </div>
    </body>
</html>
