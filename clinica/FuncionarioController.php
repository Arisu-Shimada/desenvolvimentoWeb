<?php
require_once 'db.php';

$controller = new FuncionarioController();

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

class FuncionarioController {

    public function index() {
        $pdo = getConnection();
        $stmt = $pdo->query("SELECT * FROM funcionarios");

        $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        include '_cabecalho.php';
        include 'listaFuncionario.php';
        include '_rodape.php';
    }

    public function novo(){
        include '_cabecalho.php';
        include 'formFuncionario.php';
        include '_rodape.php';
    }


    public function salvar() {
        $pdo = getConnection();

        $stmt = $pdo->prepare("INSERT INTO funcionarios (nome, cargo, salario, data_admissao) 
                                VALUES (:nome, :cargo, :salario, :data_admissao)");
        $stmt->execute([
            ':nome' => $_POST['nome'],
            ':cargo' => $_POST['cargo'],
            ':salario' => $_POST['salario'],
            ':data_admissao' => $_POST['data_admissao'],
        ]);
           
        header("Location: ?acao=index");
        exit;
    }

}
