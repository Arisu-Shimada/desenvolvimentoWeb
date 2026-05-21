<h5 class="mt-5">Lista de Produtos</h5>


<a href="?acao=novo" class="btn btn-success btn-sm mb-3">Adicionar</a>

<div class="table-responsive">
<table class="table table-bordered align-middle">
    <thead class="table-light">
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Ano</th>
            <th>Quantidade</th>
            <th>Status</th>
            <th class="col-md-2">Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($dados as $dado): ?>
        <tr>
            <td><?= $dado['id']; ?></td>
            <td><?= $dado['titulo']; ?></td>
            <td><?= $dado['ano']; ?></td>
            <td class="text-end"><?= $dado['quantidade']; ?></td>
            <td class="text-end"><?php 
                if ($dado['quantidade'] <= 0) {
                    echo "Indisponível";
                } elseif ($dado['quantidade'] < 3) {
                    echo "Poucos exemplares";
                } else {
                    echo "Disponível";
                } 
            ?></td>
            <td>
                <a href="?acao=editar&id=<?= $dado['id'] ?>" class="btn btn-primary btn-sm">Editar</a>
                <a href="?acao=remover&id=<?= $dado['id'] ?>" class="btn btn-danger btn-sm">Remover</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</div>