<?php

require_once "conexao.php";

class LoginRepository
{

    private $conn;

    public function __construct()
    {

        $conexao = new ConexaoDB();

        $this->conn = $conexao->conectarBanco();
    }


    public function verificarLogin($objectLogin)
    {
        $email = $objectLogin->getEmail();
        $senha = $objectLogin->getSenha();

        $sql = " SELECT
                   u.id_usuario, u.nome
                FROM usuario u
                JOIN login l
                ON u.id_usuario = l.id_usuario
                WHERE u.email = :email and u.senha = :senha ";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":senha", $senha);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function cadastrarLogin($id_usuario)
    {

        $sqlLogin = "INSERT INTO login (id_usuario) 
                            VALUE (:id_usuario)";
        $stmtLogin = $this->conn->prepare($sqlLogin);

        $stmtLogin->bindParam(":id_usuario", $id_usuario);

        return $stmtLogin->execute();
    }
}
