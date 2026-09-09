<div class="card mt-5">
    <div class="card-header">
        <h5 ><?= isset($dado) ? "Editar Jogo" : "Novo Jogo" ?></h5> 
    </div>
    <div class="card-body">
        <form enctype="multipart/form-data" method="post" action="?acao=salvar">
            
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

            <label class="mt-3">Imagem do Pet:</label>
            <input class="form-control" type="file" name="input_imagem" accept="image/*">

            <?php if (!empty($dado['url_imagem_jogo']) && file_exists($dado['url_imagem_jogo'])): ?>
                <div class="mt-3 text-center">
                    <img src="<?= $dado['url_imagem_jogo'] ?>?v=<?= filemtime($dado['url_imagem_jogo']) ?>" class="img-fluid img-thumbnail"
                         style="max-width: 200px;" alt="Imagem do jogo">
                    <p class="text-muted small mt-2">Imagem atual</p>
                </div>
            <?php endif; ?>

            <button class="btn btn-primary mt-4" type="submit">Salvar</button>
        </form>
    </div>
</div>
