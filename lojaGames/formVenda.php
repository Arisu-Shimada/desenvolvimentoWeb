<div class="card mt-5">
    <div class="card-header">
        <h5><?= isset($dado) ? "Editar Categoria" : "Nova Categoria" ?></h5>
    </div>
    <div class="card-body">
        <form method="post" action="?acao=salvar">

            <input type="hidden" name="id" value="<?= $dado["id"] ?? '' ?>">

            <label class="form-label">Jogo:</label>
            <input class="form-control" type="text" name="jogo" 
                   value="<?= $dado["jogo"] ?? '' ?>" required autofocus>

            <label class="mt-3">Cliente:</label>
            <input class="form-control" type="text" name="cliente"
                   value="<?= $dado["cliente"] ?? '' ?>" required>

            <label class="form-label">Data de Venda:</label>
            <input class="form-control" type="text" name="data_venda" 
                   value="<?= $dado["data_venda"] ?? '' ?>" required autofocus>
            
            <label class="mt-3">Valor:</label>
            <input class="form-control" type="text" name="valor"
                   value="<?= $dado["valor"] ?? '' ?>" required>

            <button class="btn btn-primary mt-4" type="submit">Salvar</button>
        </form>
    </div>
</div>
