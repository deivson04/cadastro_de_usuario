<?php

require_once "../controller/usuarioController.php";

class Fachada
{

    ##################################################### usuario ####################################################

    public function buscarUsuario($objectUsuario)
    {
        $usuario = new UsuarioController();
        return $usuario->buscarUsuario($objectUsuario);
    }

    public function listarUsuarios($objectFiltro)
    {
        $usuario = new UsuarioController();
        return $usuario->listarUsuarios($objectFiltro);
    }

    public function usuariosRestaurados()
    {
        $usuario = new UsuarioController();
        return $usuario->usuariosRestaurados();
    }

    public function verificarUsuarioExistente($objectUsuario)
    {
        $usuario = new UsuarioController();
        return $usuario->verificarUsuarioExistente($objectUsuario);
    }
}
