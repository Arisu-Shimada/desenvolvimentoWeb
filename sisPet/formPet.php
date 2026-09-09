<div class="card mt-5">
    <div class="card-header">
        <h5 ><?= isset($dado) ? "Editar Pet" : "Novo Pet" ?></h5> 
    </div>
    <div class="card-body">
        <form enctype="multipart/form-data" method="post" action="?acao=salvar">
            
            <input type="hidden" name="id" value="<?= $dado["id"] ?? '' ?>">

            <label class="form-label">ID do Cliente:</label>
            <input class="form-control" type="text" name="cliente_id" 
                   value="<?= $dado["cliente_id"] ?? '' ?>" required autofocus>

            <label class="form-label">Nome:</label>
            <input class="form-control" type="text" name="nome" 
                   value="<?= $dado["nome"] ?? '' ?>" required autofocus>

            <label class="form-label">Espécie:</label>
            <input class="form-control" type="text" name="especie" 
                   value="<?= $dado["especie"] ?? '' ?>" required autofocus>

            <label class="form-label">Raça:</label>
            <input class="form-control" type="text" name="raca" 
                   value="<?= $dado["raca"] ?? '' ?>" required autofocus>

            <label class="mt-3">Data de nascimento:</label>
            <input class="form-control" type="date" name="data_nascimento" 
                   value="<?= $dado["data_nascimento"] ?? '' ?>" required>
                   
            <label class="mt-3">Peso:</label>
            <input class="form-control" type="number" name="peso" step="0.01"
                   value="<?= $dado["peso"] ?? '' ?>" required>
       
            <label class="mt-3">Imagem do Pet:</label>
            <input class="form-control" type="file" name="input_imagem" accept="image/*">

            <?php if (!empty($dado['url_imagem_pet']) && file_exists($dado['url_imagem_pet'])): ?>
                <div class="mt-3 text-center">
                    <img src="<?= $dado['url_imagem_pet'] ?>?v=<?= filemtime($dado['url_imagem_pet']) ?>" class="img-fluid img-thumbnail"
                         style="max-width: 200px;" alt="Imagem do pet">
                    <p class="text-muted small mt-2">Imagem atual</p>
                </div>
            <?php endif; ?>

            <button class="btn btn-primary mt-4" type="submit">Salvar</button>
        </form>
    </div>
</div>
