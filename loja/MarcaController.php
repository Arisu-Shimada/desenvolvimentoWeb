<?php
require_once 'db.php';

$controller = new MarcaController();

$acao = $_GET['acao'] ?? 'index';
switch ($acao) {
    case 'novo':
        $controller->novo();
        break;
    case 'salvar':
        $controller->salvar();
        break;
    default:
        $controller->index();
}

class MarcaController {

    public function index() {
        $pdo = getConnection();
        $stmt = $pdo->query("SELECT * FROM marcas");

        $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        include '_cabecalho.php';
        include 'listaMarca.php';
        include '_rodape.php';
    }

    public function novo(){
        include '_cabecalho.php';
        include 'formMarca.php';
        include '_rodape.php';
    }


    public function salvar() {
        $pdo = getConnection();

        $stmt = $pdo->prepare("INSERT INTO marcas (nome, descricao, pais_origem) 
                                VALUES (:nome, :descricao, :pais_origem)");
        $stmt->execute([
            ':nome' => $_POST['nome'],
            ':descricao' => $_POST['descricao'],
            ':pais_origem' => $_POST['pais_origem']
        ]);
           
        header("Location: ?acao=index");
        exit;
    }

}
