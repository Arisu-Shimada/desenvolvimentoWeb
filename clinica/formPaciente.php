<div class="card mt-5">
    <div class="card-header">
        <h5><?= isset($dado) ? "Editar Paciente" : "Novo Paciente" ?></h5>
    </div>
    <div class="card-body">
        <form method="post" action="?acao=salvar">

            <input type="hidden" name="id" value="<?= $dado["id"] ?? '' ?>">

            <label class="form-label">Nome do Paciente:</label>
            <input class="form-control" type="text" name="nome" 
                   value="<?= $dado["nome"] ?? '' ?>" required autofocus>

            <label class="mt-3">Idade:</label>
            <input class="form-control" type="number" name="idade"
                   value="<?= $dado["idade"] ?? '' ?>" required>

            <label class="mt-3">Telefone:</label>
            <input class="form-control" type="text" name="telefone"
                   value="<?= $dado["telefone"] ?? '' ?>" required>

            <label class="mt-3">Email:</label>
            <input class="form-control" type="text" name="email"
                   value="<?= $dado["email"] ?? '' ?>" required>

            <button class="btn btn-primary mt-4" type="submit">Salvar</button>
        </form>
    </div>
</div>