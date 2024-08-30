<?php

require_once "../model/usuarioRepository.php";
require_once "../object/classUsuario.php";

$objectUsuario = new Usuario();

$objectUsuario->setNome($_POST["nome"]);
$objectUsuario->setEmail($_POST["email"]);
$objectUsuario->setIdade($_POST["idade"]);
$objectUsuario->setSenha($_POST["senha"]);

$cadastrarUsuario = new UsuarioRepository();

$cadastro = $cadastrarUsuario->cadastrarUsuario($objectUsuario);

if ($cadastro === TRUE) {
    echo "Usuario cadastrado com sucesso";
} else {
    echo "Error no sql <br> " . $cadastro;
}

echo "<br><a href='../index.html'>Voltar ao login</a>";
