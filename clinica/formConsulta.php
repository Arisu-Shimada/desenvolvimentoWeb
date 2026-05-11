<div class="card mt-5">
    <div class="card-header">
        <h5>Nova Consulta</h5>
    </div>
    <div class="card-body">
        <form method="post" action="?acao=salvar">

            <label class="form-label">Data da Consulta:</label>
            <input class="form-control" type="text" name="data_consulta" placeholder="aaaa/mm/dd"
                   value="<?= $dado["data_consulta"] ?? '' ?>" required autofocus>

            <label class="mt-3">Hora:</label>
            <input class="form-control" type="text" name="hora" placeholder="hh:mm:ss"
                   value="<?= $dado["hora"] ?? '' ?>" required>

            <label class="mt-3">Valor:</label>
            <input class="form-control" type="number" name="valor"
                   value="<?= $dado["valor"] ?? '' ?>" required>

            <label class="mt-3">Tipo de Consulta:</label>
            <input class="form-control" type="text" name="tipo"
                   value="<?= $dado["tipo"] ?? '' ?>" required>

            <button class="btn btn-primary mt-4" type="submit">Salvar</button>
        </form>
    </div>
</div>