<?php

class Usuario
{

    private $id_usuario;
    private $nome;
    private $email;
    private $idade;
    private $senha;
    private $idadeDe;
    private $idadeAte;

    public function getId_usuario()
    {
        return $this->id_usuario;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getIdade()
    {
        return $this->idade;
    }

    public function getSenha()
    {
        return $this->senha;
    }

    public function getIdadeDe()
    {
        return $this->idadeDe;
    }

    public function getIdadeAte()
    {
        return $this->idadeAte;
    }

    public function setId_usuario($id_usuario)
    {
        $this->id_usuario = $id_usuario;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setIdade($idade)
    {
        $this->idade = $idade;
    }

    public function setSenha($senha)
    {
        $this->senha = $senha;
    }

    public function setIdadeDe($idadeDe)
    {
        $this->idadeDe = $idadeDe;
    }

    public function setIdadeAte($idadeAte)
    {
        $this->idadeAte = $idadeAte;
    }
}
