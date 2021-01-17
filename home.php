<?php
    session_start();
    if(!isset($_SESSION['name'])) {
        header('Location: index.php?erro=2');
    }
?>
<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>
        <h1>Usuário autenticado<br></h1>
        <?= $_SESSION['name']?>
    </body>
</html>