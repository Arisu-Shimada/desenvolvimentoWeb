<div class="card mt-5">
    <div class="card-header">
        <h5 ><?= isset($dado) ? "Editar Jogo" : "Novo Jogo" ?></h5> 
    </div>
    <div class="card-body">
        <form method="post" action="?acao=salvar">
            
            <input type="hidden" name="id" value="<?= $dado["id"] ?? '' ?>">

            <label class="form-label">Nome:</label>
            <input class="form-control" type="text" name="nome" 
                   value="<?= $dado["nome"] ?? '' ?>" required autofocus>

            <label class="form-label">Categoria:</label>
            <input class="form-control" type="text" name="categoria" 
                   value="<?= $dado["categoria"] ?? '' ?>" required autofocus>

            <label class="form-label">Descrição:</label>
            <input class="form-control" type="text" name="descricao" 
                   value="<?= $dado["descricao"] ?? '' ?>" required autofocus>

            <label class="mt-3">Nota Média:</label>
            <input class="form-control" type="number" name="nota_media" step="0.1" 
                   value="<?= $dado["nota_media"] ?? '' ?>" required>

            <button class="btn btn-primary mt-4" type="submit">Salvar</button>
        </form>
    </div>
</div>
