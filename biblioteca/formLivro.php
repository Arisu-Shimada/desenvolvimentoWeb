<div class="card mt-5">
    <div class="card-header">
        <h5><?= isset($dado) ? "Editar Livro" : "Novo Livro" ?></h5>
    </div>
    <div class="card-body">
        <form method="post" action="?acao=salvar">

            <input type="hidden" name="id" value="<?= $dado["id"] ?? '' ?>">

            <label class="form-label">Título:</label>
            <input class="form-control" type="text" name="titulo" 
                   value="<?= $dado["titulo"] ?? '' ?>" required autofocus>

            <label class="form-label">Ano:</label>
            <input class="form-control" type="text" name="ano" 
                   value="<?= $dado["ano"] ?? '' ?>" required autofocus>

            <label class="form-label">Quantidade:</label>
            <input class="form-control" type="text" name="quantidade" 
                   value="<?= $dado["quantidade"] ?? '' ?>" required autofocus>

            <button class="btn btn-primary mt-4" type="submit">Salvar</button>
        </form>
    </div>
</div>
