<?php
require_once 'db.php';

$controller = new ProdutoController();

$acao = $_GET['acao'] ?? 'index';
switch ($acao) {
    case 'novo':
        $controller->novo();
        break;
    case 'editar':
        $controller->editar();
        break;
    case 'salvar':
        $controller->salvar();
        break;
    case 'excluir':
        $controller->excluir();
        break;
    case 'pesquisar':
        $controller->pesquisar();
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
        $pdo = getConnection();
        include '_cabecalho.php';
        include 'formProduto.php';
        include '_rodape.php';
    }


    public function editar() {
        $id = $_GET['id'];
        $pdo = getConnection();
        $stmt = $pdo->prepare("SELECT * FROM produtos WHERE id = :id");
        $stmt->execute([':id' => $id]);
        $dado = $stmt->fetch(PDO::FETCH_ASSOC);

        include '_cabecalho.php';
        include 'formProduto.php';
        include '_rodape.php';
    }

    public function salvar() {
        $pdo = getConnection();
        if ($_POST['id']=="") {
            $stmt = $pdo->prepare("INSERT INTO
                                produtos (nome, preco)
                                VALUES (:nome, :preco)");
            $stmt->execute([
                ':nome' => $_POST['nome'],
                ':preco' => $_POST['preco']
            ]);
        } else {
            $stmt = $pdo->prepare("UPDATE produtos SET
                                    nome = :nome, preco = :preco
                                    WHERE id = :id");
            $stmt->execute([
                ':nome' => $_POST['nome'],
                ':preco' => $_POST['preco'],
                ':id' => $_POST['id']
            ]);
        }
        header("Location: ?acao=index");
        exit;
    }  

    public function excluir() {
        $id = $_GET['id'];
        $pdo = getConnection();
        $stmt = $pdo->prepare("DELETE FROM 
                                produtos 
                                WHERE id = :id");
        $stmt->execute([':id' => $id]);
        header("Location: ?acao=index");
        exit;
    }


    public function pesquisar() {
        $pdo = getConnection();
        $busca = $_POST['busca'] ?? '';

        $stmt = $pdo->prepare("SELECT * FROM produtos WHERE nome LIKE :busca");
        $stmt->execute([':busca' => '%' . $busca . '%']);
        $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        include '_cabecalho.php';
        include 'listaProduto.php';
        include '_rodape.php';
    }
}
