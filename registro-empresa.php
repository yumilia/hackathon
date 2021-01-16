<?php
require_once('db.class.php');
//Resgatar informações
$name = $_POST['name'];
$cnpj = $_POST['cnpj'];
$password = md5($_POST['password']);
$description = $_POST['description'];
$logo = $_FILES['logo'];
// FILTROS
// ////////////////////////////

// Tratamento imagem
if($logo != NULL) {
    $nomeFinal = time().'.jpg';
    if (move_uploaded_file($logo['tmp_name'], $nomeFinal)) {
        $tamanhoImg = filesize($nomeFinal);

        $mysqlImg = addslashes(fread(fopen($nomeFinal, "r"), $tamanhoImg));
        // Linkar ao db
        $db = new db;
        $link = $db->connect_mysql();
        $sql = "INSERT INTO empresas(nome, descricao, cnpj, logo, senha) VALUES ('$name', '$description', '$cnpj', '$mysqlImg', '$password')";

        mysqli_query($link, $sql) or die("Erro ao registrar a empresa!");
        
        unlink($nomeFinal);
        header("location:exibir.php");
    }
}
