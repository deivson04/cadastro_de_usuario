<?php

class ConexaoDB {
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "db_usuario";

    public function conectarBanco() {
      return  mysqli_connect($this->servername, $this->username, $this->password, $this->database);
    }
}

// $conn = new ConexaoDB();
//  $conexao = $conn->conectarBanco();

//  if($conexao) {
//     echo "conectado ao banco";
//  } else {
//     echo "Erro na conexão: " . mysqli_connect_error();
//  }