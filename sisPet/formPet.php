<div class="card mt-5">
    <div class="card-header">
        <h5 ><?= isset($dado) ? "Editar Pet" : "Novo Pet" ?></h5> 
    </div>
    <div class="card-body">
        <form method="post" action="?acao=salvar">
            
            <input type="hidden" name="id" value="<?= $dado["id"] ?? '' ?>">

            <label class="form-label">ID do Cliente:</label>
            <input class="form-control" type="text" name="cliente_id" 
                   value="<?= $dado["cliente_id"] ?? '' ?>" required autofocus>

            <label class="form-label">Nome:</label>
            <input class="form-control" type="text" name="nome" 
                   value="<?= $dado["nome"] ?? '' ?>" required autofocus>

            <label class="form-label">Espécie:</label>
            <input class="form-control" type="text" name="especie" 
                   value="<?= $dado["especie"] ?? '' ?>" required autofocus>

            <label class="form-label">Raça:</label>
            <input class="form-control" type="text" name="raca" 
                   value="<?= $dado["raca"] ?? '' ?>" required autofocus>

            <label class="mt-3">Data de nascimento:</label>
            <input class="form-control" type="date" name="data_nascimento" 
                   value="<?= $dado["data_nascimento"] ?? '' ?>" required>
                   
            <label class="mt-3">Peso:</label>
            <input class="form-control" type="number" name="peso" step="0.01"
                   value="<?= $dado["peso"] ?? '' ?>" required>

            <button class="btn btn-primary mt-4" type="submit">Salvar</button>
        </form>
    </div>
</div>
