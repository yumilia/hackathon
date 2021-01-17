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
        <?= $_SESSION['name']?>
    </body>
</html>