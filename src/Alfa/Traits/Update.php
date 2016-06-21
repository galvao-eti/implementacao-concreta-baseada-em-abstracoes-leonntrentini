<?php

namespace Alfa\Traits;

trait Update {
    public function update($clausula)
	{
		$entidade = substr(__CLASS__, strrpos(__CLASS__, '\\') + 1);

		$atributos = get_object_vars($this);

		$colunas = array_keys($atributos);
		$valores = "";
                for ($i=0; $i<count($colunas); $i++) {
                    $temp = $colunas[$i];
                    $valores = $valores . $colunas[$i] . " = '$atributos[$temp]'";
                    if (count($colunas) <> $i+1) {
                        $valores = $valores . ", ";
                    }
                }

		$sql = "UPDATE $entidade SET $valores WHERE $clausula";
                echo $sql;
		if (!mysqli_query(self::$servidor->conexao, $sql)) {
			throw new \Exception(mysqli_error(self::$servidor->conexao));
		}
	}
}
