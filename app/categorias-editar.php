<?php
require_once 'global.php';
require_once 'cabecalho.php';

try {
    $categoria = new Categoria();
    $id = $_GET['id'];
    $categoria->setId($id);
    $categoria->selecionar($categoria);
} catch (Exception $ex) {
    Erro::trataError($ex);
}

?>
<div class="row">
    <div class="col-md-12">
        <h2>Editar Categoria</h2>
    </div>
</div>
<form action="categoriasEditarPost.php" method="post">
    <input type="hidden" name="id" value="<?php echo $categoria->getId();  ?>" />
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="form-group">
                <label for="nome">Nome da Categoria</label>
                <input type="text" value="<?php echo $categoria->getNome(); ?>" name="nome" class="form-control" placeholder="Nome da Categoria">
            </div>
            <input type="submit" class="btn btn-success btn-block" value="Salvar">
        </div>
    </div>
</form>
<?php require_once 'rodape.php' ?>