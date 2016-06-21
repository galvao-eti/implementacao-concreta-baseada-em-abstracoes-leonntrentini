<?php

namespace Alfa;

use Alfa\BaseDeDados;

class BaseDeDados implements Abstracao\BaseDeDados {

    public $conexao;
    protected $nome;
    public $servidor;

    function __construct($nome, SGBD $servidor) {
        $this->nome = $nome;
        $this->servidor = $servidor;
        
    }

    public function conectar() {

        $this->conexao = mysqli_connect($this->servidor->getEndereco(), $this->servidor->getUsuario(), $this->servidor->getSenha(), $this->getNome());

        if (!$this->conexao) {
            throw new \Exception(mysqli_connect_error());
        }
    }

    public function desconectar() {
        if ($this->conexao) {
            mysqli_close($this->conexao);
            $this->conexao = NULL;
        }
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

}
