<?php
require_once('db.class.php');
//Resgatar informações
$name = $_POST['name'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = md5($_POST['password']);
$cpf = $_POST['cpf'];
$birthday = $_POST['birthday'];
$image = $_FILES['image'];

// FILTROS
// ////////////////////////////

// Tratamento imagem
if($image != NULL) {
    $nomeFinal = time().'.jpg';
    if (move_uploaded_file($image['tmp_name'], $nomeFinal)) {
        $tamanhoImg = filesize($nomeFinal);

        $mysqlImg = addslashes(fread(fopen($nomeFinal, "r"), $tamanhoImg));

        // Linkar ao db
        $db = new db;
        $link = $db->connect_mysql();
        $sql = "INSERT INTO student(name, username, email, password, birthday, cpf, image) VALUES ('$name', '$username', '$email', '$password', '$birthday', '$cpf', '$mysqlImg')";

        mysqli_query($link, $sql) or die("Erro ao efetuar o cadastro!");
    } else {
        // Linkar ao db
        $db = new db;
        $link = $db->connect_mysql();
        $sql = "INSERT INTO student(name, username, email, password, birthday, cpf) VALUES ('$name', '$username', '$email', '$password', '$birthday', '$cpf')";

        mysqli_query($link, $sql) or die("Erro ao efetuar o cadastro!");
    }
}