<?php
session_start();

require_once "../model/loginRepository.php";
require_once "../object/Login.php";

$objectLogin = new Login();

$objectLogin->setEmail($_POST["email"]);
$objectLogin->setSenha($_POST["senha"]);

$verificarLogin = new LoginRepository();

$row = $verificarLogin->verificarLogin($objectLogin);

if ($row) {

    $_SESSION["nome"] = $row["nome"];
    $_SESSION["id_usuario"] = $row["id_usuario"];

    header("Location: ../view/home.php");
} else {
    echo "Login ou Senha invalidas";
}

echo "<br><a href='../index.html'>Voltar ao login</a>";