<div class="card mt-5">
    <div class="card-header">
        <h5 ><?= isset($dado) ? "Editar Pet" : "Novo Pet" ?></h5> 
    </div>
    <div class="card-body">
        <form enctype="multipart/form-data" method="post" action="?acao=salvar">
            
            <input type="hidden" name="id" value="<?= $dado["id"] ?? '' ?>">

            <label class="form-label">Nome:</label>
            <input class="form-control" type="text" name="nome" 
                   value="<?= $dado["nome"] ?? '' ?>" required autofocus>

            <label class="form-label">Espécie:</label>
            <input class="form-control" type="text" name="especie" 
                   value="<?= $dado["especie"] ?? '' ?>" required autofocus>

            <label class="mt-3">Idade:</label>
            <input class="form-control" type="number" name="idade" 
                   value="<?= $dado["idade"] ?? '' ?>" required>
                   
            <label class="mt-3">Cidade:</label>
            <input class="form-control" type="text" name="cidade"
                   value="<?= $dado["cidade"] ?? '' ?>" required>
       
            <label class="mt-3">Imagem do Animal:</label>
            <input class="form-control" type="file" name="input_imagem" accept="image/*">

            <?php if (!empty($dado['url_imagem_animal']) && file_exists($dado['url_imagem_animal'])): ?>
                <div class="mt-3 text-center">
                    <img src="<?= $dado['url_imagem_animal'] ?>?v=<?= filemtime($dado['url_imagem_animal']) ?>" class="img-fluid img-thumbnail"
                         style="max-width: 200px;" alt="Imagem do animal">
                    <p class="text-muted small mt-2">Imagem atual</p>
                </div>
            <?php endif; ?>

            <button class="btn btn-primary mt-4" type="submit">Salvar</button>
        </form>
    </div>
</div>
