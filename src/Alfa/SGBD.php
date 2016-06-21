<?php

namespace Alfa;

class SGBD implements Abstracao\SGBD {

    protected $endereco;
    protected $porta;
    protected $senha;
    protected $usuario;

    public function getEndereco() {
        return $this->endereco;
    }

    public function getPorta() {
        return $this->porta;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function getUsuario() {
        return $this->usuario;
    }

    public function setEndereco($endereco) {
        $this->endereco = $endereco;
    }

    public function setPorta($porta) {
        if (is_numeric($porta)) {
            $this->porta = $porta;
        }
    }

    public function setSenha($senha) {
        $this->senha = $senha;
    }

    public function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

}
