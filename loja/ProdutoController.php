<?php
require_once 'db.php';

$controller = new ProdutoController();

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

class ProdutoController {

    public function index() {
        $pdo = getConnection();
        $stmt = $pdo->query("SELECT * FROM produtos");

        $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        include '_cabecalho.php';
        include 'listaProduto.php';
        include '_rodape.php';
    }

    public function novo(){
        include '_cabecalho.php';
        include 'formProduto.php';
        include '_rodape.php';
    }


    public function salvar() {
        $pdo = getConnection();

        $stmt = $pdo->prepare("INSERT INTO produtos (nome, preco) 
                                VALUES (:nome, :preco)");
        $stmt->execute([
            ':nome' => $_POST['nome'],
            ':preco' => $_POST['preco']
        ]);
           
        header("Location: ?acao=index");
        exit;
    }

}
