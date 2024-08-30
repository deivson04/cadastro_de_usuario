<?php

require_once "../model/usuarioRepository.php";
require_once "../object/classUsuario.php";

$objectUsuario = new Usuario();
$objectUsuario->setId_usuario($_GET["id_usuario"]);

$deletarUsuario = new UsuarioRepository();

$deletar = $deletarUsuario->deletarUsuario($objectUsuario);

if ($deletar === TRUE) {
    echo "Registro deletado com sucesso";

} else {
    echo "Error no sql" . $deletar;
}
echo "<br><a href='../view/home.php'>Voltar a home</a>";