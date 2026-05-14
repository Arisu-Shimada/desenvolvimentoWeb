<div class="card mt-5">
    <div class="card-header">
        <h5><?= isset($dado) ? "Editar Exame" : "Novo Exame" ?></h5>
    </div>
    <div class="card-body">
        <form method="post" action="?acao=salvar">

            <input type="hidden" name="id" value="<?= $dado["id"] ?? '' ?>">

            <label class="form-label">Nome do Exame:</label>
            <input class="form-control" type="text" name="nome_exame" 
                   value="<?= $dado["nome_exame"] ?? '' ?>" required autofocus>

            <label class="mt-3">Tipo de Exame:</label>
            <input class="form-control" type="text" name="tipo"
                   value="<?= $dado["tipo"] ?? '' ?>" required>

            <label class="mt-3">Valor do Exame:</label>
            <input class="form-control" type="number" name="valor"
                   value="<?= $dado["valor"] ?? '' ?>" required>

            <label class="mt-3">Resultado:</label>
            <input class="form-control" type="text" name="resultado"
                   value="<?= $dado["resultado"] ?? '' ?>" required>

            <button class="btn btn-primary mt-4" type="submit">Salvar</button>
        </form>
    </div>
</div>