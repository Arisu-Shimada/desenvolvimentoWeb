<h5 class="mt-5">Lista de Funcionários</h5>


<a href="?acao=novo" class="btn btn-success btn-sm mb-3">Adicionar</a>

<div class="table-responsive">
<table class="table table-bordered align-middle">
    <thead class="table-light">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Cargo</th>
            <th>Salário</th>
            <th>Data de Admissão</th>
            <th class="col-md-2">Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($dados as $dado): ?>
        <tr>
            <td><?= $dado['id']; ?></td>
            <td><?= $dado['nome']; ?></td>
            <td><?= $dado['cargo']; ?></td>
            <td><?= $dado['salario']; ?></td>
            <td><?= $dado['data_admissao']; ?></td>
            
            <td>
                <a href="" class="btn btn-primary btn-sm">Editar</a>
                <a href="" class="btn btn-danger btn-sm">Remover</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</div>
