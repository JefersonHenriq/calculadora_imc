<?php

class Usuario
{
    private $id;
    private $nome;
    private $cpf;
    private $idade;
    private $candidato;
    private $msg;
    public $erro = [];

    public function __construct($nome, $cpf, $idade, $candidato)
    {
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->idade = $idade;
        $this->candidato = $candidato;
    }

    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }
    public function getNome()
    {
        return $this->nome;
    }
    public function setNome($nome)
    {
        $this->nome = $nome;
    }
    public function getCpf()
    {
        return $this->cpf;
    }
    public function setCPF($cpf)
    {
        $this->cpf = $cpf;
    }
    public function getIdade()
    {
        return $this->idade;
    }
    public function setIdade($idade)
    {
        $this->idade = $idade;
    }
    public function getCandidato()
    {
        return $this->candidato;
    }
    public function getMsg()
    {
        return $this->msg;
    }

    public function validarVotacao()
    {
        if (empty($this->nome)){
            $this->erro["erro_nome"] = "O campo nome está vazio";
        }

        $this->cpf = str_replace(",", ".", $this->cpf);

        if(!is_numeric($this->cpf)){
            $this->erro["erro_cpf"] = "O cpf deve ser número";
        }

        if ($this->idade < 16 || !is_numeric($this->idade)){
            $this->erro["erro_idade"] = "Idade Inválida!";
        }
        
    }
}

?>