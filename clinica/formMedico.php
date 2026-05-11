<div class="card mt-5">
    <div class="card-header">
        <h5>Novo Médico</h5>
    </div>
    <div class="card-body">
        <form method="post" action="?acao=salvar">

            <label class="form-label">Nome do Médico:</label>
            <input class="form-control" type="text" name="nome" 
                   value="<?= $dado["nome"] ?? '' ?>" required autofocus>

            <label class="mt-3">Especialidade:</label>
            <input class="form-control" type="text" name="especialidade"
                   value="<?= $dado["especialidade"] ?? '' ?>" required>

            <label class="mt-3">CRM:</label>
            <input class="form-control" type="text" name="crm"
                   value="<?= $dado["crm"] ?? '' ?>" required>

            <label class="mt-3">salario:</label>
            <input class="form-control" type="number" name="salario"
                   value="<?= $dado["salario"] ?? '' ?>" required>

            <button class="btn btn-primary mt-4" type="submit">Salvar</button>
        </form>
    </div>
</div>