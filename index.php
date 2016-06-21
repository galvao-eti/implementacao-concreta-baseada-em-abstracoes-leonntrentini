<?php
require 'autoload.php';

use Alfa\BaseDeDados;
use Alfa\Entidade;
use Alfa\Produto;
use Alfa\SGBD;

$servidor = new SGBD('mysql');
$servidor->setEndereco('localhost');
$servidor->setPorta(3306);
$servidor->setUsuario('root');
$servidor->setSenha('Total33');

$base = new Alfa\BaseDeDados('alfa_oo', $servidor);

try {
	$base->conectar();
} catch (Exception $e) {
	echo $e->getMessage();
}
/*********Create***************/
//$produto = new Produto($base);
//$produto->nome = 'Geladeira Electrolux';
//$produto->preco = 907.00;
//try {
//    $produto->create();
//} catch (Exception $e) {
//    echo $e->getMessage();
//}

/*********Delete***************/
$produto = new Produto($base);
try {
    $produto->delete("id = 11");
} catch (Exception $e) {
    echo $e->getMessage();
}

$base->desconectar();