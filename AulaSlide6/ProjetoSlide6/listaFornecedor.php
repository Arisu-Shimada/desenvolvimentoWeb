<h5 class="mt-5">Lista de Fornecedores</h5>


<a href="?acao=novo" class="btn btn-success btn-sm mb-3">Adicionar</a>

<div class="table-responsive">
<table class="table table-bordered align-middle">
    <thead class="table-light">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>email</th>
            <th>telefone</th>
            <th>cnpj</th>
            <th>empresa</th>
            <th>cidade</th>
            <th>uf</th>
            <th class="col-md-2">Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($dados as $dado): ?>
        <tr>
            <td><?= $dado['id']; ?></td>
            <td><?= $dado['nome']; ?></td>
            <td class="text-end"><?= $dado['email']; ?></td>
            <td class="text-end"><?= $dado['telefone']; ?></td>
            <td class="text-end"><?= $dado['cnpj']; ?></td>
            <td class="text-end"><?= $dado['empresa']; ?></td>
            <td class="text-end"><?= $dado['cidade']; ?></td>
            <td class="text-end"><?= $dado['uf']; ?></td>
            <td>
                <a href="?acao=editar&id=<?= $dado['id'] ?>" class="btn btn-primary btn-sm">Editar</a>
                <a href="?acao=remover&id=<?= $dado['id'] ?>" class="btn btn-danger btn-sm">Remover</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</div>
