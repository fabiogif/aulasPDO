<?php require_once 'global.php';

$categoria = new Categoria();
$nome = $_POST['nome'];

$categoria->setNome($nome);

$categoria->inserir($categoria);


header('Location: categorias.php');
