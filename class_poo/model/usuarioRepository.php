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
        $id_usuario = $objectUsuario->getIdUsuario();

        $sql = "SELECT
                  *
                FROM usuario
                WHERE id_usuario = :id_usuario";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id_usuario", $id_usuario);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function atualizarUsuarios($objectUsuario)
    {
        $id_usuario = $objectUsuario->getIdUsuario();
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
        $id_usuario = $objectUsuario->getIdUsuario();

        date_default_timezone_set('America/Recife');
        $data = date('Y-m-d H:i:s');

        $sql = " UPDATE usuario
                 SET deleted_at = '$data'
                 WHERE id_usuario = $id_usuario";
        return $this->conn->query($sql);
    }

    public function restoreUsuario($objectUsuario)
    {
        $id_usuario = $objectUsuario->getIdUsuario();

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
       $stmt = $this->conn->prepare($sql);
       $stmt->execute();
       return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function listarUsuarios($buscar_nome, $buscar_idade)
    {

        $sql = "SELECT
                  *  
                FROM usuario
                WHERE deleted_at is null
                $buscar_nome
                $buscar_idade";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
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
