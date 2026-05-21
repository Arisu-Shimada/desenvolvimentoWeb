<div class="card mt-5">
    <div class="card-header">
        <h5><?= isset($dado) ? "Editar Autor" : "Novo Autor" ?></h5>
    </div>
    <div class="card-body">
        <form method="post" action="?acao=salvar">

            <input type="hidden" name="id" value="<?= $dado["id"] ?? '' ?>">

            <label class="form-label">Nome:</label>
            <input class="form-control" type="text" name="nome" 
                   value="<?= $dado["nome"] ?? '' ?>" required autofocus>

            <label class="mt-3">Nacionalidade:</label>
            <input class="form-control" type="text" name="nacionalidade"
                   value="<?= $dado["nacionalidade"] ?? '' ?>" required>            

            <button class="btn btn-primary mt-4" type="submit">Salvar</button>
        </form>
    </div>
</div>
