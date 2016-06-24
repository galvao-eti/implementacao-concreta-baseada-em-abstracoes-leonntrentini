<?php

namespace Alfa\Traits;

trait Retrieve {

    public function retrieve($colunas, $clausula) {
        $entidade = substr(__CLASS__, strrpos(__CLASS__, '\\') + 1);

//        $atributos = get_object_vars($this);
//
//        $colunas = array_keys($atributos);

        $sql = "SELECT " . implode(', ', $colunas) . " FROM " . $entidade . " WHERE $clausula";
        $result = mysqli_query(self::$servidor->conexao, $sql) or die(mysqli_error());
        echo $sql;

        

        

        if (!$result) {
            throw new \Exception(mysqli_error(self::$servidor->conexao));
        }


        return $result;
    }

}
