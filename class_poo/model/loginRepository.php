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
                   *
                FROM usuario
                WHERE email = '$email' and senha = '$senha' ";
        $result = $this->conn->query($sql);
        return $result->fetch_assoc();
    }
}
