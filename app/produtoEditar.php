<?php
require_once 'global.php';

try {
    $id = $_POST['id'];
    $nome =    $_POST['nome'];
    $preco =    $_POST['preco'];
    $quantidade =    $_POST['quantidade'];
    $categoriaId =    $_POST['categoria_id'];


    $produto = new Produto();

    $produto->setId($id);
    $produto->setNome($nome);
    $produto->setPreco($preco);
    $produto->setQuantidade($quantidade);
    $produto->setCategoriaId($categoriaId);

    $produto->alterar($produto);

    header('Location: produtos.php');
} catch (Exception $ex) {
    Erro::trataError($ex);
}
