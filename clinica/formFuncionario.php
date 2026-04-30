<div class="card mt-5">
    <div class="card-header">
        <h5>Novo Funcionário</h5>
    </div>
    <div class="card-body">
        <form method="post" action="?acao=salvar">

            <label class="form-label">Nome do Funcionário:</label>
            <input class="form-control" type="text" name="nome" 
                   value="<?= $dado["nome"] ?? '' ?>" required autofocus>

            <label class="mt-3">Cargo:</label>
            <input class="form-control" type="text" name="cargo"
                   value="<?= $dado["cargo"] ?? '' ?>" required>

            <label class="mt-3">Salario:</label>
            <input class="form-control" type="number" name="salario"
                   value="<?= $dado["salario"] ?? '' ?>" required>

            <label class="mt-3">Data de Admissão:</label>
            <input class="form-control" type="text" name="data_admissao" placeholder="aaaa/mm/dd"
                   value="<?= $dado["data_admissao"] ?? '' ?>" required>

            <button class="btn btn-primary mt-4" type="submit">Salvar</button>
        </form>
    </div>
</div>