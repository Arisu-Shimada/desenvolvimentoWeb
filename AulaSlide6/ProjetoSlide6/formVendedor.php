<div class="card mt-5">
    <div class="card-header">
        <h5><?= isset($dado) ? "Editar Vendedor" : "Novo Vendedor" ?></h5>
    </div>
    <div class="card-body">
        <form method="post" action="?acao=salvar">

            <input type="hidden" name="id" value="<?= $dado["id"] ?? '' ?>">

            <label class="form-label">Nome:</label>
            <input class="form-control" type="text" name="nome" 
                   value="<?= $dado["nome"] ?? '' ?>" required autofocus>

            <label class="mt-3">Email:</label>
            <input class="form-control" type="text" name="email"
                   value="<?= $dado["email"] ?? '' ?>" required>

            <label class="form-label">Telefone:</label>
            <input class="form-control" type="text" name="telefone" 
                   value="<?= $dado["telefone"] ?? '' ?>" required autofocus>

            <label class="form-label">CPF:</label>
            <input class="form-control" type="text" name="cpf" 
                   value="<?= $dado["cpf"] ?? '' ?>" required autofocus>

            <label class="mt-3">Comissão:</label>
            <input class="form-control" type="number" name="comissao" step="0.01" 
                   value="<?= $dado["comissao"] ?? '' ?>" required>

            <button class="btn btn-primary mt-4" type="submit">Salvar</button>
        </form>
    </div>
</div>
