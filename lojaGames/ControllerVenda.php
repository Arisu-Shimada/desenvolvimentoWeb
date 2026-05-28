<?php
require_once 'db.php';

$controller = new ControllerVenda();

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

class ControllerVenda {

    public function index() {
        $pdo = getConnection();
        $stmt = $pdo->query("SELECT * FROM vendas");

        $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        include '_cabecalho.php';
        include 'listaVenda.php';
        include '_rodape.php';
    }

    public function novo(){
        include '_cabecalho.php';
        include 'formVenda.php';
        include '_rodape.php';
    }

    public function salvar() {
        $pdo = getConnection();
        if ($_POST['id']=="") {
            $stmt = $pdo->prepare("INSERT INTO vendas (jogo, cliente, data_venda, valor) 
                                VALUES (:jogo, :cliente, :data_venda, :valor)");
            $stmt->execute([
                ':jogo' => $_POST['jogo'],
                ':cliente' => $_POST['cliente'],
                ':valor' => $_POST['data_venda'],
                ':valor' => $_POST['valor']
            ]);
        } else {
            $stmt = $pdo->prepare("UPDATE vendas SET
                jogo = :jogo, cliente = :cliente, data_venda = :data_venda, valor = :valor WHERE id = :id");
            $stmt->execute([
                ':jogo' => $_POST['jogo'],
                ':cliente' => $_POST['cliente'],
                ':data_venda' => $_POST['data_venda'],
                ':valor' => $_POST['valor'], 
                ':id' => $_POST['id']
            ]);
        }
        header("Location: ?acao=index");
        exit;
    }
    public function editar() {
        $id = $_GET['id'];
        $pdo = getConnection();
        $stmt = $pdo->prepare("SELECT * FROM vendas
                               WHERE id = :id");
        $stmt->execute(['id' => $id]);
        $dado = $stmt->fetch(PDO::FETCH_ASSOC);
        include '_cabecalho.php';
        include 'formVenda.php';
        include '_rodape.php';
    }
    public function remover() {
        $id = $_GET['id'];
        $pdo = getConnection();
        $stmt = $pdo->prepare("DELETE FROM vendas
                               WHERE id = :id");
        $stmt->execute(['id' => $id]);
        header("Location: ?acao=index");
        exit;
    }

}
