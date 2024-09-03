<?php
require_once "conexao.php";

class UsuarioRepository
{
    private $conn;

    public function __construct()
    {

        $conexao = new ConexaoDB();

        $this->conn = $conexao->conectarBanco();
    }

    public function cadastrarUsuario($objectUsuario)
    {
        $nome = $objectUsuario->getNome();
        $email = $objectUsuario->getEmail();
        $idade = $objectUsuario->getIdade();
        $senha = $objectUsuario->getSenha();


        $sql = "INSERT INTO usuario (nome, email, idade, senha)
                   VALUES 
        ('$nome', '$email', '$idade', '$senha')";

        return $this->conn->query($sql);
    }

    public function buscarUsuario($objectUsuario)
    {
        $id_usuario = $objectUsuario->getId_usuario();

        $sql = "SELECT
                  *
                FROM usuario
                WHERE id_usuario = $id_usuario";

        $result = $this->conn->query($sql);
        return $result->fetch_assoc();
    }

    public function atualizarUsuarios($objectUsuario)
    {
        $id_usuario = $objectUsuario->getId_usuario();
        $nome = $objectUsuario->getNome();
        $email = $objectUsuario->getEmail();
        $idade = $objectUsuario->getIdade();
        $senha = $objectUsuario->getSenha();

        $sql = " UPDATE usuario
                 SET nome = '$nome', email = '$email', idade = '$idade', senha = '$senha'
                 WHERE id_usuario = $id_usuario";

        return $this->conn->query($sql);
    }

    public function deletarUsuario($objectUsuario)
    {
        $id_usuario = $objectUsuario->getId_usuario();

        date_default_timezone_set('America/Recife');
        $data = date('Y-m-d H:i:s');

        $sql = " UPDATE usuario
                 SET deleted_at = '$data'
                 WHERE id_usuario = $id_usuario";
        return $this->conn->query($sql);
    }

    public function restoreUsuario($objectUsuario)
    {
        $id_usuario = $objectUsuario->getId_usuario();

        $sql = " UPDATE usuario
                 SET deleted_at = null    
                 WHERE id_usuario = $id_usuario";
        return $this->conn->query($sql);
    }

    public function usuariosRestaurados()
    {
        $sql = " SELECT 
                    *
                 FROM usuario
                 WHERE deleted_at is not null";
        $result =  $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function listarUsuarios($buscar_nome, $buscar_idade)
    {

        $sql = "SELECT
                  *  
                FROM usuario
                WHERE deleted_at is null
                $buscar_nome
                $buscar_idade";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function verificarUsuarioExistente($objectUsuario)
    {
        $email = $objectUsuario->getEmail();

        $sql = " SELECT
                    *
                 FROM usuario
                 WHERE email = '$email'";
        return $this->conn->query($sql);
    }
}
