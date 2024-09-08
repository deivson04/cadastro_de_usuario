<?php

require_once "../model/usuarioRepository.php";
require_once "../object/Usuario.php";

$objectUsuario = new Usuario();

$objectUsuario->setIdUsuario($_GET["id_usuario"]);

$restore = new UsuarioRepository();

$restraurar = $restore->restoreUsuario($objectUsuario);

if ($restraurar === TRUE) {
    header("Location: ../view/home.php");

} else {
    echo "Error no sql" . $restraurar;
}
echo "<br><a href='../view/home.php'>Voltar a home</a>";