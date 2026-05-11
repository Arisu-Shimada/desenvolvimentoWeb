<?php
require_once 'db.php';

$controller = new VendedorController();

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


class VendedorController {

    public function index() {
        $pdo = getConnection();
        $stmt = $pdo->query("SELECT * FROM vendedores");

        $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        include '_cabecalho.php';
        include 'listaVendedor.php';
        include '_rodape.php';
    }

    public function novo(){
        include '_cabecalho.php';
        include 'formVendedor.php';
        include '_rodape.php';
    }


    public function salvar() {
        $pdo = getConnection();
        if ($_POST['id']=="") {
            $stmt = $pdo->prepare("INSERT INTO vendedores (nome, email, telefone, cpf, comissao) 
                                VALUES (:nome, :email, :telefone, :cpf, :comissao)");
            $stmt->execute([
                ':nome' => $_POST['nome'],
                ':email' => $_POST['email'],
                ':telefone' => $_POST['telefone'],
                ':cpf' => $_POST['cpf'],
                ':comissao' => $_POST['comissao']
            ]);
        } else {
            $stmt = $pdo->prepare("UPDATE vendedores SET
                                nome = :nome, email = :email, telefone = :telefone, cpf = :cpf, comissao = :comissao WHERE id = :id");
            $stmt->execute([
                ':nome' => $_POST['nome'],
                ':email' => $_POST['email'],
                ':telefone' => $_POST['telefone'],
                ':cpf' => $_POST['cpf'],
                ':comissao' => $_POST['comissao'],
                ':id' => $_POST['id']
            ]);
        }
        header("Location: ?acao=index");
        exit;
    }

    public function editar() {
        $id = $_GET['id'];
        $pdo = getConnection();
        $stmt = $pdo->prepare("SELECT * FROM vendedores
                               WHERE id = :id");
        $stmt->execute(['id' => $id]);
        $dado = $stmt->fetch(PDO::FETCH_ASSOC);
        include '_cabecalho.php';
        include 'formVendedor.php';
        include '_rodape.php';
    }

    public function remover() {
        $id = $_GET['id'];
        $pdo = getConnection();
        $stmt = $pdo->prepare("DELETE FROM vendedores
                               WHERE id = :id");
        $stmt->execute(['id' => $id]);
        header("Location: ?acao=index");
        exit;
    }
}
