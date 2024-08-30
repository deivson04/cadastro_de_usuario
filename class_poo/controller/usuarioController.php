<?php
require_once "../model/usuarioRepository.php";
require_once "../object/classUsuario.php";

class UsuarioController
{

    private $usuarioRepository;

    public function __construct()
    {
        $this->usuarioRepository = new UsuarioRepository();
    }

    public function buscarUsuario($objectUsuario)
    {
        $objectUsuario = new Usuario();
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
}
