<div class="card mt-5">
    <div class="card-header">
        <h5>Novo Cliente</h5>
    </div>
    <div class="card-body">
        <form method="post" action="?acao=salvar">

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

            
            <label class="form-label">Cidade:</label>
            <input class="form-control" type="text" name="cidade" 
                   value="<?= $dado["cidade"] ?? '' ?>" required autofocus>
            
            <label class="form-label">UF:</label>
            <input class="form-control" type="text" name="uf" 
                   value="<?= $dado["uf"] ?? '' ?>" required autofocus>

            <button class="btn btn-primary mt-4" type="submit">Salvar</button>
        </form>
    </div>
</div>
