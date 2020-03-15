<?php
require_once 'global.php';

try {
    $id =  $_GET['id'];
    $categoria = new Categoria();

    $categoria->setId($id);

    $categoria->excluir($categoria);
    header('Location: categorias.php');
} catch (Exception $ex) {
    Erro::trataError($ex);
}
