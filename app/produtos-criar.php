<?php require_once 'cabecalho.php';
require_once 'global.php';

try {
    $categoria = new Categoria();

    $listaCateroria = $categoria->listar();
} catch (Exception $ex) {
    Erro::trataError($ex);
}

?>


<div class="row">
    <div class="col-md-12">
        <h2>Criar Novo Produto</h2>
    </div>
</div>
<?php if (count($listaCateroria) > 0) { ?>
    <form action="produtos-criar-post.php" method="post">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="form-group">
                    <label for="nome">Nome do Produto</label>
                    <input type="text" name="nome" class="form-control" placeholder="Nome do Produto" required>
                </div>
                <div class="form-group">
                    <label for="preco">Preço da Produto</label>
                    <input type="number" name="preco" step="0.01" min="0" class="form-control" placeholder="Preço do Produto" required>
                </div>
                <div class="form-group">
                    <label for="quantidade">Quantidade do Produto</label>
                    <input type="number" name="quantidade" min="0" class="form-control" placeholder="Quantidade do Produto" required>
                </div>
                <div class="form-group">
                    <label for="nome">Categoria do Produto</label>
                    <select name="categoria_id" class="form-control">
                        <?php foreach ($listaCateroria as $item) { ?>
                            <option value="<?php echo $item['id']; ?>"><?php echo $item['nome']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <input type="submit" class="btn btn-success btn-block" value="Salvar">
            </div>
        </div>
    </form>
<?php } else {
    echo '<p>Nenhuma cadastrada</p>';
} ?>
<?php require_once 'rodape.php' ?>