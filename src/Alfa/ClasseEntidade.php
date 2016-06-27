<?php

abstract class ClasseEntidade implements Abstracao\Entidade {

    public static $servidor;

    public function __construct(BaseDeDados $base) {
        self::$servidor = $base;
    }

    abstract public function setNome($nome);

    abstract public function getNome();

    abstract public function create($colunas, $valores);

    abstract public function retrieve($colunas, $clausula);

    abstract public function update($colunas, $valores, $clausula);

    abstract public function delete($clausula);
}
