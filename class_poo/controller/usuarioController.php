<?php
require_once "../model/usuarioRepository.php";
require_once "../object/classUsuario.php";

class UsuarioController
{

    private $usuarioRepository;
    private $objectUsuario;

    public function __construct()
    {
        $this->usuarioRepository = new UsuarioRepository();
        $this->objectUsuario = new Usuario();
    }

    public function buscarUsuario($objectUsuario)
    {

        $objectUsuario->setId_usuario($_GET["id_usuario"]);
        return $this->usuarioRepository->buscarUsuario($objectUsuario);
    }

    public function listarUsuarios($objectFiltro)
    {

        $buscar_nome = "";
        $buscar_idade = "";

        if ($objectFiltro->getNome() !== null) {
            $busca = $objectFiltro->getNome();
            $buscar_nome = " and nome like '%$busca%'";
        }

        if ($objectFiltro->getIdadeDe() !== null && $objectFiltro->getIdadeAte() !== null) {

            $idade_de = $objectFiltro->getIdadeDe();
            $idade_ate = $objectFiltro->getIdadeAte();

            $buscar_idade = " and idade BETWEEN '$idade_de' and '$idade_ate' ";
        }

        return $this->usuarioRepository->listarUsuarios($buscar_nome, $buscar_idade);
    }


    public function usuariosRestaurados()
    {
        return $this->usuarioRepository->usuariosRestaurados();
    }

    public function verificarUsuarioExistente($objectUsuario)
    {


        if (isset($_GET["email"])) {
            $objectUsuario->setEmail($_GET["email"]);
        }
        return $this->usuarioRepository->verificarUsuarioExistente($objectUsuario);
    }
}
