<?php
require_once 'global.php';

try {
    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $quantidade = $_POST['quantidade'];
    $categoriaId = $_POST['categoria_id'];

    $produto = new Produto();

    $produto->setNome($nome);
    $produto->setPreco($preco);
    $produto->setQuantidade($quantidade);
    $produto->setCategoriaId($categoriaId);

    $produto->inserir($produto);
} catch (Exception $ex) {
    Erro::trataError($ex);
}



header('Location: produtos.php');
