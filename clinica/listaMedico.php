<h5 class="mt-5">Lista de Médicos</h5>


<a href="?acao=novo" class="btn btn-success btn-sm mb-3">Adicionar</a>

<div class="table-responsive">
<table class="table table-bordered align-middle">
    <thead class="table-light">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Especialidade</th>
            <th>CRM</th>
            <th>Salário</th>
            <th class="col-md-2">Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($dados as $dado): ?>
        <tr>
            <td><?= $dado['id']; ?></td>
            <td><?= $dado['nome']; ?></td>
            <td><?= $dado['especialidade']; ?></td>
            <td><?= $dado['crm']; ?></td>
            <td><?= $dado['salario']; ?></td>
            
            <td>
                <a href="?acao=editar&id=<?= $dado['id'] ?>" class="btn btn-primary btn-sm">Editar</a>
                <a href="?acao=remover&id=<?= $dado['id'] ?>" class="btn btn-danger btn-sm">Remover</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</div>
