<?php
require_once 'db.php';

$controller = new ClienteController();

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
    case 'remover':
        $controller->remover();
        break;
    default:
        $controller->index();
}


class ClienteController {

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
            $stmt = $pdo->prepare("INSERT INTO clientes (nome, email, telefone, cpf, cidade, uf) 
                                VALUES (:nome, :email, :telefone, :cpf, :cidade, :uf)");
            $stmt->execute([
                ':nome' => $_POST['nome'],
                ':email' => $_POST['email'],
                ':telefone' => $_POST['telefone'],
                ':cpf' => $_POST['cpf'],
                ':cidade' => $_POST['cidade'],
                ':uf' => $_POST['uf']
            ]);
        } else {
            $stmt = $pdo->prepare("UPDATE clientes SET
                nome = :nome, email = :email, telefone = :telefone, cpf = :cpf, cidade = :cidade, uf = :uf WHERE id = :id");
            $stmt->execute([
                ':nome' => $_POST['nome'],
                ':email' => $_POST['email'],
                ':telefone' => $_POST['telefone'],
                ':cpf' => $_POST['cpf'],
                ':cidade' => $_POST['cidade'],
                ':uf' => $_POST['uf'], 
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
