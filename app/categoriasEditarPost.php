<?php
require_once 'global.php';

try {

    $categoria = new Categoria();
    $id = $_POST['id'];
    $nome = $_POST['nome'];

    $categoria->setNome($nome);
    $categoria->setId($id);
    $categoria->alterar($categoria);

    header('Location: categorias.php');
} catch (Exception $ex) {
    Erro::trataError($ex);
}
