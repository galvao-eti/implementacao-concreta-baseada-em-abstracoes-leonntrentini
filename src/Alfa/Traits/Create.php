<?php

namespace Alfa\Traits;

trait Create {
    public function create()
	{
		$entidade = substr(__CLASS__, strrpos(__CLASS__, '\\') + 1);

		$atributos = get_object_vars($this);

		$colunas = array_keys($atributos);
		$valores = array_values($atributos);

		$sql = "INSERT INTO $entidade (" . implode(',', $colunas) . ") VALUES ('" . implode("','", $valores) . "')";
                echo $sql;
		if (!mysqli_query(self::$servidor->conexao, $sql)) {
			throw new \Exception(mysqli_error(self::$servidor->conexao));
		}
	}
}
