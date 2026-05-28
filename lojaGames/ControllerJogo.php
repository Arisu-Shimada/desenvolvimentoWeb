<?php
require_once 'db.php';

$controller = new ControllerJogo();

$acao = $_GET['acao'] ?? 'index';
switch ($acao) {
    case 'novo':
        $controller->novo();
        break;
    case 'salvar':
        $controller->salvar();
        break;
    case 'editar':
        $controller->editar();
        break;
    case 'salvar':
        $controller->salvar();
        break;
    case 'remover':
        $controller->remover();
        break;
    default:
        $controller->index();
}

class ControllerJogo {

    public function index() {
        $pdo = getConnection();
        $stmt = $pdo->query("SELECT * FROM jogos");

        $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        include '_cabecalho.php';
        include 'listaJogo.php';
        include '_rodape.php';
    }

    public function novo(){
        include '_cabecalho.php';
        include 'formJogo.php';
        include '_rodape.php';
    }


    public function salvar() {
        $pdo = getConnection();
        if ($_POST['id']=="") {
            $stmt = $pdo->prepare("INSERT INTO jogos (nome, preco, quantidade) 
                                VALUES (:nome, :preco, :quantidade)");
            $stmt->execute([
                ':nome' => $_POST['nome'],
                ':preco' => $_POST['preco'],
                ':quantidade' => $_POST['quantidade'],                
            ]);
        } else {
            $stmt = $pdo->prepare("UPDATE jogos SET
                nome = :nome, preco = :preco, quantidade = :quantidade WHERE id = :id");
            $stmt->execute([
                ':nome' => $_POST['nome'],
                ':preco' => $_POST['preco'],
                ':quantidade' => $_POST['quantidade'],                
                ':id' => $_POST['id']
            ]);
        }
        header("Location: ?acao=index");
        exit;
    }
    public function editar() {
        $id = $_GET['id'];
        $pdo = getConnection();
        $stmt = $pdo->prepare("SELECT * FROM jogos
                               WHERE id = :id");
        $stmt->execute(['id' => $id]);
        $dado = $stmt->fetch(PDO::FETCH_ASSOC);
        include '_cabecalho.php';
        include 'formJogo.php';
        include '_rodape.php';
    }
    public function remover() {
        $id = $_GET['id'];
        $pdo = getConnection();
        $stmt = $pdo->prepare("DELETE FROM jogos
                               WHERE id = :id");
        $stmt->execute(['id' => $id]);
        header("Location: ?acao=index");
        exit;
    }

}
