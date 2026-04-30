<?php
require_once 'db.php';

$controller = new ClienteController();

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
           
        header("Location: ?acao=index");
        exit;
    }

}
