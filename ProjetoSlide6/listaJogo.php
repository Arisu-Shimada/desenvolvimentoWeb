<h5 class="mt-5">Lista de Jogos</h5>

<div class="d-flex justify-content-between align-items-center mb-3">
    <a href="?acao=novo" class="btn btn-success btn-sm">Adicionar</a>

    <form action="?acao=pesquisar" method="POST" class="d-flex gap-2">
        <input type="text" name="nota_minima" class="form-control form-control-sm" 
                placeholder="Nota Mínima:" 
                value="<?= $nota_minima ?? "" ?>">

        <input type="text" name="categoria" class="form-control form-control-sm" 
                placeholder="Categoria:" 
                value="<?= $categoria ?? "" ?>">

        <input type="text" name="busca" class="form-control form-control-sm" 
                placeholder="Nome:" 
                value="<?= $busca ?? "" ?>">
        <button type="submit" class="btn btn-secondary btn-sm">Pesquisar</button>
    </form>
</div>

<div class="table-responsive">
<table class="table table-bordered align-middle">
    <thead class="table-light">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Categoria</th>
            <th>Descrição</th>
            <th>Nota Média</th>
            <th class="col-md-2">Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($dados as $dado): ?>
        <tr>
            <td><?= $dado['id']; ?></td>
            <td><?= $dado['nome']; ?></td>
            <td><?= $dado['categoria']; ?></td>
            <td><?= $dado['descricao']; ?></td>
            <td class="text-end"><?= number_format($dado['nota_media'], 1, ',', '.'); ?></td>
            <td>
                <a href="?acao=editar&id=<?= $dado['id']; ?>" class="btn btn-primary btn-sm">Editar</a>
                <a href="?acao=excluir&id=<?= $dado['id']; ?>" class="btn btn-danger btn-sm">Excluir</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</div>
