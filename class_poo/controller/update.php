<?php
require_once "../model/usuarioRepository.php";
require_once "../object/classUsuario.php";

$objectUsuario = new Usuario();

$objectUsuario->setId_usuario($_POST["id_usuario"]);
$objectUsuario->setNome($_POST["nome"]);
$objectUsuario->setEmail($_POST["email"]);
$objectUsuario->setIdade($_POST["idade"]);
$objectUsuario->setSenha($_POST["senha"]);


$atualizarUsuario = new UsuarioRepository();

$atualizar = $atualizarUsuario->atualizarUsuarios($objectUsuario);

if ($atualizar === TRUE) {
    echo "Registro atualizado com sucesso";
} else {
    echo "Error no sql " . $atualizar;
}
echo "<br><a href='../view/home.php'>Voltar a home</a>";