<div class="card mt-5">
    <div class="card-header">
        <h5>Novo Produto</h5>
    </div>
    <div class="card-body">
        <form method="post" action="?acao=salvar">

            <label class="form-label">Nome:</label>
            <input class="form-control" type="text" name="nome" 
                   value="<?= $dado["nome"] ?? '' ?>" required autofocus>

            <label class="mt-3">Preço:</label>
            <input class="form-control" type="number" name="preco" step="0.01" 
                   value="<?= $dado["preco"] ?? '' ?>" required>

            <button class="btn btn-primary mt-4" type="submit">Salvar</button>
        </form>
    </div>
</div>
