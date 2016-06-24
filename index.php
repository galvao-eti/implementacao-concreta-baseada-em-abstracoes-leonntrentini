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

$acao = isset($_GET['acao']) ? $_GET['acao'] : NULL;
$id = isset($_GET['id']) ? $_GET['id'] : NULL;
$nome = isset($_GET['nome']) ? $_GET['nome'] : NULL;
$preco = isset($_GET['preco']) ? $_GET['preco'] : NULL;

try {
    $base->conectar();
} catch (Exception $e) {
    echo $e->getMessage();
}

if ($acao == "insert") {
    $produto = new Produto($base);
    $produto->nome = $nome;
    $produto->preco = $preco;
    try {
        $produto->create();
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}



if ($acao == "delete") {
    $produto = new Produto($base);
    try {
        $produto->delete("id = " . $id);
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
if ($acao == "update") {
    $produto = new Produto($base);
    $produto->nome = 'Editado id ' . $id;
    $produto->preco = 123.00;
    try {
        $produto->update("id = " . $id);
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}


/* * *******Retrieve************** */
$produto = new Produto($base);
$colunas = array('id', 'nome', 'preco');


try {
    

    echo '<table>';
    echo '<tr>';

    for ($i = 0; $i < count($colunas); $i++) {
        echo '<th>' . $colunas[$i] . '</th>';
    }

    echo '</tr>';
    $result = $produto->retrieve($colunas, "id <> 0");
    while (($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) != NULL) {
        echo '<tr>';
        for ($i = 0; $i < count($colunas); $i++) {
            echo '<td>' . $row[$colunas[$i]] . '</td>';
        }
        echo '<td><a href="?acao=update&id=' . $row['id'] . '">Editar</a></td>';
        echo '<td><a href="?acao=delete&id=' . $row['id'] . '">Excluir</a></td>';
        echo '</tr>';
    }
    mysqli_free_result($result);
    echo '</table>';
    echo '<br><a href="?acao=insert&nome=Geladeira Electrolux&preco=123">Inserir</a><br>';
} catch (Exception $e) {
    echo $e->getMessage();
}

$base->desconectar();
