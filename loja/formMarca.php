<div class="card mt-5">
    <div class="card-header">
        <h5>Nova Marca</h5>
    </div>
    <div class="card-body">
        <form method="post" action="?acao=salvar">

            <label class="form-label">Nome:</label>
            <input class="form-control" type="text" name="nome" 
                   value="<?= $dado["nome"] ?? '' ?>" required autofocus>

            <label class="mt-3">Descrição:</label>
            <input class="form-control" type="text" name="descricao"
                   value="<?= $dado["descricao"] ?? '' ?>" required>

            <label class="form-label">País de Origem:</label>
            <input class="form-control" type="text" name="pais_origem" 
                   value="<?= $dado["pais_origem"] ?? '' ?>" required autofocus>

            <button class="btn btn-primary mt-4" type="submit">Salvar</button>
        </form>
    </div>
</div>
