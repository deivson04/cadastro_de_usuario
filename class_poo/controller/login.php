<?php

require_once "../model/loginRepository.php";
require_once "../object/classLogin.php";

$objectLogin = new Login();

$objectLogin->setEmail($_POST["email"]);
$objectLogin->setSenha($_POST["senha"]);

$verificarLogin = new LoginRepository();

$row = $verificarLogin->verificarLogin($objectLogin);

if ($row) {
    header("Location: ../view/home.php");
} else {
    echo "Login ou Senha invalidas";
}

echo "<br><a href='../index.html'>Voltar ao login</a>";