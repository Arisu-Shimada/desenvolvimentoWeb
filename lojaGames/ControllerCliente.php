<?php
require_once 'db.php';

$controller = new ControllerCliente();

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

class ControllerCliente {

    public function index() {
        $pdo = getConnection();
        $stmt = $pdo->query("SELECT * FROM clientes");

        $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        include '_cabecalho.php';
        include 'listaCliente.php';
        include '_rodape.php';
    }

    public function novo(){
        include '_cabecalho.php';
        include 'formCliente.php';
        include '_rodape.php';
    }

    public function salvar() {
        $pdo = getConnection();
        if ($_POST['id']=="") {
            $stmt = $pdo->prepare("INSERT INTO clientes (nome, email) 
                                VALUES (:nome, :email)");
            $stmt->execute([
                ':nome' => $_POST['nome'],
                ':email' => $_POST['email']
            ]);
        } else {
            $stmt = $pdo->prepare("UPDATE clientes SET
                nome = :nome, email = :email WHERE id = :id");
            $stmt->execute([
                ':nome' => $_POST['nome'],                
                ':email' => $_POST['email'],
                ':id' => $_POST['id']
            ]);
        }
        header("Location: ?acao=index");
        exit;
    }
    public function editar() {
        $id = $_GET['id'];
        $pdo = getConnection();
        $stmt = $pdo->prepare("SELECT * FROM clientes
                               WHERE id = :id");
        $stmt->execute(['id' => $id]);
        $dado = $stmt->fetch(PDO::FETCH_ASSOC);
        include '_cabecalho.php';
        include 'formCliente.php';
        include '_rodape.php';
    }
    public function remover() {
        $id = $_GET['id'];
        $pdo = getConnection();
        $stmt = $pdo->prepare("DELETE FROM clientes
                               WHERE id = :id");
        $stmt->execute(['id' => $id]);
        header("Location: ?acao=index");
        exit;
    }

}
