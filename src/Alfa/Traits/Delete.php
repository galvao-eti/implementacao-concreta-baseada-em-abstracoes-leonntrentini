<?php

namespace Alfa\Traits;

trait Delete {
    public function delete($clausula)
	{
		$entidade = substr(__CLASS__, strrpos(__CLASS__, '\\') + 1);

		$sql = "DELETE FROM " . $entidade . " WHERE $clausula";
                echo $sql;
		if (!mysqli_query(self::$servidor->conexao, $sql)) {
			throw new \Exception(mysqli_error(self::$servidor->conexao));
		}
	}
}
