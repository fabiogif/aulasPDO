<?php require_once 'global.php'; ?>
<?php require_once 'cabecalho.php' ?>
<?php
try {
    $categoria = new Categoria();
    $id = $_GET['id'];
    $categoria->setId($id);
    $categoria->selecionar($categoria);

    $categoria->listarPorCategoria();
    $listaProdutos = $categoria->produtos;
} catch (Exception $ex) {
    Erro::trataError($ex);
}

?>

<div class="row">
    <div class="col-md-12">
        <h2>Detalhe da Categoria</h2>
    </div>
</div>

<dl>
    <dt>ID</dt>
    <dd><?php echo $categoria->getId(); ?></dd>
    <dt>Nome</dt>
    <dd><?php echo $categoria->getNome(); ?></dd>
    <dt>Produtos</dt>
    <dd>
        <ul>
            <?php foreach ($listaProdutos as $produtos) { ?>
                <li><a href="/produtos-editar.php?<?php echo $produtos['id'] ?>"><?php echo $produtos['nome']; ?></a></li>
            <?php } ?>
        </ul>
    </dd>
</dl>
<?php require_once 'rodape.php' ?>