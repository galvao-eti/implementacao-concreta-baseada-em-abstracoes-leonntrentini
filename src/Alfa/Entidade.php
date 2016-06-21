<?php
namespace Alfa;

abstract class Entidade implements Abstracao\Entidade {
    public function create(/*$colunas, $valores*/) {
//        $entidade = substr(__CLASS__, strrpos(__CLASS__, '\\') + 1);
//        $sql = "INSERT INTO $entidade (" . implode(",", $colunas) . ") VALUES ('" . implode("','", $valores) . "')";
//        echo "SQL: $sql";
//
//        
//        if (!mysqli_query(self::$servidor->conexao, $sql)) {
//            throw new \Exception(mysqli_error(self::$servidor->conexao));
//        }
    }

    public function delete(/*$clausula*/) {
//        $entidade = substr(__CLASS__, strrpos(__CLASS__, '\\') + 1);
//        $sql = "DELETE FROM " . $entidade . " WHERE $clausula";
//        echo "SQL: $sql";
//        if (!mysqli_query(self::$servidor->conexao, $sql)) {
//            throw new \Exception(mysqli_error(self::$servidor->conexao));
//        }
        
    }

    public function getNome() {
        
    }

    public function retrieve($colunas, $clausula) {
        
    }

    public function setNome($nome) {
        
    }

    public function update($colunas, $valores, $clausula) {
        
    }

}

