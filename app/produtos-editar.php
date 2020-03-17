<?php require_once 'global.php'; ?>
<?php require_once 'cabecalho.php' ?>


<?php
try {
    $id = $_GET['id'];
    $produto = new Produto($id);

    $categoria = new Categoria();
    $listaCategoria = $categoria->listar();
} catch (Exception $ex) {
    Erro::trataError($ex);
}
?>
<div class="row">
    <div class="col-md-12">
        <h2>Editar Nova Categoria</h2>
    </div>
</div>

<form action="#" method="post">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="form-group">
                <label for="nome">Nome do Produto</label>
                <input type="text" value="<?php echo $produto->getNome(); ?>" class="form-control" placeholder="Nome do Produto" required>
            </div>
            <div class="form-group">
                <label for="preco">Preço da Produto</label>
                <input type="number" value="<?php echo $produto->getPreco(); ?>" step="0.01" min="0" class="form-control" placeholder="Preço do Produto" required>
            </div>
            <div class="form-group">
                <label for="quantidade">Quantidade do Produto</label>
                <input type="number" value="<?php echo $produto->getQuantidade(); ?>" min="0" class="form-control" placeholder="Quantidade do Produto" required>
            </div>
            <div class="form-group">

                <label for="nome">Categoria do Produto</label>
                <select name="categoria_id" class="form-control">
                    <?php $selected = ""; ?>

                    <?php foreach ($listaCategoria as $item) {
                        if ($item['id'] == $produto->getCategoriaId()) {
                            $selected = 'selected';
                        } ?>
                        <option <?php echo $selected; ?> value="<?php echo $item['id']; ?>"><?php echo $item['nome']; ?></option>
                    <?php
                        $selected = '';
                    } ?>
                </select>
            </div>
            <input type="submit" class="btn btn-success btn-block" value="Salvar">
        </div>
    </div>
</form>

<?php require_once 'rodape.php' ?>