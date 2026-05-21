<div class="card mt-5">
    <div class="card-header">
        <h5><?= isset($dado) ? "Editar Empréstimo" : "Novo Empréstimo" ?></h5>
    </div>
    <div class="card-body">
        <form method="post" action="?acao=salvar">

            <input type="hidden" name="id" value="<?= $dado["id"] ?? '' ?>">

            <label class="form-label">Livro:</label>
            <input class="form-control" type="text" name="livro" 
                   value="<?= $dado["livro"] ?? '' ?>" required autofocus>

            <label class="mt-3">Usuário:</label>
            <input class="form-control" type="text" name="usuario"
                   value="<?= $dado["usuario"] ?? '' ?>" required>

            <label class="form-label">Data de Empréstimo:</label>
            <input class="form-control" type="text" name="data_emprestimo" 
                   value="<?= $dado["data_emprestimo"] ?? '' ?>" required autofocus>
            
            <label class="mt-3">Data de Devolução:</label>
            <input class="form-control" type="text" name="data_devolucao"
                   value="<?= $dado["data_devolucao"] ?? '' ?>" required>

            <button class="btn btn-primary mt-4" type="submit">Salvar</button>
        </form>
    </div>
</div>
