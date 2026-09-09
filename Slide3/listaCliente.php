<h5 class="mt-5">Lista de Clientes</h5>

<div class="d-flex justify-content-between align-items-center mb-3">
    <a href="?acao=novo" class="btn btn-success btn-sm">Adicionar</a>

    <form action="?acao=pesquisar" method="POST" class="d-flex gap-2">
        <input type="text" name="busca" class="form-control form-control-sm" 
                placeholder="Pesquisar..." 
                value="<?= $busca ?? "" ?>">
        <button type="submit" class="btn btn-secondary btn-sm">Pesquisar</button>
    </form>
</div>

<div class="table-responsive">
<table class="table table-bordered align-middle">
    <thead class="table-light">
        <tr>
            <th>ID</th>
            <th>Imagem</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Telefone</th>
            <th>Cidade</th>
            <th class="col-md-2">Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($dados as $dado): ?>
        <tr>
            <td><?= $dado['id']; ?></td>

            <td>
                <?php if (!empty($dado['url_imagem_cliente']) && file_exists($dado['url_imagem_cliente'])): ?>
                    <img src="<?= $dado['url_imagem_cliente'] ?>?v=<?= filemtime($dado['url_imagem_cliente']) ?>" class="img-fluid rounded" style="max-height: 60px;" alt="Imagem do produto">
                <?php else: ?>
                    <span class="text-muted">Sem imagem</span>
                <?php endif; ?>
            </td>

            <td><?= $dado['nome']; ?></td>

            <td><?= $dado['email']; ?></td>

            <td><?= $dado['telefone']; ?></td>

            <td><?= $dado['cidade']; ?></td>

            <td>
                <a href="?acao=editar&id=<?= $dado['id']; ?>" class="btn btn-primary btn-sm">Editar</a>
                <a href="?acao=excluir&id=<?= $dado['id']; ?>" class="btn btn-danger btn-sm">Excluir</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</div>
