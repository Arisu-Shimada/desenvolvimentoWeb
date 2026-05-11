<?php
require_once 'db.php';

$controller = new FornecedorController();

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


class FornecedorController {

    public function index() {
        $pdo = getConnection();
        $stmt = $pdo->query("SELECT * FROM fornecedores");

        $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        include '_cabecalho.php';
        include 'listaFornecedor.php';
        include '_rodape.php';
    }

    public function novo(){
        include '_cabecalho.php';
        include 'formFornecedor.php';
        include '_rodape.php';
    }


    public function salvar() {
        $pdo = getConnection();

        if ($_POST['id']=="") {
            $stmt = $pdo->prepare("INSERT INTO fornecedores (nome, email, telefone, cnpj, empresa, cidade, uf) 
                                VALUES (:nome, :email, :telefone, :cnpj, :empresa, :cidade, :uf)");
            $stmt->execute([
                ':nome' => $_POST['nome'],
                ':email' => $_POST['email'],
                ':telefone' => $_POST['telefone'],
                ':cnpj' => $_POST['cnpj'],
                ':empresa' => $_POST['empresa'],
                ':cidade' => $_POST['cidade'],
                ':uf' => $_POST['uf']
            ]);
        } else {
            $stmt = $pdo->prepare("UPDATE fornecedores SET
                nome = :nome, email = :email, telefone = :telefone, cnpj = :cnpj, empresa = :empresa, cidade = :cidade, uf = :uf WHERE id = :id");
            $stmt->execute([
                ':nome' => $_POST['nome'],
                ':email' => $_POST['email'],
                ':telefone' => $_POST['telefone'],
                ':cnpj' => $_POST['cnpj'],
                ':empresa' => $_POST['empresa'],
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
        $stmt = $pdo->prepare("SELECT * FROM fornecedores
                               WHERE id = :id");
        $stmt->execute(['id' => $id]);
        $dado = $stmt->fetch(PDO::FETCH_ASSOC);
        include '_cabecalho.php';
        include 'formFornecedor.php';
        include '_rodape.php';
    }
    public function remover() {
        $id = $_GET['id'];
        $pdo = getConnection();
        $stmt = $pdo->prepare("DELETE FROM fornecedores
                               WHERE id = :id");
        $stmt->execute(['id' => $id]);
        header("Location: ?acao=index");
        exit;
    }
}
