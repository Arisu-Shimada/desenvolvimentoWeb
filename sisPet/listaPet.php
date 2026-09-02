<h5 class="mt-5">Lista de Pets</h5>

<div class="d-flex justify-content-between align-items-center mb-3">
    <a href="?acao=novo" class="btn btn-success btn-sm">Adicionar</a>

    <form action="?acao=pesquisar" method="POST" class="d-flex gap-2">
        <input type="text" name="cliente_id" class="form-control form-control-sm" 
                placeholder="ID do cliente:" 
                value="<?= $cliente_id ?? "" ?>">

        <input type="text" name="especie" class="form-control form-control-sm" 
                placeholder="Espécie:" 
                value="<?= $especie ?? "" ?>">

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
            <th>ID do Cliente</th>
            <th>Nome</th>
            <th>Espécie</th>
            <th>Raça</th>
            <th>Data de Nascimento</th>
            <th>Peso</th>
            <th class="col-md-2">Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($dados as $dado): ?>
        <tr>
            <td><?= $dado['id']; ?></td>
            <td><?= $dado['cliente_id']; ?></td>
            <td><?= $dado['nome']; ?></td>
            <td><?= $dado['especie']; ?></td>
            <td><?= $dado['raca']; ?></td>
            <td><?= $dado['data_nascimento']; ?></td>
            <td class="text-end"><?= number_format($dado['peso'], 1, ',', '.'); ?> KG</td>
            <td>
                <a href="?acao=editar&id=<?= $dado['id']; ?>" class="btn btn-primary btn-sm">Editar</a>
                <a href="?acao=excluir&id=<?= $dado['id']; ?>" class="btn btn-danger btn-sm">Excluir</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</div>
