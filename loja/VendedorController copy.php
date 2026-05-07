<?php
require_once 'db.php';

$controller = new VendedorController();

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

        $stmt = $pdo->prepare("INSERT INTO Vendedores (nome, email, telefone, cpf, comissao) 
                                VALUES (:nome, :email, :telefone, :cpf, :comissao)");
        $stmt->execute([
            ':nome' => $_POST['nome'],
            ':email' => $_POST['email'],
            ':telefone' => $_POST['telefone'],
            ':cpf' => $_POST['cpf'],
            ':comissao' => $_POST['comissao']
        ]);
           
        header("Location: ?acao=index");
        exit;
    }

}
