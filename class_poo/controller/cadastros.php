<?php

require_once "../model/usuarioRepository.php";
require_once "../object/Usuario.php";
require_once "../fachada/Fachada.php";

$objectUsuario = new Usuario();

$objectUsuario->setNome($_POST["nome"]);
$objectUsuario->setEmail($_POST["email"]);
$objectUsuario->setIdade($_POST["idade"]);
$objectUsuario->setSenha($_POST["senha"]);

$cadastrarUsuario = new UsuarioRepository();

$fachada = new Fachada();



$verificarEmail = $fachada->verificarUsuarioExistente($objectUsuario);

if ($verificarEmail->num_rows > 0) {
    echo "O email já está cadastrado";
} else {
    $cadastro = $cadastrarUsuario->cadastrarUsuario($objectUsuario);

    if ($cadastro === TRUE) {
        echo "Usuário cadastrado com sucesso";
    } else {
        echo "Erro no SQL: <br>" . $cadastro;
    }
}


echo "<br><a href='../index.html'>Voltar ao login</a>";
