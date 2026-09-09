<div class="card mt-5">
    <div class="card-header">
        <h5 ><?= isset($dado) ? "Editar Cliente" : "Novo Cliente" ?></h5>
    </div>
    <div class="card-body">
        <form method="post" action="?acao=salvar" enctype="multipart/form-data">

            <input type="hidden" name="id" value="<?= $dado["id"] ?? '' ?>">

            <label class="form-label">Nome:</label>
            <input class="form-control" type="text" name="nome"
                   value="<?= $dado["nome"] ?? '' ?>" required autofocus>

            <label class="form-label">Email:</label>
            <input class="form-control" type="text" name="email"
                   value="<?= $dado["email"] ?? '' ?>" required autofocus>

            <label class="form-label">Telefone:</label>
            <input class="form-control" type="text" name="telefone"
                   value="<?= $dado["telefone"] ?? '' ?>" required autofocus>

            <label class="form-label">Cidade:</label>
            <input class="form-control" type="text" name="cidade"
                   value="<?= $dado["cidade"] ?? '' ?>" required autofocus>

           <label class="mt-3">Imagem do Cliente:</label>
            <input class="form-control" type="file" name="input_imagem" accept="image/*">

            <?php if (!empty($dado['url_imagem_cliente']) && file_exists($dado['url_imagem_cliente'])): ?>
                <div class="mt-3 text-center">
                    <img src="<?= $dado['url_imagem_cliente'] ?>?v=<?= filemtime($dado['url_imagem_cliente']) ?>" class="img-fluid img-thumbnail"
                         style="max-width: 200px;" alt="Imagem do cliente">
                    <p class="text-muted small mt-2">Imagem atual</p>
                </div>
            <?php endif; ?>


            <button class="btn btn-primary mt-4" type="submit">Salvar</button>
        </form>
    </div>
</div>
