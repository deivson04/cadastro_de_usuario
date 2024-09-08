<?php

class ConexaoDB {
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "db_usuario";

    public function conectarBanco() {
      try {
        return new PDO('mysql:dbname=' . $this->database . ';host=' . $this->servername . ';charset=UTF8', $this->username, $this->password);
      } catch (PDOException $e) {
          echo 'Erro ao conectar com o MySQL: ' . $e->getMessage();
      }
    }
}

// $conn = new ConexaoDB();
//  $conexao = $conn->conectarBanco();

//  if($conexao) {
//     echo "conectado ao banco";
//  } else {
//     echo "Erro na conexão: " . mysqli_connect_error();
//  }