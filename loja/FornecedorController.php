<?php
require_once 'db.php';

$controller = new FornecedorController();

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
           
        header("Location: ?acao=index");
        exit;
    }

}
