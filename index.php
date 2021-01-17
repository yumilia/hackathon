<?php
    $erro = isset($_GET['erro']) ? $_GET['erro'] : 0;
?>
<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>
            <a href="quero-ser-parceira.php">quero ser empresa parceira</a>
            <a href="quero-ser-aluno.php">quero ser aluno</a>
            <form method="post" action="valida-aluno.php" id="loginStudent">
                <input type="text" name="username">
                <input type="password" name="password">
                <input type="submit">
                <?php
                    if($erro == 1) {
                        echo 'Usuário ou senha inválido';
                    }
                ?>
            </form>

    </body>
</html>